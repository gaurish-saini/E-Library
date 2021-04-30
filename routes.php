<?php
$router->define([
    ''=>'controllers/common/home.php',
    'index.php'=>'controllers/common/home.php',
	'index'=>'controllers/common/home.php',
    'login'=>'controllers/users/login.controller.php',
    'registration'=>'controllers/users/register.controller.php',
    // 'registration'=>'view/users/register.view.php',
	'addbook'=>'controllers/books/addbook.php',
]);
?>