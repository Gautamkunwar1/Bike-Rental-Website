<?php
    $con = mysqli_connect("localhost","root","","bike") or die("Can't Connect");
    $sql = "SELECT * FROM scootybooking ORDER BY 'sno' ASC  ";
    $result = mysqli_query($con, $sql) or die("QUERY FAILED");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Scooty Booking </title>
    <link rel="stylesheet" href="add.css">
</head>

<body>
   

    <div class="tab">
        <table border=2>
            <?php
                if(mysqli_num_rows($result)>0){
            ?>

            <tr>
                <th>sno</th>
                <th>name</th>
                <th>scooty </th>
                <th>days</th>
                <th>amount</th>
                <th>dl</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php  echo $row['sno']  ?> </td>
                <td><?php   echo $row['name']   ?> </td>
                <td><?php   echo $row['bname']   ?> </td>
                <td><?php   echo $row['days']   ?> </td>
                <td><?php   echo $row['amount']   ?> </td>
                <td><?php   echo $row['dl']   ?> </td>
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