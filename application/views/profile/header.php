<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card-image blue darken-1 white-text">
   <div align="center" class="row">
      <div class="container-fluid">

<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
      { ?>
         <div class="row" id="profile-padding">
            <img class="responsive-img z-depth-2" src="users/<?php echo $this->session->user_id; ?>/pictures/<?php echo $profile_picture; ?>"
                 id="profile-image">
         </div>
<?php }
      else 
      { ?>
         <div class="row" id="profile-padding">
            <img class="responsive-img z-depth-2" src="users/pictures/default.PNG"
                 id="profile-image">
         </div>
<?php } ?>
         <div class="row">
            <h3 id="username">
               <strong><?php echo $this->session->firstname." ".$this->session->lastname;?></strong>
            </h3>
         </div>
         
<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
      { ?>
         <div align="right" class="icon-border row">
            <div class="container-fluid">
               <a href="#" data-activates="slide-out" class="button-collapse show-on-large">
                  <i class="white-text small material-icons icon-inner-border">settings_applications</i>
               </a>
            </div>
         </div>
<?php } ?>
      </div>
      
      <div class="divider"></div><div class="divider"></div>
      <div class="divider"></div><div class="divider"></div>
   </div>
</div>
