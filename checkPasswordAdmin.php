<?php 

session_start();
include ('Connections/connect.php');

if(@$_SESSION['admin']  ) {

$adminId = ($_SESSION['admin']);


$pass = ($_POST['txtOldPassword']);

if (empty($pass) || ($pass == '')) {
  echo '<span class="error"> Cannot be empty.</span>';
} else {
  $statement = $mysqli->prepare("SELECT password,username FROM tbluser   WHERE password=? AND username=?");
  $statement->bind_param("ss", $pass,$adminId);
  $statement->execute();
  $statement->bind_result($pass,$adminId);

  if ( $statement->fetch()) {

    echo '<span class="success"> Password match</span>';
    echo '<input type="hidden" name="check" id="check" value="1" readonly/>';

 } else {

    echo '<span class="error"> Password not match</span>';
    echo '<input type="hidden" name="check" id="check" value="0" readonly/>';
 }
}


} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}
?>