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

<div class="row" style="margin: 0px 0px;">
   <div class="col s12 blue darken-3" align="center">

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
   </div>

<!-- PROFILE TOOLBAR DISPLAY
------------------------------------------------------------------------------------------------>
   <div class="col s12">
      <div align="center" class="card-content" id="contact_display">
          <h3><strong><?php echo $this->session->firstname." ".$this->session->lastname;?></strong></h3>
          <h6><strong><?php echo $university;?></strong></h6>
          <h6><strong><?php echo $major;?>, <?php echo $education;?></strong></h6>
          <br>
          <h6><strong><?php echo $this->session->email;?></strong></h6>
          <h6><strong><?php echo $phone;?></strong></h6>
          <h6><a href="http://<?php echo $linkedin;?>" target="_blank"><strong><?php echo $linkedin;?></strong></a></h6>
          <br>
          <div class="col s12 m4 row" align="center">
            <button class="front btn-large grey lighten-5 grey-text" style="width:100%; height:100%;" onclick="return show('upload_edit','contact_display');">
                <h5><span class="grey-text text-darken-3"><small>Upload</small></span></h5>
            </button>
          </div>
          <div class="col s12 m4 row" align="center">
            <button class="front btn-large grey lighten-5 grey-text" style="width:100%; height:100%;" onclick="return show('contact_edit','contact_display');">
                <h5><span class="grey-text text-darken-3"><small>Edit</small></span></h5>
            </button>
          </div>
          <div class="col s12 m4 row" align="center">
              <button class="front btn-large grey lighten-5 grey-text" style="width:100%; height:100%;" onclick="return show('contact_edit','contact_display');">
                  <h5><span class="grey-text text-darken-3"><small>Posts</small></span></h5>
              </button>
          </div>
      </div>

<!-- UPLOAD EDIT FORM
------------------------------------------------------------------------------------------------>
      <div id="upload_edit" style="display:none;">
         <?php echo form_open('labid/update'); ?>
              <div class="file-field input-field">
                  <div class="btn">
                      <span>File</span>
                      <input type="file">
                  </div>
                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Upload a profile picture">
                  </div>
              </div>
         <?php echo form_close(); ?>
          <div class="input-field col s12 m12 l6 offset-l6">
              <button class="front btn-large grey lighten-5 grey-text" style="width:100%; height:100%;"
                      onclick="return show('contact_display','upload_edit');">
                  <h5><span class="grey-text"><small>Cancel</small></span></h5>
              </button>
          </div>
      </div>

<!-- PROFILE EDIT FORM
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
            <button class="front btn-large grey lighten-5 grey-text text-darken-3" type="submit" name="action" style="width:100%; height:100%;">
               <h5><span class="grey-text text-darken-3"><small>Save</small></span></h5>
            </button>
         </div>
         <div class="input-field col s12 m12 l6">
            <button class="front btn-large grey lighten-5 grey-text" style="width:100%; height:100%;"
                    onclick="return show('contact_display','contact_edit');">
               <h5><span class="grey-text"><small>Cancel</small></span></h5>
            </button>
         </div>
         <?php echo form_close(); ?>
      </div>
   </div>
</div>
