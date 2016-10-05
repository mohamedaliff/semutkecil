<?php 

include 'Connections/connect.php'; 


$username = ($_POST['txtUsername']);

if (empty($username) || ($username == '')) {
  echo '<span class="error"> Cannot be empty.</span>';
} else {
  $statement = $mysqli->prepare("SELECT companyUsername FROM tblpartner   WHERE companyUsername=?");
  $statement->bind_param("s", $username);
  $statement->execute();
  $statement->bind_result($username);

  if ( $statement->fetch()) {

    echo '<span class="error"> taken</span>';

 } else {

    echo '<span class="success"> available</span>';

 }
}



?>