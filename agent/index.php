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
    <title>SuperCourier | Agent Panel</title>
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
                <a href="./new.php" class="nav-link">
                    <i class='fa fa-shopping-bag icons'></i>
                    <span class="link-text">New Order</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="./order.php" class="nav-link">
                    <i class='fa fa-bar-chart icons'></i>
                    <span class="link-text">Orders</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="./staff.php" class="nav-link">
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
        </ul>
    </nav>
    <div class="top-bar">
        <h2>Agent Dashborad</h2>
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
                    <p>Pending</p>
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

                    // Print the counts
                    foreach ($statusCounts as $status => $count) {
                        echo "<h2>$count</h2>";
                    }

                    mysqli_close($conn);
                    ?>
                    <p>Delivery Failed</p>
                    <a href="./order.php">See More</a>
                </div>

            </div>

            <div class="bottom-part">
                <div class="container-two">
                    <div class="price-details">
                        <div class="price-section">
                            <div class="price-box">
                                <h2>12,357 PKR</h2>
                                <p>Total Collected</p>
                                <a href="#">See More</a>
                            </div>
                            <div class="price-box">
                                <h2>231,124 PKR</h2>
                                <p>Total Purse</p>
                                <a href="#">See More</a>
                            </div>
                        </div>
                        <div class="staff-section">
                            <div class="price-box">
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $database = "orders";

                                $conn = mysqli_connect($servername, $username, $password, $database);

                                if (!$conn) {
                                    die("Your database is not connected: " . mysqli_connect_error());
                                }
                                $sql = "Select * FROM `agents`";
                                $result = mysqli_query($conn, $sql);
                                echo "<h2>" . mysqli_num_rows($result) . "</h2>";
                                mysqli_close($conn);
                                ?>
                                <p>Total Agents</p>
                                <a href="./staff.php">See More</a>
                            </div>
                            <div class="price-box">
                                <h2>28</h2>
                                <p>Total Vihicles</p>
                                <a href="#">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="calendar">
            <div class="calendar-wrapper">
                <button id="btnPrev" type="button">Prev</button>
                <button id="btnNext" type="button">Next</button>
                <div id="divCal"></div>
            </div>
        </div>
    </main>
    <script src="index.js"></script>
</body>

</html>