
<body class="grey lighten-4">
 <?php if((Request::uri()=='login')||(Request::uri()=='addbook')):?>	
      <div class="container">
        <a href="#" data-target="slide-out" class="sidenav-trigger label-btn indigo-text z-depth-0 right"><i class="material-icons menu">menu</i></a>
      </div> 
    <?php endif;?>
	<nav class="white z-depth-0">
    <div class="container">
      <a class="brand-logo brand-text">E-Library</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
      </ul>
    </div>
   
  </nav>