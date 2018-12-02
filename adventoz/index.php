<?php
    session_start();
    $noNavbar = "";
    $pageTitle = "Adventoz";
    if (isset($_SESSION['user'])) {
        header('Location: nf.php');
    }

    include "init.php";

//Check If the User come from http request

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    if (isset($_POST['login'])) {
        $email =     $_POST['emailPHP'];
        $password   =     $_POST['passwordPHP'];
        $hashedPass =     sha1($password);

        //Check If the User Exist In the Database

        $stmt = $con->prepare('SELECT email, pass FROM users WHERE email = ? AND pass =?');
        $stmt->execute(array($email,$hashedPass));
        $count = $stmt->rowCount();

        // If count > 0 this mean the database countain record about this user

        if ($count > 0 ) {
             $_SESSION['user'] = '1';
             $_SESSION['email'] = $email;
             exit('<p class="success-style">Login success</p>');
        } else {
            exit('<p class="error-style">Email or Password incorrect</p>');
        }
    } else {

        $formErrors = array();

        if (isset($_POST['signUser'])) {


            $filterEmail = filter_var($_POST['signUser'], FILTER_VALIDATE_EMAIL);

            if (!filter_var($filterEmail)) {

                $formErrors[] = 'This Email is not Valid';
            }

        }

        if (isset($_POST['firstName'])) {

            $filterFName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);

        }

        if (isset($_POST['lastName'])) {

            $filterLName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);

        }

        if (isset($_POST['signPass'])) {

            if (empty($_POST['signPass'])) {

                $formErrors[] = 'sorry the password field can not be empty';
            }
        }

    }
}
?>

<div class="index-body">
    <img class="bg-image" src="layout/images/pghome1.jpg" alt="">
    <div class="container">
        <div class="row">
            <div class="demo-inner-content col-md">
                <div class="logo-img">
                    <object data="" type="">
                        <embed src="layout/images/logo-img.svg" type="">
                    </object>
                </div>
                <div class="word-cont">
                    <h2>Welcome to</h2>
                    <h2><span>Adventoz</span> <span>World</span></h2>
                    <p>Enjoy every moment of Life !</p>
                </div>
            </div>
            <!-- Start the form -->
            <div class="log-cont col-md">
                <div class="log-form">
                    <!-- Start login form -->
                    <form class="front-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="title-cont">
                            <h2><?php echo lang('signin_head'); ?></h2>
                        </div>
                        <div class="inputbox">
                            <input id="login-user" type="text" name="user"  title="" required="" placeholder="Enter your email" autocomplete="off"/>
                            <label><?php echo lang('username'); ?></label>
                        </div>
                        <div class="inputbox">
                            <input id="login-pass" type="password" name="pass" title="" required="" placeholder="Enter your password"/>
                            <label><?php echo lang('pass'); ?></label>
                        </div>
                        <a href="#"><span class="pass-link"><?php echo lang('forgetpass'); ?></span></a>
                        <div class="switch">
                            <label class="checkbox-title">Remember me</label>
                            <input type="checkbox" id="s6"/>
                            <label class="slider-v3" for="s6"></label>
                        </div>
                        <input class="sub-buttom" id="login-button" name="login" type="button" non-default value="<?php echo lang('login_buttom'); ?>"/>
                        <div  class="msg-error"><p id="response-login"></p></div>
                        <hr>
                        <span class="word-s1"><?php echo lang('other_login'); ?></span>
                        <div class="icon">
                            <i class="fa fa-facebook-f fa-4x"></i>
                            <i class="fa fa-google fa-4x"></i>
                        </div>
                        <div class="tearms">
                            <p>By continuing, you agree to Adventoz's<br> 
                                <span>Terms of Service,</span><span>Privacy Policy</span>
                            </p>
                        </div>
                        <span id="Flap-front" class="flap-form"><?php echo lang('signup_hover'); ?></span>
                    </form>
                    <!-- End login form -->
    
                    <!-- Start Register form -->
                    <form class="back-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return false" method="POST">
                        <div class="title-cont">
                            <h2><?php echo lang('sign_up'); ?></h2>
                        </ class="">
                        <div class="inputbox">
                            <input id="regemail" type="email" name="signUser"  title="" placeholder="Enter your email" required="" autocomplete="off"/>
                            <label><?php echo lang('mail'); ?></label>
                            <span class="error-form" id="email-error-msg"></span>
                        </div>
                        <div class="inputbox">
                            <input id="fname" type="text" name="firstName" title="" placeholder="enter your First Name" required="" autocomplete="off"/>
                            <label><?php echo lang('fname'); ?></label>
                            <span class="error-form" id="fname-error-msg"></span>
                        </div>
                        <div class="inputbox">
                            <input id="lname" type="text" name="lastName" title="" placeholder="enter your Last Name" required="" autocomplete="off"/>
                            <label><?php echo lang('lname'); ?></label>
                            <span class="error-form" id="lname-error-msg"></span>
                        </div>
                        <div class="inputbox">
                            <input id="regpass" minlength="8" type="password" name="signPass" placeholder="password should be strong" title="" required=""/>
                            <label><?php echo lang('pass2'); ?></label>
                            <span class="error-form" id="pass2-error-msg"></span>
                        </div>
                        <div class="tearms">
                            <p>By continuing, you agree to Adventoz's<br> 
                                <span>Terms of Service</span> , <span>Privacy Policy</span>
                            </p>
                        </div>
                        <input id="register-button" class="sub-buttom" name="signup" type="submit" non-default value="<?php echo lang('signup_buttom'); ?>" title=""/>
                        <div class="errorphp" id="reg-error">
                            <?php
                                if(!empty($formErrors)) {
                                    foreach ($formErrors as $error) {
                                        echo $error . '<br>';
                                    }
                                }
                            ?>
                        </div>
                        <hr>
                        <span id="Flap-back" class="flap-form"><?php echo lang('signin_hover'); ?></span>
                    </form>
                    <!-- End Register form -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
 include $tpl . 'footer.php'; ?>



