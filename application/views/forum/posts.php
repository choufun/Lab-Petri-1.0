<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
foreach($posts as $post)
{
?>
<div class="row">
   <div class="col s10 m10 l10">
      <div class="card z-depth-3">
         <div class="card-content">
            <h5>
               <img class="responsive-img z-depth-1"
                    src="files/profile_picture/<?php echo $this->forum_model->get_profile_picture($post->user_id); ?>"
                    id="profile-image">
               &nbsp;&nbsp;<strong><?php echo $post->title; ?></strong>
            </h5>
            <p align="right"><?php echo $post->month."/".$post->day."/".$post->yr; ?></p>
         </div>

         <div class="divider"></div><div class="divider"></div>
         <div class="divider"></div><div class="divider"></div>

         <div class="card-content">
            <?php echo $post->abstract; ?>
         </div>
      </div>
   </div>
   <div class="col s2 m2 l2">
      <div class="card z-depth-2">
         <div class="card-content">
            <div class="container">
            <!--
            <p>View</p>
            <p>Comment</p>
            <p>Seen: x</p>
            -->
               <a onclick="return show_comments('comments.<?php echo $post->comment_id; ?>','comments.<?php echo $post->comment_id; ?>');">Comments</a>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'application/views/forum/comments.php';?>
<?php 
} ?>
