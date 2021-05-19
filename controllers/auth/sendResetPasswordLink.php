<?php
$user=new Users();
$forPasswordReset=new Mail();
if(isset($_POST['resemailid'])){
	$emailid=mysqli_escape_string($conn,$_POST['resemailid']);
	session_start();
	$_SESSION['resemailid']=$emailid;
	if($user->freshUser($emailid,$conn)){
		$user->flashError([NULL,NULL,'Email Address Not Registered'],'/');
	}
	else{

		// echo 'hey 2';
		$row=$user->fetchUserAuth($emailid);
		$name=$row['user_name'];
		$pass=$row['password'];
		$lnk='http://e-library.test/passwordreset?id='.$emailid.'&secret='.$pass;
		if($forPasswordReset->sendResetPasswordMail($lnk,$emailid,$name)){
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