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
    <title>Super Courier | here to deliver</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="index.js"></script>
</head>

<body>
    <div class="background">
        <?php include 'partials/navbar.php'; ?>

        <div class="hero-section">
            <div class="hero headings">
                <h1>SuperCourier : Delivering Excellence Every Mile.</h1>
                <p>Your Super Solution for Swift and Secure Deliveries. From Local to Global, We Go the Extra Mile for You.</p>
            </div>
            <div class="hero hero-image"></div>
        </div>

        <div class="container search center">
            <h1>FIND YOUR ORDER</h1>
            <p>Put your tracking number in the search box given below and find your parcel status.</p>
            <form class="form-inline my-lg-0" action="index.php" method="post">
                <input type="text" for="orderno" name="orderno" id="orderno" required placeholder="Search Your Order Here">
                <button class="search-btn" type="submit" value="search">
                    <i class="fa fa-search"></i>
                </button>
            </form>

          
          
          <?php
        //   include 'config.php';


            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "orders";

            $conn = mysqli_connect($servername, $username, $password, $database);

            if (!$conn) {
                die("Your database is not connected: " . mysqli_connect_error());
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $orderno = $_POST["orderno"];

                // Perform a SQL query to retrieve the data for the given order number
                $query = "SELECT sender, price, status FROM orders WHERE orderno = '$orderno'";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='order-status'>
                                <div class='table order-number'>
                                    <span>Order no.</span>
                                    <p>" . $orderno . "</p>
                                </div>
                                <div class='table customer-name'>
                                    <span>Name</span>
                                    <p>" . $row["sender"] . "</p>
                                </div>
                                <div class='table customer-city'>
                                    <span>Price</span>
                                    <p>" . $row["price"] . "</p>
                                </div>
                                <div class='table Status'>
                                    <span>Status</span>
                                    <p>" . $row["status"] . "</p>
                                </div>
                            </div>";
                        }
                    }else {
                        echo "No results found for order number $orderno";
                    }
                } 
            } 

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>

        <div class="users">
            <div class="box box-1">
                <h2>Ship Anywhere, Anytime!</h2>
                <p>Sending a package is a breeze! Visit our shop to drop it off in person for a personal touch. Can't make it to us? No worries! We offer convenient pickup services right from your doorstep. Ship with ease—your way!</p>
                <a href="https://www.google.com/search?gs_ssp=eJzj4tTP1TcwLCiusFBgNGB0YPBiLkkuBgA1hwT8&q=tcs%20near%20Karachi&oq=tcs&gs_lcrp=EgZjaHJvbWUqEwgBEC4YgwEYxwEYsQMY0QMYgAQyBwgAEAAYjwIyEwgBEC4YgwEYxwEYsQMY0QMYgAQyDQgCEAAYgwEYsQMYgAQyDQgDEAAYgwEYsQMYgAQyDQgEEAAYgwEYsQMYgAQyEAgFEC4YxwEYsQMY0QMYgAQyEAgGEAAYgwEYsQMYyQMYgAQyCggHEAAYkgMYigUyDQgIEAAYgwEYsQMYigUyDQgJEAAYgwEYsQMYigXSAQgyMzkzajBqN6gCALACAA&sourceid=chrome&ie=UTF-8&llpgabe=CggvbS8wNGNqbg&ved=2ahUKEwi_hOOErPuBAxXuS_EDHWLABIIQ5ZgEKAB6BAgGEAA">Visit Shop</a>
            </div>
            <div class="box box-2">
                <h2>Suggest a Pickup Location!</h2>
                <p>Busy schedule? Let us handle the logistics! Schedule a pickup, and we'll collect your package from your doorstep.Seamless shipping without stepping out. Effortless and convenient—shipping made simple.</p>
                <a href="#">Open up</a>
            </div>
        </div>

        <div class="card-container">

            <div class="cards">
                <h4 class="card-heading">Swift Deliveries, Seamless Experience</h4>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> 🚚 Express Delivery.</p>
                </div>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> Swift and secure transportation.</p>
                </div>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> On-time delivery for documents and parcels.</p>
                </div>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> Reliable and efficient service.</p>
                </div>
            </div>
            <div class="cards">
                <h4 class="card-heading">Track & Trace in Real-Time</h4>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> 📲 Real-Time Tracking.</p>
                </div>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> Cutting-edge tracking system.</p>
                </div>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> Know the package location at all times.</p>
                </div>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> Follow your delivery from pick-up to drop-off.</p>
                </div>
            </div>
            <div class="cards">
                <h4 class="card-heading">Join Us - Become a Courier Agent</h4>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> 🌐 Join Our Team.</p>
                </div>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> Turn your love for driving into a rewarding career.</p>
                </div>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> Flexible schedules and cutting-edge technology.</p>
                </div>
                <div class="para-tick">
                    <i class="fa fa-check"></i>
                    <p class="card-para"> Shape the future of deliveries as a vital link in the logistics chain.</p>
                </div>
            </div>
        </div>

        <div class="container-fluid center agent">
            <h2>ARE YOU A SELLER?</h2>
            <h3>📦 Elevate Your Shipping Experience with Us! 📦</h3>
            <p>Sellers, optimize your shipping process with our seamless courier services.</p>
            <p> We offer swift and secure deliveries, real-time tracking, flexible pickup options, and dedicated support.</p>
            <p> Ready to revolutionize your shipping? Download the Seller and Courier Partner Form now!</p>
            <p>Fill the given form manually and send it to <a href="https://accounts.google.com/">SuperCourier@gmail.com</a> or visit our shop with the form.</p>
            <p>Note: after confirmation of the form , you will be provided a portal of our Courier.</p>
            <a href="form.pdf" download="form.pdf">
                <button class="secondary">Download File</button>
            </a>
        </div>

        <div id="map-container">
            <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224337.03758266617!2d-74.05775663422144!3d40.73887847235174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a37c1c50a9d%3A0x38c1a679162fc1b5!2sNew%20York%2C%20NY!5e0!3m2!1sen!2sus!4v1634132722575!5m2!1sen!2sus" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <footer class="text-center text-white secondary">
            <!-- Grid container -->
            <div class="container pt-4 ">
                <section class="col-md-6 footer-1">
                    <h3>SuperCourier</h3>
                    <p> Your Gateway to Effortless Deliveries. Connect with us for reliable and speedy courier services. We deliver satisfaction, one package at a time.</p>
                </section>
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg tm-1 " href="#!" role="button"><i class="fab fa-facebook-f link-btn"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg m-1" href="#!" role="button"><i class="fab fa-twitter link-btn"></i></a>
                    <!-- Google -->
                    <a class="btn btn-link btn-floating btn-lg m-1" href="#!" role="button"><i class="fab fa-google link-btn"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg m-1" href="#!" role="button"><i class="fab fa-instagram link-btn"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg m-1" href="#!" role="button"><i class="fab fa-linkedin link-btn"></i></a>
                    <!-- Github -->
                    <a class="btn btn-link btn-floating btn-lg m-1" href="#!" role="button"><i class="fab fa-github link-btn"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center text-light p-3 footer-2">
                © 2023 Copyright:
                <a class="text-light" href="#">SuperCourier.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>