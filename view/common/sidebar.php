<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
        <a href="#name"><span class="indigo-text name">Hello</span></a>
        <a href="#email"><span class="indigo-text email"><?php echo $_SESSION['username']; ?></span></a>
        <span class="indigo-text name">Dashboard</span>
        </div>
    </li>
    <li><div class="divider brand-text"></div></li></br>
    <li><a class="subheader brand-text">Marked</a></li>
    <li>
        <li><a class="waves-effect grey-text" href="admin/aalreadyread.php">Already Read</a></li>
        <li><a class="waves-effect grey-text" href="admin/awishlist.php">Wishlist</a></li>
    </li>
    <li><a class="waves-effect brand-text" href="ayourbook.php">Your Books</a></li>
    <li><a class="waves-effect brand-text" href="admin\usermanagement.php">User Management</a></li>
    <li><div class="divider brand-text"></div></li></br>
    <li><a href="/logout">Log Out</a></li>
</ul>