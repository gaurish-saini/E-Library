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
                    <small class="red-text left" id='errorbook_name'><?php echo $msg1; ?></small></br>
                <?php endif ?>
            
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">portrait</i>
                    <input id="icon_prefix" class="validate" type="text" id="author_name" name="author_name" onkeyup="checkFieldName('author_name')">
                    <label for="email">Enter Author Name*</label>
                </div>
                <?php if($msg2): ?>
                    <small class="red-text left" id='errorauthor_name' ><?php echo $msg2; ?></small></br>
                <?php endif ?>
                
                 <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">collections_bookmark</i>
                    <input id="icon_prefix" class="validate" type="number" id="book_count" name="book_count" onkeyup="checkFieldName('book_count')">
                    <label for="email">Enter Book Count *</label>
                </div>
                <?php if($msg3): ?>
                   <small class="red-text left" id='errorbook_edition'><?php echo $msg3; ?></small></br>
                <?php endif ?>
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">description</i>
                    <textarea id="textarea" class="materialize-textarea" class="validate" id="description" name="description" onkeyup="checkFieldName('description')"></textarea>
                    <label for="email">Enter Description/About</label>
                </div>
                <div class="file-field input-field">
                    <div class="btn grey ">
                        <span>Upload Image<i class="material-icons left indigo-text text-darken-4">photo_album</i></span>
                        <input type="file" id="book_cover" accept="image/*" name="book_cover" onchange="checkFileInput('book_cover')">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate grey-text" type="text" value="Book Cover (Max Size-1Mb)*">
                    </div>
                </div>
                <?php if($msg4): ?>
                    <small class="red-text left label-margin" id='errorbook_cover'><?php echo $msg4; ?></small></br>
                <?php endif ?></br>
                <div class="grey lighten-4 center border">
                    <button class="btn indigo waves-effect waves-light" type="submit" name="action">Publish Book
                    <i class="material-icons right">publish</i>
                </div>
            </form></br>
        </div>		
</section>