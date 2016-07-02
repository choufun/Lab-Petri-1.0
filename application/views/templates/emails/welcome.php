<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
   <head>
      <!-- LOGO : TITLE
      --------------------------------------------------------------------------------------------->
      <title>Lab Petri</title>
      <link rel="icon" href="assets/img/favicon.ico">
      <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0;"/>   
   </head>
   <body class="avoid-fout page-blue grey lighten-4">
      <p>Welcome <?php echo $user; ?> and thank you for registering at Lab Petri.</p>
      <p>
         Your account has been created and below are your login credentials.
         <br>
         email: <?php echo $email; ?>
         password: <?php echo $password; ?>
         <br>
         Please click the link below to activate your account.
         <br>
         <a href='www.labpetri.org/login/activate_account?email=<?php echo $email; ?>&hash=<?php echo $hash; ?>' target='_blank'>
            Click here.
         </a>
      </p>
      <br>
      <p>
         Please also take some time to answer the questions below and reply with your feedback.
         <br>
         Thank you.
      </p>
      <br>
      Survey:
      <p>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         1.) How satisfied are you with this website's ease of use?
         <br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         2.) How well does the website communicate with out company's mission?
         <br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         3.) How likely are you to continue using our website?
         <br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         4.) How likely are you to recommend this website to someone you know?
         <br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         5.) How can we improve our website and services?
      </p>
      <p>
         Sincerely,
         <br><br>
         Lap Petri Team
      </p>
      <br>
      <p>Lab Petri 2015-<?php echo date("Y"); ?>, All Rights Reserved</p>
      <!-- INSERT PICTURE HERE < php echo $img; > -->
   </body>
</html>