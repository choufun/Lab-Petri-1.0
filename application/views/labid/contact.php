<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- CONTACT SHOW
----------------------------------------------------------------------->
<div id="contact_show">   
   <div class="row blue-text text-darken-2"> 
      <h5><small>
         <strong class="">Email:&nbsp;</strong>
         <span class="grey-text text-darken-3">
            <small><strong><?php echo $this->session->email; ?></strong></small>
         </span>
      </small></h5>
   </div>
   <div class="row blue-text text-darken-2">
      <h5><small>
         <strong class="">Phone:&nbsp;</strong>
         <span class="grey-text text-darken-3">
            <small><strong><?php echo $phone; ?></strong></small>
         </span>
      </small></h5>
   </div>
   <div class="row blue-text text-darken-2">
      <h5><small>
         <strong>LinkedIn:&nbsp;</strong>
         <span class="grey-text text-darken-3">
            <small><strong><?php echo $linkedin; ?></strong></small>
         </span>
      </small></h5>
   </div>
<?php
   if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
   { ?>
      <a class="right" onclick="return show('contact_edit','contact_show');">Edit</a>
<?php
   } ?>
</div>
<!-- CONTACT EDIT
----------------------------------------------------------------------->
<div id="contact_edit" style="display:none">
   <?php echo form_open('labid/update'); ?>
      <div class="input-field col s12">
         <label class="blue-text active" for ='email'> Email: </label>
         <input class="black-text text-darken-2" type="text" name="email" value="<?php echo $this->session->email; ?>">
      </div>
      <div class="input-field col s12">
         <label class="blue-text active" for ='phone'> Phone: </label>
         <input class="black-text text-darken-2" type="text" name="phone" value="<?php echo $phone; ?>">
      </div>
      <div class="input-field col s12">
         <label class="blue-text active" for ='linkedin'> LinkedIn: </label>
         <input class="black-text text-darken-2" type="text" name="linkedin" value="<?php echo $linkedin; ?>">
      </div>
      <input type="hidden" name="contacts" value="contacts">
      <div class="input-field col s12">
         <button class="front btn waves-effect blue darken-1" type="submit" name="action">
            <strong>SAVE</strong>
         </button>
      </div>
   <?php echo form_close(); ?>
   <a class="right" onclick="return show('contact_show','contact_edit');">Cancel</a>
</div>