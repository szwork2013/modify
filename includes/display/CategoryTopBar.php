<?php

	/*******************************************\
	*                                           *
	*  Generic Interspire Shopping Cart Panel Parsing Class   *
	*                                           *
	\*******************************************/

	CLASS ISC_CATEGORYTOPBAR_PANEL extends PANEL
	{
		public function SetPanelSettings()
		{
			$GLOBALS['ISC_CLASS_CATEGORY'] = GetClass('ISC_CATEGORY');

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

				$GLOBALS['HiddenSortField'] = '';
				foreach($queryStringAppend as $k => $v) {
					$GLOBALS['HiddenSortField'] .= "<input type=\"hidden\" name=\"".$k."\" value=\"".isc_html_escape($v)."\" />";
				}

				$GLOBALS['SNIPPETS']['CategorySortBox'] = $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet("CategorySortBox");
			}
		}
	}
