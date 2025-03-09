<?php
session_start();
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Retrieve latest order for the logged-in user
$query = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f4f4f4; }
        .order-details { max-width: 600px; margin: auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); }
        h2 { color: #0e5830; font-size: 24px; text-align: center; }
        .detail-item { margin: 10px 0; font-size: 18px; }
    </style>
</head>
<body>
    <div class="order-details">
        <h2>Order Confirmation</h2>
        <?php if ($order): ?>
            <div class="detail-item"><strong>Contact Number: </strong> <?= htmlspecialchars($order['contact']) ?></div>
            <div class="detail-item"><strong>House/Flat No.: </strong> <?= htmlspecialchars($order['flat']) ?></div>
            <div class="detail-item"><strong>Area: </strong> <?= htmlspecialchars($order['area']) ?></div>
            <div class="detail-item"><strong>Nearby Landmark: </strong> <?= htmlspecialchars($order['landmark']) ?></div>
            <div class="detail-item"><strong>City: </strong> <?= htmlspecialchars($order['city']) ?></div>
            <div class="detail-item"><strong>Pincode: </strong> <?= htmlspecialchars($order['pincode']) ?></div>
            <div class="detail-item"><strong>Payment Method: </strong> <?= htmlspecialchars($order['payment_method']) ?></div>
        <?php else: ?>
            <div class="detail-item">No recent order found.</div>
        <?php endif; ?>
    </div>
</body>
</html>
