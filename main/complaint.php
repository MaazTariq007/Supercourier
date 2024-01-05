<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="complaint.css">
    <title>Super Courier | Complaint</title>
</head>

<body>
    <?php include 'partials/navbar.php'; ?>

    <?php
    // database connection 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "orders";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST["email"];
        $tracking = $_POST["track"];
        $concerns = $_POST["concern"];

        $conn = mysqli_connect($server, $username, $password, $database);
        if (!$conn) {
            die("Error" . mysqli_connect_error());
        }

        $checktracking = mysqli_query($conn, "SELECT * FROM `orders` WHERE `orderno` = '$tracking'");

        if (mysqli_num_rows($checktracking) == 0) {
            $invalid = "Tracking ID is invalid";
        } else {


            $sql = "INSERT INTO `complaint` (`Email`, `Tracking`, `Concern`, `date`) VALUES ('$email', '$tracking', '$concerns', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your complaint has been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Your complaint has not been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
            }
        }
    }


    ?>

    <div class="container complain-box">
        <h1 class="text-center">COMPLAINT FORM</h1>
        <form method="post" action="complaint.php">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="form-group">
                <label for="trackingNumber">Tracking Number:</label>
                <input type="text" class="form-control" id="track" name="track" placeholder="Enter tracking number" required>
                <p class="text-danger mt-1"><?php echo @$invalid; ?></p>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Concern:</label>
                <textarea type="text" name="concern" class="form-control" id="concern" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
        <p>You will recieve an Email at your given email about the following issue.</p>
        <p>We will do oue best to resolve any problems regarding any issues as soon as possible.</p>
        <p>For further querry Email us directly at SuperCourier@gmail.com or contact us 021 36 34 2312.</p>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>