<?php

session_start();

include ('Connections/connect.php');

if(@$_SESSION['partner']  ) {


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
     $id = $_GET['id'];
     $status = "Deactivated";
     $username = ($_SESSION['partner']);

     if ($stmt = $mysqli->prepare("UPDATE tblpartner SET registrationStatus = ? WHERE companyId=?"))
      {
         //$stmt->bind_param("sssi",$language,$spoken,$writen, $id);  
        $stmt->bind_param("ss",$status, $id); 
        $stmt->execute();
        $stmt->close();
?>
      <script>
      alert('Account Deactivated ...')
      window.location='index.html'
      </script>
<?php

//return this string to js if form success
      } else {
      	echo "ERROR: could not prepare SQL statement.";
      }

      if ($stmt = $mysqli->prepare("DELETE FROM tbluser WHERE username = ? LIMIT 1"))
      {
         $stmt->bind_param("s",$username);   
         $stmt->execute();
         $stmt->close();

      }
      else
      {
         echo "ERROR: could not prepare SQL statement.";
      }
        

  }   

} else {
  
  session_destroy();
  header("location: login.php");
  exit;

  
}
?>     