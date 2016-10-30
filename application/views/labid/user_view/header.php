<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
   .profile-image { border-radius: 50%; width: 100px; height: 100px; border: 1px solid #ffff8d;}
   
   #default-image
   {
      border-radius: 50%;
      border: 1px solid #fbc02d;
      width: 200px;
      height: 200px;
   }
</style>

<div class="container-fluid row">  
   <div class="col s12 m6 card-image blue darken-1" align="center">

<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) {
         if ($profile_picture === NULL) { ?>
      <div id="profile-padding">
         <i id="default-image"class="white large material-icons black-text responsive-img">perm_identity</i>
      </div>
   <?php } else { ?>
      <div id="profile-padding">
         <img class="responsive-img z-depth-2" src="users/<?php echo $this->session->user_id; ?>/pictures/<?php echo $profile_picture; ?>"
              id="profile-image">
      </div>
   <?php }
      }?>
<!--
      <div align="right" class="icon-border row">
         <div class="container-fluid">
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large">
               <i class="white-text small material-icons icon-inner-border">settings_applications</i>
            </a>
         </div>         
      </div>
-->
      <div class="row"></div><div class="row"></div>
   </div>
   
<!-- CONTACT DISPLAY
------------------------------------------------------------------------------------------------>
   <div class="col s12 m6">
      <div class="card-content" id="contact_display">
         <h3>
            <strong><?php echo $this->session->firstname." ".$this->session->lastname;?></strong>
            <span style="font-size: 14px;">
               <a href="" onclick="return show('contact_edit','contact_display');" >Edit</a>
               <!-- &nbsp;|&nbsp;<a href="https://www.labpetri.org/labid/resume">Download Resume</a> -->
            </span>
         </h3>
         <h6><strong><?php echo $university;?></strong></h6>
         <h6><strong><?php echo $major;?>, <?php echo $education;?></strong></h6>
         <br>
         <h6><strong><?php echo $this->session->email;?></strong></h6>
         <h6><strong><?php echo $phone;?></strong></h6>
         <h6><a href="http://<?php echo $linkedin;?>" target="_blank"><strong><?php echo $linkedin;?></strong></a></h6>
      </div>
      
<!-- CONTACT EDIT
------------------------------------------------------------------------------------------------>
      <div class="card-content" id="contact_edit" style="display:none;">
         <?php echo form_open('labid/update'); ?>
         <div class="input-field col s12">
            <label class="blue-text active" for ='university'> University: </label>
            <input class="black-text text-darken-2" type="text" name="university" value="<?php echo $university; ?>">
         </div>
         <div class="input-field col s12">
            <label class="blue-text active" for ='major'> Major: </label>
            <input class="black-text text-darken-2" type="text" name="major" value="<?php echo $major; ?>">
         </div>
         <div class="input-field col s12">
            <label class="blue-text active" for ='standing'> Standing: </label>
            <input class="black-text text-darken-2" type="text" name="standing" value="<?php echo $education; ?>">
         </div>
         <div class="input-field col s12">
            <label class="blue-text active" for ='email'> Email: </label>
            <input class="black-text text-darken-2" type="text" name="email" value="<?php echo $this->session->email; ?>">
         </div>
         <div class="input-field col s12">
            <label class="blue-text active" for ='phone'> Phone: </label>
            <input class="black-text text-darken-2" type="text" name="phone" value="<?php echo $phone; ?>">
         </div>
         <div class="input-field col s12">
            <label class="blue-text active" for ='linkedin'> LinkedIn: (do not include https://) </label>
            <input class="black-text text-darken-2" type="text" name="linkedin" value="<?php echo $linkedin; ?>">
         </div>         
         <input type="hidden" name="contacts" value="contacts">
         <div class="input-field col s12 m12 l6">
            <!-- <button class="front btn waves-effect blue darken-1" type="submit" name="action"><strong>SAVE</strong></button> -->
            <button class="front btn-large grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                    style="width:100%; height:100%;">
               <h5><span class="grey-text text-darken-3"><small>Save</small></span></h5>
            </button>
         </div>
         <div class="input-field col s12 m12 l6">
            <!-- <a class="right" onclick="return show('contact_show','contact_edit');">Cancel</a> -->
            <button class="front btn-large grey lighten-5 grey-text"
                    style="width:100%; height:100%;"
                    onclick="return show('contact_display','contact_edit');">
               <h5><span class="grey-text"><small>Cancel</small></span></h5>
            </button>
         </div>
         <?php echo form_close(); ?>
      </div>
   </div>
</div>
