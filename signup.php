<?php
    // sign up page that handles all user registration

    require('app/app.php');

    $view_bag = [
        'title' => 'Signup',
        'heading' => 'Glossary',
        'login' => 'Login',
        'signup' => '',
        'home' => 'Home'
    ];

    // if (is_user_authenticated()) {
    //     session_start();
    //     redirect('login.php');
    // }


    // TODO:
    // Add new user into db
    // INSER INTO users
        // echo md5('test');

    view('signup');