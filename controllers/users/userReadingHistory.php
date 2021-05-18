<?php
$user = new Users();
$uid=$_SESSION['uid'];
$readBook=$user->fetchBooks($uid, 'history_read');
require __dir__.'/'.'../../view/common/sidebar.php';
require __dir__.'/'.'../../view/books/readingHistory_view.php';
?>