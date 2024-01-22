<?php

session_start();
require('../app/app.php');

// if not admin then go to index.php
if (!isset($_SESSION['admin'])) {
    redirect('index.php');
}

$view_bag = [
    'title' => 'Users',
    'heading' => 'User List',
    'login' => '',
    'signup' => '',
    'home' => 'Home'
];


// TODO: Display list of all users currently in the database
    if (isset($_GET['search'])) {
        $items = Data::search_users($_GET['search']);

        $view_bag['heading'] = 'Search Results for ' . $_GET['search'];
    } else {
        $items = Data::get_users();
    }

    view(
        name:'admin/users', 
        model: $items);