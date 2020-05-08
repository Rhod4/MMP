<?php


session_start();
if ($_SESSION['school'] == null){

header('location:  http://users.aber.ac.uk/rhs24/MMP/LoginPage/BasePage.php');

}


?>
<?php
if ($_SESSION['user'] != "guest"){
include('db_connection.php');

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

<title>Rhs24 MMP</title>
</head>
<body>

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
    <form class="form-container">
      <h1>Choose Game Type</h1>
      <label for="GameMode"><b>GameMode</b></label>
      <select id="GameMode" name="GameMode">
<option value="+">+</option>
<option value="-">-</option>
</select>

 <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

 </form>
</div>

<div id = "TitleBar">
<h1 id="TitleText"> GamePage</h1>
</div>
<br>
<p id="StartGame">Start Game</p>
<div id = "JavaGame">


<script  id="GameScript" src="Game.js"  type="text/javascript" difficulty="<?php  if ($_SESSION['user'] != "guest"){ echo $difficulty["difficulty"];} else {echo "1";} ?>">


 </script>
</div>

<div id = "Progress">
  <div id= "Score">

  </div>
  <Div id= "Break"></div>
  <div id= "Question"></div>
</div>
<footer id = "BottomBar">
<p>BottomBar</p>
</footer>

</body>
<script>

</script>
