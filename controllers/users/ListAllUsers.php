<?php
$user = new Users();
$total_users=$user->fetchUser('users');

while($total1=mysqli_fetch_assoc($total_users)){
    echo $total1['email_id'];
}
    
require __dir__.'/'.'../../view/users/userList.view.php';
?>