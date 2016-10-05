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
WHERE tblapplyjob.jstatus = 'approved' OR tblapplyjob.jstatus = 'rejected' OR tblapplyjob.jstatus = 'interview' AND tblapplyjob.studentId = '52243113512'"))
    {
  if ($result->num_rows != 0) {

    $count2 = $mysqli->affected_rows;

    
}
}

include ('Connections/connect.php');


if ($result = $mysqli->query("SELECT tblapplymobilization.otherId,tblapplymobilization.mlocation,tblapplymobilization.mcgpa,tblapplymobilization.mdate,tblapplymobilization.mstatus,tblother.companyId,tblpartner.companyName,tblapplymobilization.studentId,tblapplymobilization.mId
FROM tblother INNER JOIN tblapplymobilization ON tblapplymobilization.otherId = tblother.otherId
INNER JOIN tblpartner ON tblother.companyId = tblpartner.companyUsername WHERE tblapplymobilization.studentId = '$studentId' AND tblapplymobilization.mstatus= 'interview' OR tblapplymobilization.studentId = '$studentId' AND tblapplymobilization.mstatus= 'rejected'"))
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
   <meta name="viewport" content="width=device-width, initial-scale=1">


   <link href="css/bootstrap.min.css" rel="stylesheet">

   <!-- dd menu -->
  
  <title>Application Letter</title>
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

<?php


$position = ($_POST['txtPosition']);
$company = ($_POST['txtCompany']);
$address = ($_POST['txtAddress']);
$city = ($_POST['txtCity']);
$postcode = ($_POST['txtPostcode']);
$state = ($_POST['selState']);
$country = ($_POST['selCountry']);
$studentId = ($_SESSION['student']);


if ($result = $mysqli->query("SELECT * FROM tblpersonalinfo WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {

     while($row = mysqli_fetch_array($result)) {

      $s_name = ($row[1]);
      $s_address = ($row[2]);
      $s_city = ($row[3]);
      $s_postcode = ($row[4]);
      $s_state = ($row[5]);
      $s_country = ($row[6]);

      }
   }
}

   if ($result = $mysqli->query("SELECT * FROM tblstudent WHERE studentId=$studentId"))
    {
  if ($result->num_rows != 0) {

     while($row = mysqli_fetch_array($result)) {

      $s_ic = ($row[6]);
      $s_level = ($row[3]);
      $s_programme = ($row[4]);


      }
   }

}


if(isset($_POST['submit']))
{

  if ($position == '' || $address == '' || $city == '' || $postcode == '' || $state == '' || $country == '' || $company == '' )
{
 // generate error message
 ?>
      <script>
      alert('Please fill the fields ...')
      window.location='addCoverLetter.html'
      </script>
<?php
 
 //error, display form
 //renderForm($id, $position, $company, $fromMonth, $fromYear, $toMonth, $toYear, $description, $referenceName, $referenceNo);
 } else {
      echo "<p>". "&nbsp;" ."</p>";
      echo '<div class="content text-center">';
      echo "<button id='btnpdf'  class='btn btn-info'>Download PDF</button>";
      echo '</div>';
      echo "<p></p>";

      echo "<div id='resume'>";
      echo "<table id='tblresume' table align='center' border='0' width='1000' class='table-responsive' >";
      echo "<tr>";
      echo "<td>";
      echo "<p></p>";            
      echo "<table id='cover' align='center' border='0' width='1000' >";
      echo "<tr>";
      echo '<td>' . $s_name . '</td>';
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo '<td>' . $s_address . '</td>';
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . $s_postcode . ', '.  $s_city . "</td>";
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . $s_state . ', '.  $s_country . "</td>";
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . '<br/>' . '<br/>' . 'IC No: ' . $s_ic . "</td>";
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo '<td>' . '<br/>' . '<br/>' . $company . '</td>';
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo '<td>' . $address . '</td>';
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . $postcode . ', '.  $s_city . "</td>";
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . $state . ', '.  $country . "</td>";
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . '<br/>' . 'Dear Sir or Madam, ' .  "</td>";
      echo '<td  width="700">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "</table>";
      echo "<table border='0'>";
      echo "<tr>";
      echo "<td>" . '<br/>' . '<u>' . '<b>' . ' RE: Industrial Training Application For ' . $position . ' Position' . '</b>' . '</u>' . "</td>";
      echo '<td  width="400">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "</table>";
      echo "<table border='0'>";
      echo "<tr>";
      echo "<td>" . 'I am student in ' . $s_programme . ' from Universiti Kuala Lumpur Malaysian Institute of Information Technology (UniKL MIIT). planning to
undergo industrial training commencing from 2/1/2016 until 2/5/2016 for duration of about
16 weeks. The industrial training is a partial requirement in order to graduate.    ' .'</br>'.'</br>'. "</td>";
      echo '<td  width="200">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . 'I am keen to join your esteemed organization as I believe that your company provides great
opportunity for me to learn and acquire the practicality aspects of my study area.  ' .'</br>'.'</br>'. "</td>";
      echo '<td  width="200">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . 'Attached is my resume for your review. I would like the opportunity to further discuss with you
on my application. Please let me know if I can call your office to see if we might arrange a
convenient time to meet.
 ' .'</br>'.'</br>'. "</td>";
      echo '<td  width="200">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . 'Thank you for your consideration. ' .'</br>'.'</br>'. "</td>";
      echo '<td  width="200">' . "&nbsp;" . '</td>';
      echo "</tr>";
       echo "<tr>";
      echo "<td>" . 'Yours faithfully, ' .'</br>'.'</br>'. "</td>";
      echo '<td  width="200">' . "&nbsp;" . '</td>';
      echo "</tr>";
       echo "<tr>";
      echo "<td>" . $s_name . "</td>";
      echo '<td  width="200">' . "&nbsp;" . '</td>';
      echo "</tr>";
       echo "<tr>";
      echo "<td>" . $s_ic . "</td>";
      echo '<td  width="200">' . "&nbsp;" . '</td>';
      echo "</tr>";
      echo "</table>";
      echo "</tr>";
      echo "</td>";
      echo "</br>";
      echo "</br>";
      echo "</table>";
      echo "<p>".'&nbsp;'."</p>";
      echo "</div>";

}
}
?>

<footer align="center">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; UniKl MIIT INTRA Management System (2016)</p>
                </div>
            </div>
        </footer>

</div>

</body>

<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-printme.js"></script>
    <script>
    $("#btnpdf").click(function(){
      $("#resume").printMe({ "path": "js/libs/bootstrap.min.css" });
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