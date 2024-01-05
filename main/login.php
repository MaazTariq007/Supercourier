<?php
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "Select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location:/courier/main/index.php");
    } else {
        $showError = "Invalid.";
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
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login now</title>
</head>

<body class="bg-primary">
    <!-- Alert  -->
    <!-- Alert  -->

    <div class="container-login text-light ">
        <h1 class="text-center">Login now</h1>

        <form action="/courier/main/login.php" method="post">
            <div class="form-group my-3">
                <label for="username">Enter Email</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group my-3 ">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn my-3">Login</button>

            <div class="buttons">
                <p>Don't have a account?</p><a href="/courier/main/signup.php">Signup Now</a>
            </div>

            <?php
            if ($login) {
                echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Seccuess -</strong> You are Logged In.
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