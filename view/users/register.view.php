<?php
if(isset( $_SESSION['errormsg'])) {
 echo "<script>M.toast({html: '" . $_SESSION['errormsg'] . "' })</script>";
}
?>
<section class="container grey lighten-4 " id="login-box"></section>
    <div class="container col s12 md12">
            <div class="col s6 md6 center">
                    <form class="border" action="/registration"  method="POST">
                        <div class="input-field indigo-text text-darken-4 ">
                            <i class="material-icons prefix">person</i>
                            <input id="icon_prefix" type="text" class="validate" value="<?php echo htmlspecialchars($rname) ?>" id="rname" name="rname">
                            <label for="email">Enter Full Name*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <i class="material-icons prefix">email</i>
                            <input id="icon_prefix" type="email" class="validate" value="<?php echo htmlspecialchars($emailid) ?>" id="remailid" name="remailid">
                            <label for="email">Enter Email*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="icon_prefix" type="password" class="validate" value="<?php echo htmlspecialchars($password) ?>" id="rpassword" name="rpassword">
                            <label for= "password">Create Password*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <i class="material-icons prefix">lock</i>
                            <input id="icon_prefix" type="password" class="validate" value="<?php echo htmlspecialchars($password1) ?>" id="password1" name="password1">
                            <label for= "password">Confirm Password*</label>
                        </div>
                        <div class="center">
                            <input type="submit" name="signup" value="sign up" class="btn indigo-text tab-color z-depth-0">
                        </div></br>
                        <div class="divider brand-text"></div>
                        <div><label class="portal-label">Already Registered ? <a href="/" class="indigo-text">Log In</a></label></br></div>
                    </form>
            </div>
    </div>
</section>

