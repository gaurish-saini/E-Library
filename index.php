<?php 
    include('core\models\database\connection.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>E-Library</title>
        <link rel="icon" href="https://coloredcow.com/wp-content/uploads/2017/03/favicon.png" sizes="32x32">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link type="text/javascript" href="resources/js/script.js">
        
        <?php 
            require __dir__.'/resources/materialize/materialize_css.php';
            require __dir__.'/resources/materialize/materialize_js.php';
        ?>
    </head>
	<?php 
        require 'core/materialize.php';
        require __dir__.'/view/common/header.php';
        require Router::load('routes.php')->direct(Request::uri());
        require __dir__.'/view/users/login.view.php';
        if(isset($_GET['register=1'])):	
		    require __dir__.'/'.'../../view/users/register.view.php';
        endif;
        require __dir__.'/view/common/footer.php'; 
    ?>
    
</html> 
<!-- <?php
var_dump($_SERVER); ?> -->