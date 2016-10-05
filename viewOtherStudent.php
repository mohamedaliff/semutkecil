<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {

?>
<?php
function renderForm($id, $title,$description, $name,$requirement,$location,$cgpa,$date1,$file,$fileSize,$fileType)
 {

$studentId = ($_SESSION['student']);
$total = null;
$count1 = null;
$count2 = null;
$count3 = null;

if ($total == 0) {
     
include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tblpartner.companyName,tblpartner.companyUsername,tblofferjob.offerid,tblofferjob.companyId,
tblofferjob.studentId,tblofferjob.position,tblofferjob.itime,tblofferjob.ivenue,tblofferjob.information,tblofferjob.idate,tblofferjob.status,
tblofferjob.offerdate FROM tblpartner INNER JOIN tblofferjob ON tblpartner.companyUsername = tblofferjob.companyId WHERE tblofferjob.studentId = '$studentId' AND tblofferjob.status = 'waiting' OR tblofferjob.status = 'interview' AND tblofferjob.studentId = '$studentId'"))
    {
  if ($result->num_rows != 0) {

    $count1 = $mysqli->affected_rows;
    
}
}

include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tbljob.jobId,tblapplyjob.applyId,tblapplyjob.studentId,
tblapplyjob.postId,tblapplyjob.position,tblapplyjob.jstatus,tblapplyjob.aDate FROM tbljob
INNER JOIN tblapplyjob ON tbljob.jobId = tblapplyjob.postId
WHERE tblapplyjob.jstatus = 'approved' AND tblapplyjob.studentId = '$studentId' OR tblapplyjob.jstatus = 'rejected' AND tblapplyjob.studentId = '$studentId' OR tblapplyjob.jstatus = 'interview' AND tblapplyjob.studentId = '$studentId'"))
    {
  if ($result->num_rows != 0) {

    $count2 = $mysqli->affected_rows;

    
}
}

include ('Connections/connect.php');


if ($result = $mysqli->query("SELECT tblapplymobilization.otherId,tblapplymobilization.mlocation,tblapplymobilization.mcgpa,tblapplymobilization.mdate,tblapplymobilization.mstatus,tblother.companyId,tblpartner.companyName,tblapplymobilization.studentId,tblapplymobilization.mId
FROM tblother INNER JOIN tblapplymobilization ON tblapplymobilization.otherId = tblother.otherId
INNER JOIN tblpartner ON tblother.companyId = tblpartner.companyUsername WHERE tblapplymobilization.studentId = '$studentId' AND tblapplymobilization.mstatus= 'interview' OR tblapplymobilization.studentId = '$studentId' AND tblapplymobilization.mstatus= 'rejected' OR tblapplymobilization.studentId = '$studentId' AND tblapplymobilization.mstatus= 'approved'"))
    {
  if ($result->num_rows != 0) {

        $count3 = $mysqli->affected_rows;

    
}
}

$total = $count1 + $count2 + $count3;


} else {

  $total = 0;
}

  ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
   <title>UniKl MIIT INTRA Management System</title>
     <link rel="icon" type="image/ico" href="image/favicon.ico">
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



<style>
    table{

  background-color:  #F2F2F2;  
}
.title {
    font-weight: bold;
    background-color: #393D5C;
    padding-left :20px;
    
}
.sub {
   
    background-color: #DBDBDE;
    padding-left :20px;
   }
 .banner {
    width: 100%;
    height: 200px;
    border: 0px solid #73AD21;
}
.badge {
  background-color: red;

}
table{

  background-color: #DBDBDE;  
}
    </style>




</head>
<body>

     <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="image/unikl.png"width="50" height="25" border="0"></a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="homeStudent.html" style="color:yellow;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="searchJob.html" style="color:yellow;"><span class="glyphicon glyphicon-search"></span> Search INTRA</a></li> 
 <?php 
 if ($total > 0){ ?>
         
        <li><a href="notiIntraRequest.html" style="color:yellow;"><span class="glyphicon glyphicon-envelope"></span> Notification <span class="badge"><?php echo $total; ?></span></a></li> <?php }else{ ?>

        <li><a href="notiIntraRequest.html" style="color:yellow;"><span class="glyphicon glyphicon-envelope"></span> Notification</span></a></li> <?php } ?>

        </li>

        <li><a href="myResume.php" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> Resume</a></li>
        <li><a href="addCoverLetter.html" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> Cover Letter</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="profileStudent.php" style="color:yellow;"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
            <li><a href="changePasswordStudent.html" style="color:yellow;"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
            <li><a href="logout.php" style="color:yellow;"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>
    </div>
  </div>
</nav>

<header>
        <!-- Indicators -->
        <!-- Wrapper for slides -->
        <div class="banner">            
                <img src="image/header.jpg" alt = "Ottawa" class = "banner">
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">
<div class="row">
            <div class="col-lg-12 text-left">
                <h1>Global Mobilization Advertisement </h1>
                
                <p>&nbsp;</p>
             
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
              <p>

<form action="" method="POST" enctype="multipart/form-data">
     

      <div><input type="hidden" name="id" value="<?php echo $id; ?>"/></div>
      <div id='content' class='title bg-primary'><?php echo $title; ?>&nbsp;</br></div>  

      <div class="title bg-primary" style=";font-weight:bold">By <?php echo $name; ?> at <?php echo $date1; ?></div>

<?php
if($fileType == ""){
?>

      <div class="sub"><br>&nbsp;</br></div>
      
      <div class="sub"><?php echo nl2br($description); ?><br>&nbsp;</br></div>         

      <div class="sub">
        

<?php
            $string1 = $location;
            $string1 = explode(',', $string1);
            $string2 = $cgpa;
            $string2 = explode(',', $string2);  


            echo "<table align='left' border='0' width='700' >";
            echo "<tr> <th width='150'>Location</th> <th>Min CGPA</th></tr>";

              foreach( array_combine($string1,$string2 ) as $link1=>$link2){ 
               // foreach( $string2 as $link2){ 
   
            echo "<tr>";
            echo "<td>" . $link1 . "</td>";
            
            echo "<td>" . $link2 . "</td>";
            
            echo "</tr>";
                               
          
    }

    echo "<tr>";
    echo "<td>" . '&nbsp;' . "</td>";
    echo "</tr>";
    echo "</table>";
?>

      <br>&nbsp;</br>
      </div>

      <div class="sub" style=";font-weight:bold">Requirement: <br>&nbsp;</br></div> 
      <div class="sub"><?php echo nl2br($requirement); ?><br>&nbsp;</br></div>
      
<?php }else if($fileType == "image/png" || $fileType == "image/gif" || $fileType == "image/jpeg"){ ?>

<div class="sub"><br>&nbsp;</br></div>
<div class="sub" align="center"><img src="uploads/<?php echo $file; ?>" alt="Image"  width="500"></div>      
      <div class="sub"><?php echo nl2br($description); ?><br>&nbsp;</br></div>         

      <div class="sub">
        

<?php
            $string1 = $location;
            $string1 = explode(',', $string1);
            $string2 = $cgpa;
            $string2 = explode(',', $string2);  


            echo "<table align='left' border='0' width='700' >";
            echo "<tr> <th width='150'>Location</th> <th>Min CGPA</th></tr>";

              foreach( array_combine($string1,$string2 ) as $link1=>$link2){ 
               // foreach( $string2 as $link2){ 
   
            echo "<tr>";
            echo "<td>" . $link1 . "</td>";
            
            echo "<td>" . $link2 . "</td>";
            
            echo "</tr>";
                               
          
    }

    echo "<tr>";
    echo "<td>" . '&nbsp;' . "</td>";
    echo "</tr>";
    echo "</table>";
?>

      <br>&nbsp;</br>
      </div>

      <div class="sub" style=";font-weight:bold">Requirement: <br>&nbsp;</br></div> 
      <div class="sub"><?php echo nl2br($requirement); ?><br>&nbsp;</br></div>

<?php }else {?>

<div class="sub"><br>&nbsp;</br></div>
    
      <div class="sub"><?php echo nl2br($description); ?><br>&nbsp;</br></div>         

      <div class="sub">
        

<?php
            $string1 = $location;
            $string1 = explode(',', $string1);
            $string2 = $cgpa;
            $string2 = explode(',', $string2);  


            echo "<table align='left' border='0' width='700' >";
            echo "<tr> <th width='150'>Location</th> <th>Min CGPA</th></tr>";

              foreach( array_combine($string1,$string2 ) as $link1=>$link2){ 
               // foreach( $string2 as $link2){ 
   
            echo "<tr>";
            echo "<td>" . $link1 . "</td>";
            
            echo "<td>" . $link2 . "</td>";
            
            echo "</tr>";
                               
          
    }

    echo "<tr>";
    echo "<td>" . '&nbsp;' . "</td>";
    echo "</tr>";
    echo "</table>";
?>

      <br>&nbsp;</br>
      </div>

      <div class="sub" style=";font-weight:bold">Requirement: <br>&nbsp;</br></div> 
      <div class="sub"><?php echo nl2br($requirement); ?><br>&nbsp;</br></div>
      <div class="sub" align="left"><a href="uploads/<?php echo $file; ?>" target="_blank" data-toggle="tooltip" title="Click to Download File" ><span class="glyphicon glyphicon-save"></span> <?php echo $file; ?>&nbsp; </a></div>

<?php } ?>      
      <p>
      <div align="right">
      <input type="submit" value="Cancel" id="btncancel" name="cancel" onclick="history.go(-1);" class="btn btn-danger" />
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Apply</button>&nbsp;<br>&nbsp;</br>
    </div>


     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Apply Global Mobilization</h4>
        </div>
        <div class="modal-body">
          <p>
<?php
            $string = $location;
            $string = explode(',', $string);
            $string3 = $cgpa;
            $string3 = explode(',', $string3);

            echo '<select id="location" name="location" class="form-control placeholder1">';
            echo '<option value="" selected>Select Location</option>';

              foreach( array_combine($string,$string3 ) as $link=>$link3){ 
   
            echo '<option value="'.$link.','.$link3.'" >' .$link. '</option>';
                               
  
    } 

            echo '</select>'; 
?>
          </p>
          <p><label for="doc">Essay File</label><input id="doc" type="file" name="doc" class="form-control placeholder1" /></p>
        </div>
        <div class="modal-footer" >
          <button type="submit" name="submit" class="btn btn-success">Apply</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>




  
</div>

  </form>
<div class="col-md-4">
  <p>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i><span class="glyphicon glyphicon-menu-hamburger"></span>  Others Portal</h4>
                    </div>
                    <div class="panel-body">
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="http://www.unikl.edu.my/"> UniKL Portal</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="http://www.miit.unikl.edu.my/"> UniKL MIIT Portal</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span> <a href="http://www.online.unikl.edu.my"> E-Citie Portal</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span> <a href="https://vle.unikl.edu.my/"> VLE Portal</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span> <a href="http://ir.unikl.edu.my/"> UniKL IR Portal</a></p>
                        
                    </div>
                </div>
            </div>

          </div>

<footer align="center">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; UniKl MIIT INTRA Management System (2016)</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



</body>



</html>

<?php





 }
 
 include ('Connections/connect.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit'])) { 
 // confirm that the 'id' value is a valid integer before getting the form data

  if (is_numeric($_POST['id'])) {

 // get form data, making sure it is valid
$studentId = ($_SESSION['student']);
list($location, $cgpa) = explode(",", $_POST["location"]);

$status = ("in process");
 $date = (date("d/m/Y"));
 $id = $_POST['id'];

$file = rand(1000,100000)."-".$_FILES['doc']['name'];
$file_loc = $_FILES['doc']['tmp_name'];
$file_size = $_FILES['doc']['size'];
$file_type = $_FILES['doc']['type'];
$folder="uploads/";

 move_uploaded_file($file_loc,$folder.$file);

  if ($location == '' )
{
 // generate error message
 ?>
      <script>
      alert('Please fill the fields ...')
      </script>
<?php
 
 } else if ($file_type != "application/msword" && $file_type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" && $file_type != "application/pdf" ) {

  ?>
      <script>
      alert('Sorry, only DOC, DOCX & PDF files are allowed.')
      </script>
<?php
    
} else {


    if ( $insert = $mysqli->query ( "INSERT INTO tblapplymobilization (studentId,otherId,mlocation,mcgpa,mdate,mstatus,mfile,mfiletype,mfilesize) VALUES ('$studentId', '$id', '$location', '$cgpa', '$date', '$status', '$file', '$file_type', '$file_size')")) 
 
   {
 ?>
      <script>
      alert('You have apply for this Global Mobilization. Please wait for reply from us ...')
      window.close();
      </script>
<?php   

   } else {

   echo $mysqli->error;
}
}
}
  

 }
 

 // connect to the database
include ('Connections/connect.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database


 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];

    if ($result = $mysqli->query("SELECT tblother.otherId,tblother.othertitle,tblother.otherdescription,tblother.otherdate,tblother.otherstatus,tblother.otherrequirement,
tblother.otherlocation,tblother.othercgpa,tblother.companyId,tblother.file,tblother.fileType,tblother.fileSize,tblpartner.companyName FROM tblother
INNER JOIN tblpartner ON tblother.companyId = tblpartner.companyUsername WHERE otherId=$id")) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $title = $row['othertitle'];
 $description = $row['otherdescription'];
 $requirement = $row['otherrequirement'];
 $location = $row['otherlocation'];
 $cgpa = $row['othercgpa'];
 $date = (date("d/m/Y"));
 $name = $row['companyName'];
 $date1 = $row['otherdate'];
 $file = $row['file'];
 $fileType = $row['fileType'];
 $fileSize = $row['fileSize'];

 
 }
 // show form
 renderForm($id, $title,$description, $name,$requirement,$location,$cgpa,$date1,$file,$fileSize,$fileType);
 $mysqli->close();
}
}

}




?>

<?php

} else {
  
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>