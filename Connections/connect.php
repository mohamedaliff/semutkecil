<?php
$hostname="localhost"; //local server name default localhost
$username="root";  //mysql username default is root.
$password="1234";       //blank if no password is set for mysql.
$database="intrasystem";  //database name which you created

//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost','root','1234','intrasystem');

//Output any connection error
if($mysqli->connect_errno)
     {
         die('Cannot connect to database');
     }

?>