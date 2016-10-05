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

    <meta name="keywords" content="width=device-width, initial-scale=1">
     <meta name="description" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
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

      <div class="row" style="min-height:600px;">
        <div class="col-md-8">
          <h3>Personal Information</h3>
          <hr/>
          <div class="col-xs-3"> <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left">
              <li><a href="myResume.php" data-toggle="tab">My Resume</a></li>
              <li class="active"><a href="myPersonalInfo.php" data-toggle="tab">Personal Information</a></li>
              <li><a href="myLanguage.php" data-toggle="tab">Language Proficiency</a></li>
              <li><a href="mySkill.php" data-toggle="tab">Computer Skills</a></li>
              <li><a href="myEducation.php" data-toggle="tab">Academic Background</a></li>
              <li><a href="myCocuriculum.php" data-toggle="tab">Co-curricular Activities</a></li>
              <li><a href="myAchievement.php" data-toggle="tab">Achievement / Awards</a></li>
              <li><a href="myExperience.php" data-toggle="tab">Job Experience</a></li>
            </ul>
          </div>

          <div class="col-xs-9">
            <!-- Tab panes -->
            <div class="tab-content">

            


   <form id="formPersonalInfo" method="POST" action="">
     

<?php
    // connect to the database
    include('Connections/connect.php');

    $studentId = ($_SESSION['student']);
    
    if ($result = $mysqli->query("SELECT * FROM tblpersonalinfo WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>"; 
      echo "<a href='editPersonalInfo.html'  class='btn btn-default' style='color:#B40431;'><span class='glyphicon glyphicon-edit'></span> Edit</a>";
      echo"</p>";             
      echo "<div id='body'>";
      echo "<div id='content'>";
      echo "<table align='center' border='0' width='600' class='table table-hover'>";

     while($row = mysqli_fetch_array($result)) {
     
   // echo out the contents of each row into a table
   echo "<tr>";
    echo '<td width="150">'. "&nbsp;" .'</td>';
    echo "<td>"; 
    ?>
     <img src="uploads/<?php echo $row[9] ?>" alt="Mountain View" style="width:190px;height:210px;">
<?php
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Name :" ."</td>";
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
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
  } else {

    echo " <a href='addPersonalInfo.html' class='btn btn-default' style='color:#B40431;><span class='glyphicon glyphicon-plus-sign'></span> Create Personal Info</a>";

  }
}

                          // close database connection
  $mysqli->close();

?>

</form>
  
</div>
        

       

 
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>


            <div class="col-md-4">
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

        <!-- Marketing Icons Section -->

        <!-- /.row -->

        <!-- Portfolio Section -->
       

        <!-- Footer -->
        <footer align="center">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; UniKl MIIT INTRA Management System (2016)</p>
                </div>
            </div>
        </footer>

    </div>

       
 <script src="js/addRow1.js"></script>
    <script src="js/jquery.add-input-area.js"></script>
    <script src="js/jquery.simple-scroll-follow.js"></script>
    <script src="js/addRow.js"></script>

  
</body>
</html>
<?php

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>