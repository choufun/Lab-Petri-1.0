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
            <button class='_link light-blue-text' type='submit' name='action' value='" + element + "'>\
               Delete\
            </button>\
         </form>\
         "
      );
   }
</script>

<div class="container-fluid grey lighten-4">

   <!-- DEBUGGING PURPOSES
   ----------------------------------------------------------------------------------------->
   <div align="center" class="row"><?php //var_dump($_SESSION);?></div>
   
   <div class="container col s12">
      <div class="card" id="card-border">

         <!-- PROFILE HEADER
         ----------------------------------------------------------------------------------->
         <div class="card-image">
            <div class="blue darken-1 white-text container-fluid col s12">
               <div class="row" id="profile-padding">
                  <div align="center" class="container-fluid">
                     <img class="responsive-img z-depth-2" src="files/profile_picture/<?php echo $profile_picture; ?>"
                          id="profile-image">
                  </div>
               </div>
               <div class="row">
                  <div align="center" class="container-fluid">
                     <h3 id="username">
                        <strong>
                           <?php echo $this->session->firstname." ".$this->session->lastname;?>
                        </strong>
                     </h3>
                  </div>
               </div>
               <div align="right" class="icon-border row">
                  <div class="container-fluid">
                     <a href="#" data-activates="slide-out" class="button-collapse show-on-large">
                        <i class="white-text small material-icons icon-inner-border">subject</i>
                     </a>
                  </div>
               </div>
               <div class="divider"></div><div class="divider"></div>
               <div class="divider"></div><div class="divider"></div>
            </div>
         </div>
         <div class="card-content">

            <!-- SIDE NAV
            ----------------------------------------------------------------------------------->
            <?php include 'application/views/profile/assets/sidenav.php';?>

            <!-- MODALS
            ----------------------------------------------------------------------------------->
            <?php include 'application/views/profile/assets/modal.php';?>
           
            <!-- PROFILE INFORMATION
            -------------------------------------------------------------------------------->
            <div class="row">
               <div class="container-fluid">
                  <div class="col s12">
                     <div align="center" class="row">
                        <div class="container-fluid">
                           <h4><strong class="grey-text text-darken-1">Profile Information</strong></h4>
                        </div>
                     </div>

                     <!-- EDUCATION
                     ----------------------------------------------------------------------->
                     <?php include 'application/views/profile/education.php';?>
                     <?php //include 'application/views/profile/assets/edit.php';?>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="container-fluid">
                  <div class="divider blue lighten-4"></div>
                  <div class="divider blue lighten-4"></div>
               </div>
            </div>
            <div class="row">
               <div class="container-fluid">
                  <div class="col s12">

                     <!-- CONTACT INFORMATION
                     ----------------------------------------------------------------------->
                     <?php include 'application/views/profile/contact.php';?>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="container-fluid">
                  <div class="divider blue lighten-4"></div>
                  <div class="divider blue lighten-4"></div>
               </div>
            </div>
            <div class="row">
               <div class="container-fluid">
                  <div class="col s12">

                     <!-- WORK EXPERIENCE
                     ----------------------------------------------------------------------->
                     <?php include 'application/views/profile/work.php';?>
                  </div>
               </div>
            </div>
         </div>
         <div class="divider"></div><div class="divider"></div>
         <div class="divider"></div><div class="divider"></div>
         <div class="card-content">
            <div class="row">
               <div class="container-fluid">
                  <div class="col s12">

                     <!-- LAB NOTEBOOK
                     ----------------------------------------------------------------------->
                     <div align="center" class="row">
                        <div class="container-fluid">
                           <h4><strong class="grey-text text-darken-1">Lab Notebook</strong></h4>
                        </div>
                     </div>
                     
                     <!-- Research Summary
                     ----------------------------------------------------------------------->
                     <div class="row">
                        <div class="container-fluid">
                           <div class="col s12">
                              <?php include 'application/views/profile/summary.php';?>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="container-fluid">
                           <div class="divider blue lighten-4"></div>
                           <div class="divider blue lighten-4"></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="container-fluid">
                           <h5>
                              <strong>Research</strong>
                           </h5>
                        </div>
                     </div>
                     <div class="row">
                        <div class="container-fluid">
                           <?php echo $files; ?>
                           <?php echo $error;?>
                           <?php echo form_open_multipart('profile/do_upload');?>
                              <input type="file" name="userfile" />
                              <input type="submit" value="Upload" />
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- JAVASCRIPT
--------------------------------------------------------------------------------------------->
<script type="text/javascript">   
   function show(current, hidden)
   {
      document.getElementById(current).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
   }
</script>