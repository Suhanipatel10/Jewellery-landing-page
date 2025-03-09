<?php
// Include the database connection
include('db_connection.php');

// Get the search query from the URL
$query = isset($_GET['query']) ? $_GET['query'] : '';

// If the query is not empty, search for matching products
if (!empty($query)) {
    // Escape the query to prevent SQL injection
    $query = $conn->real_escape_string($query);

    // SQL query to search for products in the database
    $sql = "SELECT name FROM products WHERE name LIKE '%$query%' LIMIT 5";
    $result = $conn->query($sql);

    // Check if there are any matching products
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display each suggestion
            echo "<div class='suggestion-item'>" . $row['name'] . "</div>";
        }
    } else {
        echo "<div class='no-suggestions'>No results found.</div>";
    }
}
?>
