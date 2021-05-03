<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$user=new Users;

if (isset($_SESSION['token']) and isset($_SESSION['loginid'])) {
	$name=$_SESSION['loginid'];
	$row=$user->fetchUser($name);
	$type=$row['type'];    			
	$uid=$row['uid'];
	$name=$row['user_name'];
	$email=$row['email_id'];
	unset($_SESSION['token']);
	unset($_SESSION['loginid']);
	require __dir__.'/'.'../../controllers/common/setUserSession.php';
	header('location:/');
}
elseif(!isset($_SESSION['uid'])){
	if(isset($_POST['emailid']) && $_POST['emailid']!='') {
		$name=mysqli_escape_string($conn,$_POST['emailid']);
		$_SESSION['name']=$name;
		if(isset($_POST['password']) && $_POST['password']!=''){
			$pass=mysqli_escape_string($conn,$_POST['password']);
			$_SESSION['password']=$pass;
			$row=$user->fetchUser($name);
			$user->verify($row,$pass);
		}
		else
			$user->flashError([NULL,'Please Enter Password'],'/');
	}
	else
		$user->flashError(['Please Enter Email Address','Please Enter Password'],'/');
}    

if (isset($_SESSION['type'])){
  if($_SESSION['type']=='inadmin')
  {
    $total_users=mysqli_num_rows($user->fetchUsers())-1;
      echo 'admin';
			 require __dir__.'/'.'../../view/common/sidebar.php';
  }
  elseif ($_SESSION['type']=='inreader'){
    // session_destroy();
    echo 'reader'; ?>
    <div>
      <form action="/logout"><input type="submit" value="Logout" class="btn indigo-text tab-color z-depth-0"></form></div>
    
    <?php
  }

}
		
?>

		
		
						
    