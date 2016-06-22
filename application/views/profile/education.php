<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- EDUCATION SHOW
------------------------------------------------------------------------>
<div id="education_show">
   <div class="row blue-text text-darken-2">
      <h5><small>
         <strong>University:&nbsp;</strong>
         <span class="grey-text text-darken-3">
            <small><strong><?php echo $university; ?></strong></small>
         </span>
      </small></h5>
   </div>
   <div class="row blue-text text-darken-2">
      <h5><small>
         <strong>Major:&nbsp;</strong>
         <span class="grey-text text-darken-3">
            <small><strong><?php echo $major;?></strong></small>
         </span>
      </small></h5>
   </div>
   <div class="row blue-text text-darken-2">
      <h5><small>
         <strong>Standing:&nbsp;</strong>
         <span class="grey-text text-darken-3">
            <small><strong><?php echo $education;?></strong></small>
         </span>
      </small></h5>
   </div>
   <a class="right" onclick="return show('education_edit','education_show');">Edit</a>
</div>

<!-- EDUCATION EDIT
------------------------------------------------------------------------>
<div id="education_edit" style="display:none">
   <?php echo form_open('profile/update'); ?>
<!--
      <div class="input-field col s12">
         <label class="blue-text active" for ='university'> University: </label>
         <input class="black-text text-darken-2" type="text" name="university" value="<?php echo $university; ?>">
      </div>
-->
      <div class="input-field col s12">
         <label class="blue-text active" for ='major'> Major: </label>
         <input class="black-text text-darken-2" type="text" name="major" value="<?php echo $major; ?>">
      </div>
      <div class="input-field col s12">
         <label class="blue-text active" for ='standing'> Standing: </label>
         <input class="black-text text-darken-2" type="text" name="standing" value="<?php echo $education; ?>">
      </div>
      <input type="hidden" name="education" value="education">
      <div class="input-field col s12">
         <button class="front btn waves-effect blue darken-1" type="submit" name="action">
            <strong>SAVE</strong>
         </button>
      </div>
   <?php echo form_close(); ?>
   <a class="right" onclick="return show('education_show','education_edit');">Cancel</a>
</div>