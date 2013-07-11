<?php

	CLASS ISC_REMOTE_CATEGORY extends PRODUCTS_PANEL
	{
		
		private $_colors = array();
		
		public function GetJSON() {
			$GLOBALS['ISC_CLASS_CATEGORY'] = GetClass('ISC_CATEGORY');
			$GLOBALS['ISC_CLASS_CATEGORY']->SetCategoryData();
			
			$GLOBALS['CategoryDump'] = array();
			
			// These are global model variables
			$GLOBALS['CategoryDump']['catid'] = substr(CatLink($GLOBALS['ISC_CLASS_CATEGORY']->GetCategoryId(), $GLOBALS['ISC_CLASS_CATEGORY']->GetName(), false, array(), true), 0, -1);
			$GLOBALS['CategoryDump']['typeid'] = $GLOBALS['ISC_CLASS_CATEGORY']->GetPhysType();
			$GLOBALS['CategoryDump']['sizeid'] = $GLOBALS['ISC_CLASS_CATEGORY']->GetSizeId();
			
			$GLOBALS['CategoryDump']['productdisplay'] = $this->GetProductDisplay();
			
			// Get All the Filter Information for the Filter Box
			$GLOBALS['CategoryDump']['filters'] = $this->GetFilters();
			
			$GLOBALS['CategoryDump']['breadcrumbs'] = $this->GetBreadcrumbs();
			
			$GLOBALS['CategoryDump']['sortbox'] = $this->GetSortBox();
			
			$GLOBALS['CategoryDump']['action'] = (isset($_GET['a']) ? $_GET['a'] : 'build');
			
			$GLOBALS['DisplayVisualizer'] = ((isset($_GET['a']) && $_GET['a'] == "browse") ? 'display:none;' : '');
			
			$GLOBALS['ProductTitleText'] = ((isset($_GET['a']) && $_GET['a'] == "browse") ? 'Products' : 'Choose Faces & Straps');
			
						
			return json_encode($GLOBALS['CategoryDump']);
		}
		
		public function GetPagedProductData() {
			if(!isset($_GET['page'])) {
				return false;
			}
			
			$GLOBALS['ISC_CLASS_CATEGORY'] = GetClass('ISC_CATEGORY');
			$GLOBALS['ISC_CLASS_CATEGORY']->SetCategoryData();
			
			$GLOBALS['ISC_CLASS_CATEGORY']->SetStart($_GET['page']);
			
			$products = $this->GetProducts();
			return $products;
		}
		
		private function GetProducts() {
			$output = array();
			// Load the products into the reference array
			$GLOBALS['ISC_CLASS_CATEGORY']->GetProducts($products);
			if(empty($products)) {
				$GLOBALS['ISC_CLASS_CATEGORY']->LoadProductsForPage();
				$GLOBALS['ISC_CLASS_CATEGORY']->GetProducts($products);
			}
			if(GetConfig('ShowProductRating') == 0) {
				$productrating = null;
			}
	
			foreach($products as $row) {
				$variations = array();
				$this->setProductGlobals($row);
				
				$query = "SELECT combinationid, vcoptionids, vcvariationid, vcstock 
						  FROM [|PREFIX|]product_variation_combinations
						  WHERE vcproductid = '" . $row['productid'] . "'";
				$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
				while($var = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
					$variations[] = $var;
				}
						  
				$temp = array();
				
				$temp = array(
					'link'   => $GLOBALS['ProductLink'] . '?quickView=true',
					'image'  => $GLOBALS['ProductThumb'],
					'name'   => $GLOBALS['ProductName'],
					'id'     => $GLOBALS['ProductId'],
					'price'  => $GLOBALS['ProductPrice'],
					'type'	 => $GLOBALS['ProductPhysType'],
					'rating' => (!isset($productrating) ? $GLOBALS['ProductRating'] : null),
					'variations' => $variations
				);
				
				if(!empty($GLOBALS['ProductColors'])) {
					$this->_colors[] = $GLOBALS['ProductColors'];
				}
				$output[] = $temp;
			}
			
			return $output;
		}
		
		private function GetProductDisplay() {
			$output = array();
			
			$output['message'] = "";
			$output['categories'][] = array(
				'name'        => $GLOBALS['ISC_CLASS_CATEGORY']->GetName(),
				'description' => $GLOBALS['ISC_CLASS_CATEGORY']->GetDesc(),
				'products'    => $this->GetProducts()
			);
			
			return $output;
		}
		
		private function IsSelected($var) {
			$selected = $GLOBALS['ISC_CLASS_CATEGORY']->GetSort();
			return ($selected == $var ? true : false);
		}
		
		private function GetSortBox() {
			$output = array();
			
			if($GLOBALS['ISC_CLASS_CATEGORY']->GetNumProducts() > 1) {
				// Parse the sort select box snippet
				$queryStringAppend = array();
				if(!empty($_GET['price_min'])) {
					$queryStringAppend['price_min'] = (float)$_GET['price_min'];
				}

				if(!empty($_GET['price_max'])) {
					$queryStringAppend['price_max'] = (float)$_GET['price_max'];
				}

				if($GLOBALS['EnableSEOUrls'] == 1) {
					$GLOBALS['URL'] = CatLink($GLOBALS['CatId'], $GLOBALS['ISC_CLASS_CATEGORY']->GetName(), false);
				}
				else {
					$GLOBALS['URL'] = $GLOBALS['ShopPath']."/categories.php";
					$queryStringAppend['category'] = $catPath;
				}
				$output['formaction'] = $GLOBALS['URL'];
				$output['label'] = GetLang('SortBy');

				$GLOBALS['HiddenSortField'] = '';
				foreach($queryStringAppend as $k => $v) {
					$GLOBALS['HiddenSortField'] .= "<input type=\"hidden\" name=\"".$k."\" value=\"".isc_html_escape($v)."\" />";
				}

				$output['options'][] = array(
					'value' => 'featured',
					'selected' => $this->IsSelected('featured'),
					'name' => GetLang('FeaturedItems')
				);
				$output['options'][] = array(
					'value' => 'newest',
					'selected' => $this->IsSelected('newest'),
					'name' => GetLang('NewestItems')
				);
				$output['options'][] = array(
					'value' => 'bestselling',
					'selected' => $this->IsSelected('bestselling'),
					'name' => GetLang('Bestselling')
				);
				$output['options'][] = array(
					'value' => 'alphaasc',
					'selected' => $this->IsSelected('alphaasc'),
					'name' => GetLang('AlphaAsc')
				);
				$output['options'][] = array(
					'value' => 'alphadesc',
					'selected' => $this->IsSelected('alphadesc'),
					'name' => GetLang('AlphaDesc')
				);
				$output['options'][] = array(
					'value' => 'avgcustomerreview',
					'selected' => $this->IsSelected('avgcustomerreview'),
					'name' => GetLang('AvgCustomerReview')
				);
				$output['options'][] = array(
					'value' => 'priceasc',
					'selected' => $this->IsSelected('priceasc'),
					'name' => GetLang('PriceAsc')
				);
				$output['options'][] = array(
					'value' => 'pricedesc',
					'selected' => $this->IsSelected('pricedesc'),
					'name' => GetLang('PriceDesc')
				);
			}
			return $output;
		}
		
		private function GetBreadcrumbs() {
			$output = array();
			
			if ($GLOBALS['EnableSEOUrls'] == 1) {
				$baseLink = sprintf("%s/categories", $GLOBALS['ShopPath']);
			} else {
				$baseLink = sprintf("%s/categories.php?category=", $GLOBALS['ShopPath']);
			}

			$count = 0;
			$catPath = '';

			foreach($GLOBALS['CatTrail'] as $trail) {
				$temp = array();
				
				// if it's the root category and not friendly url, don't add / in front
				if ($count==0 && $GLOBALS['EnableSEOUrls'] != 1) {
					$baseLink .= MakeURLSafe($trail[1]);
				} else {
					$baseLink .= "/" . MakeURLSafe($trail[1]);
				}
				$catPath = MakeURLSafe($trail[1]);
				$temp['name'] = isc_html_escape($trail[1]);
				$temp['link'] = $baseLink."/";
				$temp['active'] = false;

				if($count++ == count($GLOBALS['CatTrail'])-1) {
					$temp['active'] = true;
				}
				
				$output[] = $temp;
			}
			
			return $output;
		}
		
		private function GetFilters() {
			$filters = array();
			
			
			// Type
			$types = $this->GetFilterTypes();
			if(count($types)) {
				$filters[] = array(
					'title' => 'Selected Type:',
					'filttype' => 'type',
					'multiselection' => false,
					'selector' => array(
						'class_' => 'pBut',
						'id'    => 'filtType',
						'options' => $types
					)
				);
			}
				
			//Color
			$colors = $this->GetFilterColors();
			if(count($colors)) {
				$filters[] = array(
					'title' => 'Colors',
					'filttype' => 'col',
					'multiselection' => false,
					'selector' => array(
						'class' => '',
						'id'    => 'filtCol',
						'options' => $colors
					)
				);
			}
			
			//Size
			$sizes = $this->GetFilterSizes();
			if(count($sizes)) {
				$filters[] = array(
					'title' => 'Selected Size:',
					'filttype' => 'size',
					'multiselection' => false,
					'selector' => array(
						'class_' => 'pBut',
						'id'    => 'filtSize',
						'options' => $sizes
					)
				);
			}
				
			
			////Categories
			//$filters[] = array(
				//'title' => 'Categories',
				//'filttype' => 'cat',
				//'multiselection' => false,
				//'selector' => array(
					//'class' => '',
					//'id'    => 'filtCat',
					//'options' => $this->GetFilterCategories()
				//)
			//);
			
			return $filters;
		}
		
		private function GetFilterSizes() {
			$output = array();
			$query = "
				SELECT * FROM [|PREFIX|]product_variation_options
			";
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			while($options = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$temp = array(
					'id'         => $options['voptionid'],
					'title'      => $options['vovalue'],
					'name'       => $options['vovalue'],
					'class_'      => ($GLOBALS['ISC_CLASS_CATEGORY']->GetSizeId() == $options['voptionid'] ? 'a' : ''),
					'extraStyle' => '',
					'type'       => 'sizeid',
				);
				$output[] = $temp;
				unset($temp);
			}
			
			return $output;
		}
		
		private function GetFilterCategories() {
			$output = array();
			$categories = $GLOBALS['ISC_CLASS_DATA_STORE']->Read('RootCategories');

			if (!isset($categories[0])) {
				return $output;
			}
			
			foreach($categories[0] as $rootCat) {
				$temp = array();
				
				// If we don't have permission to view this category then skip
				if(!CustomerGroupHasAccessToCategory($rootCat['categoryid'])) {
					continue;
				}
				
				if(ISC_CATEGORY::CountProducts($rootCat['categoryid']) == 0) {
					continue;
				}
				
				$temp['title'] = '';
				$temp['subcats'] = ($rootCat['categoryid'] == $GLOBALS['ISC_CLASS_CATEGORY']->GetCategoryId() ||
										$rootCat['categoryid'] == $GLOBALS['ISC_CLASS_CATEGORY']->GetParentId()
										? $this->_getSubCategory($categories, $rootCat['categoryid']) : array());
				$temp['name'] = isc_html_escape($rootCat['catname']);
				$temp['link'] = CatLink($rootCat['categoryid'], $rootCat['catname'], true);
				if($rootCat['categoryid'] == $GLOBALS['ISC_CLASS_CATEGORY']->GetCategoryId()) {
					$temp['class_'] = 'pBut a';
				} else if($rootCat['categoryid'] == $GLOBALS['ISC_CLASS_CATEGORY']->GetParentId()) {
					$temp['class_'] = 'pBut a p';
				} else {
					$temp['class_'] = 'pBut';
				}
				$temp['extraStyles'] = '';
				$temp['id'] = substr(CatLink($rootCat['categoryid'], $rootCat['catname'], true, array(), true), 0, -1);
				$temp['type'] = 'catid';
				
				$output[] = $temp;
			}
	
			return $output;
		}
		
		private function GetFilterColors() {
			$colors = array();
			$possColors = array();
			
			// First, we are going to set the color variable to a temp variable
			// We are doing this so we can hold it constant when querying the database
			if(isset($_GET['color'])) {
				$tempColor = $_GET['color'];
				$_GET['color'] = null;
			}
			
			// We are now setting up the query to get all the color IDs that exists
			// for the current search parameters.
			$colorQuery = "SELECT
					p.prodcolorids
				FROM
					(
						SELECT
							DISTINCT ca.productid
						FROM
							[|PREFIX|]categoryassociations ca
							INNER JOIN [|PREFIX|]products p ON p.productid = ca.productid
						WHERE
							".$GLOBALS['ISC_CLASS_CATEGORY']->getProductWhereSQLRestriction()."
					) AS ca INNER JOIN [|PREFIX|]products p ON p.productid = ca.productid";
			
			
			// We can now reset the color variable
			if(isset($tempColor)) {
				$_GET['color'] = $tempColor;
				unset($tempColor);
			}	
			// Actually query for the database
			$result = $GLOBALS['ISC_CLASS_DB']->Query($colorQuery);
			
			// Loop through the results
			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				// For each color row, get all of the IDs
				$color = $row['prodcolorids'];		
				$color = explode(',', $color);
				// Then loop through each of the IDs
				foreach($color as $col) {
					// And save it if it isn't empty
					if(!empty($col)) {
						$possColors[] = $col;
					}
				}
			}
			
			// Once we have all of our IDs, implode the unique ones
			$possColors = implode(',', array_unique($possColors));
			
			// So we can query the database for all of those colors.
			$query = "
				SELECT * FROM [|PREFIX|]product_colors WHERE colorid IN (". $possColors . ")
			";
			$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
			
			
			// Set up the data for the page.
			while($color = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$colors[] = array(
					'title' => $color['colname'],
					'name' => ' ',
					'class_' => 'color' . ($color['colorid'] == $GLOBALS['ISC_CLASS_CATEGORY']->GetColorId() ? ' a' : ''),
					'id' => $color['colorid'],
					'extrastyles' => 'background-color:'.$color['colascii'],
					'type'       => 'colid'
				);
			}
			
			if(count($colors)) {
				$colors[] = array(
					'title' => 'Show All',
					'name' => 'Show All',
					'class_' => 'all',
					'id' => 0,
					'type'       => 'colid'
				);
			}
			
			return $colors;
		}
		
		/**
		* get the html for sub category list
		*
		* @param array $categories the array of all categories in a tree structure
		* @param int $parentCatId the parent category ID of the sub category list
		*
		* return string the html of the sub category list
		*/
		protected function _getSubCategory($categories, $parentCatId)
		{
			$output = array();
			//if there is sub category for this parent cat
			if (isset($categories[$parentCatId]) && !empty($categories[$parentCatId])) {
				foreach ($categories[$parentCatId] as $subCat) {
					$temp[] = array();
					
					// Make sure there is atleast one product in the category
					if(ISC_CATEGORY::CountProducts($subCat['categoryid']) == 0) {
						continue;
					}
					// If we don't have permission to view this category then skip
					if (!CustomerGroupHasAccessToCategory($subCat['categoryid'])) {
						continue;
					}
					$temp['link'] = CatLink($subCat['categoryid'], $subCat['catname'], false);
					$temp['name'] = isc_html_escape($subCat['catname']);
					$temp['id'] = substr(CatLink($subCat['categoryid'], $subCat['catname'], false, array(), true), 0, -1);
					$temp['class_'] = ($subCat['categoryid'] == $GLOBALS['ISC_CLASS_CATEGORY']->GetCategoryId() ? 'a' : '');

					$temp['subcats'] = $this->_getSubCategory($categories, $subCat['categoryid']);

					$output[] = $temp;
				}
			}
			return $output;
		}
		
		private function GetFilterTypes() {
			$types = array();
			$possTypes = array();
			
			
			// First, we are going to set the color variable to a temp variable
			// We are doing this so we can hold it constant when querying the database
			if(isset($_GET['type'])) {
				$tempType = $_GET['type'];
				$_GET['type'] = null;
			}
			
			// We are now setting up the query to get all the color IDs that exists
			// for the current search parameters.
			$typeQuery = "SELECT
					p.prodphystype
				FROM
					(
						SELECT
							DISTINCT ca.productid,
							FLOOR(prodratingtotal / prodnumratings) AS prodavgrating
						FROM
							[|PREFIX|]categoryassociations ca
							INNER JOIN [|PREFIX|]products p ON p.productid = ca.productid
						WHERE
							".$GLOBALS['ISC_CLASS_CATEGORY']->getProductWhereSQLRestriction()."
					) AS ca INNER JOIN [|PREFIX|]products p ON p.productid = ca.productid";
			
			
			// We can now reset the color variable
			if(isset($tempType)) {
				$_GET['type'] = $tempType;
				unset($temptype);
			}
			
			
			// Actually query for the database
			$result = $GLOBALS['ISC_CLASS_DB']->Query($typeQuery);
			
			// Loop through the results
			while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
				$type = $row['prodphystype'];		
				// Only keep non-empty types
				if(!empty($type)) {
					$possTypes[] = $type;
				}
			}
			
			// Only keep the unique ones
			$possTypes = array_unique($possTypes);
			
			// Preferably all of this would be databased, but we only have
			// one product type for now, so it's okay.
			foreach($possTypes as $i) {
				$i = (int) $i;
				$class = ($GLOBALS['ISC_CLASS_CATEGORY']->GetPhysType() == $i ? 'a' : '');
				switch($i) {
					case '1':
						$title = 'Faces';
						$id = 1;
						break;
					case '2':
						$title = 'Straps';
						$id = 2;
						break;
					case '3':
						$title = 'Mods';
						$id = 3;
						break;
					case '4':
						$title = 'Sets';
						$id = 4;
						break;
				}
				$types[] = array(
					'title' => $title,
					'name' => $title,
					'class_' => $class,
					'id' => $id,
					'extrastyles' => '',
					'type'       => 'typeid'
				);
			}
			return $types;
		}
	}
