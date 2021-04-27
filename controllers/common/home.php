<?php if (isset($_GET['register']))
	require __dir__ . '/' . '../../views/users/register.view.php';
	elseif ((Request::uri() == '') || (Request::uri() == 'index.php') || (Request::uri() == 'index')) {
        require __dir__.'/'.'../../view/users/login.view.php';
} ?>