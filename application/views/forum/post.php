<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $post = $this->post_model->get_post($_GET['key']); ?>
<?php $comments = $this->post_model->get_comments($post->comment_id); ?>

<link href="assets/css/profile.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<style>
    /*
    #profile-image
    {
        border-radius: 50%;
        border: 3px solid white;
        width: 75px;
        height: 75px;
    }
*/
</style>

<div class="container">
   <div class="row">
   
      <!--<div class="card z-depth-1 hoverable" style="background: rgba(30,136,229,1);"> -->
      <div class="card blue darken-2">

         <div class="col s12 m12 l12">  
            <div class="card z-depth-3" style="margin: 7px -3px;">

               <div class="card-content" style="margin: 0px 0px;">
                  <div class="container-fluid" align="center">
                    <img class="responsive-img z-depth-1"
                         id="profile-image"
                         src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $this->post_model->get_profile_picture($post->user_id); ?>"/>

                     <h4 class="blue-text text-darken-5"><?php echo $post->title; ?></h4>
                  </div>
               </div>

               <div class="divider"></div><div class="divider"></div>
               <div class="divider"></div><div class="divider"></div>

               <div class="card-content">

                  <h6 class="green-text">Abstract:</h6>

                  <h6 align="right">
                     <span class="green-text">Topic:</span>&nbsp;
                     <?php echo $post->topic; ?>
                  </h6>

                  <p class="flow-text">
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <?php echo $post->abstract; ?>
                  </p>
                  
               </div>
               
               <div class="divider"></div><div class="divider"></div>
               <div class="divider"></div><div class="divider"></div>
               
               <div class="card-content">
                  
                  <div class="row">
                  <div class="col s4 m4 l4 offset-s8 offset-m8 offset-l8 blue-text" align="center">
                     <small><i class="small material-icons">library_add</i></small>
                     <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">
                        <span class="blue-text text-darken-2">Bookmark</span>
                     </a>
                  </div>
                  </div>
                  
               </div>
               
            </div>
         </div>
      </div>
   </div>
   
   <div class="row">
      
   <h5>Comments</h5>
      
   <?php
   foreach ($comments as $comment)
   {
      if ($this->post_model->comment_type($comment->order_id) == "comment")
      { ?>
      <div class="row">
         <div class="col s12 m8 l8">
            <div class="card">
               <div class="card-content blue-text text-darken-5">
                  <p><strong><?php echo $comment->comments; ?></strong></p>
               </div>
            </div>
         </div>
      </div>
   <?php
      }
      if ($this->post_model->comment_type($comment->order_id) == "subcomment")
      { ?>
      <div class="row">
         <div class="col s10 m8 l8 offset-s2 offset-m2 offset-l2">
            <div class="card">
               <div class="card-content blue-text text-darken-5">
                  <p><strong><?php echo $comment->comments; ?></strong></p>
               </div>
            </div>
         </div>
      </div>
   <?php
      }
   } ?>
   </div>
</div>