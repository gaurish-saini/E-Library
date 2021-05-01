<?php 
    include('core/models/database/connection.php');
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
        if((Request::uri()!='') && (Request::uri()!='index') && (Request::uri()!='index.php') && !(isset($_GET['register']))):	
		    // require __dir__.'/view/users/login.view.php'; 
        endif;
        require __dir__.'/view/common/footer.php';
        require __dir__.'/'.'view/common/modals.view.php';
    ?>
    <script type="text/javascript" src='resources/js/custom_js_functions.js'></script>
</html>