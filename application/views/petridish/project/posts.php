<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>   
   h1, h2, h3, h4, h5, h6 { display: inline; }
   
   .summary-container { margin: 0px 35px; }
   
   .description-container
   {
      -o-text-overflow: ellipsis;   /* Opera */
      text-overflow:    ellipsis;   /* IE, Safari (WebKit) */
      overflow:hidden;              /* don't show excess chars */
      white-space:nowrap;           /* force single line */
      width: 1100px;                /* fixed width */
   }
   
   .post-container { padding: -20px 0px; }
   
   .profile-image { border-radius: 50%; width: 100px; height: 100px; border: 1px solid #ffff8d; }
   
   .profile-image_2 { border-radius: 50%; width: 75px; height: 75px; }
   
   .mobile-profile-image { border-radius: 50%; width: 75px; height: 75px; }
</style>

<!--<div class="container-fluid flow-text" style="padding: 0px 40px;">-->
<?php
if ($project === NULL) { echo ""; }
else {
   foreach($project as $post) { ?> 
      <div id="post_show_<?php echo $post->post_id; ?>" class="post-container">
         <a href="post?key=<?php echo $post->post_id; ?>" target="_blank">
            <div class="card z-depth-1 hoverable hide-on-med-and-down"
                 style="margin-right:40px; margin-left: 40px;">               
               <?php include 'application/views/petridish/research/posts/desktop/top.php';?>
               <div class="divider"></div>
               <?php include 'application/views/petridish/research/posts/desktop/middle.php';?>
               <?php include 'application/views/petridish/research/posts/desktop/bottom.php';?>               
            </div>
            <div class="card z-depth-1 hoverable hide-on-large-only"
                 style="margin-right:20px; margin-left:20px;">
               <?php include 'application/views/petridish/research/posts/mobile/top.php';?>
               <div class="divider"></div>
               <?php include 'application/views/petridish/research/posts/mobile/middle.php';?>
               <?php include 'application/views/petridish/research/posts/mobile/bottom.php';?>               
            </div>            
         </a>
      </div>   
<!-- COMMENTS
--------------------------------------------------------------------------------------->
      <?php include 'application/views/petridish/research/comments.php';
   }
} ?>