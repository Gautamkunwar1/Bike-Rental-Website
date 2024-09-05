<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All SuperBike</title>
    <style>
        /* Basic styling for the body */
        body {
            font-family: Arial, sans-serif;
            font-size: larger;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: white;
        }
        /* Styling for the container holding the image and text */
        .container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        /* Styling for the image container */
        .imgbox {
            margin-right: 20px;
        }
        /* Styling for the image */
        .imgbox img {
            height: 350px;
            width: 400px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Styling for the text container */
        .textbox {
            height: 350px;
            background-color: #333;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Styling for the heading */
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        /* Styling for subheadings */
        h3 {
            margin-bottom: 10px;
            color: yellow !important;
        }
        /* Styling for span elements */
        span {
            display: block;
            margin-bottom: 5px;
        }
        /* Styling for the button */
        button {
            padding: 10px 60px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        /* Styling for the button on hover */
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    // Include the header.php file
    include "header.php";
    ?>
    <h1>Bike List</h1>

    <?php
    // Connect to the database
    $con = mysqli_connect("localhost", "root", "", "bike") or die("Can't Connect");
    // SQL query to select all rows from the 'super' table
    $sql = "SELECT * FROM super";
    // Execute the query
    $result = mysqli_query($con, $sql) or die("QUERY FAILED");

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and display the bike information dynamically
        while ($row = mysqli_fetch_assoc($result)) { 
    ?>
        <div class="container1">
            <div class="imgbox">
                <!-- Display the bike image -->
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
            </div>
            <div class="textbox">
                <h3><?php echo $row['title']; ?></h3>
                <span>Brand: <?php echo $row['brand']; ?></span>
                <span>Type: <?php echo $row['type']; ?></span>
                <span>Rent: <?php echo $row['rent']; ?>/day</span>
                <span>Engine: <?php echo $row['engine']; ?> cc</span>
                <span>Mileage: <?php echo $row['mileage']; ?> kmph</span>
                <br>
                <a href="confirmationFormSuper.php?id=<?php echo $row['id']; ?>&title=<?php echo urlencode($row['title']); ?>"><button>Book Now</button></a>

            </div>
        </div>
    <?php
        }
    }
    ?>
</body>
</html>
