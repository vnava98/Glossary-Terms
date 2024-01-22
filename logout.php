<?php
    // sign out of all sessions and redirect back to index.php
    session_start();
    session_unset();
    session_destroy();

    require('app/app.php');

    // redirect to website homepage
    redirect('index.php');
    // redirect('login.php');
