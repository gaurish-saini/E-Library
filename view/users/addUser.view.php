<section class="container grey lighten-4 " style="margin-top: 30px;" id="login-box"></section>
    <div class="container col s12 md12">
        <div class="col s6 md6 center">
            <form class="border" action="/registration"  method="POST" onsubmit="return (checkFieldName('rname') && checkFieldEmail('remailid') && checkFieldPassword('rpassword') && passwordMatch('rpassword','password1'))">
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">person</i>
                    <label for="email">Enter Full Name*</label>
                    <input id="icon_prefix" type="text" class="validate"  id="rname" name="rname" onkeyup="checkFieldName('rname')" onblur="checkFieldName('rname')">
                </div>
                <?php if($msg1): ?>
                <small class="red-text left label-margin" id='errorrname'><?php echo $msg1; ?></small>
                </br>
                <?php endif ?>
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">email</i>
                    <label for="email">Enter Email*</label>
                    <input id="icon_prefix" type="email" class="validate" id="remailid" name="remailid" onkeyup="checkFieldEmail('remailid')" onblur="checkFieldEmail('remailid')">
                </div>
                <?php if($msg2): ?>
                <small class="red-text left label-margin" id='errorremailid'><?php echo $msg2; ?></small>
                </br>
                <?php endif ?>
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">lock_outline</i>
                    <label for= "password">Create Password*</label>
                    <input id="icon_prefix" type="password" class="validate"  id="rpassword" name="rpassword"  onkeyup="checkFieldPassword('rpassword')" onblur="checkFieldPassword('rpassword')">
                </div>
                <?php if($msg3): ?>
                <small class="red-text left label-margin" id="errorrpassword"><?php echo $msg3; ?></small>
                </br>
                <?php endif ?>
                <div class="input-field indigo-text text-darken-4 ">
                    <i class="material-icons prefix">lock</i>
                    <label for= "password">Confirm Password*</label>
                    <input id="icon_prefix" type="password" class="validate" id="password1" name="password1" onkeyup="passwordMatch('rpassword','password1')" onblur="passwordMatch('rpassword','password1')">
                </div>
                <small id="errorpassword1" class="red-text left label-margin"></small>
                <div class="center">
                    <input type="submit" name="signup" value="sign up" class="btn indigo-text tab-color z-depth-0">
                </div></br>
                <div class="divider brand-text"></div>
            </form>
        </div>
    </div>
</section>