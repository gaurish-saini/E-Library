<?php
$user = new Users();
$uid=$_SESSION['uid'];
$readBook=$user->fetchBooks($uid,'issued');
require __dir__.'/'.'../../view/common/sidebar.php';
require __dir__.'/'.'../../view/books/booklist_view.php';
?>