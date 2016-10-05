<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {


if(isset($_POST['submit']))
{

$s_position = ($_POST['txtPosition']);
$s_company = ($_POST['txtCompany']);
$s_monthFrom = ($_POST['selMonth']);
$s_yearFrom = ($_POST['txtYear']);
$s_monthTo = ($_POST['selMonth1']);
$s_yearTo = ($_POST['txtYear1']);
$s_description = ($_POST['txtDescription']);
$s_reference = ($_POST['txtReference']);
$s_contact = ($_POST['txtContact']);

$s_reference1 = ($_POST['txtReference1']);
$s_contact1 = ($_POST['txtContact1']);
$s_reference2 = ($_POST['txtReference2']);
$s_contact2 = ($_POST['txtContact2']);

$studentId = ($_SESSION['student']);
$date = (date("d/m/Y"));


  if (!empty($_POST['cate'])) {

    $cate = ($_POST['cate']);  

if ($cate == "Yes"){

// attempt insert query execution
   if ( $insert = $mysqli->query ( "INSERT INTO tblExperience (position, company, fromMonth, fromYear, toMonth, toYear, description, referenceName, referenceNo, studentId) VALUES ('$s_position', '$s_company', '$s_monthFrom', '$s_yearFrom', '$s_monthTo', '$s_yearTo', '$s_description', '$s_reference', '$s_contact', '$studentId')"))
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
      <script>alert('Job Experience saved ...')
      window.location='myExperience.php'</script>
<?php

//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      }
} else if($cate = "No"){

// attempt insert query execution
   if ( $insert = $mysqli->query ( "INSERT INTO tblExperience (referenceName1, referenceNo1, referenceName2, referenceNo2, studentId) VALUES ('$s_reference1', '$s_contact1','$s_reference2', '$s_contact2', '$studentId')"))
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
      <script>alert('Job Experience saved ...')
      window.location='myExperience.php'</script>
<?php

//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      }

} else {

?> 
      <script>alert('Job Experience failed to be saved ...')
      window.location='myExperience.php'</script>
<?php  

}
}
}

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>