<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$book = new Books();
$user=new Users;
if($_SESSION['type']!='inadmin'){
	header('location:/');
}
else{
		if(isset($_POST['book_name']) and isset($_POST['author_name']) and isset($_POST['description']) and isset($_POST['bid']) and isset($_POST['book_count'])){
			$book_name=mysqli_escape_string($GLOBALS['conn'],$_POST['book_name']);
			$book_count=mysqli_escape_string($GLOBALS['conn'],$_POST['book_count']);
			$author_name=mysqli_escape_string($GLOBALS['conn'],$_POST['author_name']);
			$description=mysqli_escape_string($GLOBALS['conn'],$_POST['description']);
			$bid=mysqli_escape_string($GLOBALS['conn'],$_POST['bid']);
			$booknames=['book_name','author_name','book_count','description'];
			$bookvalues=[$book_name,$author_name,$book_count,$description];
			$book->updateBook($booknames,$bookvalues,$bid);
			if($_FILES["book_cover"]["name"]){
				$t=substr($book_name,0,5);
				$i=substr($description,0,5);
				$title=str_replace(' ','',$t).str_replace(' ', '', $i);		
				$target_dir = __dir__.'/'.'../../resources/uploads/';   
				$filename=$title.".jpg";      
				$target_file = $target_dir . $filename;
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				if ($_FILES["book_cover_new"]["size"] > 1048576) {
					 $user->flashError(['Sorry, your file is too large. '],'/login?books=1');
				}
				if($imageFileType != "jpg") {
					 $user->flashError(['Upload File is not jpg Image '],'/login?books=1');
				}
				$deltitle=$_POST['book_cover'];
				$delfilename=$deltitle.".jpg";      
				$delfile_pointer = __dir__.'/'.'../../resources/uploads/'.$delfilename; 
				unlink($delfile_pointer); 
				$booknames=['cover_image_name'];
				$bookvalues=[$title];
				$book->updateBook($booknames,$bookvalues,$bid);
				if (!move_uploaded_file($_FILES["book_cover"]["tmp_name"], $target_file)) {	
					header('location:/login?view=books');		
				}
			}
			header('location:/login?view=books');		
		}
        if(isset($_GET['bid']) || isset($_POST['bid'])){
			$bid=(isset($_GET['bid']))?$_GET['bid']:$_POST['bid'];
			$rows=$book->fetchBook($bid);
			$book_name=$rows['book_name'];
			$author_name=$rows['author_name'];
			$book_count=$rows['book_count'];
			$description=$rows['description'];
			$cover=$rows['cover_image_name'];
			require __dir__.'/'.'../../view/common/sidebar.php'; 
		    require __dir__.'/'.'../../view/books/editBook_form_view.php';
		}
		elseif(!isset($_POST['book_name'])) {
			header('location:/');
		}
	}
?>