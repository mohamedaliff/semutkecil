<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {

if (isset($_POST['id'])  && is_numeric($_POST['id']))
   {  
      $id = $_POST['id'];
      $language = $_POST['language'];
      $spoken = $_POST['spoken'];
      $writen = $_POST['writen'];
      $date = (date("d/m/Y"));
      $studentId = ($_SESSION['student']);

 if ($language == '' || $spoken == '' || $writen == '' )
{
 // generate error message
 ?>
      <script>
      alert('Please fill the fields ...')
      window.location='editLanguage.html'
      </script>
<?php
 
 }
 else
 {

      // update record from database
      if ($stmt = $mysqli->prepare("UPDATE tbllanguage SET language = ?, spoken = ?, writen = ? WHERE languageId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
         $stmt->bind_param("sssi",$language,$spoken,$writen,$id);
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
      alert('Language Updated ...')
      window.location='editLanguage.html'
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