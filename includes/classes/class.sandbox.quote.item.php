<?php
class ISC_SANDBOX_QUOTE_ITEM
{
	/**
	 * @var int The type of physical item this is (one of the PPT_ constants)
	 */
	protected $type = 0;
	
	/**
	 * @var int The type of physical item this is (one of the PPT_ constants)
	 */
	protected $associations = false;

	/**
	 * @var string The unique ID of this item in the sandbox.
	 */
	protected $id = 0;

	/**
	 * @var string String representation of the configuration of this item.
	 */
	protected $hash;

	/**
	 * @var array Array of product details fetched from the database for
	 * this sandbox item.
	 */
	protected $productData;

	/**
	 * @var int ID of the product this item belongs to.
	 */
	protected $productId = 0;

	/**
	 * @var int ID of the selected variation combination.
	 */
	protected $variationId = 0;

	/**
	 * @var array Key-value array containing the options for the selected variation.
	 */
	protected $variationOptions = array();

	/**
	 * @var int Quantity of this item in the sandbox.
	 */
	protected $quantity = 0;

	/**
	* @var int The quantity of the item in an existing order.
	*/
	protected $originalOrderQuantity = 0;

	/**
	 * @var string The name of the product, as it exists in the sandbox.
	 */
	protected $name = '';

	protected $basePrice = null;

	/**
	 * @var string SKU of this item.
	 */
	protected $sku = '';

	/**
	 * @var string The sandbox item ID that this item is a child of.
	 * Primarily used for discount rules and free items.
	 */
	protected $parentId;

	/**
	 * @var ISC_SANDBOX ISC_SANDBOX instance this item belongs to.
	 */
	protected $sandbox;

	/**
	 * @var array Array containing an in-memory cache of calculated totals for this item.
	 */
	protected $cachedTotals = array();

	/**
	 * @var boolean Flag indicating if this item has been attached to the sandbox or not.
	 */
	protected $inSandbox = false;

	/**
	 * @var boolean Flag indicating if inventory checking is enabled or not.
	 */
	protected $inventoryChecking = true; 

	/**
	 * Set the flag that indicates if this item has been added to the sandbox or not.
	 * This allows methods such as setQuantity() etc to be run that need to apply
	 * discounts/check for this product to occur AFTER the product is added to
	 * the sandbox.
	 *
	 * @param boolean $value True to mark the item as being in the sandbox.
	 * @return ISC_SANDBOX_QUOTE_ITEM This item instance.
	 */
	public function setInSandbox($value)
	{
		$this->inSandbox = (bool)$value;
		if ($value == true) {
			$this->handleCommitToSandbox();
		}
		return $this;
	}

	/**
	 * Set the type for this item. Item type should be one of the PPT_* constants.
	 *
	 * @param int Item type, as one of the PPT_* constants.
	 * @return ISC_SANDBOX_QUOTE_ITEM This item instance.
	 */
	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * Get the type of item (physical product type) for this item.
	 * Will return one of the PPT_* constants that identifies this
	 * item.
	 *
	 * @return int PPT_* constant representing the type of item.
	 */
	public function getType()
	{
		if (!$this->type) {
			$productData = $this->getProductData();
			if (!empty($productData)) {
				$this->type = $productData['prodphystype'];
			}
		}
		return $this->type;
	}
	
	public function getAssociations() {
		$prodData = $this->getProductData();
		if(!empty($prodData['associatedprods']) && empty($this->associations)) {
			$this->setAssociations();
		}
		return $this->associations;
	}

	public function getProductData()
	{
		if (empty($this->productData) && $this->productId) {
			$this->getSandbox()->loadProductData($this);
		}
		return $this->productData;
	}

	public function __sleep()
	{
		$dontSave = array(
			'productData',
			'cachedTotals',
		);

		$vars = array_keys(get_object_vars($this));
		$vars = array_diff($vars, $dontSave);
		return $vars;
	}

