<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- TOP SECTION : DESKTOP : LAPTOP
----------------------------------------------------->
<div class="card-content" style="margin: 0px 5px;">
<?php $picture = $this->petridish_model->get_profile_picture($post->user_id);
      if ($picture === NULL) { ?>
      <i class="large material-icons profile-image black-text">perm_identity</i>
<?php } else {?>
   <!-- IMAGE -->
   <img class="responsive-img z-depth-1 profile-image"
        src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $picture; ?>">
<?php } ?>
   <!-- TITLE -->
   <h4 class="blue-text text-darken-5">
      &nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $post->title; ?></strong>
   </h4>               
   <!-- DATE & TIME -->
   <h6 class="grey-text text-darken-2">&nbsp;&nbsp;posted by <?php echo $this->petridish_model->user_name($post->user_id); ?> on
      <?php echo $post->month." ".$post->day.", ".$post->yr; ?>.
   </h6>
   <h6 class="grey-text text-darken-2 right">
      <?php echo $this->petridish_model->get_num_views($post->post_id); ?>&nbsp;Views
   </h6>
</div>