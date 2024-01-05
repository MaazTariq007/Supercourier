<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SuperCourier | Agent Panel</title>
    <link rel="stylesheet" href="new.css">
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
            <a href="/Supercourier/agent/logout.php">
                <i class="fa fa-sign-out"></i> LOGOUT
            </a>
        </button>
    </div>
    <main>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "orders";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Your database is not connected: " . mysqli_connect_error());
        }

        function generateOrderNumber()
        {
            $timestamp = time();
            $orderNumber = "PK" . sprintf("%012d", $timestamp);
            return $orderNumber;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $orderNumber = generateOrderNumber();
            $address = $_POST["address"];
            $receiver = $_POST["receiver"];
            $price = $_POST["price"];
            $weight = $_POST["weight"];
            $status = "pending";

            $sql = "INSERT INTO orders (sender, orderno, address, receiver, price, weight, status)
        VALUES ('$name', '$orderNumber', '$address', '$receiver', '$price', '$weight', '$status')";

            if (mysqli_query($conn, $sql)) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Order Has Been Successfully Created</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>
        <div class="container">
            <h2 class="text-center">New Order</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                Name: <input class="form-control" type="text" name="name" placeholder="Enter Sender Name" required><br>
                Address: <input class="form-control" type="text" name="address" placeholder="Enter Receiver Address" required><br>
                Receiver: <input class="form-control" type="text" name="receiver" placeholder="Enter Receiver Name" required><br>
                Price: <input class="form-control" type="number" name="price" placeholder="Enter Price" required><br>
                Weight: <input class="form-control" type="text" name="weight" placeholder="Enter weight in KG" required><br>
                <input type="hidden" name="status" value="pending">
                <input type="submit" class="btn btn-primary mt-2" value="Submit Order">
            </form>
        </div>
    </main>
</body>

</html>

<?php
mysqli_close($conn);
?>
</main>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>