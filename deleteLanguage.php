<?php

session_start();
include ('Connections/connect.php');

if(@$_SESSION['student']  ) {

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
    
      // delete record from database
      if ($stmt = $mysqli->prepare("DELETE FROM tbllanguage WHERE languageId = ? LIMIT 1"))
      {
         $stmt->bind_param("i",$id);   
         $stmt->execute();
         $stmt->close();

?>
      <script>
      alert('Language Deleted ...')
      window.location='editLanguage.html'
      </script>
<?php
      }
      else
      {
         echo "ERROR: could not prepare SQL statement.";
      }
      $mysqli->close();
      
    }  
    else 
    {
   header("Location: editLanguage.html");
}// redirect user after delete is successful
     


} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>