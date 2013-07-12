<?php
class ISC_LANDING
{
	private $pageTitle = "";

	public function HandlePage()
	{
		$action = "";
		if (isset($_REQUEST['a'])) {
			$action = isc_strtolower($_REQUEST['a']);
		}
		switch ($action) {
			case "wrist_watch": {
				$this->pageTitle = "Make Your Own Watch, Silicone Wrist Watches - " . GetConfig('StoreName');
				$GLOBALS['SubHeaderText'] = 'Make Your Own Watch. Any Style.';
				$GLOBALS['ButtonLink'] = 'http://dev.modifywatches.com/categories?a=build';
				$GLOBALS['Keywords'] = "Wrist Watch, Silicone Watch, Silicone Watches, Interchangeable Watch, Water Proof Watch, Make Your Own Watch";
				$GLOBALS['Description'] = "Modify Watches: Super-Dope Interchangeable Watches. Mix-n-Match Colorful Faces And Soft Silicone Straps & Create Your Own Style. Show Your Colors!";
				break;
			}
			case "discount_watches": {
				$this->pageTitle = GetConfig('StoreName') . " - 15% Discount On All Watches - SALE";
				$GLOBALS['SubHeaderText'] = 'Now on sale! 15% Off All Watches.';
				$GLOBALS['ButtonLink'] = 'http://dev.modifywatches.com/categories?a=build';
				$GLOBALS['Keywords'] = "Discount Watches, Discount Watch, Watch Sale, Watches On Sale, Cheap Watch, Cheap Watches, Affordable Watch, affordable wrist watch";
				$GLOBALS['Description'] = "Modify Watches: On Sale! 15% Discount. Dope Interchangeable Watches. Mix-n-Match Colorful Faces And Soft Rubber Straps & Create Your Own Style. Show Your Colors!";
				break;
			}
			case "interchangeable_watches": {
				$this->pageTitle = "Interchangeable Watches, Mix And Match Wrist Watch - " . GetConfig('StoreName');
				$GLOBALS['SubHeaderText'] = 'Interchangeable Watches. Any Style.';
				$GLOBALS['ButtonLink'] = 'http://dev.modifywatches.com/categories?a=build';
				$GLOBALS['Keywords'] = "Interchangeable Watches, Interchangeable Watch, Interchangeable Wrist Watch, Changeable Watch, Changeable Watch Strap, Changeable Watch Band, Mix and Match Wrist Watch";
				$GLOBALS['Description'] = "Modify Watches: Super-Dope Interchangeable Watches. Mix-n-Match Colorful Faces And Soft Rubber Straps & Create Your Own Style. Show Your Colors!";
				break;
			}
			case "make_your_own_watch": {
				$this->pageTitle = "Make Your Own Watch - " . GetConfig('StoreName');
				$GLOBALS['SubHeaderText'] = 'Make Your Own Watch. Any Style.';
				$GLOBALS['ButtonLink'] = 'http://dev.modifywatches.com/categories?a=build';
				$GLOBALS['Keywords'] = "Make Your Own Watch, Make Your Own Watches, Make Your Own Wrist Watch, Make Your Own Wrist Watches, Create Your Own Watch, Design Your Own Watch, Custom Watch, Custom Watches, Personalized Watch, Personalizes Watches";
				$GLOBALS['Description'] = "Modify Watches: Super-Dope Interchangeable Watches. Mix-n-Match Colorful Faces And Soft Rubber Straps & Create Your Own Style. Show Your Colors!";
				break;
			}
			case "rubber_watch": {
				$this->pageTitle = "Rubber Watches, Make Your Own Watch - " . GetConfig('StoreName');
				$GLOBALS['SubHeaderText'] = 'Soft Rubber Watch. 100% Your Style.';
				$GLOBALS['ButtonLink'] = 'http://dev.modifywatches.com/categories?a=build';
				$GLOBALS['Keywords'] = "Rubber Watch, Rubber Watches, Rubber Watch bands, Rubber Watch Straps, Rubber Wrist Watch, Rubber Watch";
				$GLOBALS['Description'] = "Modify Watches: Super-Dope Interchangeable Watches. Mix-n-Match Colorful Faces And Soft Rubber Straps & Create Your Own Style. Show Your Colors!";
				break;
			}
			case "silicone_watch": {
				$this->pageTitle = "Silicone Watches, Make Your Own Watch - " . GetConfig('StoreName');
				$GLOBALS['SubHeaderText'] = '100% Silicone Watches. 100% Your Style.';
				$GLOBALS['ButtonLink'] = 'http://dev.modifywatches.com/categories?a=build';
				$GLOBALS['Keywords'] = "Silicone Watch, Silicone Watches, Silicone Watch bands, Silicone Watch Straps, Silicone Wrist Watch, Silicon Watch";
				$GLOBALS['Description'] = "Modify Watches: Super-Dope Interchangeable Watches. Mix-n-Match Colorful Faces And Soft Silicone Straps & Create Your Own Style. Show Your Colors!";
				break;
			}
			case "valentines": {
				$this->pageTitle = "Modi-Time's Day Gift Guide - " . GetConfig('StoreName');
				$GLOBALS['Keywords'] = "Valentines Day Gift Guide, Valentines Day, Moditimes Day, Modify Watches Valentines";
				$GLOBALS['Description'] = "Browse and shop the Modi-Time's Day Gift Guide (see what we did there?) The only place with the PERFECT gifts to say I love you/like you/think you're dope.";
				$GLOBALS['Template'] = "valentines";
				break;
			}
			case "modthersday": {
				$this->pageTitle = "Mod-ther's Day Gift Guide - " . GetConfig('StoreName');
				$GLOBALS['Keywords'] = "Mother's Day Gift Guide, Mothers Day, Mod-thers Day, Modify Watches Mothers Day";
				$GLOBALS['Description'] = "Browse and shop the Mod-ther's Day Gift Guide (see what we did there?) The only place with the PERFECT gifts to say I love you/like you/think you're dope.";
				$GLOBALS['Template'] = "modthers";
				break;
			}
			case "fathersday": {
				$this->pageTitle = "Father's Day Gift Guide - " . GetConfig('StoreName');
				$GLOBALS['Keywords'] = "Father's Day Gift Guide, Fathers Day, Modify Watches Fathers Day";
				$GLOBALS['Description'] = "Your search for the perfect Fathers Day gift is over – Welcome to the ModiFather’s Day Gift Guide!  Not only will you find the perfect Modify Watch sets discounted for maximum wrist style; when you buy a Mod for your dad, we’ll throw in a free tacky tie – just for nostalgia sake.";
				$GLOBALS['Template'] = "fathers";
				break;
			}
			case "easter": {
				header('Location: http://dev.modifywatches.com/categories/Easter?action=browse');
				break;
			}
			case "fb15": {
				$this->pageTitle = GetConfig('StoreName');
				$GLOBALS['Template'] = "fblandingtest";
				break;
			}
			case "giraffe": {
				$this->pageTitle = GetConfig('StoreName');
				$GLOBALS['Template'] = "giraffelanding";
				break;
			}
			default: {
				$this->pageTitle = " - " . GetConfig('StoreName');
				$GLOBALS['SubHeaderText'] = '';
				$GLOBALS['ButtonLink'] = '';
				$GLOBALS['Keywords'] = "";
				$GLOBALS['Description'] = "";
				break;
			}
		}
		
		$this->ShowPage();
	}
	
	private function ShowPage() {
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetMetaKeywords($GLOBALS['Keywords']);
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetMetaDescription($GLOBALS['Description']);
		if(isset($GLOBALS['Template'])) {
			$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate($GLOBALS['Template']);
		} else {
			$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("landingpages");
		}
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
