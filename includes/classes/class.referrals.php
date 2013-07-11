<?php

class ISC_REFERRALS
{
	/**
	 * Identify same "customer" as someone with the same customer id, or ip address or email address.
	 *
	 * @return array
	 */
	public function getCustomerIdentifiers()
	{
		$quote = getCustomerQuote();
		$customerid = $quote->getCustomerId();
		$email = $quote->getBillingAddress()->getEmail();
		if ($email == '') {
			$customer = getCustomer($customerid);
			$email = $customer['custconemail'];
		}

		$identifiers = array(
			$customerid,
			$email,
		);

		return $identifiers;
	}


	/**
	 * Detect whether or not customer is new
	 *
	 * @return boolean
	 */
	public function isExistingCustomer()
	{
		$identifiers = $this->getCustomerIdentifiers();
		$query = "
			SELECT
				*
			FROM
				[|PREFIX|]orders
			WHERE
				ordbillemail = '".$GLOBALS['ISC_CLASS_DB']->Quote($identifiers[1])."'
				AND ordstatus != '0'";
		$result = $GLOBALS['ISC_CLASS_DB']->query($query);
		
		$entries = $GLOBALS['ISC_CLASS_DB']->fetch($result);
		
		if (!$entries) {
			return false;
		}
		else {
			return true;	
		}
	}

}