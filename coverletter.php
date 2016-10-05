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
tblofferjob.offerdate FROM tblpartner INNER JOIN tblofferjob ON tblpartner.companyUsername = tblofferjob.companyId WHERE tblofferjob.studentId = '$studentId' AND tblofferjob.status = 'waiting' OR tblofferjob.status = 'interview' "))
    {
  if ($result->num_rows != 0) {

    $count1 = $mysqli->affected_rows;
    
}
}

include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tbljob.jobId,tblapplyjob.applyId,tblapplyjob.studentId,
tblapplyjob.postId,tblapplyjob.position,tblapplyjob.jstatus,tblapplyjob.aDate FROM tbljob
INNER JOIN tblapplyjob ON tbljob.jobId = tblapplyjob.postId
WHERE tblapplyjob.jstatus = 'approved' OR tblapplyjob.jstatus = 'rejected' OR tblapplyjob.jstatus = 'interview' AND tblapplyjob.studentId = '$studentId'"))
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
   



   <!-- dd menu -->
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
        <li><a href="notiIntraRequest.html" style="color:yellow;"><span class="glyphicon glyphicon-envelope"></span> Notification <span class="badge"><?php echo $total; ?></span></a></li> 
        </li>

        <li><a href="myResume.php" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> Resume</a></li>
        <li class="active"><a href="addCoverLetter.html" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> Cover Letter</a></li>
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

        <div class="row">
            <div class="col-lg-12 text-center">
  
  <h1>Create Cover Letter</h1>
  <p>&nbsp;</p>
  <div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Info!</strong> This information purpose is only to generate the Cover Letter. It won't be stored into the database.</br> You only need to fill and print this form if you are applying for non partner industrial company.
  </div>

</div>


<form action="addCoverLetter.php" method="POST">
        
        <p>&nbsp;</p>       
  <table border="0" width="800" align="center">
    <tr>
        <td><label for='txtposition' style="width:130px;">Position Applied</label></td>
        <td><input type="text" name="txtPosition" id="txtPosition" style="width:500px;float:left;" class="form-control" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
        <td><label for='txtcompany' style="width:130px;">Company Name</label></td>
        <td><input type="text" name="txtCompany" id="txtCompany" style="width:500px;float:left;" class="form-control" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
       <td><label for="txtAddress">Company Address<span class="required"></span></label></td>
      <td><textarea rows="2" type="text" id="txtAddress" name="txtAddress" style="width:500px;float:left;" class="form-control"/></textarea></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label for="txtCity">City<span class="required"></span></label></td>
      <td><input type="text" id="txtCity" name="txtCity" style="width:500px;float:left;" class="form-control"/></td>
      <td id="elmCityError" class="errorMsg">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label for="txtPostcode">Post Code<span class="required"></span></label></td>
      <td><input type="text" id="txtPostcode" name="txtPostcode" style="width:250px;float:left;" class="form-control"/></td>
      <td id="elmPostcodeError" class="errorMsg">&nbsp;</td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label for="selState">State<span class="required"></span></label></td>
      <td><select id="selState" name="selState" style="width:250px;float:left;" class="form-control">
        <option value="" selected>Please select...</option>
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
          </select></td>
      <td id="elmStateError" class="errorMsg">&nbsp;</td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label for="selCountry">Country<span class="required"></span></label></td>
      <td><select id="selCountry" name="selCountry" style="width:250px;float:left;" class="form-control">
          <option value="" selected>Please select...</option>
        <option value="Malaysia">Malaysia</option>
    </select></td>
      <td id="elmCountryError" class="errorMsg">&nbsp;</td></tr>
   </table>

     <p>&nbsp;</p>
     <table width="800" align="center">
      <tr><td>
      
      <input type="submit" value="Cancel" id="btnCancel" name="cancel" class="btn btn-danger" />
      <input type="submit" value="Preview" id="btnSubmit" name="submit" class="btn btn-success" />
      </td>
    </tr>
    </table>
     
  </form>
  <p>&nbsp;</p>


   </div>
        

        <!-- /.row -->
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

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>