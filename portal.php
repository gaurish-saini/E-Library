<?php 

include('config/db_connect.php');
session_start();

$username = $password = $cpassword = '';   
$exists = false;   
$errors = array('username'=>'','password'=>'');

//LOGIN

if(isset($_POST['login'])){   

    
     if(!array_filter($errors)){
        if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST["password"]); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword' and role='admin'";
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
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/style.php'); ?>
	<?php include('templates/header.php'); ?>
    <?php include('templates/script.php'); ?>

<section class="container grey lighten-4 " id="login-box"></section>
    <div class="container col s12 md12">
          
            <div class="col s6 md6 center">
                    <form class="border" action="portal.php" method="POST">
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="text" value="<?php echo htmlspecialchars($username) ?>" id="username" name="username">
                            <label for="email">Username*</label>
                            <!-- <div class="red-text"><?php echo $errors['username']; ?></div> -->
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="password" value="<?php echo htmlspecialchars($password) ?>" id="password" name="password">
                            <label for="password">Password*</label>
                            <!-- <div class="red-text"><?php echo $errors['password']; ?></div> -->
                        </div>
                        <div class="center">
                            <input type="submit" name="login" value="sign in" class="btn indigo-text tab-color z-depth-0 ">
                            <?php 
                            if(isset($_POST['login'])):?>
                                    <?php if(empty($_POST['password' && 'username'])):?>
                                        <script>M.toast({html: 'Invalid Credentials !'})</script>
                                    <?php else: ?>
                                                <?php if(empty($_POST['username'])):?>
                                                    <script>M.toast({html: 'Username Required'})</script>
                                                <?php elseif(empty($_POST['password'])):?>
                                                    <script>M.toast({html: 'Password Required'})</script>
                                                
                                                <?php endif ?>
                                    <?php endif ?>            
                            <?php endif ?>
                            
                        </div></br>
                        <div><label class="portal-label">New Reader? <a href="register.php" class="label-link">Create a Account</a></label></br></div>
                    </form>
                    
            </div>
    </div>
</section>
	

	<?php include('templates/footer.php'); ?>


</html>         