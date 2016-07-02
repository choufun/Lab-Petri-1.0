<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid grey lighten-4">   
   <!-- NEW POST 
   ----------------------------------------------------------> 
    <div class="container">
       <?php include 'application/views/forum/new_post.php';?>
    </div>   
   <!-- LIST POSTS 
   ---------------------------------------------------------->   
   <?php include 'application/views/forum/posts.php';?>  
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