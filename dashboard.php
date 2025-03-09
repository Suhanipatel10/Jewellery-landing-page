<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Assuming the user's information is stored in session variables after login
$user_id = $_SESSION['user_id'];  // User ID from session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Not Provided';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'Not Provided';
$fullName = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : 'Not Provided';
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : 'Not Provided';
$birthdate = isset($_SESSION['birthdate']) ? $_SESSION['birthdate'] : 'Not Provided';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Welcome to Your Dashboard, <?php echo htmlspecialchars($username); ?>!</h1>
            <a href="logout.php" class="logout-button">Logout</a>
        </header>

        <!-- Show Orders Button (Only when logged in) -->
        <button class="show-orders-btn" onclick="window.location.href='view-orders.php'">Show Orders</button>

        <div class="user-info">
            <h2>User Information</h2>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($fullName); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
            <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($birthdate); ?></p>
        </div>

        <div class="user-actions">
            <h2>What would you like to do?</h2>
            <ul>
                <li><a href="edit-profile.php">Edit Profile</a></li>
                <li><a href="view-orders.php">View Orders</a></li>
                <li><a href="settings.php">Account Settings</a></li>
            </ul>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Your Website Name. All rights reserved.</p>
    </footer>
</body>
</html>
