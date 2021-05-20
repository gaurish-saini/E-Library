<div class="container grey lighten-4" style="margin-top: 30px;">
	<ul id="tabs-swipe" class="tabs row tab-color s12 center">
		<li class="tab col s6"><a href="#admin">List of Admins</a></li>
		<li class="tab col s6"><a href="#reader">List of Readers</a></li>
	</ul>
	<?php
	while($total1=mysqli_fetch_assoc($total_users)){
	?>
	<div id="admin" class="s6">
		<?php 
		$i=0;
		if($total1['type']=='0'){
		?>
			<table class="highlight">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Username</th>
						<th>e-Mail</th>
						<th class="center"><a class="modal-trigger" href="#addadmin"><i class="material-icons black-text">add</i></a></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?=++$i?></td>
						<td><?=$total1['user_name']?></td>
						<td><?=$total1['email_id']?></td>
						<td class="center"><i class="material-icons icon-margin">delete</i></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		<?php } ?>
	</div>
		<?php 
		$j=0;
		if($total1['type']=='1'){
		?>
		<div id="reader" class="s6">
			<table class="highlight">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Username</th>
						<th>e-Mail</th>
						<th class="center"><a href="addadmin.php"><i class="material-icons black-text">add</i></a></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?=++$j?></td>
						<td><?=$total1['user_name']?></td>
						<td><?=$total1['email_id']?></td>
						<td class="center"><i class="material-icons icon-margin">delete</i></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php } ?>
	<?php } ?>
<div id="addadmin" class="modal modal-adduser bottom-sheet">
			<div class="modal-content">
			<h4>Add Admin</h4>
			<form class="border form-adduser" action="/registration"  method="POST" onsubmit="return (checkFieldName('rname') && checkFieldEmail('remailid') && checkFieldPassword('rpassword') && passwordMatch('rpassword','password1'))">
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">person</i>
                    <label for="email">Enter Full Name*</label>
                    <input id="icon_prefix" type="text" class="validate" value="<?php echo htmlspecialchars($rname) ?>" id="rname" name="rname" onkeyup="checkFieldName('rname')" onblur="checkFieldName('rname')">
                </div>
                <!-- <?php if($msg1): ?>
                <small class="red-text left label-margin" id='errorrname'><?php echo $msg1; ?></small>
                </br>
                <?php endif ?> -->
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">email</i>
                    <label for="email">Enter Email*</label>
                    <input id="icon_prefix" type="email" class="validate" value="<?php echo htmlspecialchars($emailid) ?>" id="remailid" name="remailid" onkeyup="checkFieldEmail('remailid')" onblur="checkFieldEmail('remailid')">
                </div>
                <!-- <?php if($msg2): ?>
                <small class="red-text left label-margin" id='errorremailid'><?php echo $msg2; ?></small>
                </br>
                <?php endif ?> -->
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">lock_outline</i>
                    <label for= "password">Create Password*</label>
                    <input id="icon_prefix" type="password" class="validate" value="<?php echo htmlspecialchars($password) ?>" id="rpassword" name="rpassword"  onkeyup="checkFieldPassword('rpassword')" onblur="checkFieldPassword('rpassword')">
                </div>
                <!-- <?php if($msg3): ?>
                <small class="red-text left label-margin" id="errorrpassword"><?php echo $msg3; ?></small>
                </br>
                <?php endif ?> -->
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">lock</i>
                    <label for= "password">Confirm Password*</label>
                    <input id="icon_prefix" type="password" class="validate" value="<?php echo htmlspecialchars($password1) ?>" id="password1" name="password1" onkeyup="passwordMatch('rpassword','password1')" onblur="passwordMatch('rpassword','password1')">
                </div>
                <small id="errorpassword1" class="red-text left label-margin"></small>
                <div class="center">
                    <input type="submit" name="signup" value="sign up" class="btn indigo-text tab-color z-depth-0">
                </div></br>
            </form>
		</div>
</div>