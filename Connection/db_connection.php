
  <?php
  // Include config file

  $dbhost = "db.dcs.aber.ac.uk";
  $dbuser = "rhs24";
  $dbpass = "rhodri18";
  $db = "cs39440_19_20_rhs24";
  $conn = new mysqli_connect($dbhost, $dbuser, $dbpass,$db);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  // $query = "SELECT * FROM `test";

function test(){

global $conn;

  $sql = "SELECT * FROM `test`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "name: " . $row["name"]. " - type: " . $row["type"]. " " . $row["date"]. "<br>";
    }
} else {
    echo "0 results";
}
}


function func1($param1, $param2)
 {
     echo $param1 . ', ' . $param2;
 }


 <?php
 function login(){

// Set session variables
$_SESSION["userName"] = document.getElementById("iD").value;
$_SESSION["password"] = document.getElementById("password").value;
echo "Session variables are set.";
?>
<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["userName"] . ".<br>";
echo "Favorite animal is " . $_SESSION["password"] . ".";
}
?>



  $conn->close();

  ?>
