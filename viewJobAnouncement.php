<?php

session_start();
include ('Connections/connect.php');

if( @$_SESSION['admin']) {

?>
<?php
function renderForm($id, $title, $position1, $position2, $position3, $description, $requirement, $cgpa, $alowance, $name)
 {

$total = null;
$count1 = null;
$count2 = null;
$count3 = null;

if ($total >= 0) {
     
include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT * FROM tblpartner WHERE registrationStatus='Not active'"))
    {
  if ($result->num_rows != 0) {

    $count1 = $mysqli->affected_rows;
    
}
}

include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tbljob.jobId, tbljob.title, tbljob.position1, tbljob.position2, tbljob.position3, tbljob.description1, tbljob.requirement1, tbljob.mincgpa1, tbljob.alowance1, tbljob.status, tbljob.pdate, tbljob.companyId, tblpartner.companyName FROM tbljob INNER JOIN tblpartner ON tbljob.companyId = tblpartner.companyUsername WHERE tbljob.status = 'not active' ORDER BY tbljob.pDate DESC"))
    {
  if ($result->num_rows != 0) {

    $count2 = $mysqli->affected_rows;

    
}
}

include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tblother.otherId,tblother.othertitle,tblother.otherdescription,tblother.otherdate,tblother.otherstatus,
tblother.companyId,tblpartner.companyName FROM tblother
INNER JOIN tblpartner ON tblother.companyId = tblpartner.companyUsername WHERE tblother.otherstatus = 'not active' ORDER BY tblother.otherdate DESC"))
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
.pop {
    width: 500px;
    
}
.badge {
  background-color: red;

}
.title {
    font-weight: bold;
    background-color: #393D5C;
    
    
}
.sub {
   
    background-color: #DBDBDE;
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
        <li><a href="homeAdmin.html" style="color:yellow;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
       <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:yellow;"><span class="glyphicon glyphicon-envelope"></span> Notification <span class="badge"><?php echo $total; ?></span>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">   
            <li><a href="partnerApprovalForm.php" style="color:yellow;">Partner Registration Request <span class="badge"><?php echo $count1; ?></span></a></li>
            <li><a href="approveJobPost.html" style="color:yellow;">Job Advertisement Request <span class="badge"><?php echo $count2; ?></span></a></li>
            <li><a href="approveOtherPost.html" style="color:yellow;">Other Advertisement Request <span class="badge"><?php echo $count3; ?></span></a></li>  
          </ul>
      </li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> Announcement
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="postAnouncement.html" style="color:yellow;">Post Announcement</a></li>
            <li><a href="manageAnouncement.html" style="color:yellow;">Manage Announcement</a></li>
          </ul>
      </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> INTRA
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="partnerlist.php" style="color:yellow;">Partner List</a></li>
            <li><a href="studentlist.php" style="color:yellow;">Student List</a></li>
          </ul>
      </li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="changePasswordAdmin.html" style="color:yellow;"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
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
            <div class="col-md-8">
              <p>
     

<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<div id='content' class='title bg-primary' style='font-weight:bold;'>Job Information<br>&nbsp;</br></div>
<div class="sub"><font style="font-weight:bold;">Company Name: </font> <?php echo $name; ?><br>&nbsp;</br></div>  
<div class="sub"><font style="font-weight:bold;">Title: </font> <?php echo $title; ?><br>&nbsp;</br></div>

<div class="sub"><font style="font-weight:bold;">Position: </font><?php echo $position1; ?><br>&nbsp;</br></div> 
<div class="sub"><font style="font-weight:bold;">Job Description: </font><br>&nbsp;</br></div> 
<div class="sub"><?php echo nl2br($description); ?><br>&nbsp;</br></div> 
<div class="sub"><font style="font-weight:bold;">Requirements: </font></br></div> 
<div class="sub"><?php echo nl2br($requirement); ?><br>&nbsp;</br></div>  
<div class="sub"><font style="font-weight:bold;">Minimum CGPA: </font><?php echo $cgpa; ?><br>&nbsp;</br></div> 
<div class="sub"><font style="font-weight:bold;">Monthly Allowance: </font><?php if ($alowance < 101){
          echo "Not Available";
        } else if ($alowance < 201){
          echo "RM 100-200";
          } else if ($alowance < 301){
          echo "RM 200-300";
          } else if ($alowance < 401){
          echo "RM 300-400";
          } else if ($alowance < 501){
          echo "RM 400-500";
          } else if ($alowance <= 1000){
          echo "RM 500-1000";
          } else {
            echo "Above RM 1000";
          } ?><br>&nbsp;</br></div> 

    <p>&nbsp;</p>

     <div align="right">
      <input type="submit" value="Cancel" id="btncancel" name="cancel" onclick="history.go(-1);" class="btn btn-danger" />
      <input type="submit" value="Reject" id="btnreject" name="reject"  class="btn btn-warning" />
      <input type="submit" value="Approve" id="btnSubmit" name="submit"  class="btn btn-success" />
      </div>

  </form>


   </div>
<div class="col-md-4">
  <p>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i><span class="glyphicon glyphicon-menu-hamburger"></span> Navigation</h4>
                    </div>
                    <div class="panel-body">
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="partnerApprovalForm.php"> Partner Registration Request</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="approveJobPost.html"> Job Advertisement Request</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="adminIntraRequest.php"> Student INTRA request</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="postAnouncement.html"> Post Announcement</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="manageAnouncement.html"> Manage Announcement</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="partnerlist.php"> Partner List</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="studentlist.php"> Student List</a></p>
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

 $status = "active";

 // save the data to the database
 if ($stmt = $mysqli->prepare("UPDATE tbljob SET status = ? WHERE jobId=?"))
      {
         
        $stmt->bind_param("si",$status, $id); 
        $stmt->execute();
        $stmt->close();
?>
      <script>
      alert('Job Anouncement Request Approved ...')
      window.location='approveJobPost.html'
      </script>
<?php

//return this string to js if form success
      } else {
         echo "ERROR: could not prepare SQL statement.";
      } 

  }

 } else if (isset($_POST['reject'])) { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id'])) {
 // get form data, making sure it is valid
 $id = $_POST['id'];

if ($stmt1 = $mysqli->prepare("DELETE FROM tbljob WHERE jobId = ? LIMIT 1")) {
         $stmt1->bind_param("i",$id);   
         $stmt1->execute();
         $stmt1->close();

?>
      <script>
      alert('Job Anouncement Request Rejected ...')
      window.location='approveJobPost.html'
      </script>
<?php
      } else {
         echo "ERROR: could not prepare SQL statement.";
      }
      
}
} 

 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];

    if ($result = $mysqli->query("SELECT tbljob.jobId, tbljob.title, tbljob.position1, tbljob.position2, tbljob.position3, tbljob.description1, tbljob.requirement1, tbljob.mincgpa1, tbljob.alowance1, tbljob.status, tbljob.pdate, tbljob.companyId, tblpartner.companyName FROM tbljob INNER JOIN tblpartner ON tbljob.companyId = tblpartner.companyUsername WHERE jobId=$id")) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $title = $row['title'];
 $position1 = $row['position1'];
 $description = $row['description1'];
 $requirement = $row['requirement1'];
 $cgpa = $row['mincgpa1'];
 $alowance = $row['alowance1'];
 $position2 = $row['position2'];
 $position3 = $row['position3'];
 $date = (date("d/m/Y"));
 $name = $row['companyName'];

 
 }
 // show form
 renderForm($id, $title, $position1, $position2, $position3, $description, $requirement, $cgpa, $alowance, $name);
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