<?php
    
    session_start();

    require('app/app.php');

    // if user then go to user folder
    if (isset($_SESSION['user'])) {
        redirect('user/');
    }

    // if admin then go to admin folder
    if (isset($_SESSION['admin'])) {
        redirect('admin/');
    }


    $view_bag = [
        'title' => 'Login',
        'login' => '',
        'singup' => '',
        'home' => 'Home',
        'signup' => ''
    ];

    
    // set view to login.view.php
    view('login');