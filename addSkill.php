<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {



$s_skill = ($_POST['skill']);
$s_level = ($_POST['level']);
$studentId = ($_SESSION['student']);
$date = (date("d/m/Y"));



if(isset($_POST['submit']))
{

 
// attempt insert query execution
   if ( $insert = $mysqli->query ( "INSERT INTO tblskill (skill, proficiency, studentId) VALUES ('$s_skill', '$s_level', '$studentId')"))
   {

   

} else {
         echo "ERROR: could not prepare SQL statement.";
      }

if ($stmt = $mysqli->prepare("UPDATE tbllastupdate SET lastupdate = ? WHERE studentId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
        $stmt->bind_param("ss",$date, $studentId); 
        $stmt->execute();
        $stmt->close();
?> 
      <script>alert('Skill saved ...')
      window.location='mySkill.php'</script>
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