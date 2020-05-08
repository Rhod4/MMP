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





    $sql = "SELECT * FROM $school WHERE username ='$username'";

    $result = mysqli_query($conn, $sql) or die(header('location: http://users.aber.ac.uk/rhs24/MMP/LoginPage/BasePage.php'));

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
          header('location: http://users.aber.ac.uk/rhs24/MMP/StaffPage/StaffPage.php');
        }
        else if ($user["category"] == 0){
          $_SESSION["school"] = $school;
          $_SESSION["Admin"] = "";
          header('location: http://users.aber.ac.uk/rhs24/MMP/StaffPage/StaffPage.php');
        } else if ($user["category"] == 1){
          $_SESSION["school"] = $school;
          header('location: http://users.aber.ac.uk/rhs24/MMP/GamePage/GamePage.php');
        }
      }} else {
        echo 'incorrect';
      }

      CloseCon($conn);
    }
  }
  ?>
