<?php 

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$user = new Users;
if($user){
    // echo 'yes !';
    $_SESSION['errormsg'] = 'error found';
    header('location:/registration');	
}

// if(isset($_POST['rname']) && isset($_POST['remailid']) && isset($_POST['rpassword']) && isset($_POST['password1'])){
// 	if($_POST['rname']!=''){
// 		$name=mysqli_escape_string($conn,$_POST['rname']);
// 		$_SESSION['rname']=$name;	
// 	}
// 	else{
// 		$user->flashError(['Invalid User Name'],'/index?register=1');
// 	}	
// 	if($_POST['remailid']!=''){
// 		$email=mysqli_escape_string($conn,$_POST['remailid']);
// 		$_SESSION['name']=$email;	
// 	}
// 	else{
// 		$user->flashError([NULL,'Invalid Email Address'],'/index?register=1');
// 	}	
// 	if($_POST['rpassword']!=''){
// 		$pass=mysqli_escape_string($conn,$_POST['rpassword']);
// 		$_SESSION['password']=$pass;	
// 	}
// 	else{
// 		$user->flashError([NULL,NULL,'Invalid Password'],'/index?register=1');
// 	}	
// 	if(isset($name) &&isset($email) &&isset($pass)){
// 		if($user->freshUser($email))
// 			$user->registerUser($name,$email,$pass,NULL);
// 		else
// 			$user->flashError([NULL,'User Already Exists'],'/index?register=1');

// 	}
// 	else{
// 		$user->flashError(['Enter Full Name','Enter Email Address','Enter Password'],'/index?register=1');
// 	}
// }
// else{
// 	$user->flashError(['Enter Full Name','Enter Email Address','Enter Password'],'/index?register=1');
// }

                            // if(isset($_POST['signup'])):
                            //         if(empty($_POST['username'] && $_POST['password'] && $_POST['cpassword']))
                            //             <script>M.toast({html: 'Fill out required fields !'})</script>
                            //             endif 
                            //         if(empty($_POST['username']))
                            //             <script>M.toast({html: 'Username Required'})</script>
                            //             endif
                            //         if(empty($_POST['password']))
                            //             <script>M.toast({html: 'Password Required'})</script>
                            //         endif
                            //         if(empty($_POST['cpassword']))
                            //             <script>M.toast({html: 'Confirm Password'})</script>
                            //         endif
                            // endif

//if post request
// then
// form submission validation
// if not valid
// set error variable in session 
// return to same screen
// else
// process form Request
// redirect to view
// else
// redirect to view
?>

