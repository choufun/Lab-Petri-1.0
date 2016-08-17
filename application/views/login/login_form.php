<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="front">
   <div class="card-content login-border">
      <div class="container-fluid">
         <span class="red-text"><?php echo validation_errors(); ?></span>
         
         <?php echo form_open('login'); ?>
         
            <!-- EMAIL
            ---------------------------------------------------------------------->
            <div class="row">
               <div class="input-field">
                  <strong><input name="email" type="email" class="validate grey-text text-darken-2"></strong>
                  <label class="green-text text-darken-2 active" for="email">Email:</label>
               </div>
            </div>
         
            <!-- PASSWORD
            ---------------------------------------------------------------------->
            <div class="row">
               <div class="input-field">
                  <input id="login_password" name="password" type="password" class="validate grey-text text-darken-2">
                  <label class="green-text text-darken-2 active" for="password">Password:</label>
               </div>
            </div>
            <input type="hidden" name="login" value="login">
         
            <!-- LOGIN
            ---------------------------------------------------------------------->
            <div class="row">      
               
               <div class="row col s12 m6">
                  <button class="front btn-large grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                          style="width:100%; height:100%;" id="login_button">
                     <h5><span class="grey-text text-darken-3"><small>Login</small></span></h5>
                  </button>
               </div>
               
               <div class="row col s12 m6">
                  <button class="btn-large grey lighten-5 grey-text" onclick="return show('back','front');"
                       style="width:100%; height:100%;">
                     <h5><small>Register</small></h5>
                  </button>
               </div>
               
               
            </div>         
         <?php echo form_close(); ?>
      </div>
   </div>
</div>