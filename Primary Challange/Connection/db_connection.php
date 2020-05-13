
  <?php


//opens the connection to the database
  function OpenCon()
  {
      $dbhost = "db.dcs.aber.ac.uk";
      $dbuser = "rhs24";
      $dbpass = "rhodri18";
      $db = "cs39440_19_20_rhs24";


      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      if (!$conn) {

      } else {

      }
      return $conn;
  }

//closes the connection to the database
  function CloseCon($conn)
  {
      $conn->close();
  }


  ?>
