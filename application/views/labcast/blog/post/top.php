<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-content" >
   <div align="center">
     <img class="responsive-img z-depth-1"
          id="profile-image"
          src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $this->blogpost_model->get_profile_picture($post->user_id); ?>"/>
      <h3 class="blue-text text-darken-5"><strong><?php echo $post->title; ?></strong></h3>
      <h6 class="grey-text text-darken-2"><?php echo $this->blogpost_model->get_num_views($post->post_id); ?>&nbsp;Views</h6>
   </div>
</div>