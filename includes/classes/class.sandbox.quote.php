<?php
class ISC_SANDBOX_EXCEPTION extends Exception
{
	const ERROR_NO_STOCK = 1;

	const COUPON_INVALID = 2001;
	const COUPON_DISABLED = 2002;
	const COUPON_EXPIRED_TIME = 2003;
	const COUPON_EXPIRED_USES = 2004;
	const COUPON_MIN_PURCHASE = 2005;
	const COUPON_DOES_NOT_APPLY = 2006;
	const COUPON_LOCATION_DOES_NOT_APPLY = 2007;
	const COUPON_METHOD_DOES_NOT_APPLY = 2008;
	const COUPON_LOCATION_DOES_NOT_SPECIFIED = 2009;
	const COUPON_METHOD_DOES_NOT_SPECIFIED = 2010;
	const REFCODE_INVALID = 2011;
	const REFCODE_NOT_NEW = 2012;
	const REFCODE_MIN_PURCHASE = 2013;
	const REFCODE_DOES_NOT_APPLY = 2014;
}
class ISC_SANDBOX_QUOTE
{
	/**
	 * @var int Customer ID that this sandbox belongs to.
	 */
	protected $customerId;

	/**
	 * @var int The customer that this sandbox pulls pricing from.
	 */
	protected $customerGroupId;

	/**
	 * @var array Array containing ISC_SANDBOX_QUOTE_ITEM instances for items in the sandbox.
	 */
	protected $items = array();

	/**
	 * @var array In-memory cache of calculated sandbox totals.
	 */
	protected $cachedTotals = array();

	/** @var int The order status after conversion from an existing sandbox (may also be used in future to define which status an order should be created at when being created from a sandbox) */
	protected $orderStatus = ORDER_STATUS_INCOMPLETE;

	/** @var int The order id being edited if this sandbox instance is being used to edit an order, otherwise this will be false */
	protected $orderId = false;

	/**
	 * Given an ISC_SANDBOX_QUOTE_ITEM instance, add it to this sandbox.
	 *
	 * @param ISC_SANDBOX_QUOTE_ITEM $item ISC_SANDBOX_QUOTE_ITEM instance to add.
	 * @param boolean Attempt to increment quantities if this item already exists or not.
	 * @return ISC_SANDBOX This sandbox instance.
	 */
	public function addItem(ISC_SANDBOX_QUOTE_ITEM $item, $collapse = true)
	{
		$hash = $item->getHash();

		if ($collapse != false) {
			foreach ($this->items as $existingItem) {
				if ($item->getProductId() && $existingItem->getHash() == $hash) {
					$existingItem->incrementQuantity($item->getQuantity());
					return $this;
				}
			}
		}

		$item->setSandbox($this);
		try {
			$this->items[] = $item;
			$item->setInSandbox(true);
		}
		catch(ISC_SANDBOX_EXCEPTION $e) {
			// Remove the item from the sandbox.
			array_pop($this->items);
			$item->setInSandbox(false);

			header("HTTP/1.0 424 Not Found");
			$error = array('error' => 'We are sorry, but we sold out of that limited-edition piece in this size! Please try another style.');
			die(json_encode($error));
		}
		return $this;
	}

	/**
	 * Given the Product ID of an item in the sandbox, remove it.
	 *
	 * @param string $itemId ID of item to remove.
	 * @return ISC_SANDBOX This instance of ISC_SANDBOX.
	 */
	public function removeItemByPId($itemId)
	{
		foreach ($this->items as $key => $item) {
			if ($itemId == $item->getProductId()) {
				$item->removeChildren();
				unset($this->items[$key]);
				break;
			}
		}

		return $this;
	}
	
	/**
	 * Given the ID of an item in the sandbox, remove it.
	 *
	 * @param string $itemId ID of item to remove.
	 * @return ISC_SANDBOX This instance of ISC_SANDBOX.
	 */
	public function removeItem($itemId)
	{
		foreach ($this->items as $key => $item) {
			if ($itemId == $item->getId()) {
				$item->removeChildren();
				unset($this->items[$key]);
				break;
			}
		}

		return $this;
	}
	
	/**
	 * Given the ID of an item in the sandbox, remove it.
	 *
	 * @param string $itemId ID of item to remove.
	 * @return ISC_SANDBOX This instance of ISC_SANDBOX.
	 */
	public function removeAllItems()
	{
		foreach ($this->items as $key => $item) {
			$this->removeItem($item->getId());
		}

		return $this;
	}

	/**
	 * Get the customer ID associated with the sandbox.
	 *
	 * @return int Customer ID.
	 */
	public function getCustomerId()
	{
		return $this->customerId;
	}

	/**
	 * Set the ID of the customer that this sandbox belongs to.
	 *
	 * @param int $customerId ID of the customer.
	 * @return ISC_SANDBOX This instance of ISC_SANDBOX.
	 */
	public function setCustomerId($customerId)
	{
		$this->customerId = $customerId;
		return $this;
	}

