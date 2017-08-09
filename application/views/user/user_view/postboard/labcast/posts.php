<?php defined('BASEPATH') OR exit('No direct script access allowed');
if ($blog_posts !== NULL) { ?>
<div align="center" class="row"><h5 class="black-text"><strong>My Lab Cast Posts</strong></h5></div>
<?php
    foreach($blog_posts as $post) {
        $edit = "blog.".$post->post_id.".edit";
        $no_edit = "blog.".$post->post_id.".no_edit"; ?>
    <div class="card z-depth-1 hoverable flow-text">

<!-- POST DISPLAY -->
        <a href="blogpost?key=<?php echo $post->post_id; ?>" target="_blank">
            <div class="col s12 m12 l12" id="<?php echo $no_edit;?>">
                <div class="card-content blue-text post-section"><h4><small><strong><?php echo $post->title; ?></strong></small></h4></div>
                <div class="divider"></div>
                <div class="card-content post-section">
                    <div class="grey-text text-darken-1">
                        <h6><strong>Blog</strong><span class="right black-text"><strong><?php echo $post->month." ".$post->day.", ".$post->yr; ?></strong></span></h6>
                    </div>
                <div class="container-fluid grey-text text-darken-4 post-padding">
                    <small><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $post->blog;?></strong></small><br><br>
                </div>
                    <div class="grey-text text-darken-1"><h6><strong>Quotes</strong></h6></div>
                    <div class="container-fluid grey-text text-darken-4 post-padding"><small><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"<?php echo $post->quotes;?>"</strong></small><br><br>
                    </div>
                </div>
                <div class="divider"></div>
<!-- POST BUTTONS -->
                <div class="card-content">
                    <div class="container-fluid">
                        <div class="row" align="center">
<!-- VISITS : view -->
                        <div class="row col s12 m6">
                            <button class="front btn-large grey lighten-5 grey-text text-darken-4 edit-btn" onclick="return show('<?php echo $edit;?>','<?php echo $no_edit;?>');">
                              <h5><small>Edit Post</small></h5>
                           </button>
                        </div>                              
<!-- DELETE : function -->
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
<!-- POST EDIT -->
    <div class="col s12 m12 l12 edit" id="<?php echo $edit;?>">
        <div class="card-content">
            <?php echo form_open('user/update');
                  include 'application/views/user/user_view/postboard/labcast/edit/blog_post.php'; ?>
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