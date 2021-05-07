<?php
$book = new Books();
	$rows=$book->fetchBooks();
require __dir__.'/'.'../../view/books/bookcard_view.php';
?>