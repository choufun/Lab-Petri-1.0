<?php defined('BASEPATH') OR exit('No direct script access allowed');
if ($projects === NULL) { echo ""; }
else {
   foreach($projects as $post) { ?>
       <!--<div id="post_show_<?php echo $post->post_id; ?>" class="post-container">-->
       <div id="post_show_<?php echo $post->post_id; ?>">
           <!--<div class="card z-depth-2 hoverable hide-on-med-and-down" id="desktop_margin">-->
           <div class="card z-depth-2 hoverable hide-on-med-and-down">
              <?php include 'application/views/home/projects/posts/desktop.php';?>
           </div>
           <div class="card z-depth-1 hoverable hide-on-large-only" id="mobile_margin">
              <?php include 'application/views/home/projects/posts/mobile.php';?>
           </div>
       </div>
      <?php include 'application/views/home/projects/comments.php';
   }
} ?>