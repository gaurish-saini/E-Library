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
			<li><div class="user-view">
			<!-- <div class="background">
				<img src=".jpg">
			</div> -->
			<a href="#user"><img class="circle" src="img/1611234086050.jpg"></a>
			<a href="#name"><span class="indigo-text name">Gaurish</span></a>
			<a href="#email"><span class="indigo-text email">gaurishprakhar@gmail.com</span></a>
			</div></li>
			<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
			<li><a href="#!">Second Link</a></li>
			<li><div class="divider"></div></li>
			<li><a class="subheader">Subheader</a></li>
			<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
 		</ul>

     <!-- <h4 class="center grey-text">Enter a Tagline !</h4> -->
<body class="grey lighten-4 ">
	<div class="container grey lighten-4">
		<div class="row center">

			<?php foreach(array_reverse($books) as $books){ ?>
			
				<div class="col s4 md6">
					<div class="card small">
					<div class="card-image ">
						<img src="templates/uploads/img1.jpg">
						<a class="card-title" href="detail.php?id=<?php echo $books['id'] ?>"><?php echo htmlspecialchars($books['name']); ?></a>
                     </div>
						<div class="card-content left-align">
						<h6><?php echo htmlspecialchars($books['author']); ?></h6>
						</div>
						<div class="card-action left-align">
							<a class="brand-text" >READ ></a>
						</div>
					</div>
				</div>
			
			<?php } ?>

		</div>
	</div>
</body>
	<?php include('templates/footer.php'); ?>


</html> 