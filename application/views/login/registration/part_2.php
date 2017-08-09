<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--<div id="part_2" style="display:none">-->
<div id="part_2">
            
   <!-- FIRST AND LAST NAME
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s6">
         <label class="green-text factive" for ='firstname'> First Name: </label>
         <input class="grey-text text-darken-3" type="text" name="firstname">
      </div>

      <div class="input-field col s6">
         <label class="green-text active" for ='lastname'> Last Name: </label>
         <input class="grey-text text-darken-3" type="text" name="lastname">
      </div>
   </div>

   <!-- EMAIL
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for ='email'> Email: </label>
         <input class="grey-text text-darken-3" type="text" name="email">
      </div>
   </div>

   <!-- PASSWORD
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for='password'> Password: </label>
         <input class="grey-text text-darken-3" type="password" name="password">
      </div>
   </div>

   <!-- PASSWORD CONFIRMATION
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for='passwordconf'> Password Confirmation: </label>
         <input class="grey-text text-darken-3" type="password" name="passwordconf">
      </div>
   </div>

   <!-- UNIVERSITY
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for="university">University:</label><br>
         <select name="university" class="browser-default grey-text text-darken-3">
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
         <select name="major" class="browser-default grey-text text-darken-3">
            <option selected disabled>-- Please Select One --</option>
            <?php echo $options;?>
         </select>   
      </div>               
   </div><br>
   
   <!-- STANDING
   ---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field col s12">
         <label class="green-text active" for="major">Account Type:</label><br>
         <select name="standing" class="browser-default grey-text text-darken-3">
            <option selected disabled>-- Please Select One --</option>
            <option value="Undergraduate">Undergraduate</option>
            <option value="Graduate">Graduate</option>
            <option value="Professor">Professor</option>
            <option value="Employer">Employer</option>
         </select>   
      </div>               
   </div>

   <input type="hidden" name="register" value="register">
   
   <div class="row"> 
<?php
   if($this->input->get('id') == "registration")
   { ?>
      <div class="row col s12">
         <button class="btn-large grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                 style="width:100%; height:100%;">
            <h5><small>Register</small></h5>
         </button>
      </div> 
<?php
   }
else { ?>
      <div class="row col s12 m6">
         <button class="btn-large grey lighten-5 grey-text" onclick="return show('front','back');"
                 style="width:100%; height:100%;">
                 <h5><small>Back</small></h5>
         </button>
      </div>
      <div class="row col s12 m6">
         <button class="btn-large grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                 style="width:100%; height:100%;">
            <h5><small>Register</small></h5>
         </button>
      </div>  
<?php
   } ?>
          
   </div> 
</div>