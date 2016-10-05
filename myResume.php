<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {

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
  <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="viewport" content="width=device-width, initial-scale=1">


   <link href="css/bootstrap.min.css" rel="stylesheet">

   <!-- dd menu -->
  
  <title>UniKl MIIT INTRA Management System</title>
     <link rel="icon" type="image/ico" href="image/favicon.ico">
  <script type="text/javascript" src="js/view.thumbnail.js"></script>
  <link rel="stylesheet" href="css/verticalTabs.css" />
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<style>
 .banner {
    width: 100%;
    height: 200px;
    border: 0px solid #73AD21;
}
.badge {
  background-color: red;

}
.with-nav-tabs.panel-primary .nav-tabs > li > a,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
    color: #fff;
}
.with-nav-tabs.panel-primary .nav-tabs > .open > a,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
  color: black;
  background-color: #fff;
  border-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
  color: #428bca;
  background-color: #fff;
  border-color: #428bca;
  border-bottom-color: transparent;
}
</style>

</head>
<body>

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

        <li class="active"><a href="myResume.php" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> Resume</a></li>
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



<div class="container">
    <div class="row" >
      <div  class="col-sm-6">
        <h3>My Resume</h3>
        <hr/>
        <div class="col-xs-3"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left">
              <li class="active"><a href="myResume.php" data-toggle="tab">My Resume</a></li>
              <li><a href="myPersonalInfo.php" data-toggle="tab">Personal Information</a></li>
              <li><a href="myLanguage.php" data-toggle="tab">Language Proficiency</a></li>
              <li><a href="mySkill.php" data-toggle="tab">Computer Skills</a></li>
              <li><a href="myEducation.php" data-toggle="tab">Academic Background</a></li>
              <li><a href="myCocuriculum.php" data-toggle="tab">Co-curricular Activities</a></li>
              <li><a href="myAchievement.php" data-toggle="tab">Achievement / Awards</a></li>
              <li><a href="myExperience.php" data-toggle="tab">Job Experience</a></li>
            </ul>
        </div>

        <div class="col-xs-9" >
          <!-- Tab panes -->
          
            
            
            <form id="formResume" method="POST" action="">

              
              
              <div id="resumecontent" class="tab-content">
           

