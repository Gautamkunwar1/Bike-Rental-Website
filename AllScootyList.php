<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All title</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size:larger;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color:white;
        }
        .container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .imgbox {
            margin-right: 20px;
        }
        .imgbox img {
            height: 350px;
            width: 300px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .textbox {
            height: 350px;
            background-color: #333;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
       
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        h3 {
            margin-bottom: 10px;
            color: yellow !important;
        }
        span {
            display: block;
            margin-bottom: 5px;
        }
        button {
            padding: 10px 60px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    include "header.php";
    ?>
    <h1>Scooty List</h1>


    <?php
    $con = mysqli_connect("localhost", "root", "", "bike") or die("Can't Connect");
    $sql = "SELECT * FROM scooty";
    $result = mysqli_query($con, $sql) or die("QUERY FAILED");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="container1">
            <div class="imgbox">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
            </div>
            <div class="textbox">
                <h3> <?php echo $row['title']; ?></h3>
                <span>Brand: <?php echo $row['brand']; ?></span>
                <span>Type: <?php echo $row['type']; ?></span>
                <span>Rent: <?php echo $row['rent']; ?>/day</span>
                <span>Engine: <?php echo $row['engine']; ?> cc</span>
                <span>Mileage: <?php echo $row['mileage']; ?> kmph</span>
                <br>
                <a href="confirmationFormScooty.php?id=<?php echo $row['id']?>"><button>Book Now</button></a>
            </div>
        </div>
    <?php
        }
    }
    ?>
</body>
</html>
