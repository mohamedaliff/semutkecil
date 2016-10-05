<?php

session_start();
include ('Connections/connect.php');
include "libchart/classes/libchart.php";

if(@$_SESSION['admin']  ) {

?>
<?php


$total = null;
$count1 = null;
$count2 = null;
$count3 = null;

if ($total >= 0) {
     
include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT * FROM tblpartner WHERE registrationStatus='Not Active'"))
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
  
  
  $countbce = null;
  $countbce1 = null;
  $countbse = null;
  $countbse1 = null;
  $countbns = null;
  $countbns1 = null;
  $countbcss = null;
  $countbcss1 = null;
  $countbca = null;
  $countbca1 = null;
  $countbcem = null;
  $countbcem1 = null;
  $countbimd = null;
  $countbimd1 = null;

include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='INTRA' AND programme='Bachelor of Computer Engineering' "))
    {
  if ($result->num_rows != 0) {

    $countbce = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='eligible' AND programme='Bachelor of Computer Engineering' "))
    {
  if ($result->num_rows != 0) {

    $countbce1 = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='INTRA' AND programme='Bachelor of Information Technology (Hons.) in Networking Systems' "))
    {
  if ($result->num_rows != 0) {

    $countbns = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='eligible' AND programme='Bachelor of Information Technology (Hons.) in Networking Systems' "))
    {
  if ($result->num_rows != 0) {

    $countbns1 = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='INTRA' AND programme='Bachelor of Information Technology (Hons.) in Software Engineering' "))
    {
  if ($result->num_rows != 0) {

    $countbse = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='eligible' AND programme='Bachelor of Information Technology (Hons.) in Software Engineering' "))
    {
  if ($result->num_rows != 0) {

    $countbse1 = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='INTRA' AND programme='Bachelor of Information Technology (Hons.) in Computer System Security' "))
    {
  if ($result->num_rows != 0) {

    $countbcss = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='eligible' AND programme='Bachelor of Information Technology (Hons.) in Computer System Security' "))
    {
  if ($result->num_rows != 0) {

    $countbcss1 = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='INTRA' AND programme='Bachelor of Multimedia Technology (Hons.) in Computer Animation' "))
    {
  if ($result->num_rows != 0) {

    $countbca = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='eligible' AND programme='Bachelor of Multimedia Technology (Hons.) in Computer Animation' "))
    {
  if ($result->num_rows != 0) {

    $countbca1 = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='INTRA' AND programme='Bachelor of Multimedia Technology (Hons.) in Interactive Multimedia Design' "))
    {
  if ($result->num_rows != 0) {

    $countbimd = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='eligible' AND programme='Bachelor of Multimedia Technology (Hons.) in Interactive Multimedia Design' "))
    {
  if ($result->num_rows != 0) {

    $countbimd1 = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='INTRA' AND programme='Bachelor of Business Technology (Hons.) in Computer Entrepreneurial Management' "))
    {
  if ($result->num_rows != 0) {

    $countbcem = $mysqli->affected_rows;
    
}
}

if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE intrastatus='eligible' AND programme='Bachelor of Business Technology (Hons.) in Computer Entrepreneurial Management' "))
    {
  if ($result->num_rows != 0) {

    $countbcem1 = $mysqli->affected_rows;
    
}
}

    $chart = new PieChart();

    $dataSet = new XYDataSet();
    $dataSet->addPoint(new Point("BCE INTRA Student {$countbce}", $countbce));
    //$dataSet->addPoint(new Point("BCE Pending Student {$countbce1}", $countbce1));
    $dataSet->addPoint(new Point("BSE INTRA Student {$countbse}", $countbse));
    //$dataSet->addPoint(new Point("BSE Pending Student {$countbse1}", $countbse1));
    $dataSet->addPoint(new Point("BCSS INTRA Student {$countbcss}", $countbcss));
    //$dataSet->addPoint(new Point("BCSS Pending Student {$countbcss}", $countbcss));
    $dataSet->addPoint(new Point("BNS INTRA Student {$countbns}", $countbns));
    //$dataSet->addPoint(new Point("BNS Pending Student {$countbns1}", $countbns1));
    $dataSet->addPoint(new Point("BCA INTRA Student {$countbca}", $countbca));
    //$dataSet->addPoint(new Point("BCA Pending Student {$countbca1}", $countbca1));
    $dataSet->addPoint(new Point("BIMD INTRA Student {$countbimd}", $countbimd));
    //$dataSet->addPoint(new Point("BIMD Pending Student {$countbimd1}", $countbimd1));
    $dataSet->addPoint(new Point("BCEM INTRA Student {$countbcem}", $countbcem));
    //$dataSet->addPoint(new Point("BCEM Pending Student {$countbcem1}", $countbcem1));
    $chart->setDataSet($dataSet);

    $chart->setTitle("Students INTRA Status by Programme");
    $chart->render("generated/demo3.png");


    $chart = new VerticalBarChart();

    $serie1 = new XYDataSet();
    $serie1->addPoint(new Point("BCE", $countbce));
    $serie1->addPoint(new Point("BSE", $countbse));
    $serie1->addPoint(new Point("BCSS", $countbcss));
    $serie1->addPoint(new Point("BCA", $countbca));
    $serie1->addPoint(new Point("BIMD", $countbimd));
    $serie1->addPoint(new Point("BCEM", $countbcem));
    $serie1->addPoint(new Point("BNS", $countbns));
  
    $serie2 = new XYDataSet();
    $serie2->addPoint(new Point("BCE", $countbce1));
    $serie2->addPoint(new Point("BSE", $countbse1));
    $serie2->addPoint(new Point("BCSS", $countbcss1));
    $serie2->addPoint(new Point("BCA", $countbca1));
    $serie2->addPoint(new Point("BIMD", $countbimd1));
    $serie2->addPoint(new Point("BCEM", $countbcem1));
    $serie2->addPoint(new Point("BNS", $countbns1));
  
    $dataSet = new XYSeriesDataSet();
    $dataSet->addSerie("INTRA", $serie1);
    $dataSet->addSerie("Pending", $serie2);
    $chart->setDataSet($dataSet);
    $chart->getPlot()->setGraphCaptionRatio(0.65);

    $chart->setTitle("Students INTRA Status by Programme");
    $chart->render("generated/demo7.png");


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
.title {
    font-weight: bold;
    background-color: #393D5C;
    
    
}
.sub {
   
    background-color: #DBDBDE;
   }
.badge {
  background-color: red;

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
       <li class="dropdown">
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
         <li class="dropdown active">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:yellow;"><span class="glyphicon glyphicon-list-alt"></span> INTRA
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="partnerlist.php" style="color:yellow;">Partner List</a></li>
            <li><a href="studentlist.php" style="color:yellow;">Student List</a></li>
            <li class="dropdown-submenu"><a href="report.php" style="color:yellow;">Reports</a>
              <ul class="dropdown-menu">
                        <li><a href="report.php" style="color:yellow;">Overall INTRA Student</a></li>
                        <li><a href="report1.php" style="color:yellow;">INTRA Student by Programme</a></li>
                    </ul>
            </li>
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
            <div class="col-lg-12">
  
  <h1>Students INTRA Status</h1>

</div>

        <div class="row">
            <div class="col-md-8">
              <p>



      <br>

        <br>
      <table id="tbllist" align='center' border='0' width='750'>
      <tr>  
        <td width="750" align="center"><img alt="Pie chart"  src="generated/demo3.png" style="border: 1px solid orange;"/></td>
      </tr>
      <tr>
        <td width="750" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td width="750" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td width="750" align="center"><img alt="Line chart" src="generated/demo7.png" style="border: 1px solid orange;"/></td>
      </tr>
      </table>





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
    
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-printme.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  
</body>
<script>
    $("#btnpdf").click(function(){
      $("#list").printMe({ "path": "js/libs/bootstrap.min.css", "title": "INTRA Student Pie Chart" });
    });
</script>
</html>




<?php

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>