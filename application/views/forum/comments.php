<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $sorted_order_ids = $this->forum_model->get_post_comments($post->comment_id); ?>

<div id="comments.<?php echo $post->comment_id; ?>">
   
<?php
if ($sorted_order_ids == NULL) { ; }
else
{
   foreach ($sorted_order_ids as $order_id)   
   {   
      $comment = $this->forum_model->get_comment_info($post->comment_id, $order_id);

      if ($comment === NULL) { break; }
      else
      {
         if ($this->forum_model->comment_type($comment->order_id) == "comment")
         { ?>
            <div class="row">
               <div class="col s8 m8 l8">
                  <div class="card z-depth-2">
                     <div class="card-content">
                        <div class="materialize-textarea">
                           <?php echo $comment->comments; ?>
                        </div>
                     </div>
                     <?php include 'application/views/forum/subcomments.php';?>
                  </div>
               </div>
            </div>
   <?php }
         if ($this->forum_model->comment_type($comment->order_id) == "subcomment")
         { ?>
            <div class="row">
               <div class="col s8 m8 l8 offset-s2 offset-m2 offset-l2">
                  <div class="card z-depth-1">
                     <div class="card-content">
                        <div class="materialize-textarea">
                           <?php echo $comment->comments; ?>
                        </div>
                     </div>
                     <?php //include 'application/views/forum/subcomments.php';?>
                  </div>
               </div>
            </div>
   <?php }
      }
   }
} ?>
</div>
<?php include 'application/views/forum/new_comment.php';?>