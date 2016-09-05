<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card-content" style="margin: 0px -40px;">
   <div class="row" align="center">                  
      <!-- IMAGE-->
      <div class="col s12 m12 l12">
<?php $picture = $this->petridish_model->get_profile_picture($post->user_id);
   if ($picture === NULL) { ?>
      <i class="large material-icons profile-image black-text">perm_identity</i>
   <?php } else {?>
      <img class="responsive-img z-depth-1 profile-image"
           src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $picture; ?>">
   <?php } ?>
      </div>
      <div class="col s12 m12 l12">
         <div class="container-fluid" style="padding: 0px 15px;">            
         <!-- TITLE -->
         <h4 class="blue-text text-darken-5 hide-on-med-and-down"><strong><?php echo $post->title; ?></strong></h4>
         <h5 class="blue-text text-darken-5 hide-on-large-only"><strong><?php echo $post->title; ?></strong></h5>
         </div>
      </div>
      <div class="col s12 m12 l12">
         <!-- DATE & TIME -->
         <h6 class="grey-text text-darken-2">
            <small>
               posted by <?php echo $this->petridish_model->user_name($post->user_id); ?> on
               <?php echo $post->month." ".$post->day.", ".$post->yr; ?>.
            </small>
         </h6>
      </div>
      <div>
         <h6 class="grey-text text-darken-2">
            <?php echo $this->petridish_model->get_num_views($post->post_id); ?>&nbsp;:&nbsp;Views
         </h6>
      </div>
   </div>
</div>