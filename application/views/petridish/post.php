<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
   .profile-image { border-radius: 50%; width: 100px; height: 100px; }
   
   .profile-image_2 { border-radius: 50%; width: 75px; height: 75px; }
</style>
<?php
if ($this->input->get('key') !== NULL)
{
   $post = $this->post_model->get_post($_GET['key']);
   $comments = $this->post_model->get_comments($post->comment_id);
?>
<div class="container">
   <div class="row">   

      <div class="col s12 m12 l12">  
         <div class="card z-depth-1">

            <div class="card-content" >
               <div class="container-fluid" align="center">
                 <img class="responsive-img z-depth-1"
                      id="profile-image"
                      src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $this->post_model->get_profile_picture($post->user_id); ?>"/>
                  <h4 class="blue-text text-darken-5"><?php echo $post->title; ?></h4>
               </div>
            </div>
            <div class="divider"></div>
            <div class="card-content">
               <h6 class="green-text">Abstract:</h6>
               <h6 align="right">
                  <span class="green-text">Topic:</span>&nbsp;<?php echo $post->topic; ?>
               </h6>
               <p class="flow-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <?php echo $post->abstract; ?>
               </p>
            </div>
            <div class="divider"></div>
            <div class="card-content">

               <div class="row">
                  <div class="col s4 m4 l4 offset-s8 offset-m8 offset-l8 grey-text text-darken-3" align="center">
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
   
   <div class="row">
      
      <h5>Comments</h5>
      
<?php
   foreach ($comments as $comment)
   {
      $picture = $this->post_model->get_profile_picture($comment->user_id);
      
      if ($this->post_model->comment_type($comment->order_id) == "comment")
      { ?>
         <div class="row">
            <div class="col s12 m8 l8">
               <div class="card">
                  <div class="card-content blue-text text-darken-5">
                     <p>
                        <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                 id="profile-image_2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong><?php echo $comment->comments; ?></strong>
                     </p>
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
                     <p>                     
                        <img class="responsive-img z-depth-2 profile-image_2" src="users/<?php echo $comment->user_id; ?>/pictures/<?php echo $picture; ?>"
                                 id="profile-image_3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong><?php echo $comment->comments; ?></strong>
                     </p>
                  </div>
               </div>
            </div>
         </div>
<?php }
   } ?>
   </div>
</div>
<?php
}
else
{
   redirect('');
}
?>