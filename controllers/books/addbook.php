<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$msg1=$msg2=$msg3=$msg4=NULL;
$book = new Books();
$user=new Users;
if($_SESSION['type']!='inadmin'){
	header('location:/');
}
else{
	if(isset($_POST['book_name']) and isset($_POST['author_name']) and isset($_POST['book_count']) and isset($_POST['description'])){
		if($_POST['book_name']!=''){
			$book_name=mysqli_escape_string($conn,$_POST['book_name']);
			$_SESSION['book_name']=$book_name;	
		}
		else{
			$user->flashError(['Invalid Book Name'],'/addbook');
		}	
		if($_POST['author_name']!=''){
			$author_name=mysqli_escape_string($conn,$_POST['author_name']);
			$_SESSION['author_name']=$author_name;	
		}
		else{
			$user->flashError([NULL,'Invalid Author Name'],'/addbook');
		}	
		if($_POST['book_count']!=''){
			$book_count=mysqli_escape_string($conn,$_POST['book_count']);
			$_SESSION['book_count']=$book_count;	
		}
		else{
			$user->flashError([NULL,NULL,'Invalid Book Edition'],'/addbook');
		}	
		if($_POST['description']!=''){
			$description=mysqli_escape_string($conn,$_POST['description']);
			$_SESSION['description']=$description;	
		}
		else{
			$user->flashError([NULL,NULL,NULL,'Invalid Description'],'/addbook');
		}
		if(isset($book_name) && isset($author_name) && isset($book_count) && isset($description)){
			$book_name=mysqli_escape_string($conn,$_POST['book_name']);
			$author_name=mysqli_escape_string($conn,$_POST['author_name']);
			$description=mysqli_escape_string($conn,$_POST['description']);
			$count=mysqli_escape_string($conn,$_POST['book_count']);
			$i=1;
			$t=substr($book_name,0,5);
			$i=substr($description,0,5);
			$title=str_replace(' ','',$t).str_replace(' ', '', $i);		
			$target_dir = __dir__.'/'.'../../resources/uploads/';   
			$filename=$title.".jpg";      
			$target_file = $target_dir . $filename;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$check = getimagesize($_FILES["book_cover"]["tmp_name"]);
			if(($check == true)&&($_FILES["book_cover"]["size"] < 1048576)&&($imageFileType == "jpg")) {
				if (move_uploaded_file($_FILES["book_cover"]["tmp_name"], $target_file)) {
					if($bid=$book->registerBook($book_name,$author_name,$count,$description,$title)){
						header('location:/login?view=books');
					}
					else
						header('location:/login?view=books');		
				}
				else
					header('location:/login?view=books');
			}
			else
				header('location:/login?books=1');
		}
		else{
			$user->flashError(['Invalid Book Name','Invalid Author Name','Invalid Book Edition'],'/addbook');
		}
	}
	else{
		$msg1=$msg2=$msg3=$book_name=$author_name=$book_count=NULL;
		if(isset($_SESSION['error1'])){
			$msg1="<p class='red-text book-form-label'>{$_SESSION['error1']}</p>";
			unset($_SESSION['error1']);
		}
		if (isset($_SESSION['error2'])){
			$msg2="<p class='red-text book-form-label'>{$_SESSION['error2']}</p>";
			unset($_SESSION['error2']);
		}
		if (isset($_SESSION['error3'])){
			$msg3="<p class='red-text book-form-label'>{$_SESSION['error3']}</p>";
			unset($_SESSION['error3']);
		}
		if(isset($_SESSION['book_name'])){
			$book_name=$_SESSION['book_name'];
			unset($_SESSION['book_name']);
		}

		if(isset($_SESSION['author_name'])){
			$author_name=$_SESSION['author_name'];
			unset($_SESSION['author_name']);
		}
		if(isset($_SESSION['book_count'])){
			$book_count=$_SESSION['book_count'];
			unset($_SESSION['book_count']);
		}
		require __dir__.'/'.'../../view/common/sidebar.php'; 
		require __dir__.'/'.'../../view/books/addBook_form_view.php';
	}
}
?>