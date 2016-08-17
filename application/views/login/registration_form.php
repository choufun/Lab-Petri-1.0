<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="back" style="display:none">
   <div class ="card-content login-border">
      <div align="center" class = "container-fluid">
         <span class="red-text">
            <?php echo validation_errors(); ?>
         </span>         
         <?php echo form_open('Login'); ?>      
            <!-- PART 1
            -------------------------------------------------------------------------->
            <?php //include 'application/views/login/registration/part_1.php';?>
            <!-- PART 2
            -------------------------------------------------------------------------->
            <?php include 'application/views/login/registration/part_2.php';?>      
         <?php echo form_close(); ?>
      </div>
   </div>
</div>