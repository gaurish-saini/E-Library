<?php 


include('config/db_connect.php');
include('session.php');

// session_start();

  if($_SERVER['QUERY_STRING'] == 'noname'){
    //unset($_SESSION['username']);
    session_unset();
  }

// $name = $_SESSION[$user_check];


// <!-- write a query for all books -->
$sql = 'SELECT * FROM books';

// <!-- make query and get result -->
$result = mysqli_query($conn, $sql);

// <!-- fetch the resulting rows as an array -->
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory 
mysqli_free_result($result); 

// close connection 

mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
	
<?php include('templates/style.php'); ?>
	<div class="container">
		<a href="#" data-target="slide-out" class="sidenav-trigger label-btn indigo-text z-depth-0 right"><i class="material-icons menu">menu</i></a>
	</div>  
<?php include('templates/script.php'); ?>
	<nav class=" white z-depth-0">
	<div class="container">
      			<a href="index.php" class="brand-logo brand-text">E-Library</a>
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
				<!-- <li><a class="waves-effect grey-text" href="admin/aalreadyread.php">Already Read</a></li> -->
				<li><a class="waves-effect grey-text" href="admin/awishlist.php">Wishlist</a></li>
			</li>
			<li><a class="waves-effect brand-text" href="ayourbook.php">Your Books</a></li>
			<li><a class="waves-effect brand-text" href="manageadmin.php">Manage Admins</a></li>
            <li><div class="divider brand-text"></div></li></br>
			<li><a href = "logout.php">Log Out</a></li>

 		</ul>
     <!-- <h4 class="center grey-text">Enter a Tagline !</h4> -->
<body class="grey lighten-4 ">
	<div class="container grey lighten-4 col s12">
		<div class="container">
			<div class="row">
				<?php foreach(array_reverse($books) as $books){ ?>				
					<div class="col s4 md6">
						<div class="card">
							<div class="card-image ">
								<img class="bookImage" src="<?php echo htmlspecialchars($books['image']); ?>">
							</div>
							<div class="card-content content-height">
								<a class="card-title black-text" href="detail.php?id=<?php echo $books['id'] ?>"><?php echo htmlspecialchars($books['name']); ?></a>
								<a class='brand-text' type="submit" name="issue" href="ayourbook.php?id=<?php echo $books['id'] ?>">Issue |</a>
								<a class='brand-text' type="submit" name="wishlist" href="../admin/awishlist.php?id=<?php echo $books['id'] ?>"> Wishlist</a>
								
							</div>						
							<div class="card-action action-height"><?php echo htmlspecialchars($books['author']); ?></div>
						</div>
					</div>			    
				<?php } ?>
				<div class="fixed-action-btn">
					    <a class="btn-floating btn-large brand"><i class="large material-icons">more_vert</i></a>
    					<ul>
							<li class="fixed-action-btn horizontal FAB2">
								<li><a href="edit.php" class="btn-floating indigo"><i class="material-icons">edit</i></a></li>
								<li><a href="add.php" class="btn-floating indigo"><i class="material-icons">add</i></a></li>
							</li>
                        </ul>
                </div>
			</div>
		</div>
	</div>
</body>
	<?php include('templates/footer.php'); ?>


</html> 