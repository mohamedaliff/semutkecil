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

$file1 = rand(1000,100000)."-".$_FILES['image1']['name'];
$file_loc1 = $_FILES['image1']['tmp_name'];
$file_size1 = $_FILES['image1']['size'];
$file_type1 = $_FILES['image1']['type'];
$folder1="uploads/";

$title = ($_POST['title']);

//Industrial training
$description1 = ($_POST['description1']);
$requirement1 = ($_POST['requirement1']);
$cgpa1 = ($_POST['mincgpa1']);
$alowance1 = ($_POST['alowance1']);
$position1 = implode(", ",$_POST["boxes"]);

//Global Mobilization
$location = implode(", ",$_POST["location"]);
$description2 = ($_POST['description2']);
$requirement2 = ($_POST['requirement2']);
$cgpa2 = implode(", ",$_POST["mincgpa2"]);


$companyId = ($_SESSION['partner']);
$status = "not active";
$date = (date("d/m/Y"));
$publish = "Not Yet Published";

 move_uploaded_file($file_loc,$folder.$file);
 move_uploaded_file($file_loc1,$folder1.$file1);

if (!empty($_POST['cate'])) {

  $category = ($_POST['cate']);

if ($category == "Industrial Training") {


if ($file_type != ''){

   if ($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg" && $file_type != "application/pdf" && $file_type != "application/vnd.openxmlformats-officedocument.presentationml.presentation" && $file_type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {

  ?>
      <script>
      alert('Only JPG, JPEG, PNG, PDF, PPTX & DOCX files are allowed.')
      window.location='postJob.html'
      </script>
<?php

} else if ( $insert = $mysqli->query ( "INSERT INTO tbljob (position1, description1, requirement1, mincgpa1, alowance1, pdate, status, companyId, title, file, fileType, fileSize) VALUES ('$position1', '$description1', '$requirement1', '$cgpa1', '$alowance1', '$date', '$status', '$companyId', '$title', '$file', '$file_type', '$file_size')"))
 
   {
?> 
            <script>alert('Your post will be publish as soon it has been approve by admin ...')
            window.location='manageJob.html'</script>
<?php
   } else {

   echo $mysqli->error;
 }


} else {

  if ( $insert = $mysqli->query ( "INSERT INTO tbljob (position1, description1, requirement1, mincgpa1, alowance1, pdate, status, companyId, title, file, fileType, fileSize) VALUES ('$position1', '$description1', '$requirement1', '$cgpa1', '$alowance1', '$date', '$status', '$companyId', '$title', '$file', '$file_type', '$file_size')"))
 
   {
?> 
            <script>alert('Your post will be publish as soon it has been approve by admin ...')
            window.location='manageJob.html'</script>
<?php
   } else {

   echo $mysqli->error;
 }

 } 

} else if ($category == "Global Mobilization") { 


if ($file_type != ''){

   if ($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg" && $file_type != "application/pdf" && $file_type != "application/vnd.openxmlformats-officedocument.presentationml.presentation" && $file_type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {

  ?>
      <script>
      alert('Only JPG, JPEG, PNG, PDF, PPTX & DOCX files are allowed.')
      window.location='postJob.html'
      </script>
<?php

} else   if ( $insert = $mysqli->query ( "INSERT INTO tblother (otherlocation, otherdescription, otherrequirement, othercgpa, otherdate, otherstatus, companyId, othertitle,publish, file, fileType, fileSize) VALUES ('$location', '$description2', '$requirement2', '$cgpa2', '$date', '$status', '$companyId', '$title','$publish', '$file1', '$file_type1', '$file_size1')"))
 
   {
?> 
            <script>alert('Your post will be publish as soon it has been approve by admin ...')
            window.location='manageOther.html'</script>
<?php
   } else {

   echo $mysqli->error;
 }


} else {

  if ( $insert = $mysqli->query ( "INSERT INTO tblother (otherlocation, otherdescription, otherrequirement, othercgpa, otherdate, otherstatus, companyId, othertitle,publish, file, fileType, fileSize) VALUES ('$location', '$description2', '$requirement2', '$cgpa2', '$date', '$status', '$companyId', '$title','$publish', '$file1', '$file_type1', '$file_size1')"))
 
   {
?> 
            <script>alert('Your post will be publish as soon it has been approve by admin ...')
            window.location='manageOther.html'</script>
<?php
   } else {

   echo $mysqli->error;
 }



  }  

} else {

  ?>
      <script>
      alert('Please select category ...')
      window.location='postJob.html'
      </script>
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

