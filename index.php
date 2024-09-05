<?php
// Start the session
session_start();

// Check if the user is not logged in
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    // Redirect to login page if not logged in
    header("Location:http://localhost/bike/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Kunwar Bike Rental Website</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="style.css" />
    <!-- Link to Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
</head>

<body>
    <?php
    // Include the header.php file
    include "header.php";
    // Display a welcome alert with the username
    echo '<script> alert("Welcome, ' . $_SESSION['username'] . '");</script>';
    ?>
    <div class="main"></div>
    <div class="hero" id="top">
        <span>Bike Rental Facility</span>
        <span>Now in Dehradun</span>
        <span>Are you ready to ride?</span>

    </div>
    <div class="separation"></div><br>
    <h1 class="heading">Bikes And Scooty Collection</h1>
    <div class="container">
        <!-- Link to the Super Bike list page -->
        <a href="AllSuperBikeList.php">
            <div class="card">
                <div class="image">
                    <!-- Image for Super Bike -->
                    <img src="images/superbike2.jpg" alt="Super Bike" height="500px" width="400px" /><br />
                    <span class="blk"><a href="#">Super Bike</a></span><br>
                    <span><a href="#">Starts from Rs.1500/-day</a></span>
                </div>
            </div>
        </a>

        <!-- Link to the Daily Use Bike list page -->
        <a href="AllBikeList.php">
            <div class="card">
                <div class="image">
                    <!-- Image for Daily Use Bike -->
                    <img src="images/dailybike.jpg" alt="Daily Use Bike" height="500px" width="400px" /><br />
                    <span class="blk"><a href="#">Daily Use Bike</a></span><br>
                    <span><a href="#">Starts from Rs.800/-day</a></span>
                </div>
            </div>
        </a>

        <!-- Link to the Scooty list page -->
        <a href="AllScootyList.php">
            <div class="card">
                <div class="image">
                    <!-- Image for Scooty -->
                    <img src="images/scooty.jpg" alt="Scooty" height="500px" width="400px" /><br />
                    <span class="blk"><a href="#">Scooty</a></span><br>
                    <span><a href="#">Starts from Rs.500/-day</a></span>
                </div>
            </div>
        </a>
    </div>
    <div>
        <?php
        // Include the footer.php file
        include "footer.php";
        ?>
    </div>
    <script>
    // script.js

document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');

    menuToggle.addEventListener('click', function () {
        navLinks.classList.toggle('active');
    });
});

    </script>
</body>

</html>
