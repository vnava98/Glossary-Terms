<?php

// header to location $url and die() the page
function redirect($url) {
    header("Location: $url");
    die();
}

function view($name, $model = '') {
    global $view_bag;
    require(APP_PATH . "views/layout.view.php");
}

function is_get() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function sanitize($value) {
    $temp = filter_var(trim($value), FILTER_UNSAFE_RAW);

    if ($temp === false) {
        return '';
    }

    return $temp;
}

// authenticate user OLD(real just our admin stored in an associative array)
function authenticate_user($email, $password) {
    $users = CONFIG['users'];

    if (!isset($users[$email])) {
        return false;
    }

    // changed from = $users[$email]
    $user_password = $users[$email];

    return $password == $user_password;
}


// Check to see if USER is authenticated, if isset then return it
function is_authenticated() {

    // if user/admin is logged in return
    if (isset($_SESSION['loggedin'])) {
        return isset($_SESSION['loggedin']);
    }
}

// ensures if USER is authenticated, if not then redirect to login page
function ensure_is_authenticated() {
    if (!is_authenticated()) {
        redirect('index.php');
        die();
    }
}

function ensure_is_admin(){
    if (!isset($_SESSION['admin'])) {
        redirect('index.php');
        die();
    }
}



