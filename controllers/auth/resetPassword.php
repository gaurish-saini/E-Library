<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$msg1=NULL;
if(isset($_SESSION['error1'])){
	$msg1="<p class='red-text'>{$_SESSION['error1']}</p>";
	unset($_SESSION['error1']);
}
if(isset($_SESSION['name'])){
	$emailid=$_SESSION['name'];
	unset($_SESSION['name']);
}
if(($_GET['id']&&$_GET['secret'])||($_SESSION['name']&&$_SESSION['secret'])){
	$user = new Users();
	$emailid=(isset($_GET['id']))?mysqli_escape_string($conn,$_GET['id']):$_SESSION['name'];
	$pass=(isset($_GET['secret']))?mysqli_escape_string($conn,$_GET['secret']):$_SESSION['secret'];
	if(!$user->freshUser($emailid,$conn)){
		$row=$user->fetchUserAuth($emailid);
		if($row['password']===$pass)
			require __dir__.'/'.'../../view/users/changePassword.view.php';
		else
			header('location:/');
	}
	else
		header('location:/');
}
else
	header('location:/');
?>