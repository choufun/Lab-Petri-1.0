<?php defined('BASEPATH') OR exit('No direct script access allowed');
if ($posts !== NULL) { ?>
<!--
USER: postboard.php | postboard/petridish/post.php
------------------------------------------------------------------------
Author: Steven Chou

-->
<div align="center" class="row"><h5 class="black-text"><strong>My Petri Dish Posts</strong></h5></div>
<?php
foreach($posts as $post) {
    $edit = $post->post_id.".edit";
    $no_edit = $post->post_id.".no_edit"; ?>
    <div class="card white z-depth-1 hoverable flow-text">
<!--
POST
-->
        <a href="post?key=<?php echo $post->post_id; ?>" target="_blank">
        <div id="<?php echo $no_edit;?>" class="col s12">
            <div class="post-section card-content blue-text"><h4><small><strong><?php echo $post->title; ?></strong></small></h4></div>
            <div class="divider"></div>
            <div class="post-section card-content">
                <div class="grey-text text-darken-1">
                    <h6>
                        <strong>Description</strong>
                        <span class="right black-text"><strong><?php echo $post->month." ".$post->day.", ".$post->yr; ?></strong></span>
                    </h6>
                    <h6><span class="right"><strong><span class="green-text">Topic:</span>&nbsp;<?php echo $post->topic; ?></strong></span><br></h6>
                </div>
                <div class="post-padding container-fluid grey-text text-darken-4">
                    <small><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $post->abstract;?></strong></small><br><br>
                </div>
                <div class="grey-text text-darken-1"><h6><strong>Requirements:</strong></h6><br></div>
                <div class="post-padding row grey-text">
                    <small>
                        <strong>
                        <?php if ($post->type == 0) { ?>
                            <div class="row col s12 m4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPA&nbsp;:&nbsp;<span class="black-text"><?php echo $post->gpa;?></span></div>
                            <div class="row col s12 m4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Major&nbsp;:&nbsp;<span class="black-text"><?php echo $post->major;?></span></div>
                            <div class="row col s12 m4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Courses&nbsp;:&nbsp;<span class="black-text"><?php echo $post->courses;?></span></div>
                        <?php } ?>
                        <?php if ($post->type == 1) { ?>
                            <div class="row col s4 offset-s4" align="center">
                                Major:&nbsp;<span class="black-text"><?php echo $post->major;?></span>
                            </div>
                        <?php } ?>
                        </strong>
                    </small>
                </div>
                <div class="grey-text text-darken-1"><h6><strong>Additional Information:</strong></h6><br></div>
                    <div class="post-padding container-fluid black-text">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><strong><?php echo $post->extra;?></strong></small>
                    </div>
                </div>

                <div class="divider"></div>
<!--
POST BUTTONS
-->
                <div class="card-content">
                    <div class="container-fluid">
                        <div class="row" align="center">
<!--
VISITS : view
-->
                            <div class="row col s12 m6">
                            <button class="front btn-large grey lighten-5 grey-text text-darken-4 post-full-padding" onclick="return show('<?php echo $edit;?>','<?php echo $no_edit;?>');">
                                <h5><small>Edit Post</small></h5>
                            </button>
                        </div>
<!--
DELETE : function
-->
                        <div class="row col s12 m6">
                        <?php echo form_open('user/delete_post'); ?>
                            <input type="hidden" name="post" value="<?php echo $post->post_id; ?>"/>
                            <input type="hidden" name="comment" value="<?php echo $post->comment_id; ?>"/>
                            <button class="front btn-large grey lighten-5 grey-text edit-btn" type="submit" name="action">
                                <h5><small>Remove Post</small></h5>
                            </button>
                        <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
<!--
POST EDIT
-->
    <div class="col s12 edit" id="<?php echo $edit;?>">
        <div class="card-content">
        <?php echo form_open('user/update'); ?>
        <?php if ($post->type == 0) { include 'application/views/user/user_view/postboard/petridish/edit/research_post.php'; }
              if ($post->type == 1) { include 'application/views/user/user_view/postboard/petridish/edit/project_post.php';  } ?>
            <div class="row">
                <div class="input-field col s12 m6">
                     <button class="front btn-large grey lighten-5 grey-text text-darken-3 edit-btn" type="submit" name="action">
                        <h5><span class="grey-text text-darken-3"><small>Save</small></span></h5>
                     </button>
                  </div>
                  <div class="input-field col s12 m6">
                     <button class="front btn-large grey lighten-5 grey-text edit-btn" onclick="return show('<?php echo $no_edit;?>','<?php echo $edit;?>');">
                        <h5><span class="grey-text"><small>Cancel</small></span></h5>
                     </button>
                  </div>
               </div>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div> 
<?php
      unset($edit);
      unset($no_edit);
   }
}