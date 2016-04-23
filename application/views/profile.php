<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- CSS
--------------------------------------------------------------------------------------------->
<link href="assets/css/profile.css" type="text/css" rel="stylesheet" media="screen,projection"/>

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

<!--
<div class="navbar-fixed" style="opacity: 0.8;">
   <nav style="background: -moz-linear-gradient(bottom right, #01579b, #e0f7fa);">
      <div class="nav-wrapper container">
         <ul class="right">
            
            <li class="tab">
               <a href="#" class="white-text">Profile Picture</a>
            </li>
            
            <li class="tab">
               <a href="#" class="white-text">My Education</a>
            </li>
            
            <li class="tab ">
               <a href="#" class="white-text">My Contact</a>
            </li>
            
         </ul>
      </div>
   </nav>
</div>
-->

<div class="container-fluid grey lighten-4">
   
   <!-- DEBUGGING PURPOSES
   ----------------------------------------------------------------------------------------->
   <div align="center" class="row"><?php //var_dump($_SESSION);?></div>
   
   
   <div class="container col s12 m12 l12">
      <div class="card z-depth-1 blue darken-2">
         <div class="card z-depth-2" style="margin: 7px 7px;">

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
                           <?php include 'application/views/profile/education.php';?>
                        </div>
                     </div>
                  </div>

               <!-- CONTACT
               -------------------------------------------------------------------------------->
                  <div class="col s12 m12 l6">
                     <div class="card yellow darken-2 z-depth-1">
                        <div class="container-fluid">
                           <?php include 'application/views/profile/contact.php';?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="divider"></div><div class="divider"></div>
            <div class="divider"></div><div class="divider"></div>
            <div class="card-content">
               <div class="col s12 m12 l12">
                  <div class="row">
                     <div class="container-fluid">

                        <!-- LAB NOTEBOOK
                        ----------------------------------------------------------------------->
                        <?php include 'application/views/profile/labnotebook.php';?>
                     </div>
                  </div>
               </div>
            </div>

            <!-- POST BOARD
            ----------------------------------------------------------------------->
            <?php include 'application/views/profile/postboard.php';?>
            
            <!-- BOOKMARKS
            ----------------------------------------------------------------------->
            <?php include 'application/views/profile/bookmarks.php';?>

         </div>
      </div>
   </div>
</div>

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