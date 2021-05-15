<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['uid'])){
	$user =new Users();
	$uid=$_SESSION['uid'];
	if(isset($_GET['bid'])){
		$bid=$_GET['bid'];
		$user->readBook($uid,$bid);
		$user->readHistoryBook($uid,$bid);
		header('location:/login?books=1');
	}
	elseif(isset($_GET['dbid'])){
		$bid=$_GET['dbid'];
		$user->unreadBook($uid,$bid);
		if(isset($_GET['listbooks']) && $_GET['listbooks'] == "shelf"){
			header('location:/login?listbooks=shelf');
		}
		else
			header('location:/login');
	}
	else 
		header("location:/");
}
?>