<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['uid'])){
	$user =new Users();
	$uid=$_SESSION['uid'];
	if(isset($_GET['bid'])){
		$bid=$_GET['bid'];
		$user->finishBook($uid,$bid);
		header('location:/login?books=1');
	}
	elseif(isset($_GET['dbid'])){
		$bid=$_GET['dbid'];
		$user->unfinishBook($uid,$bid);
		if(isset($_GET['listbooks']) && $_GET['listbooks'] == "alreadyread"){
			header('location:/login?listbooks=alreadyread');
		}
		else
			header('location:/login');
	}
	else 
		header("location:/");
}
?>