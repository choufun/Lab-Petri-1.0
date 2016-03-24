<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="front">
   <div class = "card-content login-border">
      <div class = "container-fluid">
         <span class="red-text">
            <?php echo validation_errors(); ?>
         </span>
         
         <?php echo form_open('Login'); ?>
         
            <!-- EMAIL
            ---------------------------------------------------------------------->
            <div class="row">
               <div class="input-field">
                  <input name="email" type="email" class="validate blue-text text-darken-2">
                  <label class="green-text active" for="email">Email:</label>
               </div>
            </div>
         
            <!-- PASSWORD
            ---------------------------------------------------------------------->
            <div class="row">
               <div class="input-field">
                  <input name="password" type="password" class="validate blue-text text-darken-2">
                  <label class="green-text active" for="password">Password:</label>
               </div>
            </div>
            <input type="hidden" name="login" value="login">
         
            <!-- LOGIN
            ---------------------------------------------------------------------->
            <div class="row"> 
               <button class="front btn waves-effect blue darken-1" type="submit" name="action">
                  <strong>LOGIN</strong>
               </button>
            </div>
         <?php echo form_close(); ?>
      
         <!-- REGISTER LINK
         ------------------------------------------------------------------------->
         <div class="register_adj" align="right">
            <a class="reg_log" onclick="return show('back','front');">
               <strong>Register</strong>
            </a>
         </div>
      </div>
   </div>
</div>