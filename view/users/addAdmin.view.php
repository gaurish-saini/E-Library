<div class="login-view">
    <form class="border" action="/addadmin"  method="POST" onsubmit="return (checkFieldName('user_name') && checkFieldEmail('email') && checkFieldPassword('password') && passwordMatch('password','password1'))">
    <h5 class="center">Add Admin.</h5>
            <div class="divider"></div>
            </br>    
    <div class="input-field indigo-text text-darken-4 ">
            <i class="material-icons prefix">person</i>
            <label for="email">Enter Full Name*</label>
            <input id="icon_prefix" type="text" class="validate" id="user_name" name="user_name" onkeyup="checkFieldName('user_name')" onblur="checkFieldName('user_name')">
        </div>
        <!-- <?php if($msg1): ?>
        <small class="red-text left label-margin" id='erroruser_name'><?php echo $msg1; ?></small>
        </br>
        <?php endif ?> -->
        <div class="input-field indigo-text text-darken-4 ">
            <i class="material-icons prefix">email</i>
            <label for="email">Enter Email*</label>
            <input id="icon_prefix" type="email" class="validate" id="email" name="email" onkeyup="checkFieldEmail('email')" onblur="checkFieldEmail('email')">
        </div>
        <!-- <?php if($msg2): ?>
        <small class="red-text left label-margin" id='erroremail'><?php echo $msg2; ?></small>
        </br>
        <?php endif ?> -->
        <div class="input-field indigo-text text-darken-4 ">
            <i class="material-icons prefix">lock_outline</i>
            <label for= "password">Create Password*</label>
            <input id="icon_prefix" type="password" class="validate" id="password" name="password"  onkeyup="checkFieldPassword('password')" onblur="checkFieldPassword('password')">
        </div>
        <!-- <?php if($msg3): ?>
        <small class="red-text left label-margin" id="errorpassword"><?php echo $msg3; ?></small>
        </br>
        <?php endif ?> -->
        <div class="input-field indigo-text text-darken-4 ">
            <i class="material-icons prefix">lock</i>
            <label for= "password">Confirm Password*</label>
            <input id="icon_prefix" type="password" class="validate" id="password1" name="password1" onkeyup="passwordMatch('password','password1')" onblur="passwordMatch('password','password1')">
        </div>
        <small id="errorpassword1" class="red-text left label-margin"></small>
        <div class="center">
            <input type="submit" name="signup" value="sign up" class="btn indigo-text tab-color z-depth-0">
        </div></br>
    </form>
</div>
