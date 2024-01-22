<?php
session_start();
require('../app/app.php');

$view_bag = [
  'title' => 'Delete',
  'heading' => 'Glossary',
  'login' => '',
  'signup' => '',
  'home' => 'Home'
];

// admin_is_authenticated();
if (!isset($_SESSION['admin'])) {
  redirect('../index.php');
}

if (is_get()) {
    $key = sanitize($_GET['key']);

    if (empty($key)) {
      view('not_found');
      die();
    }

    $term = Data::get_term($key);

    if ($term === false) {
      view('not_found');
      die();
    }

    view('admin/delete', $term);
}

if (is_post()) {
    $term = sanitize($_POST['term']);

    if (empty($term)) {
        // TODO: display message
    } else {
      Data::delete_term($term);
      redirect('index.php');  
    }
}