<?php

    function lang( $phrase ) {

        static $lang = array (
            // log in page
                // long in form
                'signin_head'   =>'Log in',
                'username'      => ' Email',
                'pass'          => 'password',
                'forgetpass'    =>'forget Password',
                'login_buttom'  => 'Login',
                'other_login'   => 'Or Login with',
                'signup_hover'  => 'Not on Adventoz yet? Sign up',

                // Reguster form
                'sign_up'        => 'Sign Up',
                'mail'           => 'Email',
                'fname'          => 'First Name',
                'lname'          => 'Last Name',
                'pass2'          => 'Password',
                'signup_buttom'  => 'Sing Up',
                'signin_hover'   => 'Already a member? Log in',
        );

        return $lang[$phrase];
    }