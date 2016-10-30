<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card-content">
<?php $sorted_order_ids = $this->blogpost_model->get_comments($post->comment_id);
   if ($sorted_order_ids == NULL) { ; }
   else {
      foreach ($sorted_order_ids as $order_id) {
         $comment = $this->blogpost_model->get_comment_info($post->comment_id, $order_id);
         $picture = $this->blogpost_model->get_profile_picture($comment->user_id);
         if ($comment === NULL) { break; }
         else {
            if ($this->blogpost_model->comment_type($comment->order_id) == "comment") { ?>
               <div class="row">
                  <div class="col s12 m12">
                     <div class="card-content">
                        <div class="row" align="right"><small><?php echo $comment->month." ".$comment->day.", ".$comment->yr; ?></small></div>
                        <div class="row">
                           <div class="row col s12 m2" align="center">
                              <?php if ($picture === NULL) { ?>
                                 <i class="large material-icons profile-image_2">perm_identity</i>
                              <?php } else {?>
                                 <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                      id="profile-image_2">
                              <?php } ?>
                           </div>
                           <div class="row col s12 m10">   
                              <p style="font-size: 18px;"><strong class="grey-text text-darken-3"><?php echo $comment->comments; ?></strong></p>
                           </div>
                        </div>
                     </div>                        
                  </div>
               </div>
   
      <!-- IF NOT SUBCOMMENTS -->
            <?php if ($order_id == end($sorted_order_ids)) {?>
                     <div class="row">
                        <div class="col s12 m10 offset-m2">
                           <?php include 'application/views/labcast/blog/post/subcomments.php'; ?>
                        </div>
   </div><?php } ?>
      <?php }
            if ($this->blogpost_model->comment_type($comment->order_id) == "subcomment") { ?>
               <div class="row">
                  <div class="col s12 m10 offset-m2">
                     <div class="card-content">
                        <div class="row" align="right"><small><?php echo $comment->month." ".$comment->day.", ".$comment->yr; ?></small></div>
                        <div class="row">
                           <div class="row col s12 m2" align="center">
                        <?php if ($picture === NULL) { ?>
                                 <i class="large material-icons profile-image_2">perm_identity</i>
                        <?php } else {?>
                                 <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                      id="profile-image_2">
                              <?php } ?>
                           </div>
                           <div class="row col s12 m10">
                              <p style="font-size: 18px;"><strong class="grey-text text-darken-3"><?php echo $comment->comments; ?></strong></p>
                           </div>
                        </div>
                     </div>                     
                  </div>
                  <?php if ($this->blogpost_model->same_subcomment($comment->comment_id, $order_id ))
                  { ?>
                  <div class="col s12 m10 offset-m2"><?php include 'application/views/labcast/blog/post/subcomments.php'; ?></div>
                  <div class="divider"></div>
               <?php }?>
               </div>
            <?php //if ($order_id !== end($sorted_order_ids)) { ?><!--<div class="divider" ></div>--><?php //}?>            
      <?php }
         }
      }
   } ?>
</div>