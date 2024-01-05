<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists = false;

    $existql = "SELECT * FROM `agent` WHERE username = '$username'";
    $result = mysqli_query($conn, $existql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        // $exists = true;
        $showError = "Username Already Exist.";
    } else {
        if (($password == $cpassword)) {
            $sql = "INSERT INTO `agent` (`username`, `password`, `date/time`) VALUES ('$username', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Password does not match or User ";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
    <title>Sign up</title>
</head>

<body class="bg-primary">
    <!-- Alert  -->

    <div class="container-signup text-light">
        <h1 class="text-center">sign up now</h1>

        <form action="/Supercourier/agent//signup.php" method="post">
            <div class="form-group">
                <label for="username">Enter Email</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>
            <div class="form-group my-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
            <div class="form-group my-3">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" placeholder="Password" name="cpassword" required>
                <small id="emailHelp" class="form-text text-muted">Match Your Above Password</small>

            </div>
            <button type="submit" class="btn my-3">SignUp</button>

            <div class="buttons">
                <a href="/Supercourier/agent/login.php">login</a>
            </div>


            <?php
            if ($showAlert) {
                echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !-</strong> Account has been created. Go to login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
            }
            if ($showError) {
                echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error -</strong> ' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
            }
            ?>
        </form>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>