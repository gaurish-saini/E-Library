<?php
// connect to database
$conn = mysqli_connect('ec2-65-0-92-14.ap-south-1.compute.amazonaws.com','root','Gaurish@5162','e-library');

// check connection
if(!$conn){
	echo 'Connection error: '. mysqli_connect_error();
}
?>