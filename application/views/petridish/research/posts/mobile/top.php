<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card-content" style="margin: 0px -40px;">
   <div class="row" align="center">                  
      <!-- IMAGE-->
      <div class="col s12 m12 l12">
         <img class="responsive-img z-depth-1 profile-image"
              src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $this->petridish_model->get_profile_picture($post->user_id); ?>">
      </div>
      <div class="col s12 m12 l12">
         <!-- TITLE -->
         <h4 class="blue-text text-darken-5"><strong><?php echo $post->title; ?></strong></h4>
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