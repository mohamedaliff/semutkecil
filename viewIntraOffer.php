<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {

?>
<?php
function renderForm($id, $companyname,$caddress,$ccity,$cpostcode,$cstate,$ccountry,$cphone,$cemail, $studname, $position,$allowance,$cuname)
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




  <script type="text/javascript" src="js/view.thumbnail.js"></script>
  <link rel="stylesheet" href="css/verticalTabs.css" />
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
.badge {
  background-color: red;

}
.sub {
    
    
    background-color: #F2F2F2;
    
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
         
        <li class="active"><a href="notiIntraRequest.html" style="color:yellow;"><span class="glyphicon glyphicon-envelope"></span> Notification <span class="badge"><?php echo $total; ?></span></a></li> <?php }else{ ?>

        <li class="active"><a href="notiIntraRequest.html" style="color:yellow;"><span class="glyphicon glyphicon-envelope"></span> Notification</span></a></li> <?php } ?>

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
            <div class="col-lg-12">
  
  <h3>Offer to Undergo INTRA</h1>

</div>
<div class="row">
            <div class="col-md-8 ">

<form action='' method='POST'>  

<table class='scroll' width='700' border='0' bgcolor='#FF00FF' align='center'>
  <tbody>
    <tr>
      <td>
        <input type="hidden" name="cuname" value="<?php echo $cuname; ?>"/>
        <input type="hidden" name="cname" value="<?php echo $companyname; ?>"/>
        <input type="hidden" name="caddress" value="<?php echo $caddress; ?>"/>
        <input type="hidden" name="ccity" value="<?php echo $ccity; ?>"/>
        <input type="hidden" name="cpostcode" value="<?php echo $cpostcode; ?>"/>
        <input type="hidden" name="cstate" value="<?php echo $cstate; ?>"/>
        <input type="hidden" name="ccountry" value="<?php echo $ccountry; ?>"/>
        <input type="hidden" name="cemail" value="<?php echo $cemail; ?>"/>
        <input type="hidden" name="ccontact" value="<?php echo $cphone; ?>"/>
        <input type="hidden" name="position" value="<?php echo $position; ?>"/>

      <div><input type="hidden" name="id" value="<?php echo $id; ?>"/></div>
      <div class='sub'><br>&nbsp;</br>Dear Mr./Ms./Mrs./Ms. <?php echo $studname; ?> :<br>&nbsp;</br></div>  

      <div class="sub">We are pleased to inform that you have been selected to undergo for Industrial Training at our company,
<?php echo $companyname; ?>. We are delighted to make you the following offer for your Industrial Training. <br>&nbsp;</br></div>
      
      <div class="sub">The position we are offering is <?php echo $position; ?> and monthly allowance at range of <?php if ($allowance < 101){
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

      <div class="sub">Please confirm this mail to indicate your acceptance of this offer. <br>&nbsp;</br></div>

      <div class="sub">We are confident you will be able to make a significant contribution to the success of our
company and look forward to working with you. <br>&nbsp;</br><br>&nbsp;</br></div>

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
    <td><input type='submit' style='float:right;' value='Confirm' id='btnSubmit' name='submit' class='btn btn-success' data-toggle='tooltip' title='Confirm Acceptance' /></td>
    <td align="right" width="70"><input type="submit" value="Back" id="btncancel" name="cancel" onclick="history.go(-1);" class="btn btn-danger" /></td>
  </tr>  
</table>



</form>
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
 $studentId = ($_SESSION['student']);
 $status = ("confirm");
 $status1 = ("INTRA");

 $cuname = $_POST['cuname'];
 $companyname = $_POST['cname'];
 $caddress = $_POST['caddress'];
 $ccity = $_POST['ccity'];
 $cpostcode = $_POST['cpostcode'];
 $cstate = $_POST['cstate'];
 $ccountry = $_POST['ccountry'];
 $cphone = $_POST['ccontact'];
 $cemail = $_POST['cemail'];
 $position = $_POST['position'];
 
if ($result = $mysqli->query("SELECT intrastatus FROM tblstudent WHERE studentId = '$studentId'"))
    {
  if ($result->num_rows != 0) {
    if($row = mysqli_fetch_array($result)) {

      if ($row['intrastatus'] == "eligible") {

 // save the data to the database
 
if ( $stmt = $mysqli->prepare( "UPDATE tblofferjob SET status = ? WHERE offerid=?"))
 
   {

    $stmt->bind_param("si",$status, $id); 
    $stmt->execute();
    $stmt->close();
   

   } else {

   echo $mysqli->error;
 }

if ( $insert = $mysqli->query ( "INSERT INTO tblintra (cName, cAddress, cCity, cPostcode, cState, cCountry, cPhone, cEmail ,position, studentId, cUname) VALUES ('$companyname', '$caddress', '$ccity', '$cpostcode','$cstate','$ccountry','$cphone','$cemail','$position','$studentId','$cuname')"))
   {
   }

   
if ( $stmt = $mysqli->prepare( "UPDATE tblstudent SET intrastatus = ? WHERE studentId=?"))
      {

        $stmt->bind_param("ss",$status1, $studentId); 
        $stmt->execute();
        $stmt->close();
?>
      <script>
      alert('You have accepted the offer to undego INTRA at this company.')
      window.location='notiIntraRequest.html'
      </script>
<?php
      } 

    } else if ($row['intrastatus'] == "INTRA") {
?>
      <script>
      alert('Sorry.You are not allowed to accept any more offers for INTRA.You already have confirmed a company to undergo your INTRA..')
      window.location='notiIntraRequest.html'
      </script>
<?php
    } else {

    }
  }
}

  }
}
 }

 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];

    if ($result = $mysqli->query("SELECT tblpartner.companyName,tblpartner.companyAddress,tblpartner.companyCity,tblpartner.companyPostCode,tblpartner.companyState,tblpartner.companyCountry,tblpartner.companyEmail,tblpartner.companyPhone,tblpartner.companyUsername,tblofferjob.offerid,tblofferjob.companyId,
tblofferjob.studentId,tblofferjob.position,tblofferjob.itime,tblofferjob.ivenue,tblofferjob.information,tblofferjob.idate,tblofferjob.offerdate,tblofferjob.allowance,tblstudent.studentName
FROM tblpartner INNER JOIN tblofferjob ON tblpartner.companyUsername = tblofferjob.companyId
INNER JOIN tblstudent ON tblofferjob.studentId = tblstudent.studentId WHERE tblofferjob.offerid = '$id' ")) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $cuname = $row['companyUsername']; 
 $companyname = $row['companyName'];
 $caddress = $row['companyAddress'];
 $ccity = $row['companyCity'];
 $cpostcode = $row['companyPostCode'];
 $cstate = $row['companyState'];
 $ccountry = $row['companyCountry'];
 $cphone = $row['companyPhone'];
 $cemail = $row['companyEmail'];
 $studname = $row['studentName'];
 $position = $row['position'];
 $allowance = $row['allowance'];



 
 }
 // show form
 renderForm($id, $companyname,$caddress,$ccity,$cpostcode,$cstate,$ccountry,$cphone,$cemail, $studname, $position,$allowance,$cuname);
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