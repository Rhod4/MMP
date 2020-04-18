<?php
include('db_connection.php');



$conn = OpenCon();

$sql = "SELECT * FROM `test`";


$result = mysqli_query($conn, $sql) or die("bad");

while($row=mysqli_fetch_assoc($result)){
    //fill array how to fill array that will look like bellow from database???
    $list = $row['username'];

}

echo($list);



CloseCon($conn);
?>