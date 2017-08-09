<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="part_1">
   
   <div class="row">
      
      <div class="row" align="left">
         <div class="col s12">
            <h5 class="grey-text text-darken-1"><strong>Please Select One</strong></h5>
         </div>
      </div>
      
<!-- CHECKBOX :: undergraduate
---------------------------------------------------------------------->
      <div class="row col s12 m6">
         <div class="input-field">
            <input type="checkbox" id="undergraduate" name="undergraduate" value="Undergraduate"/>
            <label for="undergraduate">
               <div class="btn-large grey lighten-5 grey-text text-darken-3">Undergraduate</div>
            </label>
         </div>
      </div>

<!-- CHECKBOX :: graduate
---------------------------------------------------------------------->
      <div class="row col s12 m6">
         <div class="input-field">
            <input type="checkbox" id="graduate" name="graduate" value="Graduate"/>
            <label for="graduate">
               <div class="btn-large grey lighten-5 grey-text text-darken-3">Graduate</div>
            </label>
         </div>
      </div>

<!-- CHECKBOX :: professor
---------------------------------------------------------------------->
      <div class="row col s12 m6">
         <div class="input-field">
            <input type="checkbox" id="professor" name="professor" value="Professor"/>
            <label for="professor">
               <div class="btn-large grey lighten-5 grey-text text-darken-3">Professor</div>
            </label>
         </div>
      </div>
      
<!-- CHECKBOX :: employer
---------------------------------------------------------------------->
      <div class="row col s12 m6">
         <div class="input-field">
            <input type="checkbox" id="employer" name="employer" value="employer"/>
            <label for="employer">
               <div class="btn-large grey lighten-5 grey-text text-darken-3">Employer</div>
            </label>
         </div>
      </div>     
      
   </div>
   
   <div class="row">                
      <div class="col s12">
         <button class="btn-large grey lighten-5 grey-text text-darken-3" onclick="return show('part_2','part_1');"
              style="width:100%; height:100%;">
            <h5><small>Next</small></h5>
         </button>
      </div>
   </div>

   <?php if($this->input->get('id') == "registration")
   { ; }
   else
   { ?>
   <div class="register_adj" align="right">
      <a class="reg_log" onclick="return show('front','back');">
         <strong>Login</strong>
      </a>
   </div>
<?php
   } ?>
</div>