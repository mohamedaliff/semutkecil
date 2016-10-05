<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {
   
 if(isset($_POST['submit']))
{


 $s_name = ($_POST['txtName']);
$s_address = ($_POST['txtAddress']);
$s_city = ($_POST['txtCity']);
$s_postcode = ($_POST['txtPostcode']);
$s_state = ($_POST['selState']);
$s_country = ($_POST['selCountry']);
$s_email = ($_POST['txtEmail']);
$s_phone = ($_POST['txtPhone']);
$ic = ($_POST['txtIc']);
$idno = ($_POST['txtId']);


$date = (date("d/m/Y"));
 $studentId = ($_SESSION['student']);

    
      // delete record from database

 // save the data to the database
 if ($stmt = $mysqli->prepare("UPDATE tblpersonalinfo SET pName = ?, pAddress = ?, pCity = ?, pPostcode = ?,   pState= ?,   pCountry= ?,   pEmail= ?,   pPhone= ?, pIc=?, pMatrix=?  WHERE studentId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
        $stmt->bind_param("sssssssssss",$s_name, $s_address, $s_city, $s_postcode, $s_state,$s_country,$s_email,$s_phone,$ic,$idno,$studentId); 
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
      alert('Personal Information Updated ...')
      window.location='myPersonalInfo.php'
      </script>
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