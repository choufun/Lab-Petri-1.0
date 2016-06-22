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
      <p>Hi <?php echo $user; ?> and thank you for your inquiry.</p>
      <br>
      <p>
         We will take a look into this issue and get back to you as soon as possible.
         <br>
         Thank you for your patience.
      </p>
      <br>
      Issue:
      <p>
         <?php echo $issue; ?>
      </p>
      <p>
         Sincerely,
         <br><br>
         Lab Petri Team
      </p>
      <br>
      <p>Lab Petri 2015-<?php echo date("Y"); ?>, All Rights Reserved</p>
   </body>
</html>