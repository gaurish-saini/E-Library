<nav class="white z-depth-0 " id="nav">
    <div class="container">
      <a href="/" class="brand-logo brand-text" >E-Library</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down"></ul>
    </div>
      <?php if((Request::uri()=='login')||(Request::uri()=='addbook')){?>
      <div class="container">
        <a href="#" ><i  data-target="slide-out" class="material-icons sidenav-trigger label-btn brand-text z-depth-0 right menu">menu</i></a>
      </div>
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
        <form class="searchBar indigo lighten-4">
          <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons indigo-text text-darken-4">search</i></label>
            <i class="material-icons"><a href="/login" class="indigo-text text-darken-4">close</a></i>
          </div>
        </form>
      </div>
      <?php }?>
  </nav>
<script>
  $(document).ready(function(){
      $('.dropdown-trigger').dropdown();
      $('.tooltipped').tooltip();
      $('select').formSelect();
});
</script>