<?php 
require __dir__.'/'.'../../controllers/books/addbook.php';
?>

<section class="container grey-text">
    <h4 class="center">Enter a Tagline !</h4>
        <div class="col s6 md6">
            <form class="grey lighten-4 " action="/addbook" method="POST">    
                <label>Enter Book Name *</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
                <div class="red-text"><?php echo $errors['name']; ?></div><br/>
                <label>Enter Author Name *</label>
                <input type="text" name="author" value="<?php echo htmlspecialchars($author) ?>">
                <div class="red-text"><?php echo $errors['author']; ?></div><br/>
                <label>Enter Book Id *</label>
                <input type="text" name="id" value="<?php echo htmlspecialchars($id) ?>">
                <div class="red-text"><?php echo $errors['id']; ?></div><br/>
                <label>Enter Description/About *</label><br/><br/><br/>
                <textarea id="textarea" class="materialize-textarea" name="description" value="<?php echo htmlspecialchars($description) ?>"></textarea>
                <div class="red-text"><?php echo $errors['description']; ?></div><br/>
                <label>Enter Image Url *</label>
                <input type="url" name="image" value="<?php echo htmlspecialchars($image) ?>">
                <!-- <div class="grey lighten-4 center border" enctype="multipart/form-data" >
                    <span class="btn btn-file indigo">
                        <i class="material-icons right">upload</i>Upload Image<input type="url" name="cover_image">
                    </span>
                </div><br/><br/> -->
                <div class="center">
                    <input type="submit" name="save" value="save" class="btn brand z-depth-0">
                </div>
            </form>
        </div>		
</section>
<?php 
   require __dir__.'/'.'../../view/common/footer.php';
?>