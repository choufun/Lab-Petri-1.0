<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="blogs">
   <?php include 'application/views/labcast/blog/new_blog_post.php';?>      
   <?php if ($blog !== NULL) { ?>
   <?php include 'application/views/labcast/blog/blog_posts.php';?>      
   <?php } ?>
</div>