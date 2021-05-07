<?php
$book = new Books();
if(isset($_SESSION['fetchBooks'])){
	$bookIds=$_SESSION['fetchBooks'];
}
else
	$bookIds=NULL;
$limit=isset($_SESSION['limit'])?$_SESSION['limit']:9;
$limit=(isset($_POST['limit']))?mysqli_escape_string($conn,$_POST['limit']):$limit;
$offset=(isset($_GET['offset']))?mysqli_escape_string($conn,$_GET['offset']):0;
$total=mysqli_num_rows($book->fetchBooks());
if(isset($bookIds))
	$rows=$book->fetchBooks();
else	
	$rows=$book->fetchBooksLimit($limit,$offset);
$_SESSION['limit']=$limit;
$limit=($limit>$total)?$total:$limit;
require __dir__.'/'.'../../view/books/bookcard_view.php';
?>