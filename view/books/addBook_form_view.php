<section class="container grey-text">
    <h4 class="center">Enter a Tagline !</h4>
        <div class="col s6 md6">
            <form class="grey lighten-4 " action="/addbook" method="POST" enctype="multipart/form-data" onsubmit="return (checkFieldName('book_name') && checkFieldName('author_name') && checkFieldName('book_edition') && checkFileInput('book_cover'))">
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">book</i>
                    <input id="icon_prefix" class="validate" type="text" id="book_name" name="book_name" onkeyup="checkFieldName('book_name')">
                    <label for="email">Enter Book Name*</label>
                </div>
                <?php if($msg1): ?>
                    <small class="red-text left label-margin" id='errorbook_name'><?php echo $msg1; ?></small></br>
                <?php endif ?>
                </br>
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">portrait</i>
                    <input id="icon_prefix" class="validate" type="text" id="author_name" name="author_name" onkeyup="checkFieldName('author_name')">
                    <label for="email">Enter Author Name*</label>
                </div>
                <?php if($msg2): ?>
                    <small class="red-text left label-margin" id='errorauthor_name' ><?php echo $msg2; ?></small></br>
                <?php endif ?>
                </br>
                 <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">collections_bookmark</i>
                    <input id="icon_prefix" class="validate" type="text" id="book_edition" name="book_edition" onkeyup="checkFieldName('book_edition')">
                    <label for="email">Enter Book Edition *</label>
                </div>
                <?php if($msg3): ?>
                   <small class="red-text left label-margin" id='errorbook_edition'><?php echo $msg3; ?></small></br>
                <?php endif ?>
                </br>
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">description</i>
                    <textarea id="textarea" class="materialize-textarea" name="description"></textarea>
                    <label for="email">Enter Description/About</label>
                </div></br>  
                <label>Book Cover*</label>
                <div class="grey lighten-4 center border" enctype="multipart/form-data" >
						<span class="btn btn-file indigo">
							<i class="material-icons right">photo_album</i>Upload Image<input type="file" name="image" id="book_cover" accept="image/*" name="book_cover" onchange="checkFileInput('book_cover')">
                        </span></br>
                        <small class="grey-text">Size- Less Than 1MB.</small>
                         <?php if($msg4): ?>
                            <small class="red-text left label-margin" id='errorbook_cover'><?php echo $msg4; ?></small></br>
                        <?php endif ?></br>
				    </div><br/><br/>
                <div class="center">
                    <button class="btn indigo waves-effect waves-light" type="submit" name="action">Publish Book
                    <i class="material-icons right">publish</i>
                </div>
            </form></br>
        </div>		
</section>