	/**
	 * Load and set extended product and variation details for items in the
	 * sandbox.
	 *
	 * @param ISC_SANDBOX_QUOTE_ITEM $item Optional item, to ensure it is also loaded.
	 * @return ISC_SANDBOX This instance of ISC_SANDBOX.
	 */
	public function loadProductData(ISC_SANDBOX_QUOTE_ITEM $additionalItem = null)
	{
		$productIds = array();
		$variationIds = array();

		if ($additionalItem !== null) {
			$productIds[] = $additionalItem->getProductId();
			$variationIds[] = $additionalItem->getVariationId();
		}

		foreach ($this->items as $item) {
			$productIds[] = $item->getProductId();
			$variationIds[] = $item->getVariationId();
		}

		$productIds = array_unique($productIds);
		$variationIds = array_unique($variationIds);

		if (empty($productIds)) {
			return $this;
		}

		$productData = array();
		$variationData = array();

		// Load up the data for the products
		$query = "
			SELECT
				p.productid, prodcurrentinv, prodcode, prodinvtrack,
				prodweight, prodwidth, prodheight, prodvariationid,
				proddepth, prodname, prodprice, prodretailprice,
				prodsaleprice, prodcalculatedprice, tax_class_id,
				prodavailability, prodtype, prodphystype, prodcostprice,
				prodfixedshippingcost, prodfreeshipping,
				prodoptionsrequired, pi.*, prodallowpurchases, prodwrapoptions, prodvendorid,
				prodeventdaterequired, prodeventdatefieldname, prodpreorder,
				prodreleasedate, prodpreordermessage, prodcatids, prodminqty,
				prodmaxqty, disable_google_checkout,
				".getProdCustomerGroupPriceSQL().", (
					SELECT GROUP_CONCAT(ca.categoryid SEPARATOR ',')
					FROM [|PREFIX|]categoryassociations ca
					WHERE p.productid=ca.productid
				) AS categoryids,
				(
					SELECT GROUP_CONCAT(pa.assocprodid SEPARATOR ',')
					FROM [|PREFIX|]product_associations pa
					WHERE p.productid=pa.assocbaseid
				) AS associatedprods
			FROM [|PREFIX|]products p
			LEFT JOIN [|PREFIX|]product_images pi
				ON (p.productid=pi.imageprodid AND pi.imageisthumb=1)
			WHERE p.productid in (".implode(', ', $productIds).")
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while ($product = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$productData[$product['productid']] = $product;
		}

		// Are there any variations to load?
		if (!empty($variationIds)) {
			$query = "
				SELECT
					combinationid, vcproductid, vcimage, vcimagethumb, vcweight,
					vcweightdiff, vcstock, vcpricediff, vcprice, vcsku
				FROM [|PREFIX|]product_variation_combinations
				WHERE combinationid IN (".implode(",", $variationIds).")
			";

			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			$variationImages = array();
			while ($variation = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$variationData[$variation['combinationid']] = $variation;
			}
		}

		foreach ($this->items as $item) {
			$productId = $item->getProductId();
			$variationId = $item->getVariationId();
			if (isset($productData[$productId])) {
				$data = $productData[$productId];
				if (isset($variationData[$variationId])) {
					$data['variation'] = $variationData[$variationId];
				}

				$item->setProductData($data);
			}
		}

		if ($additionalItem !== null) {
			$productId = $additionalItem->getProductId();
			$variationId = $additionalItem->getVariationId();
			if (isset($productData[$productId])) {
				$data = $productData[$productId];
				if (isset($variationData[$variationId])) {
					$data['variation'] = $variationData[$variationId];
				}

				$additionalItem->setProductData($data);
			}
		}

		return $this;
	}

	/**
	 * Return an array of all of the items in this sandbox. Each returned
	 * item is its instance of the ISC_SANDBOX_QUOTE_ITEM object.
	 *
	 * @param int $type optional, limit returned items to one of PPT_? specifiers
	 * @return array Array of ISC_SANDBOX_QUOTE_ITEM objects for this sandbox.
	 */
	public function getItems($type = null)
	{
		if ($type === null) {
			return $this->items;
		}

		$items = array();
		foreach ($this->items as /** @var ISC_SANDBOX_QUOTE_ITEM */$item) {
			if ($item->getType() == $type) {
				$items[] = $item;
			}
		}
		return $items;
	}

	/**
	 * Given the ID of a sandbox item, find and return the instance of it.
	 *
	 * @param string $id ID of the item.
	 * @return ISC_SANDBOX_QUOTE_ITEM False on fail, otherwise item instance.
	 */
	public function getItemById($id)
	{
		foreach ($this->items as $item) {
			if ($item->getId() == $id) {
				return $item;
			}
		}

		return false;
	}

	/**
	 * Get the subtotal of the sandbox, either including or excluding tax.
	 * The subtotal consists of all of the line-item totals for the items
	 * in the sandbox.
	 *
	 * @param boolean $incTax True to include taxes, false to not.
	 * @return float Subtotal of the sandbox.
	 */
	public function getSubTotal($incTax = false)
	{
		$subtotal = 0;
		foreach ($this->items as $item) {
			$subtotal += $item->getTotal($incTax);
		}

		return $subtotal;
	}

