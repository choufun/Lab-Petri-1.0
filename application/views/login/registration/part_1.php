<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="part_1">
   <div class="row" align="center">
      <div class="col s12">
         <h4 class="blue-text text-darken-2">
            Select your Education Standing?
         </h4>
      </div>
   </div>

   <div class="row col s12 m10 l8 offset-m1 offset-l2">   
      <div class="row col s12" align="left">
         <div class="input-field">
            <input type="checkbox" id="undergrad" name="standing" value="Undergraduate"/>
            <label for="standing">
               <div class="btn green">Undergraduate</div>
            </label>
         </div>
      </div>

      <div class="row col s12" align="left">
         <div class="input-field">
            <input type="checkbox" id="grad" name="standing" value="Graduate"/>
            <label for="standing">
               <div class="btn green">Graduate</div>
            </label>
         </div>
      </div>

      <div class="row col s12" align="left">
         <div class="input-field">
            <input type="checkbox" id="prof" name="standing" value="Professor"/>
            <label for="standing">
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