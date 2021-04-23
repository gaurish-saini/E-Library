<?php 
    include('models\database\connection.php');
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
        require __dir__.'/view/common/header.php';
        require __dir__.'/view/users/login.view.php';
        require __dir__.'/view/common/footer.php'; 
    ?>

</html> 