<?php

	class CHECKOUT_BRAINTREE extends ISC_GENERIC_CREDITCARD
	{
		/*
			Checkout class constructor
		*/
		public function __construct()
		{
			$this->_languagePrefix 		= "Braintree";
			$this->_id 					= "checkout_braintree";
			$this->_image 				= "logo.gif";

			parent::__construct();

			$this->_requiresSSL 		= true;
			$this->_currenciesSupported = array('USD');
			$this->_cardsSupported = array ('VISA', 'MC');
			$this->_liveTransactionURL 	= 'https://secure.chronopay.com';
			$this->_testTransactionURL 	= 'https://secure.chronopay.com';
			$this->_liveTransactionURI 	= '/gateway.cgi';
			$this->_testTransactionURI 	= '/gateway.cgi';
			$this->_curlSupported 		= true;
			$this->_fsocksSupported 	= true;
			$this->cardCodeRequired 	= true;
		}

		/**
		* Custom variables for the checkout module. Custom variables are stored in the following format:
		* array(variable_id, variable_name, variable_type, help_text, default_value, required, [variable_options], [multi_select], [multi_select_height])
		* variable_type types are: text,number,password,radio,dropdown
		* variable_options is used when the variable type is radio or dropdown and is a name/value array.
		*/
		public function SetCustomVars()
		{
			$this->_variables['displayname'] = array("name" => GetLang($this->_languagePrefix.'DisplayName'),
			   "type" => "textbox",
			   "help" => GetLang('DisplayNameHelp'),
			   "default" => $this->GetName(),
			   "required" => true
			);

			$this->_variables['merchantid'] = array("name" => GetLang($this->_languagePrefix.'MerchantId'),
			   "type" => "textbox",
			   "help" => GetLang($this->_languagePrefix.'MerchantIdHelp'),
			   "default" => "",
			   "required" => true
			);

			$this->_variables['publickey'] = array("name" => GetLang($this->_languagePrefix.'PublicKey'),
			   "type" => "textbox",
			   "help" => GetLang($this->_languagePrefix.'PublicKeyHelp'),
			   "default" => "",
			   "required" => true
			);
			
			$this->_variables['privatekey'] = array(
				"name" => GetLang($this->_languagePrefix.'PrivateKey'),
			   "type" => "password",
			   "help" => GetLang($this->_languagePrefix.'PrivateKeyHelp'),
			   "default" => "",
			   "required" => true
			);
			
			$this->_variables['environment'] = array(
				"name" => GetLang($this->_languagePrefix.'Environment'),
				"type" => "dropdown",
				"help" => GetLang($this->_languagePrefix.'EnvironmentHelp'),
				"savedvalue" => array(),
				"required" => true,
				"default" => "",
				"options" => array(
					GetLang($this->_languagePrefix.'EnvironmentSandbox') => "sandbox",
					GetLang($this->_languagePrefix.'EnvironmentProduction') => "production"
				),
				"multiselect" => false
			);
		}

		protected function _ConstructPostData($postData)
		{
			require_once 'lib/Braintree.php';

			Braintree_Configuration::environment($this->GetValue('environment'));
			Braintree_Configuration::merchantId($this->GetValue('merchantid'));
			Braintree_Configuration::publicKey($this->GetValue('publickey'));
			Braintree_Configuration::privateKey($this->GetValue('privatekey'));

			$ccname 		= $postData['name'];
			$cctype 		= $postData['cctype'];

			$ccissueno 		= $postData['ccissueno'];
			$ccissuedatem 	= $postData['ccissuedatem'];
			$ccissuedatey 	= $postData['ccissuedatey'];

			$ccnum 			= $postData['ccno'];
			$ccexpm 		= $postData['ccexpm'];
			$ccexpy 		= $postData['ccexpy'];
			$cccvd 			= $postData['cccvd'];

			$currency = GetDefaultCurrency();

			$billingDetails = $this->GetBillingDetails();
			$shippingDetails = $this->getShippingAddress();
			
			
			if ($billingDetails['ordbillcountryid'] == '38' || $billingDetails['ordbillcountryid'] == '226') {
				$result = Braintree_Transaction::sale(array(
				  'amount' => $this->GetGatewayAmount(),
				  'creditCard' => array(
					'number' => $ccnum,
					'expirationMonth' => $ccexpm,
					'expirationYear' => $ccexpy,
					'cardholderName' => $ccname,
					'cvv' => $cccvd
				  ),
				  'customer' => array(
					'firstName' => $shippingDetails['first_name'],
					'lastName' => $shippingDetails['last_name'],
					'company' => $shippingDetails['company'],
					'phone' => $shippingDetails['phone'],
					'email' => $shippingDetails['email']
				  ),
				  'billing' => array(
					'firstName' => $billingDetails['ordbillfirstname'],
					'lastName' => $billingDetails['ordbilllastname'],
					'streetAddress' => $billingDetails['ordbillstreet1'],
					'extendedAddress' => $billingDetails['ordbillstreet2'],
					'locality' => $billingDetails['ordbillsuburb'],
					'region' => GetStateISO2ByName($billingDetails['ordbillstate']),
					'postalCode' => $billingDetails['ordbillzip'],
					'countryCodeAlpha2' => GetCountryISO2ById($billingDetails['ordbillcountryid'])
				  ),
				  'shipping' => array(
					'firstName' => $shippingDetails['first_name'],
					'lastName' => $shippingDetails['last_name'],
					'company' => $shippingDetails['company'],
					'streetAddress' =>  $shippingDetails['address_1'],
					'extendedAddress' =>  $shippingDetails['address_2'],
					'locality' =>  $shippingDetails['city'],
					'region' =>  GetStateISO2ByName($shippingDetails['state']),
					'postalCode' => $shippingDetails['zip'],
					'countryCodeAlpha2' => $shippingDetails['country_iso2']
				  )
				));
			}
			else {
				$result = Braintree_Transaction::sale(array(
				  'amount' => $this->GetGatewayAmount(),
				  'creditCard' => array(
					'number' => $ccnum,
					'expirationMonth' => $ccexpm,
					'expirationYear' => $ccexpy,
					'cardholderName' => $ccname,
					'cvv' => $cccvd
				  ),
				  'customer' => array(
					'firstName' => $shippingDetails['first_name'],
					'lastName' => $shippingDetails['last_name'],
					'company' => $shippingDetails['company'],
					'phone' => $shippingDetails['phone'],
					'email' => $shippingDetails['email']
				  ),
				  'billing' => array(
					'firstName' => $billingDetails['ordbillfirstname'],
					'lastName' => $billingDetails['ordbilllastname'],
					'streetAddress' => $billingDetails['ordbillstreet1'],
					'extendedAddress' => $billingDetails['ordbillstreet2'],
					'locality' => $billingDetails['ordbillsuburb'],
					'postalCode' => $billingDetails['ordbillzip'],
					'countryCodeAlpha2' => GetCountryISO2ById($billingDetails['ordbillcountryid'])
				  ),
				  'shipping' => array(
					'firstName' => $shippingDetails['first_name'],
					'lastName' => $shippingDetails['last_name'],
					'company' => $shippingDetails['company'],
					'streetAddress' =>  $shippingDetails['address_1'],
					'extendedAddress' =>  $shippingDetails['address_2'],
					'locality' =>  $shippingDetails['city'],
					'postalCode' => $shippingDetails['zip'],
					'countryCodeAlpha2' => $shippingDetails['country_iso2']
				  )
				));
			}
			return $result;
		}
		
		public function ProcessPaymentForm($dataSource = array())
		{
			if (empty($dataSource)) {
				$dataSource = $_POST;
			}

			$postData = $this->_Validate($dataSource);

			if ($postData === false) {
				return false;
			}

			$result = $this->_ConstructPostData($postData);

			if (!$result) {
				$this->SetError(GetLang('CreditCardGatewayFail'));
				return false;
			}

			$result = $this->_HandleResponse($result);

			if ($result) {
				$this->SetPaymentStatus(PAYMENT_STATUS_PENDING);
			}

			return $result;
		}
		
		public function DoRefund($order, &$message = '', $amt = 0)
		{
			if($amt == 0) {
				$message = GetLang('RefundIncorrectAmount');
				return false;
			}

			$transactionId = $order['ordpayproviderid'];
			$orderId = $order['orderid'];
			echo $transactionId . " " . $orderId;

			$orderAmount = number_format($order['total_inc_tax'], 2);
			$amt = number_format($amt,2);
			$TotalRefundedAmt = number_format($amt+$order['ordrefundedamount'], 2);
			
			$result = Braintree_Transaction::refund($transactionId, $amt);
			print_r($result);


			if(!$result || empty($result)) {
				$message = GetLang('ErrorConnectToProvider');
				return false;
			}

			if($result->success) {

				$message = GetLang('RefundSuccess');

				//if total refunded is less than the order total amount
				if($TotalRefundedAmt < $orderAmount) {
					$paymentStatus = 'partially refunded';
				} else {
					$paymentStatus = 'refunded';
				}

				$updatedOrder = array(
					'ordpaymentstatus' => $paymentStatus,
					'ordrefundedamount'	=> $TotalRefundedAmt,
				);

				//update the orders table with new transaction details
				$GLOBALS['ISC_CLASS_DB']->UpdateQuery('orders', $updatedOrder, "orderid='".(int)$orderId."'");


				$refundSuccess = sprintf(GetLang('RefundSuccessLog'), $orderId);
				$GLOBALS['ISC_CLASS_LOG']->LogSystemSuccess(array('payment',  $this->GetName()), $refundSuccess);
				return true;

			} else {
				$responseMsg = '';
				$transid = '';
				if(isset($result->errors)) {
					$responseMsg = $result->errors->forKey('transaction')->onAttribute('refund');
				}
				
				$message = sprintf(GetLang('RefundFailed'), $responseMsg, $transactionId);

				$RefundError = sprintf(GetLang('RefundError'), $orderId, $transactionId);
				$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('payment', $this->GetName()), $RefundError, $responseMsg);
				return false;

			}
		}
		
		public function DoVoid($orderId, $transactionId, &$message = '')
		{
			$result = Braintree_Transaction::void($transactionId);

			if($result->success) {

				$message = GetLang('VoidSuccess');

				$updatedOrder = array(
					'ordpaymentstatus'	=> 'void',
				);
				//update the orders table with new transaction details
				$GLOBALS['ISC_CLASS_DB']->UpdateQuery('orders', $updatedOrder, "orderid='".(int)$orderId."'");

				$voidSuccess = sprintf(GetLang('VoidSuccessLog'), $orderId, $an_response[6]);
				$GLOBALS['ISC_CLASS_LOG']->LogSystemSuccess(array('payment',  $this->GetName()), $voidSuccess);
				return true;

			} else {
				$responseMsg = 'Error.';
				$transid = '';
				$message = sprintf(GetLang('VoidFailed'), $responseMsg, $transid);

				$voidError = sprintf(GetLang('VoidError'), $orderId, $transid);
				$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('payment', $this->GetName()), $voidError, $responseMsg);
				return false;
			}
		}
		
		public function DelayedCapture($order, &$message = '', $amt=0)
		{
			if($amt == 0 || $amt > $order['total_inc_tax']) {
				$message = GetLang('DelayedCaptureIncorrectAmount');
				return false;
			}

			$amt = number_format($amt, 2);
			$orderId = $order['orderid'];
			$transactionId = $order['ordpayproviderid'];

			$extraFields = array(
				"x_trans_id" => $transactionId,
			);

			$result = Braintree_Transaction::submitForSettlement($transactionId, $amt);

			if($submitResult->success) { // 1 is a success, 2 is declined and 3 is an error

				//set the message that's displayed in the front end
				$message = GetLang('DelayedCaptureSuccess');


				// Save the authorization key
				$updatedOrder = array(
					'ordpaymentstatus' => 'captured'
				);

				//update the orders table with new transaction details
				$GLOBALS['ISC_CLASS_DB']->UpdateQuery('orders', $updatedOrder, "orderid='".(int)$orderId."'");


				//log the transaction in store logs
				$delayedCaptureSuccess = sprintf(GetLang('DelayedCaptureSuccessLog'), $orderId, $an_response[4]);
				$GLOBALS['ISC_CLASS_LOG']->LogSystemSuccess(array('payment', $this->GetName()), $delayedCaptureSuccess, $an_response[3]);

				return true;
			}
			else {
				//set the message that's displayed in the front end
				$message = sprintf(GetLang('DelayedCaptureFailed'), "", "");

				//log the transaction in store logs
				$delayedCaptureError = sprintf(GetLang('DelayedCaptureError'), $orderId, $an_response[4]);
				$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('payment', $this->GetName()), $delayedCaptureError, $an_response[3]);
				return false;
			}
		}

		protected function _HandleResponse($response)
		{
			if (isset($response) && $response->success) {
				$transaction = $response->transaction;
				if($transaction->status == "authorized") {
					$updatedOrder = array(
						'ordpayproviderid' => $transaction->id,
						'ordpaymentstatus' => 'authorized',
					);

					$this->UpdateOrders($updatedOrder);
				}
				$GLOBALS['ISC_CLASS_LOG']->LogSystemSuccess(array('payment', $this->GetName()), GetLang($this->_languagePrefix.'Success'));

				return true;
			}
			else {
				$GLOBALS['ISC_CLASS_LOG']->LogSystemError(array('payment', $this->GetName()), sprintf(GetLang($this->_languagePrefix.'Failure'), $response->message));
				$this->SetError($response->message);
				return false;
			}
		}
	}
