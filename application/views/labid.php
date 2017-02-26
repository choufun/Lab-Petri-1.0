<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- CSS
--------------------------------------------------------------------------------------------->
<link href="assets/css/profile.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<style>
   #contact_border { padding-left: 25px; }
   #education_border { padding-left: 25px; }
</style>

<?php
/* OTHER USER VIEW */
if ($this->input->get('view') !== NULL)
{ ?>
<div class="container-fluid">
   <div class="container col s12 m12 l12">
        <div class="card z-depth-1">
            <?php include 'application/views/labid/other_view/header.php';?>
        </div>
   </div>
</div>
<?php
}
else
{
/* USER VIEW */
   if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
   { ?>

   <div class="container-fluid">
      <div class="container col s12 m12 l12">
         <div class="card white z-depth-1">
<!-- HEADER -->
            <?php include 'application/views/labid/user_view/header.php';?>
<!-- POST BOARD -->
            <?php include 'application/views/labid/user_view/postboard.php';?>
<!-- BOOKMARKS -->
            <?php include 'application/views/labid/user_view/bookmarks.php';?>
         </div>      
      </div>
   </div>
   <?php
   }
   else { redirect(''); }
}
?>

<!-- JAVASCRIPT
-------------------------------------------------------------------------------------------->
<script type="text/javascript">   
   function show(current, hidden)
   {
      document.getElementById(current).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
   }
</script>