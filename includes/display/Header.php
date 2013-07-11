<?php

	CLASS ISC_HEADER_PANEL extends PANEL
	{
		public function SetPanelSettings()
		{
			$GLOBALS['HeadJS'] = "<script type='text/javascript' src='".GetConfig('AppPath')."/javascript/header.js'></script>";
			
			// Are we using a text or image-based logo?
			if($GLOBALS['ISC_CLASS_TEMPLATE']->getIsMobileDevice()) {
				if(getConfig('mobileTemplateLogo')) {
					$GLOBALS['ISC_CLASS_TEMPLATE']->assign('StoreLogo', getConfig('mobileTemplateLogo'));
					$GLOBALS['ISC_CLASS_TEMPLATE']->assign('HeaderLogo', $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet('LogoImage'));
					$loadLogo = false;
				}
			}
	
			$incTax = false;
			if(getConfig('taxDefaultTaxDisplayCart') != TAX_PRICES_DISPLAY_EXCLUSIVE) {
				$incTax = true;
			}
	
			$quote = getCustomerQuote();
			$items = $quote->getItems();
			foreach($items as $item) {
				if($item->getProductId()) {
					$GLOBALS['ProductName'] = "<a href=\"".ProdLink($item->getName())."\">".isc_html_escape($item->getName())."</a>";
				}
				else {
					$GLOBALS['ProductName'] = isc_html_escape($item->getName());
				}
	
				// Is this product a variation?
				$GLOBALS['ProductOptions'] = '';
				$options = $item->getVariationOptions();
				if(!empty($options)) {
					$GLOBALS['ProductOptions'] .= "<br /><small>(";
					$comma = '';
					foreach($options as $name => $value) {
						if(!trim($name) || !trim($value)) {
							continue;
						}
						$GLOBALS['ProductOptions'] .= $comma.isc_html_escape($name).": ".isc_html_escape($value);
						$comma = ', ';
					}
					$GLOBALS['ProductOptions'] .= ")</small>";
				}
	
				$GLOBALS['ProductPrice'] = currencyConvertFormatPrice($item->getTotal($incTax));
				$GLOBALS['ProductQuantity'] = $item->getQuantity();
			}
	
			$numItems = $quote->getNumItems();
			$GLOBALS['InCartItemCount'] = $numItems;
			if($numItems == 1) {
				$GLOBALS['HeaderItemCount'] = $numItems . " item";
			} else {
				$GLOBALS['HeaderItemCount'] = $numItems . " items";
			}
	
			$total = $quote->getSubTotal($incTax);
			$GLOBALS['HeaderTotalCost'] = CurrencyConvertFormatPrice($total);
			
			// Set active tab
			$page = $_SERVER['REQUEST_URI'];
			$activeClassName = "active";
			if(preg_match("/categories.*/", $page)) {
				$GLOBALS['ShopActive'] = $activeClassName;
			} else if(preg_match("/community\.php.*/", $page)) {
				$GLOBALS['CommActive'] = $activeClassName;
			} else if(preg_match("/about\.php.*/", $page)) {
				$GLOBALS['AboutActive'] = $activeClassName;
			} else if(preg_match("/cart\.php.*/", $page)) {
				$GLOBALS['CartActive'] = $activeClassName;
			}
			
			$GLOBALS['ISC_CLASS_CUSTOMER'] = GetClass('ISC_CUSTOMER');
			$custname = $GLOBALS['ISC_CLASS_CUSTOMER']->GetCustomerName();
			if ($custname) {
				$GLOBALS['AccountLink'] = GetConfig('ShopPath') . "/account.php";
				$GLOBALS['AccountText'] = "<span class=\"acc\">Hi, ".$custname['first'] . "</span><span class=\"arrow\"></span>";
				$GLOBALS['AccountLogout'] = "<a href=\"" . GetConfig('ShopPath') . "/login.php?action=logout\">(Logout)</a>";
			}
			else {
				$GLOBALS['AccountLink'] = GetConfig('ShopPath') . "/login.php";
				$GLOBALS['AccountText'] = "<span class=\"acc\">Login / Sign Up</span>";
			}
		}
		
	}
