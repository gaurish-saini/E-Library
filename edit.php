<?php
$name = $author = $id = $description = ''; 
$errors = array('name'=>'','author'=>'','id'=>'','description'=>'');
	
    if(isset($_POST['save'])){
		
		// edit name
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} 
		

		// edit author
		if(empty($_POST['author'])){
			$errors['author'] = 'A author is required <br />';
        } 
        // edit id
		if(empty($_POST['id'])){
			$errors['id']= 'A id is required <br />';
        }
        
        if(array_filter($errors)){
            // echo 'errors in the form';
        }
        else{
            // echo 'form is valid';
            header('Location: index.php');
            
        }
    

		//edit description
		if(empty($_POST['description'])){
			$errors['description']= 'A description is required <br />';
        }  
    }
?>
 
<!DOCTYPE html>
<html>

    <?php include('templates/style.php'); ?>
	<?php include('templates/addheader.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Enter a Tagline !</h4>
		<form class="grey lighten-4" action="edit.php" method="POST">    
			<label>Edit Book Name *</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
            <div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Edit Author Name *</label>
			<input type="text" name="author" value="<?php echo htmlspecialchars($author) ?>">
            <div class="red-text"><?php echo $errors['author']; ?></div>
			<label>Edit Book Id *</label>
			<input type="text" name="id" value="<?php echo htmlspecialchars($id) ?>">
            <div class="red-text"><?php echo $errors['id']; ?></div>
            <label>Edit Description/About *</label>
            <textarea id="textarea" class="materialize-textarea" name="description" value="<?php echo htmlspecialchars($description) ?>"></textarea>
			<div class="red-text"><?php echo $errors['description']; ?></div>
            <div class="center">
				<input type="submit" name="save" value="save" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>