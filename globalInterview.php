<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['partner']  ) {

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
            <div class="col-lg-12">
                <h1>Global Mobilization Applicants</h1>
                
                 <p>&nbsp;</p>

        </div>


        <div class="row">
            <div class="col-md-8">

      


<?php
    // connect to the database
    include('Connections/connect.php');

    $companyId = ($_SESSION['partner']);
    $status = "in process";


    
    if ($result = $mysqli->query("SELECT tblapplymobilization.mId,tblapplymobilization.studentId,tblapplymobilization.otherId,tblapplymobilization.mlocation,tblapplymobilization.mcgpa,tblapplymobilization.mdate,tblapplymobilization.mstatus,tblapplymobilization.mfile,tblapplymobilization.mfiletype,tblapplymobilization.mfilesize,tblother.otherId,tblother.othertitle,tblother.companyId,tblstudent.studentId,tblstudent.studentName,tblstudent.programme,tblstudent.studentIc,tblother.companyId,
tblevainterviewgb.total,tblpointer.pointer FROM tblapplymobilization INNER JOIN tblother ON tblapplymobilization.otherId = tblother.otherId INNER JOIN tblstudent ON tblapplymobilization.studentId = tblstudent.studentId LEFT OUTER JOIN tblevainterviewgb ON tblevainterviewgb.studentId = tblapplymobilization.studentId INNER JOIN tblpointer ON tblpointer.studentId = tblapplymobilization.studentId
WHERE tblapplymobilization.mstatus = 'interview confirmed' AND tblother.companyId = '$companyId' ORDER BY STR_TO_DATE(tblapplymobilization.mdate, '%d/%m/%Y') DESC"))
    {
  if ($result->num_rows != 0) {

  
     // display data in table

      echo "<p>";

      echo "<div id='body'>";
      echo "<div class='panel panel-warning' style='width:99%;'>";
      echo "<table align='center' border='0' width='990' class='table table-hover'>";
      echo "<tr> <th class='bg-warning'>Student Name</th> <th class='bg-warning' width='300'>Programme</th> <th class='bg-warning'>Location Applied</th><th class='bg-warning'>View Resume</th><th class='bg-warning'>Resume Marks</th><th class='bg-warning'>Interview Marks</th><th class='bg-warning'>Total Marks</th><th class='bg-warning'>Associate File</th><th class='bg-warning'>Action</th>  </tr>";
      //echo "<th>Approve</th><th>Reject</th>";

     while($row = mysqli_fetch_array($result)) {

      
     
   // echo out the contents of each row into a table
    echo "<form id=\"Form".$row['otherId']."\" accept-charset='UTF-8'>";//DO THIS: ADD THIS
    echo "<input type='hidden' name='id' value='".$row['otherId']."'>";
    //DO THIS: ADD THIS
 
    echo "<tr>";
   // echo '<td>' . $row['otherId'] . '</td>';
    echo "<td  width='250'>";
    echo $row['studentName'] ;
    echo "</td>";
    echo '<td  width="100">' . $row['programme'] . '</td>';
    echo '<td  width="100">' . $row['mlocation'] . '</td>';
    echo "<td  width='30'>";
    echo '<a href="viewStudentResume3.php?id=' . $row['mId'] . '" data-toggle="tooltip" title="Click to View Student Resume" >' . 'Resume'.'</a>';
    echo "</td>";
    

    echo '<td  width="50"><font style="color:red;">' . $row['pointer'] . '</font><br><a href="viewPointerResume2.php?id=' . $row['mId'] . '" data-toggle="tooltip" title="Click to View resume evaluation" >' . 'View'.'</a></td>';  
    
    
    if (is_null($row['total'])) {
    echo "<td  width='30'>";
    echo '<a href="evaluateInterview.php?id=' . $row['mId'] . '" data-toggle="tooltip" title="Click to evaluate" style="color:red;">' . 'Evaluate Now'.'</a>';
    echo "</td>";
    } else {
    echo '<td  width="50"><font style="color:red;">' . $row['total'] . '</font><br><a href="viewPointerInterview.php?id=' . $row['mId'] . '" data-toggle="tooltip" title="Click to View Interview evaluation" >' . 'View'.'</a></td>'; 
    }

    $mark1 = $row['pointer'];
    $mark2 = $row['total'];
    $totalmarks = $mark1 + $mark2;

    echo '<td  width="100"><font style="color:red;">' . $totalmarks . '</font></td>';

    echo "<td  width='30'>";
    echo '<a href="uploads/' . $row['mfile'] . '" target="_blank" data-toggle="tooltip" title="Click to Download Attachment" ><span class="glyphicon glyphicon-save"></span> ' . 'Attachment '.'&nbsp; </a>';
    //echo '<a href="approveIntraRequest.php?id=' . $row['applyId'] . '" data-toggle="tooltip" title="Approve Request"> <img src="image/b_edit.png" width="16" height="16" /></a>';
    echo "</td>";

    if (is_null($row['total'])) {
    echo '<td  width="30"><font style="color:red;" data-toggle="tooltip" title="Please evaluate student interview form">Not Available</font></td>';
    } else {
    echo "<td  width='30'>";
    echo '<a href="rejectGb.php?id=' . $row['mId'] . '"  data-toggle="tooltip" title="Click to reject applicant" style="color:red;"><span class="glyphicon glyphicon-remove-sign"></span></a>&nbsp;&nbsp;&nbsp;';
    echo '<a href="approveGb.php?id=' . $row['mId'] . '"  data-toggle="tooltip" title="Click to accept applicant" style="color:blue;"><span class="glyphicon glyphicon-ok-sign"></span></a>';
    echo "</td>";
    }
    
    echo "</tr>";
    echo "</form>";
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
    
    
  } else {

    echo "<p>";
    echo "<table align='center' width='700' border='0'>";
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

if (isset($_POST['short']))
 { 

  $list = ($_POST['list']);

  if($list == "Min CGPA") {

    include('Connections/connect.php');

    $companyId = ($_SESSION['partner']);
    $status = "in process";
    $status1 = "rejected";

    
    if ($result = $mysqli->query("SELECT tblapplymobilization.mId,tblapplymobilization.studentId AS studId,tblapplymobilization.otherId,tblapplymobilization.mlocation,tblapplymobilization.mcgpa,tblapplymobilization.mdate,tblapplymobilization.mstatus,tblapplymobilization.mfile,tblapplymobilization.mfiletype,tblapplymobilization.mfilesize,tblother.otherId,tblother.othertitle,tblother.companyId,tblstudent.studentId,tblstudent.studentName,tblstudent.programme,tblstudent.studentIc,tblstudent.cgpa,tblother.companyId
FROM tblapplymobilization INNER JOIN tblother ON tblapplymobilization.otherId = tblother.otherId INNER JOIN tblstudent ON tblapplymobilization.studentId = tblstudent.studentId
WHERE tblapplymobilization.mstatus = 'in process' AND tblother.companyId = '$companyId'"))
    {
  if ($result->num_rows != 0) {

  
     

     while($row = mysqli_fetch_array($result)) {

      $studentId = $row['studId'];

      $id = $row['mId'];

      
     if ($row['cgpa'] < $row['mcgpa']) {

        if ($stmt = $mysqli->prepare("UPDATE tblapplymobilization SET mstatus = ? WHERE mId=? AND studentId=?"))
      {
         
        $stmt->bind_param("sis",$status1, $id, $studentId); 
        $stmt->execute();
        $stmt->close();

?>
      <script>
      alert('Shorlist by CGPA success ...')
      window.location='globalRequest.php'
      </script>
<?php


//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      }

     }
    

  }
       
    
  }

  }
} else if($list == "Min Point") {

    include('Connections/connect.php');

    $companyId = ($_SESSION['partner']);
    //$status = "in process";
    $status1 = "rejected";

    
    if ($result = $mysqli->query("SELECT tblapplymobilization.mId,tblapplymobilization.studentId AS studId,tblapplymobilization.otherId,
tblapplymobilization.mlocation,tblapplymobilization.mcgpa,tblapplymobilization.mdate,tblapplymobilization.mstatus,tblapplymobilization.mfile,
tblapplymobilization.mfiletype,tblapplymobilization.mfilesize,tblother.otherId,tblother.othertitle,tblother.companyId,tblstudent.studentId,
tblstudent.studentName,tblstudent.programme,tblstudent.studentIc,tblstudent.cgpa,tblother.companyId,tblpointer.pointer
FROM tblapplymobilization INNER JOIN tblother ON tblapplymobilization.otherId = tblother.otherId
INNER JOIN tblstudent ON tblapplymobilization.studentId = tblstudent.studentId
INNER JOIN tblpointer ON tblapplymobilization.studentId = tblpointer.studentId
WHERE tblapplymobilization.mstatus = 'in process' AND tblother.companyId = '$companyId'"))
    {
  if ($result->num_rows != 0) {

  
     

     while($row = mysqli_fetch_array($result)) {

      $studentId = $row['studId'];

      $id = $row['mId'];

      
     if ($row['pointer'] < 29.9){

        if ($stmt = $mysqli->prepare("UPDATE tblapplymobilization SET mstatus = ? WHERE mId=? AND studentId=?"))
      {
         
        $stmt->bind_param("sis",$status1, $id, $studentId); 
        $stmt->execute();
        $stmt->close();

?>
      <script>
      alert('Shorlist by point success ...')
      window.location='globalRequest.php'
      </script>
<?php


//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      }

     } 
  }   
  }
  }

} else {

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