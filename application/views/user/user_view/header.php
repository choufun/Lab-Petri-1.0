<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--
USER: user view
------------------------------------------------------------------------
Author: Steven Chou

-->
<div id="profile-border" class="row">
    <div class="col s12 blue darken-3" align="center">
<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
        <div id="profile-padding">
    <?php if ($profile_picture === NULL) { ?><i id="default-image"class="white large material-icons black-text responsive-img">perm_identity</i>
    <?php } else { ?><img id="profile-image" class="responsive-img z-depth-2" src="users/<?php echo $this->session->user_id; ?>/pictures/<?php echo $profile_picture; ?>">
    <?php } ?>
        </div>
<?php } ?>
    </div>
<!--
INFORMATION
-->
    <div class="col s12">
        <div id="profile" align="center" class="card-content">
            <h3><strong><?php echo $this->session->firstname." ".$this->session->lastname;?></strong></h3>
            <h6><strong><?php echo $university;?></strong></h6>
            <h6><strong><?php echo $major;?>, <?php echo $education;?></strong></h6>
            <br>
            <h6><strong><?php echo $this->session->email;?></strong></h6>
            <h6><strong><?php echo $phone;?></strong></h6>
            <h6><a href="http://<?php echo $linkedin;?>" target="_blank"><strong><?php echo $linkedin;?></strong></a></h6>
            <br>
<!--
TOOLBAR
-->
            <div class="col s12 m4 row">
                <button class="front btn-large grey lighten-5 grey-text edit-btn" onclick="return show('upload','profile');">
                    <h5><span class="grey-text text-darken-3"><small>Upload</small></span></h5>
                </button>
            </div>
            <div class="col s12 m4 row">
                <button class="front btn-large grey lighten-5 grey-text edit-btn" onclick="return show('profile_edit','profile');">
                    <h5><span class="grey-text text-darken-3"><small>Edit</small></span></h5>
                </button>
            </div>
            <div class="col s12 m4 row">
                <button class="front btn-large grey lighten-5 grey-text edit-btn" onclick="return show('profile_edit','profile');">
                    <h5><span class="grey-text text-darken-3"><small>Posts</small></span></h5>
                </button>
            </div>
        </div>
<!--
UPLOAD FORM
-->
        <div id="upload" class="edit">
            <?php echo form_open('user/update'); ?>
            <div class="file-field input-field">
                <div class="btn"><span>File</span><input type="file"></div>
                <div class="file-path-wrapper"><input class="file-path validate" type="text" placeholder="Upload a profile picture"></div>
            </div>
            <?php echo form_close(); ?>
            <div class="input-field col s12 m12 l6 offset-l6">
                <button class="front btn-large grey lighten-5 grey-text edit-btn" onclick="return show('profile','upload');">
                    <h5><span class="grey-text"><small>Cancel</small></span></h5>
                </button>
            </div>
        </div>
<!--
EDIT FORM
-->
        <div id="profile_edit" class="edit card-content">
        <?php echo form_open('user/update'); ?>
            <div class="input-field col s12">
                <label class="blue-text active" for ='university'>University:</label>
                <input class="black-text text-darken-2" type="text" name="university" value="<?php echo $university; ?>">
            </div>
            <div class="input-field col s12">
                <label class="blue-text active" for ='major'>Major:</label>
                <input class="black-text text-darken-2" type="text" name="major" value="<?php echo $major; ?>">
            </div>
            <div class="input-field col s12">
                <label class="blue-text active" for ='standing'>Standing:</label>
                <input class="black-text text-darken-2" type="text" name="standing" value="<?php echo $education; ?>">
            </div>
            <div class="input-field col s12">
                <label class="blue-text active" for ='email'>Email:</label>
                <input class="black-text text-darken-2" type="text" name="email" value="<?php echo $this->session->email; ?>">
            </div>
            <div class="input-field col s12">
                <label class="blue-text active" for ='phone'>Phone:</label>
                <input class="black-text text-darken-2" type="text" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="input-field col s12">
                <label class="blue-text active" for ='linkedin'>LinkedIn: (do not include https://)</label>
                <input class="black-text text-darken-2" type="text" name="linkedin" value="<?php echo $linkedin; ?>">
            </div>
            <input type="hidden" name="contacts" value="contacts">
            <div class="input-field col s12 m12 l6">
                <button class="front btn-large grey lighten-5 grey-text text-darken- edit-btn" type="submit" name="action">
                    <h5><span class="grey-text text-darken-3"><small>Save</small></span></h5>
                </button>
            </div>
            <div class="input-field col s12 m12 l6">
                <button class="front btn-large grey lighten-5 grey-text edit-btn" onclick="return show('profile','profile_edit');">
                    <h5><span class="grey-text"><small>Cancel</small></span></h5>
                </button>
            </div>
        <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php
