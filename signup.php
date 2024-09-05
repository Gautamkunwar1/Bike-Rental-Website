<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php include 'header2.php'; ?>
    <div class="contact">
        <div class="formbox">
            <h1>Sign Up</h1>
            <form action="" method="post" >
                <label for="username">Name</label>
                <input type="text" name="username" id="username" placeholder="Username" required><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="pass" placeholder="Password" required><br>
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="conpass" placeholder="Confirm Password" required><br>
                <input type="submit" value="Sign up" name="Signup"><br>
                <p>or</p>
                <button>Sign In with Google</button><br><br>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </form>

            <?php
            $conn = mysqli_connect("localhost", "root", "", "bike");
            if (isset($_POST['Signup'])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $cpassword = $_POST["cpassword"];

                if ($password == $cpassword) {
                    $sql = "INSERT INTO user22 (uname, password) VALUES ('$username', '$password')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                       header("Location:http://localhost/bike/login.php");
                    } else {
                        echo '<span>Failed to create user</span>';
                    }
                } else {
                    echo '<span>Passwords do not match</span>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
