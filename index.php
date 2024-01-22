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
        'title' => 'Glossary',
        'heading' => 'Welcome, to Glossary!',
        'login' => 'Login',
        'signup' => 'Signup',
        'home' => 'Home'
    ];

    if (isset($_GET['search'])) {
        $items = Data::search_terms($_GET['search']);

        $view_bag['heading'] = 'Search Results for ' . $_GET['search'];
    } else {
        $items = Data::get_terms();
    }

    view(
        name:'index', 
        model: $items);