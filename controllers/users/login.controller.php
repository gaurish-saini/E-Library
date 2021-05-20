<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$user=new Users;
$book=new Books;

if (isset($_SESSION['token']) and isset($_SESSION['loginid'])) {
	$name=$_SESSION['loginid'];
	$row=$user->fetchUserAuth($name);
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
			$row=$user->fetchUserAuth($name);
			$user->verify($row,$pass);
		}
		else
			$user->flashError([NULL,'Please Enter Password'],'/');
	}
	else
		$user->flashError(['Please Enter Email Address','Please Enter Password'],'/');
}    

if (isset($_SESSION['type']))
{
	if($_SESSION['type']=='inadmin' && !isset($_GET['listbooks']))
	{
		require __dir__.'/'.'../../view/common/sidebar.php'; ?>
		<div class="fixed-action-btn"  style="z-index: 1001;">
			<a class="btn-floating btn-large brand indigo tooltipped"  data-position="left" data-tooltip="Add Book" href="/addbook"><i class="large material-icons">add</i></a>
		</div>
		<?php
		if(!isset($_GET['view']))
			{
				require __dir__.'/'.'../books/ListBooks.php';
			}
		elseif($_GET['view']=='books')
		{
			require __dir__.'/'.'../books/ListBooks.php';
		}
		elseif($_GET['view']=='users')
			require __dir__.'/'.'../users/ListAllUsers.php';
	}
		if (isset($_GET['listbooks']) && $_GET['listbooks'] == "issued") { 
		require __dir__ . '/' . '../users/userBooks.php';
		}
		else if (isset($_GET['listbooks']) && $_GET['listbooks'] == "wishlist") { 
			require __dir__ . '/' . '../users/userWishlist.php';
		} 
		else if (isset($_GET['listbooks']) && $_GET['listbooks'] == "alreadyread") {
			require __dir__ . '/' . '../users/userAlreadyRead.php';
		}  
		else if (isset($_GET['listbooks']) && $_GET['listbooks'] == "reading-history") { 
			require __dir__ . '/' . '../users/userReadingHistory.php';
		}
		elseif ($_SESSION['type']=='inreader')
	{
			// session_destroy();
			echo 'reader'; ?>
			<div>
			<form action="/logout"><input type="submit" value="Logout" class="btn indigo-text tab-color z-depth-0"></form>
			</div>
			
		<?php
	}
}	
?>