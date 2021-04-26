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
								<a class='brand-text' type="submit" name="wishlist" href="admin/awishlist.php?id=<?php echo $books['id'] ?>"> Wishlist</a>
								
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