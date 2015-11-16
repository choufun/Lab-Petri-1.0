<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- MY PROFILE PICTURE
----------------------------------------------------------------------->
<div id="profile_picture" class="modal">
   <div class="modal-content">
      <div class="card card-border">
         <div align="center" class="blue white-text">
            <div class="profile">
               <a class="right modal-action modal-close waves-effect btn-flat white-text">
                  x
               </a>
               <center>
                  <!-- <img class="image" src="assets/profile_pic/profile.jpg" alt="Profile Picture"> -->
                  <img class="image" src="files/profile_picture/<?php echo $profile_picture; ?>"
                       alt="Profile Picture">
               </center>
               <span class="title">
                  <h4>Profile Picture</h4>
               </span>
            </div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
         </div>
         <div align="center" class="content col s12 m6">
            <h5>
               <strong>Change Picture:</strong>
            </h5>
            <h6 class="index-content">
               <?php echo $error;?>
               <?php echo form_open_multipart('profile/do_upload_pic');?>
               <input type="file" name="userfile"/>
               <input type="submit" value="Upload"/>
               </form>
            </h6>
         </div>
      </div>
   </div>
</div>
            
<!-- MY MESSAGES
----------------------------------------------------------------------->
<div id="messages" class="modal">
   <div class="modal-content">
      <div class="card">
         <div align="center" class="blue white-text">
            <div class="profile">
               <a class="right modal-action modal-close waves-effect btn-flat white-text">
                  x
               </a>
               <span class="title">
                  <h4>Messages:</h4>
               </span>
            </div>
            <div class="divider"></div>
            <div class="divider"></div>
         </div>
         <div class="content">
         </div>
      </div>
   </div>
</div>