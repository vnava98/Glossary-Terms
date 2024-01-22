<?php
    session_start();
    require('../app/app.php');

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

    // // Now we check if the data was submitted, isset() function will check if the data exists.
    // if (!isset($_POST['email'], $_POST['password'])) {
    //     // Could not get the data that should have been sent.
    //     exit('Please complete the registration form!');
    // }
    // // Make sure the submitted registration values are not empty.
    // if (empty($_POST['email']) || empty($_POST['password'])) {
    //     // One or more values are empty.
    //     exit('Please complete the registration form');
    // }

    // ensure input is an email address
    // filter variable for post method for email, FILTER_VALIDATE_EMAIL
    // exit if it is not and display message
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    }

    // ensure email only accepts letters and number characters
    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['email'] == 0)) {
        exit ('email address is not valid');
    }

    // 

    if($stmt = $con->prepare('SELECT id, pw FROM users WHERE email = ?')) {

        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            echo 'Email exists, please choose another';
        } else {
            // insert new account
            // Username doesn't exists, insert new account
            if ($stmt = $con->prepare('INSERT INTO users (pw, email) VALUES (?, ?)')) {
                // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('ss', $pw, $_POST['email']);
                $stmt->execute();
                echo 'You have successfully registered! You can now login!';
            } else {
                // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all three fields.
                echo 'Could not prepare statement!';
            }
        }
        $stmt->close();
    } 
    else {
        echo 'could not prepare statement';
    }
    $con->close();