
<?php



session_start();
$error='';
if (isset($_POST['submit'])) {

  if (empty($_POST['username']) || empty($_POST['password'])) {

  }
  else
  {

    $username = $_POST['username'];
    $password = $_POST['password'];




    $dbhost = "db.dcs.aber.ac.uk";
    $dbuser = "rhs24";
    $dbpass = "rhodri18";
    $db = "cs39440_19_20_rhs24";
    echo "submitAAAAAAA";
    $conn = new mysqli_connect($dbhost, $dbuser, $dbpass, $db);
        echo "fffff";
    if (!$conn) {
      echo "bad";
    } else{echo "good";}
    echo "goooood";



    $sql ="select * from test where username ='$username' and type = '$password'"
    or die("Connection failed: " . mysqli_connect_error());

    $row = mysql_num_rows($sql);
    if ($row ==1){
      $_SESSION['user']=$username;
      header('location: GamePage.html');

    }else{ echo 'You have entered valid use name and password';
    }
    mysql_close($conn); // Closing Connection
  }
}
?>
