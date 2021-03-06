<?php 

include('config/db_connect.php');
session_start();

$username = $password = $cpassword = ''; 
$showAlert = false;  
$showError = false;  
$exists = false;   
$errors = array('username'=>'','password'=>'');

if(isset($_POST['rsignup'])) {
       
       $username = $_POST["username"];  
       $password = $_POST["password"];  
       $cpassword = $_POST["cpassword"]; 
               
       $sql = "Select * from users where username='$username'"; 
       $result = mysqli_query($conn, $sql);        
       $num = mysqli_num_rows($result);  

       if($num == 0) { 
           if(($password == $cpassword) && $exists==false) { 
               $sql = "INSERT INTO users(username,password,role) VALUES ('$username','$password','reader')"; 
               $result = mysqli_query($conn, $sql);
               if ($result) { 
                   $showAlert = true;
                   $_SESSION['login_user'] = $_POST['username'];
                   header('Location: reader.php');
               } else {
                   echo 'query error: '. mysqli_error($conn);
               }
           }  
           else {  
               $showError = "Passwords do not match";  
           }       
       }   
      if($num>0)  
      { 
         $exists="Username not available";  
      }     
   }

   //LOGIN

if(isset($_POST['alogin'])){   

    if(empty($_POST['username'])){
			$errors['username'] = 'A username is required';
		} 

    if(empty($_POST['password'])){
			$errors['password'] = 'A password is required';
		} 
     if(array_filter($errors)){
            // echo 'errors in the form';
        }
    else{
        if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST["password"]); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      	
      if($count == 1) {
        $_SESSION['login_user'] = $myusername; 
         header('location: index.php');
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
}
}
if(isset($_POST['rlogin'])){      
     if(empty($_POST['username'])){
			$errors['username'] = 'A username is required';
		} 

    if(empty($_POST['password'])){
			$errors['password'] = 'A password is required';
		} 
     if(array_filter($errors)){
            // echo 'errors in the form';
        }
    else{
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $myusername = mysqli_real_escape_string($conn,$_POST['username']);
            $mypassword = mysqli_real_escape_string($conn,$_POST["password"]); 
          
          $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                  
          $count = mysqli_num_rows($result);
                   
          if($count == 1) {
             $_SESSION['login_user'] = $myusername;
             header('location: reader.php');
          }else {
             $error = "Your Login Name or Password is invalid";
          }
       }
    }     
  }
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/style.php'); ?>
	<?php include('templates/header.php'); ?>
    <?php include('templates/script.php'); ?>

<section class="container grey lighten-4 " id="login-box"></section>
    <div class="container col s12 md12">
        <div class="row">  
            
            <div class="col s6 md6 center">
            <label style= "color: #ee6e73 ";>Already a User? <label>Log In</label></label>
                <!-- tabs -->
                <ul class="tabs col s12 tab-color center">
                <li class="tab col s6">
                    <a href="#adminsignin" class="active indigo-text text-darken-4">ADMIN</a>
                </li>
                <li class="tab col s6">
                    <a href="#readersignin" class="active indigo-text text-darken-4">READER</a>
                </li>
                </ul>
                <div id="adminsignin" ></br></br></br>
                    <form action="portal.php" method="POST">
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="email" value="<?php echo htmlspecialchars($username) ?>" id="username" name="username">
                            <label for="email">Username*</label>
                            <div class="red-text"><?php echo $errors['username']; ?></div><br/>
                            
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="password" value="<?php echo htmlspecialchars($password) ?>" id="password" name="password">
                            <label for="password">Password*</label></br></br></br>
                            <div class="red-text"><?php echo $errors['password']; ?></div><br/>
                        </div>
                        <div class="center border">
                            <input type="submit" name="alogin" value="sign in" class="btn indigo-text tab-color z-depth-0">
                        </div>
                        
                    </form>
                </div>
                <div id="readersignin"></br></br></br>
                   <form action="portal.php" method="POST">
                        <div class="input-field indigo-text text-darken-4 ">
                        <input type="email" value="<?php echo htmlspecialchars($username) ?>" id="username" name="username">
                            <label for="email">Username*</label>
                            <div class="red-text"><?php echo $errors['username']; ?></div><br/>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                        <input type="password" value="<?php echo htmlspecialchars($password) ?>" id="password" name="password">
                            <label for="password">Password*</label>
                            <div class="red-text"><?php echo $errors['password']; ?></div><br/></br></br>
                        </div>   
                        <div class="center border">
                            <input type="submit" name="rlogin" value="sign in" class="btn indigo-text tab-color z-depth-0">
                        </div>
                        
                    </form>
                    
                </div> 
            </div>

<!-- signup  -->

            <div class="col s6 md6 center">
                <label style="color: #ee6e73;">New Reader? <label>Create a Account</label></label></br></br></br>
                <div id="reader">
                    <form action="portal.php" method="POST">
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="email" value="<?php echo htmlspecialchars($username) ?>" id="username" name="username">
                            <label for= "email">Create Username*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="password" value="<?php echo htmlspecialchars($password) ?>" id="password" name="password">
                            <label for= "password">Create Password*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="password" value="<?php echo htmlspecialchars($cpassword) ?>" id="cpassword" name="cpassword">
                            <label for= "password">Confirm Password*</label></br></br></br>
                        </div>
                            <div class="center border">
                                <input type="submit" name="rsignup" value="sign up" class="btn indigo-text tab-color z-depth-0">
                            </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
	

	<?php include('templates/footer.php'); ?>


</html>         