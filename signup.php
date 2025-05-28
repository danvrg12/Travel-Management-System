<?php
// Database connection
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "travel";

$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

    // Insert data into the database
    $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password, gender)
            VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$password', '$gender')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the next page
        header("Location: main.html");
        exit(); // Make sure to exit after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
