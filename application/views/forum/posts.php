<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
foreach($posts as $post)
{
?>
<div class="row">
   <div class="col s12 m12 l10">
      <div class="card z-depth-3">
         <div class="card-content">
            <h5>
               <img class="responsive-img z-depth-1"
                  src="files/profile_picture/<?php echo $this->forum_model->get_profile_picture($post->user_id); ?>"
                  id="profile-image">
               &nbsp;&nbsp;&nbsp;&nbsp;
               <strong class="blue-text text-darken-5">
                  <?php echo $post->title; ?>
               </strong>
            </h5>
            <h6>
               <span class="right">
                  <small class="grey-text">
                     <?php echo $this->forum_model->get_time($post->initial_time); ?>
                  </small>
               </span>
            </h6>
         </div>
         <div class="divider"></div><div class="divider"></div>
         <div class="divider"></div><div class="divider"></div>

         <div class="card-content">
            <h6 class="blue-text text-darken-5">
               <small>Abstract</small>
               <span class="right black-text">
                  <small><?php echo $post->month." ".$post->day.", ".$post->yr; ?></small>
               </span><br>
               <span class="right">
                  <small>
                     <span class="green-text">Topic:</span>&nbsp;
                     <?php echo $post->topic; ?>
                  </small>
               </span><br>
            </h6>
            <div class="container-fluid">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $post->abstract; ?>
            </div>
         </div>
      </div>
   </div>
   <div class="col s5 m5 l2">
      <div class="card z-depth-2">
         <div class="card-content">
            <div class="container-fluid">
               <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">
                  <span class="green-text"><?php echo $this->forum_model->get_num_comments($post->comment_id); ?></span>:&nbsp;Comments
               </a>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'application/views/forum/comments.php';?>
<?php 
} ?>
