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

        <b>School:</b>
        <br><br>
        <input id = "school" type="text" name="school">
        <br><br>
        <b>UserID:</b>
        <br><br>
        <input id = "username" type="text" name="username">
        <br><br>
        <b>Password:</b>
        <br><br>
        <input type="password" id ="password" name="password">
        <br><br>

  <input type="AdminSchool" id ="AdminSchool" name="AdminSchool">
        <input type="submit" name = "submit" value="Submit">

      </form>
      <br>

    </div>
  </div>

</div>

}
<footer id = "BottomBar">
  <b id="logout"><a href="logout.php">Log Out</a></b>
  <p>BottomBar</p>
</footer>
</body>
</html>
