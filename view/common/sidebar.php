<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
        <span class="indigo-text name">Hello</span>
        <span class="indigo-text email"><?php echo $_SESSION['username']; ?></span>
        <span class="indigo-text name">Dashboard</span>
        </div>
    </li>
    <li><div class="divider brand-text"></div></li></br>
    <li><a class="subheader brand-text">Marked</a></li>
    <li>
        <li><a class="waves-effect red-lighten" href="login?listbooks=alreadyread"> &nbsp &nbsp > Already Read</a></li>
        <li><a class="waves-effect red-lighten" href="login?listbooks=wishlist"> &nbsp &nbsp > Wishlist</a></li>
    </li>
    <li><a class="waves-effect brand-text" href="login?listbooks=issued">Your Books</a></li>
    <li><a class="waves-effect brand-text" href="login?listbooks=reading-history">Reading History</a></li>
    <?php  if($_SESSION['type']=='inadmin'){ ?>
    <li><a class="waves-effect brand-text" href="login?view=users">User Management</a></li>
    <?php } ?>
    <li><div class="divider brand-text"></div></li></br>
    <li><a href="/logout">Log Out</a></li>
</ul>