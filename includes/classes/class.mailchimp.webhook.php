<?php
class ISC_MAILCHIMP_WEBHOOK
{

	public function HandleCallback()
	{	
		if(isset($_POST['data'])) {
			$data = $_POST['data'];
			if(!isset($data['email'])) return;
			$email = $data['email'];
			
			$cats = $this->GetCategories();
			$code = $this->CommitCode($cats);

			if($code) {
				$this->SendEmail($code, $email);
			}
		}
		
		if(isset($_GET['generator'])) {
			$cats = $this->GetCategories();
			for($i = 0; $i < 275; $i++) {
				$code = $this->CommitCode($cats, '50', $type = 2, $prefix = "LCKYFABB");
				print($code . "<br/>");
			}
		}
	}
	
	private function GetCategories() {
		$cats = Array();
		$query = "SELECT categoryid as id FROM isc_categories WHERE
					catname NOT LIKE '%Watch of the Month Club%'";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		while($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
			$cats[] = $row['id'];
		}
		return $cats;
	}	
	
	private function GenCode($prefix = 'EMAIL') {
		$suffix = $this->getRandomString(5);
		$code = $prefix . $suffix;
		return $code;
	}
	
	private function CommitCode($cats, $amount = '5', $type = 2, $prefix = 'EMAIL', $expiry = 0) {
		$code = $this->GenCode($prefix);
		
		// Make sure the code is unique, if not... try again.
		$query = "SELECT couponid FROM isc_coupons WHERE couponname LIKE '" . $code . "' LIMIT 1";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		if($GLOBALS['ISC_CLASS_DB']->CountResult($result) > 0) {
			$code = $this->CommitCode($cats, $amount);
			return $code;
		}
	
		$query = "INSERT INTO isc_coupons (couponname, coupontype, couponamount, couponenabled, couponcode, couponmaxuses, couponappliesto, couponexpires)
				   VALUES ('" . $code . "', '" . $type . "', '" . $amount . "', '1', '" . $code . "', '1', 'categories', '" . $expiry . "')";
		$result = $GLOBALS['ISC_CLASS_DB']->Query($query);
		
		if($result) {
			$coupid = $GLOBALS['ISC_CLASS_DB']->LastId();
			for($f=0;$f<count($cats);$f++) {
				$query2 = "INSERT INTO isc_coupon_values (couponid, valueid)
				VALUES ('" . $coupid . "', '" . $cats[$f] . "')";
				if(!$GLOBALS['ISC_CLASS_DB']->Query($query2)) {
					return false;
				}
			}
		}
		else {
			return false;
		}
		
		return $code;
	}
	
	private function SendEmail($code, $email) {
		$GLOBALS['EmailHeader'] = GetLang("EmailSubscribeReward");
		$GLOBALS['Code'] = $code;

		$emailTemplate = FetchEmailTemplateParser();
		$emailTemplate->SetTemplate("coupon_delivery");
		$message = $emailTemplate->ParseTemplate(true);

		require_once(ISC_BASE_PATH . "/lib/email.php");
		$obj_email = GetEmailClass();
		$obj_email->Set('CharSet', GetConfig('CharacterSet'));
		$obj_email->From(GetConfig('OrderEmail'), GetConfig('StoreName'));
		$obj_email->Set("Subject", GetLang("EmailSubscribeRewardSubject"));
		$obj_email->AddBody("html", $message);
		$obj_email->AddRecipient($email, "", "h");
		$email_result = $obj_email->Send();
		print "The email should be sent out... awesome! We are done!";
	}

	private function getRandomString($length = 6) {
		$validCharacters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$validCharNumber = strlen($validCharacters);
	 
		$result = "";
	 
		for ($i = 0; $i < $length; $i++) {
			$index = mt_rand(0, $validCharNumber - 1);
			$result .= $validCharacters[$index];
		}
	 
		return $result;
	}

}
