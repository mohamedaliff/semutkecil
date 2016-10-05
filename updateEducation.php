<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {



?>
<?php


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
        <h3>Education Background</h3>
        <hr/>
        <div class="col-xs-3"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left">
            <li><a href="myResume.php" data-toggle="tab">My Resume</a></li>
            <li><a href="myPersonalInfo.php" data-toggle="tab">Personal Information</a></li>
            <li><a href="myLanguage.php" data-toggle="tab">Communication Skills</a></li>
            <li><a href="mySkill.php" data-toggle="tab">Computer Skills</a></li>
            <li class="active"><a href="myEducation.php" data-toggle="tab">Education Background</a></li>
            <li><a href="myCocuriculum.php" data-toggle="tab">Cocuriculum Activities</a></li>
            <li><a href="myAchievement.php" data-toggle="tab">Achievement Awards</a></li>
            <li><a href="myExperience.php" data-toggle="tab">Job Experiences</a></li>
          </ul>
        </div>

        <div class="col-xs-9">
          <!-- Tab panes -->
          <div class="tab-content">
            
            
<form id="formEducation" method="POST" action="">
    

<?php
    // connect to the database
    include('Connections/connect.php');

    $studentId = ($_SESSION['student']);
    
    if ($result = $mysqli->query("SELECT * FROM tbleducation WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table                
      echo "<div id='body'>";
      echo "<div id='content'>";
      echo "<table align='center' border='0' width='570' >";
      //echo "<tr> <th>Language</th> <th>Spoken</th>  <th>Writen</th></tr>";class='table table-hover'

     while($row = mysqli_fetch_array($result)) {
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo "<td  width='150'><span style='font-weight:bold;text-decoration:underline;'>" ."Tertiary Education" ."</td>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";  
    echo "<tr>";
    echo "<td  width='150'><span style='font-weight:bold;'>" ."School/Institute :" ."</td>";
    echo '<td><input required type="text" id="txtInstitute" name="txtInstitute" value="' . $row['institute'] . '"style="width:350px;float:left;" class="form-control"/><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."State :" ."</td>";
    echo '<td><select required id="selState" name="selState" style="width:250px;float:left;" class="form-control">
        <option value="' . $row['state'] . '" selected>' . $row['state'] . '</option>
        <option value="Selangor">Selangor</option>
        <option value="Kuala Lumpur">Kuala Lumpur</option>
        <option value="Sarawak">Sarawak</option>
        <option value="Johor">Johor</option>
        <option value="Pulau Pinang">Pulau Pinang</option>
        <option value="Sabah">Sabah</option>
        <option value="Perak">Perak</option>
        <option value="Pahang">Pahang</option>
        <option value="Negeri Sembilan">Negeri Sembilan</option>
        <option value="Kedah">Kedah</option>
        <option value="Melaka">Melaka</option>
        <option value="Terengganu">Terengganu</option>
        <option value="Kelantan">Kelantan</option>
        <option value="Perlis">Perlis</option>
        <option value="Labuan">Labuan</option>
        <option value="Putrajaya">Putrajaya</option>
          </select><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Qualification :" ."</td>";
    echo '<td><select required id="selQualification" name="selQualification" style="width:250px;float:left;" class="form-control">
        <option value="' . $row['qualification'] . '" selected>' . $row['qualification'] . '</option>
        <option value="SPM">SPM</option>
        <option value="STPM">STPM</option>
        <option value="SKM">SKM</option>
        <option value="Diploma">Diploma</option>
        <option value="Degree">Degree</option>
          </select><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Field of Study :" ."</td>";
    echo '<td><input required type="text" id="txtField" name="txtField" value="' . $row['studyfield'] . '" style="width:350px;float:left;" class="form-control"/><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Result/CGPA :" ."</td>";
    echo '<td><input required type="text" id="txtResult" name="txtResult" style="width:250px;float:left;" class="form-control" value="' . $row['result'] . '"/><span style="width:80px;color:red;"> *</span></td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Year of Completion :" ."</td>";
    echo '<td><input required type="text" id="txtYear" name="txtYear" style="width:100px;float:left;" class="form-control" value="' . $row['year'] . '"/><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    
    echo "<tr>";
    echo "<td  width='150'><span style='font-weight:bold;text-decoration:underline;'>" ."Secondary Education" ."</td>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";  
    echo "<tr>";
    echo "<td  width='150'><span style='font-weight:bold;'>" ."School :" ."</td>";
    echo '<td><input required type="text" id="txtInstitute1" name="txtInstitute1" value="' . $row['institute1'] . '"style="width:350px;float:left;" class="form-control"/><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."State :" ."</td>";
    echo '<td><select required id="selState1" name="selState1" style="width:250px;float:left;" class="form-control">
        <option value="' . $row['state1'] . '" selected>' . $row['state1'] . '</option>
        <option value="Selangor">Selangor</option>
        <option value="Kuala Lumpur">Kuala Lumpur</option>
        <option value="Sarawak">Sarawak</option>
        <option value="Johor">Johor</option>
        <option value="Pulau Pinang">Pulau Pinang</option>
        <option value="Sabah">Sabah</option>
        <option value="Perak">Perak</option>
        <option value="Pahang">Pahang</option>
        <option value="Negeri Sembilan">Negeri Sembilan</option>
        <option value="Kedah">Kedah</option>
        <option value="Melaka">Melaka</option>
        <option value="Terengganu">Terengganu</option>
        <option value="Kelantan">Kelantan</option>
        <option value="Perlis">Perlis</option>
        <option value="Labuan">Labuan</option>
        <option value="Putrajaya">Putrajaya</option>
          </select><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Qualification :" ."</td>";
    echo '<td><select required id="selQualification1" name="selQualification1" style="width:250px;float:left;" class="form-control">
        <option value="' . $row['qualification1'] . '" selected>' . $row['qualification1'] . '</option>
        <option value="SPM">SPM</option>
        <option value="STPM">STPM</option>
        <option value="SKM">SKM</option>
        <option value="Diploma">Diploma</option>
        <option value="Degree">Degree</option>
          </select><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Field of Study :" ."</td>";
    echo '<td><input required type="text" id="txtField1" name="txtField1" value="' . $row['studyfield1'] . '" style="width:350px;float:left;" class="form-control"/><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Result/CGPA :" ."</td>";
    echo '<td><input required type="text" id="txtResult1" name="txtResult1" style="width:250px;float:left;" class="form-control" value="' . $row['result1'] . '"/><span style="width:80px;color:red;"> *</span></td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Year of Completion :" ."</td>";
    echo '<td><input required type="text" id="txtYear1" name="txtYear1" style="width:100px;float:left;" class="form-control" value="' . $row['year1'] . '"/><span style="width:80px;color:red;"> *</span></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";


    echo "<tr>";
    echo "<td  width='150'><span style='font-weight:bold;text-decoration:underline;'>" ."Other (Additional)" ."</td>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";  
    echo "<tr>";
    echo "<td  width='150'><span style='font-weight:bold;'>" ."School/Institute :" ."</td>";
    echo '<td><input required type="text" id="txtInstitute2" name="txtInstitute2" value="' . $row['institute2'] . '"style="width:350px;float:left;" class="form-control"/></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."State :" ."</td>";
    echo '<td><select required id="selState2" name="selState2" style="width:250px;float:left;" class="form-control">
        <option value="' . $row['state2'] . '" selected>' . $row['state2'] . '</option>
        <option value="Selangor">Selangor</option>
        <option value="Kuala Lumpur">Kuala Lumpur</option>
        <option value="Sarawak">Sarawak</option>
        <option value="Johor">Johor</option>
        <option value="Pulau Pinang">Pulau Pinang</option>
        <option value="Sabah">Sabah</option>
        <option value="Perak">Perak</option>
        <option value="Pahang">Pahang</option>
        <option value="Negeri Sembilan">Negeri Sembilan</option>
        <option value="Kedah">Kedah</option>
        <option value="Melaka">Melaka</option>
        <option value="Terengganu">Terengganu</option>
        <option value="Kelantan">Kelantan</option>
        <option value="Perlis">Perlis</option>
        <option value="Labuan">Labuan</option>
        <option value="Putrajaya">Putrajaya</option>
          </select></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Qualification :" ."</td>";
    echo '<td><select required id="selQualification2" name="selQualification2" style="width:250px;float:left;" class="form-control">
        <option value="' . $row['qualification2'] . '" selected>' . $row['qualification2'] . '</option>
        <option value="SPM">SPM</option>
        <option value="STPM">STPM</option>
        <option value="SKM">SKM</option>
        <option value="Diploma">Diploma</option>
        <option value="Degree">Degree</option>
          </select></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Field of Study :" ."</td>";
    echo '<td><input required type="text" id="txtField2" name="txtField2" value="' . $row['studyfield2'] . '" style="width:350px;float:left;" class="form-control"/></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Result/CGPA :" ."</td>";
    echo '<td><input required type="text" id="txtResult2" name="txtResult2" style="width:250px;float:left;" class="form-control" value="' . $row['result2'] . '"/></td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp;" .'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>'. "&nbsp;" .'</td>';
    echo '<td>'. "&nbsp; ".'</td>';
    echo "</tr>";
    echo "<tr>";
    echo "<td><span style='font-weight:bold;'>" ."Year of Completion :" ."</td>";
    echo '<td><input required type="text" id="txtYear2" name="txtYear2" style="width:100px;float:left;" class="form-control" value="' . $row['year2'] . '"/></td>';
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
  } 
}

                          // close database connection
  $mysqli->close();

?>
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

       

  
</body>
</html>

<?php 
 
 
 
 

 // connect to the database
include ('Connections/connect.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data

 // get form data, making sure it is valid
 $institute = ($_POST['txtInstitute']);
 $state = ($_POST['selState']);
 $qualification = ($_POST['selQualification']);
 $field = ($_POST['txtField']);
 $result = ($_POST['txtResult']);
 $year = ($_POST['txtYear']);

 $institute1 = ($_POST['txtInstitute1']);
 $state1 = ($_POST['selState1']);
 $qualification1 = ($_POST['selQualification1']);
 $field1 = ($_POST['txtField1']);
 $result1 = ($_POST['txtResult1']);
 $year1 = ($_POST['txtYear1']);

 $institute2 = ($_POST['txtInstitute2']);
 $state2 = ($_POST['selState']);
 $qualification2 = ($_POST['selQualification2']);
 $field2 = ($_POST['txtField2']);
 $result2 = ($_POST['txtResult2']);
 $year2 = ($_POST['txtYear2']);

 $date = (date("d/m/Y"));
 $studentId = ($_SESSION['student']);


 
 
 // save the data to the database
 if ($stmt = $mysqli->prepare("UPDATE tbleducation SET institute = ?, state = ?, qualification = ?, studyfield = ?,   result= ?, year=?, institute1 = ?, state1 = ?, qualification1 = ?, studyfield1 = ?,   result1= ?, year1=?,institute2 = ?, state2 = ?, qualification2 = ?, studyfield2 = ?,   result2= ?, year2=? WHERE studentId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
        $stmt->bind_param("sssssssssssssssssss",$institute, $state, $qualification, $field, $result,$year,$institute1, $state1, $qualification1, $field1, $result1,$year1,$institute2, $state2, $qualification2, $field2, $result2,$year2,$studentId); 
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
      alert('Education Updated ...')
      window.location='myEducation.php'
      </script>
<?php

//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
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