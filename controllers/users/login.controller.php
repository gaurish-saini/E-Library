<?php 
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$user = new Users;

if(isset($_POST['login'])){   
  if(!empty($_POST['password'] && $_POST['username'])) 
  {
    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST["password"]); 
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
        
      if($count == 1) 
      {
        if ($row['role'] =='admin')
        {
          $_SESSION['login_user'] = $myusername; 
          
          require __dir__.'/'.'../../Views/common/sidebar.php';
          // header('location: index.php');
          echo 'admin';
          session_start();
        }
        if ($row['role'] =='reader')
        {
          $_SESSION['login_user'] = $myusername; 
          require __dir__.'/'.'../../Views/common/sidebar.php';
          // header('location: reader.php');
          echo 'reader';
          session_start();
        } 
      }
    }
  }
}
?>        