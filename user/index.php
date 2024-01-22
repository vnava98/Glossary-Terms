<?php

    session_start();

    require('../app/app.php');

    // if not user then go to root index.php
    if (!isset($_SESSION['user'])) {
        redirect('../index.php');
    }

    $view_bag = [
        'title' => 'Home',
        'heading' => 'Glossary',
        'login' => '',
        'signup' => '',
        'home' => 'Home'
    ];



    if (isset($_GET['search'])) {
        $items = Data::search_terms($_GET['search']);

        $view_bag['heading'] = 'Search Results for ' . $_GET['search'];
    } else {
        $items = Data::get_terms();
    }

    view(
        name:'user', 
        model: $items);