<div class="container" style="margin-top: 30px;">
	<table class="highlight responsive-table">
        <thead>
          <tr>
              <th>S.No</th>
              <th>Book Name</th>
              <th>Author Name</th>
			  <th>Time</th>
          </tr>
        </thead>
        <tbody>
            <?php $i=0;
            $book = new Books;
            while($bok=mysqli_fetch_assoc($readBook)):  
                $bid=$bok['bid'];
                $row=$book->fetchBook($bid);
        ?>
          <tr>
            <td><?=++$i?></td>
            <td><?=$row['book_name'] ?></td>
            <td><?=$row['author_name'] ?></td>
			<td><?=$bok['transaction_time'] ?></td>
          </tr>
		  <?php endwhile;?>
        </tbody>
    </table>
	
	<?php  if($i==0){ ?>
				<h4 class="center">Oops..No books found !</h4>
    <?php }?>
</div>