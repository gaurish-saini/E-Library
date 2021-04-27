<?php 
require __dir__.'/'.'../../controllers/users/login.controller.php';
?>

<section class="container grey lighten-4 " id="login-box"></section>
    <div class="container col s12 md12">
          
        <div class="col s6 md6 center">
            <form class="border" method="POST">
                <div class="input-field indigo-text text-darken-4 ">
                    <input type="text" value="<?php echo htmlspecialchars($username) ?>" id="username" name="username">
                    <label for="email">Username*</label>
                </div>
                <div class="input-field indigo-text text-darken-4 ">
                    <input type="password" value="<?php echo htmlspecialchars($password) ?>" id="password" name="password">
                    <label for="password">Password*</label>
                </div>
                <div class="center">
                    <input type="submit" name="login" value="sign in" class="btn indigo-text tab-color z-depth-0 ">
                    <?php 
                    if(isset($_POST['login'])):?>
                            <?php if(empty($_POST['password'] && $_POST['username'])):?>
                                <script>M.toast({html: 'Invalid Credentials !'})</script>
                                <?php endif ?>
                            <?php if(empty($_POST['username'])):?>
                                <script>M.toast({html: 'Username Required'})</script>
                                <?php endif ?>
                            <?php if(empty($_POST['password'])):?>
                                <script>M.toast({html: 'Password Required'})</script>
                                <?php endif ?>
                    <?php endif ?>            
                </div></br>
                <div><label class="portal-label">New Reader? <a href="/index?register=1" class="indigo-text">Create a Account</a></label></br></div>
            </form>
        </div>
    </div>
</section>