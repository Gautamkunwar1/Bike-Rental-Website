<?php
    $con = mysqli_connect("localhost","root","","bike") or die("Can't Connect");
    $sql = "SELECT * FROM user22 ORDER BY 'sno' ASC  ";
    $result = mysqli_query($con, $sql) or die("QUERY FAILED");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="add.css">
</head>

<body>
   

    <div class="tab">
        <table border=2>
            <?php
                if(mysqli_num_rows($result)>0){
            ?>

            <tr>
                <th>id</th>
                <!-- <th>First name</th>
                <th>Last name</th> -->
                <th>user name</th>
                <th>Password</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php  echo $row['sno']  ?> </td>
                <!-- <td><?php  echo $row['fname']  ?> </td>
                <td><?php   echo $row['lname']   ?> </td> -->
                <td><?php   echo $row['uname']   ?> </td>
                <td><?php   echo $row['password']   ?> </td>
            </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
    <div class="button">
        <a href="admin.php"><button>Back to admin panel</button></a>
    </div>
</body>

</html>