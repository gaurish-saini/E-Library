<?php if(($_SESSION['type']=='inreader')||($_SESSION['type']=='inadmin')):?>
<div class="container grey lighten-4">
	<div class="section" style="margin-top: 30px;">
		<div class="row">
			<div class="col s12">
				<?php $i=0;
					while($row=mysqli_fetch_assoc($rows)):
								$i++;
				?>
								<div class="col s12 md6 l4">
									<div class="card">
										<?php $fetch='../../resources/uploads/'.$row['cover_image_name'].".jpg";
											$bid=$row['bid'];
											$uid=$_SESSION['uid'];
										?>
										<div class="card-image waves-effect waves-block waves-light">
											<a href="#bookDetail">
												<img class="bookImage" <?="src='{$fetch}'";?> alt='Book Cover'>
												<span class="card-title white-text"><?=$row['book_name'] ?></span>
											</a>
											
										</div>
										<!-- <div class="card-title black-text">
											<?=$row['book_name'] ?>
											<div class="grey-text"><?=$row['edition'] ?></div>
										</div> -->
										
									</div>
								</div>
					<?php  
					endwhile;
				if($i==0): ?>
					<h5 class="center">No Books Found !</h5>
				<?php endif;?>
			</div>
		</div>
	</div>
	<?php 
	if (!isset($bookIds) && $i!= 0) : ?>
		<ul class="pagination center">
			<?php
				if (($offset - $limit) >= 0) :
				$offset1 = $offset - $limit;
				?>
			<li class="waves-effect"><a href="/login?view=books&offset=<?= $offset1 ?>"><i class="material-icons">chevron_left</i></a></li>
			<?php endif; ?>
			<?php if (($offset + $limit) < $total) :
			$offset2 = $offset + $limit;
			?>
			<li class="waves-effect"><a href="/login?view=books&offset=<?= $offset2 ?>"><i class="material-icons">chevron_right</i></a></li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>
</div>

<?php endif;?>