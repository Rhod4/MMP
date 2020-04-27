<?php
session_start();
?>
<!DOCTYPE HTML>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="StaffPageStyle.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

  <title>Rhs24 MMP</title>
</head>
<body>

  <div id="TitleBar">
    <h1 id="TitleText"> Staff Page</h1>
  </div>

  <div id="Table">
    <h1 id="TableText"></h1>

    <div id="Students">
      <h1 id="StudentNames"></h1>

      <table id="StudentDataBase" class="display">
        <thead>
          <th>Name</th>

          <th>year</th>
          <th>difficulty</th>
          <th id="removeTitle">remove </th>

        </thead>


        <tbody>

          <?php
          include('db_connection.php');

          $conn = OpenCon();

          $table = $_SESSION["school"];

          $sql = "SELECT * FROM $table";


          $result = mysqli_query($conn, $sql) or die("bad");

          while ($row = mysqli_fetch_assoc($result)) {
            if ($row["category"] == "1"){
            //fill array how to fill array that will look like bellow from database???
            $list = $row["username"];
            $year = $row["year"];
            $difficulty = $row["difficulty"];

            echo '  <tr>
            <td>' . $list . '</td>
            <td>' . $year . '</td>
            <td>' . $difficulty . '</td>

            <td> <a   class="remove"><form action="script.php" method="get">
            <input type="submit" value="delete"></form></a></td>

            </tr>
            ';   } }CloseCon($conn);

            ?>



          </tbody>
        </table>


<div class="form-popup" id="StartBar">
<form class="form-container" method="post">
    <h1>Edit student</h1>
      <input type="text" id ="student" name="student">
        <input type="text" id ="year" name="year">
          <input type="text" id ="difficulty" name="difficulty">

  <input type="submit" class="btn cancel" value="Submit" onclick="closeForm()">

<?php
$student = $_POST['student'];
$year = $_POST['year'];
$difficulty = $_POST['difficulty'];


  $conn = OpenCon();

  $table = $_SESSION["school"];
  $user = $_SESSION['user'];

  $sql = "SELECT * FROM $table WHERE username ='$user'";
  $result = mysqli_query($conn, $sql) or die("bad");
  $studentData = mysqli_fetch_assoc($result);

$num = $studentData["num"];
  $sql = "UPDATE $table SET difficulty = '$difficulty', username = '$student', year = '$year' WHERE num = '$num'";

  if ($conn->query($sql) === TRUE) {

  } else {

  }
        CloseCon($conn);
?>
    </form>
  </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


        <script>
  document.getElementById("StartBar").style.display = "none";




        $(document).ready(function () {
          $('#StudentDataBase').DataTable();


        });



        var myTable = $('#StudentDataBase').DataTable();

        $('#StudentDataBase').on('click', 'a.remove', function () {

          myTable.row($(this).parents('tr')).remove().draw();

        });

        $('#StudentDataBase').on('click', 'td', function () {

          document.getElementById("StartBar").style.display = "block";
              //puts the users data into the edit section
              document.getElementById("student").value = myTable.cell(this, 0).data();
              document.getElementById("year").value = myTable.cell(this, 1).data();
              document.getElementById("difficulty").value = myTable.cell(this, 2).data();
              //if the user is not an admin, it doesnt let the user change the data


              var adminPriv = "<?php echo  $_SESSION["Admin"] ?>";
              console.log(adminPriv);
              if (adminPriv != "admin"){
              document.getElementById("student").readOnly = true;
              document.getElementById("year").readOnly = true;
              }

        });


        function closeForm() {

          document.getElementById("StartBar").style.display = "none";
        }

        </script>

      </div>

    </div>
  </body>
