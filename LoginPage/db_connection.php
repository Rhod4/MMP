
  <?php
  // Include config file


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
  // $query = "SELECT * FROM `test";









  $conn->close();

  ?>
