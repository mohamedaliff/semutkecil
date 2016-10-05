<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['admin']  ) {


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



include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tblpartner.companyName,tblpartner.companyAddress,tblpartner.companyCity,tblpartner.companyPostCode,
tblpartner.companyState,tblpartner.companyCountry,tblpartner.companyEmail,tblpartner.companyPhone,tblintra.studentId,tblstudent.studentName,
tblstudent.programme,tblstudent.level,tblpartner.companyId,tblpartner.registrationStatus FROM tblpartner
INNER JOIN tblintra ON tblpartner.companyUsername = tblintra.cUname
INNER JOIN tblstudent ON tblintra.studentId = tblstudent.studentId"))
    {
  if ($result->num_rows != 0) {

      $countstudent = $mysqli->affected_rows;   
      
}
}


if (isset($_POST['submit']))
{

  $intra = mysqli_real_escape_string($mysqli, $_POST['intra']);
  $any = mysqli_real_escape_string($mysqli, $_POST['any']);
  $status = mysqli_real_escape_string($mysqli, $_POST['status']);
  

  if ($intra != "" && $any == "" && $status == "") {

    if($intra == 'Yes'){

    $where_sql = " WHERE cUname IS NOT NULL ";

  }else if ($intra == 'No'){

    $where_sql = " WHERE cUname IS NULL  ";

  }else{
    $where_sql ="";
  }

 } else if ($intra != "" && $any != "" && $status == "") {

    if($intra == 'Yes'){

    $where_sql = " WHERE (cUname IS NOT NULL AND companyName LIKE '{$any}%') OR (cUname IS NOT NULL AND companyName LIKE '%{$any}') OR (cUname IS NOT NULL AND companyName LIKE '%{$any}%')";

  }else if ($intra == 'No'){

    $where_sql = " WHERE (cUname IS NULL AND companyName LIKE '{$any}%') OR (cUname IS NULL AND companyName LIKE '%{$any}') OR (cUname IS NULL AND companyName LIKE '%{$any}%')";


  }else{
    $where_sql ="";
  }
   

}else if ($intra != "" && $any == "" && $status != ""){

     if($intra == 'Yes'){

    $where_sql = " WHERE (cUname IS NOT NULL AND registrationStatus = '{$status}')";

  }else if ($intra == 'No'){

    $where_sql = " WHERE (cUname IS NULL AND registrationStatus = '{$status}')";


  }else{
    $where_sql ="";
  } 

    

}else if ($intra == "" && $any != "" && $status != "") {

    $where_sql = " WHERE (registrationStatus = '{$status}' AND companyName LIKE '{$any}%') OR (registrationStatus = '{$status}' companyName LIKE '%{$any}') OR (registrationStatus = '{$status}' AND companyName LIKE '%{$any}%')";

}else if ($intra == "" && $any == "" && $status != "") {

    $where_sql = " WHERE (registrationStatus = '{$status}')";

} else if ($intra == "" && $any != "" && $status == "") {

    $where_sql = " WHERE (companyName LIKE '{$any}%' OR companyName LIKE '%{$any}' OR companyName LIKE '%{$any}%' )";

} else if ($intra != "" && $any != "" && $status != "") {

  if($intra == 'Yes'){

    $where_sql = " WHERE (companyName LIKE '{$any}%' AND cUname IS NOT NULL AND companyName LIKE '{$any}%') OR (companyName LIKE '%{$any}' AND cUname IS NOT NULL AND companyName LIKE '%{$any}') OR (companyName LIKE '%{$any}%' AND cUname IS NOT NULL AND companyName LIKE '%{$any}%')";

  }else if ($intra == 'No'){

    $where_sql = " WHERE (companyName LIKE '%{$any}%' AND cUname IS NULL AND companyName LIKE '{$any}%') OR (companyName LIKE '%{$any}%' AND cUname IS NULL AND companyName LIKE '%{$any}') OR (companyName LIKE '%{$any}%' AND cUname IS NULL AND companyName LIKE '%{$any}%')";

  }else{
    $where_sql ="";
  }


} else {
  $where_sql = "";
}

}else {
  $where_sql = "";
}

$group = "ORDER BY companyName ASC";

$result = $mysqli->query("SELECT tblpartner.companyId,tblpartner.companyName,tblpartner.companyRegistration,
tblpartner.companyNo,tblpartner.companyAddress,tblpartner.companyCity,tblpartner.companyPostCode,tblpartner.companyState,
tblpartner.companyCountry,tblpartner.companyEmail,tblpartner.companyPhone,tblpartner.companyFax,tblpartner.companyUsername,
tblpartner.companyPassword,tblpartner.registrationStatus,tblintra.cUname FROM tblpartner
LEFT OUTER JOIN tblintra ON tblpartner.companyUsername = tblintra.cUname  ".$where_sql." ".$group." ");


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
.tab{
  margin-left:1em;
}
.placeholder1{
  color: #A4A4A4;
}
select option:first-child{
  color: #A4A4A4; display: none;
}
select option{
  color: #555;
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
  
  <h1>Industrial Partner List</h1>
  <p>&nbsp;</p>

</div>
<div class="row">
            <div class="col-md-8 ">
  <?php
                        // connect to the database
  include('Connections/connect.php');
  

   if ($result->num_rows != 0)
   {

    

echo "<p>";              
echo "<div id='body'>";
echo "<br>";
echo "<div align='right'>";
echo "<button id='btnpdf' class='btn btn-info'>Download PDF</button>";
echo "</div>";
echo "<br>";
echo "<div id='list' class='panel panel-warning tab' style='width:99%;'>";
echo "<table align='center' border='0' width='700' class='table table-hover'>";
echo "<tr> <th class='bg-warning'>Company Name</th><th class='bg-warning'>Status</th><th class='bg-warning'>INTRA Students</th> </tr>";

while($row = mysqli_fetch_array($result)) {
  
  // echo out the contents of each row into a table
   echo "<form id=\"Form".$row['companyId']."\" accept-charset='UTF-8'>";//DO THIS: ADD THIS
    echo "<input type='hidden' name='id' value='".$row['companyId']."'>";//DO THIS: ADD THIS
 
    echo "<tr>";
    echo '<td  width="500">' . $row['companyName'] . '</td>';


      if ($row['registrationStatus'] == "Active") {
        $status = "Active";
      } else if ($row['registrationStatus'] == "Not active") {
        $status = "Not Active";
      } else {
        $status = "Blacklist";
      }



    echo '<td  width="100">' . $status . '</td>';

      if ($row['cUname'] == "" || is_null($row['cUname'])) {
        
        echo '<td  width="100">None</td>';

      } else {
        
        echo "<td  width='100'>";
        echo '<a href="viewPartner.php?id=' . $row['companyId'] . '" title="Click to view the list of students" >'.$countstudent.' Students</a>';
        echo "</td>";

      }

    
    echo "</tr>";
    echo "</form>";
  }

// close table>
echo "</table>";
echo "</div>";
echo "</div>";
echo "</center>";
} else{
   
echo "<table class='error' width='700' border='0' bgcolor='#FF00FF' align='left'>";
    echo "<tbody>";
    echo '<tr>';
    echo '<td>';
    echo '<div style="color:red;font-weight:bold">' . '&nbsp;' . 'No record found for the following criteria.' . '</div>';
    echo '<div style="color:red;font-weight:bold">' . '&nbsp;' . 'Please refine your search by trying following suggestion.' .'</div>';
    echo '<div style="color:red">' . '&nbsp;' . '<img src="image/marker.gif" alt = "a" >'. ' Check your spelling.' .'</div>';
    echo '<div style="color:red">' . '&nbsp;' . '<img src="image/marker.gif" alt = "a" >' . ' Use suggestion list in the dropdown list.' .'</div>';
    echo '</td>';
    echo '</tr>';
    echo "<tr>";
    echo '<td>' . '&nbsp;' . '</td>';
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";

} 

$mysqli->close();

?>
</div>
 <div class="col-md-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i><span class="glyphicon glyphicon-search"></span> Search Criteria</h4>
                    </div>
                    <div class="panel-body">
                        <form name = "searchForm"  method="POST" action="partnerlist.php">
                        <p><input type="text" name="any" id="any" class="form-control" placeholder="Search by company name"/></p>
                        <p><select name="intra" id="intra" class="form-control placeholder1">
                                <option value="" selected>All Company</option>
                                <option value="Yes">Company with INTRA students</option>
                                <option value="No">Company without INTRA students</option>
                            </select></p>
                        <p><select name="status" id="status" class="form-control placeholder1">
                                <option value="" selected>Registration Status</option>
                                <option value="Active">Active</option>
                                <option value="Not Active">Not Active</option>
                                <option value="Blacklist">Blacklist</option>
                            </select></p>
                        
                        <p></p>
                        <p><input type="submit" value="Search" id="btnSubmit" name="submit" class="btn btn-success" /></p>
                         </form>
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
      $("#list").printMe({ "path": "css/bootstrap.min.css", "title": "Partner List" });
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