/*global $, document, window, setTimeout, navigator, console, location*/
$(document).ready(function() {

    'use strict';

    var usernameError = true,
        emailError = true,
        schoolError = true,
        genderError = true,
        sportsError = true,
        passwordError = true,
        passConfirm = true;

    // Detect browser for css purpose
    if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
        $('.form form label').addClass('fontSwitch');
    }

    // Label effect
    $('input').focus(function() {

        $(this).siblings('label').addClass('active');
    });

    // Form validation
    $('input').blur(function() {

        // User Name
        if ($(this).hasClass('name')) {
            if ($(this).val().length === 0) {
                $(this).siblings('span.error').text('Please type your full name').fadeIn().parent('.form-group').addClass('hasError');
                usernameError = true;
            } else if ($(this).val().search(/^[-\sa-zA-Z]+$/)) {
                $(this).siblings('span.error').text('Please type characters and spaces only').fadeIn().parent('.form-group').addClass('hasError');
                usernameError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                usernameError = false;
            }
        }
        // Email
        if ($(this).hasClass('email')) {
            if ($(this).val().length == '') {
                $(this).siblings('span.error').text('Please type your email address').fadeIn().parent('.form-group').addClass('hasError');
                emailError = true;
            } else if ($(this).val().search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
                $(this).siblings('span.error').text('Please input a valid email').fadeIn().parent('.form-group').addClass('hasError');
                emailError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                emailError = false;
            }
        }
        // School
        if ($(this).hasClass('school')) {
            if ($(this).val().length == '') {
                $(this).siblings('span.error').text('Please type the name of your school').fadeIn().parent('.form-group').addClass('hasError');
                schoolError = true;
            } else if ($(this).val().search(/^[a-zA-Z\s]*$/)) {
                $(this).siblings('span.error').text('Please type characters and spaces only').fadeIn().parent('.form-group').addClass('hasError');
                schoolError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                schoolError = false;
            }
        }


        // gender
        if ($(this).hasClass('gender')) {
            if ($(this).val().length == '') {
                $(this).siblings('span.error').text('Please type your gender').fadeIn().parent('.form-group').addClass('hasError');
                genderError = true;
            } else if ($(this).val().search(/^male$|^female$/g)) {
                $(this).siblings('span.error').text('Enter male or female').fadeIn().parent('.form-group').addClass('hasError');
                genderError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                genderError = false;
            }
        }

        // sports
        if ($(this).hasClass('sports')) {
            if ($(this).val().length == '') {
                $(this).siblings('span.error').text('Please input your sports interest').fadeIn().parent('.form-group').addClass('hasError');
                sportsError = true;
            } else if ($(this).val().search(/^[a-zA-Z ]*$/)) {
                $(this).siblings('span.error').text('Please use alphabets and spaces only').fadeIn().parent('.form-group').addClass('hasError');
                sportsError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                sportsError = false;
            }
        }

        // PassWord
        if ($(this).hasClass('pass')) {
            if ($(this).val().length < 8) {
                $(this).siblings('span.error').text('Please type at least 8 charcters').fadeIn().parent('.form-group').addClass('hasError');
                passwordError = true;
            } else {
                $(this).siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
                passwordError = false;
            }
        }

        // PassWord confirmation
        if ($('.pass').val() !== $('.passConfirm').val()) {
            $('.passConfirm').siblings('.error').text('Passwords don\'t match').fadeIn().parent('.form-group').addClass('hasError');
            passConfirm = false;
        } else {
            $('.passConfirm').siblings('.error').text('').fadeOut().parent('.form-group').removeClass('hasError');
            passConfirm = false;
        }

        // label effect
        if ($(this).val().length > 0) {
            $(this).siblings('label').addClass('active');
        } else {
            $(this).siblings('label').removeClass('active');
        }
    });


    // form switch
    $('a.switch').click(function(e) {
        $(this).toggleClass('active');
        e.preventDefault();

        if ($('a.switch').hasClass('active')) {
            $(this).parents('.form-peice').addClass('switched').siblings('.form-peice').removeClass('switched');
        } else {
            $(this).parents('.form-peice').removeClass('switched').siblings('.form-peice').addClass('switched');
        }
    });


    // Form submit
    $('form.signup-form').submit(function(event) {
        event.preventDefault();

        if (usernameError == true || emailError == true || schoolError == true || sportsError == true || genderError == true || passwordError == true || passConfirm == true) {
            $('.name, .email, .school, .gender, .sports, .pass, .passConfirm').blur();
        } else {
            $('.signup, .login').addClass('switched');


            setTimeout(function() { $('.signup, .login').hide(); }, 700);
            setTimeout(function() { $('.brand').addClass('active'); }, 300);
            setTimeout(function() { $('.heading').addClass('active'); }, 600);
            setTimeout(function() { $('.success-msg p').addClass('active'); }, 900);
            setTimeout(function() { $('.success-msg a').addClass('active'); }, 1050);
            setTimeout(function() { $('.form').hide(); }, 700);




            $.post(

                'create.php', {
                    signup: 'signup',
                    username: $('.name').val(),
                    emailAdress: $('.email').val(),
                    dateofBirth: $('.dateofBirth').val(),
                    gender: $('.gender').val(),
                    sports: $('.sports').val(),
                    user_password: $('.pass').val(),
                    school: $('.school').val()

                },

                function(data, status) {

                    console.log(data);
                }
            );

        }
    });

    // Reload page
    // $('a.profile').on('click', function() {
    //     location.reload(true);
    // });


});