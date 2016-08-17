<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="margin-right:10px; margin-left:10px;" class="hide-on-large-only">
 
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
                  <div class="col s12">
                     <div class="card z-depth-2">
                        <div class="card-content">
                           <span class="right">
                              <small><?php echo $comment->month." ".$comment->day.", ".$comment->yr; ?></small>
                           </span>
                           <div class="materialize-textarea">
                              <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                    id="profile-image_2">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $comment->comments; ?>
                           </div>
                        </div>
                        <?php include 'application/views/petridish/research/subcomments.php';?>
                     </div>
                  </div>
               </div>
      <?php }
            if ($this->petridish_model->comment_type($comment->order_id) == "subcomment")
            { ?>
               <div class="row">
                  <div class="col s8 offset-s4">
                     <div class="card z-depth-1">
                        <div class="card-content">
                           <span class="right">
                              <small><?php echo $comment->month." ".$comment->day.", ".$comment->yr; ?></small>
                           </span>
                           <div class="materialize-textarea">
                              <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                    id="profile-image_3">
                              <strong class="grey-text text-darken-3">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $comment->comments; ?></strong>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
      <?php }
         }
      }
   } 
   include 'application/views/petridish/research/new_comment.php';?>   
</div>