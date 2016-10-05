<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {

?>
<?php
function renderForm($id, $position, $company, $fromMonth, $fromYear, $toMonth, $toYear, $description, $referenceName, $referenceNo)
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

    <meta name="keywords" content="" />
     <meta name="description" content="" />
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
        <h3>Job Experience</h3>
        <hr/>
        <div class="col-xs-3"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left">
              <li><a href="myResume.php" data-toggle="tab">My Resume</a></li>
              <li><a href="myPersonalInfo.php" data-toggle="tab">Personal Information</a></li>
              <li><a href="myLanguage.php" data-toggle="tab">Language Proficiency</a></li>
              <li><a href="mySkill.php" data-toggle="tab">Computer Skills</a></li>
              <li><a href="myEducation.php" data-toggle="tab">Academic Background</a></li>
              <li><a href="myCocuriculum.php" data-toggle="tab">Co-curricular Activities</a></li>
              <li><a href="myAchievement.php" data-toggle="tab">Achievement / Awards</a></li>
              <li class="active"><a href="myExperience.php" data-toggle="tab">Job Experience</a></li>
            </ul>
        </div>

        <div class="col-xs-9">
          <!-- Tab panes -->
          <div class="tab-content">
            
            
<form id="formExperience" method="POST" action="">
    
<table>
    <tr>
      <td><input type="hidden" name="id" value="<?php echo $id; ?>"/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td><label for="txtPosition" style="width:130px;">Position Title<span class="required"></span></label></td>
      <td><input type="text" id="txtPosition" name="txtPosition" value="<?php echo $position; ?>" style="width:350px;float:left;" class="form-control"/></td>
      <td id="elmPositionError" class="errorMsg">&nbsp;</td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label for="txtCompany" style="width:130px;">Company Name <span class="required"></span></label></td>
      <td><input type="text" id="txtCompany" name="txtCompany" value="<?php echo $company; ?>" style="width:350px;float:left;" class="form-control"/></td>
      <td id="elmCompanyError" class="errorMsg">&nbsp;</td></tr>
      <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label for="txtDuration" style="width:130px;">Joined Duration<span class="required"></span></label></td>
      <td><select id="selMonth" name="selMonth" style="width:100px;float:left;" class="form-control">
        <option value="<?php echo $fromMonth; ?>" selected><?php echo $fromMonth; ?> </option>
        <option value="Jan">Jan</option>
        <option value="Feb">Feb</option>
        <option value="Mar">Mar</option>
        <option value="Apr">Apr</option>
        <option value="May">May</option>
        <option value="Jun">Jun</option>
        <option value="Jul">Jul</option>
        <option value="Aug">Aug</option>
        <option value="Sep">Sep</option>
        <option value="Oct">Oct</option>
        <option value="Nov">Nov</option>
        <option value="Dec">Dec</option>
          </select>
      <input type="text" id="txtYear" name="txtYear" value="<?php echo $fromYear; ?>" onclick="select()" style="width:100px;float:left;" class="form-control"/></td>
      <td id="elmYearError" class="errorMsg">&nbsp;</td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>To</td>
      <td>&nbsp;</td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td><select id="selMonth1" name="selMonth1" style="width:100px;float:left;" class="form-control">
        <option value="<?php echo $toMonth; ?>" selected><?php echo $toMonth; ?> </option>
        <option value="Jan">Jan</option>
        <option value="Feb">Feb</option>
        <option value="Mar">Mar</option>
        <option value="Apr">Apr</option>
        <option value="May">May</option>
        <option value="Jun">Jun</option>
        <option value="Jul">Jul</option>
        <option value="Aug">Aug</option>
        <option value="Sep">Sep</option>
        <option value="Oct">Oct</option>
        <option value="Nov">Nov</option>
        <option value="Dec">Dec</option>
          </select>
      <input type="text" id="txtYear1" name="txtYear1" value="<?php echo $toYear; ?>" onclick="select()" style="width:100px;float:left;" class="form-control"/></td>
      <td id="elmYear1Error" class="errorMsg">&nbsp;</td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <td><label for="txtDescription" style="width:130px;">Job Description<span class="required"></span></label></td>
      <td><textarea rows="4" type="text" id="txtDescription" name="txtDescription"  style="width:350px;float:left;" class="form-control"/><?php echo htmlspecialchars($description); ?></textarea></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <td><label for="txtReference" style="width:130px;">Referee Name<span class="required"></span></label></td>
      <td><input type="text" id="txtReference" name="txtReference" value="<?php echo $referenceName; ?>" style="width:350px;float:left;" class="form-control"/></td>
      <td id="elmReferenceError" class="errorMsg">&nbsp;</td></tr>
     <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr> 
    <td><label for="txtContact" style="width:130px;">Referee Contact No<span class="required"></span></label></td>
      <td><input type="text" id="txtContact" name="txtContact" value="<?php echo $referenceNo; ?>" style="width:200px;float:left;" class="form-control"/></td>
      <td id="elmContactError" class="errorMsg">&nbsp;</td></tr>
    </table>
     <p>&nbsp;</p>
      <input type="submit" value="Save" id="btnSubmit" name="submit" class="btn btn-success" />
      <input type="submit" value="Cancel" id="btnCancel" name="cancel" onclick="history.go(-1);" class="btn btn-danger" />
     

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
 }
 
 
 

 // connect to the database
