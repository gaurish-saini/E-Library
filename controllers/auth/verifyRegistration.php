<?php
$emailid=$_GET['id'];
$pass=$_GET['secret'];
$user=new Users;
$db_values=$user->fetchUserAuth($emailid);
$db_pass=$db_values['password'];
if($pass===$db_pass){
	$user->activate($emailid);
	header('location:/logout');
}
else
	header('location:/splashmsg?msgtype=verificationfailed');
?>