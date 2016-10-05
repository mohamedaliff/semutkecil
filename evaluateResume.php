<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['partner']  ) {

?>
<?php
function renderForm($id, $studentId, $mId)
 {

$pLanguage = null;
$pSpokenT = null;
$pSpokenA = null;
$pWritenT = null;
$pWritenA = null;

$pSkill = null;
$pSkillT = null;

$pCoco = null;
$pCocoT = null;

$pAchievement = null;
$pAchievementT = null;

$point = null;


$countLanguage = null;
$countSkill = null;
$countCoco = null;
$countAchievement = null;

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
    <link rel="stylesheet" href="css/datepicker.css">
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
.clsDatePicker {
      z-index:1151 !important;
    }
    .badge {
  background-color: red;

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
         <li class="dropdown">

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
      <li class="dropdown active">
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
             <div class="col-md-8">
                
             <form action='' method='POST'>   
                 <p>&nbsp;</p>
                 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                 <input type="hidden" name="studid" value="<?php echo $studentId; ?>"/>
                 <input type="hidden" name="postid" value="<?php echo $mId; ?>"/>
                 <h1>Resume</h1>
                 <p>







<?php
                  


            include('Connections/connect.php');

      if ($result = $mysqli->query("SELECT * FROM tbllastupdate WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
        while($row = mysqli_fetch_array($result)) {

          echo '<div><font style="font-weight:bold;">'."Last Updated at " . $row[1] . '</font></div>';
        
        }
      }
  

       include('Connections/connect.php');        
    
    if ($result = $mysqli->query("SELECT * FROM tblpersonalinfo WHERE studentId=$studentId"))
    {



  if ($result->num_rows != 0) {


      
      echo "<p></p>";

      echo "<div id='resume'>";
     
     // display data in table
      echo "<table id='tblresume' table align='center' border='1' width='1000' class='table-responsive'>";
      echo "<tr>";
      echo "<td>";
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>A. Personal Information</div>";
      echo "<p></p>";            
      echo "<table align='center' border='0' width='1000' class='table table-hover'>";

     while($row = mysqli_fetch_array($result)) {
     
   // echo out the contents of each row into a table
    echo "<td width='190'>"; 

    ?>
     <img src="uploads/<?php echo $row[9] ?>" alt="Profile Image" style="width:165px;height:180px;">
<?php
    echo "</td>";
    echo "<td>";
    echo "<table align='center' border='0' width='1000' class='table table-hover'>";
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
  } 
}

    // connect to the database
    include('Connections/connect.php');

    
    if ($result = $mysqli->query("SELECT * FROM tbllanguage WHERE studentId='$studentId'"))
    {
  if ($result->num_rows != 0) {

      $countLanguage = $mysqli->affected_rows;
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>B. Language Proficiency</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='990' class='table table-bordered table-hover table-condensed'>";
      echo "<tr> <th class='bg-warning'>Language</th> <th class='bg-warning'>Spoken</th>  <th class='bg-warning'>Writen</th><th class='bg-warning' width='50'>Evaluator 1</th><th class='bg-warning' width='50'>Evaluator 2</th></tr>";

     while($row = mysqli_fetch_array($result)) {

     
   // echo out the contents of each row into a table
    echo '<input type="hidden" name="lid[]" value="'. $row['0'] .'"/>';

    echo "<tr>";
    echo '<td>' . $row['language'] . '</td>';
    echo '<td>' . $row['spoken'] . '</td>';
    echo '<td>' . $row['writen'] . '</td>';



    echo '<td><select id="languageEva1" name="languageEva1[]" style="width:60px;float:left;" class="form-control" >
            <option value="" selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';

  
    echo '<td><select id="languageEva2" name="languageEva2[]" style="width:60px;float:left;" class="form-control" disabled>
            <option value="0" selected>.</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';
    echo "</tr>";
  }

    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";

    //echo $pLanguage;


  }
}



?>
</td></tr>
<tr><td>
<?php


    // connect to the database
    include('Connections/connect.php');

    
    if ($result = $mysqli->query("SELECT * FROM tblskill WHERE studentId='$studentId'"))
    {
  if ($result->num_rows != 0) {

    $countSkill = $mysqli->affected_rows;
     
     // display data in table

      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>C. Computer Skills</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='990' class='table table-bordered table-hover table-condensed'>";
      echo "<tr> <th class='bg-warning'>Skill</th> <th class='bg-warning'>Level</th> <th class='bg-warning' width='50'>Evaluator 1</th><th class='bg-warning' width='50'>Evaluator 2</th></tr>";

     while($row = mysqli_fetch_array($result)) {
     
    echo '<input type="hidden" name="sid[]" value="'. $row['0'] .'"/>'; 
   // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[2] . '</td>';
    echo '<td><select id="skillEva1" name="skillEva1[]" style="width:60px;float:left;" class="form-control">
            <option value="" selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';
    echo '<td><select id="skillEva2" name="skillEva2[]" style="width:60px;float:left;" class="form-control" disabled>
            <option value="0" selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';
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

    
    if ($result = $mysqli->query("SELECT * FROM tbleducation WHERE studentId='$studentId'"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>D. Academic Background</div>";
      echo "<p></p>";
      echo "<table align='left' border='0' width='990' class='table table-hover'>";

      

      $counts = 1;

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
    //echo "<tr><td>&nbsp;</td><td>&nbsp;</td><tr>";
    
    echo "</table>";
    echo "<table  align='left' border='0' width='990' class='table table-hover'>";
    echo "<tr> <th class='bg-warning'></th> <th class='bg-warning'></th><th class='bg-warning' width='70'>Evaluator 1</th><th class='bg-warning' width='70'>Evaluator 2</th></tr>";
    echo "<tr>";
    echo '<td>' . "&nbsp;" . '</td>';
    echo '<td>' . "&nbsp;" . '</td>';
    echo '<td><select id="educationEva1" name="educationEva1" style="width:60px;float:left;" class="form-control">
            <option value="" selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';
    echo '<td><select id="educationEva2" name="educationEva2" style="width:60px;float:left;" class="form-control" disabled>
            <option value="0" selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';
    echo "</td>";
    echo "</tr>";

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

    
    if ($result = $mysqli->query("SELECT * FROM tblcoco WHERE studentId='$studentId'"))
    {
  if ($result->num_rows != 0) {

    $countCoco = $mysqli->affected_rows;
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>E. Co-curricular Activities</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='990' class='table table-bordered table-hover table-condensed'>";
      echo "<tr> <th class='bg-warning'>School/Institute</th> <th class='bg-warning'>Role</th>  <th class='bg-warning'>Activities</th>  <th class='bg-warning' width='80'>Year</th> <th class='bg-warning' width='50'>Evaluator 1</th><th class='bg-warning' width='50'>Evaluator 2</th></tr>";

     while($row = mysqli_fetch_array($result)) {

      echo '<input type="hidden" name="cid[]" value="'. $row['0'] .'"/>';
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[4] . '</td>';
    echo '<td>' . $row[2] . '</td>';
    echo '<td>' . $row[3] . '</td>';
    echo '<td><select id="cocoEva1" name="cocoEva1[]" style="width:60px;float:left;" class="form-control">
            <option value="" selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';
    echo '<td><select id="cocoEva2" name="cocoEva2[]" style="width:60px;float:left;" class="form-control" disabled>
            <option value="0" selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';
    echo "</tr>";
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";

   // echo $pCoco;
  }
}

?>
</td></tr>
<tr><td>
<?php


    // connect to the database
    include('Connections/connect.php');


    
    if ($result = $mysqli->query("SELECT * FROM tblachievement WHERE studentId='$studentId'"))
    {
  if ($result->num_rows != 0) {

    $countAchievement = $mysqli->affected_rows;
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>F. Achievement/Awards</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='990' class='table table-bordered table-hover table-condensed'>";
      echo "<tr> <th class='bg-warning'>Achievement</th> <th class='bg-warning'>Level</th>  <th class='bg-warning'>Year</th> <th class='bg-warning' width='50'>Evaluator 1</th><th class='bg-warning' width='50'>Evaluator 2</th></tr>";

     while($row = mysqli_fetch_array($result)) {

      echo '<input type="hidden" name="aid[]" value="'. $row['0'] .'"/>';
   // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td>' . $row[1] . '</td>';
    echo '<td>' . $row[2] . '</td>';
    echo '<td>' . $row[3] . '</td>';
    echo '<td><select id="achieveEva1" name="achieveEva1[]" style="width:60px;float:left;" class="form-control">
            <option value="" selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';
    echo '<td><select id="achieveEva2" name="achieveEva2[]" style="width:60px;float:left;" class="form-control" disabled>
            <option value="0" selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select></td>';
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

    
    if ($result = $mysqli->query("SELECT * FROM tblexperience WHERE studentId='$studentId'"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>G. Job Experience</div>";
      echo "<p></p>";
      echo "<table align='center' border='0' width='990' class='table table-hover'>";
      //echo "<tr> <th>Language</th> <th>Spoken</th>  <th>Writen</th></tr>";

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
      


echo "</td>";
echo "</table>";
echo "</div>";
echo "<br>";
echo "<table align='center' border='0' width='990'>";
echo "<tr>";
echo "<td align='right'>";

echo "<button id='btnpdf'  style='float:right;'' class='btn btn-info' data-toggle='tooltip' title='Download Resume PDF'>Download PDF</button>";   
echo "</td>";
echo "<td align='right' width='80'>";
echo '<input type="submit" value="Cancel" id="btnCancel" name="cancel" onclick="history.go(-1);" class="btn btn-danger" />';
echo "</td>";
echo "<td align='right' width='70'>";
echo "<input type='submit' style='float:right;'' onclick='myFunction()' value='Save' id='btnSubmit' name='submit' class='btn btn-success' data-toggle='tooltip' title='Save evaluation' />";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<br>";
echo "</form>";

}

  

echo '</html>';
 }

if (isset($_POST['submit'])) { 
 // confirm that the 'id' value is a valid integer before getting the form data
   
$lid = ($_POST['lid']);
$planguage1 = ($_POST['languageEva1']);

$sid = ($_POST['sid']);
$pskill1 = ($_POST['skillEva1']);


$peducation1 = ($_POST['educationEva1']);

$cid = ($_POST['cid']);
$pcoco1 = ($_POST['cocoEva1']);

$aid = ($_POST['aid']);
$pachievement1 = ($_POST['achieveEva1']);


$studentId = ($_POST['studid']);
$mid = ($_POST['postid']);

 if ($planguage1 == '' || $pskill1 == '' || $peducation1 == '' || $pcoco1 == '' || $pachievement1 == '')
{
 // generate error message
 ?>
      <script>
      alert('Please fill the fields...')
      </script>
<?php
 
 } else {


 if ( $insert = $mysqli->query ( "INSERT INTO tblpointer (peducation1, mId, studentId) VALUES ('$peducation1', '$mid', '$studentId')"))
 
   {
   } else {

   echo $mysqli->error;
 }  

for( $i = 0 ; $i < count( $planguage1 ) ; $i++ ) {

if ( $insert = $mysqli->query ( "INSERT INTO tblplanguage (lId, planguage1,mId,studentId) VALUES ('".$lid[$i]."','".$planguage1[$i]."','$mid', '$studentId')"))
   { }

      else
      {
          echo $mysqli->error;
      }
  }

for( $i = 0 ; $i < count( $pskill1 ) ; $i++ ) {

if ( $insert = $mysqli->query ( "INSERT INTO tblpskill (sId,pskill1,mId,studentId) VALUES ('".$sid[$i]."','".$pskill1[$i]."','$mid', '$studentId')"))
   { }

      else
      {
          echo $mysqli->error;
      }

  }

for( $i = 0 ; $i < count( $pcoco1 ) ; $i++ ) {

if ( $insert = $mysqli->query ( "INSERT INTO tblpcoco (cId,pcoco1,mId,studentId) VALUES ('".$cid[$i]."','".$pcoco1[$i]."','$mid', '$studentId')"))
   {
   }

      else
      {
          echo $mysqli->error;
      }

  }

 for( $i = 0 ; $i < count( $pachievement1 ) ; $i++ ) {

if ( $insert = $mysqli->query ( "INSERT INTO tblpachieve (aId, pachieve1,mId,studentId) VALUES ('".$aid[$i]."','".$pachievement1[$i]."','$mid', '$studentId')"))
   {

    ?>
      <script>
      alert('Evaluation saved...')
      window.location='globalRequest.php'
      </script>
<?php

   }

      else
      {
          echo $mysqli->error;
      }

  } 

}
}

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];

    if ($result = $mysqli->query("SELECT * FROM tblapplymobilization WHERE mId = $id" )) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $studentId = $row['studentId'];
 $mId = $row['otherId'];

 
 }
 // show form
 renderForm($id, $studentId, $mId);
 $mysqli->close();
}
}

}




?>


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

</body>
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-printme.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js" charset="UTF-8"></script>
    <script>
    $("#btnpdf").click(function(){
      $("#resume").printMe({ "path": "js/libs/bootstrap.min.css", "title": "Resume" });
    });
    </script>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $("[rel='tooltip']").tooltip();   
});
</script>
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#date').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>


<?php

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>