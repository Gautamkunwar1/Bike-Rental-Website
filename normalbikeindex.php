<?php
$con = mysqli_connect("localhost","root","","bike") or die("Can't Connect");
$sql = "SELECT * FROM normalbike ";
$result = mysqli_query($con, $sql) or die("QUERY FAILED");

if(mysqli_num_rows($result)>0){

    while($row = mysqli_fetch_assoc($result)){
?> 

<div>
    
<div>
    <img src="C:\xampp\htdocs\bike\images<?php echo $row['image']; ?>" alt="" height="200px" width="500px"><br><br>
    <h1>
        <?php echo $row['title']; ?>
    </h1>
    <br><br>
    <p>
        <?php echo $row['description']; ?>
    </p><br>
    <?php
    }
}
?>

</div>


</div>