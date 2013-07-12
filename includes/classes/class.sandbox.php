<?php
class ISC_SANDBOX
{
	private $pageTitle = "";
	private $badCouponCode = false;
	private $badCouponMessage = "";
	private $sandboxErrorMessage = "";

	/**
	 * @var int The ID of the item that was just added to the sandbox.
	 */
	public $newSandboxItem = 0;

	public function __construct()
	{
		if (isset($_SESSION['JustAddedProduct']) && $_SESSION['JustAddedProduct'] != '') {
			// Get the category of the last product added to the store
			$query = sprintf("select c.categoryid, catname from [|PREFIX|]categoryassociations ca inner join [|PREFIX|]categories c on ca.categoryid=c.categoryid where ca.productid='%d' ", $GLOBALS['ISC_CLASS_DB']->Quote((int)$_SESSION['JustAddedProduct']));
			$query .= $GLOBALS['ISC_CLASS_DB']->AddLimit(0, 1);
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				if(CustomerGroupHasAccessToCategory($row['categoryid'])) {
					$GLOBALS['KeepShoppingLink'] = CatLink($row['categoryid'], $row['catname']);
					$GLOBALS['KeepShoppingText'] = sprintf(GetLang('ClickHereToKeepShoppingCat'), isc_html_escape($row['catname']));
					break;
				}
			}
		}
	}

	public function HandlePage()
	{
		$action = "";
		if (isset($_REQUEST['action'])) {
			$action = isc_strtolower($_REQUEST['action']);
		}

		$routes = array(
			'add'						=> 'AddToSandbox',
			'remove'					=> 'RemoveFromSandbox',
			'update'					=> 'UpdateInSandbox',
			'editproductfieldsinsandbox'=> 'EditProductFieldsInSandbox',
			'addreorderitems'			=> 'AddReorderItems',
			'dispdata'					=> 'DisplayData',
			'clear'						=> 'ClearSandbox',
			'remoteadd' 				=> 'RemoteAdd',
			'buynow'                    => 'RemoteAddOne'
			'rest' 						=> 'HandleRESTRequest',
			'addall'					=> 'AddAllToCart',
			'fetch'						=> 'PrintJSON'
		);

		if(isset($routes[$action])) {
			$this->$routes[$action]();
		}
		else {
			$this->showRegularSandbox();
		}
	}

	/**
	* Adds a simple product (no variations, configurable fields or events) to the sandbox
	*
	* @param mixed $product_id
	* @param mixed $qty
	*/
	public function AddSimpleProductToSandbox($product_id, $qty = 1)
	{
		$error = "";
		$query = "
			SELECT p.*, ".GetProdCustomerGroupPriceSQL()."
			FROM [|PREFIX|]products p
			WHERE p.productid='".(int)$product_id."'
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		$product = $GLOBALS['ISC_CLASS_DB']->Fetch($result);

		// Check that the customer has permisison to view this product
		$canView = false;
		$productCategories = explode(',', $product['prodcatids']);
		foreach($productCategories as $categoryId) {
			// Do we have permission to access this category?
			if(CustomerGroupHasAccessToCategory($categoryId)) {
				$canView = true;
			}
		}
		if($canView == false) {
			$_SESSION['AddProductErrorMessage'] = sprintf(GetLang("NoPermissionAddProduct"), $product["prodname"]);
			return false;
		}

		try {
			$item = new ISC_QUOTE_ITEM;
			$item
				->setQuote($this->getQuote())
				->setProductId($product_id)
				->setQuantity($qty);
			$this->getQuote()->addItem($item);
		}
		catch(ISC_QUOTE_EXCEPTION $e) {
			$_SESSION['AddProductErrorMessage'] = $e->getMessage();
			return false;
		}

		return true;
	}
	
	private function PrintJSON() {
		$data = $this->GetJSON();
		die($data);
	}
	
		private function HandleRESTRequest() {
		$method = $_SERVER['REQUEST_METHOD'];
		
		if ($method == "POST") {
			// Remove Item From Cart
			if($_POST['_method'] == "DELETE") {
				$itemId = $_GET['id'];
				
				if(!$this->getQuote()->hasItem($itemId)) {
					header('HTTP/1.0 400 Bad Request', true, 400);
					die();
				}
				$this->getQuote()
						->removeItem($itemId);	
			} else if($_POST['_method'] == "PUT") {
				try {
					$_POST['model'] = json_decode($_POST['model']);
					$itemId = $_POST['model']->sid;
					$quantity = $_POST['model']->quantity;;

					if(!$this->getQuote()->hasItem($itemId)) {
						die(json_encode($_POST['model']));
					}

					// if the quantity updated to 0, then remove it from cart
					if (empty ($quantity)) {
						$this->getQuote()
						->removeItem($itemId);
					} else {
						$item = $this->getQuote()->getItemById($itemId);
						if(!$item->getParentId()) {
							$item->setQuantity($quantity);
						}
					}
				}
				catch(ISC_QUOTE_EXCEPTION $e) {
					
				}
			}
		}
	}
	
	private function AddAllToCart() {
		$items = $this->getQuote()->getItems();
		$GLOBALS['ISC_CLASS_CART'] = GetClass('ISC_CART');
		foreach($items as $item) {
			$id = $item->getProductId();
			$quantity = $item->getQuantity();
			$vid = $item->getVariationId();
			$GLOBALS['ISC_CLASS_CART']->RemoteAddProductToCart($id, $quantity, $vid);
		}
		
		$this->ClearSandbox();
		
		redirect('cart.php');
	}
	
	private function RemoteAdd() {
		$product = $this->AddToSandbox();
		if($product) {
			$sandboxContents = json_decode($this->GetJSON());
			$sandboxDetails = array('products' => $sandboxContents, 'justAdded' => $product);
			
			die(json_encode($sandboxDetails));
		} else {
			die("404");
		}
	}

	private function RemoteAddOne() {
		$product = $this->AddToSandbox();
		if(!$product) {
			die("404");
		}

		$GLOBALS['ISC_CLASS_CART'] = GetClass('ISC_CART');
		$id = $product[0];
		$quantity = $product[1];
		$vid = $product[2];

		if ($GLOBALS['ISC_CLASS_CART']->RemoteAddProductToCart($id, $quantity, $vid)) {
			$this->ClearSandbox();
			redirect('cart.php');
		} else {
			die("404");
		}
		
	}

	private function AddToSandbox()
	{
		$error = false;
		$product = false;
		$product_id = false;
		
		if(isset($_REQUEST['product_id']) && (bool)GetConfig('AllowPurchasing')) {
			$product_id = (int)$_REQUEST['product_id'];
			$query = "
				SELECT p.*, ".GetProdCustomerGroupPriceSQL()."
				FROM [|PREFIX|]products p
				WHERE p.productid='".$product_id."'
			";
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			$product = $GLOBALS['ISC_CLASS_DB']->Fetch($result);
			if (!$product) {
				$error = true;
			} else {
				$GLOBALS['ProductJustAdded'] = $product_id;
				$GLOBALS['Product'] = &$product;
			}
		} else {
			$error = true;
		}
		
		if ($error) {
			die("404"); // Product cannot be added to Sandbox
		}

		// Check that the customer has permisison to view this product
		$canView = false;
		$productCategories = explode(',', $product['prodcatids']);
		foreach($productCategories as $categoryId) {
			// Do we have permission to access this category?
			if(CustomerGroupHasAccessToCategory($categoryId)) {
				$canView = true;
			}
		}
		if($canView == false) {
			die("403"); // User cannot view product, throw error. 
		}

		$variation = 0;
		if(isset($_REQUEST['variation_id']) && $_REQUEST['variation_id'] != 0) {
			$variation = (int)$_REQUEST['variation_id'];
		}
		// User added a variation but had javascript disabled
		else if(isset($_REQUEST['variation']) && is_array($_REQUEST['variation']) && $_REQUEST['variation'][1] != 0) {
			$variation = $_REQUEST['variation'];
		}

		$qty = 1;
		if(isset($_REQUEST['qty'])) {
			if(is_array($_REQUEST['qty'])) {
				$qty = (int)array_pop($_REQUEST['qty']);
			}
			else if($_REQUEST['qty'] > 0) {
				$qty = (int)$_REQUEST['qty'];
			}
		}

		try {
			$item = new ISC_SANDBOX_QUOTE_ITEM;
			$item
				->setSandbox($this->getQuote())
				->setProductId($product_id)
				->setQuantity($qty)
				->setVariation($variation);

			$this->getQuote()->addItem($item);
		}
		catch(ISC_QUOTE_EXCEPTION $e) {
			if($e->getCode() == ISC_QUOTE_EXCEPTION::ERROR_NO_STOCK && $showMinQuantityAdjustment) {
				flashMessage(getLang('CannotAddMinQuantityToSandbox', array(
					'minqty' => $qty,
					'product' => $product['prodname']
				)), MSG_ERROR, prodLink($product['prodname']));
			}
			else {
				flashMessage($e->getMessage(), MSG_ERROR, prodLink($product['prodname']));
			}
		}

		$_SESSION['JustAddedProduct'] = $product_id;

		// Are we redirecting to a specific location?
		if(isset($_REQUEST['returnUrl'])) {
			$redirectLocation = urldecode($_REQUEST['returnUrl']);
			$urlPieces = @parse_url($redirectLocation);
			$storeUrlPieces = @parse_url(GetConfig('ShopPath'));
			if(is_array($urlPieces) && isset($urlPieces['host'])) {
				$urlHost = str_replace('www.', '', isc_strtolower($urlPieces['host']));
				$storeHost = str_replace('www.', '', isc_strtolower($storeUrlPieces['host']));
				if($urlHost == $storeHost) {
					if(strpos($redirectLocation, '?') === false) {
						$redirectLocation .= '?';
					}
					else {
						$redirectLocation .= '&';
					}
					$redirectLocation .= 'justAddedProduct='.$product_id;
					redirect($redirectLocation);
				}
			}
		}

		$justAdded = array(
			'product_id' => $product_id,
			'quanity' 	 => $qty,
			'variation'  => $variation
		);
		
		return $justAdded;
	}
	
	public function GetQuoteJSON() {
		$types = array();
		
		$quote = $this->getQuote();
		foreach($quote->getItems() as $item) {
			$temp['thumb'] = $item->getThumbnail();
			$temp['price'] = number_format($item->getPrice(),2);
			$temp['name'] = $item->getName();
			$temp['quantity'] = $item->getQuantity();
			$temp['id'] = $item->getId();
			$temp['size'] = $item->getVariationOptions();
			
			$temp['type'] = $item->getType();
			
			if(!isset($types[$temp['type']]['title'])) {
				switch($temp['type']) {
					case 0:
						$types[$temp['type']]['title'] = "Faces";
						break;
					case 1:
						$types[$temp['type']]['title'] = "Straps";
						break;
					case 2:
						$types[$temp['type']]['title'] = "Mods";
						break;
					case 3:
						$types[$temp['type']]['title'] = "Sets";
						break;
				}
			}
			
			$types[$temp['type']]['products'][] = $temp;
			unset($temp);
		}
		
		$finalData['total'] = $quote->getBaseSubTotal();
		$finalData['numproducts'] = $quote->getNumItems();
		$finalData['types'] = $types;
		
		return json_encode($finalData);
	}
	
	public function GetJSON() {
		$data = array(
			'products' => array(),
			'mods' => array()
		);
		$faces = array();
		$straps = array();
		$mods = array();
		
		$items = $this->getQuote()->getItems();

		foreach($items as $item) {
			$data['products'][] = array(
				'id'   => $item->getProductId(),
				'vid'  => $item->getVariationId(),
				'sid' => $item->getId(),
				'phystype' => $item->getType(),
				'name' => $item->getName(),
				'quantity' => $item->getQuantity(),
				'price' => round($item->getPrice(),2),
				'thumb' => $item->getTinyThumbnail(),
				'thumbstand' => $item->getThumbnail(),
				'standard' => $item->getStandardImage(),
				'associations' => $item->getAssociations(),
				'size' => $item->getVariationOptions()
			);
			
			$associations = $item->getAssociations();
			
			if($item->getType() == "1") {
				$faces[] = array($item->getProductId(), $item->getVariationOptions());
			} else if($item->getType() == "2") {
				$straps[] = array($item->getProductId(), $item->getVariationOptions());
			} else if(!empty($associations)) {
				foreach($item->getAssociations() as $association) {
					if($association['prodphystype'] == "1") {
						$faces[] = array((int) $association['productid'], $item->getVariationOptions());
					} else if($association['prodphystype'] == "2") {
						$straps[] = array((int) $association['productid'], $item->getVariationOptions());
					}
				}
			}
		}
		
		$faces = array_map("unserialize", array_unique(array_map("serialize", $faces)));
		$straps = array_map("unserialize", array_unique(array_map("serialize", $straps)));
		
		foreach($faces as $face) {
			foreach($straps as $strap) {
				if($face[1]['Size'] == $strap[1]['Size']) {
					$data['mods'][] = $this->GetModData($face, $strap);
				}
			}
		}
		
		if(count($data['mods']) == 0) {
			foreach($data['products'] as $product) {
				$product['thumbstand'] = substr($product['thumbstand'], (strpos($product['thumbstand'],'product_images')+15));
				$data['mods'][] = array(
					'faceid' => $product['id'],
					'id' => $product['id'],
					'imagefilethumb' => $product['thumbstand'],
					'imagefilestd' => $product['standard'],
					'prodname' => $product['name'],
					'size' => $product['size']['Size'],
					'strapid' => $product['id'],
					'link' => prodLink($product['name']),
					'quicklink' => prodLink($product['name']). '?quickView=true'
				);
			}
		}
		
		$data['ssid'] = GetSandboxSession();
		
		return json_encode($data);
	}
	
	public function GetModData($face, $strap) {
		if(!$face || !$strap) return false;
		
		$query = sprintf("
			SELECT 
				p.prodname, pi.imagefilethumb, pi.imagefilestd, a.assocbaseid as id
			FROM
				 [|PREFIX|]product_associations aa, [|PREFIX|]product_associations a
			LEFT JOIN [|PREFIX|]products p
				ON (p.productid = a.assocbaseid)
			LEFT JOIN [|PREFIX|]product_images pi
				ON (p.productid=pi.imageprodid AND pi.imageisthumb=1)
			WHERE aa.assocprodid = %d AND a.assocbaseid = aa.assocbaseid AND a.assocprodid = %d
		", $face[0], $strap[0]);
		
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$row['faceid'] = $face[0];
			$row['strapid'] = $strap[0];
			$row['size'] = $face[1]['Size'];
			$row['link'] = prodLink($row['prodname']);
			$row['quicklink'] = prodLink($row['prodname']) . '?quickView=true';
			return $row;
		}
	}
	
	public function RemoteRemoveFromSandbox()
	{
		if(isset($_GET['item']) && $this->getQuote()->hasItemByPId($_GET['item'])) {
			try {
				$this->getQuote()
					->removeItemByPId($_GET['item']);
			}
			catch(ISC_QUOTE_EXCEPTION $e) {
				return false;
			}
		}

		return true;
	}
	
	private function ClearSandbox() {
		$this->getQuote()->removeAllItems();
		
		return true;
	}
	
	private function RemoveFromSandbox()
	{
		if(isset($_GET['item']) && $this->getQuote()->hasItem($_GET['item'])) {
			try {
				$this->getQuote()
					->removeItem($_GET['item']);
			}
			catch(ISC_QUOTE_EXCEPTION $e) {
				flashMessage($e->getMessage(), MSG_ERROR, 'sandbox.php');
			}
		}

		flashMessage(getLang('SandboxUpdated'), MSG_SUCCESS, 'sandbox.php');
	}

	private function UpdateInSandbox()
	{
		if(!empty($_REQUEST['qty']) && is_array($_REQUEST['qty'])) {
			foreach($_REQUEST['qty'] as $itemId => $quantity) {
				try {
					if(!$this->getQuote()->hasItem($itemId)) {
						continue;
					}

					// if the quantity updated to 0, then remove it from sandbox
					if (empty ($quantity)) {
						$this->getQuote()
						->removeItem($itemId);
					} else {
						$item = $this->getQuote()->getItemById($itemId);
						if(!$item->getParentId()) {
							$item->setQuantity($quantity);
						}
					}
				}
				catch(ISC_QUOTE_EXCEPTION $e) {
					flashMessage($e->getMessage(), MSG_ERROR);
				}
			}
		}

		redirect('sandbox.php');
	}

	private function ShowRegularSandbox()
	{
		unset($_SESSION['IsCheckingOut']);

		// suggestive sandbox functionality
		$productId = 0;
		if(isset($_REQUEST['suggest']) &&
			$this->getQuote()->hasItem($_REQUEST['suggest'])) {
				$item = $this->getQuote()->getItemById($_REQUEST['suggest']);
				$this->newSandboxItem = $_REQUEST['suggest'];
				$productId = $item->getProductId();
		}

		if ($productId > 0) {
			$query = sprintf("
				SELECT * FROM
				[|PREFIX|]products
				WHERE productid='%d'
			", $GLOBALS['ISC_CLASS_DB']->Quote($productId));

			$Result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			$product = $GLOBALS['ISC_CLASS_DB']->Fetch($Result);
			$GLOBALS['Product'] = $product;

			$GLOBALS['ProductJustAdded'] = $productId;
		} else {
			$GLOBALS['ProductJustAdded'] = false;
		}

		// Are gift certificates disabled?
		if (GetConfig('EnableGiftCertificates') == 0) {
			$GLOBALS['HidePanels'][] = "SideGiftCertificateCodeBox";
		}

		// Was a coupon code applied successfully?
		if (!isset($_GET['coupon_applied'])) {
			// Nope, so hide the message
			$GLOBALS['HideSandboxCouponAppliedPanel'] = "none";
		}

		if ($this->getQuote()->getNumItems() == 0) {
			$GLOBALS['HideCheckoutButton'] = "none";
		}

		// Show the regular shopping sandbox page
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("sandbox");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

	protected function getQuote()
	{
		return getCustomerSandbox();
	}
}
