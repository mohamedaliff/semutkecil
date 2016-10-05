<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['partner']  ) {

?>
<?php
function renderForm($id, $studentId, $postId, $studentName,$date,$interviewby,$evaedu,$evaexp,$evaskill,$evacomm,$evaent,$evafinal,$comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$totalmark)
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
   <script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
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
.score{
  border: 1px solid orange;
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
            <div class="col-lg-12">
                <h1>Candicate Interview Evaluation Form</h1>
                
                 <p>&nbsp;</p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">

<form action='' method='POST'>   
                 <p>&nbsp;</p>
                 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                 <input type="hidden" name="studid" value="<?php echo $studentId; ?>"/>
                 <input type="hidden" name="postid" value="<?php echo $postId; ?>"/>
     
<div class='panel panel-warning' style='width:99%;'>

  <table align="center" border="0" width="700">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>      
        <td width="100"><font style="font-weight:bold;">Student Name: </font></td>
        <td width="400"><input type="text" name="studname" id="studname" style="width:400px;float:left;" class="form-control" value="<?php echo $studentName; ?>" readonly/></td>
    <td width="40"><font style="font-weight:bold;">Date: </font></td>
        <td width="60"><input type="text" name="date" id="date" style="width:100px;float:left;" class="form-control" value="<?php echo $date; ?>" readonly/></td>
    </tr>    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>      
        <td><font style="font-weight:bold;">Panel Name: </font></td>
        <td width="400"><input type="text" name="intername" id="intername" style="width:400px;float:left;" class="form-control" readonly value="<?php echo $interviewby; ?>"/></td>
    </tr>
</table>
<hr>
  
  <table align="center" border="1" width="700" class="score">
    <tr>      
        <td width="100" align="center"><font style="font-weight:bold;">Score Rating </font></td>
    <tr>      
        <td>Candidate evaluation forms are to be completed by the interviewer to rank the candidates overall
qualifications for the position. Under each heading the interviewer should give the candidate a
numerical rating and write specific job related comments in the space provided. The numerical rating
system is based on the following:
<font style="font-weight:bold;">5 - Exceptional  4 - Above Average  3 - Average  2 - Satisfactory  1 - Unsatisfactory</font></font></td>
        
    </tr>
</table>
<hr>

<table align="center" border="0" width="700">
    <tr>      
        <td width="100" colspan="2"><font style="font-weight:bold;">Educational Background - </font>Does the candidate have the appropriate educational qualifications
or training for this global mobilization?</font></td>
    <tr>      
        <td colspan="2"><input type="radio" id="evaedu" name="evaedu" value="<?php echo $evaedu; ?>" checked> <?php echo $evaedu; ?></td>       
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font style="font-weight:bold;">Comments: </font></td>
      <td><textarea rows="1" type="text" id="comment1" name="comment1" style="width:600px;float:left;" class="form-control" readonly /><?php echo $comment1; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>      
        <td width="100" colspan="2"><font style="font-weight:bold;">Prior Work Experience - </font>Has the candidate acquired necessary skills or qualifications through
past work experiences?</font></td>
    <tr>      
        <td colspan="2"><input type="radio" id="evaexp" name="evaexp" value="<?php echo $evaexp; ?>" checked> <?php echo $evaexp; ?></td>        
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font style="font-weight:bold;">Comments: </font></td>
      <td><textarea rows="1" type="text" id="comment2" name="comment2" style="width:600px;float:left;" class="form-control" readonly/><?php echo $comment2; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>      
        <td width="100" colspan="2"><font style="font-weight:bold;">Technical Qualifications/Experience - </font>Does the candidate have the technical skills necessary
for this position?</font></td>
    <tr>      
        <td colspan="2"><input type="radio" id="evaskill" name="evaskill" value="<?php echo $evaskill; ?>" checked> <?php echo $evaskill; ?></td>          
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font style="font-weight:bold;">Comments: </font></td>
      <td><textarea rows="1" type="text" id="comment3" name="comment3" style="width:600px;float:left;" class="form-control" readonly/><?php echo $comment3; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>      
        <td width="100" colspan="2"><font style="font-weight:bold;">Communication Skills - </font>How were the candidate's communication skills during the interview?</font></td>
    <tr>      
        <td colspan="2"><input type="radio" id="evacomm" name="evacomm" value="<?php echo $evacomm; ?>" checked> <?php echo $evacomm; ?></td>      
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font style="font-weight:bold;">Comments: </font></td>
      <td><textarea rows="1" type="text" id="comment4" name="comment4" style="width:600px;float:left;" class="form-control" readonly/><?php echo $comment4; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>      
        <td width="100" colspan="2"><font style="font-weight:bold;">Candidate Enthusiasm - </font>How much interest did the candidate show in the global mobilization?</font></td>
    <tr>      
        <td colspan="2"><input type="radio" id="evaent" name="evaent" value="<?php echo $evaent; ?>" checked> <?php echo $evaent; ?></td>       
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font style="font-weight:bold;">Comments: </font></td>
      <td><textarea rows="1" type="text" id="comment5" name="comment5" style="width:600px;float:left;" class="form-control" readonly /><?php echo $comment5; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>      
        <td width="100" colspan="2"><font style="font-weight:bold;">Overall Impression and Recommendation - </font>Final comments and recommendations for
proceeding with this candidate.</font></td>
    <tr>      
        <td colspan="2"><input type="radio" id="evafinal" name="evafinal" value="<?php echo $evafinal; ?>" checked> <?php echo $evafinal; ?></td>         
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font style="font-weight:bold;">Comments: </font></td>
      <td><textarea rows="1" type="text" id="comment6" name="comment6" style="width:600px;float:left;" class="form-control" readonly/><?php echo $comment6; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
</table>
   
<table border="0" align="center" width="700">
      <tr>
        <td align="right" style="font-weight:bold;" width="500">Total Marks : </td>
      <td width="30"><input type="text" name="total" value="<?php echo $totalmark; ?>" style="text-align:center;width:40px;float:right;color:red;font-weight:bold;" readonly/></td>
      
        <td width="30" align="right" style="font-weight:bold;"> / 100 </td>
    </tr>
    <tr><td width="500">&nbsp;</td></tr>
</table>

    <table border="0" align="center" width="700">
      <tr>
        <td width="500">&nbsp;</td>
        <td align="right">
     
      <input type='submit' value='Cancel' id='btnCancel' name='cancel' class='btn btn-danger' onclick='history.go(-1);' data-toggle='tooltip' title='Cancel' />
    </td></tr></table>
      <p>&nbsp;</p>
    </div>
     <p>&nbsp;</p>
  </form>

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
    
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js" charset="UTF-8"></script>
     <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#expdate').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>




</body>



</html>
<?php

}
?>

<?php



if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];

    if ($result = $mysqli->query("SELECT tblevainterviewli.interviewId,tblevainterviewli.evaedu,tblevainterviewli.evaexp,tblevainterviewli.evaskill,tblevainterviewli.evacom,tblevainterviewli.evaent,tblevainterviewli.evafinal,tblevainterviewli.comment1,tblevainterviewli.comment2,
tblevainterviewli.comment3,tblevainterviewli.comment4,tblevainterviewli.comment5,tblevainterviewli.comment6,tblevainterviewli.postId,tblevainterviewli.studentId,tblevainterviewli.total,tblevainterviewli.interviewdate,tblevainterviewli.interviewby,tblstudent.studentName,
tblapplyjob.applyId,tblapplyjob.postId AS mid FROM tblstudent
INNER JOIN tblevainterviewli ON tblevainterviewli.studentId = tblstudent.studentId
INNER JOIN tblapplyjob ON tblevainterviewli.studentId = tblapplyjob.studentId AND tblevainterviewli.postId = tblapplyjob.postId WHERE applyId = $id" )) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $studentId = $row['studentId'];
 $postId = $row['mid'];
 $studentName = $row['studentName'];
 $date = $row['interviewdate'];
 $interviewby = $row['interviewby'];
 $evaedu = $row['evaedu'];
 $evaexp = $row['evaexp'];
 $evaskill = $row['evaskill'];
 $evacomm = $row['evacom'];
 $evaent = $row['evaent'];
 $evafinal = $row['evafinal'];
 $comment1 = $row['comment1'];
 $comment2 = $row['comment2'];
 $comment3 = $row['comment3'];
 $comment4 = $row['comment4'];
 $comment5 = $row['comment5'];
 $comment6 = $row['comment6'];
 $totalmark = $row['total'];
 
 }
 // show form
 renderForm($id, $studentId, $postId, $studentName,$date,$interviewby,$evaedu,$evaexp,$evaskill,$evacomm,$evaent,$evafinal,$comment1,$comment2,$comment3,$comment4,$comment5,$comment6,$totalmark);
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



