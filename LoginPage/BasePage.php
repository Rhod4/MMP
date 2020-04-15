<?php
include ('login.php');
if(isset($_SESSION['login_user'])){
header("location: game");
}
?>

<!DOCTYPE html>
  <html>
<head>

<meta charset="UTF-8">
 <link rel = "stylesheet" href="BaseStyle.css">
<title>Rhs24 MMP</title>
</head>


<body>
<div id = "TitleBar">
<h1 id="TitleText"> Login</h1>
</div>

<div id = "LoginDiv">
<div id = "InputDetails">


<form name="newForm"  action ="" method="post">


  <b>UserID:</b>
<br><br>
  <input id = "username" type="text" name="username">
  <br><br>
  <b>Password:</b>
<br><br>
  <input type="password" id ="password" name="password">
  <br><br>
  <input type="submit" name = "submit" value="Submit">

</form>
<br>

</div>
</div>





<!--
<script>
function OnSubmit(){

var nameValue = document.getElementById("ID").value;








if (nameValue.includes("teacher")){
sessionStorage.setItem("teacher", "teacher");
   document.newForm.action = "http://users.aber.ac.uk/rhs24/MMP/StaffPage/StaffPage.html";
}
else if (nameValue.includes("student")){
   document.newForm.action = "http://users.aber.ac.uk/rhs24/MMP/GamePage/GamePage.html";
}
if (nameValue.includes("admin")){
sessionStorage.setItem("teacher", "admin");
   document.newForm.action = "http://users.aber.ac.uk/rhs24/MMP/StaffPage/StaffPage.html";
}
else if (nameValue == ""){
  alert("Please Enter Details");
}
}
</script> -->

</div>
<footer id = "BottomBar">
  <b id="logout"><a href="logout.php">Log Out</a></b>
<p>BottomBar</p>
</footer>
</body>
</html>
