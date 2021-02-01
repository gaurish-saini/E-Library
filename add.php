<?php

include('config/db_connect.php');
$name = $author = $id = $description = ''; 
$errors = array('name'=>'','author'=>'','id'=>'','description'=>'');
	
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
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
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
		<form class="grey lighten-4" action="add.php" method="POST">    
			<label>Enter Book Name *</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
            <div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Enter Author Name *</label>
			<input type="text" name="author" value="<?php echo htmlspecialchars($author) ?>">
            <div class="red-text"><?php echo $errors['author']; ?></div>
			<label>Enter Book Id *</label>
			<input type="text" name="id" value="<?php echo htmlspecialchars($id) ?>">
            <div class="red-text"><?php echo $errors['id']; ?></div>
            <label>Enter Description/About *</label>
            <textarea id="textarea" class="materialize-textarea" name="description" value="<?php echo htmlspecialchars($description) ?>"></textarea>
			<div class="red-text"><?php echo $errors['description']; ?></div>
            <div class="center">
				<input type="submit" name="save" value="save" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>