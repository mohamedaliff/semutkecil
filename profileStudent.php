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
   <title>UniKl MIIT INTRA Management System</title>
     <link rel="icon" type="image/ico" href="image/favicon.ico">
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/partnerRegister.css" />
   <script src="js/partnerValidation.js"></script>
  <script src="js/checkUser.js" type="text/javascript"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript">

function checkPassword(pwcheck)
{
  $('#pwcheck').html('<img src="image/ajax-loader.gif" />');
  $.post("checkPasswordStudent.php", {txtOldPassword: pwcheck} , function(data)
    {     
         if (data != '' || data != undefined || data != null) 
         {           
          $('#pwcheck').html(data); 
         }
          });
}
</script>

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
            <li class="active"><a href="myProfile.php" style="color:yellow;"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
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
            <div class="col-lg-12">
                <h1>My Profile</h1>
                
                 <p>&nbsp;</p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">


<?php
    // connect to the database
    include('Connections/connect.php');

    $studentId = ($_SESSION['student']);
    $status = "in process";


    
    if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE studentId = '$studentId'"))
    {
  if ($result->num_rows != 0) {

  
     // display data in table

      echo "<p>";
      echo '<form id="formstudentprofile" method="POST" action="">';
      echo "<div class='panel panel-warning' style='width:99%;'>";
      echo "<table align='center' border='0' width='600'>";
     while($row = mysqli_fetch_array($result)) {    
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "</tr>";
    echo "<tr>";
    echo '<td width="200"><font style="font-weight:bold;">Student ID No: </font></td>';
    echo '<td width="200">'.$row[1].'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='150'>" .'&nbsp'. "</td>";
    echo "</tr>";
    echo "<tr>";
    echo '<td width="200"><font style="font-weight:bold;">Student Name: </font></td>';
    echo '<td width="200">'.$row[2].'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "</tr>";
    echo "<tr>";
    echo '<td width="200"><font style="font-weight:bold;">Student IC No: </font></td>';
    echo '<td width="200">'.$row[6].'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "</tr>";
    echo "<tr>";
    echo '<td width="200"><font style="font-weight:bold;">Level: </font></td>';
    echo '<td width="200">'.$row[3].'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "</tr>";
    echo "<tr>";
    echo '<td width="200"><font style="font-weight:bold;">Programme: </font></td>';
    echo '<td width="200">'.$row[4].'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "</tr>";
    echo "<tr>";
    echo '<td width="200"><font style="font-weight:bold;">Current CGPA: </font></td>';
    echo '<td width="200">'.$row[7].'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "</tr>";
    echo "<tr>";
    echo '<td width="200"><font style="font-weight:bold;">INTRA Status: </font></td>';

    if($row[8] == 'INTRA'){


    echo '<td width="200"><a href="intraStatus.php?id=' . $row[1] . '" data-toggle="tooltip" title="Click to view details" >' . $row[8].'</a></td>';
    
    }else{

    echo '<td width="200">'.$row[8].'</td>';

    }
    echo "</tr>";
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "<td width='200'>" .'&nbsp'. "</td>";
    echo "</tr>";
      
  }
    
    echo "</table>";
    echo '</div>';
    echo "</form>";
    
    
  } else {

    echo "<table align='center' width='800' border='0'>";
    echo "<tbody>";
    echo "<tr>";
    echo "<td>";
    echo'<div class="alert alert-danger pop" align="center">';
    echo '<strong>Page Error</strong> ';
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

</div>

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

if (isset($_POST['submit']))
 { 

 // get form data, making sure it is valid
 $id = ($_POST['txtid']);
 // get form data, making sure it is valid
 $cpassword = ($_POST['txtPassword']);
 $verifyPass = ($_POST['txtPWVerified']);
 $oldPass = ($_POST['txtOldPassword']);
 $username = ($_POST['username']);
 $check = ($_POST['check']);
 $companyId = ($_SESSION['partner']);

 
 // check to make sure both fields are entered
 if ($check == '0')
{
 // generate error message
 ?>
      <script>
      alert('Current password not match')
      //window.location='editExperience.html'
      </script>
<?php
 
 //error, display form

 }
 else
 {
 // save the data to the database
  include ('Connections/connect.php');
 if ($stmt = $mysqli->prepare("UPDATE tbluser SET password = ? WHERE userId=?"))
      {
         
        $stmt->bind_param("si",$cpassword,$id); 
        $stmt->execute();
        $stmt->close();

?>
      <script>
      alert('Password Changed ...')
      window.location='homeStudent.html'
      </script>
<?php

//return this string to js if form success
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