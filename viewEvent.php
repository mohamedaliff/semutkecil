<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {

?>
<?php
function renderForm($id, $companyname, $studname, $position,$itime,$idate,$ivenue,$information,$companyaddress,$companycity,$companypostcode,$companystate,$companycountry,$allowance)
 {

$studentId = ($_SESSION['student']);
$total = null;
$count1 = null;
$count2 = null;
$count3 = null;

if ($total >= 0) {
     
include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tblpartner.companyName,tblpartner.companyUsername,tblofferjob.offerid,tblofferjob.companyId,
tblofferjob.studentId,tblofferjob.position,tblofferjob.itime,tblofferjob.ivenue,tblofferjob.information,tblofferjob.idate,tblofferjob.status,
tblofferjob.offerdate FROM tblpartner INNER JOIN tblofferjob ON tblpartner.companyUsername = tblofferjob.companyId WHERE tblofferjob.studentId = '$studentId' AND tblofferjob.status = 'waiting' OR tblofferjob.status = 'interview' "))
    {
  if ($result->num_rows != 0) {

    $count1 = $mysqli->affected_rows;
    
}
}

include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tblpartner.companyName,tblpartner.companyUsername,tbljob.jobId,tblapplyjob.applyId,tblapplyjob.studentId,
tblapplyjob.postId,tblapplyjob.position,tblapplyjob.jstatus,tblapplyjob.aDate,tblinterview.interviewId,tblinterview.idate,tblinterview.time,
tblinterview.venue,tblinterview.details,tblinterview.postId,tblinterview.studentId FROM tblpartner
INNER JOIN tbljob ON tblpartner.companyUsername = tbljob.companyId INNER JOIN tblapplyjob ON tbljob.jobId = tblapplyjob.postId
INNER JOIN tblinterview ON tblapplyjob.postId = tblinterview.postId WHERE tblapplyjob.jstatus = 'approved' OR tblapplyjob.jstatus = 'rejected' OR tblapplyjob.jstatus = 'interview' AND tblapplyjob.studentId = '$studentId' ORDER BY tblapplyjob.aDate DESC"))
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
   <title>View Job Details</title>
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

  background-color: #E6E6FA;  
}
.title {
    font-weight: bold;
    background-color: #393D5C;
    
    
}
.sub {
   
    background-color: #DBDBDE;
   }
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
        <li><a href="notiIntraRequest.html" style="color:yellow;"><span class="glyphicon glyphicon-envelope"></span> Notification <span class="badge"><?php echo $total; ?></span></a></li> 
        </li>

        <li><a href="myResume.php" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> Resume</a></li>
        <li><a href="addCoverLetter.html" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> Cover Letter</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="myProfile.php" style="color:yellow;"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
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
  
  <h1>View Event</h1>

</div>
<p>
            <div class="col-md-8">

              

<form action='' method='POST'>  

<table class='scroll' width='700' border='0' bgcolor='#FF00FF' align='center'>
  <tbody>
    <tr>
      <td>

      <div><input type="hidden" name="id" value="<?php echo $id; ?>"/></div>
      <div class='sub'><br>&nbsp;</br>Dear Mr./Ms./Mrs./Ms. <?php echo $studname; ?> :<br>&nbsp;</br></div>  

      <div class="sub">We were impressed by your qualification and your CV.<br>&nbsp;</br></div>
<div class="sub">Your qualifications make you an excellent candidate for this role to undergo Industrial Training at our company. So, we would like to invite you for an interview at our office. <br>&nbsp;</br></div>
      
      <div class="sub">The position we are offering is <?php echo $position; ?> based on that you have applied at a monthly allowance at range of <?php if ($allowance < 101){
          echo "Not Available";
        } else if ($allowance < 201){
          echo "RM 100-200";
          } else if ($allowance < 301){
          echo "RM 200-300";
          } else if ($allowance < 401){
          echo "RM 300-400";
          } else if ($allowance < 501){
          echo "RM 400-500";
          } else if ($allowance <= 1000){
          echo "RM 500-1000";
          } else {
            echo "Above RM 1000";
          } ?>. <br>&nbsp;</br></div>

      <div class="sub">The interview session will be held at : <br>&nbsp;</br></div>  
      <div class="sub">Location : <?php echo $companyname; ?>,<?php echo $companyaddress; ?>,<?php echo $companypostcode; ?>,<?php echo $companycity; ?>,<?php echo $companystate; ?>,<?php echo $companycountry; ?>.<br>&nbsp;</br></div>       
      <div class="sub">Date : <?php echo $idate; ?> <br>&nbsp;</br></div>
      <div class="sub">Time : <?php echo $itime; ?> <br>&nbsp;</br></div>
      <div class="sub">During the interview, we will explain more about this role, our company, and of course, get to know more about you.. <br>&nbsp;</br></div>           
      <div class="sub">If you need to reach out to us before the interview, please contact us at <?php echo $information; ?><br>&nbsp;</br></div>


<div class="sub">Regards,  <br>&nbsp;</br></div>
<div class="sub">Recruitment Team<br>&nbsp;</br></div>
<div class="sub"><?php echo $companyname; ?>  <br>&nbsp;</br></div>

</td>
</tr>

</tbody>
</table>
<table width="700" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" width="70"><input type="submit" value="Back" id="btncancel" name="cancel" onclick="history.go(-1);" class="btn btn-danger" /></td>
  </tr>  
</table>



</form>
</div>
<p>
  <div class="col-md-4">
    <p>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Others Portal</h4>
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
 
 
 

 // connect to the database
include ('Connections/connect.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit'])) { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id'])) {
 // get form data, making sure it is valid
 $id = $_POST['id'];
 $position = ($_POST['position']);
 $studentId = ($_SESSION['student']);
 $status = ("in process");
 $date = (date("d/m/Y"));

if ($position != "") {
 // save the data to the database
 if ($insert = $mysqli->query("INSERT INTO tblapplyjob (studentId, postId, position, jstatus, aDate) VALUES ( '$studentId', '$id', '$position', '$status', '$date')"))
      {
         
?>
      <script>
      alert('You have apply for this position. Please wait for reply from us ...')
      window.close();
      </script>
<?php

//return this string to js if form success
      } 
    }
  }

 } 

 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];

    if ($result = $mysqli->query("SELECT tblpartner.companyName,tblpartner.companyUsername,tbljob.jobId,tbljob.alowance1,tblapplyjob.applyId,
tblapplyjob.studentId,tblapplyjob.postId,tblapplyjob.position,tblapplyjob.jstatus,tblapplyjob.aDate,tblstudent.studentId,tblstudent.studentName,
tblinterview.interviewId,tblinterview.idate,tblinterview.time,tblinterview.venue,tblinterview.details,tblinterview.postId,tblinterview.studentId,tblpartner.companyAddress,
tblpartner.companyCity,tblpartner.companyPostCode,tblpartner.companyState,tblpartner.companyCountry
FROM tblpartner INNER JOIN tbljob ON tblpartner.companyUsername = tbljob.companyId
INNER JOIN tblapplyjob ON tbljob.jobId = tblapplyjob.postId INNER JOIN tblstudent ON tblapplyjob.studentId = tblstudent.studentId
INNER JOIN tblinterview ON tblapplyjob.postId = tblinterview.postId
WHERE interviewId=$id")) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $companyname = $row['companyName'];
 $companyaddress = $row['companyAddress'];
 $companycity = $row['companyCity'];
 $companypostcode = $row['companyPostCode'];
 $companystate = $row['companyState'];
 $companycountry = $row['companyCountry'];
 $studname = $row['studentName'];
 $position = $row['position'];
 $itime = $row['time'];
 $idate = $row['idate'];
 $ivenue = $row['venue'];
 $information = $row['details'];
 $allowance = $row['alowance1'];
 
 }
 // show form
renderForm($id, $companyname, $studname, $position,$itime,$idate,$ivenue,$information,$companyaddress,$companycity,$companypostcode,$companystate,$companycountry,$allowance);
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