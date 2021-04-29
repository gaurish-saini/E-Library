<?php 

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$user = new Users;
if($user){
    echo 'yes !';
}

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