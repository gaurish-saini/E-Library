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
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/style.php'); ?>
	<?php include('templates/header.php'); ?>
    <?php include('templates/script.php'); ?>

<section class="container grey lighten-4 " id="login-box"></section>
    <div class="container col s12 md12">
        <div class="row">  
<!-- signup  -->
            <div class="col s6 md6 center">
                <label style="color: #ee6e73;">New Reader? <label>Create a Account</label></label></br></br></br>
                <div id="reader">
                    <form action="register.php" method="POST">
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="text" value="<?php echo htmlspecialchars($username) ?>" id="username" name="username">
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