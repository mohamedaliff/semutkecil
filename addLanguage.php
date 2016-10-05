<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {



$s_language = ($_POST['language']);
$s_language1 = ($_POST['other']);
$s_writen = ($_POST['writen']);
$s_spoken = ($_POST['spoken']);
$studentId = ($_SESSION['student']);
$date = (date("d/m/Y"));



if(isset($_POST['submit']))
{	
	
if ($s_language == "Others"){

 
// attempt insert query execution
   if ( $insert = $mysqli->query ( "INSERT INTO tbllanguage (language, spoken, writen, studentId) VALUES ('$s_language1', '$s_spoken', '$s_writen', '$studentId')"))
   {

   

} else {
         echo "ERROR: could not prepare SQL statement.";
      }

}else {

// attempt insert query execution
   if ( $insert = $mysqli->query ( "INSERT INTO tbllanguage (language, spoken, writen, studentId) VALUES ('$s_language', '$s_spoken', '$s_writen', '$studentId')"))
   {

   

} else {
         echo "ERROR: could not prepare SQL statement.";
      }


}

if ($stmt = $mysqli->prepare("UPDATE tbllastupdate SET lastupdate = ? WHERE studentId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
        $stmt->bind_param("ss",$date, $studentId); 
        $stmt->execute();
        $stmt->close();
?> 
      <script>alert('Language saved ...')
      window.location='myLanguage.php'</script>
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