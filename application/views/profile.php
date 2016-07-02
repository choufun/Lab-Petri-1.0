<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- CSS
--------------------------------------------------------------------------------------------->
<link href="assets/css/profile.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<style>
   #contact_border { padding-left: 25px; }
   #education_border { padding-left: 25px; }
</style>

<script>   
/* DELETE LINK
********************************************************************************************/
   function delete_link()
   {
      var size = document.getElementsByTagName("a").length - 1;
      var element = document.getElementsByTagName("a")[size];
      document.write(
         "\
         <form method='post' accept-charset='utf-8' action='profile/delete'>\
            <button class='_link' type='submit' name='action' value='" + element + "'>\
               Delete\
            </button>\
         </form>\
         "
      );
   }
</script>

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
         <?php include 'application/views/profile/header.php';?>
         <div class="card-content">

            <!-- SIDE NAV
            -------------------------------------------------------------------------------->
            <?php include 'application/views/profile/assets/sidenav.php';?>

            <!-- MODALS
            -------------------------------------------------------------------------------->
            <?php include 'application/views/profile/assets/modal.php';?>            

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
                              <?php include 'application/views/profile/education.php';?>
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
                              <?php include 'application/views/profile/contact.php';?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--
         <div class="divider"></div><div class="divider"></div>
         <div class="card-content">
            <div class="col s12 m12 l12">
               <div class="row">
                  <div class="container-fluid">
         -->
                     <!-- LAB NOTEBOOK
                     ----------------------------------------------------------------------->
                     <?php //include 'application/views/profile/labnotebook.php';?>
         <!--
                  </div>
               </div>
            </div>
         </div>
         -->

         <!-- POST BOARD
         ----------------------------------------------------------------------->
         <?php include 'application/views/profile/postboard.php';?>

         <!-- BOOKMARKS
         ----------------------------------------------------------------------->
         <?php include 'application/views/profile/bookmarks.php';?>

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