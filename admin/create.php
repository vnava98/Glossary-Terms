<?php
session_start();
require('../app/app.php');

// ensure_admin_is_authenticated();
if (!isset($_SESSION['admin'])) {
  redirect('../index.php');
}

$view_bag = [
  'title' => 'Create',
  'heading' => '',
  'login' => '',
  'signup' => '',
  'home' => 'Home'
];

if (is_post()) {
    $term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);

    if (empty($term) || empty($definition)) {
        // TODO: display message
    } else {
      Data::add_term($term, $definition);
      redirect('index.php');  
    }
}


view('admin/create');