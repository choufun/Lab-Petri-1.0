<?php defined('BASEPATH') OR exit('No direct script access allowed');
$sorted_order_ids = $this->home_model->get_post_comments($post->comment_id); ?>
<div id="comments.<?php echo $post->comment_id; ?>" style="display:none">
    <div style="margin-right:29px; margin-left:29px;">
<?php  if ($sorted_order_ids == NULL) { ; }
       else {
          $i = 0;
          foreach ($sorted_order_ids as $order_id) {
             if ($i > 2) { ?>
                 <div class="row" align="center">
                     <i class="large material-icons grey-text text-darken-1">settings_ethernet</i>
                 </div>
                <?php break;
             }
             $comment = $this->home_model->get_comment_info($post->comment_id, $order_id);
             $picture = $this->home_model->get_profile_picture($comment->user_id);
             if ($comment === NULL) { break; }
             else {
                if ($this->home_model->comment_type($comment->order_id) == "comment") { ?>
                    <div class="row">
                        <div class="col s12 m8">
                            <div class="card z-depth-2">
                                <div class="card-content">
                                    <span class="right">
                                        <small><?php echo $comment->month." ".$comment->day.", ".$comment->yr; ?></small>
                                    </span>
                                    <div class="materialize-textarea">
                                       <?php if ($picture === NULL) { ?>
                                           <i class="large material-icons profile-image_2">perm_identity</i>
                                       <?php } else {?>
                                           <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                                id="profile-image_2">
                                       <?php } ?>
                                        <strong class="grey-text text-darken-3">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $comment->comments; ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php
                   $i = $i +1;
                }
                if ($this->home_model->comment_type($comment->order_id) == "subcomment") { ?>
                    <div class="row">
                        <div class="col s12 m8 offset-m4">
                            <div class="card z-depth-1">
                                <div class="card-content">
                           <span class="right">
                              <small><?php echo $comment->month." ".$comment->day.", ".$comment->yr; ?></small>
                           </span>
                                    <div class="materialize-textarea">
                                       <?php if ($picture === NULL) { ?>
                                           <i class="large material-icons profile-image_2">perm_identity</i>
                                       <?php } else {?>
                                           <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                                id="profile-image_3">
                                       <?php } ?>
                                        <strong class="grey-text text-darken-1">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $comment->comments; ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php
                   $i = $i +1;
                }
             }
          }
       } ?>
    </div>
</div>