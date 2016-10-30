<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="summary_show">
   <div class="row">
      <div class="container-fluid">
         <h5><strong>Summary</strong></h5>
      </div>
   </div>
   <div class="row">
      <div class="container-fluid">
         <h5>
            <strong class="blue-text text-darken-2">Research Goal: </strong>
            <small><span></span></small>
         </h5>
      </div>
   </div>
   <div class="row">
      <div class="container-fluid">
         <h5>
            <strong class="blue-text text-darken-2">Interests: </strong>
            <small><span></span></small>
         </h5>
      </div>
   </div>
   <div class="row">
      <div class="container-fluid">
         <h5>
            <strong class="blue-text text-darken-2">Expertise: </strong>
            <small><span></span></small>
         </h5>
      </div>
   </div>
   <div class="icon-border register_adj" align="right">
      <div class="container-fluid">
         <a class="reg_log" onclick="return show('summary_edit','summary_show');">
            <span>
               <i class="blue-text small material-icons icon-inner-border">edit</i>
            </span>
         </a>
      </div>
   </div>
</div>

<!-- EDIT QUERY
--------------------------------------------------------------------------------------------->
<div id="summary_edit" style="display:none">
   <form>
      <div class="row">
         <div class="container-fluid">
            <h5><strong>Summary</strong></h5>
         </div>
      </div>
      
      <div class="card">
         <div class="card-content">
            <div class="container-fluid">

               <div class="row">
                  <div class="input-field">
                     <input name="goal" type="text" class="validate" placeholder="">
                     <label for="goal">
                        <strong class="blue-text">Research Goal: </strong>
                     </label>
                  </div>
               </div>

               <div class="row">
                  <div class="input-field">
                     <input name="interests" type="text" class="validate" placeholder="">
                     <label for="interests">
                        <strong class="blue-text">Interests: </strong>
                     </label>
                  </div>
               </div>

               <div class="row">
                  <div class="input-field">
                     <input name="expertise" type="text" class="validate" placeholder="">
                     <label for="expertise">
                        <strong class="blue-text">Expertise: </strong>
                     </label>
                  </div>
               </div>

               <input type="hidden" name="login" value="contact">

               <div class="row" align="right"> 
                  <button class="front btn waves-effect blue darken-1" type="submit" name="action">
                     <strong>Save Changes</strong>
                  </button>
               </div>
               <div class="register_adj" align="right">
                  <a class="reg_log" onclick="return show('summary_show','summary_edit');">Cancel</a>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>