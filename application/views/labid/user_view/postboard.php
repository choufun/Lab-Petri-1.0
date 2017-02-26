<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
   a.image-link:focus { outline: 0; }
</style>

<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{
?>

<div class="card-content">
   <div class="container-fluid">
      <div class="col s12 m12 l12" style="padding: 0px 2%;">
<?php
   if ($posts !== NULL || $blog_posts !== NULL)
   {  
      include 'application/views/labid/user_view/postboard/petridish/posts.php';
      echo "<br>";
      include 'application/views/labid/user_view/postboard/labcast/posts.php';
   }
   else
   { ?>
      <div class="card-content" align="center">
         <h5><small><strong>Start posting at <a href="petridish">Petri Dish</a> or <a href="labcast">Lab Cast</a>.</strong></small></h5>
      </div>         
<?php
   } ?>         
      </div>
   </div>
</div>
<?php
}
?>