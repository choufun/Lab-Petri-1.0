<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 3/24/2017
 * Time: 12:24 AM
 */
$picture = $this->home_model->get_profile_picture($post->user_id); ?>
<!-- DESKTOP TOP SECTION -->
<!--<div class="card-content" style="margin: 0px 5px;">-->
<div class="card-content">
   <?php if ($picture === NULL) { ?>
      <i class="large material-icons profile-image black-text">perm_identity</i>
   <?php } else { ?>
      <img class="responsive-img z-depth-1 profile-image" src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $picture; ?>">
   <?php } ?>
   <a href="post?key=<?php echo $post->post_id; ?>" target="_blank"><h4 class="blue-text text-darken-5">&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $post->title; ?></strong></h4></a>
   <h6 class="grey-text text-darken-2">&nbsp;&nbsp;by <?php echo $this->home_model->userName($post->user_id); ?> on <?php echo $post->month." ".$post->day.", ".$post->year; ?>.</h6>
   <h6 class="grey-text text-darken-2 right"><?php echo $this->home_model->get_num_views($post->post_id); ?>&nbsp;Views</h6>
</div>
<div class="divider"></div>
<!-- DESKTOP MIDDLE SECTION -->
<div class="card-content summary-container">
   <h6 class="blue-text text-darken-5">
      <span class="grey-text text-darken-1 left"><strong>Description</strong></span>
      <span class="right"><span class="green-text">Topic:</span>&nbsp;<span class="grey-text text-darken-3"><?php echo $post->topic; ?></span></span>
      <br><br>
   </h6>
   <div id="post_show_<?php echo $post->post_id; ?>" class="container-fluid flow-text">
      <p class="description-container grey-text text-darken-3 truncate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><strong><?php echo $post->description; ?></strong></small></p>
      <br>
   </div>
</div>
<!-- DESKTOP BOTTOM SECTION -->
<?php
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
   <div class="divider"></div>
   <div class="card-content">
      <div class="container-fluid">
         <div class="row" align="center">
            <!-- NOT USER SHOW ADD BOOKMARK -->
            <?php if ($this->session->user_id !== $post->user_id) { ?>
               <div class="col s6">
                  <a href="home/add_bookmark?id=<?php echo $post->post_id; ?>">
                     <button class="btn-large grey lighten-5 grey-text text-darken-4" style="width:100%; height:100%;"><h5><small>Bookmark This Post</small></h5></button>
                  </a>
               </div>
            <?php } else { ?>
               <!-- REMOVE :: post -->
               <div class="col s6">
                  <?php echo form_open('Home/delete_post'); ?>
                  <input type="hidden" name="post" value="<?php echo $post->post_id; ?>"/>
                  <input type="hidden" name="comment" value="<?php echo $post->comment_id; ?>"/>
                  <button class="front btn-large grey lighten-5 grey-text" type="submit" name="action" style="width:100%; height:100%;">
                     <h5><small>Remove My Post</small></h5>
                  </button>
                  <?php echo form_close(); ?>
               </div>
            <?php } ?>

            <!-- COMMENT :: post -->
            <div class="col s6">
               <button class="btn-large grey lighten-5 grey-text text-darken-3" onclick="return toggle('comments.<?php echo $post->comment_id; ?>');" style="width:100%; height:100%;">
                  <h5><span class="grey-text text-darken-3"><small><?php echo $this->home_model->get_num_comments($post->comment_id); ?>:&nbsp;Comments</small></span></h5>
               </button>
            </div>
         </div>
      </div>
   </div>
<?php } ?>
