<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- CSS
--------------------------------------------------------------------------------------------->
<link href="assets/css/profile.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<style>
   #contact_border { padding-left: 25px; }
   #education_border { padding-left: 25px; }
</style>

<?php

/* LOGGED OUT VIEW
*****************************************************************************************/
if ($this->input->get('view') !== NULL)
{ ?>

<div class="container-fluid grey lighten-4">

<!-- DEBUGGING PURPOSES
----------------------------------------------------------------------------------------->
   <div align="center" class="row"><?php //var_dump($_SESSION);?></div>   

   <div class="container col s12 m12 l12">
      <div class="card z-depth-1">

<!-- PROFILE HEADER
----------------------------------------------------------------------------------------->
            <?php include 'application/views/labid/other_view/header.php';?>
<!-- POST BOARD
----------------------------------------------------------------------------------------->
            <?php //include 'application/views/labid/other_view/postboard.php';?>
<!-- BOOKMARKS
----------------------------------------------------------------------------------------->
            <?php //include 'application/views/labid/other_view/bookmarks.php';?>
         
      </div>
   </div>
</div>

<?php
}
else
{
   
/* USER LOGGED IN
*****************************************************************************************/
   if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
   {
      //echo CI_VERSION; ?>

   <div class="container-fluid grey lighten-4">

<!-- DEBUGGING PURPOSES
----------------------------------------------------------------------------------------->
      <div align="center" class="row"><?php //var_dump($_SESSION);?></div>   

      <div class="container col s12 m12 l12">
         <div class="card z-depth-1">
<!-- PROFILE HEADER
----------------------------------------------------------------------------------------->
            <?php include 'application/views/labid/user_view/header.php';?>
<!-- POST BOARD
----------------------------------------------------------------------------------------->
            <?php include 'application/views/labid/user_view/postboard.php';?>
<!-- BOOKMARKS
----------------------------------------------------------------------------------------->
            <?php include 'application/views/labid/user_view/bookmarks.php';?>
         </div>      
      </div>
   </div>
   <?php
   }
   else
   {
      redirect('');
   }
}
?>

<!-- JAVASCRIPT
-------------------------------------------------------------------------------------------->
<script type="text/javascript">   
   function show(current, hidden)
   {
      document.getElementById(current).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
   }
</script>