<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {



if(isset($_POST['submit']))
{
	
$file = rand(1000,100000)."-".$_FILES['image']['name'];
$file_loc = $_FILES['image']['tmp_name'];
$file_size = $_FILES['image']['size'];
$file_type = $_FILES['image']['type'];
$folder="uploads/";
$date = (date("d/m/Y"));

$s_name = ($_POST['txtName']);
$s_address = ($_POST['txtAddress']);
$s_city = ($_POST['txtCity']);
$s_postcode = ($_POST['txtPostcode']);
$s_state = ($_POST['selState']);
$s_country = ($_POST['selCountry']);
$s_email = ($_POST['txtEmail']);
$s_phone = ($_POST['txtPhone']);
$studentId = ($_SESSION['student']);
$icno = ($_POST['txtIc']);
$matrixid = ($_POST['txtId']);


 move_uploaded_file($file_loc,$folder.$file);

 if ($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg" ) {

  ?>
      <script>
      alert('Sorry, only JPG, JPEG & PNG files are allowed.')
      window.location='addPersonalInfo.html'
      </script>
<?php
    
} else {


    if ( $insert = $mysqli->query ( "INSERT INTO tblpersonalinfo (pName, pAddress, pCity, pPostcode, pState, pCountry, pEmail, pPhone, pImage, pImageType, pImageSize, studentId, pIc, pMatrix) VALUES ('$s_name', '$s_address', '$s_city', '$s_postcode', '$s_state', '$s_country', '$s_email', '$s_phone', '$file', '$file_type', '$file_size', '$studentId', '$icno', '$matrixid')")) 
 
   {
    

   } else {

   echo $mysqli->error;
}

  if ($insert1 = $mysqli->query( "INSERT INTO tbllastupdate (lastupdate, studentId) VALUES ('$date', '$studentId')")) 
  {

  ?> 
            <script>alert('Personal Information saved ...')
            window.location='myPersonalInfo.php'</script>
<?php
   } else {

   echo $mysqli->error;
}

}
} else if(isset($_POST['cancel'])) {

 header("location: myPersonalInfo.php");
  exit;

}

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?> 

