<div class="container grey lighten-4 col s12">
		<div class="container">
			<div class="row">
				<!-- <?php foreach(array_reverse($books) as $books){ ?>				 -->
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
				<!-- <?php } ?> -->
			</div>
		</div>
	</div>