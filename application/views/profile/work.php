<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="work_show">
   <div class="row">
      <div class="container-fluid">
         <h5><strong>Work Experience</strong></h5>
      </div>
   </div>
   <div class="row">
      <div class="container-fluid">

         <!-- JOB
         ----------------------------------------------------------------->
         <h5 class="blue-text text-darken-2">Position</h5>                             
         <h5><small class="grey-text text-darken-2">Company: </small></h5>
         <h5><small class="grey-text text-darken-2">Location: </small></h5>
         <h5><small class="grey-text text-darken-2">Details: </small></h5>
         <h5><small class="grey-text text-darken-2">Reference: </small></h5>
      </div>
   </div>
   <div class="icon-border register_adj" align="right">
      <div class="container-fluid">
         <a class="reg_log" onclick="return show('work_edit','work_show');">
            <span>
               <i class="blue-text small material-icons icon-inner-border">edit</i>
            </span>
         </a>
      </div>
   </div>
</div>

<!-- EDIT QUERY
--------------------------------------------------------------------------------------------->
<div id="work_edit" style="display:none">
   <form>
      <div class="row">
         <div class="container-fluid">
            <h5><strong>Work Experience</strong></h5>
         </div>
      </div>
      
      <div class="card">
         <div class="card-content">
            <div class="container-fluid">

               <div class="row">
                  <div class="input-field">
                     <input name="position" type="text" class="validate" placeholder="">
                     <label for="position">
                        <strong class="blue-text">Position: </strong>
                     </label>
                  </div>
               </div>

               <div class="row">
                  <div class="input-field">
                     <input name="company" type="text" class="validate" placeholder="">
                     <label for="company">
                        <strong class="blue-text">Company: </strong>
                     </label>
                  </div>
               </div>

               <div class="row">
                  <div class="input-field">
                     <input name="location" type="text" class="validate" placeholder="">
                     <label for="location">
                        <strong class="blue-text">Location: </strong>
                     </label>
                  </div>
               </div>
               
               <div class="row">
                  <div class="input-field">
                     <input name="details" type="text" class="validate" placeholder="">
                     <label for="details">
                        <strong class="blue-text">Details: </strong>
                     </label>
                  </div>
               </div>
               
               <div class="row">
                  <div class="input-field">
                     <input name="reference" type="text" class="validate" placeholder="">
                     <label for="reference">
                        <strong class="blue-text">Reference: </strong>
                     </label>
                  </div>
               </div>

               <input type="hidden" name="login" value="work">

               <div class="row" align="right"> 
                  <button class="front btn waves-effect blue darken-1" type="submit" name="action">
                     <strong>Save Changes</strong>
                  </button>
               </div>
               <div class="register_adj" align="right">
                  <a class="reg_log" onclick="return show('work_show','work_edit');">Cancel</a>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>