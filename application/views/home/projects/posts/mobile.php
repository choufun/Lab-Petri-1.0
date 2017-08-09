<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 3/24/2017
 * Time: 12:52 AM
 */
?>
<div class="card-content" style="margin: 0px -40px;">
    <div class="row" align="center">
        <!-- IMAGE-->
        <div class="col s12 m12 l12">
           <?php $picture = $this->home_model->get_profile_picture($post->user_id);
           if ($picture === NULL) { ?>
               <i class="large material-icons profile-image black-text">perm_identity</i>
           <?php } else {?>
               <img class="responsive-img z-depth-1 profile-image"
                    src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $picture; ?>">
           <?php } ?>
        </div>
        <div class="col s12 m12 l12">
            <div class="container-fluid" style="padding: 0px 15px;">
                <!-- TITLE -->
                <h4 class="blue-text text-darken-5 hide-on-med-and-down"><strong><?php echo $post->title; ?></strong></h4>
                <h5 class="blue-text text-darken-5 hide-on-large-only"><strong><?php echo $post->title; ?></strong></h5>
            </div>
        </div>
        <div class="col s12 m12 l12">
            <!-- DATE & TIME -->
            <h6 class="grey-text text-darken-2">
                <small>
                    posted by <?php echo $this->home_model->userName($post->user_id); ?> on
                   <?php echo $post->month." ".$post->day.", ".$post->yr; ?>.
                </small>
            </h6>
        </div>
        <div>
            <h6 class="grey-text text-darken-2">
               <?php echo $this->home_model->get_num_views($post->post_id); ?>&nbsp;:&nbsp;Views
            </h6>
        </div>
    </div>
</div>
<div class="card-content">
    <div class="row container-fluid">
        <div class="col s12 m12 l12">
            <h6 class="blue-text text-darken-5">
                <span class="green-text left">Description:</span>
                <span class="right">
               <span class="green-text">Topic:</span>&nbsp;
               <span class="grey-text text-darken-2"><?php echo $post->topic; ?></span>
            </span>
                <br>
            </h6>
        </div>
        <div class="col s12 m12 l12">
            <p class="grey-text text-darken-3 truncate">
               <?php echo $post->abstract; ?>
            </p>
        </div>
    </div>
</div>
<?php
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{ ?>

    <div class="divider"></div>

    <!-- VIEW :: desktop
    -------------------------------------------------------------------------------->
    <div class="card-content">
        <div class="container-fluid">
            <div class="row" align="center">

                <!-- SHOW BOOKMARK IF NOT USER POST
                -------------------------------------------------------------------------------->
               <?php if ($this->session->user_id !== $post->user_id)
               { ?>
                   <div class="col s12">
                       <a href="forum/add_bookmark?id=<?php echo $post->post_id; ?>">
                           <button class="btn-large grey lighten-5 grey-text text-darken-4" onclick="return toggle('comments.<?php echo $post->comment_id; ?>');"
                                   style="width:100%; height:100%;">
                               <h5><small>Bookmark This Post</small></h5>
                           </button>
                       </a>
                   </div>
               <?php }
               else
               { ?>

                   <!-- REMOVE :: post
                   -------------------------------------------------------------------------------->
                   <div class="col s12">
                      <?php echo form_open('Home/delete_post'); ?>
                       <input type="hidden" name="post" value="<?php echo $post->post_id; ?>"/>
                       <input type="hidden" name="comment" value="<?php echo $post->comment_id; ?>"/>
                       <button class="front btn-large grey lighten-5 grey-text" type="submit" name="action"
                               style="width:100%; height:100%;">
                           <h5><small>Remove My Post</small></h5>
                       </button>
                      <?php echo form_close(); ?>
                   </div>
               <?php } ?>
            </div>
            <div class="row">
                <!-- COMMENT :: post
                -------------------------------------------------------------------------------->
                <div class="col s12">
                    <button class="btn-large grey lighten-5 grey-text text-darken-3" onclick="return toggle('comments.<?php echo $post->comment_id; ?>');"
                            style="width:100%; height:100%;">
                        <h5>
                  <span class="grey-text text-darken-3">
                     <small><?php echo $this->home_model->get_num_comments($post->comment_id); ?>:&nbsp;Comments</small>
                  </span>
                        </h5>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>