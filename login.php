<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Link to external CSS file for styling the login page -->
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php
    // Include the header2.php file
    include 'header2.php';
    ?>
    <div class="contact">
        <div class="formbox">
            <h1>LOGIN FORM</h1><br>
            <!-- Login form -->
            <form action="" method="post" autocomplete="off">
                <!-- Username input field -->
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Enter your Username" required><br>
                <!-- Password input field -->
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your Password" required><br>
                <!-- Link for forgot password (currently not functional) -->
                <a href="" class="link">Forget password</a><br><br>
                <!-- Submit button for the login form -->
                <input type="submit" value="Login" name="submit"><br><br>
                <!-- Link to sign up page for new users -->
                <p>Don't have an account? <a href="signup.php" class="signlink">Sign up</a></p>
            </form>
            <?php
            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "bike");

            // Check if the submit button is clicked
            if (isset($_POST['submit'])) {
                // Get the username and password from the form
                $username = $_POST["username"];
                $password = $_POST["password"];
                
                // Query to check if the user exists in the database
                $sql = "SELECT * FROM user22 WHERE uname = '$username' AND password = '$password'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);

                 if ($username == "gautam" && $password == "kunwar") {
                    // Redirect to the admin page
                    header("Location:http://localhost/bike/admin.php");
                }


                // Check if there is one matching row
                 else if ($num == 1) {
                    // Start the session and set session variables
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    // Redirect to the main page
                    header("Location:http://localhost/bike/index.php");
                } 
                // Check for specific admin credentials
                
                else {
                    // Display an error message for invalid credentials
                    echo '<span>invalid credentials</span>';
                }
            } 
            ?>
        </div>
    </div>
</body>

</html>
