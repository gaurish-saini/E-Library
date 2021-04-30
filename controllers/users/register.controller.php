<?php 

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$user = new Users;
if($user){
    echo 'yes !';
    $_SESSION['errormsg'] = 'error found';
    header('location:/registration');	
}

if(isset($_POST['rname']) && isset($_POST['remailid']) && isset($_POST['rpassword']) && isset($_POST['password1'])){
	if($_POST['rname']!=''){
		$name=mysqli_escape_string($conn,$_POST['rname']);
		$_SESSION['rname']=$name;	
	}
	else{
        $_SESSION['errormsg'] = 'Invalid User Name';
        header('location:/index?register=1');
	}	
	if($_POST['remailid']!=''){
		$email=mysqli_escape_string($conn,$_POST['remailid']);
		$_SESSION['name']=$email;	
	}
	else{
		$_SESSION['errormsg'] = 'Invalid Email Address';
        header('location:/index?register=1');
	}	
	if($_POST['rpassword']!=''){
		$pass=mysqli_escape_string($conn,$_POST['rpassword']);
		$_SESSION['password']=$pass;	
	}
	else{
		$_SESSION['errormsg'] = 'Invalid Password';
        header('location:/index?register=1');
	}	
	if(isset($name) &&isset($email) &&isset($pass)){
		if($user->freshUser($email))
			$user->registerUser($name,$email,$pass,NULL);
		else
			$_SESSION['errormsg'] = 'User Already Exists';
        header('location:/index?register=1');

	}
	else{
		$_SESSION['errormsg'] = 'Required Fields Missing !';
        header('location:/index?register=1');
	}
}
else{
	$_SESSION['errormsg'] = 'Required Fields Missing !';
        header('location:/index?register=1');
}

//if post request
    // then
    // form submission validation
    // if not valid
        // set error variable in session 
        // return to same screen
    // else
        // process form Request
        // redirect to further view
// else
    // redirect to view
?>