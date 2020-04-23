<?php
include('db_connection.php');

session_start();
$error = '';




if (isset($_POST['submit'])) {

  if (empty($_POST['username']) || empty($_POST['password'])) {

  } else {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $school = $_POST['school'];

    $conn = OpenCon();


    $sql = "SELECT * FROM $school WHERE username ='$username' AND password = '$password'";


    $result = mysqli_query($conn, $sql) or die("bad");
    
    //sets $rows to 1 if user exists
    $rows = mysqli_num_rows($result);
    //gets users info
    $user = mysqli_fetch_assoc($result);

    if ($rows == 1) {
      $_SESSION['user'] = $username;
      if ($user["category"] == 0){
        header('location: http://users.aber.ac.uk/rhs24/MMP/StaffPage/StaffPage.php');
      } else if ($user["category"] == 1){
        header('location: http://users.aber.ac.uk/rhs24/MMP/GamePage/GamePage.html');
      }
    } else {
      echo 'incorrect';
    }

    CloseCon($conn);

  }
}
?>
