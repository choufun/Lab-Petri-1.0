<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   #education_border
   {
      padding-left: 25px;
   }
</style>

<div class="card z-depth-2" style="margin: 5px 5px;">

<!-- PROFILE DISPLAY
--------------------------------------------------------------------------------------------->
   <div id="education_show">
      <div align="center" class="row">
         <h5>
            <strong>Education</strong>
         </h5>
      </div>

      <div id="education_border">
         <div class="row blue-text text-darken-2">
            <h5>
               <small>
                  <strong>University:&nbsp;</strong>
                  <span class="grey-text text-darken-3">
                     <small>
                        <strong><?php echo $university; ?></strong>
                     </small>
                  </span>
               </small>
            </h5>
         </div>
         <div class="row blue-text text-darken-2">
            <h5>
               <small>
                  <strong>Major:&nbsp;</strong>
                  <span class="grey-text text-darken-3">
                     <small>
                        <strong><?php echo $major;?></strong>
                     </small>
                  </span>
               </small>
            </h5>
         </div>
         <div class="row blue-text text-darken-2">
            <h5>
               <small>
                  <strong>Standing:&nbsp;</strong>
                  <span class="grey-text text-darken-3">
                     <small>
                        <strong><?php echo $education;?></strong>
                     </small>
                  </span>
               </small>
            </h5>
         </div>
      </div>
   </div>
</div>