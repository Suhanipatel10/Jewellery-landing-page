<?php
session_start();
include('db_connection.php'); // Include the database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'not_logged_in']);
    exit;
}

// Get the user ID from the sessions
$user_id = $_SESSION['user_id'];

// Decode the cart data from the frontend
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['cart']) || empty($data['cart'])) {
    echo json_encode(['success' => false, 'error' => 'cart_empty']);
    exit;
}

$cart = $data['cart'];
$totalAmount = 0;
foreach ($cart as $item) {
    $totalAmount += $item['subtotal']; 
}

// Insert the order into the user_orders table
foreach ($cart as $item) {
    $stmt = $conn->prepare("INSERT INTO user_orders (user_id, total_amount, product_name, product_type, price, quantity, subtotal) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isdssdi", $user_id, $totalAmount, $item['name'], $item['type'], $item['price'], $item['quantity'], $item['subtotal']);
    $stmt->execute();
}

$stmt->close();
$conn->close();

// Return success response
echo json_encode(['success' => true]);
?>
