<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();
include ('Connections/connect.php');

if(@$_SESSION['partner']  ) {




?>
<?php
function renderForm($id,$pname,$paddress,$pcity,$ppostcode,$pstate,$pcountry,$pemail,$pphone,$pimage,$sskill,$sproficiency,$achievement,$alevel,$ayear,$cinstitute,$cactivities,$cyear,$crole,$equalification,$efield,$eresult,$eposition,$ecompany,$efrommonth,$efromyear,$etomonth,$etoyear,$edescription,$ereferencename,$ereferenceno,$llanguage,$lspoken,$lwriten,$studentId)
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
    <link rel="stylesheet" href="css/datepicker.css">
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
.placeholder1{color: #A4A4A4;}
select option:first-child{color: #A4A4A4; display: none;}
select option{color: #555;} 
.sub {
    
    
    background-color: #F2F2F2;
    
}
.error {
    background-color: #F6CECE;
}
.clsDatePicker {
      z-index:1151 !important;
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
.badge {
  background-color: red;

}
.placeholder1{color: #A4A4A4;}
select option:first-child{color: #A4A4A4; display: none;}
select option{color: #555;} 
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

    <!-- Page Content -->
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

                <p>
                  <div><input type="hidden" name="id" value="<?php echo $id; ?>"/></div>
                  <h1>Resume</h1>

<?php


      
      
      echo "<p>";

      include('Connections/connect.php');

      if ($result = $mysqli->query("SELECT * FROM tbllastupdate WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
        while($row = mysqli_fetch_array($result)) {

          echo '<div><font style="font-weight:bold;">'."Last Updated at " . $row[1] . '</font></div>';
        
        }
      }
}

       include('Connections/connect.php');        
    
    if ($result = $mysqli->query("SELECT * FROM tblpersonalinfo WHERE studentId=$studentId"))
    {



  if ($result->num_rows != 0) {


      

      //echo "</form>";
      
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
     <img src="uploads/<?php echo $row[9] ?>" alt="Profile Image" style="width:180px;height:220px;">
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

    include('Connections/connect.php');

   
    
    if ($result = $mysqli->query("SELECT * FROM tbllanguage WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>B. Language Proficiency</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='990' class='table table-bordered table-hover table-condensed'>";
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

    
    if ($result = $mysqli->query("SELECT * FROM tblskill WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table

      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>C. Computer Skills</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='990' class='table table-bordered table-hover table-condensed'>";
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

    
    if ($result = $mysqli->query("SELECT * FROM tbleducation WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>D. Academic Background</div>";
      echo "<p></p>";
      echo "<table align='center' border='0' width='1000' class='table table-hover'>";
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

    
    if ($result = $mysqli->query("SELECT * FROM tblcoco WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>E. Co-curricular Activities</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='990' class='table table-bordered table-hover table-condensed'>";
      echo "<tr> <th class='bg-warning'>School/Institute</th> <th class='bg-warning'>Role</th>  <th class='bg-warning'>Activities</th>  <th class='bg-warning' width='80'>Year</th></tr>";

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

?>
</td></tr>
<tr><td>
<?php
    // connect to the database
    include('Connections/connect.php');

    
    if ($result = $mysqli->query("SELECT * FROM tblachievement WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>F. Achievement/Awards</div>";
      echo "<p></p>";
      echo "<table align='center' border='1' width='990' class='table table-bordered table-hover table-condensed'>";
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

    
    if ($result = $mysqli->query("SELECT * FROM tblexperience WHERE studentId='$studentId'"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content' class='bg-primary' style='font-weight:bold;'>G. Job Experience</div>";
      echo "<p></p>";
      echo "<table align='center' border='0' width='990' class='table table-hover'>";


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

      echo "<input type='submit' value='Cancel' id='btncancel' name='cancel' onclick='history.go(-1);' class='btn btn-danger' />";
      echo "&nbsp;";
      echo "<button id='btnpdf'  class='btn btn-info'>Download PDF</button>";
      echo "&nbsp;";
      echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModal1'>Next</button>";
      echo "&nbsp;";

echo "</td>";
echo "</tr>";
echo "</table>";

echo "<br>";
echo '</html>';

$companyId = ($_SESSION['partner']);

?>
<p>

   </div>
        </div>
    </div>
    </div>


<form id="formResume" method="POST" action="">
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Interview Session Details</h4>
        </div>
        <div class="modal-body">
          <input type='hidden' name='studid' value='<?php echo $studentId; ?>'>
          <input type='hidden' name='companyid' value='<?php echo $companyId; ?>'>
          <p><input type="text" id="position" name="position" placeholder="Offered Position" style="width:555px;float:center;" class="form-control"/></p>
          <p><select name="alowance1" id="alowance1" style="width:400px;float:center;" class="form-control placeholder1" >
            <option value="0" selected>Offered Monthly Allowance</option>
            <option value="0">Not Available</option>
            <option value="101">RM 100-200</option>
            <option value="201">RM 200-300</option>
            <option value="301">RM 300-400</option>
            <option value="401">RM 400-500</option>
            <option value="501">RM 500-1000 </option>
            <option value="1001">Above RM 1000 </option>
          </select></p>
          <p><input type="text" id="date" name="date" placeholder="Interview Session Date" style="width:555px;float:center;" class="form-control clsDatePicker"/></p>
          <p><input type="text" id="time" name="time" placeholder="Interview Session Time" style="width:555px;float:center;" class="form-control"/></p>
          <p><input type="text" id="venue" name="venue" placeholder="Interview Session Venue" style="width:555px;float:center;" class="form-control"/></p>
          <p><input type="text" id="info" name="info" placeholder="Contact Number" style="width:555px;float:center;" class="form-control"/></p>
        </div>
        <div class="modal-footer" >
          <button type="submit" name="confirmInterview" class="btn btn-success">Confirm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">INTRA Offer Details</h4>
        </div>
        <div class="modal-body">
          <input type='hidden' name='studid1' value='<?php echo $studentId; ?>'>
          <input type='hidden' name='companyid1' value='<?php echo $companyId; ?>'>
          <p><input type="text" id="position" name="position1" placeholder="Offered Position" style="width:555px;float:center;" class="form-control"/></p>
          <p><select name="alowance" id="alowance" style="width:400px;float:center;" class="form-control placeholder1" >
            <option value="0" selected>Offered Monthly Allowance</option>
            <option value="0">Not Available</option>
            <option value="101">RM 100-200</option>
            <option value="201">RM 200-300</option>
            <option value="301">RM 300-400</option>
            <option value="401">RM 400-500</option>
            <option value="501">RM 500-1000 </option>
            <option value="1001">Above RM 1000 </option>
          </select></p>
          <p><input type="text" id="info" name="info1" placeholder="Contact Number" style="width:555px;float:center;" class="form-control"/></p>
        </div>
        <div class="modal-footer" >
          <button type="submit" name="sendOffer" class="btn btn-success">Confirm</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="width: 40%">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"  align="center">Please Select an Option</h4>
        </div>
        <div class="modal-body"  align="center">
          <input type='hidden' name='studid' value='<?php echo $studentId; ?>'>
          <input type='hidden' name='companyid' value='<?php echo $companyId; ?>'>
          <button type="submit" name="setInterview" class="btn btn-primary" data-dismiss="modal" data-toggle='modal' data-target='#myModal'>Set Interview</button>
          <button type="submit" name="confirm" class="btn btn-primary" data-dismiss="modal" data-toggle='modal' data-target='#myModal2'>Send Offer</button>
        </div>
        <div class="modal-footer"  align="center">
        </div>
      </div>
      
    </div>
  </div>

    </form>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-printme.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js" charset="UTF-8"></script>
        <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


</body>
<script>
    $("#btnpdf").click(function(){
      $("#resume").printMe({ "path": "js/libs/bootstrap.min.css", "title": "Resume" });
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


</html>

<?php

}

if (isset($_POST['confirmInterview'])) { 
 // confirm that the 'id' value is a valid integer before getting the form data
   
 $status = "interview";
 $studId = $_POST['studid'];
 $compId = $_POST['companyid'];


$posi = $_POST['position'];
$alowance = $_POST['alowance'];
$idate = $_POST['date'];
$itime = $_POST['time'];
$ivenue = $_POST['venue'];
$idetails = $_POST['info'];
$date = (date("d/m/Y"));



// save the data to the database

if ( $insert = $mysqli->query ( "INSERT INTO tblofferjob (companyId, studentId, position, itime, ivenue, information, idate, status, offerdate,allowance)  VALUES ('$compId', '$studId', '$posi', '$itime', '$ivenue', '$idetails', '$idate', '$status','$date','$alowance')"))
   {
?>
      <script>
      alert('Interview Session Arranged ...')
      window.location='searchResume.html'
      </script>
<?php
   }

      else
      {
          echo $mysqli->error;
      }
      
} else if (isset($_POST['sendOffer'])) {

  $posi1 = $_POST['position1'];
  $alowance = $_POST['alowance'];
  $idetails1 = $_POST['info1'];
  $date1 = (date("d/m/Y"));

 $status1 = "waiting";
 $studId1 = $_POST['studid1'];
 $compId1 = $_POST['companyid1'];

  //send offer letter
  if ( $insert = $mysqli->query ( "INSERT INTO tblofferjob (companyId, studentId, position, status, offerdate,allowance)  VALUES ('$compId1', '$studId1', '$posi1', '$status1','$date1','$alowance')"))
   {
?>
      <script>
      alert('INTRA Offer Sent...')
      window.location='searchResume.html'
      </script>
<?php
   }

      else
      {
          echo $mysqli->error;
      }
} 

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];

    if ($result = $mysqli->query("SELECT tblstudent.studentId,tblstudent.id,tblachievement.achievement,tblachievement.level AS aLevel,tblachievement.year AS aYear,
tblachievement.studentId,tblcoco.institute,tblcoco.activities,tblcoco.year AS cYear,tblcoco.role,tblcoco.studentId,
tbleducation.institute,tbleducation.state AS eState,tbleducation.qualification,tbleducation.studyfield,tbleducation.result,
tbleducation.studentId,tblexperience.position,tblexperience.company,tblexperience.fromMonth,tblexperience.fromYear,
tblexperience.toMonth,tblexperience.toYear,tblexperience.description,tblexperience.referenceName,tblexperience.referenceNo,
tblexperience.studentId,tbllanguage.language,tbllanguage.spoken,tbllanguage.writen,tbllanguage.studentId,tblpersonalinfo.pName,
tblpersonalinfo.pAddress,tblpersonalinfo.pCity,tblpersonalinfo.pPostcode,tblpersonalinfo.pState,tblpersonalinfo.pCountry,
tblpersonalinfo.pEmail,tblpersonalinfo.pPhone,tblpersonalinfo.pImage,tblpersonalinfo.pImageType,tblpersonalinfo.pImageSize,
tblpersonalinfo.studentId,tblskill.skill,tblskill.proficiency,tblskill.studentId FROM tblstudent
INNER JOIN tblskill ON tblstudent.studentId = tblskill.studentId
INNER JOIN tblpersonalinfo ON tblskill.studentId = tblpersonalinfo.studentId
INNER JOIN tbllanguage ON tblpersonalinfo.studentId = tbllanguage.studentId
INNER JOIN tblexperience ON tbllanguage.studentId = tblexperience.studentId
INNER JOIN tbleducation ON tblexperience.studentId = tbleducation.studentId
INNER JOIN tblcoco ON tbleducation.studentId = tblcoco.studentId
INNER JOIN tblachievement ON tblcoco.studentId = tblachievement.studentId WHERE tblstudent.id=$id")) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {

$studentId = $row['studentId'];
 
 
 // gpersonal info
$pname = $row['pName'];
$paddress = $row['pAddress'];
$pcity = $row['pCity'];
$ppostcode = $row['pPostcode'];
$pstate = $row['pState'];
$pcountry = $row['pCountry'];
$pemail = $row['pEmail'];
$pphone = $row['pPhone'];
$pimage = $row['pImage'];

//skill
$sskill = $row['skill'];
$sproficiency = $row['proficiency'];

//achievement
$achievement = $row['achievement'];
$alevel = $row['aLevel'];
$ayear = $row['aYear'];

//coco
$cinstitute = $row['institute'];
$cactivities = $row['activities'];
$cyear = $row['cYear'];
$crole = $row['role'];

//education
$equalification = $row['qualification'];
$efield = $row['studyfield'];
$eresult = $row['result'];

//experience
$eposition = $row['position'];
$ecompany = $row['company'];
$efrommonth = $row['fromMonth'];
$efromyear = $row['fromYear'];
$etomonth = $row['toMonth'];
$etoyear = $row['toYear'];
$edescription = $row['description'];
$ereferencename = $row['referenceName'];
$ereferenceno = $row['referenceNo'];

//language
$llanguage = $row['language'];
$lspoken = $row['spoken'];
$lwriten = $row['writen'];



 
 }
 // show form
 renderForm($id,$pname,$paddress,$pcity,$ppostcode,$pstate,$pcountry,$pemail,$pphone,$pimage,$sskill,$sproficiency,$achievement,$alevel,$ayear,$cinstitute,$cactivities,$cyear,$crole,$equalification,$efield,$eresult,$eposition,$ecompany,$efrommonth,$efromyear,$etomonth,$etoyear,$edescription,$ereferencename,$ereferenceno,$llanguage,$lspoken,$lwriten,$studentId);
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