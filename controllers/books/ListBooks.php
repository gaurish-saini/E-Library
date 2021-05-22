<?php
$book = new Books();
$search = '';
$books_sorting = 'latest';
$bookIds=NULL;
$limit=(isset($_POST['limit']))?mysqli_escape_string($conn,$_POST['limit']):6;
$offset=(isset($_GET['offset']))?mysqli_escape_string($conn,$_GET['offset']):0;
$total=mysqli_num_rows($book->fetchBooks());
if(isset($bookIds)){
	$rows=$book->fetchBooks();
} else  {
	if(isset($_GET['books-sorting'])) {
		$books_sorting = $_GET['books-sorting'];
	}
	if(isset($_GET['search']) && !empty($_GET['search']) ) {
		$search = $_GET['search'];
	}
	$rows=$book->fetchBooksLimit($limit,$offset, $books_sorting, $search);
}
$_SESSION['limit']=$limit;
$limit=($limit>$total)?$total:$limit;
// require __dir__.'/'.'../../view/common/modals.view.php'; 
require __dir__.'/'.'../../view/books/bookcard_view.php';
?>