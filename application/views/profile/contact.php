<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   #contact_border
   {
      padding-left: 25px;
   }
</style>

<div class="card z-depth-2" style="margin: 5px 5px;">

   <!-- DISPLAY INFORMATION
   --------------------------------------------------------------------------------------------->
   <div id="contact_show">
      <div align="center" class="row">
         <div class="container-fluid">
            <h5>
               <strong>Contact</strong>&nbsp;
               <a class="reg_log" onclick="return show('contact_edit','contact_show');">
                  <span><i class="grey-text small material-icons icon-inner-border">edit</i></span>
               </a>
            </h5>
         </div>
      </div>
      <div id="contact_border">
         <div class="row blue-text text-darken-2"> 
            <h5>
               <small>
                  <strong class="">Email:&nbsp;</strong>
                  <span class="grey-text text-darken-3">
                     <small>
                        <strong><?php echo $this->session->email; ?></strong>
                     </small>
                  </span>
               </small>
            </h5>
         </div>
         <div class="row blue-text text-darken-2">
            <h5>
               <small>
                  <strong class="">Phone:&nbsp;</strong>
                  <span class="grey-text text-darken-3">
                     <small>
                        <strong><?php echo $phone; ?></strong>
                     </small>
                  </span>
               </small>
            </h5>
         </div>
         <div class="row blue-text text-darken-2">
            <h5>
               <small>
                  <strong>LinkedIn:&nbsp;</strong>
                  <span class="grey-text text-darken-3">
                     <small>
                        <strong><?php echo $linkedin; ?></strong>
                     </small>
                  </span>
               </small>
            </h5>
         </div>
      </div>
   </div>
</div>