<?php

     include('Connections/connect.php');

    $studentId = ($_SESSION['student']);

    
    
    if ($result = $mysqli->query("SELECT * FROM tblpersonalinfo WHERE studentId=$studentId"))
    {



  if ($result->num_rows != 0) {

      echo "<button id='btnpdf'  class='btn btn-info'>Download PDF</button>";
      echo "<p></p>";

      include('Connections/connect.php');

      if ($result1 = $mysqli->query("SELECT * FROM tbllastupdate WHERE studentId=$studentId"))
    {
  if ($result1->num_rows != 0) {
        if($row = mysqli_fetch_array($result1)) {

          echo '<div><font style="font-weight:bold;">'."Last Updated at " . $row[1] . '</font></div>';
        
        }
      }
}
echo "<p></p>";

      echo "<div id='resume'>";
     
     // display data in table
      echo "<table id='tblresume' table align='center' border='1' width='900' class='table-responsive'>";
      echo "<tr>";
      echo "<td>";
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>A. Personal Information</div>";
      echo "<p></p>";            
      echo "<table align='center' border='0' width='900' class='table table-hover'>";

     while($row = mysqli_fetch_array($result)) {
     
   // echo out the contents of each row into a table
    echo "<td width='190'>"; 

    ?>
     <img src="uploads/<?php echo $row[9] ?>" alt="Profile Image" style="width:180px;height:220px;">
<?php
    echo "</td>";
    echo "<td>";
    echo "<table align='center' border='0' width='700' class='table table-hover'>";
    echo "<tr>";
    echo "<td width='190'><span style='font-weight:bold;'>" ."Name :" ."</td>";
    echo '<td>' . $row[1] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."IC No :" ."</td>";
    echo '<td>' . $row['pIc'] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Matrix No :" ."</td>";
    echo '<td>' . $row['pMatrix'] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Address :" ."</td>";
    echo '<td>' . $row[2] .''. ", " .'' . $row[4] . ' '.", ".'' . $row[3] .''. ", " .''. $row[5] .''. ", " .''. $row[6] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Contact Number :" ."</td>";
    echo '<td>' . $row[8] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Email Address :" ."</td>";
    echo '<td>' . $row[7] . '</td>';
    echo "</tr>";
    echo "</table>";
    echo "</tr>";

    
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
  } else {


    echo " <a href='addPersonalInfo.html'><img border='0' src='image/add.png' width='16' height='16' /> Please create your resume</a>";

  }
}

    // connect to the database
    include('Connections/connect.php');

    $studentId = ($_SESSION['student']);
    
    if ($result = $mysqli->query("SELECT * FROM tbllanguage WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>B. Language Proficiency</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='900' class='table table-bordered table-hover table-condensed'>";
      echo "<tr> <th class='bg-warning'>Language</th> <th class='bg-warning'>Spoken</th>  <th class='bg-warning'>Writen</th></tr>";

     while($row = mysqli_fetch_array($result)) {
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[2] . '</td>';
    echo '<td>' . $row[3] . '</td>';
    echo "</tr>";
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
  }
}
?>
</td></tr>
<tr><td>
<?php
    // connect to the database
    include('Connections/connect.php');

    $studentId = ($_SESSION['student']);
    
    if ($result = $mysqli->query("SELECT * FROM tblskill WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table

      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>C. Computer Skills</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='900' class='table table-bordered table-hover table-condensed'>";
      echo "<tr> <th class='bg-warning'>Skill</th> <th class='bg-warning'>Level</th></tr>";

     while($row = mysqli_fetch_array($result)) {
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[2] . '</td>';
    echo "</tr>";

  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
  }
}

?>
</td></tr>
<tr><td>
<?php
    // connect to the database
    include('Connections/connect.php');

    $studentId = ($_SESSION['student']);
    
    if ($result = $mysqli->query("SELECT * FROM tbleducation WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>D. Academic Background</div>";
      echo "<p></p>";
      echo "<table align='center' border='0' width='900' class='table table-hover'>";
      //echo "<tr> <th>Language</th> <th>Spoken</th>  <th>Writen</th></tr>";

     while($row = mysqli_fetch_array($result)) {
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo "<td  width='200'><span style='font-weight:bold;text-decoration:underline;'>" ."1. Tertiary Education" ."</td>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";  
    echo "<tr>";
    echo "<td  width='200'><span style='font-weight:bold;'>" ."School/Institute :" ."</td>";
    echo '<td>' . $row['institute'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."State :" ."</td>";
    echo '<td>' . $row['state'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Qualification :" ."</td>";
    echo '<td>' . $row['qualification'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Field of Study :" ."</td>";
    echo '<td>' . $row['studyfield'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Result/CGPA :" ."</td>";
    echo '<td>' . $row['result'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Year of Completion :" ."</td>";
    echo '<td>' . $row['year'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    
    echo "<tr>";
    echo "<td  width='200'><span style='font-weight:bold;text-decoration:underline;'>" ."2. Secondary Education" ."</td>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";  
    echo "<tr>";
    echo "<td  width='200'><span style='font-weight:bold;'>" ."School/Institute :" ."</td>";
    echo '<td>' . $row['institute1'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."State :" ."</td>";
    echo '<td>' . $row['state1'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Qualification :" ."</td>";
    echo '<td>' . $row['qualification1'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Field of Study :" ."</td>";
    echo '<td>' . $row['studyfield1'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Result/CGPA :" ."</td>";
    echo '<td>' . $row['result1'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Year of Completion :" ."</td>";
    echo '<td>' . $row['year1'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";

    if (is_null($row['institute2']) || ($row['institute2']) == "" ){

    
  }else{
    echo "<tr>";
    echo "<td  width='200'><span style='font-weight:bold;text-decoration:underline;'>" ."3. Other (Additional)" ."</td>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";  
    echo "<tr>";
    echo "<td  width='200'><span style='font-weight:bold;'>" ."School/Institute :" ."</td>";
    echo '<td>' . $row['institute2'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."State :" ."</td>";
    echo '<td>' . $row['state2'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Qualification :" ."</td>";
    echo '<td>' . $row['qualification2'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Field of Study :" ."</td>";
    echo '<td>' . $row['studyfield2'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Result/CGPA :" ."</td>";
    echo '<td>' . $row['result2'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Year of Completion :" ."</td>";
    echo '<td>' . $row['year2'] . '</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
  }
    
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
  }

?>
</td></tr>
<tr><td>
<?php
    // connect to the database
    include('Connections/connect.php');

    $studentId = ($_SESSION['student']);
    
    if ($result = $mysqli->query("SELECT * FROM tblcoco WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>E. Co-curricular Activities</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='900' class='table table-bordered table-hover table-condensed'>";
      echo "<tr> <th class='bg-warning'>School/Institute</th> <th class='bg-warning'>Role</th>  <th class='bg-warning'>Activities</th>  <th class='bg-warning'>Year</th></tr>";

     while($row = mysqli_fetch_array($result)) {
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[4] . '</td>';
    echo '<td>' . $row[2] . '</td>';
    echo '<td>' . $row[3] . '</td>';
    echo "</tr>";
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
  }
}
}
 $mysqli->close();
?>
</td></tr>
<tr><td>
<?php
    // connect to the database
    include('Connections/connect.php');

    $studentId = ($_SESSION['student']);
    
    if ($result = $mysqli->query("SELECT * FROM tblachievement WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>F. Achievement/Awards</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='900' class='table table-bordered table-hover table-condensed'>";
      echo "<tr> <th class='bg-warning'>Achievement</th> <th class='bg-warning'>Level</th>  <th class='bg-warning'>Year</th></tr>";

     while($row = mysqli_fetch_array($result)) {
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[2] . '</td>';
    echo '<td>' . $row[3] . '</td>';
    echo "</tr>";
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
  }
}

?>
</td></tr>
<tr><td>
<?php
    // connect to the database
    include('Connections/connect.php');

    $studentId = ($_SESSION['student']);
    
    if ($result = $mysqli->query("SELECT * FROM tblexperience WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>G. Job Experience</div>";
      echo "<p></p>";
      echo "<table align='center' border='0' width='900' class='table table-hover'>";
      

      $count = 1;
     while($row = mysqli_fetch_array($result)) {

       if(is_null($row['referenceName1']) || $row['referenceName1'] == ""){
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo "<td   width='200'><span style='font-weight:bold;'>" ."$count. ".' '."Position :" ."</td>";
    echo '<td>' . $row[1] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."&nbsp; ".' '."Company Name :" ."</td>";
    echo '<td>' . $row[2] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."&nbsp; ".' '."Joined Duration :" ."</td>";
    echo '<td>' . $row[3] .''. "&nbsp;" .'' . $row[4] . ' '."- ".'' . $row[5] .''. "&nbsp;" .''. $row[6] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."&nbsp; ".' '."Job Description :" ."</td>";
    echo '<td>' . $row[7] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."&nbsp; ".' '."Reference Name :" ."</td>";
    echo '<td>' . $row[8] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."&nbsp; ".' '."Reference Contact No :" ."</td>";
    echo '<td>' . $row[9] . '</td>';
    echo "</tr>";
    echo "<p>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
  }else{

    echo "<tr>";
    echo "<td   width='200'><span style='font-weight:bold;'>" ."No Job Experience" ."</td>";
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
     echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Referee Name 1 :" ."</td>";
    echo '<td>' . $row['referenceName1'] . '</td>';
    echo "</tr>";
     echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Referee Contact No 1 :" ."</td>";
    echo '<td>' . $row['referenceNo1'] . '</td>';
    echo "</tr>";
     echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Referee Name 2 :" ."</td>";
    echo '<td>' . $row['referenceName2'] . '</td>';
    echo "</tr>";
     echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Referee Contact No 2 :" ."</td>";
    echo '<td>' . $row['referenceNo2'] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
  }  
    $count++;
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
  }
}
$mysqli->close();

echo "</td>";

?>

</div>
<br>
</form>
  

</div>
</div>
</div>
</div>
  
</body>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    
    <script src="js/jquery-printme.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js" charset="UTF-8"></script>
        <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
 <script>
    $("#btnpdf").click(function(){
      $("#resume").printMe({ "path": "js/libs/bootstrap.min.css", "title": "Resume" });
    });
    </script>

</html>
<?php

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>