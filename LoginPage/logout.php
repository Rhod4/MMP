<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: BasePage.php"); // Redirecting To Home Page
}
?>
