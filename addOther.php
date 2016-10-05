<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['partner']  ) {



if(isset($_POST['submit']))
{

$file = rand(1000,100000)."-".$_FILES['image']['name'];
$file_loc = $_FILES['image']['tmp_name'];
$file_size = $_FILES['image']['size'];
$file_type = $_FILES['image']['type'];
$folder="uploads/";

//$position1 = ($_POST['position1']);
$description = ($_POST['description']);
$title = ($_POST['title']);

//$position2 = ($_POST['position2']);
//$position3 = ($_POST['position3']);


$companyId = ($_SESSION['partner']);
$status = "not active";
$date = (date("d/m/Y"));
$publish = "Not Yet Published";

 move_uploaded_file($file_loc,$folder.$file);



  if ($title == '' || $description == '')
{
 // generate error message
 ?>
      <script>
      alert('Please fill the fields ...')
      window.location='otherAdvertise.html'
      </script>
<?php
 
 } else {



  if ( $insert = $mysqli->query ( "INSERT INTO tblother (othertitle, otherdescription, otherdate, otherstatus, companyId,publish) VALUES ('$title', '$description', '$date', '$status', '$companyId','$publish')"))
 
   {
?> 
            <script>alert('Your post will be publish as soon it has been approve by admin ...')
            window.location='otherAdvertise.html'</script>
<?php
   } else {

   echo $mysqli->error;
 }



  }
  

}



} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?> 

