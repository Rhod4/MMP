<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: http://users.aber.ac.uk/rhs24/MMP/LoginPage/index.php"); // Redirecting To Login Page
}
?>
