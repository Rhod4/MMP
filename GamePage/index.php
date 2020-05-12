<?php


session_start();
if ($_SESSION['school'] == null || $_SESSION["accountType"] != 1){

header('location:  http://users.aber.ac.uk/rhs24/MMP/LoginPage/index.php');

}


?>
<?php
if ($_SESSION['user'] != "guest"){
    include('../../Connection/db_connection.php');

$table = $_SESSION["school"];
$user =  $_SESSION['user'];
$difficulty;

$conn = OpenCon();

$sql = "SELECT * FROM $table WHERE username ='$user'";


$result = mysqli_query($conn, $sql) or die("bad");
$difficulty = mysqli_fetch_assoc($result);



  CloseCon($conn);
}
 ?>
<!DOCTYPE HTML>


<head>
  <html lang="en">
<meta charset="UTF-8">
 <link rel = "stylesheet" href="GamePageStyle.css">
  <link rel = "stylesheet" href="../MainCSS/MainCSS.css">

<title>Primary Challenge</title>
</head>
<body>

  <div id = "TitleBar">
  <h1 id="TitleText">Primary Challenge</h1>
  </div>


<div class="form-popup"  id="EndScreen">
<form class="form-container" name="EndForm" id="EndForm" method="post">
    <input type="text" id="EndMode" name="EndMode" ></input>
    <br>
  <input type="text" id="EndScore" name="EndScore"></input>
  <br>
   <input type="submit" class="btn cancel" value="Submit">

   <?php
   if ($_SESSION['user'] != "guest"){
   $mode = $_POST['EndMode'];
   $score = $_POST['EndScore'];

   $conn = OpenCon();

   $table = $_SESSION["school"];
   $user = $_SESSION['user'];

   $sql = "SELECT * FROM $table WHERE username ='$user'";
   $result = mysqli_query($conn, $sql) or die("bad");
   $studentData = mysqli_fetch_assoc($result);


     $sql = "UPDATE $table SET  $mode = '$score' WHERE username = '$user'";
     if ($conn->query($sql) === TRUE) {

     } else {
echo("basd");
     }
    CloseCon($conn);
  }
   ?>



 </form>
</div>
  <div class="form-popup" id="StartBar">
    <form name ="GameModeChoice" class="form-container">
      <h1>Choose Game Type</h1>
      <label for="GameMode"><b>GameMode</b></label>
      <select id="GameMode" name="GameMode">
        <option value="+">+</option>
        <option value="-">-</option>
      </select>

 <button type="button" onclick="closeForm()">Close</button>

 </form>
</div>


<br>
<p id="StartGame">Start Game</p>
<div id = "JavaGame">


<script  id="GameScript" src="Game.js"  type="text/javascript" difficulty="<?php  if ($_SESSION['user'] != "guest"){ echo $difficulty["difficulty"];} else {echo "1";} ?>">


 </script>
</div>

<div id = "Progress">
  <div id= "Score">Score</div>
  <Div id= "Break"></div>
  <div id= "Question">Question</div>

  <footer id = "footer">
    <b id="logout"><a style="text-decoration:none" href="../../Connection/logout.php">Log Out</a></b>
  </footer>

</body>
