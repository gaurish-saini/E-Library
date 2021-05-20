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
        <li><a class="waves-effect grey-text" href="login?listbooks=alreadyread">Already Read</a></li>
        <li><a class="waves-effect grey-text" href="login?listbooks=wishlist">Wishlist</a></li>
    </li>
    <li><a class="waves-effect brand-text" href="login?listbooks=issued">Your Books</a></li>
    <li><a class="waves-effect brand-text" href="login?listbooks=reading-history">Reading History</a></li>
    <li><a class="waves-effect brand-text" href="login?view=users">User Management</a></li>
    <li><div class="divider brand-text"></div></li></br>
    <li><a href="/logout">Log Out</a></li>
</ul>