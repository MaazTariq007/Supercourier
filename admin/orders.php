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
    <link rel="stylesheet" href="orders.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min .css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">All Orders</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Pending</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Shipped</button>
            <button class="tablinks" onclick="openCity(event, 'karachi')">Delivery Failed</button>


        </div>

        <div id="London" class="tabcontent">
            <div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "orders";

                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Your database is not connected: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM orders";
                $result = mysqli_query($conn, $sql);

                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Order Number</th>
                            <th>Address</th>
                            <th>Receiver</th>
                            <th>Pirce</th>
                            <th>Weight</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['sender'] ?></td>
                                <td><?php echo $row['orderno'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['receiver'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['weight'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-primary">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="Paris" class="tabcontent">
            <div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "orders";

                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Your database is not connected: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM orders where status ='pending'";
                $result = mysqli_query($conn, $sql);

                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Order Number</th>
                            <th>Address</th>
                            <th>Receiver</th>
                            <th>Pirce</th>
                            <th>Weight</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['sender'] ?></td>
                                <td><?php echo $row['orderno'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['receiver'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['weight'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-primary">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="Tokyo" class="tabcontent">
            <div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "orders";

                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Your database is not connected: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM orders where status ='shipped'";
                $result = mysqli_query($conn, $sql);

                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Order Number</th>
                            <th>Address</th>
                            <th>Receiver</th>
                            <th>Pirce</th>
                            <th>Weight</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['sender'] ?></td>
                                <td><?php echo $row['orderno'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['receiver'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['weight'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-primary">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <div id="karachi" class="tabcontent">
            <div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "orders";

                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Your database is not connected: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM orders where status ='delivery failed'";
                $result = mysqli_query($conn, $sql);

                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Order Number</th>
                            <th>Address</th>
                            <th>Receiver</th>
                            <th>Pirce</th>
                            <th>Weight</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['sender'] ?></td>
                                <td><?php echo $row['orderno'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['receiver'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['weight'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-primary" >Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>




    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        let table = new DataTable('.table');
    </script>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

</body>

</html>