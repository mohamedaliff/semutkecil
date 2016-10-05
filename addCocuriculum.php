<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {



$s_institute = ($_POST['institute']);
$s_activity = ($_POST['activity']);
$s_year = ($_POST['year']);
$s_role = ($_POST['role']);
$studentId = ($_SESSION['student']);
$date = (date("d/m/Y"));



if(isset($_POST['submit']))
{


 
// attempt insert query execution
   if ( $insert = $mysqli->query ( "INSERT INTO tblcoco (institute, activities, year, role, studentId) VALUES ('$s_institute', '$s_activity', '$s_year', '$s_role', '$studentId')"))
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
      <script>alert('Cocuriculum Activities saved ...')
      window.location='myCocuriculum.php'</script>
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