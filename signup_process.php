<?php
// Include database connection
include('db_connection.php'); // Ensure this file contains your correct database connection details

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number']; // Phone number
    $birthdate = $_POST['birthdate'];

    if (empty($name) || empty($email) || empty($password) || empty($number)) {
        echo "Please fill all required fields.";
        exit();
    }

    // Password hashing for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO users (name, email, password, number, birthdate) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // Handle error with the prepared statement
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    // Bind parameters and execute statement
    $stmt->bind_param("sssss", $name, $email, $hashed_password, $number, $birthdate);

    if ($stmt->execute()) {
        // Successful signup
        header("Location: login.php"); // Redirect to login page after successful signup
        exit();
    } else {
        // Handle errors
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
