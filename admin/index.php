<?php

session_start();
require('../app/app.php');

// if not admin then go to root index.php
if (!isset($_SESSION['admin'])) {
    redirect('../index.php');
}

$view_bag = [
    'title' => 'Admin',
    'heading' => 'Glossary',
    'login' => '',
    'signup' => '',
    'home' => 'Home'
];

// terms
if (isset($_GET['search'])) {
    $items = Data::search_terms($_GET['search']);

    $view_bag['heading'] = 'Search Results for ' . $_GET['search'];
} else {
    $items = Data::get_terms();
}

view(
    name:'admin/index', 
    model: $items);
// view('admin/index', Data::get_terms());