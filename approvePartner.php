<?php

session_start();
include ('Connections/connect.php');
require 'mailer/PHPMailerAutoload.php';

if(@$_SESSION['admin']  ) {


function renderForm($email = '', $id = '')
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
            
            <input type="hidden" name="email" value="<?php echo $email; ?>"/><br/>
            <!--<p>email: <?php echo $email; ?></p>-->
            
            
         </div>
      </form>
   </body>
   </html>
   
   <?php }
   
   
   
   // confirm that the 'id' variable has been set
   if (isset($_GET['id']) && is_numeric($_GET['id']))
   {  
      

      // get the 'id' variable from the URL
      $id = $_GET['id'];
      $status = 'Active';
      
      
      if($stmt1 = $mysqli->prepare("SELECT companyEmail FROM tblpartner WHERE companyId=?"))
      {
         $stmt1->bind_param("i", $id);
         $stmt1->execute();
         
         $stmt1->bind_result($email);
         $stmt1->fetch();
         
               // show the form
         renderForm($email , $id);
         
         $stmt1->close();
      }
            // show an error if the query has an error
      else
      {
         echo "Error: could not prepare SQL statement";
      }
      
      
      
      
      
      
      // update record from database
      if ($stmt2 = $mysqli->prepare("UPDATE tblpartner SET registrationStatus = ?
         WHERE companyId=?"))
      {
         $stmt2->bind_param("si",$status,$id);  
         $stmt2->execute();
         $stmt2->close();
      }
      else
      {
         echo "ERROR: could not prepare SQL statement.";
      }
      
      
      if ( $stmt3 = $mysqli->prepare("INSERT INTO tbluser (username,  password, email, role) SELECT companyUsername,companyPassword,companyEmail,'partner'  FROM tblpartner WHERE companyId=?" ))
      {
        
         $stmt3->bind_param("i", $id);
         $stmt3->execute();
         
      }
      else
      {
         echo "ERROR: could not prepare SQL statement.";
      }
      
      
      
      // redirect user after approve is successful
      ?>
      <script>
      alert('Registration approved ...')
      window.location='partnerApprovalForm.php'
      </script>
      <?php
      
//$email = $_GET['email'];    
      $mail = new PHPMailer;

//$mail->SMTPDebug = 3; 
//$time_start = microtime(1);                              // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mohamedaliffrosli@gmail.com';                 // SMTP username
$mail->Password = 'areleft91';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mohamedaliffrosli@gmail.com', 'UniKL Miit INTRA Management System');
$mail->addAddress($email, 'Hello');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'UniKL Miit INTRA Management System';
$mail->Body    = 'Your partner registration has been approved. You may use the system now. Kindly go to this URL to proceed your login. www.uniklmiitintramanagmentsystem.com.my';
$mail->AltBody = 'Your partner registration has been approved. You may use the system now. Kindly go to this URL to proceed your login. www.uniklmiitintramanagmentsystem.com.my';

if(!$mail->send()) {
  ?>
  <script>
  alert('Email cannot be sent ...')
  window.location='partnerApprovalForm.php'
  </script>
  <?php
} else {
  ?>
  <script>
  alert('Email has been sent ...')
  window.location='partnerApprovalForm.php'
  </script>
  <?php
}

}
else
   // if the 'id' variable isn't set, redirect the user
{
   header("Location: partnerApprovalForm.php");
}

$mysqli->close();

} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>
