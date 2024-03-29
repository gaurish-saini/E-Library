<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __dir__.'/'.'../../resources/PHPMailer/src/Exception.php';
require __dir__.'/'.'../../resources/PHPMailer/src/PHPMailer.php';
require __dir__.'/'.'../../resources/PHPMailer/src/SMTP.php';
$mail = new PHPMailer;
require __dir__.'/'.'../configs/PHPMailer/config.php';
class Mail {
	public function sendResetPasswordMail($lnk,$emailid,$name){
		$GLOBALS['mail']->addAddress($emailid, $name);
		$GLOBALS['mail']->Subject  = 'Password Reset Link for eLibrary';
		$GLOBALS['mail']->Body     = 'Hi '.$name.' ,<br/><br>Please<a href="'.$lnk.'"> click on this password reset link.</a><br/></br>Enjoy using eLibrary. <br> <br/><br/>Thanks & Regards,<br> eLibrary Team';
		if(!$GLOBALS['mail']->send()) {
			return FALSE;
		}
		return TRUE; 
	}
	public function sendMail($emailid,$name,$body,$subject){
		$GLOBALS['mail']->addAddress($emailid, $name);
		$GLOBALS['mail']->Subject  = $subject;
		$GLOBALS['mail']->Body     = $body;
		if(!$GLOBALS['mail']->send()) {
			return FALSE;
		}
		return TRUE; 
	}
}
?>
