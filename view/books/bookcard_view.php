<!-- <?php
var_dump('here2');die;
?> -->
<form accept="/" method="POST">
        <?php
        $ChangesAllowed=TRUE;
        if(isset($bookIds)){
          $limit=count($bookIds);
          $ChangesAllowed=FALSE;
        }
        ?>
        <div >
          <label for='limit'>Showing&nbsp;</label> 
          <select style="width:50px;" name='limit' onchange="this.form.submit()">
            <?php 
			var_dump('here2');die;
            if($limit>3 && $ChangesAllowed)  echo "<option value='".(($limit-3)-($limit-3)%3)."'>".(($limit-3)-($limit-3)%3)."</option>";
            echo "<option value='{$limit}' selected>$limit</option>";
            if($limit<18 && $ChangesAllowed) echo "<option value='".(($limit+3)-($limit+3)%3)."'>".(($limit+3)-($limit+3)%3)."</option>"; 
            if($limit<=12 && $ChangesAllowed) echo "<option value='".(($limit+12)-($limit+12)%3)."'>".(($limit+12)-($limit+12)%3)."</option>";
            if($limit<=3 && $ChangesAllowed) echo "<option value='".(($limit+12)-($limit+12)%3)."'>".(($limit+12)-($limit+12)%3)."</option>";?>
          </select> entries of <?=$total?></div>  
        </form>
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