<?php
session_start();

if ($_SESSION['school'] == null || $_SESSION["accountType"] == 1){

header('location:  http://users.aber.ac.uk/rhs24/MMP/LoginPage/index.php');
}
?>
<!DOCTYPE HTML>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="StaffPageStyle.css">
<link rel = "stylesheet" href="../MainCSS/MainCSS.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

  <title>Primary Challenge</title>
</head>
<body>

  <div id="TitleBar">
    <h1 id="TitleText">Primary Challenge</h1>
  </div>

  <div id="Table">
    <h1 id="TableText"></h1>

    <div id="Students">
      <h1 id="StudentNames"></h1>

      <table id="StudentDataBase" class="display">
        <thead>
          <th>number</th>
          <th>Name</th>

          <th>year</th>
          <th>difficulty</th>
          <th>addition</td>
          <th>subtraction</th>
          </thead>


          <tbody>

            <?php
            include('../../Connection/db_connection.php');

            $conn = OpenCon();

            $table = $_SESSION["school"];

            $sql = "SELECT * FROM $table";


            $result = mysqli_query($conn, $sql) or die("bad");

            while ($row = mysqli_fetch_assoc($result)) {
              if ($_SESSION["Admin"] != null){
                  //fill array how to fill array that will look like bellow from database???
                  echo '  <tr>
                  <td>' . $row["num"] . '</td>
                  <td>' . $row["username"] . '</td>
                  <td>' . $row["year"] . '</td>
                  <td>' . $row["difficulty"] . '</td>
                  <td>' . $row["addition"] . '</td>
                  <td>' . $row["subtraction"] . '</td>
                  </tr>
                  ';
              }
              else{
                if ($row["category"] == "1"){
                  //fill array how to fill array that will look like bellow from database???
                  echo '  <tr>
                  <td>' . $row["num"] . '</td>
                  <td>' . $row["username"] . '</td>
                  <td>' . $row["year"] . '</td>
                  <td>' . $row["difficulty"] . '</td>
                  <td>' . $row["addition"] . '</td>
                  <td>' . $row["subtraction"] . '</td>
                  </tr>
                  ';   }
              }
              $difficulty = $row["difficulty"];

              }CloseCon($conn);
              ?>



            </tbody>
          </table>


          <div class="form-popup" id="StartBar">
            <form class="form-container" method="post">
              <h1>Edit student</h1>
              <input type="hidden" id ="number" name="number">
              <input type="text" id ="student" name="student">
              <input type="number" id ="year" name="year">
              <select id="difficulty" name="difficulty">
                <option value="1">1</option>
                <option value="2">2</option>

                <input type="submit" class="btn cancel" value="Submit" onclick="closeForm()">
                <input type="submit" value="remove" name="removeUser" id = "removeUser">
                <br>
                <input type="button" = value= "reset password"  onclick="PasswordChange()" id = "PasswordChanger">
                <input type="button" value="Close" name="Close" id = "CloseForm" onclick="closeForm()">
              </form>

              </div>

              <div class="form-popup" id="PasswordReset">
                <form class="form-container" method="post">
                  <h1> Reset password</h1>
                <input type="hidden" id ="PasswordNumber" name="PasswordNumber">
                <input type="password" id ="password" name="password">
                <input type="password" id ="password2" name="password2">
                <input type="submit" value="Confirm" name="PasswordSubmit" id = "PasswordSubmit">
                <input type="button" value="Close" name="Close" id = "CloseForm2" onclick="closeForm()">
                </form>
              </div>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
              <script type="text/javascript" charset="utf8"
              src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


              <script>
              document.getElementById("StartBar").style.display = "none";
              document.getElementById("PasswordReset").style.display = "none";

              var myTable = $('#StudentDataBase').DataTable();


              $(document).ready(function () {
                $('#StudentDataBase').DataTable();

                myTable.column( 0 ).visible( false );
              });

              $('#StudentDataBase').on('click', 'td', function () {

                document.getElementById("StartBar").style.display = "block";
                //puts the users data into the edit section
                document.getElementById("number").value = myTable.cell(this, 0).data();
                document.getElementById("student").value = myTable.cell(this, 1).data();
                document.getElementById("year").value = myTable.cell(this, 2).data();
                document.getElementById("difficulty").value = myTable.cell(this, 3).data();


                //if the user is not an admin, it doesnt let the user change the data


                var adminPriv = "<?php echo  $_SESSION["Admin"] ?>";
                if (adminPriv != "admin"){
                  document.getElementById("student").readOnly = true;
                  document.getElementById("year").readOnly = true;
                  document.getElementById("removeUser").style.display='none';
                  document.getElementById("PasswordChanger").style.display='none';
                }


              });


              function closeForm() {
                document.getElementById("StartBar").style.display = "none";
                document.getElementById("PasswordReset").style.display = "none";
              }


              function PasswordChange(){
                document.getElementById("PasswordReset").style.display = "block";
                document.getElementById("PasswordNumber").value = "error";
                document.getElementById("PasswordNumber").value = document.getElementById("number").value
              }
              </script>

            </div>

          </div>
          <footer id = "footer">
            <b id="logout"><a style="text-decoration:none" href="../../Connection/logout.php">Log Out</a></b>
          </footer>
        </body>
        <?php

          $student = $_POST['student'];
          $year = $_POST['year'];
          $difficulty = $_POST['difficulty'];
          $number = $_POST['number'];

          $conn = OpenCon();
          $table = $_SESSION["school"];
          $user = $_SESSION['user'];
          if(!isset($_POST['PasswordSubmit'])) {
          if(!isset($_POST['removeUser'])) {

            $result = mysqli_query($conn, $sql) or die("bad");
            $studentData = mysqli_fetch_assoc($result);

          if ($difficulty != null){
            $sql = "UPDATE $table SET difficulty = '$difficulty', username = '$student', year = '$year' WHERE num = '$number'";
}
else {$sql = "UPDATE $table SET username = '$student', year = '$year' WHERE num = '$number'";}
            if ($conn->query($sql) === TRUE) {

            } else {

            }
          }

          if(isset($_POST['removeUser'])) {
            $sql = "DELETE FROM $table WHERE num = '$number'";

            if ($conn->query($sql) === TRUE) {

            } else {
              echo "bad" . mysqli_error($conn);
            }}
          }
            if(isset($_POST['PasswordSubmit'])){

              $number = $_POST['PasswordNumber'];
              $password = $_POST['password'];
              $password2 = $_POST['password2'];

                if ($password != null){
              if ($password == $password2){
              $result = mysqli_query($conn, $sql) or die("bad");
              $studentData = mysqli_fetch_assoc($result);

              $hash = password_hash($password, PASSWORD_DEFAULT);

              $sql = "UPDATE $table SET password = '$hash' WHERE num = '$number'";

            if ($conn->query($sql) === TRUE) {

            } else {
              echo "bad" . mysqli_error($conn);
            }
          } else{echo "incorrect";         }
        } }
            CloseCon($conn);
            ?>
