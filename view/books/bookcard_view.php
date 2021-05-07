<?php if(($_SESSION['type']=='inreader')||($_SESSION['type']=='inadmin')):?>
<div class="container grey lighten-4 col s12">
	<div class="container">
		<div class="row">
				<?php $i=0;
					while($row=mysqli_fetch_assoc($rows)):
							if($row['bid']):
								$i++;
				?>
								<div class="col s4 md6">
									<div class="card">
										<?php $fetch='../../resources/uploads/'.$row['cover_image_name'].".jpg";
											$bid=$row['bid'];
											$uid=$_SESSION['uid'];
										?>
										<div class="card-image">
											<img class="bookImage" <?="src='{$fetch}'";?> alt='Book Cover'>  
										</div>
										<div class="card-title black-text">
											<?=$row['book_name'] ?>
											<div class="grey-text"><?=$row['edition'] ?></div>
										</div>
										<div class="card-action action-height"><?=$row['author_name'] ?></div>
									</div>
								</div>
							<?php 
							endif;
							?>
					<?php  
					endwhile;
			if($i==0): ?>
				<h5 class="center">No Books Found !</h5>
		</div>
	</div>
</div>
<?php endif;?>
<?php endif;?>