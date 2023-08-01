<?php
session_start();

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'EthiTech');

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the form submission
if (isset($_POST['make_appointment'])) {
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $appointment_time = mysqli_real_escape_string($db, $_POST['appointment_time']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    // Save the customer details to the database
    $query = "INSERT INTO customers (fullname, phone, email, appointment_time, message) 
              VALUES ('$fullname', '$phone', '$email', '$appointment_time', '$message')";
    mysqli_query($db, $query);

    // Redirect the user to a success page or display a success message
    header("Location: index.html#contact");
    exit();
}
?>
