<?php


session_start();
?>
<?php
$error = '';
include('db_connection.php');



if (isset($_POST['submit'])) {

  if (empty($_POST['username']) || empty($_POST['password'])  || empty($_POST['school'])){

  } else {
//sets the $ variables to be what the user has entered within the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $school = $_POST['school'];
    $AdminSchool = $_POST['AdminSchool'];
    $conn = OpenCon();


    $sql = "SELECT * FROM $school WHERE username ='$username' AND password = '$password'";


    $result = mysqli_query($conn, $sql) or die("bad");

    //sets $rows to 1 if user exists
    $rows = mysqli_num_rows($result);
    //gets users info
    $user = mysqli_fetch_assoc($result);


    if ($rows == 1) {
      $_SESSION['user'] = $username;

echo $school;
        if ($school == "admin"){
          $_SESSION["school"] = $AdminSchool;
          $_SESSION["Admin"] = $school;
header('location: http://users.aber.ac.uk/rhs24/MMP/StaffPage/StaffPage.php');
        }
      else if ($user["category"] == 0){
    $_SESSION["school"] = $school;
        header('location: http://users.aber.ac.uk/rhs24/MMP/StaffPage/StaffPage.php');
      } else if ($user["category"] == 1){
            $_SESSION["school"] = $school;
        header('location: http://users.aber.ac.uk/rhs24/MMP/GamePage/GamePage.php');
      }
    } else {
      echo 'incorrect';
    }

    CloseCon($conn);

  }
}
?>
