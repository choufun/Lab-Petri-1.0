<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
foreach($posts as $post)
{
?>
<div class="row">
   
   <!--<div class="card z-depth-1 hoverable" style="background: rgba(30,136,229,1);"> -->
   <div class="card z-depth-1 hoverable blue darken-1">
      
<?php //if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
      <a href="post?key=<?php echo $post->post_id; ?>" target="_blank">
<?php //} ?>
      
      <div class="col s12 m12 l12">
         <div class="card z-depth-3" style="margin: 10px 0px;">
            <div class="card-content" style="margin: 0px 5px;">
               <h5>
                  <img class="responsive-img z-depth-1"
                     src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $this->forum_model->get_profile_picture($post->user_id); ?>"
                     id="profile-image">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <small>
                  <strong class="blue-text text-darken-5">
                     <?php echo $post->title; ?>
                  </strong>
                  </small>
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

            <div class="card-content" style="margin: 0px 5px;">
               <h6 class="blue-text text-darken-5">
                  <small class="green-text">Abstract</small>
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
            
            <div class="divider"></div><div class="divider"></div>
            <div class="divider"></div><div class="divider"></div>
            
            <div class="card-content">
               <div class="container-fluid">
                  <div class="row" align="center">
                  
                     <!-- VISITS : VIEW
                     ------------------------------------------------------------------------>
                     <div class="col s4 m4 l4 blue-text">
                        <small><i class="small material-icons">pageview</i></small>
                        <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">
                           <span class="green-text">0</span>:&nbsp;<span class="blue-text text-darken-2">Views</span>
                        </a>
                     </div>   

                     <!-- BOOKMARK : FUNCTION
                     ------------------------------------------------------------------------>
                     <div class="col s4 m4 l4 blue-text">
                        <small><i class="small material-icons">library_add</i></small>
                        <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">
                           <span class="blue-text text-darken-2">Bookmark</span>
                        </a>
                     </div>

                     <!-- COMMENTS : FUNCTION
                     ------------------------------------------------------------------------>
                     <div class="col s4 m4 l4 blue-text">
                        <small><i class="small material-icons">forum</i></small>
                        <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">
                           <span class="green-text"><?php echo $this->forum_model->get_num_comments($post->comment_id); ?></span>:&nbsp;<span class="blue-text text-darken-2">Comments</span>
                        </a>
                     </div>
                  
                  </div>
                     
               </div>
            </div>
            
         </div>
      </div>
<!--
      <div class="col s5 m5 l2">
         <div class="card z-depth-2">
            <div class="card-content">
               <div class="container-fluid">
                  <a onclick="return toggle('comments.<?php //echo $post->comment_id; ?>');">
                     <span class="green-text"><?php //echo $this->forum_model->get_num_comments($post->comment_id); ?></span>:&nbsp;Comments
                  </a>
               </div>
            </div>
         </div>
      </div>
-->
         
<?php //if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
      //{ ?>
         </a>
<?php //} ?>
   </div>
   
</div>
<?php include 'application/views/forum/comments.php';?>
<?php 
} ?>
