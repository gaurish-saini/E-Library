<div class="container">
	<form method="POST" action="/change_password" onsubmit="return (checkFieldPassword('password') && passwordMatch('password','password1'))">
		<h5 class="text-center mb-4">Set New Password for<br/><q><i><?=$emailid?></i></q>	</h5>
		<div class="input-field indigo-text text-darken-4 ">
			<i class="material-icons prefix">lock_outline</i>
			<input id="icon_prefix" type="password" class="validate" value="<?php echo htmlspecialchars($password) ?>" onkeyup="checkFieldPassword('password')" id="password" name="password">
			<label for="password">Enter Password*</label>
		</div>
		<?php if($msg2): ?>
		<small class="red-text left label-margin" id="errorpassword"><?php echo $msg1; ?></small>
		</br>
		<?php endif ?>
		<div class="input-field indigo-text text-darken-4 ">
			<i class="material-icons prefix">lock</i>
			<input id="icon_prefix" type="password" class="validate" value="<?php echo htmlspecialchars($password) ?>" onkeyup="passwordMatch('password','password1')" id="password1" name="password1">
			<label for="password">Confirm Password*</label>
		</div>
		<small class="red-text left label-margin" id="errorpassword1"></small>
		</br>
		<div class="center">
			<input type="submit" name="Change Password" value="Change Password" class="btn indigo-text tab-color z-depth-0 ">          
		</div>
	</form>
</div>