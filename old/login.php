<?php
    
    session_start();

    require('app/app.php');

    $view_bag = [
        'title' => 'Login',
        'login' => '',
        'singup' => '',
        'home' => 'Home',
        'signup' => ''
    ];

    // check to see if the user is auth, if true then go to admin
    // TODO: if user is auth, then go to home page
    

    // TODO: check to see if either an admin or a user is auth.php
    if (is_user_authenticated()) {
        // TODO:
        // redirect to either the admin page or user page
        // if the session is a user, redirect to user page
        if ($_SESSION['user_loggedin']){
            redirect('user/');
        } elseif ($_SESSION['admin_loggedin']){ // if the admin is logged in, redirect to admin page
            redirect('admin/');
        }
        redirect('../4.2/index.php');
    }
    

    // if (is_post()) {
    //     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    //     $password = sanitize($_POST['password']); // TODO: validate this
        
    //     // compare with data store
    //     if (authenticate_user($email, $password)) {
    //         $_SESSION['email'] = $email;
    //         redirect('admin/');
    //     } else {
    //         $view_bag['status'] = 'The provided credentials did not work';
    //     }
    
    //     if ($email == false) {
    //         $view_bag['status'] = 'Please enter a valid email address';
    //     }

        // compare with db
        /*
            if (authenticate_user($email, $password)) {
                $_SESSION['email'] = 
            }
        */

    // }
    view('login');