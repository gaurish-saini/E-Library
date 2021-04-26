<?php

require __dir__.'/'.'../../models/database/connection.php';
$name = $author = $image= $id = $description = ''; 
$errors = array('name'=>'','author'=>'','id'=>'','description'=>'','image'=>'');
	
    if(isset($_POST['save'])){
		
		// check name
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} 
		// check author
		if(empty($_POST['author'])){
			$errors['author'] = 'A author is required <br />';
        } 
        // check id
		if(empty($_POST['id'])){
			$errors['id']= 'A id is required <br />';
        }
        

        if(array_filter($errors)){
            // echo 'errors in the form';
        }
        else{
            $name = mysqli_real_escape_string($conn, $_POST["name"]);
			$author = mysqli_real_escape_string($conn, $_POST["author"]);
			$image = mysqli_real_escape_string($conn, $_POST["image"]);
			$id = mysqli_real_escape_string($conn, $_POST["id"]);
            $description = mysqli_real_escape_string($conn, $_POST["description"]);
			// create sql
			$sql = "INSERT INTO books(name,author,image,id,description) VALUES('$name','$author','$image','$id','$description')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}
		
    }
		
		
?>