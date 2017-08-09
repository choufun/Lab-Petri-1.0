<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="news">
   <?php include 'application/views/labcast/admin_new_post.php';?>
   <?php include 'application/views/labcast/admin_posts.php';?>
   <?php include 'application/views/labcast/news/google_news.php';?>
   <?php include 'application/views/labcast/news/sciencedaily.php';?>
<!--var_dump(simplexml_load_file('https://www.ed.gov/feed')) -->
</div>