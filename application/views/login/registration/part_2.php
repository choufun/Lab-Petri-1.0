<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="part_2" style="display:none">
            
   <!-- FIRST AND LAST NAME
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s6">
         <label class="green-text active" for ='firstname'> First Name: </label>
         <input class="blue-text text-darken-2" type="text" name="firstname">
      </div>

      <div class="input-field col s6">
         <label class="green-text active" for ='lastname'> Last Name: </label>
         <input class="blue-text text-darken-2" type="text" name="lastname">
      </div>
   </div>

   <!-- EMAIL
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for ='email'> Email: </label>
         <input class="blue-text text-darken-2" type="text" name="email">
      </div>
   </div>

   <!-- PASSWORD
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for='email'> Password: </label>
         <input class="blue-text text-darken-2" type="password" name="password">
      </div>
   </div>

   <!-- PASSWORD CONFIRMATION
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for='passwordconf'> Password Confirmation: </label>
         <input class="blue-text text-darken-2" type="password" name="passwordconf">
      </div>
   </div>

   <!-- UNIVERSITY
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for="university">University:</label><br>
         <select name="university" class="browser-default blue-text text-darken-2">
            <option selected disabled>-- Please Select One --</option>
            <?php echo $schools;?>
         </select>
      </div>               
   </div><br>

   <!-- MAJOR
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for="major">Major:</label><br>
         <select name="major" class="browser-default blue-text text-darken-2">
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

   <!-- LOGIN LINK
   ------------------------------------------------------------------------->
   <div class="register_adj" align="left">
      <a class="reg_log" onclick="return show('part_1','part_2');">
         <strong>Back</strong>
      </a>
   </div>

   <div class="register_adj" align="right">
      <a class="reg_log" onclick="return show('front','back');">
         <strong>Login</strong>
      </a>
   </div>
</div>