	public function __clone()
	{
		// Force regeneration of the item ID
		$this->id = null;
		$this->inSandbox = false;
		if ($this->inSandbox) {
			$this->invalidateCachedTotals();
			if (!$this->getParentId()) {
				$this->getSandbox()->reapplyDiscounts();
			}
		}
	}

	public function invalidateCachedTotals()
	{
		$this->cachedTotals = array();
		$this->productData = array();

		$this->basePrice = null;

		return $this;
	}

	public function setProductData($data)
	{
		$this->productData = $data;
		if ($data['prodname'] != $this->name) {
			$this->setName($data['prodname']);
		}

		return $this;
	}

	/**
	 * Remove this item from its attached sandbox.
	 *
	 * @return ISC_SANDBOX Instance of the sandbox object the product was attached
	 * to.
	 */
	public function remove()
	{
		return $this->getSandbox()->removeItem($this->getId());
	}

	/**
	 * Get the sandbox that this item is attached to.
	 *
	 * @return ISC_SANDBOX Instance of the ISC_SANDBOX object.
	 */
	public function getSandbox()
	{
		return $this->sandbox;
	}

	/**
	 * Set the sandbox instance that this item belongs to.
	 *
	 * @param ISC_SANDBOX_QUOTE $sandbox Sandbox this item should belong to.
	 * @return ISC_SANDBOX_QUOTE_ITEM This item instance.
	 */
	public function setSandbox(ISC_SANDBOX_QUOTE $sandbox)
	{
		$this->sandbox = $sandbox;
		return $this;
	}

	/**
	 * Remove any items that are marked as children of this item.
	 *
	 * @return ISC_SANDBOX_QUOTE_ITEM This item instance.
	 */
	public function removeChildren()
	{
		$items = $this->getSandbox()->getItems();
		foreach ($items as $item) {
			if ($item->getParentId() == $this->getId()) {
				$this->sandbox->removeItem($item->getId());
			}
		}

		return $this;
	}
	
	public function setAssociations() {
		$associations = array();
		$prodData = $this->getProductData();
		
		$query = "
			SELECT productid, prodphystype FROM [|PREFIX|]products
			WHERE productid in (".$prodData['associatedprods'].")
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($association = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$associations[] = $association;
		}
		
		$this->associations = $associations;
		return $this;
	}

	public function setParentId($parentId)
	{
		if (is_object($parentId)) {
			$parentId = $parent->getId();
		}

		$this->parentId = $parentId;
		$this->regenerateHash();
		return $this;
	}

	public function addChildItem(ISC_SANDBOX_QUOTE_ITEM $item)
	{
		$this->sandbox->addItem($item);
		$this->children[] = $item->getId();
		return $this;
	}

	/**
	 * Return the product availability string for this product. This is just
	 * a field configured for the product and shown during checkout.
	 *
	 * @return string Availability message.
	 */
	public function getAvailability()
	{
		$productData = $this->getProductData();
		if (!empty($productData['prodavailability'])) {
			return $productData['prodavailability'];
		}

		return '';
	}

	/**
	 * Get the thumbnail image of this sandbox item.
	 *
	 * @return string Thumbnail image path.
	 */
	public function getThumbnail()
	{
		$productData = $this->getProductData();

		if (!empty($productData['variation']['vcimage']) && !empty($productData['variation']['vcimagethumb'])) {
			try {
				$image = new ISC_PRODUCT_IMAGE;
				$image->setSourceFilePath($productData['variation']['vcimage']);
				$image->setResizedFilePath(ISC_PRODUCT_IMAGE_SIZE_THUMBNAIL, $productData['variation']['vcimagethumb']);
				return $image->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_THUMBNAIL, true, false);
			} catch (Exception $exception) {
				return '';
			}
		}

