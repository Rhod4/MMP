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


<form name="newForm"  onsubmit="OnSubmit()">


  <b>UserID:</b>
<br><br>
  <input id = "ID" type="text" name="UserId" value="">
  <br><br>
  <b>Password:</b>
<br><br>
  <input type="password" name="Password" value="">
  <br><br>
  <input type="submit" value="Submit">

</form>
<br>

</div>
</div>

<script>
function OnSubmit(){
var nameValue = document.getElementById("ID").value;

<?php  include 'M:\PhP\db_connection.php'; ?>



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
</script>
<?php func1('q','s'); ?>

<?php
echo "<h2>PHP is Fun!</h2>";
?>

<?php
phpinfo();
?>

<?php
header("Location: https://google.com");
exit();
?>

</body>
</html>
