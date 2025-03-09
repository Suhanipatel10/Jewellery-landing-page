<?php
// get_user_data.php
session_start();

header('Content-Type: application/json');

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Assume your database connection is already set up
    include('db_connection.php');

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT name, email, number, birthdate FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode($user);
    } else {
        echo json_encode(['error' => 'User not found.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'User not logged in.']);
}
?>
