<?php

    session_start();
    require('../app/app.php');

    // require('app/app.php');

    // Set Database DB : Host, User, Password, and Name
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'glossary';

    // make a connection with DB with info above
    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if (mysqli_connect_errno()) {
        // if there is an error with connecting, stop the script and display the error
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    // if both email and password fields are not set in the login view, display error message
    // TODO: add username instead of email, users table: id username email pw admin
    if (!isset($_POST['email'], $_POST['password'])) {

        // could not get the data that should have been sent
        exit('please fill both the username and password fields');
    }

    // prepare SQL, preparing the SQL statement will prevent SQL injection
    if ($stmt = $con->prepare('SELECT id, pw, admin FROM users WHERE email = ?')) {

        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();

        // TODO: what does this do?
        if ($stmt->num_rows > 0){
            $stmt->bind_result($id, $pw, $admin);
            $stmt->fetch();
            // account exists, verify password
            // NOTE: remember to use password_hash in your registration file to store the hased passwords

            // verifying that the pw entered is the same pw in db
            if (password_verify($_POST['password'], $pw)) {
                // verification succes, user had logged in
                // create sessions, so we konw the user is logged in, they basically act like cookies but remember data on server

                //replace the current session ID with a new one, and keep the current session information.
                session_regenerate_id();

                // redundant?
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['email'];
                $_SESSION[] = $id;

                
                // echo 'Welcome ' . $_SESSION['name'];

                // if user 0 then go to user page
                if ($admin == 0) {
                    // create user session var, set to true
                    $_SESSION['user'] = TRUE;
                    header('Location: ../user/index.php');
                }
                // if admin 1 then go to admin page
                if ($admin == 1) {
                    // create admin session var, set to true
                    $_SESSION['admin'] = TRUE;
                    header('Location: ../admin/index.php');
                }

                // if ($stmt = $con->prepare('SELECT admin FROM users WHERE admin = 1')) {
                //     header('Location: ../admin/index.php');
                // }

                // header('Location: home.php');
                
            } else {
                // if the user has incorrect credentials display error
                echo 'Incorrect username and/or password USER_ERROR1';
            } 
        } 
            else {
        
                echo 'Incorrect username and/or password';
            
        }

        $stmt->close();
    }

?>