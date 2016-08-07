<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- MY PROFILE PICTURE
----------------------------------------------------------------------->
<div id="profile_picture" class="modal">
   <div align="center" id="edit_profile_picture" class="modal-content">
      <a class="modal-action modal-close waves-effect btn-flat black-text">
         (x)
      </a>
   </div>
   <div class="modal-content">
      <div class="card card-border">
         <div align="center" class="blue white-text">
            <div class="row" id="profile-padding">
               <div align="center" class="container-fluid">
                  <img class="responsive-img z-depth-2" src="users/<?php echo $this->session->user_id; ?>/pictures/<?php echo $profile_picture; ?>"
                    id="profile-image">
               </div>
            </div>
            <div class="divider"></div>
         </div>
         <div align="center" class="content col s12 m6">
            <h6 class="index-content">
               <?php echo form_open_multipart('Labid/do_upload_pic');?>
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
<!--
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
-->