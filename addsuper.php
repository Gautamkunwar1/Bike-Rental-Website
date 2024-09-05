<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Super Bike</title>
    <!-- Linking external CSS for styling -->
    <link rel="stylesheet" href="add.css">
</head>

<body>
    <?php
    // Include the header2.php file
    include "header2.php";
    ?>
    <!-- Section header with a title -->
    <div class="head center">
        <h1>
            <span class="white"> Add Super Bike</span>
        </h1>
    </div>
    <!-- Main content section containing the form -->
    <div class="main">
        <!-- Form for adding a super bike, using POST method and multipart/form-data for file upload -->
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title" class="label">Title</label>
            <input type="text" name="title" class="input-field" required>
            <br><br>

            <label for="brand" class="label">Brand</label>
            <input type="text" name="brand" class="input-field" required>
            <br><br>

            <label for="type" class="label">Type</label>
            <input type="text" name="type" class="input-field" required>
            <br><br>

            <label for="rent" class="label">Rent</label>
            <input type="text" name="rent" class="input-field" required>
            <br><br>

            <label for="engine" class="label">Engine</label>
            <input type="text" name="engine" class="input-field" required>
            <br><br>

            <label for="mileage" class="label">Mileage</label>
            <input type="text" name="mileage" class="input-field" required>
            <br><br>
            
            <label for="img_upload" class="label">Image</label>
            <input type="file" name="img_upload" class="file-field" required>
            <br><br>

            <input type="submit" value="Submit" class="submit-button">
        </form>
        <?php
        // Establish a connection to the database
        $con = mysqli_connect("localhost", "root", "", "bike") or die("Can't Connect");

        // Check if the file has been uploaded
        if (isset($_FILES['img_upload'])) {
            $file_name = $_FILES['img_upload']['name'];
            $file_size = $_FILES['img_upload']['size'];
            $file_temp = $_FILES['img_upload']['tmp_name'];
            $file_type = $_FILES['img_upload']['type'];

            // Separate the extension from the file name
            $tmp = explode('.', $file_name);
            $file_ext = end($tmp);

            // Define allowed file extensions
            $extension = array('jpg', 'png', 'jpeg');
            $error = array();

            // Validate file extension
            if (in_array($file_ext, $extension) == false) {
                $error[] = "Invalid File format .. please upload jpg/png/jpeg.";
                echo "<h1> Invalid File format please upload jpg/png/jpeg.</h1>";
            }

            // Validate file size
            if ($file_size > 4097152) {
                $error[] = "Upload file less than 4mb.";
                echo "Upload file less than 4mb.";
            }

            // If no errors, proceed with file upload and database insertion
            if (empty($error) == true) {
                // Generate a unique file name
                $time = 'upload/' . time() . '.' . $file_ext;

                // Move the uploaded file to the desired directory
                if (move_uploaded_file($file_temp, $time)) {
                    // Sanitize form inputs
                    $title = mysqli_real_escape_string($con, $_POST['title']);
                    $brand = mysqli_real_escape_string($con, $_POST['brand']);
                    $type = mysqli_real_escape_string($con, $_POST['type']);
                    $rent = mysqli_real_escape_string($con, $_POST['rent']);
                    $engine = mysqli_real_escape_string($con, $_POST['engine']);
                    $mileage = mysqli_real_escape_string($con, $_POST['mileage']);

                    // Insert data into the database
                    $sql = "INSERT INTO `super` (`title`, `brand`, `type`, `rent`, `engine`, `mileage`, `image`) 
                            VALUES ('{$title}', '{$brand}', '{$type}', '{$rent}', '{$engine}', '{$mileage}', '{$time}')";

                    // Check if the query was successful
                    if (mysqli_query($con, $sql)) {
                        // Redirect to another page after successful insertion
                        header("Location: http://localhost/bike/allsuperbike.php");
                    } else {
                        echo "Query Failed";
                    }
                } else {
                    echo "Failed to upload file.";
                }
            } else {
                echo "File not selected.";
                die();
            }
        }
        ?>
    </div>
</body>

</html>
