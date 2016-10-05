<?PHP
error_reporting(0);

session_start();

include ('Connections/connect.php');

if(@$_SESSION['student']) {

$s_achievement = ($_POST['achievement']);
$s_level = ($_POST['level']);
$s_year = ($_POST['year']);
$studentId = ($_SESSION['student']);
$date = (date("d/m/Y"));



if(isset($_POST['submit']))
{


 
// attempt insert query execution
   if ( $insert = $mysqli->query ( "INSERT INTO tblachievement (achievement, level, year, studentId) VALUES ('$s_achievement', '$s_level', '$s_year', '$studentId')"))
   {

   }  else {
         echo "ERROR: could not prepare SQL statement.";
      }
      
if ($stmt = $mysqli->prepare("UPDATE tbllastupdate SET lastupdate = ? WHERE studentId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
        $stmt->bind_param("ss",$date, $studentId); 
        $stmt->execute();
        $stmt->close();
?> 
      <script>alert('Achievement saved ...')
      window.location='myAchievement.php'</script>
<?php

//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      }

}

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>
