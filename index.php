<?php 

include('config/db_connect.php');
// <!-- write a query for all books -->
$sql = 'SELECT name, author, id FROM books';

// <!-- make query and get result -->
$result = mysqli_query($conn, $sql);

// <!-- fetch the ressulting rows as an array -->
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory 
mysqli_free_result($result); 

// close connection 

mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
	
	<?php include('templates/style.php'); ?>
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Enter a Tagline !</h4>

	<div class="container">
		<div class="row center">

			<?php foreach(array_reverse($books) as $books){ ?>

				<div class="col s4 md6">
					<div class="card z-depth-0">
					<i class="large material-icons book">book</i>
						<div class="card-content template">
							<h6><?php echo htmlspecialchars($books['name']); ?></h6>
							<div><?php echo htmlspecialchars($books['author']); ?></div>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="detail.php?id=<?php echo $books['id'] ?>">More Info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>


</html> 