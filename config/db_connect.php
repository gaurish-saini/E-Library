<?php
// connect to database
$conn = mysqli_connect('localhost','root','Gaurish@5162','e-library');
// $conn = mysqli_connect('localhost','gaurish','cc123','e-library');

// check connection
if(!$conn){
	echo 'Connection error: '. mysqli_connect_error();
}
?> 