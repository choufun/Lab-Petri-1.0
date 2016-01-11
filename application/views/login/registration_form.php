<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="back" style="display:none">
   <div class = "card-content login-border">
      <div align="center" class = "container-fluid">
         <span class="red-text">
            <?php echo validation_errors(); ?>
         </span>
         <form method="post" accept-charset="utf-8" action="login">
            <!-- FIRST AND LAST NAME
            ---------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s6">
                  <label class="active" for ='firstname'> First Name: </label>
                  <input type="text" name="firstname">
               </div>

               <div class="input-field col s6">
                  <label class="active" for ='lastname'> Last Name: </label>
                  <input type="text" name="lastname">
               </div>
            </div>
            <!-- EMAIL
            ---------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s12">
                  <label class="active" for ='email'> Email: </label>
                  <input type="text" name="email">
               </div>
            </div>
            <!-- PASSWORD
            ---------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s12">
                  <label class="active" for ='email'> Password: </label>
                  <input type="password" name="password">
               </div>
            </div>
            <!-- PASSWORD CONFIRMATION
            ---------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s12">
                  <label class="active" for ='passwordconf'> Password Confirmation: </label>
                  <input type="password" name="passwordconf">
               </div>
            </div>
            <!-- UNIVERSITY
            ---------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s12">
                  <label class="active" for="university"> University: </label><br>
                  <select class="browser-default" name="university">
                     <option selected disabled>-- Please Select One --</option>
                     <?php echo $schools;?>
                  </select>
               </div>
            </div>
            <!-- MAJOR
            ---------------------------------------------------------------------->
            <div class="input-field col s12">
               <div class="row">
                  <label class="active" for="major"> Major: </label><br>
                  <select class="browser-default" name="major">
                     <option selected disabled>-- Please Select One --</option>
                     <?php echo $options;?>
                  </select>
               </div>
            </div>
            <input type="hidden" name="register" value="register">
            <!-- REGISTER
            ---------------------------------------------------------------------->
            <div class="row"> 
               <button class="back btn waves-effect blue darken-1" type="submit" name="action">
                  <strong>REGISTER</strong>
               </button>
            </div>
         </form>
         <!-- LOGIN LINK
         ------------------------------------------------------------------------->
         <div class="register_adj" align="right">
            <a class="reg_log waves-effect" onclick="return show('front','back');">Login</a>
         </div>
      </div>
   </div>
</div>