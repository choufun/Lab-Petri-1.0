<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
         <a href="forum/add_bookmark?id=<?php echo $post->post_id; ?>">
            <button class="btn-large grey lighten-5 grey-text text-darken-4" onclick="return toggle('comments.<?php echo $post->comment_id; ?>');"
                    style="width:100%; height:100%;">
               <h5><small>Bookmark This Post</small></h5>
            </button>
         </a>
      </div>
      <div class="row col s12 m6">
         <a href="forum/add_bookmark?id=<?php echo $post->post_id; ?>">
            <button class="btn-large grey lighten-5 blue-text text-darken-2" onclick="return toggle('comments.<?php echo $post->comment_id; ?>');"
                    style="width:100%; height:100%;">
               <h5><small>Message</small></h5>
            </button>
         </a>
      </div>
   </div>

</div>