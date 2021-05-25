<div class="container" style="margin-top: 30px;">
	<table class="highlight responsive-table">
        <thead>
          <tr>
              <th>S.No</th>
              <th>Book Name</th>
              <th>Author Name</th>
			  <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $i=0;
				$book = new Books;
				while($bk=mysqli_fetch_assoc($readBook)):
					$bid=$bk['bid'];
					$row=$book->fetchBook($bid);
			  ?>
          <tr>
            <td><?=++$i?></td>
            <td><?=$row['book_name'] ?></td>
            <td><?=$row['author_name'] ?></td>
			<?php
            if ($_GET['listbooks'] == "alreadyread")  {
              $lnk='/alreadyread?dbid='.$bid.'&listbooks=alreadyread';
            } else if ($_GET['listbooks'] == "wishlist") {
              $lnk='/wishlist?dbid='.$bid.'&listbooks=wishlist';
            } else if ($_GET['listbooks'] == "issued") {
              $lnk='/readbook?dbid='.$bid.'&listbooks=issued';
            }
            ?> 
			<td><a href="<?=$lnk?>"><i class="material-icons icon-margin">delete</i></a></td>
          </tr>
		  <?php endwhile;?>
        </tbody>
    </table>
	
	<?php  if($i==0){
            if ($_GET['listbooks'] == "alreadyread")  { ?>
				<h5 class="center register-view">Oops..No books to list !</h5>
        <?php   } 
			if ($_GET['listbooks'] == "wishlist") { ?>
             <h5 class="center register-view">Your Wishlist is empty !</h5>
        <?php   } 
			if ($_GET['listbooks'] == "issued") { ?>
              <h5 class="center register-view">You haven't issued a book yet !</h5>
        <?php   }	
 	 } ?>
</div>