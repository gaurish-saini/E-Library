<section class="container grey-text">
    <h6 class="center">Edit book Details !</h6>
        <div class="col s6 md6">
            <form class="grey lighten-4 " action="/editbook" method="POST" enctype="multipart/form-data" onsubmit="return (checkFieldName('book_name') && checkFieldName('author_name') && checkFieldName('book_count')">
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">book</i>
                    <input id="icon_prefix" class="validate" type="text" id="book_name" name="book_name" value="<?=$book_name?>" onkeyup="checkFieldName('book_name')">
                    <label>Edit Book Name</label>
                </div>
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">portrait</i>
                    <input id="icon_prefix" class="validate" type="text" id="author_name" name="author_name" value="<?=$author_name?>" onkeyup="checkFieldName('author_name')">
                    <label>Edit Author Name</label>
                </div>
                 <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">collections_bookmark</i>
                    <input id="icon_prefix" class="validate" type="text" id="book_count" name="book_count" value="<?=$book_count?>" onkeyup="checkFieldName('book_count')">
                    <label>Edit Book Count</label>
                </div>
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">description</i>
                    <input class="validate" type="text" id="description" name="description" value="<?=$description?>">
                    <label class="active">Edit Description/About</label>
                </div>
                <div class=""><?php $fetch='../../resources/uploads/'.$cover.".jpg";?>
                    <label for="book_cover" class="" >
                        <img id="cover_image"  style='height:255px; width:170px;' <?="src='{$fetch}'";?> for='' alt='Book Cover'> 
                    </label>
                </div>
                <div class="file-field input-field">
                    <div class="btn grey ">
                        <span>New Book Cover<i class="material-icons left indigo-text text-darken-4">photo_album</i></span>
                        <input type="file" id="book_cover_new" accept="image/*" name="book_cover_new" onchange="checkFileInput('book_cover_new')">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate grey-text" type="text" value="Book Cover (Max Size-1Mb)*">
                    </div>
                    <input type="hidden" name="bid"   value="<?=$bid?>">
                    <input type="hidden" name="cover_name"   value="<?=$cover?>">
                </div>
                <div class="grey lighten-4 center border">
                    <button class="btn indigo waves-effect waves-light" type="submit" name="action">Publish Book
                    <i class="material-icons right">publish</i>
                </div>
            </form></br>
        </div>		
</section>