include ('Connections/connect.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['id'];
 // get form data, making sure it is valid
 $position = ($_POST['txtPosition']);
 $company = ($_POST['txtCompany']);
 $fromMonth = ($_POST['selMonth']);
 $fromYear = ($_POST['txtYear']);
 $toMonth = ($_POST['selMonth1']);
 $toYear = ($_POST['txtYear1']);
 $description = ($_POST['txtDescription']);
 $referenceName = ($_POST['txtReference']);
 $referenceNo = ($_POST['txtContact']);
 $date = (date("d/m/Y"));
 $studentId = ($_SESSION['student']);

 
 // check to make sure both fields are entered
 if ($position == '' || $company == '' || $toYear == '' || $fromYear == '' || $description == '' || $referenceName == '' || $referenceNo == '')
{
 // generate error message
 ?>
      <script>
      alert('Please fill the fields ...')
      //window.location='editExperience.html'
      </script>
<?php
 
 //error, display form
 //renderForm($id, $position, $company, $fromMonth, $fromYear, $toMonth, $toYear, $description, $referenceName, $referenceNo);
 }
 else
 {
 // save the data to the database
 if ($stmt = $mysqli->prepare("UPDATE tblexperience SET position = ?, company = ?, fromMonth = ?, fromYear = ?,   toMonth= ? , toYear = ?,  description = ?,  referenceName = ?,  referenceNo = ? WHERE experienceId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
        $stmt->bind_param("sssssssssi",$position, $company, $fromMonth, $fromYear, $toMonth, $toYear, $description, $referenceName, $referenceNo,$id); 
        $stmt->execute();
        $stmt->close();


//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      } 

      if ($stmt = $mysqli->prepare("UPDATE tbllastupdate SET lastupdate = ? WHERE studentId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
        $stmt->bind_param("ss",$date, $studentId); 
        $stmt->execute();
        $stmt->close();
?>
      <script>
      alert('Experience Updated ...')
      window.location='editExperience.html'
      </script>
<?php

//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      }

  }

 }
} 

 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];
     $studentId = ($_SESSION['student']);

    if ($result = $mysqli->query("SELECT * FROM tblexperience WHERE studentId=$studentId AND experienceId=$id")) {
  
  if ($result->num_rows != 0) {
     

     if($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $position = $row[1];
 $company = $row[2];
 $fromMonth = $row[3];
 $fromYear = $row[4];
 $toMonth = $row[5];
 $toYear = $row[6];
 $description = $row[7];
 $referenceName = $row[8];
 $referenceNo = $row[9];
 
 
 }
 // show form
 renderForm($id, $position, $company, $fromMonth, $fromYear, $toMonth, $toYear, $description, $referenceName, $referenceNo);
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