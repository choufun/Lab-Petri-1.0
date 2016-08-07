<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- CSS
--------------------------------------------------------------------------------------------->
<link href="assets/css/profile.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<style>
   #contact_border { padding-left: 25px; }
   #education_border { padding-left: 25px; }
</style>

<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{
?>
<div class="container-fluid grey lighten-4">
   
   <!-- DEBUGGING PURPOSES
   ----------------------------------------------------------------------------------------->
   <div align="center" class="row"><?php //var_dump($_SESSION);?></div>   
   
   <div class="container col s12 m12 l12">
      <div class="card z-depth-1">

         <!-- PROFILE HEADER
         ----------------------------------------------------------------------------------->
         <?php include 'application/views/labid/header.php';?>
         <div class="card-content">

            <!-- SIDE NAV
            -------------------------------------------------------------------------------->
            <?php include 'application/views/labid/assets/sidenav.php';?>

            <!-- MODALS
            -------------------------------------------------------------------------------->
            <?php include 'application/views/labid/assets/modal.php';?>            

            <div class="row" align="right">
               <a href="https://www.labpetri.org/labid/resume">Download Resume</a>
            </div>
            
            <!-- PROFILE INFORMATION
            -------------------------------------------------------------------------------->
            <div class="row">

            <!-- EDUCATION
            -------------------------------------------------------------------------------->
               <div class="col s12 m12 l6">
                  <div class="card yellow darken-2 z-depth-1">
                     <div class="container-fluid">
                        <div class="card z-depth-2" style="margin: 1px 1px;">
                           <div align="center" class="row">                              
                              <h5><strong>Education</strong></h5>
                           </div>
                           <div id="education_border">
                              <?php include 'application/views/labid/education.php';?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            <!-- CONTACT
            -------------------------------------------------------------------------------->
               <div class="col s12 m12 l6">
                  <div class="card yellow darken-2 z-depth-1">
                     <div class="container-fluid">
                        <div class="card z-depth-2" style="margin: 1px 1px;">
                           <div align="center" class="row">
                              <h5><strong>Contact</strong></h5>
                           </div>
                           <div id="contact_border">
                              <?php include 'application/views/labid/contact.php';?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- POST BOARD
         ----------------------------------------------------------------------->
         <?php include 'application/views/labid/postboard.php';?>

         <!-- BOOKMARKS
         ----------------------------------------------------------------------->
         <?php include 'application/views/labid/bookmarks.php';?>

      </div>
      
   </div>
</div>
<?php
}
else
{
   redirect('');
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