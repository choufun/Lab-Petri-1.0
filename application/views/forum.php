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
   #profile-image_2
   {
      border-radius: 50%;
      border: 3px solid white;
      width: 50px;
      height: 50px;
   }
   #profile-image_3
   {
      border-radius: 50%;
      border: 3px solid white;
      width: 40px;
      height: 40px;
   }
</style>

<!-- JAVASCRIPT
--------------------------------------------------------------------------------------------->
<script type="text/javascript">
/*
   $(document).ready(function(){
      
      $('form#new_forum_post').on("submit", function(event){
         
         event.preventDefault();
         
         $.ajax({
            url: "<?php// echo base_url()?>/Forum",
            type: "POST",
            data: $(this).serialize(),
            success: function(data){ $('.result').html(data); }
         });
         
      });
      
   });
   */
</script>

<div class="container-fluid grey lighten-4">
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
   
   <div class="result"></div>
   
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

   function toggle(comments)
   {
      var all = document.getElementById(comments);
      if ( all.style.display != 'none' ) { all.style.display = 'none'; }
      else { all.style.display = ''; }
      return false;
   }  
</script>