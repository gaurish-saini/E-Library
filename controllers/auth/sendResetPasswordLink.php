<?php
$user=new Users();
$mailId=new Mail();
// if($mailid){
// 	var_dump('Mail bna');die();
// }
if(isset($_POST['resemailid'])){
	$emailid=mysqli_escape_string($conn,$_POST['resemailid']);
	session_start();
	$_SESSION['resemailid']=$emailid;
	if($user->freshUser($emailid,$conn)){
		$user->flashError([NULL,NULL,'Email Address Not Registered'],'/');
	}
	else{

		// echo 'hey 2';
		$row=$user->fetchUser($emailid);
		$name=$row['user_name'];
		$pass=$row['password'];
		$lnk='http://e-library.test/passwordreset?id='.$emailid.'&secret='.$pass;
		if($mailId->sendResetPasswordMail($lnk,$emailid,$name)){
			header("location:/splashmsg?msgtype=forgotpassword");
		}
		else{
			$user->flashError([NULL,NULL,'Internal Error, Try Again'],'/');
		}	
	}
}
else
	$user->flashError([NULL,NULL,'Please Enter Valid Email Address'],'/');
?>