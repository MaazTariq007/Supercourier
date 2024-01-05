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
    <!-- <link rel="stylesheet" href="staff.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="order.css">
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

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Agents</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">New Agent</button>
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

                $sql = "SELECT * FROM agents";
                $result = mysqli_query($conn, $sql);

                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Agents</th>
                            <th>CNIC</th>
                            <th>Address</th>
                            <th>Assign Area</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['sno'] ?></td>
                                <td><?php echo $row['agent'] ?></td>
                                <td><?php echo $row['CNIC'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['assign_area'] ?></td>
                                <td><?php echo $row['salary'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="Paris" class="tabcontent">
            <?php
            // database connection 
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "orders";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $agent = $_POST["agent"];
                $CNIC = $_POST["cnic"];
                $address = $_POST["address"];
                $assign_area = $_POST["assign"];
                $salary = $_POST["salary"];

                $conn = mysqli_connect($server, $username, $password, $database);
                if (!$conn) {
                    die("Error" . mysqli_connect_error());
                } else {
                    $sql = "INSERT INTO `agents` (`agent`, `CNIC`, `address`, `assign_area`,`salary`) VALUES ('$agent', '$CNIC', '$address','$assign_area','$salary')";
                    $result = mysqli_query($conn, $sql);
                }

                if ($result) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Agent has been successfully Created!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Agent has been successfully Created!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
                }
            }


            ?>

            <div class="container mb-4">
                <h1 class="text-center">New Agent</h1>
                <!-- <form method="post" action="./staff.php"> -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Agent Name:</label>
                        <input type="text" class="form-control" id="agnet" name="agent" placeholder="Agent Name" required>
                    </div>
                    <div class="form-group">
                        <label for="trackingNumber">CNIC:</label>
                        <input type="text" class="form-control" id="cnic" name="cnic" placeholder="Enter CNIC Number" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address:</label>
                        <textarea type="text" name="address" class="form-control" id="address" placeholder="Enter Address Number" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Assign Area:</label>
                        <input type="text" name="assign" class="form-control" id="assign" placeholder="Enter Assign Area" required></input>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address:</label>
                        <input type="text" name="salary" class="form-control" id="salary" placeholder="Enter Salary" required></input>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
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