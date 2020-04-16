<?php

session_start();
$error = '';

if (isset($_POST['submit'])) {

    if (empty($_POST['username']) || empty($_POST['password'])) {

    } else {

        $username = $_POST['username'];
        $password = $_POST['password'];


        $conn = OpenCon();

        echo " conn ";
        $sql = "SELECT * FROM `test` WHERE username ='$username' AND password = '$password'";

        echo " sql ";
        $result = mysqli_query($conn, $sql) or die("bad");

        $rows = mysqli_num_rows($result);

        echo " row ";
        if ($rows == 1) {

            $_SESSION['user'] = $username;
            echo 'ok';
            header('location: http://users.aber.ac.uk/rhs24/MMP/');

        } else {
            echo 'incorrect';
        }
        echo " close ";
        CloseCon($conn);

    }
}

function OpenCon()
{

    $dbhost = "db.dcs.aber.ac.uk";
    $dbuser = "rhs24";
    $dbpass = "rhodri18";
    $db = "cs39440_19_20_rhs24";


    $conn = mysqli_connect("db.dcs.aber.ac.uk", $dbuser, "rhodri18", "cs39440_19_20_rhs24");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (!$conn) {
        echo "bad";
    } else {
        echo " good ";
    }
    return $conn;
}


function CloseCon($conn)
{
    $conn->close();
}

?>
