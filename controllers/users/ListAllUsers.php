<?php
$user = new Users();
$total_users=$user->fetchUser('users');
require __dir__.'/'.'../../view/users/userList.view.php';
?>