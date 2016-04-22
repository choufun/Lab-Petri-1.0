<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="part_1">
   
   <div class="row" align="center">
      <div class="col s12">
         <h5 class="blue-text text-darken-2">
            <strong>Select Your Education?</strong>
         </h5>
      </div>
   </div>

   <div class="row col s12 m10 l8 offset-m1 offset-l2">
      
      <!-- UNDERGRADUATE
      ---------------------------------------------------------------------->
      <div class="row col s12" align="left">
         <div class="input-field">
            <input type="checkbox" id="undergraduate" name="undergraduate" value="Undergraduate"/>
            <label for="undergraduate">
               <div class="btn green">Undergraduate</div>
            </label>
         </div>
      </div>

      <!-- GRADUATE
      ---------------------------------------------------------------------->
      <div class="row col s12" align="left">
         <div class="input-field">
            <input type="checkbox" id="graduate" name="graduate" value="Graduate"/>
            <label for="graduate">
               <div class="btn green">Graduate</div>
            </label>
         </div>
      </div>

      <!-- PROFESSOR
      ---------------------------------------------------------------------->
      <div class="row col s12" align="left">
         <div class="input-field">
            <input type="checkbox" id="professor" name="professor" value="Professor"/>
            <label for="professor">
               <div class="btn green">Professor</div>
            </label>
         </div>
      </div>
   </div>

   <div class="row s12 m12 l12" align="center">
      <div class="btn blue" onclick="return show('part_2','part_1');">
         <small>
            <strong>Next</strong>
         </small>
      </div>
   </div>

   <div class="register_adj" align="right">
      <a class="reg_log" onclick="return show('front','back');">
         <strong>Login</strong>
      </a>
   </div>

</div>