<style>
	.warning-color {
		color: rgb(217, 97, 9);
	}
</style>
<?php
if (!isset($_GET['msgtype']) || isset($_SESSION['type']))
	header('location:/');
elseif ($_GET['msgtype'] == 'unverified') {
	$headermsg = 'Thank you for choosing eLibrary.';
	$bodymsg = 'Verify your e-mail to finish signing up for eLibrary';
	$footermsg = 'Check your mail, we have sent you a link.';
} elseif ($_GET['msgtype'] == 'forgotpassword') {
	$headermsg = 'Lost your password. Don’t worry!';
	$bodymsg = 'Use the link sent to your mail to reset password.';
	$footermsg = ' If it doesn’t appear within a few minutes, check your spam folder.';
} elseif ($_GET['msgtype'] == 'verificationfailed') {
	$headermsg = '<span class="warning-color">Sorry, Something went wrong!</span>';
	$bodymsg = '<span class="warning-color">Verification Failed</span>';
	$footermsg = '<span class="warning-color">Please try again later!</span>';
} else {
	$headermsg = '';
	$bodymsg = 'Page Not Found!';
	$footermsg = '';
}
?>
<div class="container-fluid bg-light d-flex p-5" style="min-height:calc(100% - 180px);">
	<div class="align-self-center bg-light w-100">
		<div class="col-sm-8 col-md-6 col-xl-4 col-lg-5 bg-light  text-center mx-auto w-100">
			<p class="lead"><?= $headermsg ?></p>
			<hr class="my-4">
			<h1 class="display-6"><?= $bodymsg ?></h1>
			<hr class="my-4">
			<p class="lead"><?= $footermsg ?></p>
		</div>
	</div>
</div>