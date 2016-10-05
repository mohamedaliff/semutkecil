
<?php
function renderForm($id, $name, $address, $city, $postcode, $state, $country, $email, $contact)
 {
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

    </style>

    <style type="text/css">
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
        <li><a href="index.html" style="color:yellow;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
       <li class="dropdown active">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:yellow;"><span class="glyphicon glyphicon-briefcase"></span> Industrial Partner
          <span class="caret"></span></a>
          <ul class="dropdown-menu" style="color:yellow;">
            <li><a href="partnerRegister.html" style="color:yellow;">Be Our Partner</a></li>
            <li><a href="partnerList.html" style="color:yellow;">Our Partner List</a></li>
          </ul>
      </li>
      <li><a href="about.html" style="color:yellow;"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
      </ul>
       <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php" style="color:yellow;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
      
    </div>
  </div>
</nav>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div> <img src="image/slide2.jpg" alt = "Ottawa" class = "fill"></div>
                <div class="carousel-caption">             
                </div>
            </div>
            <div class="item">
                <div> <img src="image/slide1.jpg" alt = "Ottawa" class = "fill"></div>
                <div class="carousel-caption">             
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

 
<div class="row">
            <div class="col-md-8 ">
<p>


<table align="center" width="700" border="0">
  <tr><td>
      <div><input type="hidden" name="id" value="<?php echo $id; ?>"/></div>
      <div id='content' class='title bg-primary'>&nbsp;&nbsp;&nbsp;Partner Details <br>&nbsp;</br></div>  
      
      <div class="sub">&nbsp;&nbsp;&nbsp;Company Name: <?php echo $name; ?><br>&nbsp;</br></div>
      
      <div class="sub">&nbsp;&nbsp;&nbsp;Address: <?php echo $address . ", " . $postcode . ", " . $city . ", " . $state . ", " . $country;   ?><br>&nbsp;</br></div>         

      <div class="sub">&nbsp;&nbsp;&nbsp;Email: <?php echo $email; ?><br>&nbsp;</br></div>

      <div class="sub">&nbsp;&nbsp;&nbsp;Contact No: <?php echo $contact; ?><br>&nbsp;</br></div>
</td>
</tr>

</table>
<table align="center" width="700" border="0">
  <tr>
  <td>&nbsp;</td>
  </tr>
  <tr>
  <td><div align="right">
      <input type="submit" value="Cancel" id="btncancel" name="cancel" onclick="history.go(-1);" class="btn btn-danger" />
    </div></td>
  </tr>
  </table>





</div>
<div class="col-md-4">
  <p>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Navigation</h4>
                    </div>
                    <div class="panel-body">
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="#About" > Partner Registration Request</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="#About"> Job Anouncement Request</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="#About"> Student INTRA request</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="#About"> Post Announcement</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="#About"> Manage Announcement</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="#About"> Partner List</a></p>
                        <p><span class="glyphicon glyphicon-triangle-right"></span><a href="#About"> Student List</a></p>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>



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

    if ($result = $mysqli->query("SELECT * FROM tblpartner WHERE companyId=$id")) {
  
  if ($result->num_rows != 0) {
     

     while($row = mysqli_fetch_array($result)) {
 
 
 // get data from db
 $name = $row[1];
 $address = $row[4];
 $city = $row[5];
 $postcode = $row[6];
 $state = $row[7];
 $country = $row[8];
 $email = $row[9];
 $contact = $row[10];


 
 }
 // show form
 renderForm($id, $name, $address, $city, $postcode, $state, $country, $email, $contact);
 $mysqli->close();
}
}

}




?>


