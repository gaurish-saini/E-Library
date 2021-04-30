<style>
	.warning-color {
		color: indigo;
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
<div class="container" >
	<div class="">
		<div class="">
			<p class=""><?= $headermsg ?></p>
			<hr class="">
			<h1 class=""><?= $bodymsg ?></h1>
			<hr class="">
			<p class=""><?= $footermsg ?></p>
		</div>
	</div>
</div>