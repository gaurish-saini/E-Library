<?php

include('config/db_connect.php');
$name = $author = $id = $description = ''; 
$image= array('img_name'=> '');
$errors = array('name'=>'','author'=>'','id'=>'','description'=>'','img_name'=>'');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES ['img_name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
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
            $name = mysqli_real_escape_string($conn, $_POST['name']);
			$author = mysqli_real_escape_string($conn, $_POST['author']);
			$id = mysqli_real_escape_string($conn, $_POST['id']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
			// create sql
			$sql = "INSERT INTO books(name,author,id,description) VALUES('$name','$author','$id','$description')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: admin.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}
		// Check if image file is a actual image or fake image
		if(isset($_POST["file"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
			  echo "File is an image - " . $check["mime"] . ".";
			  $uploadOk = 1;
			} else {
			  echo "File is not an image.";
			  $uploadOk = 0;
			}
		  }
		  
		  // Check if file already exists
		  if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		  }
		  
		  
		  // Allow certain file formats
		  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		  && $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		  }
		  
		  // Check if $uploadOk is set to 0 by an error
		  if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		  // if everything is ok, try to upload file
		  } else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			  echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["img_name"])). " has been uploaded.";
			} else {
			  echo "Sorry, there was an error uploading your file.";
			}
		  }
    }

		// //check description
		// if(empty($_POST['description'])){
		// 	echo 'A description is required <br />';
		// }  
		
		
		
?>
 
<!DOCTYPE html>
<html>

    <?php include('templates/style.php'); ?>
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Enter a Tagline !</h4>
			<div class="col s6 md6">
				<form class="grey lighten-4 " action="add.php" method="POST">    
					<label>Enter Book Name *</label>
					<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
					<div class="red-text"><?php echo $errors['name']; ?></div><br />
					<label>Enter Author Name *</label>
					<input type="text" name="author" value="<?php echo htmlspecialchars($author) ?>">
					<div class="red-text"><?php echo $errors['author']; ?></div><br />
					<label>Enter Book Id *</label>
					<input type="text" name="id" value="<?php echo htmlspecialchars($id) ?>">
					<div class="red-text"><?php echo $errors['id']; ?></div><br />
					<label>Enter Description/About *</label><br /><br /><br />
					<textarea id="textarea" class="materialize-textarea" name="description" value="<?php echo htmlspecialchars($description) ?>"></textarea>
					<div class="red-text"><?php echo $errors['description']; ?></div><br />
					<div class="grey lighten-4 center border" enctype="multipart/form-data" >
						<!-- <a class="waves-effect waves-light btn" id="btn-file"><i class="material-icons right">upload</i>Upload Image<input type="file" img_name="fileToUpload" id="fileToUpload" ></a> -->
						<!-- <input type="submit" value="Upload Image" name="submit"> -->
						<span class="btn btn-file">
						<i class="material-icons right">upload</i>
								Upload Image<input type="file">
						</span>
				    </div><br /><br />
					<div class="center">
						<input type="submit" name="save" value="save" class="btn brand z-depth-0">
					</div>
				</form>
			</div>		
	</section>

	<?php include('templates/footer.php'); ?>

</html>