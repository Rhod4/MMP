<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: http://users.aber.ac.uk/rhs24/MMP/LoginPage/BasePage.php"); // Redirecting To Home Page
}
?>
