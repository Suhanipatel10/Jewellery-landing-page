<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users"; // Use your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt the password
$number = $_POST['number'];
$birthdate = $_POST['birthdate'];



// Check if email field is not empty
if (empty($email)) {
    die("Error: Email is required.");
}

// Check if email already exists in the database
$email_check_query = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($email_check_query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Error: Email already exists. Please use a different email address.";
} else {
    // Insert data into database if email is unique
    $sql = "INSERT INTO users (name, email, password, number, birthdate) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $email, $password, $number, $birthdate);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close connection
$stmt->close();
$conn->close();
?>