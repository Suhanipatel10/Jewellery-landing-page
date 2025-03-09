<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $jewelryType = $_POST['jewelryType'];
    $message = $_POST['message'];
    
    // Handle custom options if any
    $customOptions = isset($_POST['customOptions']) ? implode(", ", $_POST['customOptions']) : "None";

    // Create new SimpleXMLElement
    $xml = simplexml_load_file('orders.xml') or die("Error: Cannot create object");

    // Create a new order entry
    $order = $xml->addChild('order');
    $order->addChild('name', $name);
    $order->addChild('email', $email);
    $order->addChild('number', $number);
    $order->addChild('jewelryType', $jewelryType);
    $order->addChild('customOptions', $customOptions);
    $order->addChild('message', $message);

    // Save the XML file
    $xml->asXML('orders.xml');
    
    // Redirect or display success message
    echo "Order successfully submitted!";
}
?>
