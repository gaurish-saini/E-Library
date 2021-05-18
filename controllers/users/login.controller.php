<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$user=new Users;
$book=new Books;

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
			if($_SESSION['type']=='inadmin' && !isset($_GET['listbooks']))
			{
				require __dir__.'/'.'../../view/common/sidebar.php'; ?>
				<div class="fixed-action-btn">
					<a class="btn-floating btn-large brand"><i class="large material-icons">more_vert</i></a>
					<ul>
						<li class="fixed-action-btn horizontal FAB2">
							<li><a href="/editbook" class="btn-floating indigo"><i class="material-icons">edit</i></a></li>
							<li><a href="/addbook" class="btn-floating indigo"><i class="material-icons">add</i></a></li>
						</li>
					</ul>
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

				if (isset($_GET['listbooks']) && $_GET['listbooks'] == "issued") { ?>
					<div >
						<h4>Your Books !</h4>
					</div>
				<?php
				require __dir__ . '/' . '../users/userbooks.php';
				}
				else if (isset($_GET['listbooks']) && $_GET['listbooks'] == "wishlist") { ?>
					<div>
						<h4>Wishlist</h4>
					</div>
				<?php
					// require __dir__ . '/' . '../books/UserFavBooks.php';
				} else if (isset($_GET['listbooks']) && $_GET['listbooks'] == "alreadyread") { ?>
					<div>
						<h4>Already Read</h4>
					</div>
				<?php
					// require __dir__ . '/' . '../books/UserFinishedBooks.php';
				}  else if (isset($_GET['listbooks']) && $_GET['listbooks'] == "reading-history") { ?>
					<div>
						<h4>Reading History</h4>
					</div>
				<?php 
				// require __dir__ . '/' . '../books/UserHistoryBooks.php';
			}
				elseif ($_SESSION['type']=='inreader'){
					// session_destroy();
					echo 'reader'; ?>
					<div>
					<form action="/logout"><input type="submit" value="Logout" class="btn indigo-text tab-color z-depth-0"></form>
					</div>
					
				<?php
 			 }
}	
?>