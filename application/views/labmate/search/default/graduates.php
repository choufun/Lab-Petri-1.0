<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   .profile-image { border-radius: 50%; width: 75px; height: 75px; }
   #profile-image
   {
      border-radius: 50%;
      border: 3px solid white;
      width: 100px;
      height: 100px;
   }
</style>

<?php
foreach ($graduates as $university=>$value)
{
   /* DEBUGGING PURPOSES:
   *************************************************************************/
   /* foreach($value as $array=>$object) { echo $object->user_id."<br>"; } */
?>
<li>
   <!-- CAROUSEL HEADER
   ------------------------------------------------------------------------>
   <div class="collapsible-header blue-text text-darken-4">
      <strong><?php echo $university; ?></strong>
   </div>
   
   <!-- CAROUSEL BODY
   ------------------------------------------------------------------------>
   <div class="collapsible-body">
      <div class="row">
         <ul>
<?php foreach ($value as $array=>$object) { 
         if ($object->user_id !== $this->session->user_id) { ?>
            <li class="col s12 m6 l4">
               <div class="card hoverable">
                  <div class="card-content">
                     <div class="row col s12 m6">
                           <div class="row" align="center">
                              <?php $picture = $this->labmate_model->get_profile_picture($object->user_id);
                                    if ($picture === NULL) { ?>
                                       <i id="profile-image" class="large material-icons black-text">perm_identity</i>
                              <?php } else {?>
                                 <!-- IMAGE -->
                                 <img id="profile-image" class="profile-image responsive-img z-depth-1" src="users/<?php echo $object->user_id; ?>/pictures/<?php echo $picture; ?>">
                              <?php } ?>                              
                           </div>
                           <div class="row" align="center">
                              <h5><?php echo $this->labmate_model->get_user($object->user_id); ?></h5>
                           </div>
                     </div>
                     <div class="row col s12 m6 container-fluid">
                        <div class="row col s12">
                           <a class="black-text" href="/labid?view=<?php echo $object->user_id; ?>" target="_blank">
                              <button class="btn-large grey lighten-5 grey-text text-darken-3" style="width:100%; height:100%;">
                                 View
                              </button>
                           </a>
                        </div>
                        <div class="row col s12">
            <?php if ($this->labmate_model->get_status($object->user_id) === "pending") { ?>
                           <button class="btn-large grey lighten-5 grey-text text-darken-3" style="width:100%; height:100%;" disabled>
                                 <strong>Requested</strong>
                           </button>
            <?php } elseif ($this->labmate_model->get_status($object->user_id) === "accepted") {
                           $this->labmate_model->unset_message_notification($object->user_id);
                           ?>
                           <a class="grey-text text-darken-3" href="labmail?id=<?php echo $object->user_id;?>">
                              <button class="btn-large grey lighten-5 grey-text text-darken-3" style="width:100%; height:100%;">
                                 <strong>Message</strong>
                              </button>
                           </a>
            <?php } else { ?>
                           <a class="" href="labmate/connect?id=<?php echo $object->user_id;?>">
                              <button class="btn-large grey lighten-5 grey-text text-darken-3" style="width:100%; height:100%;">
                                 <strong>Connect</strong>
                              </button>
                           </a>
            <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
      <?php } 
         } ?>
         </ul>
      </div>
   </div>
</li>
<?php
} ?>