<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['admin']  ) {

?>
<?php
function renderForm($id, $name, $address, $city, $postcode, $state, $country, $email, $contact,$cuname)
 {

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
  
  <h1>Industrial Partner Details</h1>

</div>

        <div class="row">
            <div class="col-md-8">
              <p>


      <div align='right'>
      <button id='btnpdf' class='btn btn-info'>Download PDF</button>
      </div>
      <br>
      <div id="list">
        <br>
      <table id="tbllist" align='center' border='0' width='750'>
      <tr>  
        <td width="750">
      <div><input type="hidden" name="id" value="<?php echo $id; ?>"/></div>
      <div id='content' class='title bg-primary'>&nbsp;&nbsp;&nbsp;Company Details </div>


      <div class="sub"><br>&nbsp;&nbsp;&nbsp;Company Name: <?php echo $name; ?><br>&nbsp;</br></div>
      
      <div class="sub">&nbsp;&nbsp;&nbsp;Address: <?php echo $address . ", " . $postcode . ", " . $city . ", " . $state . ", " . $country;   ?><br>&nbsp;</br></div>         

      <div class="sub">&nbsp;&nbsp;&nbsp;Email: <?php echo $email; ?><br>&nbsp;</br></div>

      <div class="sub">&nbsp;&nbsp;&nbsp;Contact No: <?php echo $contact; ?><br>&nbsp;</br></div>
        </td>
      </tr>
      <tr width="750"><td>
<?php
    // connect to the database
    include('Connections/connect.php');


    
    if ($result = $mysqli->query("SELECT tblpartner.companyName,tblpartner.companyAddress,tblpartner.companyCity,
tblpartner.companyPostCode,tblpartner.companyState,tblpartner.companyCountry,tblpartner.companyEmail,tblpartner.companyPhone,
tblintra.studentId,tblintra.position,tblstudent.studentName,tblstudent.programme,tblstudent.level,tblpartner.companyId,tblpartner.registrationStatus,
tblpartner.companyUsername FROM tblpartner
INNER JOIN tblintra ON tblpartner.companyUsername = tblintra.cUname
INNER JOIN tblstudent ON tblintra.studentId = tblstudent.studentId WHERE companyId=$id"))
    {
  if ($result->num_rows != 0) {

  
     // display data in table

       echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='list' class='panel panel-warning tab' style='width:99%;'>";
      echo "<table align='center' border='0' width='750' class='table table-hover'>";
      echo "<tr> <th class='bg-warning'>Student ID</th> <th class='bg-warning'>Name</th> <th class='bg-warning'>Level</th> <th class='bg-warning'>Programme</th><th class='bg-warning'>Position / Country(Global Mobilization)</th></tr>";

     while($row = mysqli_fetch_array($result)) {

      
     
   // echo out the contents of each row into a table
    echo "<form id=\"Form".$row['studentId']."\" accept-charset='UTF-8'>";//DO THIS: ADD THIS
    echo "<input type='hidden' name='id' value='".$row['studentId']."'>";
    //DO THIS: ADD THIS
 
    echo "<tr>";

    echo '<td  width="100">' . $row['studentId'] . '</td>';
    echo '<td  width="200">' . $row['studentName'] . '</td>';;
    echo '<td  width="50">' . $row['level'] . '</td>';
    echo '<td  width="200">' . $row['programme'] . '</td>';
    echo '<td  width="200">' . $row['position'] . '</td>';
    echo "</tr>";
    echo "</form>";
  }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</center>";
    
    
  } else {

    echo "<table align='center' width='800' border='0'>";
    echo "<tbody>";
    echo "<tr>";
    echo "<td>";
    echo'<div class="alert alert-danger pop" align="center">';
    echo '<strong>Nothing to display</strong> ';
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

</td>
</tr>
</table>
</div>

<p>
<div align="right">
      <input type="submit" value="Cancel" id="btncancel" name="cancel" onclick="history.go(-1); "class="btn btn-danger" />
    </div>



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
      $("#list").printMe({ "path": "css/bootstrap.min.css", "title": "INTRA Student List" });
    });
</script>
</html>

<?php 
 }
 
 
 

 // connect to the database
include ('Connections/connect.php');
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];

    if ($result = $mysqli->query("SELECT tblpartner.companyName,tblpartner.companyAddress,tblpartner.companyCity,
tblpartner.companyPostCode,tblpartner.companyState,tblpartner.companyCountry,tblpartner.companyEmail,tblpartner.companyPhone,
tblintra.studentId,tblstudent.studentName,tblstudent.programme,tblstudent.level,tblpartner.companyId,tblpartner.registrationStatus,
tblpartner.companyUsername FROM tblpartner
INNER JOIN tblintra ON tblpartner.companyUsername = tblintra.cUname
INNER JOIN tblstudent ON tblintra.studentId = tblstudent.studentId WHERE companyId=$id")) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $name = $row['companyName'];
 $address = $row['companyAddress'];
 $city = $row['companyCity'];
 $postcode = $row['companyPostCode'];
 $state = $row['companyState'];
 $country = $row['companyCountry'];
 $email = $row['companyEmail'];
 $contact = $row['companyPhone'];
 $cuname = $row['companyUsername'];


 
 }
 // show form
 renderForm($id, $name, $address, $city, $postcode, $state, $country, $email, $contact,$cuname);
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