<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- CSS
--------------------------------------------------------------------------------------------->
<style>
   #profile-image
   {
      border-radius: 50%;
      border: 3px solid white;
      width: 75px;
      height: 75px;
   }
</style>

<div class="container-fluid">
   <?php
   /*
      print_r($ids);
      echo '<br>';
      foreach($ids as $id)
      {
         echo $id.'<br>';
      }
   */
   ?>
   
   <!-- NEW POST
   ----------------------------------------------------------------------------------------->
   <div class="row">
      <div class="container">
         <?php include 'application/views/forum/new_post.php';?>
      </div>
   </div>
   
   <!-- LIST OF POSTS
   ----------------------------------------------------------------------------------------->
   <div class="row">
      <div class="container">
         <?php include 'application/views/forum/posts.php';?>
      </div>
   </div>
</div>

<!-- JAVASCRIPT
--------------------------------------------------------------------------------------------->
<script type="text/javascript">   
   function show(current, hidden)
   {
      document.getElementById(current).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
   }
</script>