<?php 

include('C:\xampp\htdocs\eLibrary\templates\config\db_connect.php');
include('..\session.php');
// <!-- write a query for all books -->
$sql = 'SELECT * FROM books';

// <!-- make query and get result -->
$result = mysqli_query($conn, $sql);

// <!-- fetch the ressulting rows as an array -->
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(isset($_POST['alreadyread'])){
	if(mysqli_query($conn, $sql)){
		// success
		header('Location: alreadyread.php');
	} else {
		echo 'query error: '. mysqli_error($conn);
	}
}

// free result from memory 
mysqli_free_result($result); 

// close connection 

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
	
<?php include('templates\style.php'); ?>
	<div class="container">
		<a href="#" data-target="slide-out" class="sidenav-trigger label-btn indigo-text z-depth-0 right"><i class="material-icons menu">menu</i></a>
	</div>  
<?php include('templates\script.php'); ?>
	<nav class=" white z-depth-0">
	<div class="container">
      			<a href="C:\xampp\htdocs\eLibrary\reader.php" class="brand-logo brand-text">E-Library</a>
     			<a href="#" class="label-btn indigo-text z-depth-0 right">PROFILE</a>
			</div>
	</nav></br>

	    <ul id="slide-out" class="sidenav">
			<li>
				<div class="user-view">
				<!-- <div class="background">
					<img src=".jpg">
				</div> -->
				<!-- <a href="#user"><img class="circle" src="../img/1611234086050.jpg"></a> -->
				<a href="#name"><span class="indigo-text name">Hello</span></a>
				<a href="#email"><span class="indigo-text email"><?php echo $login_session; ?></span></a>
				<span class="indigo-text name">Dashboard</span>
				</div>
			</li>
			<li><div class="divider brand-text"></div></li></br>
			<li><a class="subheader brand-text">Marked</a></li>
			<li>
			    <li><a class="waves-effect grey-text" href="../reader.php">All Books</a></li>
				<li><a class="waves-effect grey-text" href="ralreadyread.php">Already Read</a></li>
				<li><a class="waves-effect grey-text" href="rwishlist.php">Wishlist</a></li>
			</li>
			<li><a class="waves-effect brand-text" href="../ryourbook.php">Your Books</a></li>
			<li><div class="divider brand-text"></div></li></br>
			<li><a href = "..\logout.php">Log Out</a></li>
 		</ul>

         <body class="grey lighten-4 ">
	<div class="container grey lighten-4">
	<div class="container">
		<div class="row center">
			<?php foreach(array_reverse($books) as $books){ ?>
				<div class="col s4 md6">
					<div class="card ">
					<div class="card-image ">
						<img src="<?php echo htmlspecialchars($books['image']); ?>">
						<a class="card-title"><?php echo htmlspecialchars($books['name']); ?></a>
                     </div>
						<div class="card-content left-align">
						<h6><?php echo htmlspecialchars($books['author']); ?></h6>
						</div>
						<div class="card-action left-align">
							<a class="brand-text" href="#" >READ ></a>
                            <a class="dropdown-trigger right dropdown-icon" data-target='dropdown1' ><i class="material-icons right" >more_vert</i></a>

                            <ul id='dropdown1' class='dropdown-content brand-text'>
                                <li><a class='brand-text' type="submit" action="ralreadyread.php" name="remove">remove</a></li>
                                <!-- <li><a class='brand-text'href="#!"></a></li> -->
                            </ul>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	</div>
</body>
	<!-- <?php include('..\templates\footer.php'); ?> -->


</html> 