		try {
			$image = new ISC_PRODUCT_IMAGE();
			$image->populateFromDatabaseRow($productData);
			return $image->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_THUMBNAIL, true);
		} catch (Exception $exception) {
			return '';
		}
	}
	
	/**
	 * Get the tiny thumbnail image of this sandbox item.
	 *
	 * @return string Tiny Thumbnail image path.
	 */
	public function getTinyThumbnail()
	{
		$productData = $this->getProductData();

		if (!empty($productData['variation']['vcimage']) && !empty($productData['variation']['vcimagethumb'])) {
			try {
				$image = new ISC_PRODUCT_IMAGE;
				$image->setSourceFilePath($productData['variation']['vcimage']);
				$image->setResizedFilePath(ISC_PRODUCT_IMAGE_SIZE_TINY, $productData['variation']['vcimagethumb']);
				return $image->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_TINY, true, false);
			} catch (Exception $exception) {
				return '';
			}
		}

		try {
			$image = new ISC_PRODUCT_IMAGE();
			$image->populateFromDatabaseRow($productData);
			return $image->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_TINY, true);
		} catch (Exception $exception) {
			return '';
		}
	}
	
	/**
	 * Get the standard image of this sandbox item.
	 *
	 * @return string standard image path.
	 */
	public function getStandardImage()
	{
		$productData = $this->getProductData();

		if (!empty($productData['variation']['vcimage'])) {
			try {
				$image = new ISC_PRODUCT_IMAGE;
				$image->setSourceFilePath($productData['variation']['vcimage']);
				$image->setResizedFilePath(ISC_PRODUCT_IMAGE_SIZE_STANDARD, $productData['variation']['vcimagethumb']);
				return $image->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_STANDARD, true, false);
			} catch (Exception $exception) {
				return '';
			}
		}

		try {
			$image = new ISC_PRODUCT_IMAGE();
			$image->populateFromDatabaseRow($productData);
			return $image->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_STANDARD, true);
		} catch (Exception $exception) {
			return '';
		}
	}

	public function setVariation($variation)
	{
		$existingVariationId = $this->variationId;
		$existingVariationOptions = $this->variationOptions;

		$variationOptions = array();

		if (is_array($variation)) {
			$variation = getClass('ISC_PRODUCT')->getVariationCombination($variation);
		}

		// Load the variation
		if ($variation != 0) {
		
			$query = "
				SELECT *
				FROM [|PREFIX|]product_variation_combinations
				WHERE combinationid='".(int)$variation."'
			";
			$result = $GLOBALS['ISC_CLASS_DB']->query($query);
			$productVariation = $GLOBALS['ISC_CLASS_DB']->Fetch($result);
			if (empty($productVariation)) {
				throw new ISC_SANDBOX_EXCEPTION('todo');
			}

			// Grab the combination for this variation
			$query = "
				SELECT *
				FROM [|PREFIX|]product_variation_options
				WHERE voptionid IN (".$productVariation['vcoptionids'].")
			";
			$result = $GLOBALS['ISC_CLASS_DB']->query($query);
			while ($variationOption = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$variationOptions[$variationOption['voname']] = $variationOption['vovalue'];
			}
		}

		// Make sure that if variations are required, a select was made
		$productData = $this->getProductData();
		if (isset($productData['prodoptionsrequired']) && $productData['prodoptionsrequired'] && $productData['prodvariationid'] && $variation == 0) {
			throw new ISC_SANDBOX_EXCEPTION(getLang('ErrorNoVariationSelected'));
		}

		$this->setVariationOptions($variationOptions);
		$this->setVariationId($variation);

		// Attempt to set the quanitty to make sure this option is in stock
		try {
			// Force reload of product information with the variaiton attached.
			$this->productData = array();
			$this->setQuantity($this->getQuantity());
		}
		catch(ISC_SANDBOX_EXCEPTION $e) {
			$this->productData = array();
			$this->setVariationOptions($existingVariationOptions);
			$this->setVariationId($existingVariationId);
			throw $e;
		}

		// Remove cached cart item info as well as other cached info?
		if ($this->inSandbox) {
			$this->invalidateCachedTotals();
			if (!$this->getParentId()) {
				$this->getSandbox()->reapplyDiscounts();
			}
		}
		$this->regenerateHash();

		return $this;
	}

	public function setVariationId($id)
	{
		$this->variationId = $id;
		return $this;
	}

	public function setVariationOptions(array $options)
	{
		$this->variationOptions = $options;
		return $this;
	}

	public function getInventoryTrackingMethod()
	{
		$productData = $this->getProductData();
		if (!empty($productData)) {
			return $productData['prodinvtrack'];
		}

		return 0;
	}

	public function getExistingQuantityForProduct()
	{
		$quantity = 0;
		$items = $this->getSandbox()->getItems();
		foreach ($items as $item) {
			if ($item->getId() != $this->getId() && $item->getProductId() == $this->getProductId() &&
				$item->getVariationId() == $this->getVariationId()) {
					$quantity += $item->getQuantity();
			}
		}

		$quantity += $this->getQuantity();
		return $quantity;
	}

	public function getExisitingOrderQuantityForProduct()
	{
		$quantity = 0;
		$items = $this->getSandbox()->getItems();
		foreach ($items as $item) {
			if ($item->getId() != $this->getId() && $item->getProductId() == $this->getProductId() &&
				$item->getVariationId() == $this->getVariationId()) {
					$quantity += $item->getOriginalOrderQuantity();
			}
		}

		$quantity += $this->getOriginalOrderQuantity();
		return $quantity;
	}

	/**
	 */
	public function getVariationId()
	{
		return (int)$this->variationId;
	}

	public function getVariationOptions()
	{
		return $this->variationOptions;
	}

	/**
	 * Check that the supplied quantity (or quantity of the item on the sandbox)
	 * is available for this item and its inventory tracking method.
	 *
	 * @param int $quantity Quantity to check. If null uses existing sandbox item
	 * quantity.
	 * @return boolean True if the quantity is available, false if not.
	 */
	public function checkStockLevel($quantity = null)
	{
		// Inventory checking is disabled. Don't check quantity restrictions.
		if($this->inventoryChecking == false) {
			return true;
		}

		if ($quantity === null) {
			$quantity = $this->getQuantity();
		}

		$productData = $this->getProductData();

		$totalProductQuantity = $this->getExistingQuantityForProduct();

		// if this item is from an order, then we only want to deal with the difference between the originally ordered quantity and the new requested quantity
		if ($this->getSandbox()->getOrderId()) {
			$totalOrderProductQuantity = $this->getExisitingOrderQuantityForProduct();

			$quantityToCheck = $totalProductQuantity
				- $totalOrderProductQuantity
				- $this->getQuantity()
				+ $quantity;
		}
		else {
			$quantityToCheck = $totalProductQuantity
			- $this->getQuantity()
			+ $quantity;
		}
		
		if ($productData['prodphystype'] == 3 || $productData['prodphystype'] == 4) {
			$saleable = IsProductSaleable($productData, $quantityToCheck);
			if(is_array($saleable)) {
				foreach($saleable as $k => $variation) {
					if($this->getVariationId() != 0) {
						if($k == $this->getVariationId() && $variation == false) {
							return false;
						}
					}
				}
			} else {
				if($saleable == false) {
					return false;
				}
			}
		}

		if ($this->getInventoryTrackingMethod() == 1 && $quantityToCheck > $productData['prodcurrentinv']) {
			return false;
		}

		if ($this->variationId > 0 && $this->getInventoryTrackingMethod() == 2 &&
			$quantityToCheck > $productData['variation']['vcstock']) {
				return false;
		}

		return true;
	}

	/**
	 * Check the minimum and maximum quantity restrictions that may be applied
	 * to this item allow for the requested quantity.
	 *
	 * @throws ISC_SANDBOX_EXCEPTION when not meeting the quantity restrictions.
	 * @param int $quantity Quantity to check applies. If null, uses existing
	 * quantity for the sandbox item.
	 * @return boolean True when successful.
	 */
	public function checkQuantityRestrictions($quantity = null)
	{
		// Inventory checking is disabled. Don't check quantity restrictions.
		if($this->inventoryChecking == false) {
			return true;
		}

		if ($quantity === null) {
			$quantity = $this->getQuantity();
		}

		if ($quantity == 0) {
			return true;
		}

		$productData = $this->getProductData();
		$totalSandboxQuantity = $this->getExistingQuantityForProduct()
			- $this->getQuantity()
			+ $quantity;

		if ($productData['prodminqty'] && $totalSandboxQuantity < $productData['prodminqty']) {
			throw new ISC_SANDBOX_EXCEPTION(getLang('ProductMinQtyError', array(
				'product'	=> $productData['prodname'],
				'qty'		=> $productData['prodminqty']
			)));
		}
		else if ($productData['prodmaxqty'] && $totalSandboxQuantity > $productData['prodmaxqty']) {
			throw new ISC_SANDBOX_EXCEPTION(getLang('ProductMaxQtyError', array(
				'product'	=> $productData['prodname'],
				'qty'		=> $productData['prodmaxqty']
			)));
		}

		return true;
	}

	/**
	 * Throw an error message indicating that the requested quantity for this
	 * sandbox item is not available.
	 *
	 * @throws ISC_SANDBOX_EXCEPTION
	 */
	public function throwBadStockLevelError()
	{
		throw new ISC_SANDBOX_EXCEPTION(
			getLang('Error adding to sandbox - not enough in stock')
		);
	}

	/**
	 * Set the quantity of this sandbox item to the supplied value, and optionally
	 * bypassing all of the inventory and quantity restriction checks.
	 *
	 * @param int $quantity Quantity to set.
	 * @param boolean $checkStockLevel Set to false to not check inventory levels.
	 * @return ISC_SANDBOX_QUOTE_ITEM This sandbox item instance.
	 */
	public function setQuantity($quantity, $checkStockLevel = true)
	{
		$quantity = (int)$quantity;

		if ($this->inSandbox && $checkStockLevel) {
			if (!$this->checkStockLevel($quantity)) {
				$this->throwBadStockLevelError();
			}

			$this->checkQuantityRestrictions($quantity);
		}

		$oldQuantity = $this->quantity;
		$this->quantity = $quantity;
		if ($oldQuantity != $quantity && $this->inSandbox) {
			$this->invalidateCachedTotals();
		}

		return $this;
	}

	public function handleCommitToSandbox()
	{
		if (!$this->checkStockLevel()) {
			$this->throwBadStockLevelError();
		}

		$this->checkQuantityRestrictions();

		$this->invalidateCachedTotals();
	}

	public function getProductId()
	{
		return $this->productId;
	}

	public function setProductId($id)
	{
		$this->productId = (int)$id;
		return $this;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function getOriginalOrderQuantity()
	{
		return $this->originalOrderQuantity;
	}

	public function generateId()
	{
		// do not allow all-number ids to be generated for items, since a numeric id is assumed to exist in the db already when ISC_ENTITY_ORDER is editing an order
		do {
			$id = uniqid();
		} while (is_numeric($id) || $this->getSandbox()->getItemById($id));
		$this->setId($id);
		return $this;
	}

	public function getId()
	{
		if (!$this->id) {
			$this->id = -1; // to stop function recursion through generateId -> getItemById
			$this->generateId();
		}

		return $this->id;
	}

	public function setId($id)
	{
		if ($id != $this->id) {
			// Do stuff - notify children etc
		}

		$this->id = $id;
		return $this;
	}

	public function getParentId()
	{
		return $this->parentId;
	}

	public function getHash()
	{
		if (!$this->hash) {
			$this->regenerateHash();
		}

		return $this->hash;
	}

	public function regenerateHash()
	{
		$hash = array(
			$this->getType(),
			$this->getProductId(),
			$this->getVariationId(),
			$this->getParentId(),
		);
		$newHash = md5(serialize($hash));
		$this->hash = $newHash;
		return $this;
	}

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function setSku($sku)
	{
		$this->sku = $sku;
		return $this;
	}

	public function getName()
	{
		$productData = $this->getProductData();
		if (!empty($productData['prodname'])) {
			return $productData['prodname'];
		}

		return $this->name;
	}

	public function setBasePrice($price, $isCustomPrice = false)
	{
		$this->basePrice = (double)$price;
		$this->isCustomPrice = $isCustomPrice;
		if ($this->inSandbox) {
			$this->invalidateCachedTotals();
			if (!$this->getParentId()) {
				$this->getSandbox()->reapplyDiscounts();
			}
		}
		return $this;
	}

	public function getBasePrice()
	{
		if ($this->basePrice === null) {
			$this->recalculateBasePrice();
		}

		return $this->basePrice;
	}

	public function recalculateBasePrice()
	{

		$priceOptions = array(
			'quantity' => $this->getQuantity(),
			'customerGroup' => $this->getSandbox()->getCustomerGroupId(),
		);

		$productData = $this->getProductData();

		// Tack on the variation if there is one. There may not be, if we just
		// removed it.
		if (!empty($this->variationId)) {
			$priceOptions['variationModifier'] = $productData['variation']['vcpricediff'];
			$priceOptions['variationAdjustment'] = $productData['variation']['vcprice'];
		}

		$price = calculateFinalProductPrice($productData, $productData['prodcalculatedprice'], $priceOptions);
		$this->basePrice = $price;
		return $this;
	}

	public function getBaseTotal()
	{
		return $this->getBasePrice() * $this->getQuantity();
	}

	public function getPrice($incTax = null)
	{
		return $this->getBasePrice();
	}

	public function getBaseCostPrice()
	{
		$productData = $this->getProductData();
		if (!$productData) {
			return 0;
		}

		return $productData['prodcostprice'];
	}

	public function getCostPrice($incTax = null)
	{
		return $this->getBasePrice();
	}

	public function getTotal($incTax = null)
	{
		return $this->getBasePrice() * $this->getQuantity();
	}

	public function getSku()
	{
		$productData = $this->getProductData();

		// ISC-1209: return variation sku if available
		if (!empty($productData['prodvariationid'])) {
			if (isset($productData['variation']) && !empty($productData['variation'])) {
				$v = $productData['variation'];
				if (!empty($v['vcsku'])) {
					return $v['vcsku'];
				}
			}
		}

		if (!empty($productData['prodcode'])) {
			return $productData['prodcode'];
		}

		return $this->sku;
	}

	public function incrementQuantity($by)
	{
		$this->setQuantity($this->getQuantity() + $by);
		return $this;
	}

	public function getCategoryIds()
	{
		$productData = $this->getProductData();
		if (!empty($productData)) {
			return explode(',', $productData['prodcatids']);
		}

		return array();
	}

	/**
	 * Set the flag indicating if inventory checking should be enabled for this
	 * item. This is useful in cases where inventory levels for the product should
	 * be completely disregarded.
	 *
	 * @param boolean $checkInventory True to enable inventory checking, false if not.
	 * @return ISC_SANDBOX_QUOTE_ITEM This sandbox item instance.
	 */
	public function setInventoryCheckingEnabled($checkInventory)
	{
		$this->inventoryChecking = $checkInventory;
		return $this;
	}

	/**
	 * Get the status flag indicating if inventory checking should be enabled for
	 * this item whenever the quantity is adjusted.
	 *
	 * @return boolean True if inventory levels should be checked, false if not.
	 */
	public function getInventoryCheckingEnabled()
	{
		return $this->inventoryChecking;
	}
}
