<?php 
include('config/db_connect.php');

//   to delete

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM books WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
    } else {
        echo 'query error: '. mysqli_error($conn);
    }

}
//   check GET request id  parameter

if(isset($_GET['id'])){
		
    // escape sql chars
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    // make sql
    $sql = "SELECT * FROM books WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $books = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}


?>
<!DOCTYPE html>
<html>
	
	<?php include('templates/style.php'); ?>
	
	
<body class="grey lighten-4">
	<nav class="white z-depth-0">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text">E-Library</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li><a href="edit.php" class="btn brand z-depth-0">Edit Details</a></li>
        <li><a href="add.php" class="btn brand z-depth-0">Add a Book</a></li>
        
      </ul>
    </div>
    </nav>
	
    <div class="container left -align">
		<?php if($books): ?>
            <div class="col s2 md6">	
                <form class="grey lighten-4" >    
                <label>Book Title</label>
                <h6><?php echo $books['name']; ?></h6>
                <label>Author </label>
                <h6><?php echo $books['author']; ?></h6>
                <label>Book Id </label>
                <h6><?php echo $books['id']; ?></h6>
                <label>About </label>
                <h6><?php echo $books['description']; ?></h6>
                </form>

                <!-- DELETE FORM -->
			   <form action="detail.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $books['id']; ?>">
			   	<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			   </form>
            </div>
		<?php else: ?>
			<h5 class="container center">No such book exists.</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>


</html>