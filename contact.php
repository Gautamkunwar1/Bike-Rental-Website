<?php
include "header.php";
?>
<html>

<head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="contact">
        <br>
        <div class="formbox">
            <h2 style="text-align:center">Contact us</h2>
            <form action="" method="post">
                Name:<input type="text" placeholder="Enter your name" name="uname"><br>
                Email:<input type="email" placeholder="Enter your e-mail" name="email"><br>
                Message:<textarea placeholder="Enter Message" name="msg"></textarea><br>
                <input type="submit" value="Submit" name="submit">
            </form>
            <?php
            $con = mysqli_connect("localhost", "root", "", "bike") or die("Can't Connect");
            if (isset($_POST['submit'])) {
                $uname = $_POST["uname"];
                $email = $_POST["email"];
                $msg = $_POST["msg"];

                $sql = "INSERT INTO `contact`( `name`, `email`, `message`) VALUES ('$uname','$email','$msg')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo "Message sent successfully.";
                } else {
                    echo "Error sending message.";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>
