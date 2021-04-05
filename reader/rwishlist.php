<?php 


include('../config/db_connect.php');
include('../session.php');
$id= $books='';
if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM has_book WHERE has_book.book_id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        header('Location: ../reader.php');
    } else {
        echo 'query error: '. mysqli_error($conn);
    }

}

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
	
<?php include('../templates/style.php'); ?>
	<div class="container">
		<a href="#" data-target="slide-out" class="sidenav-trigger label-btn indigo-text z-depth-0 right"><i class="material-icons menu">menu</i></a>
	</div>  
<?php include('../templates/script.php'); ?>
	<nav class=" white z-depth-0">
	<div class="container">
      			<a href="..\index.php" class="brand-logo brand-text">E-Library</a>
     			<a href="#" class="label-btn indigo-text z-depth-0 right">PROFILE</a>
			</div>
	</nav></br>

	    <ul id="slide-out" class="sidenav">
			<li>
				<div class="user-view">
				<a href="#name"><span class="indigo-text name">Hello</span></a>
				<a href="#email"><span class="indigo-text email"><?php echo $login_session; ?></span></a>
				<span class="indigo-text name">Dashboard</span>
				</div>
			</li>
			<li><div class="divider brand-text"></div></li></br>
			<li><a class="subheader brand-text">Marked</a></li>
			<li>
				<li><a class="waves-effect grey-text" href="../reader.php">All Books</a></li>
				<!-- <li><a class="waves-effect grey-text" href="aalreadyread.php">Already Read</a></li> -->
				<li><a class="waves-effect grey-text" href="rwishlist.php">Wishlist</a></li>
			</li>
			<li><a class="waves-effect brand-text" href="..\ryourbook.php">Your Books</a></li>
			<li><div class="divider brand-text"></div></li></br>
			<li><a href = "..\logout.php">Log Out</a></li>
 		</ul>

         <body class="grey lighten-4 ">
	<div class="container grey lighten-4">
	<div class="container">
	<div class="row">
			<div class="row">
				<?php if($id): ?>	
							<!-- <?php echo ($issue_book); ?> -->
					<div class="col s4 md6">
						<div class="card">
							<div class="card-image ">
								<img class="bookImage" src="<?php echo htmlspecialchars($books['image']); ?>">							
							</div>
							<div class="card-content left-align">
								<a class="card-title black-text" href="rdetail.php?id=<?php echo $books['id'] ?>"><?php echo htmlspecialchars($books['name']); ?></a>
								<h6><?php echo htmlspecialchars($books['author']); ?></h6>
							</div>
							<div class="card-action left-align">
								<a class='brand-text' type="submit" name="issue" href="../ryourbook.php?id=<?php echo $books['id'] ?>">Issue</a>
								<a class="dropdown-trigger right dropdown-icon" data-target='dropdown1' ><i class="material-icons right" >more_vert</i></a>
								<ul id='dropdown1' class='dropdown-content brand-text' >
								<form action="rwishlist.php"  method="POST">
									<input type="hidden" name="id_to_delete" value="<?php echo $books['id'] ?>" >
									<input type="submit" name="delete" value="Return" class="btn brand z-depth-0">
								</form>                                   
								</ul>
							</div>
						</div>
					</div>			   
				<?php else: ?>
                <div class="center">
                    <h6>No book added yet !</h6>
                </div>
                <?php endif ?>
			</div>
	</div>
</body>
	<?php include('..\templates\footer.php'); ?>


</html> 