<?PHP
error_reporting(0);

include ('Connections/connect.php');

$c_name = ($_POST['txtName']);
$c_type = ($_POST['selType']);
$c_no = ($_POST['txtNo']);
$c_address = ($_POST['txtAddress']);
$c_city = ($_POST['txtCity']);
$c_postcode = ($_POST['txtPostcode']);
$c_state = ($_POST['selState']);
$c_country = ($_POST['selCountry']);
$c_email = ($_POST['txtEmail']);
$c_phone = ($_POST['txtPhone']);
$c_fax = ($_POST['txtFax']);
$c_username = ($_POST['txtUsername']);
$c_password = ($_POST['txtPassword']);
$c_confirmpassword = ($_POST['txtPWVerified']);




if(isset($_POST['submit']))
{

// attempt insert query execution
   if ( $insert = $mysqli->query ( "INSERT INTO tblpartner (companyName,   companyRegistration, companyNo, companyAddress, companyCity, companyPostCode, companyState, companyCountry, companyEmail, companyPhone, companyFax,companyUsername, companyPassword, registrationStatus) VALUES ('$c_name', '$c_type', '$c_no', '$c_address', '$c_city','$c_postcode', '$c_state', '$c_country', '$c_email', '$c_phone', '$c_fax', '$c_username', '$c_password', 'Not active')"))
   {
      ?>
      <script>
      alert('Successful register.Wait for approval. Your approval will be notify through your email.')
      window.location='index.html'
      </script>
<?php
   }

}

?>