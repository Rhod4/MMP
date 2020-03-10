<?php
function OpenCon()
 {
 $dbhost = "db.dcs.aber.ac.uk";
 $dbuser = "rhs24";
 $dbpass = "rhodri18";
 $db = "cs39930_19_20_rhs24";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>