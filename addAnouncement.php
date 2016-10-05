<?PHP
error_reporting(0);

session_start();

include ('Connections/connect.php');

if(@$_SESSION['admin']) {



if(isset($_POST['submit']))
{
  
$file = rand(1000,100000)."-".$_FILES['image']['name'];
$file_loc = $_FILES['image']['tmp_name'];
$file_size = $_FILES['image']['size'];
$file_type = $_FILES['image']['type'];
$folder="uploads/";

$title = ($_POST['title']);
$message = ($_POST['message']);
$postby = ("Admin");
$time = (date("h:i:sa"));
$date = (date("d/m/Y"));
$pin = ($_POST['cbPin']);
$type = ($_POST['type']);

 move_uploaded_file($file_loc,$folder.$file);

if ($pin == '') {

  $pinpost = 0;

} else {

  $pinpost = 1;
}



if ($file_type != ''){

   if ($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg" && $file_type != "application/pdf" && $file_type != "application/vnd.openxmlformats-officedocument.presentationml.presentation" && $file_type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {

  ?>
      <script>
      alert('Only JPG, JPEG, PNG, PDF, PPTX & DOCX files are allowed.')
      window.location='postAnouncement.html'
      </script>
<?php

} else if ( $insert = $mysqli->query ( "INSERT INTO tblanouncement ( tdate, ttime, title, message, postby, file, fileType, fileSize, pinpost,type) VALUES ('$date', '$time', '$title', '$message', '$postby', '$file', '$file_type', '$file_size', '$pinpost','$type')"))
 
   {
?> 
            <script>alert('Anouncement saved ...')
            window.location='manageAnouncement.html'</script>
<?php
   } else {

echo $mysqli->error;
}


} else {



    if ( $insert = $mysqli->query ( "INSERT INTO tblanouncement ( tdate, ttime, title, message, postby, file, fileType, fileSize, pinpost,type) VALUES ('$date', '$time', '$title', '$message', '$postby', '$file', '$file_type', '$file_size', '$pinpost','$type')"))
 
   {
?> 
            <script>alert('Anouncement saved ...')
            window.location='manageAnouncement.html'</script>
<?php
   } else {

?> 
            <script>alert('Anouncement failed to be saved ...')
            window.location='postAnouncement.html'</script>
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

