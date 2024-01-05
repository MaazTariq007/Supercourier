<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SuperCourier | Admin Panel</title>
    <link rel="stylesheet" href="index.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="logo">
            </li>

            <li class="nav-item">
                <a href="./index.php" class="nav-link">
                    <i class='fa fa-home icons'></i>
                    <span class="link-text">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="./orders.php" class="nav-link">
                    <i class='fa fa-bar-chart icons'></i>
                    <span class="link-text">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class='fa fa-group icons'></i>
                    <span class="link-text">Agents</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class='fa fa fa-truck icons'></i>
                    <span class="link-text">Fleet Hub</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="./complaint.php" class="nav-link">
                    <i class='fa fa-exclamation-circle icons'></i>
                    <span class="link-text">Complaints</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="top-bar">
        <h2>Admin Dashborad</h2>
        <button type="submit">
            <a href="/courier/agent/logout.php">
                <i class="fa fa-sign-out"></i> LOGOUT
            </a>
        </button>
    </div>
    <main>
        <section>
            <div class="container">
                <div class="box">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "orders";

                    $conn = mysqli_connect($servername, $username, $password, $database);

                    if (!$conn) {
                        die("Your database is not connected: " . mysqli_connect_error());
                    }

                    $statuses = ['pending'];

                    $statusCounts = [];

                    foreach ($statuses as $status) {
                        $sql = "SELECT COUNT(*) as count FROM orders WHERE status = '$status'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $statusCounts[$status] = $row['count'];
                        } else {
                            die("Query failed: " . mysqli_error($conn));
                        }
                    }

                    // Print the counts
                    foreach ($statusCounts as $status => $count) {
                        echo "<h2>$count</h2>";
                    }

                    mysqli_close($conn);
                    ?>
                    <p>Orders To Deilver</p>
                    <a href="./order.php">See More</a>
                </div>


                <div class="box">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "orders";

                    $conn = mysqli_connect($servername, $username, $password, $database);

                    if (!$conn) {
                        die("Your database is not connected: " . mysqli_connect_error());
                    }

                    $statuses = ['shipped'];

                    $statusCounts = [];

                    foreach ($statuses as $status) {
                        $sql = "SELECT COUNT(*) as count FROM orders WHERE status = 'shipped'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $statusCounts[$status] = $row['count'];
                        } else {
                            die("Query failed: " . mysqli_error($conn));
                        }
                    }
                    foreach ($statusCounts as $status => $count) {
                        echo "<h2>$count</h2>";
                    }
                    mysqli_close($conn);
                    ?>
                    <p>Shipped</p>
                    <a href="./order.php">See More</a>
                </div>


                <div class="box">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "orders";

                    $conn = mysqli_connect($servername, $username, $password, $database);

                    if (!$conn) {
                        die("Your database is not connected: " . mysqli_connect_error());
                    }

                    $statuses = ['delivered'];

                    $statusCounts = [];

                    foreach ($statuses as $status) {
                        $sql = "SELECT COUNT(*) as count FROM orders WHERE status = 'delivered'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $statusCounts[$status] = $row['count'];
                        } else {
                            die("Query failed: " . mysqli_error($conn));
                        }
                    }

                    // Print the counts
                    foreach ($statusCounts as $status => $count) {
                        echo "<h2>$count</h2>";
                    }

                    mysqli_close($conn);
                    ?> <p>Total Delivered</p>
                    <a href="./order.php">See More</a>
                </div>


                <div class="box">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "orders";

                    $conn = mysqli_connect($servername, $username, $password, $database);

                    if (!$conn) {
                        die("Your database is not connected: " . mysqli_connect_error());
                    }

                    $statuses = ['delivery failed'];

                    $statusCounts = [];

                    foreach ($statuses as $status) {
                        $sql = "SELECT COUNT(*) as count FROM orders WHERE status = 'delivery failed'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $statusCounts[$status] = $row['count'];
                        } else {
                            die("Query failed: " . mysqli_error($conn));
                        }
                    }
                    foreach ($statusCounts as $status => $count) {
                        echo "<h2>$count</h2>";
                    }

                    mysqli_close($conn);
                    ?>
                    <p>Delivery Failed</p>
                    <a href="./order.php">See More</a>
                </div>
            </div>


            <!----------------------- part 2 ---------------------->


            <div class="container">
                <div class="box">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "orders";

                    $conn = mysqli_connect($servername, $username, $password, $database);

                    if (!$conn) {
                        die("Your database is not connected: " . mysqli_connect_error());
                    }
                    $sql = "Select * FROM `complaint`";
                    $result = mysqli_query($conn, $sql);
                    echo "<h2>" . mysqli_num_rows($result) . "</h2>";
                    mysqli_close($conn);
                    ?>
                    <p>Complaint</p>
                    <a href="./order.php">See More</a>
                </div>


                <div class="box">
                    <h2>1250 PKR</h2>
                    <p>Last Month PKR</p>
                    <a href="./order.php">See More</a>
                </div>


                <div class="box">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "orders";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Perform a SQL query to sum all the prices
                    $query = "SELECT SUM(price) AS total_price FROM orders";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $totalPrice = $row["total_price"];

                        // Display the total price in a separate section
                        if ($totalPrice !== null) {
                            echo "<h2>" . $totalPrice . " PKR </h2>";
                        } else {
                            echo "No results found.";
                        }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>



                    <p>Total Collected</p>
                    <a href="./order.php">See More</a>
                </div>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>