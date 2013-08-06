<?php

CLASS ISC_FASTPRODUCTDETAILS_PANEL extends PANEL
{
	/**
	 * @var ISC_PRODUCT Instance of the product class that this panel is loading details for.
	 */
	private $productClass = null;

	/**
	 * @var MySQLDb Instance of the database class.
	 */
	private $db = null;

	private $hasRequiredFileFields = false;

	/**
	 * Set the display settings for this panel.
	 */
	public function SetPanelSettings()
	{
		$this->productClass = GetClass('ISC_PRODUCT');
		$this->db = $GLOBALS['ISC_CLASS_DB'];

		if(!empty($_SESSION['ProductErrorMessage'])) {
			FlashMessage($_SESSION['ProductErrorMessage'], 'error');
		}
		$GLOBALS['ProductDetailFlashMessages'] = GetFlashMessageBoxes();

		$GLOBALS['ProductName'] = isc_html_escape($this->productClass->GetProductName());
		$GLOBALS['ProductNamedBy'] = $this->productClass->GetProductNamedBy();
		$GLOBALS['ProductId'] = $this->productClass->GetProductId();
		$GLOBALS['ProductPrice'] = '';
		
		$funnyDesc = $this->productClass->GetFunnyDesc();
		if(!empty($funnyDesc)) {
			$GLOBALS['FunnyDescription'] = $funnyDesc;
		} else {
			$GLOBALS['ShowFunnyDescription'] = "display:none;";
		}

		if(isset($_SESSION['ProductErrorMessage']) && $_SESSION['ProductErrorMessage']!='') {
			$GLOBALS['HideProductErrorMessage']='';
			$GLOBALS['ProductErrorMessage']=$_SESSION['ProductErrorMessage'];
			unset($_SESSION['ProductErrorMessage']);
		}

		$product = $this->productClass->getProduct();
		
		// We've got a lot to do on this page, so to make it easier to follow,
		// everything is broken down in to smaller functions.
		$this->SetProductImages();
		$this->SetPricingDetails();

		if (GetConfig('ShowAddThisLink')) {
			$GLOBALS['AddThisLink'] = $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet('AddThisLink');
		}
	}

	/**
	 * Set general pricing details for the product.
	 */
	private function SetPricingDetails()
	{
		$product = $this->productClass->getProduct();

		$GLOBALS['PriceLabel'] = GetLang('Price');

		if($this->productClass->GetProductCallForPricingLabel()) {
			$GLOBALS['ProductPrice'] = $GLOBALS['ISC_CLASS_TEMPLATE']->ParseGL($this->productClass->GetProductCallForPricingLabel());
		}
		// If prices are hidden, then we don't need to go any further
		else if($this->productClass->ArePricesHidden()) {
			$GLOBALS['HidePrice'] = "display: none;";
			$GLOBALS['HideRRP'] = 'none';
			$GLOBALS['ProductPrice'] = '';
			return;
		}
		else if (!$this->productClass->IsPurchasingAllowed()) {
			$GLOBALS['ProductPrice'] = GetLang('NA');
		}
		else {
			$options = array('strikeRetail' => false);
			$GLOBALS['ProductPrice'] = formatProductDetailsPrice($product, $options);
		}

		// Determine if we need to show the RRP for this product or not
		// by comparing the price of the product including any taxes if
		// there are any
		$GLOBALS['HideRRP'] = "none";
		$productPrice = $product['prodcalculatedprice'];
		$retailPrice = $product['prodretailprice'];
		if($retailPrice) {
			// Get the tax display format
			$displayFormat = getConfig('taxDefaultTaxDisplayProducts');
			$options['displayInclusive'] = $displayFormat;

			// Convert to the browsing currency, and apply group discounts
			$productPrice = formatProductPrice($product, $productPrice, array(
				'localeFormat' => false, 'displayInclusive' => $displayFormat
			));
			$retailPrice = formatProductPrice($product, $retailPrice, array(
				'localeFormat' => false, 'displayInclusive' => $displayFormat
			));

			if($productPrice < $retailPrice) {
				$GLOBALS['HideRRP'] = '';

				// Showing call for pricing, so just show the RRP and that's all
				if($this->productClass->GetProductCallForPricingLabel()) {
					$GLOBALS['RetailPrice'] = CurrencyConvertFormatPrice($retailPrice);
				}
				else {
					// ISC-1057: do not apply customer discount to RRP in this case
					$retailPrice = formatProductPrice($product, $product['prodretailprice'], array(
						'localeFormat' => false,
						'displayInclusive' => $displayFormat,
						'customerGroup' => 0,
					));
					$GLOBALS['RetailPrice'] = '<strike>' . formatPrice($retailPrice) . '</strike>';
					$GLOBALS['PriceLabel'] = GetLang('YourPrice');
					$savings = $retailPrice - $productPrice;
					$string = sprintf(getLang('YouSave'), '<span class="YouSaveAmount">'.formatPrice($savings).'</span>');
					$GLOBALS['YouSave'] = '<span class="YouSave">'.$string.'</span>';
				}
			}
		}
	}

	/**
	 * Generate the product images/thumbnails to be shown.
	 */
	private function SetProductImages()
	{

		$GLOBALS['ProductThumbWidth'] = ISC_PRODUCT_IMAGE::getSizeWidth(ISC_PRODUCT_IMAGE_SIZE_STANDARD);
		$GLOBALS['ProductThumbHeight'] = ISC_PRODUCT_IMAGE::getSizeHeight(ISC_PRODUCT_IMAGE_SIZE_STANDARD);

		$GLOBALS['ProductMaxTinyWidth'] = ISC_PRODUCT_IMAGE::getSizeWidth(ISC_PRODUCT_IMAGE_SIZE_TINY);
		$GLOBALS['ProductMaxTinyHeight'] = ISC_PRODUCT_IMAGE::getSizeHeight(ISC_PRODUCT_IMAGE_SIZE_TINY);


		$GLOBALS['ProductTinyBoxWidth'] = $GLOBALS['ProductMaxTinyWidth']+4;
		$GLOBALS['ProductTinyBoxHeight'] = $GLOBALS['ProductMaxTinyHeight']+4;


		$GLOBALS['ProductMaxZoomWidth'] = ISC_PRODUCT_IMAGE::getSizeWidth(ISC_PRODUCT_IMAGE_SIZE_ZOOM);
		$GLOBALS['ProductMaxZoomHeight'] = ISC_PRODUCT_IMAGE::getSizeHeight(ISC_PRODUCT_IMAGE_SIZE_ZOOM);

		$GLOBALS['ProductZoomWidth'] = ISC_PRODUCT_IMAGE::getSizeWidth(ISC_PRODUCT_IMAGE_SIZE_ZOOM);
		$GLOBALS['ProductZoomHeight'] = ISC_PRODUCT_IMAGE::getSizeHeight(ISC_PRODUCT_IMAGE_SIZE_ZOOM);


		$productImages = ISC_PRODUCT_IMAGE::getProductImagesFromDatabase($GLOBALS['ProductId'], null, false, true);
		$GLOBALS['NumProdImages'] = count($productImages);

		$GLOBALS['CurrentProdThumbImage'] = 0;
		$thumb = '';
		$curZoomImage = '';
		$GLOBALS['SNIPPETS']['ProductTinyImages'] = '';
		$GLOBALS['HideImageCarousel'] = 'display:none;';
		$GLOBALS['HideMorePicturesLink'] = 'display:none;';
		$thumbImageDescription = '';
		$i = 0;

		$GLOBALS['ProdImageJavascript'] = '';
		$GLOBALS['ProdImageZoomJavascript'] = '';
		$GLOBALS['LightBoxImageList'] = '';
		$GLOBALS['ZoomImageMaxWidth'] = 0;
		$GLOBALS['ZoomImageMaxHeight'] = 0;
		$GLOBALS['ZoomImageMaxWidthHeight'] = 0;
		$GLOBALS['HideAlwaysLinkedMorePicturesLink'] = 'display: none';

		if ($GLOBALS['NumProdImages']) {
			//Show image carousel

			if ($GLOBALS['NumProdImages'] == 2) {
				$var = "MorePictures1";
			} else if ($GLOBALS['NumProdImages'] == 1) {
				$var = "SeeLargerImage";
			} else {
				$var = "MorePictures2";
			}

			$GLOBALS['SeeMorePictures'] = sprintf(GetLang($var), count($productImages) - 1);
			$GLOBALS['HideAlwaysLinkedMorePicturesLink'] = '';

			if (GetConfig('ProductImagesTinyThumbnailsEnabled')) {
				$GLOBALS['HideImageCarousel'] = '';
			} else {
				$GLOBALS['HideMorePicturesLink'] = '';
			}

			$continue=false;

			foreach ($productImages as $productImage) {

				$thumbURL = '';
				$zoomImageURL = '';

				try{
					$thumbURL = $productImage->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_STANDARD, true);
					//$GLOBALS['ProductThumbURL'] = $thumbURL;
				} catch (Exception $exception) {
					// do nothing, will result in returning blank string, which is fine
				}

				try{
					$zoomImageURL = $productImage->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_ZOOM, true);
				} catch (Exception $exception) {
					// do nothing, will result in returning blank string, which is fine
				}

				if($thumbURL == '' && $zoomImageURL == '') {
					continue;
				}

				$resizedZoomDimension = $productImage->getResizedFileDimensions(ISC_PRODUCT_IMAGE_SIZE_ZOOM);
				$resizedTinyDimension = $productImage->getResizedFileDimensions(ISC_PRODUCT_IMAGE_SIZE_TINY);

				//calculate the max zoom image width and height
				if ($GLOBALS['ZoomImageMaxWidth'] < $resizedZoomDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_WIDTH]) {

					$GLOBALS['ZoomImageMaxWidth'] = $resizedZoomDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_WIDTH];
					//the height of the image has got the max width needed to calulate the image fancy box size.
					$GLOBALS['ZoomImageMaxWidthHeight'] = $resizedZoomDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_HEIGHT];
				}

				if ($GLOBALS['ZoomImageMaxHeight'] < $resizedZoomDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_HEIGHT]) {
					$GLOBALS['ZoomImageMaxHeight'] = $resizedZoomDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_HEIGHT];
					//the width of the image has got the max height needed to calulate the image fancy box size.
					$GLOBALS['ZoomImageMaxHeightWidth'] = $resizedZoomDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_HEIGHT];
				}

				$GLOBALS['ImageDescription'] = isc_html_escape($productImage->getDescription());
				if($GLOBALS['ImageDescription'] == '') {
					$GLOBALS['ImageDescription'] = GetLang("Image") . " " . ($i + 1);
				}

				//show image carousel
				if(GetConfig('ProductImagesTinyThumbnailsEnabled')==1) {

					$GLOBALS['ProdImageJavascript'] .= "
						ThumbURLs[".$i."] = " . isc_json_encode($thumbURL) . ";
						ProductImageDescriptions[".$i."] = " . isc_json_encode($GLOBALS['ImageDescription']) . ";
					";
					$GLOBALS['TinyImageOverJavascript'] = "showProductThumbImage(".$i.")";
					//$GLOBALS['ProductTinyImageURL'] = $productImage->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_TINY, true);

					try{
						$GLOBALS['ProductTinyImageURL'] = $productImage->getResizedUrl(ISC_PRODUCT_IMAGE_SIZE_TINY, true);
						//$GLOBALS['ProductThumbURL'] = $thumbURL;
					} catch (Exception $exception) {
						// do nothing, will result in returning blank string, which is fine
					}

					$GLOBALS['ProductThumbIndex'] = $i;
					if(GetConfig('ProductImageMode') == 'lightbox') {
						$GLOBALS['TinyImageClickJavascript'] = "showProductImageLightBox(".$i."); return false;";

					} else {
						$GLOBALS['TinyImageClickJavascript'] = "showProductImage('".GetConfig('ShopPath')."/productimage.php', ".$GLOBALS['ProductId'].", ".$i.");";
					}

					$GLOBALS['TinyImageWidth'] = $resizedTinyDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_WIDTH];
					$GLOBALS['TinyImageHeight'] = $resizedTinyDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_HEIGHT];
					$GLOBALS['TinyImageTopPadding'] = floor(($GLOBALS['ProductMaxTinyHeight'] - $GLOBALS['TinyImageHeight']) / 2);
					$GLOBALS['SNIPPETS']['ProductTinyImages'] .= $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet("ProductTinyImage");
					$continue = true;
				}

				if(GetConfig('ProductImagesImageZoomEnabled') == 1) {
					//check if zoom image is large enough for image zoomer
					if($resizedZoomDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_WIDTH]<ISC_PRODUCT_IMAGE_MIN_ZOOM_WIDTH && $resizedZoomDimension[ISC_PRODUCT_IMAGE_DIMENSIONS_HEIGHT]<ISC_PRODUCT_IMAGE_MIN_ZOOM_HEIGHT) {
						$zoomImageURL = '';
					}
					$GLOBALS['ProdImageZoomJavascript'] .= "
						ZoomImageURLs[".$i."] = " . isc_json_encode($zoomImageURL) . ";
					";
					$continue = true;
				}

				//	$GLOBALS['ProductZoomImageURL'] = $zoomImageURL;

				//this image is the product page thumbnail
				if($i==0) {
					//get the thumb image for product page
					$thumb = $thumbURL;
					$curZoomImage = $zoomImageURL;
					$thumbImageDescription = $GLOBALS['ImageDescription'];
					//if there is no need to loop through images anymore, get out from the loop.
					if($continue === false) {
						break;
					}
				}
				$i++;
			}
		}

		$GLOBALS['VisibleImageTotal'] = $i+1;

		$GLOBALS['ShowImageZoomer'] = GetConfig('ProductImagesImageZoomEnabled');
		if ($GLOBALS['ShowImageZoomer']) {
			$GLOBALS['SNIPPETS']['ProductImageZoomer'] = $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet("ProductImageZoomer");
		}
		$GLOBALS['ZoomImageURL'] = $curZoomImage;

		//if no product thumb images
		if($thumb == '') {
			if(GetConfig('DefaultProductImage') == 'template') {
				$thumb = $GLOBALS['IMG_PATH'].'/ProductDefault.gif';
			}
			else {
				$thumb = GetConfig('ShopPath').'/'.GetConfig('DefaultProductImage');
			}
		}

		// need to check for variation images
		$GLOBALS['ImageDescription'] = $thumbImageDescription;
		$GLOBALS['ThumbImageURL'] = $thumb;

		if ($GLOBALS['NumProdImages']) {
			$GLOBALS['SNIPPETS']['ProductThumbImage'] = $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet('FastProductThumbImage');
		} else {
			$GLOBALS['SNIPPETS']['ProductThumbImage'] = $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet('ProductThumbImagePlaceholder');
		}
	}
}
