<?php
class ISC_SEND_EMAILS
{

	public function HandleCallback() {	
		if(isset($_GET['go'])) {
			if($_GET['go'] == "25") {
				$this->SendEmails25();
			}
			if($_GET['go'] == "1000") {
				$this->SendEmails1000();
			}
		}
	}
	
	private function SendEmails25() {
		$handle = file_get_contents('http://www.modifywatches.com/gsn25.csv');
		$codes = array_chunk(str_getcsv($handle), 4);
		foreach($codes as $code) {
			$GLOBALS['EmailHeader'] = "Your Code for Modify Watches has arrived from GSN!";
			$email = $code[1];
			$GLOBALS['Name'] = $code[2];
			$GLOBALS['Code'] = $code[0];
			$emailTemplate = FetchEmailTemplateParser();
			$emailTemplate->SetTemplate("gsn_delivery");
			$message = $emailTemplate->ParseTemplate(true);

			require_once(ISC_BASE_PATH . "/lib/email.php");
			$obj_email = GetEmailClass();
			$obj_email->Set('CharSet', GetConfig('CharacterSet'));
			$obj_email->From(GetConfig('OrderEmail'), GetConfig('StoreName'));
			$obj_email->Set("Subject", "Your Code for Modify Watches has arrived from GSN!");
			$obj_email->AddBody("html", $message);
			$obj_email->AddRecipient($email, "", "h");
			$email_result = $obj_email->Send();
			print "The email should be sent out... awesome! We are done!<br/>";
		}
	}
	
	private function SendEmails1000() {
		$handle = file_get_contents('http://www.modifywatches.com/gsn1000.csv');
		$codes = array_chunk(str_getcsv($handle), 2);
		foreach($codes as $code) {
			$GLOBALS['EmailHeader'] = "Your 30% Off Modify Watches Coupon Code has arrived from GSN!";
			$email = $code[0];
			$GLOBALS['Code'] = $code[1];
			$emailTemplate = FetchEmailTemplateParser();
			$emailTemplate->SetTemplate("gsn_delivery_1000");
			$message = $emailTemplate->ParseTemplate(true);

			require_once(ISC_BASE_PATH . "/lib/email.php");
			$obj_email = GetEmailClass();
			$obj_email->Set('CharSet', GetConfig('CharacterSet'));
			$obj_email->From(GetConfig('OrderEmail'), GetConfig('StoreName'));
			$obj_email->Set("Subject", "Your 30% Off Modify Watches Coupon Code has arrived from GSN!");
			$obj_email->AddBody("html", $message);
			$obj_email->AddRecipient($email, "", "h");
			$email_result = $obj_email->Send();
			print "The email should be sent out... awesome! We are done!<br/>";
		}
	}
	
}
?>
