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
  <link rel = "stylesheet" href="../MainCSS/MainCSS.css">
  <title>Rhs24 MMP</title>
</head>


<body>
  <div id = "TitleBar">
    <h1 id="TitleText"> Login</h1>
  </div>

  <div id = "LoginDiv">
    <div id = "InputDetails">


      <form name="newForm"  action ="" method="post">

        <label for="school">school:   </label>
        <input id = "school" type="text" name="school">
        <br><br>

        <label for="username">username:   </label>
        <input id = "username" type="text" name="username">
        <br><br>

        <label for="password">password:   </label>
        <input type="password" id ="password" name="password">
        <br><br>
        <label for="admin"></label>
        <input type="text" id ="AdminSchool" name="AdminSchool" placeholder="Leave Blank">
        <br><br>
        <input type="submit" name = "submit" value="Submit">

      </form>
      <script>
      var incorrect = 0;
      </script>
      <?php

      if ($_SESSION["incorrect"] == 1) { echo "<script> incorrect = 1 </script> ";  }
      ?>
      <script>



      if (incorrect == 1){
        var inputVal = document.getElementById("username");
        inputVal.style.borderColor = "red";
        var inputVal = document.getElementById("password");
        inputVal.style.borderColor = "red";
        var inputVal = document.getElementById("school");
        inputVal.style.borderColor = "red";


      }
      </script>

    </div>

  </div>
  <div id = "GuestDivider">
  <form name="newForm"  action ="" method="post">
    <label for="guest">Try the Game</label>
    <input type="submit" id ="guest" name="guest" value = "guest">
  </form>
</div>
</div>


<footer id = "footer">
  <b id="logout"><a href="../Connection/logout.php">Log Out</a></b>
</footer>
</body>
</html>
