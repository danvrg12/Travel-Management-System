<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "travel"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO contactus (firstName, lastName, email, website, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $website, $message);

    // Set parameters
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $message = $_POST["message"];

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to main.html
        header("Location: main.html");
        exit(); // Ensure that no more output is sent
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
