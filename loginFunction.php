<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

@session_start();
include ('Connections/connect.php');



if(isset($_POST['submit2']))
{

	$username = $mysqli->real_escape_string($_POST['txtUsername']);
	$password = $mysqli->real_escape_string($_POST['txtPassword']);

	if ($username == "" || $password == "") {
?> 
	<script> alert('Please enter username and password ...') 
	window.location='login.php'</script> 
<?php
} else {

	 $query = ("SELECT * FROM tbluser   WHERE username='$username' AND password='$password'");
	 $result = $mysqli->query($query);
	 $data = $result->fetch_array();
	 $count = $result->num_rows;

	 if ($count>0) {



	 	if ($data['role'] == "partner") {

	 		@$_SESSION['partner'] = $data['username'];
?> 
	 		<script>alert('You are log as industrial partner ...')
	 		window.location='homePartner.html'</script> 
<?php
	 	} else if ($data['role'] == "student") {

	 		@$_SESSION['student'] = $data['username'];
?> 
	 		<script>alert('You are log as student ...')
	 		window.location='homeStudent.html'</script>
<?php

	 	} else if ($data['role'] == "admin") {

	 		@$_SESSION['admin'] = $data['username'];
?> 
	 		<script>alert('You are log as admin ...')
	 		window.location='homeAdmin.html'</script>
<?php


	 	} 
	 	

	} else {

?> 
	 		<script>
	 		alert('Username or password does not match ...')
	 		window.location='login.php'
	 		</script> 
<?php
	 	}
}

}
?> 