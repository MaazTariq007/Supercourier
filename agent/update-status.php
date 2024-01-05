<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "orders";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Your database is not connected: " . mysqli_connect_error());
}



if(isset($_GET['pending'])){
    $pending = $_GET['pending'];
    $update = mysqli_query($conn, "UPDATE `orders` SET `status` = 'shipped' WHERE `orderno` = '$pending'");
    
}else if(isset($_GET['shipped'])){
    
    $shipped = $_GET['shipped'];
    $update = mysqli_query($conn, "UPDATE `orders` SET `status` = 'delivered' WHERE `orderno` = '$shipped'");
}else if(isset($_GET['delivered'])){
    
    $delivered = $_GET['delivered'];
    $update = mysqli_query($conn, "UPDATE `orders` SET `status` = 'delivery failed' WHERE `orderno` = '$delivered'");
}

if($update){
    header('location:order.php');
}


?>