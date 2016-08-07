<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{ ?>

<div class="divider"></div>      
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
         <div class="col s12">
         <?php echo form_open('Petridish/delete_post'); ?>                        
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
         <div class="col s12">
            <button class="btn-large grey lighten-5 grey-text text-darken-3" onclick="return toggle('comments.<?php echo $post->comment_id; ?>');"
                    style="width:100%; height:100%;">
               <h5>                              
                  <span class="grey-text text-darken-3"><small><?php echo $this->petridish_model->get_num_comments($post->comment_id); ?>:&nbsp;Comments</small></span>
               </h5>
            </button>
         </div>
      </div>
   </div>
</div>
<?php } ?> 