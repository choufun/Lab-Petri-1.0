<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$sorted_order_ids = $this->petridish_model->get_post_comments($post->comment_id);
?>
<div id="comments.<?php echo $post->comment_id; ?>" style="display:none"> 
<?php
if ($sorted_order_ids == NULL) { ; }
else
{
   foreach ($sorted_order_ids as $order_id)   
   {         
      $comment = $this->petridish_model->get_comment_info($post->comment_id, $order_id);
      $picture = $this->petridish_model->get_profile_picture($comment->user_id);
      
      if ($comment === NULL) { break; }
      else
      {
         if ($this->petridish_model->comment_type($comment->order_id) == "comment")
         { ?>
            <div class="row">
               <div class="col s12 m8 l8">
                  <div class="card z-depth-2">
                     <div class="card-content">
                        <span class="right">
                           <small><?php echo $comment->month." ".$comment->day.", ".$comment->yr; ?></small>
                        </span>
                        <div class="materialize-textarea">
                           <!--<img class="responsive-img z-depth-1"
                                src="files/profile_picture/<?php echo $picture; ?>"
                                id="profile-image_2">-->
                           <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                 id="profile-image_2">
                           &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $comment->comments; ?>
                        </div>
                        <p align="right" class="grey-text">
                           <small><?php echo $this->petridish_model->get_time($comment->initial_time); ?></small>
                        </p>
                     </div>
                     <?php include 'application/views/petridish/research/subcomments.php';?>
                  </div>
               </div>
            </div>
   <?php }
         if ($this->petridish_model->comment_type($comment->order_id) == "subcomment")
         { ?>
            <div class="row">
               <div class="col s10 m8 l8 offset-s2 offset-m2 offset-l2">
                  <div class="card z-depth-1">
                     <div class="card-content">
                        <span class="right">
                           <small><?php echo $comment->month." ".$comment->day.", ".$comment->yr; ?></small>
                        </span>
                        <div class="materialize-textarea">
                           <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                 id="profile-image_3">
                           &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $comment->comments; ?>
                        </div>
                        <p align="right" class="grey-text">
                           <small><?php echo $this->petridish_model->get_time($comment->initial_time); ?></small>
                        </p>
                     </div>
                     <?php //include 'application/views/forum/subcomments.php';?>
                  </div>
               </div>
            </div>
   <?php }
      }
   }
} ?>
<?php include 'application/views/petridish/research/new_comment.php';?>
</div>