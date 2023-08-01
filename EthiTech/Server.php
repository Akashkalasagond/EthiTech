<?php
session_start();

// initializing variables
$username = "";
$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'EthiTech');

// check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// create 'users' table if it does not exist
$create_table_query = "CREATE TABLE IF NOT EXISTS users (
                        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        username VARCHAR(255) NOT NULL,
                        email VARCHAR(255) NOT NULL,
                        password VARCHAR(255) NOT NULL,
                        UNIQUE KEY unique_username (username)
                      )";
mysqli_query($db, $create_table_query);

// create 'customers' table if it does not exist
$create_table_query = "CREATE TABLE IF NOT EXISTS customers (
                        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        fullname VARCHAR(255) NOT NULL,
                        phone VARCHAR(255) NOT NULL,
                        email VARCHAR(255) NOT NULL,
                        appointment_time VARCHAR(255) NOT NULL,
                        message TEXT,
                        appointment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        
                      )";
mysqli_query($db, $create_table_query);

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); // encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password) 
                  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        header("Location: login.php");
        exit();
    }
}

// Process the form submission
if (isset($_POST['make_appointment'])) {
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $appointment_time = mysqli_real_escape_string($db, $_POST['appointment_time']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    // Form validation: Ensure that all required fields are filled
    if (empty($fullname)) {
        array_push($errors, "Full Name is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($appointment_time)) {
        array_push($errors, "Appointment Time is required");
    }

    // Save the customer details if there are no errors
    if (count($errors) == 0) {
        $query = "INSERT INTO customers (fullname, phone, email, appointment_time, message) 
                  VALUES ('$fullname', '$phone', '$email', '$appointment_time', '$message')";
        mysqli_query($db, $query);

        header("Location: index.html");
        exit();
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";

            header("Location: index.html");
            exit();
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>
