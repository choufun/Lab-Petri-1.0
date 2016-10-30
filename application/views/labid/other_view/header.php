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
<?php if ($profile_picture === NULL) { ?>
      <div id="profile-padding">
         <i id="default-image"class="white large material-icons black-text responsive-img">perm_identity</i>
      </div>
   <?php } else { ?>
      <div id="profile-padding">
         <img class="responsive-img z-depth-2" src="users/<?php echo $this->input->get('view'); ?>/pictures/<?php echo $profile_picture; ?>"
              id="profile-image">
      </div>
   <?php } ?>
      <div class="row">
         
      </div>
   </div>
   <div class="col s12 m6">
      <div class="card-content">
         <h3><strong><?php echo $name;?></strong></h3>
         <h6><strong><?php echo $university;?></strong></h6>
         <h6><strong><?php echo $major;?>, <?php echo $education;?></strong></h6>
         <br>
         <h6><strong><?php echo $email;?></strong></h6>
<?php if ($phone !== "Add your number.") { ?> <h6><strong><?php echo $phone;?></strong></h6> <?php }?>         
<?php if ($linkedin !== "Add your link.") { ?> <h6><a href="http://<?php echo $linkedin;?>" target="_blank"><strong><?php echo $linkedin;?></strong></a></h6> <?php }?>         
      </div>
   </div>
</div>
