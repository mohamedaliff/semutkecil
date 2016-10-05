
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
 <head>
<title>UniKl MIIT INTRA Management System</title>
     <link rel="icon" type="image/ico" href="image/favicon.ico">
    <meta name="keywords" content="" />
     <meta name="description" content="" />
     <link href="css/bootstrap.min.css" rel="stylesheet">


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

            
<form action="" method="POST">


<?php
    // connect to the database
    include('Connections/connect.php');

    
    if ($result = $mysqli->query("SELECT * FROM quiz"))
    {
  if ($result->num_rows != 0) {
     
     // display data in table
      echo "<p>";              
      echo "<div id='body'>";
      echo "<div id='content'>";
      echo "<table align='center' border='1' width='400' class='table table-bordered table-hover table-condensed'>";

      $items = array();
      $items1 = array();

     while($row = mysqli_fetch_array($result)) {

      $items[] = $row['jawapan'];
      $items1[] = $row['id'];
     
   // echo out the contents of each row into a table
    echo "<tr>";
    echo '<td><input type="hidden" name="id" value="' . $row['id'] . '"></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>' . $row['soalan'] . '</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td><input type="radio" name="option[' . $row['id'] . ']" value="' . $row['pilihan1'] . '">' . $row['pilihan1'] . '<br></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td><input type="radio" name="option[' . $row['id'] . ']" value="' . $row['pilihan2'] . '">' . $row['pilihan2'] . '<br></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td><input type="radio" name="option[' . $row['id'] . ']" value="' . $row['jawapan'] . '">' . $row['jawapan'] . '<br></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>&nbsp;</td>';
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

<input type="submit" value="Save" name="submit" id="btnSubmit" class="btn btn-success" />
</form>
   

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

if(isset($_POST['submit']))
{

  $totalmark = 0;


foreach($items1 as $item1)
    {
      
    }

foreach (array_combine($items, $_POST['option']) as $item => $row1) {


include('Connections/connect.php');

    
    if ($result = $mysqli->query("SELECT * FROM quiz WHERE id = '$item1'"))
    {
  if ($result->num_rows != 0) {

    while($row = mysqli_fetch_array($result)) {

      if ($row1 == $item && $row['id'] == $item1){

        $totalmark += 1;

      } else {

        $totalmark += 0;

      }


    }
}

}

}

echo $totalmark;

}
?>