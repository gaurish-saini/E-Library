<!DOCTYPE html>
<html>
	
	<?php include('templates/style.php'); ?>
	<?php include('templates/header.php'); ?>
    <?php include('templates/script.php'); ?>

<section class="container grey lighten-4 " id="login-box"></section>
    <div class="container col s12 md12">
        <div class="row">  
            <div class="col s6 md6">
                <!-- tabs -->
                <ul class="tabs col s12 tab-color center">
                <li class="tab col s6">
                    <a href="#adminsignin" class="active indigo-text text-darken-4">ADMIN</a>
                </li>
                <li class="tab col s6">
                    <a href="#readersignin" class="active indigo-text text-darken-4">READER</a>
                </li>
                </ul>
                <div id="adminsignin" ></br></br></br>
                    <form>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="email" id="email">
                            <label for="email">Username*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="password" id="password">
                            <label for="password">Password*</label></br></br></br>
                            <div class="center border">
                                <input type="submit" name="login" value="sign in" class="btn indigo-text tab-color z-depth-0">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="readersignin"></br></br></br>
                   <form>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="email" id="email">
                            <label for="email">Username*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="password" id="password">
                            <label for="password">Password*</label></br></br></br>
                            <div class="center border">
                                <input type="submit" name="login" value="sign in" class="btn indigo-text tab-color z-depth-0">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="col s6 md6">
                <!-- tabs -->
                <ul class="tabs col s12 tab-color center">
                <li class="tab col s6">
                    <a href="#admin" class="indigo-text text-darken-4">ADMIN</a>
                </li>
                <li class="tab col s6">
                    <a href="#reader" class="indigo-text text-darken-4">READER</a>
                </li>
                </ul>
                <div id="admin" ></br></br></br>
                    <form>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="text" id="name">
                            <label for="name">Enter Name*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="email" id="email">
                            <label for="email">Create Username*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="password" id="password">
                            <label for="password">Create Password*</label></br></br></br>
                            <div class="center border">
                                <input type="submit" name="signup" value="sign up" class="btn indigo-text tab-color z-depth-0">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="reader"></br></br></br>
                    <form>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="text" id="name">
                            <label for="name">Enter Name*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="email" id="email">
                            <label for="email">Create Username*</label>
                        </div>
                        <div class="input-field indigo-text text-darken-4 ">
                            <input type="password" id="password">
                            <label for="password">Create Password*</label></br></br></br>
                            <div class="center border">
                                <input type="submit" name="signup" value="sign up" class="btn indigo-text tab-color z-depth-0">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
	

	<?php include('templates/footer.php'); ?>


</html>         