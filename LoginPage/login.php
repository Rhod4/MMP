<?php
include db_connection.php;

session_start();
$error = '';




if (isset($_POST['submit'])) {

    if (empty($_POST['username']) || empty($_POST['password'])) {

    } else {

        $username = $_POST['username'];
        $password = $_POST['password'];


        $conn = OpenCon();


        $sql = "SELECT * FROM `test` WHERE username ='$username' AND password = '$password'";


        $result = mysqli_query($conn, $sql) or die("bad");

        $rows = mysqli_num_rows($result);


        if ($rows == 1) {

            $_SESSION['user'] = $username;

            header('location: http://users.aber.ac.uk/rhs24/MMP/StaffPage/StaffPage.html');

        } else {
            echo 'incorrect';
        }
      
        CloseCon($conn);

    }
}






?>
