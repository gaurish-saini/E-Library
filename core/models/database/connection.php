<?php
// $conn = mysqli_connect('localhost','root','Gaurish@5162','e-library');
require __dir__.'/'.'../../configs/database/config.php';
$conn = mysqli_connect($host,$sql_user,$pass,$database_name);
if(!isset($conn)){
	die("Error in Connecting database..!");
}
?>