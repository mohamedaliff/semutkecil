<?PHP
error_reporting(0);

session_start();

include ('Connections/connect.php');

$s_institute = ($_POST['txtInstitute']);
$s_state = ($_POST['selState']);
$s_qualification = ($_POST['selQualification']);
$s_field = ($_POST['txtField']);
$s_result = ($_POST['txtResult']);
$year = ($_POST['txtYear']);

$s_institute1 = ($_POST['txtInstitute1']);
$s_state1 = ($_POST['selState1']);
$s_qualification1 = ($_POST['selQualification1']);
$s_field1 = ($_POST['txtField1']);
$s_result1 = ($_POST['txtResult1']);
$year1 = ($_POST['txtYear1']);

$s_institute2 = ($_POST['txtInstitute2']);
$s_state2 = ($_POST['selState2']);
$s_qualification2 = ($_POST['selQualification2']);
$s_field2 = ($_POST['txtField2']);
$s_result2 = ($_POST['txtResult2']);
$year2 = ($_POST['txtYear2']);


$studentId = ($_SESSION['student']);
$date = (date("d/m/Y"));



if(isset($_POST['submit']))
{



// attempt insert query execution
   if ( $insert = $mysqli->query ( "INSERT INTO tbleducation (institute, state, qualification, studyfield, result, year, institute1, state1, qualification1, studyfield1, result1, year1, institute2, state2, qualification2, studyfield2, result2, year2, studentId) VALUES ('$s_institute', '$s_state', '$s_qualification', '$s_field', '$s_result', '$year','$s_institute1', '$s_state1', '$s_qualification1', '$s_field1', '$s_result1', '$year1','$s_institute2', '$s_state2', '$s_qualification2', '$s_field2', '$s_result2', '$year2', '$studentId')"))
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
	 		<script>alert('Education saved ...')
	 		window.location='myEducation.php'</script>
<?php

//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      }
}
?>