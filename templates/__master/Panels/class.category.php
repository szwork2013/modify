<?php

	class ISC_CATEGORY
	{
		/**
		 * Determines if category flyout menus are supported by the current store settings + template combination
		 *
		 * @return bool
		 */
		public static function areCategoryFlyoutsEnabled ()
		{
			if (GetConfig('CategoryListStyle') != 'flyout') {
				// flyouts are disabled if the setting is disabled, period
				return false;
			}

			if (GetConfig('CategoryListDepth') < 2) {
				// flyouts only work when the listing depth is >= 2
				return false;
			}

			if (!isset($GLOBALS['TPL_CFG']['EnableFlyoutMenuSupport']) || !$GLOBALS['TPL_CFG']['EnableFlyoutMenuSupport']) {
				// flyouts are only enabled if the current template supports them
				return false;
			}

			return true;
		}

		private $_catid = 0;
		private $_catparent = 0;
		private $_catnumproducts = 0;
		private $_catpage = 0;
		private $_catstart = 0;
		private $_catnumpages = 0;
		private $_catenableoptimizer = 0;

		private $_catname = "";
		private $_catdesc = "";
		private $_catsort = "";
		private $_catsortfield = "";
		private $_catpath = "";
		private $_catlayoutfile = "";
		private $_catphystype = "";
		private $_catsizeid = "";
		private $_catcolid = "";

		private $_catpagetitle = '';
		private $_catmetakeywords = '';
		private $_catmetadesc = '';
		private $_catsearchkeywords = '';

		private $_cattrails = array();
		private $_catproducts = array();

		private $_google_ps_enabled = '';

		/**
		 * @var string A CSV list of the categories that products should be pulled from for this category.
		 */
		public $loadCats = '';

		public $Data = array();

		public function __construct()
		{
			if(isset($_GET['ssid']) && !empty($_GET['ssid']) {
				LoadSandboxByToken($_GET['ssid']);
			}
			$GLOBALS['AdditionalScripts'][] = GetConfig('AppPath').'/javascript/shop.js';
			$GLOBALS['AdditionalScripts'][] = GetConfig('AppPath').'/javascript/history.js';
			$GLOBALS['CatId'] = 0;
			$this->_catlayoutfile = "category";
		}

		/**
		 * Get the category ID for the category we're currently viewing.
		 *
		 * @return int The category ID.
		 */
		public function GetCategoryId()
		{
			return $this->_catid;
		}
		
		public function GetParentId()
		{
			return $this->_catparent;
		}

		public function SetName($name)
		{
			$this->_catname = $name;
		}

		public function GetName()
		{
			return $this->_catname;
		}

		public function GetPageTitle()
		{
			return $this->_catpagetitle;
		}

		public function SetCatPageTitle($pagetitle)
		{
			$this->_catpagetitle = $pagetitle;
		}

		public function SetMetaKeywords($keywords)
		{
			$this->_catmetakeywords = $keywords;
		}

		public function SetMetaDesc($desc)
		{
			$this->_catmetadesc = $desc;
		}

		public function SetSearchKeywords($keywords)
		{
			$this->_catsearchkeywords = $keywords;
		}

		public function SetPage()
		{
			if (isset($_GET['page'])) {
				$this->_catpage = abs((int)$_GET['page']);
			} else {
				$this->_catpage = 1;
			}
		}

		public function GetPage()
		{
			return $this->_catpage;
		}

		// Workout the number of pages for products in this category
		public function SetNumPages()
		{
			if (GetConfig('CategoryProductsPerPage') > 0) {
				$this->_catnumpages = ceil($this->GetNumProducts() / GetConfig('CategoryProductsPerPage'));
			}
			else {
				$this->_catnumpages = 0;
			}
		}

		public function GetNumPages()
		{
			return $this->_catnumpages;
		}

		public function GetProducts(&$Ref)
		{
			$Ref = $this->_catproducts;
		}

		// Set the start record for the products query
		public function SetStart()
		{
			$start = 0;

			switch ($this->_catpage) {
				case 1: {
					$start = 0;
					break;
				}
				// Page 2 or more
				default: {
					$start = ($this->GetPage() * GetConfig('CategoryProductsPerPage')) - GetConfig('CategoryProductsPerPage');
					break;
				}
			}

			$this->_catstart = $start;
		}

		public function GetStart()
		{
			return $this->_catstart;
		}

		/**
		 * Generate the SQL required to show products from the current category.
		 *
		 * @return string The generated SQL to be piped in to a query to fetch products.
		 */
		private function getProductWhereSQLRestriction()
		{
			$sql = 'p.prodvisible=1 AND ca.categoryid IN ('.$this->GetProductCategoryIds().')';

			$priceColumn = 'p.prodcalculatedprice';
			// If showing prices including tax (or both inc and ex) then the sort column changes
			if($this->getTaxPricingJoin()) {
				$priceColumn = 'tp.calculated_price';
			}

			if(!empty($_GET['price_min'])) {
				$sql .= " AND ".$priceColumn." >= '".(int)$_REQUEST['price_min']."'";
			}

			if(!empty($_GET['price_max'])) {
				$sql .= " AND ".$priceColumn." <= '".(int)$_REQUEST['price_max']."'";
			}

			if(!empty($_GET['price_max']) || !empty($_GET['price_min'])) {
				$sql .= ' AND p.prodhideprice=0';
			}
			
			if(!empty($_GET['type']) && $_GET['type'] > 0 && is_numeric($_GET['type'])) {
				$sql .= " AND p.prodphystype= '".(int)$_REQUEST['type']."'";
			}
			
			if(!empty($_GET['color']) && $_GET['color'] > 0 && is_numeric($_GET['color'])) {
				$sql .= " AND FIND_IN_SET(". (int)$_REQUEST['color'] .", p.prodcolorids)";
			}
			// To-Do: Add color filtering once that exists

			return $sql;
		}

		public function SetNumProducts()
		{
			$taxJoin = $this->getTaxPricingJoin();
			// Join is not required unless filtering by price
			if(empty($_GET['price_min']) && empty($_GET['price_max'])) {
				$taxJoin = '';
			}
			$query = "
				SELECT
					COUNT(DISTINCT ca.productid) AS numproducts
				FROM
					[|PREFIX|]categoryassociations ca
					INNER JOIN [|PREFIX|]products p USE INDEX (PRIMARY) ON p.productid = ca.productid
					".$taxJoin."
				WHERE
					".$this->getProductWhereSQLRestriction()."
			";

			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			$row = $GLOBALS['ISC_CLASS_DB']->Fetch($result);
			$this->_catnumproducts = $row['numproducts'];
		}

		public function GetNumProducts()
		{
			return $this->_catnumproducts;
		}

		public function SetDesc($desc)
		{
			if($desc == '<br>' || $desc == '<br />' || $desc == '<br/>') {
				$desc = '';
			}
			$this->_catdesc = $desc;
		}

		public function GetDesc()
		{
			return $this->_catdesc;
		}

		public function SetId($id = null)
		{
			if ($id != null && (int)$id > -1) {
				$this->_catid = (int)$id;
			}
		}
		
		public function SetParentId($id = null)
		{
			if ($id != null && (int)$id > -1) {
				$this->_catparent = (int)$id;
			}
		}

		public function SetTrail($trail)
		{
			foreach($this->_cattrails as $value) {
				if($value[0] == $trail[0]) {
					return;
				}
			}
			$this->_cattrails[] = $trail;
		}

		public function GetTrail()
		{
			return $this->_cattrails;
		}

		public function GetId()
		{
			return $this->_catid;
		}

		public function SetSortField($Field)
		{
			// Set the field that the results will be sorted by in the query
			$this->_catsortfield = $Field;
		}

		public function GetSortField()
		{
			if (!$this->_catsortfield) {
				$this->_catsortfield = 'p.prodsortorder asc';
			}
			return $this->_catsortfield;
		}


		public function SetEnableOptimizer($enabled=0)
		{
			$this->_catenableoptimizer = $enabled;
		}

		public function SetEnableGooglePs($enabled=0)
		{
			$this->_google_ps_enabled = $enabled;
		}

		public function GetEnableOptimizer($enabled=0)
		{
			if(isset($this->_catenableoptimizer)) {
				return $this->_catenableoptimizer;
			} else {
				return 0;
			}
		}

		public function SetSort()
		{
			// Pre-select the current sort order (if any)
			if (isset($_GET['sort'])) {
				$sort = $_GET['sort'];
			} else {
				$sort = "featured";
			}
			$this->_catsort = $sort;

			$priceColumn = 'p.prodcalculatedprice';
			// If we need to join the tax pricing table then the sort price column for
			// products changes.
			if($this->getTaxPricingJoin()) {
				$priceColumn = 'tp.calculated_price';
			}

			switch ($sort) {
				case "featured": {
					$GLOBALS['SortFeaturedSelected'] = 'selected="selected"';
					$this->SetSortField("p.prodsortorder asc");
					break;
				}
				case "newest": {
					$GLOBALS['SortNewestSelected'] = 'selected="selected"';
					$this->SetSortField("p.productid desc");
					break;
				}
				case "bestselling": {
					$GLOBALS['SortBestSellingSelected'] = 'selected="selected"';
					$this->SetSortField("p.prodnumsold desc");
					break;
				}
				case "alphaasc": {
					$GLOBALS['SortAlphaAsc'] = 'selected="selected"';
					$this->SetSortField("p.prodname asc");
					break;
				}
				case "alphadesc": {
					$GLOBALS['SortAlphaDesc'] = 'selected="selected"';
					$this->SetSortField("p.prodname desc");
					break;
				}
				case "avgcustomerreview": {
					$GLOBALS['SortAvgReview'] = 'selected="selected"';
					$this->SetSortField("prodavgrating desc");
					break;
				}
				case "priceasc": {
					$GLOBALS['SortPriceAsc'] = 'selected="selected"';
					$this->SetSortField($priceColumn.' ASC');
					break;
				}
				case "pricedesc": {
					$GLOBALS['SortPriceDesc'] = 'selected="selected"';
					$this->SetSortField($priceColumn.' DESC');
					break;
				}
			}
		}

		public function SetPhysType()
		{
			// Pre-select the current sort order (if any)
			if (isset($_GET['type'])) {
				$this->_catphystype = $_GET['type'];
			} else {
				$this->_catphystype  = false;
			}
		}

		public function SetSizeId()
		{
			// Pre-select the current sort order (if any)
			if (isset($_GET['size'])) {
				$this->_catsizeid = $_GET['size'];
			} else {
				$this->_catsizeid = false;
			}
		}
		
		public function SetColorId()
		{
			// Pre-select the current sort order (if any)
			if (isset($_GET['color'])) {
				$this->_catcolid = $_GET['color'];
			} else {
				$this->_catcolid = false;
			}
		}
		
		public function GetPhysType()
		{
			return $this->_catphystype;
		}
		
		public function GetSizeId()
		{
			return $this->_catsizeid;
		}
		
		public function GetColorId()
		{
			return $this->_catcolid;
		}

		public function GetSort()
		{
			return $this->_catsort;
		}

		public function GetCatPath()
		{
			return $this->_catpath;
		}

		public function SetCatPath($Path)
		{
			$this->_catpath = $Path;
			$GLOBALS['CatPath'] = $Path;
		}

		public function GetLayoutFile()
		{
			$layoutFile = $this->_catlayoutfile;

			if($GLOBALS['ISC_CLASS_TEMPLATE']->getTemplateFilePath($layoutFile)) {
				return $layoutFile;
			}
			else {
				return $this->_prodlayoutfile = 'category';
			}
		}

		public function SetLayoutFile($File)
		{
			$this->_catlayoutfile = str_replace(array(".html", ".htm"), "", $File);
		}

		public function SetCategoryData()
		{
			// Retrieve the query string variables. Can't use the $_GET array
			// because of SEO friendly links in the URL
			SetPGQVariablesManually();

			// Grab the page sort details
			if (isset($_REQUEST['category'])) {
				error_log($_REQUEST['category']);
				$GLOBALS['CategoryPath'] = isc_html_escape($_REQUEST['category']);
				$path = explode("/", $_REQUEST['category']);
			}
			else {
				$GLOBALS['URL'] = implode("/", $GLOBALS['PathInfo']);
				$path = $GLOBALS['PathInfo'];
				array_shift($path);
			}

			$this->SetSort();
			$this->SetPhysType();
			$this->SetSizeId();
			$this->SetColorId();

			$this->SetCatPath($path);

			$arrCats = $this->_catpath;

			for ($i = 0; $i < count($arrCats); $i++) {
				$arrCats[$i] = MakeURLNormal($arrCats[$i]);
			}

			if (!isset($arrCats[0])) {
				$arrCats[0] = '';
			}

			// The first category *MUST* have a parent ID of 0 or it's invalid
			$parentCat = 0;

			// Because of the way SEO friendly links work at the moment, we need to loop through
			// the category path to check each level is valid. Ideally we'd store the built category
			// URL in the database and check based on that.
			for($i = 0; $i < count($arrCats); ++$i) {
				if(empty($arrCats[$i])) {
					continue;
				}

				$query = "
					SELECT
						*
					FROM
						[|PREFIX|]categories
					WHERE
						catname = '".$GLOBALS['ISC_CLASS_DB']->quote($arrCats[$i])."' AND
						catparentid = '".(int)$parentCat."' AND
						catvisible = 1
				";
				$result = $GLOBALS['ISC_CLASS_DB']->query($query);
				$category = $GLOBALS['ISC_CLASS_DB']->fetch($result);

				// Supplied category could not be found. They've followed an incorrect link so show the 404 page.
				if(!$category) {
					$GLOBALS['ISC_CLASS_404'] = GetClass('ISC_404');
					$GLOBALS['ISC_CLASS_404']->HandlePage();
					exit;
				}

				// Add this category to the breadcrumb/trail
				$this->SetTrail(array($category['categoryid'], $category['catname']));
				$parentCat = $category['categoryid'];
			}

			if (!empty($category)) {
				// $category contains the details of the actual category we're viewing
				$this->Data = $category;
				$this->SetId($category['categoryid']);
				$this->SetParentId($category['catparentid']);
				$this->SetName($category['catname']);
				$this->SetDesc($category['catdesc']);
				$this->SetLayoutFile($category['catlayoutfile']);
				$this->SetCatPageTitle($category['catpagetitle']);
				$this->SetMetaKeywords($category['catmetakeywords']);
				$this->SetMetaDesc($category['catmetadesc']);
				$this->SetSearchKeywords($category['catsearchkeywords']);
				$this->SetEnableOptimizer($category['cat_enable_optimizer']);
				$this->SetEnableGooglePs($category['google_ps_enabled']);
			} else {
				// Reached /categories/ directly with no additional path.
				// This is the root category
			}

			// Do we have permission to access this category?
			if(!CustomerGroupHasAccessToCategory($this->_catid)) {
				$noPermissionsPage = GetClass('ISC_403');
				$noPermissionsPage->HandlePage();
				exit;
			}

			$GLOBALS['CatTrail'] = $this->GetTrail();

			// Find the number of products in the category
			$this->loadCats = $this->GetId();

			// This product should show products from this category, but if there are none
			// show them from any child categories too
			if(GetConfig('CategoryListingMode') == 'emptychildren') {
				// Load up how many products there are in the current category, if none, load from children too
				$this->SetNumProducts();
				if($this->_catnumproducts == 0) {
					$cats = $this->GetChildCategories();

					// Add in the current category too- which helps out shop by price etc
					$cats[] = $this->getId();

					$group = GetClass('ISC_CUSTOMER')->GetCustomerGroup();
					if(is_array($group) && $group['categoryaccesstype'] == 'specific') {
						$cats = array_intersect($cats, $group['accesscategories']);
					}

					$this->loadCats = trim(implode(',', array_unique($cats)), ',');
				}
			}

			// Otherwise, this category shows products from itself + children
			else if(GetConfig('CategoryListingMode') == 'children') {
				$cats = $this->GetChildCategories();
				$cats[] = $this->GetId();

				$group = GetClass('ISC_CUSTOMER')->GetCustomerGroup();
				if(is_array($group) && $group['categoryaccesstype'] == 'specific') {
					$cats = array_intersect($cats, $group['accesscategories']);
				}

				$this->loadCats = trim(implode(',', array_unique($cats)), ',');
			}

			$this->SetNumProducts();

			// Setup paging details
			$this->SetPage();
			$this->SetStart();
			$this->SetNumPages();

			// Load the products for the categories page
			$this->LoadProductsForPage();
		}

		/**
		 * Get a CSV list of the categories that products should be pulled from for this category.
		 *
		 * @return string a CSV list of category IDs.
		 */
		public function GetProductCategoryIds()
		{
			return $this->loadCats;
		}

		public function HandlePage()
		{
			$this->SetCategoryData();
			$this->ShowCategory();
		}

		public function BuildTitle()
		{
			// Build an SEO-friendly page title
			$title = "";
			if (trim($this->GetPageTitle()) != "") {
				$title = rtrim($this->GetPageTitle());
				return $title;
			}
			foreach ($this->GetTrail() as $trail) {
				$title .= sprintf("%s - ", $trail[1]);
			}
			$title = rtrim($title, ' -');
			$title .= sprintf(" - %s", GetConfig('StoreName'));
			return $title;
		}

		public function ShowCategory()
		{
			$this->_insertOptimizerScripts();

			$GLOBALS['CatId'] = (int) $this->GetId();
			$GLOBALS['CatName'] = isc_html_escape($this->GetName());
			$GLOBALS['CatDesc'] = $this->GetDesc();

			$GLOBALS['CompareLink'] = CompareLink();

			// Do we need to add RSS feeds in for this category?
			if (!isset($GLOBALS['HeadRSSLinks'])) {
				$GLOBALS['HeadRSSLinks'] = '';
			}
			if (GetConfig('RSSCategories') != 0) {
				if (GetConfig('RSSNewProducts') != 0) {
					$GLOBALS['HeadRSSLinks'] .= GenerateRSSHeaderLink($GLOBALS['ShopPath']."/rss.php?categoryid=".$GLOBALS['CatId'], sprintf(GetLang('HeadRSSNewProductsCategory'), $GLOBALS['CatName']));
				}
				if (GetConfig('RSSPopularProducts') != 0) {
					$GLOBALS['HeadRSSLinks'] .= GenerateRSSHeaderLink($GLOBALS['ShopPath']."/rss.php?action=popularproducts&categoryid=".$GLOBALS['CatId'], sprintf(GetLang('HeadRSSPopularProductsCategory'), $GLOBALS['CatName']));
				}
			}

			if ($this->_catmetakeywords != "") {
				$GLOBALS['ISC_CLASS_TEMPLATE']->SetMetaKeywords($this->_catmetakeywords);
			}

			if ($this->_catmetadesc != "") {
				$GLOBALS['ISC_CLASS_TEMPLATE']->SetMetaDescription($this->_catmetadesc);
			}

			if(!$this->GetNumProducts()) {
				$GLOBALS['HideRightColumn'] = 'none';
				$GLOBALS['ExtraCategoryClass'] = 'Wide';
			}

			$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->BuildTitle());
			$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate($this->GetLayoutFile());
			if($this->GetPage() != 1) {
				$canonicalLink = CatLink($this->GetId(), $this->GetName(), false, array('page' => $this->GetPage()));
			} else {
				$canonicalLink = CatLink($this->GetId(), $this->GetName());
			}
			$GLOBALS['ISC_CLASS_TEMPLATE']->SetCanonicalLink($canonicalLink);
			$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
		}

		public function GetCatsInfo()
		{
			if (!isset($this->catsByPid) || !is_array($this->catsByPid)) {
				$query = "SELECT * FROM [|PREFIX|]categories ORDER BY catsort DESC, catname ASC";
				$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
				while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
					$this->catsByPid[$row['catparentid']][] = $row['catparentid'];
					$this->catsById[$row['categoryid']] = $row;
				}
			}
		}

		/**
		 * Get the SQL used to join the product pricing table when tax
		 * is set to be shown as inclusive for catalog prices.
		 *
		 * @return string SQL containing join to product_tax_pricing.
		 */
		protected function getTaxPricingJoin()
		{
			// Prices entered without tax and shown without tax, so we don't need this join
			if(getConfig('taxDefaultTaxDisplayCatalog') == TAX_PRICES_DISPLAY_EXCLUSIVE &&
				getConfig('taxEnteredWithPrices') == TAX_PRICES_ENTERED_EXCLUSIVE) {
					return '';
			}

			$join = false;

			// Not sorting or searching by prices. This join is not necessary
			if(!empty($_GET['sort']) && ($_GET['sort'] == 'priceasc' || $_GET['sort'] == 'pricedesc')) {
				$join = true;
			}

			if(!empty($_GET['price_min']) && !empty($_GET['price_max'])) {
				$join = true;
			}

			if($join == false) {
				return '';
			}

			// Showing prices ex tax, so the tax zone ID = 0
			if(getConfig('taxDefaultTaxDisplayCatalog') == TAX_PRICES_DISPLAY_EXCLUSIVE) {
				$taxZone = 0;
			}
			// Showing prices inc tax, so we need to fetch the applicable tax zone
			else {
				$taxZone = getClass('ISC_TAX')->determineTaxZone();
			}

			return '
				JOIN [|PREFIX|]product_tax_pricing tp
				ON (
					tp.price_reference=p.prodcalculatedprice AND
					tp.tax_zone_id='.$taxZone.' AND
					tp.tax_class_id=p.tax_class_id
				)
			';
		}
		
		public function getSizeJoin() {
			if(!empty($_REQUEST['size']) && $_REQUEST['size'] != "false") {
				return "INNER JOIN [|PREFIX|]product_variation_combinations vc 
					ON (vc.vcproductid = ca.productid
					AND vc.vcoptionids = '". (int)$_REQUEST['size'] . "')";
			} else { return ''; }
		}


		// Load the products to show on this page, taking into account paging, filters, etc
		public function LoadProductsForPage()
		{
			$taxJoin = $this->getTaxPricingJoin();
			$sizeJoin = $this->getSizeJoin();
			$query = "
				SELECT
					p.*,
					FLOOR(prodratingtotal / prodnumratings) AS prodavgrating,
					pi.*,
					" . GetProdCustomerGroupPriceSQL() . "
				FROM
					(
						SELECT
							DISTINCT ca.productid,
							FLOOR(prodratingtotal / prodnumratings) AS prodavgrating
						FROM
							[|PREFIX|]categoryassociations ca
							INNER JOIN [|PREFIX|]products p ON p.productid = ca.productid
							".$taxJoin."
						WHERE
							".$this->getProductWhereSQLRestriction()."
						ORDER BY
							" . $this->GetSortField() . ", p.prodphystype ASC, p.prodname ASC
						" .	$GLOBALS['ISC_CLASS_DB']->AddLimit($this->GetStart(), GetConfig('CategoryProductsPerPage')) . "
					) AS ca
					INNER JOIN [|PREFIX|]products p ON p.productid = ca.productid
					".$sizeJoin."
					LEFT JOIN [|PREFIX|]product_images pi ON (pi.imageisthumb = 1 AND p.productid = pi.imageprodid)
			";
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$row['prodavgrating'] = (int)$row['prodavgrating'];
				$this->_catproducts[] = $row;
			}
		}

		/**
		 * Get an array all of the child categories of the current category.
		 *
		 * @return array a list of all of the child categories of the current category.
		 */
		public function GetChildCategories()
		{
			$categoryId = $this->GetCategoryId();
			$childCats = array();
			$set = new ISC_NESTEDSET_CATEGORIES();

			// use a manual query instead of getTree as it's less resource intensive since we only need an array of category ids, not array of result rows
			// nested set results will include the starting node, the HAVING restriction array here will drop it from the final results
			$sql = $set->generateGetTreeSql(array('categoryid'), $categoryId, ISC_NESTEDSET_DEPTH_ALL, null, null, true, array('`node`.`categoryid` != ' . $categoryId));
			$result = $GLOBALS['ISC_CLASS_DB']->Query($sql);
			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$childCats[] = $row['categoryid'];
			}

			return $childCats;
		}
		
		public function CountProducts($catid) {
			$count = $GLOBALS["ISC_CLASS_DB"]->FetchOne('SELECT COUNT(*) FROM [|PREFIX|]categoryassociations WHERE categoryid = ' . $catid);
			$childCats = array();
			$set = new ISC_NESTEDSET_CATEGORIES();

			// use a manual query instead of getTree as it's less resource intensive since we only need an array of category ids, not array of result rows
			// nested set results will include the starting node, the HAVING restriction array here will drop it from the final results
			$sql = $set->generateGetTreeSql(array('categoryid'), $catid, ISC_NESTEDSET_DEPTH_ALL, null, null, true, array('`node`.`categoryid` != ' . $catid));
			$result = $GLOBALS['ISC_CLASS_DB']->Query($sql);
			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$childCats[] = self::CountProducts($row['categoryid']);
			}
			
			return $count + array_sum($childCats);
		}
		
		public function GetCategoryAssociationSQL($prependAnd=true)
		{
			$productCategoryIds = $this->GetProductCategoryIds();

			if ($productCategoryIds == '') {
				return '';
			}

			$sql = " (
						SELECT ca.productid
						FROM  [|PREFIX|]categoryassociations ca
						WHERE ca.productid = p.productid AND ca.categoryid IN (" . $productCategoryIds . ")
						LIMIT 1
					)";
			if($prependAnd) {
				$sql = " AND ".$sql;
			}

			return $sql;
		}


		private function _insertOptimizerScripts()
		{

			if(isset($_GET['optimizer'])){
				return;
			}

			//if optimizer is not enabled for this category
			if($this->getEnableOptimizer() != 1) {
				return;
			}

			$optimizer = getClass('ISC_OPTIMIZER_PERPAGE');
			$optimizerDetails = $optimizer->getOptimizerDetails('category', $this->_catid);
			if(empty($optimizerDetails)) {
				return;
			}

			$GLOBALS['PerPageOptimizerEnabled'] = 1;

			$GLOBALS['OptimizerControlScript'] = $optimizerDetails['optimizer_control_script'];
			$GLOBALS['OptimizerTrackingScript'] = $optimizerDetails['optimizer_tracking_script'];

			$GLOBALS['CategoryNameOptimizerScriptTag'] = '<script>utmx_section("CategoryName")</script>';
			$GLOBALS['CategoryNameOptimizerNoScriptTag'] = '</noscript>';

			$GLOBALS['CategoryDescriptionOptimizerScriptTag'] = '<script>utmx_section("CategoryDescription")</script>';
			$GLOBALS['CategoryDescriptionOptimizerNoScriptTag'] = '</noscript>';

		}



		/**
		 * Search for categories
		 *
		 * Method will search for all the categories and return an array of category records
		 *
		 * @access public
		 * @param array $searchQuery The search query array. Currently will only understand the 'search_query' option
		 * @param int &$totalAmount The referenced variable to store in the total amount of the result
		 * @param int $start The optional start position of the result total. Default is 0
		 * @param int $start The optional limit position of the result total. Default is -1 (no limit)
		 * @return array The array result set on success, FALSE on error
		 */
		static public function searchForItems($searchQuery, &$totalAmount, $start=0, $limit=-1)
		{
			if (!is_array($searchQuery)) {
				return false;
			}

			$totalAmount = 0;

			if (!array_key_exists("search_query", $searchQuery) || $searchQuery["search_query"] == '') {
				return array();
			}

			$fullTextFields = array("cs.catname", "cs.catdesc", "cs.catsearchkeywords");

			$cats = array();
			$query = "SELECT SQL_CALC_FOUND_ROWS c.*,
							(IF(c.catname='" . $GLOBALS["ISC_CLASS_DB"]->Quote($searchQuery["search_query"]) . "', 10000, 0) +
							 IF(c.catpagetitle='" . $GLOBALS["ISC_CLASS_DB"]->Quote($searchQuery["search_query"]) . "', 10000, 0) +
							 ((" . $GLOBALS["ISC_CLASS_DB"]->FullText(array("cs.catname"), $searchQuery["search_query"], false) . ") * 10) +
							   " . $GLOBALS["ISC_CLASS_DB"]->FullText($fullTextFields, $searchQuery["search_query"], false) . ") AS score
						FROM [|PREFIX|]categories c
							INNER JOIN [|PREFIX|]category_search cs ON c.categoryid = cs.categoryid
						WHERE (";

			$searchPart = array();

			if (GetConfig("SearchOptimisation") == "fulltext" || GetConfig("SearchOptimisation") == "both") {
				$searchPart[] = $GLOBALS["ISC_CLASS_DB"]->FullText($fullTextFields, $searchQuery["search_query"], true);
			}

			if (GetConfig("SearchOptimisation") == "like" || GetConfig("SearchOptimisation") == "both") {
				$searchPart[] = "c.catname LIKE '%" . $GLOBALS["ISC_CLASS_DB"]->Quote($searchQuery["search_query"]) . "%'";
				$searchPart[] = "c.catpagetitle LIKE '%" . $GLOBALS["ISC_CLASS_DB"]->Quote($searchQuery["search_query"]) . "%'";
				$searchPart[] = "c.catsearchkeywords LIKE '%" . $GLOBALS["ISC_CLASS_DB"]->Quote($searchQuery["search_query"]) . "%'";
			}

			// this used to be generated by calling GetProdCustomerGroupPermissionsSQL() except that produced invalid
			// SQL due to it referencing the products table via a p alias -- looks like it's intended for listing
			// _products_ based on group category permissions, not categories -ge (see ISC-1632)
			$groupPermissionSql = "";
			if (!defined('ISC_ADMIN_CP')) {
				// since this is generic search code, may as well throw in a check for the admin cp here since it may
				// be re-used at some point
				$customer = GetClass('ISC_CUSTOMER');
				$group = $customer->GetCustomerGroup();
				if (is_array($group) && $group['categoryaccesstype'] != 'all') {
					$groupPermissionSql = " AND c.categoryid IN (" . implode(',', $group['accesscategories']) . ") ";
				}
			}

			$query .= " " . implode(" OR ", $searchPart) . ") " . $groupPermissionSql . " ORDER BY score DESC";

			if (is_numeric($limit) && $limit > 0) {
				if (is_numeric($start) && $start > 0) {
					$query .= " LIMIT " . (int)$start . "," . (int)$limit;
				} else {
					$query .= " LIMIT " . (int)$limit;
				}
			}

			$result = $GLOBALS["ISC_CLASS_DB"]->Query($query);
			$row = $GLOBALS["ISC_CLASS_DB"]->Fetch($result);

			if (!$row) {
				return array();
			}

			$totalAmount = $GLOBALS["ISC_CLASS_DB"]->FetchOne("SELECT FOUND_ROWS()");
			$cats[] = $row;

			while ($row = $GLOBALS["ISC_CLASS_DB"]->Fetch($result)) {
				$cats[] = $row;
			}

			return $cats;
		}

		/**
		 * Build the searched item results HTML
		 *
		 * Method will build the searched item results HMTL. Method will work with the ISC_SEARCH class to get the results
		 * so make sure that the object is initialised and the DoSearch executed.
		 *
		 * @access public
		 * @return string The search item result HTML on success, empty string on error
		 */
		static public function buildSearchResultsHTML()
		{
			if (!isset($GLOBALS["ISC_CLASS_SEARCH"]) || !is_object($GLOBALS["ISC_CLASS_SEARCH"])) {
				return "";
			}

			$totalRecords = $GLOBALS["ISC_CLASS_SEARCH"]->GetNumResults("category");

			if ($totalRecords == 0) {
				return "";
			}

			$results = $GLOBALS["ISC_CLASS_SEARCH"]->GetResults("category");
			$resultHTML = array();

			if (!array_key_exists("results", $results) || !is_array($results["results"])) {
				return "";
			}

			foreach ($results["results"] as $category) {
				if (!is_array($category) || !array_key_exists("categoryid", $category)) {
					continue;
				}

				// @TO-DO: Gywlim is doing a categories manager but until then just read from the database
				$catBreadCrumbs = array(array($category["categoryid"], $category["catname"]));
				$parentCategoryId = (int)$category["catparentid"];
				$query = "SELECT categoryid, catparentid, catname
							FROM [|PREFIX|]categories
							WHERE categoryid=%d";

				while ($parentCategoryId !== 0) {
					$result = $GLOBALS["ISC_CLASS_DB"]->Query(sprintf($query, $parentCategoryId));
					$row = $GLOBALS["ISC_CLASS_DB"]->Fetch($result);

					if (!$row) {
						break;
					}

					$parentCategoryId = (int)$row["catparentid"];
					array_unshift($catBreadCrumbs, array($row["categoryid"], $row["catname"]));
				}

				$link = array();
				$isParent = true;

				foreach ($catBreadCrumbs as $part) {
					$link[] = "<a href=\"" . CatLink($part[0], $part[1], $isParent) . "\">" . isc_html_escape($part[1]) . "</a>";

					if ($isParent) {
						$isParent = false;
					}
				}

				if (empty($link)) {
					continue;
				}

				$resultHTML[] = implode(" &gt; ", $link);
			}

			$resultHTML = implode(", ", $resultHTML);
			$resultHTML = trim($resultHTML);

			return $resultHTML;
		}

		public static function getCustomerGroupCategoryRestrictions()
		{
			$where = "`catvisible` = 1";

			$customer = GetClass('ISC_CUSTOMER');
			$group = $customer->GetCustomerGroup();
			if (is_array($group) && $group['categoryaccesstype'] != 'all') {
				// the current customer is in a customer group, so they may not have access to all categories
				$where .= " AND `categoryid` IN (" . implode(',', $group['accesscategories']) . ")";
			}

			return $where;
		}
	}
