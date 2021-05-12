 <nav class="white z-depth-0 " id="nav">
    <div class="container">
      <a href="/" class="brand-logo brand-text" >E-Library</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down"></ul>
    </div>
      <?php if((Request::uri()=='login')||(Request::uri()=='addbook')||(Request::uri()=='')):?>
      <div class="container">
        <a href="#" ><i  data-target="slide-out" class="material-icons sidenav-trigger label-btn brand-text z-depth-0 right menu">menu</i></a>
      </div>
      <i class="material-icons indigo-text text-darken-4 right menu">sort_by_alpha</i>
      <div class="nav-wrapper right">
        <form class="searchBar indigo lighten-4">
          <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons indigo-text text-darken-4">search</i></label>
            <i class="material-icons"><a href="/login" class="indigo-text text-darken-4">close</a></i>
          </div>
        </form>
      </div>
      <?php endif;?>
  </nav>