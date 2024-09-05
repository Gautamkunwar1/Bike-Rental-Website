<?php
    $con = mysqli_connect("localhost","root","","bike") or die("Can't Connect");
    $sql = "SELECT * FROM scooty ORDER BY 'id' ASC  ";
    $result = mysqli_query($con, $sql) or die("QUERY FAILED");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> All Scooty Table</title>
    <link rel="stylesheet" href="add.css">
</head>

<body>
    <div class="tab">
        <table border=2>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Brand</th>
                <th>Type</th>
                <th>Rent</th>
                <th>Engine</th> 
                <th>Mileage</th> 
                <th>Image</th>
            </tr>
            <?php
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    ?>
            <tr>
                <td><?php  echo $row['id']  ?> </td>
                <td><?php  echo $row['title']  ?> </td>
                <td><?php   echo $row['brand']   ?> </td>
                <td><?php   echo $row['type']   ?> </td>
                <td><?php   echo $row['rent']   ?> </td>
                <td><?php   echo $row['engine']   ?> </td>
                <td><?php   echo $row['mileage']   ?> </td>
                <td><?php   echo $row['image']   ?> </td>
            </tr>
            <?php
                }
            }
            ?>
           
        </table>
    </div>
    <div class="button">
        <a href="addscooty.php"><button>Add More scooty</button></a>
        <a href="admin.php"><button>Back to admin panel</button></a>
    </div>
</body>

</html>