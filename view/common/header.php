<header> 
<nav class="white z-depth-0 " id="nav">
    <div class="container">
      <a href="/" class="brand-logo brand-text" >E-Library</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down"></ul>
    </div>
      <?php if((Request::uri()=='login')||(Request::uri()=='addbook') ||(Request::uri()=='addadmin')){?>
      <div class="container">
        <a href="#" ><i  data-target="slide-out" class="material-icons sidenav-trigger label-btn brand-text z-depth-0 right menu">menu</i></a>
      </div>
      
      <?php if((!isset($_GET['listbooks'])) && !(isset($_GET['view']) && $_GET['view'] == 'users') && (Request::uri() !=='addbook') && (Request::uri() !=='addadmin')){?>
      <div class="right" style="margin-top: 5px; margin-left:10px;">
      <form accept="/" method="GET" class="tooltipped searchBar" data-position="bottom" data-tooltip="Sort">
         <select class="form-control" name="books-sorting" onchange="this.form.submit()">
          <option value="latest" <?php echo !isset($books_sorting) || (isset($books_sorting) && $books_sorting == 'latest') ? 'selected' : '' ?>>Latest</option>
          <option value="a-z" <?php echo isset($books_sorting) && $books_sorting == 'a-z' ? 'selected' : '' ?>>A-Z</option>
          <option value="z-a" <?php echo isset($books_sorting) && $books_sorting == 'z-a' ? 'selected' : '' ?>>Z-A</option>
        </select>
      </form>
      </div>
      <div class="nav-wrapper right">
        <form class="searchBar" accept="/" method="GET">
          <div class="input-field white">
            <input id="search" type="search" placeholder="Search" name="search" required>
            <label class="label-icon" for="search"><i class="material-icons indigo-text text-darken-4">search</i></label>
          </div>
        </form>
      </div>
      <?php }?>
      <?php }?>
  </nav>
</header>
<?php 
if(isset($_GET['search'])){ ?>
   <div class="container" style="margin-top: 30px;">
    <div class="chip indigo-text indigo lighten-4">
    <span>Keyword :</span>
    <?=$_GET['search']?>
    <i class="close material-icons"><a href="/login" class="indigo-text text-darken-4">close</a></i>
    </div>
   </div>
   
<?php
}
?>
<script>
  $(document).ready(function(){
      $('.dropdown-trigger').dropdown();
      $('.tooltipped').tooltip();
      $('select').formSelect();
      $('.chips').chips();
});
</script>