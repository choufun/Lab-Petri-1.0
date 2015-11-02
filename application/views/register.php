<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo validation_errors(); ?>

<div class="divider"></div>
<h5>Register for an account</h5>
<div class="divider"></div>

<div class="row">
   <div class="col s12">
      <div class="card green lighten-5">
         <!-- <form method="post" accept-charset="utf-8" action="http:/.../index.php/class/function" /> -->
         <!--// echo form_open('register');--> <!-- calls register->index() -->
         <form method="post" accept-charset="utf-8" action="register">

<!-- FIRST AND LAST NAME
--------------------------------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s5">
                  <label class="active" for ='firstname'> First Name: </label>
                  <input type="text" name="firstname">
               </div>

               <div class="input-field col s5">
                  <label class="active" for ='lastname'> Last Name: </label>
                  <input type="text" name="lastname">
               </div>
            </div>
            
<!-- EMAIL:
--------------------------------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s10 l5">
                  <label class="active" for ='email'> Email: </label>
                  <input type="text" name="email">
               </div>
               <div class="input-field file-field col s10 l5">
                  <div class="file-field input-field">
                     <div class="btn">
                        <span>Upload a Pic</span>
                        <input type="file" name="profile_pic">
                     </div>
                     <div class="file-path-wrapper">
                        <input name ="filepath" class="file-path validate" type="text" placeholder="Upload a profile picture!">
                     </div>
                  </div>

               </div>
            </div>

<!-- PASSWORD:
--------------------------------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s10">
                  <label class="active" for ='email'> Password: </label>
                  <input type="password" name="password">
               </div>
            </div>
<!-- PASSWORD CONFIRMATION:
--------------------------------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s10">
                  <label class="active" for ='passwordconf'> Password Confirmation: </label>
                  <input type="password" name="passwordconf">
               </div>
            </div>
<!-- UNIVERSITY:
--------------------------------------------------------------------------------------------->
            <div class="row">
               <div class="input-field col s10">
                  <label class="active" for="university"> University: </label><br>
                  <select class="browser-default" name="university">
                     <option selected disabled>-- Please Select One --</option>
                     <?php echo $schools;?>
                  </select>
               </div>
            </div>
            
<!-- MAJOR:
--------------------------------------------------------------------------------------------->
            <div class="input-field col s10">
               <div class="row">
                  <label class="active" for="major"> Major: </label><br>
                  <select class="browser-default" name="major">
                     <option selected disabled>-- Please Select One --</option>
                     <?php echo $options;?>
                  </select>
               </div>
            </div>
            <br>
            <br>
            
<!-- SUBMIT:
--------------------------------------------------------------------------------------------->
            <div class="right">
               <button class="btn" type="submit" name="action">
                  <i class="material-icons">send</i>
               </button>
            </div>
         </form>
      </div>
   </div>
</div>