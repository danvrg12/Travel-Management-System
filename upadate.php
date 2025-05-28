<?php
// Database connection
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "travel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$phone_number = $_POST['phoneNumber'];
$password = $_POST['password'];
$confirm_password = $_POST['confirmPassword'];
$gender = $_POST['gender'];

// Validate password and confirm password
if ($password != $confirm_password) {
    die("Error: Passwords do not match.");
}

// Update user credentials in the database
$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number', password='$password', gender='$gender' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Login credentials updated successfully.";
} else {
    echo "Error updating login credentials: " . $conn->error;
}

$conn->close();
?>
