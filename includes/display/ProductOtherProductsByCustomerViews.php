<?php
class ISC_PRODUCTOTHERPRODUCTSBYCUSTOMERVIEWS_PANEL extends PRODUCTS_PANEL
{
	public function SetPanelSettings()
	{
		$GLOBALS['SNIPPETS']['SimilarProductsByCustomerViews'] = '';

		if (!ISC_PRODUCT_VIEWS::isEnabled() || !ISC_PRODUCT_VIEWS::getNumberOfProductsToShow()) {
			$this->DontDisplay = true;
			return;
		}

		/** @var ISC_PRODUCT*/
		$product = $GLOBALS['ISC_CLASS_PRODUCT'];

		$productId = $product->GetProductId();
		$related = ISC_PRODUCT_VIEWS::getRelatedProducts($productId, ISC_PRODUCT_VIEWS::getNumberOfProductsToShow());

		if (empty($related)) {
			$this->DontDisplay = true;
			return;
		}

		$GLOBALS['AlternateClass'] = '';
		
		$pos = 0;
		foreach ($related as $row) {
			$pos++;
			if($pos == 2) {
				$GLOBALS['MidClass'] = "mid";
			} else if ($pos == 3) {
				$pos = 0;
				$GLOBALS['MidClass'] = "";
			}
			$this->setProductGlobals($row);
			$GLOBALS['SNIPPETS']['SimilarProductsByCustomerViews'] .= $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet("ProductOtherProductsByCustomerViewsItem");
		}
	}
}
