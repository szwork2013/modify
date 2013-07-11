<?php

	/**
	* This is the Share a Sale Conversion module for Interspire Shopping Cart. To enable
	* this module in Interspire Shopping Cart login to the control panel and click the
	* Settings -> Analytics Settings tab in the menu.
	*/
	class ANALYTICS_SHAREASALE extends ISC_ANALYTICS
	{

		/*
			Analytics class constructor
		*/
		public function __construct()
		{

			// Setup the required variables for the Google analytics module
			parent::__construct();

			// http://www.google.com/support/analytics/bin/answer.py?answer=148375
			// 2. Enter everything after the domain name (this is commonly called the Request URI) in the Goal URL box. For example, if your goal page is www.domain.com/whitepaperdownload, enter "/whitepaperdownload" into the Goal URL box. Reaching this page marks a successful conversion.

			// get only the path portion of our store url -- don't use '/finishorder.php' as this is not compatible with ISC sub-directory installs
			$goalURL = $GLOBALS['ShopPath'] . '/finishorder.php';
			$goalURL = parse_url($goalURL);
			$goalURL = $goalURL['path'];

			$this->_name = GetLang('ShareASaleName');
			$this->_description = GetLang('ShareASaleDesc');
			$this->_help = sprintf(GetLang('ShareASaleHelp'), $goalURL, $GLOBALS['StoreName']);
			$this->_height = 0;
		}

		/**
		* Custom variables for the analytics module. Custom variables are stored in the following format:
		* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
		* variable_type types are: text,number,password,radio,dropdown
		* variable_options is used when the variable type is radio or dropdown and is a name/value array.
		*/
		public function SetCustomVars()
		{
			$this->_variables['merchantid'] = array(
				"name" => "Merchant ID",
				"type" => "text",
				"default" => "",
				"required" => true
			);
		}

		/**
		 * Return the conversion tracking code for this module.
		 */
		public function GetConversionCode()
		{
			$merchantid = $this->GetValue('merchantid');

			// Grab the first order ID from the stack and we'll use that
			$orders = $this->GetOrders();
			$order = current($orders);
			$orderId = $order['orderid'];
			$billingAddress = $this->GetBillingDetails();

			$orderIds = implode(',', array_keys($orders));
			$query = "
				SELECT ordprodid, ordprodvariationid, ordprodsku, price_inc_tax, ordprodname, ordprodqty
				FROM [|PREFIX|]order_products
				WHERE orderorderid IN (".$orderIds.")
			";
			$productResult = $GLOBALS['ISC_CLASS_DB']->Query($query);

			$trackingPieces = array(
				$order['orderid'],
				number_format($this->GetSubTotal(), 2, '.', '')
			);
			
			$conversionCode = '<img src="https://shareasale.com/sale.cfm?amount=' . $trackingPieces[1] . '&tracking=' . $trackingPieces[0] . '&transtype=sale&merchantID=' . $merchantid . '" width="1" height="1">';
			return $conversionCode;
		}
	}
