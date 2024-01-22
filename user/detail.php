<?php
// handles term details page (whenever you clock on a term it should redirect to this page)
require('../app/app.php');


// if we dont have a term, then redirect to index.php
if (!isset($_GET['term'])) {
    redirect('index.php');
}


$data = Data::get_term($_GET['term']); // TODO: validate input

if ($data == false) {
    view('not_found');
    die();
}

$view_bag = [
    'title' => 'Detail for ' . $data->term,
    'heading' => 'Glossary',
    'login' => '',
    'signup' => '',
    'home' => 'Home'
];

view('detail', $data);