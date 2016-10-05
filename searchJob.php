

<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UniKl MIIT INTRA Management System</title>
     <link rel="icon" type="image/ico" href="image/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
 .banner {
    width: 100%;
    height: 100px;
    border: 0px solid #73AD21;
}
.placeholder1{color: #A4A4A4;}
select option:first-child{color: #A4A4A4; display: none;}
select option{color: #555;} 
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
        <li><a href="homeStudent.html">Home</a></li>
        <li  class="active"><a href="searchJob.html">Search INTRA</a></li> 
        <li><a href="notification.html">Notification</a></li> 
        </li>
        <li><a href="myResume.php">Resume</a></li>
        <li><a href="addCoverLetter.html">Cover Letter</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="changePassword.html">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
    </div>
  </div>
</nav>

    <!-- Header Carousel -->
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
  <p>&nbsp;</p>
                    <div class="col-md-8">
             <div class="container">

<?php  
include ('Connections/connect.php');
if ($result = $mysqli->query("SELECT tbljob.jobId, tbljob.title, tbljob.position1, tbljob.position2, tbljob.position3, tbljob.description1, tbljob.requirement1, tbljob.mincgpa1, tbljob.alowance1, tbljob.status, tbljob.pdate, tbljob.companyId, tblpartner.companyName, tblpartner.companyAddress, tblpartner.companyCity, tblpartner.companyState FROM tbljob INNER JOIN tblpartner ON tbljob.companyId = tblpartner.companyUsername WHERE tbljob.status = 'active' ORDER BY tbljob.pDate DESC"))
    {
  if ($result->num_rows != 0) {

    echo "<table class='scroll' width='700' border='0' bgcolor='#FF00FF' align='left'>";
    echo "<tbody>";
    
    while($row = mysqli_fetch_array($result)) {

echo "<form id=\"Form".$row[0]."\" accept-charset='UTF-8'>";//DO THIS: ADD THIS
echo "<input type='hidden' name='id' value='".$row[0]."'>";
echo "<tr>";
echo "<td>";
echo '<div  class="title bg-primary" align="left" style="font-weight: bold;">' . $row['title'] . '<br/>'. '&nbsp;' . '<img src="image/calendar.png" alt = "date" height="16" width="16" > '. $row['pdate'] . '</div>';

echo '<div  align="left" class="sub">'. '<br>' . '<a href="viewJobStudent.php?id=' . $row[0] . '" target="_blank" >'. $row['companyName'] . ' ' . '</a>' . '<img src="image/location.png" alt = "location" height="12" width="12" > '. $row['companyCity'] . ', ' . $row['companyState'] .  '<br>' .'&nbsp;' .'&nbsp;'  . '</div>';

echo '<div  align="left" class="sub">'. 'Position Available: ' . $row['position1'] . ', ' . $row['position2'] . ', ' . $row['position3'] . '<br>' .'&nbsp;' .   '</div>';

echo '<div  align="left" class="sub">'. 'Job Description: '. '</div>';
echo '<div  align="left" class="sub">' . $row['description1'] . '<br>' .'&nbsp;' .   '</div>';

echo '<div  align="left" class="sub">'. 'Job Requirement: '. '</div>';
echo '<div  align="left" class="sub">' .  $row['requirement1'] . '<br>' .'&nbsp;' .   '</div>';

echo '<div  align="left" class="sub">' . 'Min CGPA: ' . $row['mincgpa1'] . '<br>' .'&nbsp;' .   '</div>';


$alowance = $row['alowance1'];
if ($alowance < 101){
          echo "Not Available";
        } else if ($alowance < 201){
          echo '<div  align="left" class="sub">' . 'Monthly Allowance: RM 100 - 200' . '<br>' .  '</div>';
          } else if ($alowance < 301){
          echo '<div  align="left" class="sub">' . 'Monthly Allowance: RM 200 - 300'. '<br>' .  '</div>';
          } else if ($alowance < 401){
          echo '<div  align="left" class="sub">' . 'Monthly Allowance: RM 300 - 400' .'<br>' .  '</div>';
          } else if ($alowance < 501){
          echo '<div  align="left" class="sub">' . 'Monthly Allowance: RM 400 - 500'.'<br>' .  '</div>';
          } else if ($alowance <= 1000){
          echo '<div  align="left" class="sub">' . 'Monthly Allowance: RM 500 - 1000' .'<br>' .  '</div>';
          } else {
            echo '<div  align="left" class="sub">' . 'Monthly Allowance: Above RM 1000' .'<br>' .  '</div>';
          }

echo '<div  align="right" class="sub">' . '<a href="viewJobStudent.php?id=' . $row[0] . '" target="_blank" >' . '<img src="image/apply.png" alt="Apply Now" width="100" height="50" border="0">' .'</a>' .   '</div>';
echo "</td>";
echo "</tr>";


}
echo "<tr>";
echo '<td>' . '&nbsp;' . '</td>';
echo "</tr>";
echo "</tbody>";
echo "</table>";
}
}


?>


        </div>
</div>
      
    




            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Others Portal</h4>
                    </div>
                    <div class="panel-body">
                        <p><img src="image/marker.gif" alt = "a" ><a href="#About"> UniKL Portal</a></p>
                        <p><img src="image/marker.gif" alt = "a" ><a href="#About"> UniKL MIIT Portal</a></p>
                        <p><img src="image/marker.gif" alt = "a" ><a href="#About"> E-Citie Portal</a></p>
                        <p><img src="image/marker.gif" alt = "a" ><a href="#About"> E-Learn Portal</a></p>
                        <p><img src="image/marker.gif" alt = "a" ><a href="#About"> UniKL IR Portal</a></p>
                        
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Search Criteria</h4>
                    </div>
                    <div class="panel-body">
                        <form action="searchJob.html" method="POST">
                        <p><select id="location" name="location" class="form-control placeholder1">
                                <option value="" selected>All Location</option>
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
                            </select></p>
                        <p><input type="text" name="position" id="position" class="form-control" placeholder="Any Position"/></p>
                        <p><select name="cgpa" id="cgpa" class="form-control placeholder1">
                                <option value="" selected>Min CGPA</option>
                                <option value="3.5">Above 3.5</option>
                                <option value="3.0">3.0 to 3.5</option>
                                <option value="2.51">2.5 to 3.0</option>
                                <option value="2.01">2.0 to 2.5</option>
                                <option value="1.1">Below 2.0</option>
                            </select></p>
                        <p></p>
                        <p><input type="submit" value="Search" id="btnSubmit" name="submit" class="btn btn-success" /></p>
                        </form>
                    </div>
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
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
 

</body>





</html>

<?php


include ('Connections/connect.php');


$location = isset($_POST['location']);
$position = isset($_POST['position']);
$cgpa = isset($_POST['cgpa']);


if(isset($_POST['submit']))
{
   
    if ($result = $mysqli->query("SELECT tbljob.jobId, tbljob.title, tbljob.position1, tbljob.position2, tbljob.position3, tbljob.description1, tbljob.requirement1, tbljob.mincgpa1, tbljob.alowance1, tbljob.status, tbljob.pdate, tbljob.companyId, tblpartner.companyName, tblpartner.companyAddress, tblpartner.companyCity, tblpartner.companyState FROM tbljob INNER JOIN tblpartner ON tbljob.companyId = tblpartner.companyUsername WHERE tbljob.status = 'active' AND tblpartner.companyState LIKE '%$location%' ORDER BY tbljob.pDate DESC"))
    {
  if ($result->num_rows != 0) {

    echo "<table class='scroll' width='700' border='0' bgcolor='#FF00FF' align='left'>";
    echo "<tbody>";
    
    while($row = mysqli_fetch_array($result)) {

echo "<form id=\"Form".$row[0]."\" accept-charset='UTF-8'>";//DO THIS: ADD THIS
echo "<input type='hidden' name='id' value='".$row[0]."'>";
echo "<tr>";
echo "<td>";
echo '<div  class="title bg-primary" align="left" style="font-weight: bold;">' . $row['title'] . '<br/>'. '&nbsp;' . '<img src="image/calendar.png" alt = "date" height="16" width="16" > '. $row['pdate'] . '</div>';

echo '<div  align="left" class="sub">'. '<br>' . '<a href="viewJobStudent.php?id=' . $row[0] . '" target="_blank" >'. $row['companyName'] . ' ' . '</a>' . '<img src="image/location.png" alt = "location" height="12" width="12" > '. $row['companyCity'] . ', ' . $row['companyState'] .  '<br>' .'&nbsp;' .'&nbsp;'  . '</div>';

echo '<div  align="left" class="sub">'. 'Position Available: ' . $row['position1'] . ', ' . $row['position2'] . ', ' . $row['position3'] . '<br>' .'&nbsp;' .   '</div>';

echo '<div  align="left" class="sub">'. 'Job Description: '. '</div>';
echo '<div  align="left" class="sub">' . $row['description1'] . '<br>' .'&nbsp;' .   '</div>';

echo '<div  align="left" class="sub">'. 'Job Requirement: '. '</div>';
echo '<div  align="left" class="sub">' .  $row['requirement1'] . '<br>' .'&nbsp;' .   '</div>';

echo '<div  align="left" class="sub">' . 'Min CGPA: ' . $row['mincgpa1'] . '<br>' .'&nbsp;' .   '</div>';

echo '<div  align="left" class="sub">' . 'Monthly Allowance: RM '. $row['alowance1'] . '<br>' .  '</div>';

echo '<div  align="right" class="sub">' . '<a href="viewJobStudent.php?id=' . $row[0] . '" target="_blank" >' . '<img src="image/apply.png" alt="Apply Now" width="100" height="50" border="0">' .'</a>' .   '</div>';
echo "</td>";
echo "</tr>";


}
echo "<tr>";
echo '<td>' . '&nbsp;' . '</td>';
echo "</tr>";
echo "</tbody>";
echo "</table>";
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

