<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['partner']  ) {

function renderForm($id)
 {  

$companyId = ($_SESSION['partner']);
$status = "in process";
$total = null;
$count1 = null;
$count2 = null;


if ($total == 0) {
     
include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tblapplyjob.applyId,tblapplyjob.studentId,tblapplyjob.postId,tblapplyjob.position,tblapplyjob.jstatus,
tblapplyjob.aDate,tbljob.jobId,tbljob.title,tblstudent.studentId,tblstudent.studentName,tblstudent.programme,tblstudent.studentIc,tbljob.companyId
FROM tblapplyjob INNER JOIN tbljob ON tblapplyjob.postId = tbljob.jobId INNER JOIN tblstudent ON tblapplyjob.studentId = tblstudent.studentId
WHERE tblapplyjob.jstatus = 'in process' AND tbljob.companyId = '$companyId' AND tbljob.status = 'active'"))
    {
  if ($result->num_rows != 0) {

    $count1 = $mysqli->affected_rows;
    
}
}

include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tblapplymobilization.mId,tblapplymobilization.studentId,tblapplymobilization.otherId,tblapplymobilization.mlocation,tblapplymobilization.mcgpa,tblapplymobilization.mdate,tblapplymobilization.mstatus,tblapplymobilization.mfile,tblapplymobilization.mfiletype,tblapplymobilization.mfilesize,tblother.otherId,tblother.othertitle,tblother.companyId,tblstudent.studentId,tblstudent.studentName,tblstudent.programme,tblstudent.studentIc,tblother.companyId,tblpointer.pointer,tblpointer.mId As mmid
FROM tblapplymobilization INNER JOIN tblother ON tblapplymobilization.otherId = tblother.otherId INNER JOIN tblstudent ON tblapplymobilization.studentId = tblstudent.studentId LEFT OUTER JOIN tblpointer ON tblapplymobilization.studentId = tblpointer.studentId
WHERE tblapplymobilization.mstatus = 'in process' AND tblother.companyId = '$companyId' AND tblother.otherstatus = 'active'"))
    {
  if ($result->num_rows != 0) {

    $count2 = $mysqli->affected_rows;
    
}
}



$total = $count1 + $count2;


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
 .banner {
    width: 100%;
    height: 200px;
    border: 0px solid #73AD21;
}
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
.pop {
    width: 750px;
    
}
.badge {
  background-color: red;

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
        <li><a href="homePartner.html" style="color:yellow;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
         <li class="dropdown active">

<?php if($total > 0){ ?>             
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:yellow;"><span class="glyphicon glyphicon-envelope"></span> Notification <span class="badge"><?php echo $total; ?></span>

<?php }else{ ?>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:yellow;"><span class="glyphicon glyphicon-envelope"></span> Notification<?php } ?>          
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="intraRequest.php" style="color:yellow;">Student INTRA request <span class="badge"><?php echo $count1; ?></span></a></li>
            <li class="dropdown-submenu"><a href="globalRequest.php" style="color:yellow;">Global Mobilization <span class="badge"><?php echo $count2; ?></span></a>
              <ul class="dropdown-menu">
                        <li><a href="globalRequest.php" style="color:yellow;">Manage Applicants</a></li>
                        <li><a href="publishShortlist.html" style="color:yellow;">Publish Shortlisted List</a></li>
                    </ul>
            </li>
          </ul>
      </li>   
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> Advertisement
          <span class="caret"></span></a>
          <ul class="dropdown-menu" >
                <li><a href="postJob.html" style="color:yellow;">Post Advertisement</a></li>
                <li  class="dropdown-submenu"><a href="#" style="color:yellow;">Manage Advertisement</a>
                    <ul class="dropdown-menu" >
                        <li><a href="manageJob.html" style="color:yellow;">Industrial Training</a></li>
                        <li><a href="manageOther.html" style="color:yellow;">Global Mobilization</a></li>
                    </ul>
                </li>
          </ul>
      </li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:yellow;"><span class="glyphicon glyphicon-search"></span> Recruit
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="searchResume.html" style="color:yellow;">Search Resume</a></li>
            <li  class="dropdown-submenu"><a href="#" style="color:yellow;">Interview Session</a>
                <ul class="dropdown-menu" >
                        <li><a href="intraInterviewPost.php" style="color:yellow;">Industrial Training</a></li>
                        <li><a href="globalInterviewPost.php" style="color:yellow;">Global Mobilization</a></li>
                    </ul>
            </li>
          </ul>
      </li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="profilePartner.php" style="color:yellow;"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
            <li><a href="changePasswordPartner.html" style="color:yellow;"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
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
            <div class="col-lg-12">
                <h1>Interviewee Shortlisted List</h1>
                
                 <p>&nbsp;</p>

            </div>
        </div>
<div class="alert alert-warning">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> Only students with completed evaluated resume is listed in this page.
</div>

        <div class="row">
            <div class="col-md-8">

      


<?php
    // connect to the database
    include('Connections/connect.php');

    $companyId = ($_SESSION['partner']);
    $status = "in process";


    
    if ($result = $mysqli->query("SELECT tblapplymobilization.mId,tblapplymobilization.studentId,tblapplymobilization.otherId,tblapplymobilization.mlocation,tblapplymobilization.mcgpa,tblapplymobilization.mdate,tblapplymobilization.mstatus,tblapplymobilization.mfile,tblapplymobilization.mfiletype,tblapplymobilization.mfilesize,tblother.otherId,tblother.othertitle,tblother.companyId,tblstudent.studentId,tblstudent.studentName,tblstudent.programme,tblstudent.studentIc,tblother.companyId,tblpointer.pointer,tblpointer.mId As mmid
FROM tblapplymobilization INNER JOIN tblother ON tblapplymobilization.otherId = tblother.otherId INNER JOIN tblstudent ON tblapplymobilization.studentId = tblstudent.studentId INNER JOIN tblpointer ON tblapplymobilization.studentId = tblpointer.studentId
WHERE tblapplymobilization.mstatus = 'in process' AND tblapplymobilization.otherId = '$id' ORDER BY STR_TO_DATE(tblapplymobilization.mdate, '%d/%m/%Y') DESC"))
    {
  if ($result->num_rows != 0) {

      echo "<form action='' method='POST'>";

      echo '<div class="modal fade" id="myModal" role="dialog">';
      echo '<div class="modal-dialog" >';
      echo '<div class="modal-content">';
      echo '<div class="modal-header">';
      echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
      echo '<h4 class="modal-title">Announcement Details</h4>';
      echo '</div>';
      echo '<div class="modal-body ">';
      echo'<div class="alert alert-warning pop" align="center" style="width:550px;height:20;">';
      echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
      echo '<strong>This first part of this form is auto generated. Please fill the remaining details.</strong> ';
      echo '</div>';
      echo "<input type='hidden' name='postid' value='".$id."'>";
      echo '<p><font style="font-weight:bold;">Title</font></p>';
      echo '<p><input type="text" name="title" id="title" value="Shorlisted Student List for Global Mobilization Interview" style="width:550px;float:center;" class="form-control"  readonly/></p>';

      echo '<p><font style="font-weight:bold;">Description</font></p>';
      echo '<p><textarea rows="2" type="text" id="description" name="description" style="width:550px;float:center;" class="form-control"  readonly/>List of shorlisted student for Global Mobilization is now released. Click the link below to view the list.</textarea></p>';

      echo '<p><font style="font-weight:bold;">Page Link</font></p>';
      echo '<p><input type="text" name="pagelink" id="pagelink" value="viewShortlisted.php?id=' . $id . '" style="width:550px;float:center;" class="form-control" readonly/></p>';

      echo '<p><font style="font-weight:bold;">Interview Details</font></p>';
      echo '<p><textarea rows="4" type="text" id="interview" name="interview" style="width:550px;float:center;" class="form-control" placeholder="Enter Interview Session Details"/></textarea></p>';
      echo '</div>';
      echo '<div class="modal-footer">';
      echo '<button type="submit" name="confirm" class="btn btn-success">Publish</button>';
      echo '<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';

      
     // display data in table

      echo "<p>";

      echo "<div id='body'>";
      echo "<div class='panel panel-warning' style='width:99%;'>";
      echo "<table align='center' border='0' width='990' class='table table-striped'>";
      echo "<tr> <th width='20'>Student ID</th><th>Name</th><th>Location Applied</th></tr>";


     while($row = mysqli_fetch_array($result)) {

      
     
   // echo out the contents of each row into a table
    echo "<form id=\"Form".$row['otherId']."\" accept-charset='UTF-8'>";//DO THIS: ADD THIS
    echo "<input type='hidden' name='id' value='".$row['otherId']."'>";
    //DO THIS: ADD THIS
 
    echo "<tr>";
    echo '<td>' . $row['studentId'] . '</td>';
    echo "<td  width='250'>";
    echo $row['studentName'] ;
    echo "</td>";
    echo '<td  width="100">' . $row['mlocation'] . '</td>';
    echo "</tr>";

    echo "</form>";
  }
    
    echo "</table>";
    echo '<p>&nbsp;</p>';
    echo '<table align="right" border="0">';
    echo '<tr>';
    echo "<td><button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal' rel='tooltip' title='Publish Shorlisted List'>Publish</button></td>";
    echo '</tr>';

    echo '</table>';

    echo "</div>";
    echo "</div>";
    echo "</center>";
    
    
  } else {

    echo "<p>";
    echo "<table align='center' width='800' border='0'>";
    echo "<tbody>";
    echo "<tr>";
    echo "<td>";
    echo'<div class="alert alert-danger pop" align="center">';
    echo '<strong>Nothing to display</strong> ';
    echo '</div>';
    echo "</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";

  }
}

  // close database connection
  $mysqli->close();




?>

<?php

}

if (isset($_POST['confirm']))
 { 


  include('Connections/connect.php');

    $postby = ($_SESSION['partner']);
    $type = "All";
    $pinpost = "0";    
    $description = ($_POST['description']);
    $title = ($_POST['title']);
    $time = (date("h:i:sa"));
    $date = (date("d/m/Y"));
    $interview = ($_POST['interview']);
    $pagelink = ($_POST['postid']);

    

    if ($result = $mysqli->query("SELECT tblapplymobilization.mId,tblapplymobilization.studentId,tblapplymobilization.otherId,tblapplymobilization.mlocation,tblapplymobilization.mcgpa,tblapplymobilization.mdate,tblapplymobilization.mstatus,tblapplymobilization.mfile,tblapplymobilization.mfiletype,tblapplymobilization.mfilesize,tblother.otherId,tblother.othertitle,tblother.companyId,tblstudent.studentId,tblstudent.studentName,tblstudent.programme,tblstudent.studentIc,tblother.companyId,tblpointer.pointer,tblpointer.mId As mmid
FROM tblapplymobilization INNER JOIN tblother ON tblapplymobilization.otherId = tblother.otherId INNER JOIN tblstudent ON tblapplymobilization.studentId = tblstudent.studentId INNER JOIN tblpointer ON tblapplymobilization.studentId = tblpointer.studentId
WHERE tblapplymobilization.mstatus = 'in process' AND tblapplymobilization.otherId = '$pagelink' ORDER BY STR_TO_DATE(tblapplymobilization.mdate, '%d/%m/%Y') DESC"))
    {
  if ($result->num_rows != 0) {

    while($row = mysqli_fetch_array($result)) {

      $mstatus = "Interview";
      $mid = $row['mId'];

if ($stmt = $mysqli->prepare("UPDATE tblapplymobilization SET mstatus = ? WHERE mId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
        $stmt->bind_param("si",$mstatus, $mid); 
        $stmt->execute();
        $stmt->close();


//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      }
  }
}     
}
    
if ( $insert = $mysqli->query ( "INSERT INTO tblanouncement ( tdate, ttime, title, message, postby, pinpost,type ,link, additional) VALUES ('$date', '$time', '$title', '$description', '$postby', '$pinpost','$type', '$pagelink', '$interview' )"))
 
   {
?> 
            <script>alert('Anouncement published ...')
            window.location='publishShortlist.html'</script>
<?php
   } else {

?> 
            <script>alert('Anouncement failed to be published ...')
            window.location='publishShortlist.html'</script>
<?php
}
}



if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];

    if ($result = $mysqli->query("SELECT tblapplymobilization.mId,tblapplymobilization.studentId,tblapplymobilization.otherId,tblapplymobilization.mlocation,tblapplymobilization.mcgpa,tblapplymobilization.mdate,tblapplymobilization.mstatus,tblapplymobilization.mfile,tblapplymobilization.mfiletype,tblapplymobilization.mfilesize,tblother.otherId,tblother.othertitle,tblother.companyId,tblstudent.studentId,tblstudent.studentName,tblstudent.programme,tblstudent.studentIc,tblother.companyId,tblpointer.pointer,tblpointer.mId As mmid
FROM tblapplymobilization INNER JOIN tblother ON tblapplymobilization.otherId = tblother.otherId INNER JOIN tblstudent ON tblapplymobilization.studentId = tblstudent.studentId LEFT OUTER JOIN tblpointer ON tblapplymobilization.studentId = tblpointer.studentId
WHERE tblapplymobilization.mstatus = 'in process' AND tblapplymobilization.otherId = '$id' ORDER BY STR_TO_DATE(tblapplymobilization.mdate, '%d/%m/%Y') DESC")) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $name = $row['studentName'];
 $studentId = $row['studentId'];
 
 }
 // show form
 renderForm($id);
 $mysqli->close();
}
}

}


?>

</div>

<div class="col-md-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i><span class="glyphicon glyphicon-menu-hamburger"></span> Navigation</h4>
                    </div>
                    <div class="panel-body">
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="intraRequest.php"> INTRA Request</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="postJob.html"> Post Jobs Anouncement</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="manageJob.html"> Manage Jobs Anouncement</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="searchResume.html"> Search Resume</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="requestStudent.html"> Request Student</a></p>
                    </div>
                </div>
            </div>

        <!-- /.row -->

    </div>
    <footer align="center">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; UniKl MIIT INTRA Management System (2016)</p>
                </div>
            </div>
        </footer>

    </div>
    
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</body>
</html>
<?php

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>