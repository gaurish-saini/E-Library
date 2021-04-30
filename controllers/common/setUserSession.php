<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($type) && isset($uid)){
	$_SESSION['type']=($type==0)?'inreader':'inadmin';
	$_SESSION['uid']=$uid;
	$_SESSION['username']=$name;
	$_SESSION['email']=$email;
}
?>