<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "orders";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$orderNo = $_POST['orderNo'];
$newStatus = $_POST['newStatus'];

$sql = "UPDATE orders SET status='$newStatus' WHERE orderno='$orderNo'";

if ($conn->query($sql) === TRUE) {
    echo "Status updated successfully";
} else {
    echo "Error updating status: " . $conn->error;
}

$conn->close();
?>
