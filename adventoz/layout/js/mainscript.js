/*global console,click, $ */
$(function () {
    'use strict';
    //Flap the form to the other side

   $('#Flap-front').click(function () {
        $('.log-form').addClass("rotate");
    });

    $('#Flap-back').click(function () {
        $('.log-form').removeClass("rotate");
    });

    // hide PlaceHolder on the input

    $('[placeholder]').focus(function () {

        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function () {

        $(this).attr('placeholder', $(this).attr('data-text'))
    });

    // validation of login form

    $("#login-pass").keyup(function (event) {
        if (event.keyCode == 13) {
            $("#login-button").click();
        }
    });

    $(document).ready(function () {
        $("#login-button").on('click', function () {
            var email = $("#login-user").val();
            var password = $("#login-pass").val();

            if (email == "" || password == "") {
                $("#response-login").html('<p class="error-style">Plase check your inputs</p>').fadeIn().delay(3000).fadeOut();
            } else {
                $.ajax(
                    {
                        url: 'index.php',
                        method: 'post',
                        data: {
                            login: 1,
                            emailPHP: email,
                            passwordPHP: password
                        },
                        success: function (response) {
                            $("#response-login").html(response).fadeIn().delay(3000).fadeOut();

                            if (response.indexOf('success') >= 0) {

                                window.setTimeout(function () {
                                    window.location = 'nf.php'
                                }, 2000);

                            }
                        }
                    }
                )
            }
        })
    })

    // validation register form 

    $(document).ready(function () {

        $("#register-button").on('click', function () {

            var rgsEmail1 = $("#regemail").val();
            var rgsFname1 = $("#fname").val();
            var rgsLname1 = $("#lname").val();
            var rgsPass1 = $("#regpass").val();

            $.ajax ({
                method: "post",
                url: "action.php",
                data: { regsEmailPhp: rgsEmail1,
                        regsFnamePhp: rgsFname1,
                        regsLnamePhp: rgsLname1,
                        regsPassPhp: rgsPass1
                    },
            success: function(replay) {
                    $("#reg-error").html(replay);
                }
            })

        /*$("#email-error-msg").hide();
        $("#fname-error-msg").hide();
        $("#lname-error-msg").hide();
        $("#pass2-error-msg").hide();

        var error_email = false;
        var error_fname = false;
        var error_lname = false;
        var error_pass2 = false;

        $("#regemail").focusout(function () {
            check_emailfun();
        });

        $("#fname").focusout(function () {
            check_fnamefun();
        });

        $("#lname").focusout(function () {
            check_lnamefun();
        });

        $("#regpass").focusout(function () {
            check_passfun();
        });

        function check_emailfun() {
            var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

            if (pattern.test($("#regemail").val())) {
                $("#email-error-msg").hide();
                
            } else if ($("#regemail").val() == "") {
                $("#email-error-msg").html("<p class='error-style'>"+"Email Required"+"</p>");
                $("#email-error-msg").fadeIn();
                error_email = true;
            } else {

                $("#email-error-msg").html("<p class='error-style'>"+"Invalid Email address"+"</p>");
                $("#email-error-msg").fadeIn();
                error_email = true;
            }
        }

        function check_fnamefun() {
            var pattern = new RegExp(/^[a-zA-Z]{2,10}$/i);

            if (pattern.test($("#fname").val())) {
                $("#fname-error-msg").hide();

            } else if ($("#fname").val() === "") {
                $("#fname-error-msg").html("<p class='error-style'>"+"First Name Required"+"</p>");
                $("#fname-error-msg").show();
                error_fname = true;

            } else {

                $("#fname-error-msg").html("<p class='error-style'>"+"Invalid First Name"+"</p>");
                $("#fname-error-msg").show();
                error_fname = true;
            }
        }

        function check_lnamefun() {
            var pattern = new RegExp(/^[a-zA-Z]{2,10}$/i);

            if (pattern.test($("#lname").val())) {
                $("#lname-error-msg").hide();

            } else if ($("#lname").val() === "") {
                $("#lname-error-msg").html("<p class='error-style'>"+"Last Name Required"+"</p>");
                $("#lname-error-msg").fadeIn();
                error_lname = true;
            } else {

                $("#lname-error-msg").html("<p class='error-style'>"+"Invalid Last Name"+"</p>");
                $("#lname-error-msg").fadeIn();
                error_lname = true;
            }
        }

        function check_passfun() {
            var password_length = $("#regpass").val().length;

            if (password_length < 8) {
                $("#pass2-error-msg").html("<p class='error-style'>"+"the password should be more than 8 charctur"+"</p>");
                $("#pass2-error-msg").fadeIn();
                error_pass2 = true;
            } else {
                $("#pass2-error-msg").hide();
            }
        }

            error_email = false;
            error_fname = false;
            error_lname = false;
            error_pass2 = false;
            check_emailfun();
            check_fnamefun();
            check_lnamefun();
            check_passfun();
            if (error_email == false && error_fname == false && error_lname == false && error_pass2 == false) {
                return true;
            } else {
                return false;  
            }*/


        })
    });
});




