<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   #research_border
   {
      padding-left: 25px;
      padding-right: 25px;
   }
</style>

<!-- LAB NOTEBOOK
----------------------------------------------------------------------->
<div align="center" class="row">
   <h5 class="blue-text text-darken-2">
      <strong>Lab Notebook</strong>
   </h5>
   <h6>
      <small class="grey-text text-darken-1">Research Focus:
         <strong class="green-text"><?php echo $major; ?></strong>
      </small>
   </h6>
</div>

<!-- Research Summary
----------------------------------------------------------------------->
<div class="col s12 m12 l12">
   <div class="container-fluid">
      <?php echo $error; ?>
         <div class="row">
            <div class="col s12 m12 l12">
               <?php echo $files; ?>
            </div>
         </div>

      <div id="research_border" align="right">
         <small class="grey-text text-darken-2">
            <?php echo form_open_multipart('profile/do_upload');?>
               <input type="file" name="userfile" />
               <input type="submit" value="Upload" />                          
            <?php echo form_close(); ?>
         </small>
      </div>

   </div>
</div>