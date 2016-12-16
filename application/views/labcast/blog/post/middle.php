<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{ ?>
<div class="card-content">
   <div class="row">  

   <!--<div class="row">
      <div class="col s4 m4 l4 offset-s8 offset-m8 offset-l8 grey-text text-darken-3" align="center">
         <small><i class="small material-icons">library_add</i></small>
         <a onclick="return toggle('comments.<?php //echo $post->comment_id; ?>');">
            <span class="blue-text text-darken-2">Bookmark</span>
         </a>
      </div>
   </div>-->
   
      <div class="row col s12 m6">
         <a href="labcast/add_bookmark?id=<?php echo $post->post_id; ?>">
            <button class="btn-large grey lighten-5 grey-text text-darken-4"
                    style="width:100%; height:100%;">
               <h5><small>Bookmark This Post</small></h5>
            </button>
         </a>
      </div>
      
      <div class="row col s12 m6">
         <?php echo form_open('Post/delete_post'); ?>                        
            <input type="hidden" name="post" value="<?php echo $post->post_id; ?>"/>
            <input type="hidden" name="comment" value="<?php echo $post->comment_id; ?>"/>
            <input type="hidden" name="key" value="<?php echo $this->input->get('key'); ?>">
            <button class="front btn-large grey lighten-5 grey-text" type="submit" name="action"
                    style="width:100%; height:100%;">
               <h5><small>Remove My Post</small></h5>
            </button>
         <?php echo form_close(); ?>
      </div>
      
      <!--
      <div class="row col s12 m6">         
         <a href="forum/add_bookmark?id=<?php echo $post->post_id; ?>">
            <button class="btn-large grey lighten-5 blue-text text-darken-2" onclick="return toggle('comments.<?php echo $post->comment_id; ?>');"
                    style="width:100%; height:100%;">
               <h5><small>Message</small></h5>
            </button>
         </a>
      </div>
      -->
   </div>
</div>
<?php
} ?>