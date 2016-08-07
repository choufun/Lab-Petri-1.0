<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card-content summary-container">
   <h6 class="blue-text text-darken-5">
      <span class="grey-text text-darken-1 left">Description:</span>
      <span class="right">
         <span class="green-text">Topic:</span>&nbsp;
         <span class="grey-text text-darken-3"><?php echo $post->topic; ?></span>
      </span>
      <br>
   </h6>
   <div id="post_show_<?php echo $post->post_id; ?>" class="container-fluid flow-text">
      <p class="description-container grey-text text-darken-3">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><strong><?php echo $post->abstract; ?></strong></small>
      </p>
   </div>
</div>

<?php if ($teams == NULL) {}
      else { $picture = $this->petridish_model->get_profile_picture($teams); ?>
<!--  
      <div class="divider"></div>
      <div class="card-content">
         <h6>Research Teams:</h6><br>
         <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $teams; ?>/pictures/<?php echo $picture; ?>"
                                 id="profile-image_2">
      </div>
-->
<?php } ?>