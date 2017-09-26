<?php
//if "email" variable is filled out, send email
  if (isset($_POST['email']))  {
  
  //Email information
  $admin_email = "someone@example.com";
  $email = $_POST['email'];
  $subject = 'Contact Form';
  $name = $_POST['name'];
  $message = $_POST['message'];
  
  //send email
  mail($admin_email, "$subject", $name."\n".$message, "From:" . $email);
  
  //Email response
  echo "Thank you for contacting us!";
  }
 