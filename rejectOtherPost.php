<?php

session_start();
include ('Connections/connect.php');
require 'mailer/PHPMailerAutoload.php';

if(@$_SESSION['admin']  ) {


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

 if($stmt1 = $mysqli->prepare("SELECT tblpartner.companyEmail FROM tblpartner
INNER JOIN tblother ON tblother.companyId = tblpartner.companyUsername WHERE otherId=?"))
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
    
      // delete record from database
      if ($stmt = $mysqli->prepare("DELETE FROM tblother WHERE otherId = ? LIMIT 1"))
      {
         $stmt->bind_param("i",$id);   
         $stmt->execute();
         $stmt->close();

?>
      <script>
      alert('Advertisement Rejected ...')
      window.location='approveOtherPost.html'
      </script>
<?php
      }
      else
      {
         echo "ERROR: could not prepare SQL statement.";
      }
      $mysqli->close();


 $mail = new PHPMailer;
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
$mail->Body    = 'Your advertisement request has been rejected. We are sorry for the inconvenience.';
$mail->AltBody = 'Your advertisement request has been rejected. We had to reject your request due to the advertisement does not fulfil our website policies and terms or
is inrelated with our requirement. 
We are sorry for the inconvenience';


if(!$mail->send()) {
  ?>
  <script>
  alert('Email cannot be sent ...')
  window.location='approveOtherPost.html'
  </script>
  <?php
} else {
  ?>
  <script>
  alert('Email has been sent ...')
  window.location='approveOtherPost.html'
  </script>
  <?php
}
      
      
    }  
    else 
    {
   header("Location: approveOtherPost.html");
}// redirect user after delete is successful
     


} else {
  session_destroy();
  header("location: login.php");
  exit;

  
}

?>