	public function getBaseSubTotal()
	{
		$subtotal = 0;
		foreach ($this->items as $item) {
			$subtotal += $item->getBasePrice() * $item->getQuantity();
		}

		return $subtotal;
	}

	/**
	 * Get the number of items attached to this sandbox, optionally only of a
	 * certain product type.
	 *
	 * @param int $productType Optionally a PT_* constant to return # of that
	 *  type of product.
	 * @return int Number of items in the sandbox of the given type, or all.
	 */
	public function getNumItems($productType = null)
	{
		$total = 0;
		foreach ($this->items as $item) {
			if ($productType !== null && $item->getType() != $productType) {
				continue;
			}
			$total += $item->getQuantity();
		}

		return $total;
	}

	public function rebuildItemPrices()
	{
		foreach ($this->items as $item) {
			$item->invalidateCachedTotals();
		}
		return $this;
	}

	/**
	 * Flatten down all of the items in this sandbox by finding all items
	 * with the same configuration, and then removing all of that particular
	 * item with the exception of one, and setting its quantity to the
	 * combined total quantity.
	 *
	 * @return ISC_SANDBOX This sandbox instance.
	 */
	public function flattenSandboxItems()
	{
		$existingItems = array();
		foreach ($this->items as $item) {
			$itemHash = $item->getHash();
			$itemId = $item->getId();
			if (!isset($existingItems[$itemHash])) {
				$existingItems[$itemHash] = $item;
				continue;
			}

			$quantity = $item->getQuantity();
			$this->removeItem($itemId);
			$existingItems[$itemHash]->setQuantity(
				$existingItems[$itemHash]->getQuantity() +
				$quantity
			);
		}

		return $this;
	}

	/**
	 * Given the ID of a sandbox item, check if it is already in this sandbox or
	 * not.
	 *
	 * @param string $id ID to check.
	 * @param object $not Don't check this item.
	 * @return boolean True if the item is already in the sandbox. False if not.
	 */
	public function hasItem($id, $not = null)
	{
		foreach ($this->items as $item) {
			if ($item !== $not && $item->getId() == $id) {
				return true;
			}
		}

		return false;
	}
	
	/**
	 * Given the Product ID of a sandbox item, check if it is already in this sandbox or
	 * not.
	 *
	 * @param string $id Product ID to check.
	 * @param object $not Don't check this item.
	 * @return boolean True if the item is already in the sandbox. False if not.
	 */
	public function hasItemByPId($id, $not = null)
	{
		foreach ($this->items as $item) {
			if ($item !== $not && $item->getProductId() == $id) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Get an array of all of the unique product IDs for the products in this
	 * sandbox.
	 *
	 * @return array Array of product IDs.
	 */
	public function getUniqueProductIds()
	{
		$productIds = array();
		foreach ($this->items as $item) {
			$productIds[$item->getProductId()] = $item->getProductId();
		}
		return $productIds;
	}

	/**
	 * Get the ID of the customer group that this sandbox should use for calculating
	 * pricing.
	 *
	 * @return int Customer group ID.
	 */
	public function getCustomerGroupId()
	{
		return $this->customerGroupId;
	}

	/**
	 * Set the ID of the customer group that this sandbox should use to determine
	 * product pricing.
	 *
	 * @param int $id Customer group ID.
	 * @return ISC_SANDBOX This sandbox instance.
	 */
	public function setCustomerGroupId($id)
	{
		// Group ID has changed. Recalculate prices.
		if ($id != $this->customerGroupId) {
			$recalculate = true;
		}

		$this->customerGroupId = $id;

		if (!empty($recalculate)) {
			$this->rebuildItemPrices();
		}

		return $this;
	}

	/**
	* @param int $value
	* @return ISC_SANDBOX
	*/
	public function setOrderId($value)
	{
		$this->orderId = (int)$value;
		return $this;
	}

	/** @return int */
	public function getOrderId()
	{
		return $this->orderId;
	}

	/**
	 * Invalidate any cached/pre-calculated totals on this sandbox.
	 *
	 * @return ISC_SANDBOX This instance of ISC_SANDBOX.
	 */
	public function invalidateCachedTotals()
	{
		$this->cachedTotals = array();
		return $this;
	}

	/**
	* Creates a new ISC_SANDBOX_QUOTE_ITEM instance for this ISC_SANDBOX and returns it. Note: the item is not added to the sandbox, you must still call ISC_SANDBOX->addItem
	*
	* @return ISC_SANDBOX_QUOTE_ITEM
	*/
	public function createItem()
	{
		$item = new ISC_SANDBOX_QUOTE_ITEM;
		$item->setSandbox($this);
		return $item;
	}

	/**
	* Returns a count of all unique items in this order, where a unique item is defined based on configuration and shipping destinations.
	*
	* @return int
	*/
	public function getItemCount()
	{
		return count($this->items);
	}

	public function __sleep()
	{
		$dontSave = array(
			'cachedTotals'
		);

		$vars = array_keys(get_object_vars($this));
		$vars = array_diff($vars, $dontSave);
		return $vars;
	}
}
