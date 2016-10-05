<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['partner']  ) {

function renderForm($id = '')
{ ?>
   <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
   <html>
   <head>   
      <title>
         <?php if ($id != '') { echo "Edit Record"; } else { echo "New Record"; } ?>
      </title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   </head>
   <body>
      
      
      <form action="" method="post">
         <div>
            <?php if ($id != '') { ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <!--<p>ID: <?php echo $id; ?></p>-->
            <?php } ?>
            
         </div>
      </form>
   </body>
   </html>
   
<?php }
   
   if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];

 $status = "interview";
 $studentId = $_POST['studid'];
 $postId = $_POST['postid'];

$idate = $_POST['date'];
 $itime = $_POST['time'];
  $ivenue = $_POST['venue'];
 $idetails = $_POST['info'];


// save the data to the database
 if ($stmt = $mysqli->prepare("UPDATE tblapplyjob SET jstatus = ? WHERE applyId=?"))
      {
         
        $stmt->bind_param("si",$status, $id); 
        $stmt->execute();
        $stmt->close();

      }
 

if ( $insert = $mysqli->query ( "INSERT INTO tblinterview (idate, time, venue, details, postId, studentId) VALUES ('$idate', '$itime', '$ivenue', '$idetails', '$postId', '$studentId')"))
   {
?>
      <script>
      alert('Interview Session Arranged ...')
      window.location='intraRequest.php'
      </script>
<?php
   }

      else
      {
          echo $mysqli->error;
      }
      
    }
      $mysqli->close();
      
    }  



} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>