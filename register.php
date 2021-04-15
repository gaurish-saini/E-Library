<?php 

include('config/db_connect.php');
session_start();

$username = $password = $cpassword = '';    
$exists = false;   
$errors = array('username'=>'','password'=>'');

if(isset($_POST['signup'])) {
       
    if(!empty($_POST['password'] && $_POST['username'])){
        if($_SERVER["REQUEST_METHOD"] == "POST") {
                $username =  mysqli_real_escape_string($conn,$_POST['username']);  
                $password =  mysqli_real_escape_string($conn,$_POST['password']);;  
                $cpassword =  mysqli_real_escape_string($conn,$_POST['cpassword']);; 
                        
                $sql = "SELECT * FROM users WHERE username='$username'"; 
                $result = mysqli_query($conn, $sql);        
                $num = mysqli_num_rows($result);  

                if($num == 0) { 
                    if(($password == $cpassword) && $exists==false) { 
                        $sql = "INSERT INTO users(username,password,role) VALUES ('$username','$password','reader')"; 
                        $result = mysqli_query($conn, $sql);
                        if ($result) { 
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
        
<!-- signup  -->
            <div class="col s6 md6 center">
                    <form class="border" action="register.php" method="POST">
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
                            <label for= "password">Confirm Password*</label></br>
                        </div>
                        <div class="center">
                            <input type="submit" name="signup" value="sign up" class="btn indigo-text tab-color z-depth-0">
                            <?php 
                            if(isset($_POST['signup'])):?>
                                    <?php if(empty($_POST['username'] && $_POST['password'] && $_POST['cpassword'])):?>
                                        <script>M.toast({html: 'Fill out required fields !'})</script>
                                        <?php endif ?>
                                    <?php if(empty($_POST['username'])):?>
                                        <script>M.toast({html: 'Username Required'})</script>
                                        <?php endif ?>
                                    <?php if(empty($_POST['password'])):?>
                                        <script>M.toast({html: 'Password Required'})</script>
                                        <?php endif ?>
                                    <?php if(empty($_POST['cpassword'])):?>
                                        <script>M.toast({html: 'Confirm Password'})</script>
                                        <?php endif ?>
                            <?php endif ?>   
                        </div></br>
                        <div><label class="portal-label">Already a User? <a href="portal.php" class="label-link">Log In</a></label></br></div>
                    </form>
            </div>
        
    </div>
</section>
	

	<?php include('templates/footer.php'); ?>


</html>