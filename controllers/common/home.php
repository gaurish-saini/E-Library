<?php 

if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(isset($_SESSION['type'])){
		header('location:/login');
	}
	$msg1=$msg2=$msg3=$emailid=$password=$password1=$rname=NULL;
	if(isset($_SESSION['error1'])){
		$msg1=$_SESSION['error1'];
		unset($_SESSION['error1']);
	}
	if (isset($_SESSION['error2'])){
		$msg2=$_SESSION['error2'];
		unset($_SESSION['error2']);
	}
	if (isset($_SESSION['error3'])){
		$msg3=$_SESSION['error3'];
		unset($_SESSION['error3']);
	}
	if(isset($_SESSION['name'])){
		$emailid=$_SESSION['name'];
		unset($_SESSION['name']);
	}

	if(isset($_SESSION['password'])){
		$password=$_SESSION['password'];
		unset($_SESSION['password']);
	}
	if(isset($_SESSION['rname'])){
		$rname=$_SESSION['rname'];
		unset($_SESSION['rname']);
	}
?>
<?php
	$modal_status=NULL;
	$resemail=NULL; 
	if(isset($_SESSION['resemailid'])){
		$resemail=$_SESSION['resemailid'];
		unset($_SESSION['resemailid']);
		// echo 'home';
}
?>
<div id="modal1" class="modal">
    <form method="POST" action="/send_reset_password_link" >
        <div class="modal-content">
            <h5 class="modal-heading">Reset Your Password <i class="right material-icons modal-close">close</i></h5></br>
            <div class="input-field indigo-text text-darken-4 ">
                <i class="material-icons prefix">email</i>
                <input id="icon_prefix" type="email" class="validate" value="<?php echo htmlspecialchars($emailid) ?>" name="resemailid" id="resemailid">
                <label for="email">Enter Email*</label>
            </div>
            <?php if($msg3): ?>
            <small class="red-text left label-margin" id='errorresemailid'><?php echo $msg3; ?></small>
            </br>
            <?php endif ?>
        </div>
        <div class="modal-footer">
            <div class="modal-button"> <input type="submit" value="Get Password Reset Email" class="btn white-text indigo z-depth-0"></div>
        </div>
    </form>
</div>

<?php

    if (isset($_GET['register']))
	require __dir__ .'/'.'../../view/users/register.view.php';
	elseif ((Request::uri() == '') || (Request::uri() == 'index.php') || (Request::uri() == 'index')) {
        require __dir__.'/'.'../../view/users/login.view.php';
		require __dir__.'/'.'../../view/common/footer.php';
} ?>