<?php


session_start();
?>
<?php
$error = '';
    include('../../Connection/db_connection.php');



if (isset($_POST['submit'])) {

  if (empty($_POST['username']) || empty($_POST['password'])  || empty($_POST['school'])){
    $_SESSION["incorrect"] = 1;
  } else {
    //sets the $ variables to be what the user has entered within the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $school = $_POST['school'];
    $AdminSchool = $_POST['AdminSchool'];
    $conn = OpenCon();


  $username = trim($username, " \$\*\=");
$password = trim($password, " \$\*\=");
$school = trim($school, " \$\*\=");
$AdminSchool = trim($AdminSchool, " \$\*\=");

    $sql = "SELECT * FROM $school WHERE username ='$username'";

    $result = mysqli_query($conn, $sql) or die($_SESSION["incorrect"] = 1 + header('location: http://users.aber.ac.uk/rhs24/MMP/LoginPage/index.php'));

    //gets the number of rows that equal the sql query
    $rows = mysqli_num_rows($result);
    //gets users info that are in the rows, e.g. username and password
    $user = mysqli_fetch_assoc($result);


    if ($rows == 1) {
      //checks if the password is equal to the hashed password
      if(password_verify($password,$user['password'])){

        $_SESSION['user'] = $username;

        if ($school == "admin" || $user["category"] == 2){
          if ($school == "admin"){
            $_SESSION["school"] = $AdminSchool;
          }
          else{
            $_SESSION["school"] = $school;
          }
          $_SESSION["Admin"] = "admin";
              $_SESSION["accountType"] = $user["category"];
          header('location: http://users.aber.ac.uk/rhs24/MMP/StaffPage/index.php');
        }
        else if ($user["category"] == 0){
          $_SESSION["school"] = $school;
          $_SESSION["Admin"] = "";
          $_SESSION["accountType"] = $user["category"];
          header('location: http://users.aber.ac.uk/rhs24/MMP/StaffPage/index.php');

        } else if ($user["category"] == 1){
          $_SESSION["school"] = $school;
          $_SESSION["accountType"] = $user["category"];
          header('location: http://users.aber.ac.uk/rhs24/MMP/GamePage/index.php');
        }
      } else {
        $_SESSION["incorrect"] = 1;
        header('location: http://users.aber.ac.uk/rhs24/MMP/LoginPage/index.php');
      }} else {
    $_SESSION["incorrect"] = 1;
    header('location: http://users.aber.ac.uk/rhs24/MMP/LoginPage/index.php');
      }

      CloseCon($conn);
    }
  }
else if(isset($_POST['guest'])){
$_SESSION["school"] = "guest";
$_SESSION['user'] = "guest";
$_SESSION["accountType"] = 1;
  header('location: http://users.aber.ac.uk/rhs24/MMP/GamePage/index.php');
}


  ?>
