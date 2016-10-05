<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {

if (isset($_POST['id'])  && is_numeric($_POST['id']))
   {  
      $id = $_POST['id'];
      $skill = $_POST['skill'];
      $level = $_POST['level'];
      $date = (date("d/m/Y"));
      $studentId = ($_SESSION['student']);


 if ($skill == '' || $level == '' )
{
 // generate error message
 ?>
      <script>
      alert('Please fill the fields ...')
      window.location='editSkill.html'
      </script>
<?php
 
 }
 else

{
      // update record from database
      if ($stmt = $mysqli->prepare("UPDATE tblskill SET skill = ?, proficiency = ? WHERE skillId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
         $stmt->bind_param("ssi",$skill,$level,$id);
         $stmt->execute();
         $stmt->close();

//return this string to js if form success
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
      <script>
      alert('Skill Updated ...')
      window.location='editSkill.html'
</script>
<?php

//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      } 
  }
}
$mysqli->close();  

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>