<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card-content">
   
   <div class="row">
      <div class="row col s12 m6" align="left">
         <h6><?php echo $this->blogpost_model->get_username($post->user_id); ?> posted on <?php echo $post->month." ".$post->day.", ".$post->yr; ?>.</h6>
      </div>
      <div class="row col s12 m6" align="right">
         <h6 align="right" class="grey-text text-darken-3"><span class="green-text">Topic:</span>&nbsp;<strong><?php //echo $post->topic; ?></strong></h6>
      </div>      
   </div>   
   
   <div class="row">
      <div class="row col s12 m10 offset-m1">      
         <p class="flow-text grey-text text-darken-3" style="font-size: 20px;"><strong><?php //echo $post->abstract; ?></strong></p>
      </div>
   </div>
   <br><br>
   <div class="row" align="center" class="flow-text grey-text text-darken-3" style="font-size: 20px;">
      <div class="row col s12" align="left">
         <small>Quotes::</small>
      </div>
      <div class="row col s12 m10 offset-m1">      
         <p class="flow-text grey-text text-darken-2" style="font-size: 18px;"><strong>"<?php echo $post->quotes; ?>"</strong></p>
      </div>
   </div>
   <br>
   <div class="row">
      <div class="row col s12" style="font-size: 20px;">
         <small>Blog:</small>
      </div>
      <div class="row col s12 m10 offset-m1">      
         <p class="flow-text grey-text text-darken-2" style="font-size: 18px;"><strong><?php echo $post->blog; ?></strong></p>
      </div>
   </div>
   <br>
   <?php include 'application/views/labcast/blog/post/new_comment.php'; ?>
</div>