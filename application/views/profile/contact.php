<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- DISPLAY INFORMATION
--------------------------------------------------------------------------------------------->
<div id="contact_show">
   <div class="row">
      <div class="container-fluid">
         <h5><strong>Contact Information</strong></h5>
      </div>
   </div>
   <div class="row"> 
      <div class="container-fluid">
         <h5>
            <strong class="blue-text text-darken-2">Email: </strong>
            <small><span><?php echo $this->session->email;?></span></small>
         </h5>
      </div>
   </div>
   <div class="row">
      <div class="container-fluid">
         <h5>
            <strong class="blue-text text-darken-2">Phone: </strong>
            <small><span></span></small>
         </h5>
      </div>
   </div>
   <div class="row">
      <div class="container-fluid">
         <h5>
            <strong class="blue-text text-darken-2">LinkedIn: </strong>
            <small><span></span></small>
         </h5>
      </div>
   </div>
   <div class="icon-border register_adj" align="right">
      <div class="container-fluid">
         <a class="reg_log" onclick="return show('contact_edit','contact_show');">
            <span>
               <i class="blue-text small material-icons icon-inner-border">edit</i>
            </span>
         </a>
      </div>
   </div>
</div>

<!-- EDIT QUERY
--------------------------------------------------------------------------------------------->
<div id="contact_edit" style="display:none">
   <form>
      <div class="row">
         <div class="container-fluid">
            <h5><strong>Contact Information</strong></h5>
         </div>
      </div>
      
      <div class="card">
         <div class="card-content">
            <div class="container-fluid">

               <div class="row">
                  <div class="input-field">
                     <input name="email" type="email" class="validate" placeholder="<?php echo $this->session->email;?>">
                     <label for="email">
                        <strong class="blue-text">Email: </strong>
                     </label>
                  </div>
               </div>

               <div class="row">
                  <div class="input-field">
                     <input name="phone" type="text" class="validate" placeholder="(xxx) - xxx - xxxx">
                     <label for="phone">
                        <strong class="blue-text">Phone: </strong>
                     </label>
                  </div>
               </div>

               <div class="row">
                  <div class="input-field">
                     <input name="linkedin" type="text" class="validate" placeholder="www.linkedin.com/in/<username>">
                     <label for="linkedin">
                        <strong class="blue-text">LinkedIn: </strong>
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
                  <a class="reg_log" onclick="return show('contact_show','contact_edit');">Cancel</a>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>