<?php 

include('../config/db_connect.php');
include('../session.php');

$username = $password = $cpassword = '';     
$errors = array('username'=>'','password'=>'','cpassword'=>'');

$admin_user = 'SELECT username FROM users WHERE role="admin"';
$result = mysqli_query($conn, $admin_user);
$admin_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result); 


$reader_user = 'SELECT username FROM users WHERE role="reader"';
$result = mysqli_query($conn, $reader_user);
$reader_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result); 
mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
<?php include('../templates/style.php'); ?>
<?php include('../templates/script.php'); ?>

<?php include('../templates/style.php'); ?>
	<div class="container">
		<a href="#" data-target="slide-out" class="sidenav-trigger label-btn indigo-text z-depth-0 right"><i class="material-icons menu">menu</i></a>
	</div>  
<?php include('../templates/script.php'); ?>
	<nav class=" white z-depth-0">
	<div class="container">
      			<a href="index.php" class="brand-logo brand-text">E-Library</a>
     			<a href="#" class="label-btn indigo-text z-depth-0 right">PROFILE</a>
			</div>
	</nav></br>

	<ul id="slide-out" class="sidenav">
			<li>
				<div class="user-view">
				<!-- <a href="#user"><img class="circle" src="img/1611234086050.jpg"></a> -->
				<a href="#name"><span class="indigo-text name">Hello</span></a>
				<a href="#email"><span class="indigo-text email"><?php echo $login_session; ?></span></a>
				<span class="indigo-text name">Dashboard</span>
				</div>
			</li>
			<li><div class="divider brand-text"></div></li></br>
			<li><a class="subheader brand-text">Marked</a></li>
			<li>
				<!-- <li><a class="waves-effect grey-text" href="admin/aalreadyread.php">Already Read</a></li> -->
				<li><a class="waves-effect grey-text" href="admin/awishlist.php">Wishlist</a></li>
			</li>
			<li><a class="waves-effect brand-text" href="#!">Your Books</a></li>
			<li><a class="waves-effect brand-text" href="usermanagement.php">User Management</a></li>
            <li><div class="divider brand-text"></div></li></br>
			<li><a href = "../logout.php">Log Out</a></li>

 		</ul>
     <!-- <h4 class="center grey-text">Enter a Tagline !</h4> -->
<body class="grey lighten-4 ">

	<div class="container grey lighten-4">
		<ul id="tabs-swipe" class="tabs row tab-color s12 center">
					<li class="tab col s6"><a href="#admin">List of Admins</a></li>
					<li class="tab col s6"><a href="#reader">List of Readers</a></li>
					
				</ul>
				<div id="admin" class="s6">
					<table class="highlight">
						<thead>
						<tr>
							<th>Username</th>
							<th class="center"><a href="addadmin.php"><i class="material-icons black-text">add</i></a></th>
						</tr>
						</thead>
						<tbody>
						<?php foreach( $admin_list as $admin_list ){ ?>
							<tr>
								<td><?php echo htmlspecialchars($admin_list['username']); ?></td>
								<?php if($admin_list['username'] != $login_session ): ?>
									<td class="center">
										<i class="material-icons icon-margin">delete</i>
										<i class="material-icons">edit</i>
									</td>
								<?php else: ?>
									<td></td>
								<?php endif ?>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<div id="reader" class="s6">
					<table class="highlight">
						<thead>
						<tr>
							<th>Username</th>
							<th class="center"><i class="material-icons">add</i></th>
						</tr>
						</thead>
						<tbody>
						<?php foreach( $reader_list as $reader_list ){ ?>
							<tr>
								<td><?php echo htmlspecialchars($reader_list['username']); ?></td>
								<td class="center">
									<i class="material-icons icon-margin">delete</i>
									<i class="material-icons">edit</i>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			
		<div class="container s12">
			<!-- <section class="container grey-text">
					<div class="col s6 md6 center">
						
						<div id="admin" ></br></br></br>
							<form action="manageadmin.php" method="POST">
							<label style="color: #ee6e73;">Manage Admins<label></label></label>
								<div class="input-field indigo-text text-darken-4 ">
									<input type="text" value="<?php echo htmlspecialchars($username) ?>" id="username" name="username">
									<label for= "email">Create Username*</label>
									<div class="red-text"><?php echo $errors['username']; ?></div><br/>
								</div>
								<div class="input-field indigo-text text-darken-4 ">
									<input type="password" value="<?php echo htmlspecialchars($password) ?>" id="password" name="password">
									<label for= "password">Create Password*</label>
									<div class="red-text"><?php echo $errors['password']; ?></div><br/>
								</div>
								<div class="input-field indigo-text text-darken-4 ">
									<input type="password" value="<?php echo htmlspecialchars($cpassword) ?>" id="cpassword" name="cpassword">
									<label for= "password">Confirm Password*</label></br></br></br>
									<div class="red-text"><?php echo $errors['cpassword']; ?></div><br/>
								</div>
									<div class="center border">
										<input type="submit" name="asignup" value="sign up" class="btn indigo-text tab-color z-depth-0">
									</div>
							
							</form>
						</div>
					</div>	
			</section> -->
				<div class="fixed-action-btn">
					    <a class="btn-floating btn-large brand"><i class="large material-icons">more_vert</i></a>
    					<ul>
							<li class="fixed-action-btn horizontal FAB2">
								<li><a href="../edit.php" class="btn-floating indigo"><i class="material-icons">edit</i></a></li>
								<li><a href="../add.php" class="btn-floating indigo"><i class="material-icons">add</i></a></li>
							</li>
                        </ul>
                </div>
		</div>
	</div>
</body>

	<?php include('../templates/footer.php'); ?>

</html>