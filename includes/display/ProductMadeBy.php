<?php
/**
 * Product Made By Panel.
 */
class ISC_PRODUCTMADEBY_PANEL extends PANEL
{
	/**
	 * Set the settings for this panel.
	 */
	public function SetPanelSettings()
	{
		$GLOBALS['ISC_CLASS_PRODUCT'] = GetClass('ISC_PRODUCT');
		$id = $GLOBALS['ISC_CLASS_PRODUCT']->GetProductId();
		// How many tags do we have?
		$query = "
			SELECT p.* , pi.imagefilethumb
			FROM isc_products p
			INNER JOIN isc_product_associations pa ON ( 
				pa.assocbaseid = " . $id . " AND pa.assocprodid = p.productid
			) 
			INNER JOIN isc_product_images pi ON ( 
				pi.imageprodid = pa.assocprodid AND pi.imageisthumb = 1
			) 
		";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		
		$GLOBALS['SNIPPETS']['ProductMadeByList'] = '';
		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$GLOBALS['ComponentImg'] = GetConfig('ShopPath') . '/' . GetConfig('ImageDirectory') . '/' . $row['imagefilethumb'];
			$GLOBALS['ComponentName'] = $row['prodname'];
			$GLOBALS['ComponentLink'] = ProdLink($row['prodname']);
			$GLOBALS['SNIPPETS']['ProductMadeByList'] .= $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet('ProductMadeByItem');
		}
		
		if($GLOBALS['SNIPPETS']['ProductMadeByList'] == '') {
			$this->DontDisplay = true;
		}
	}
}
