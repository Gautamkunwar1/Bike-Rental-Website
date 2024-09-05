<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation form</title>
    <!-- Inline CSS for styling the form and the body -->
    <style>
    body {
        background: url(loginImage.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        font-family: Arial, sans-serif;
        display: flex;
        margin: 0;
        padding-top: 10px;
        justify-content: center;
        align-items: center;
    }

    form {
        background-color: rgba(255, 255, 255, 0.397);
        border: 2px solid black;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        height: 100vh;
    }

    h1 {
        text-align: center;
        color: yellow;
    }

    label {
        display: block;
        margin-top: 10px;
        color: rgb(126, 0, 52);
        text-align: center;
        font-weight: bolder;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"] {
        width: 90%;
        padding: 15px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="text"]::placeholder,
    input[type="number"]::placeholder,
    input[type="file"]::placeholder {
        font-weight: bold;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <?php
    // Connect to the database
    $con = mysqli_connect("localhost", "root", "", "bike") or die("Can't Connect");
    $id = $_GET["id"];
    // Query to select data from super table
    $sql = "select title,rent from scooty where id={$id} ";
    $result = mysqli_query($con, $sql) or die("QUERY FAILED");

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        if($row = mysqli_fetch_assoc($result)) {
    ?>
    <!-- Form to capture user details for bike rental -->
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <h1>Detail form</h1>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your full name" required><br>
        <label for="bname">Bike/Scooty Name</label>
        <!-- Displaying bike/scooty name from the database, but disabling the field to prevent editing -->
        <input type="text" name="bname" id="bname" value="<?php echo $row['title']?>"
            placeholder="Enter bike/scooty name" required  disabled><br>
        <label for="rent">Rent/day</label>
        <!-- Displaying rent from the database, but disabling the field to prevent editing -->
        <input type="number" name="rent" id="rent" value="<?php echo $row['rent']?>" placeholder="Enter rent per day"
            required disabled><br>
        <label for="days">No. of days</label>
        <input type="number" name="days" id="days" placeholder="Enter number of days" required><br>
        <label for="total">Total amount</label>
        <!-- Total amount is calculated and displayed, read-only to prevent editing -->
        <input type="number" name="total" id="total" placeholder="Total amount is" required readonly><br>
        <label for="dl">Enter DL</label>
        <!-- Field to upload driving license -->
        <input type="file" name="dl" id="dl" required><br>
        <input type="submit" value="Redirect to payment gateway" name="submit">
    </form>
    <?php
        }
    }
?>

    <?php

if (isset($_FILES['dl'])) {

        
        $file_name = $_FILES['dl']['name'];
        $file_size = $_FILES['dl']['size'];
        $file_temp = $_FILES['dl']['tmp_name'];
        $file_type = $_FILES['dl']['type'];
    
        // separate extension to file ext.
        $tmp = explode('.', $file_name);
        // explode: break down filename after dot and save to extension.
        $file_ext =  strtolower(end($tmp));
    
        $extension = array('jpg', 'png', 'jpeg');
        $error = array();
    
        if (in_array($file_ext, $extension) == false) {
            $error[] = "Invalid File format .. please upload jpg/png/jpeg.";
            echo "<h1> Invalid File format please upload jpg/png/jpeg.</h1>";
        }
    
        if ($file_size > 4097152) {
            $error[] = "Upload file less than 4mb.";
            echo "Upload file less than 4mb.";
        }
        $new_name = time()."-".basename($file_name);;
        $dlpic = 'dl/'.$new_name; // Generate unique file name
    
        if (empty($error) == true) {
    
            move_uploaded_file($file_temp, $dlpic);

                $name = mysqli_real_escape_string($con, $_POST['name']);
                $days = mysqli_real_escape_string($con, $_POST['days']);
                $amount = mysqli_real_escape_string($con, $_POST['total']);
               // $bname= mysqli_real_escape_string($con, $_POST['bname']);
               $id1 = $_GET["id"];
               $demo = urldecode($_GET['title']);
                
    
                $sql1 = "INSERT INTO `scootybooking` (`name`, `bname`,`days`, `amount`,`dl`) 
                        VALUES ('{$name}', '{$demo}' ,'{$days}','{$amount}', '{$dlpic}')";
    
                if (mysqli_query($con, $sql1)) {
                   header("Location:http://localhost/bike/paymentgateway.php");
                } 
                else {
                    echo "Query Failed";
                }
            }  
        } 
       
    ?>

    <!-- JavaScript to calculate total amount based on rent and number of days -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const rentInput = document.getElementById('rent');
        const daysInput = document.getElementById('days');
        const totalInput = document.getElementById('total');

        function calculateTotal() {
            const rent = parseFloat(rentInput.value) || 0;
            const days = parseFloat(daysInput.value) || 0;
            totalInput.value = rent * days;
        }

        rentInput.addEventListener('input', calculateTotal);
        daysInput.addEventListener('input', calculateTotal);
    });
    </script>
</body>

</html>