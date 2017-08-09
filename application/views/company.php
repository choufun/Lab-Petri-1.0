<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   #profile-image
   {
      border-radius: 50%;
      border: 1px solid #fbc02d ;
   }
</style>
<!--=================================================================================-->
<div id="index-banner" class="container-fluid white">
   <div class="section">
      <?php include 'application/views/company/aboutus.php';?>
   </div>
</div>
<!--=================================================================================-->
<div class="parallax-container">
   <div class="section no-pad-bot">      
   </div>
   <div class="parallax para_pics"><img src="../../assets/img/Lab_Photo_1.jpg"></div>
</div>
<!--=================================================================================-->
<div class="container-fluid white">
   <div class="section">
      <?php include 'application/views/company/how_it_works.php';?>
   </div>
</div>
<!--=================================================================================-->
<div class="parallax-container valign-wrapper">
<div class="section no-pad-bot">
   </div>
   <div class="parallax para_pics"><img src="../../assets/img/Computer_Science_Photo_1.jpg"></div>
</div>
<!--=================================================================================-->
<div class="container-fluid white">
   <div class="section">
      <?php include 'application/views/company/team.php';?>
      <div class="divider"></div>
      <?php include 'application/views/company/donors.php';?>
      <div class="divider"></div>
      <?php include 'application/views/company/footer.php';?>
   </div>
</div>
<!--=================================================================================-->
<div class="parallax-container valign-wrapper">
   <div class="section no-pad-bot">
   </div>
   <div class="parallax para_pics"><img src="../../assets/img/Mathematics_Photo_1.jpg"></div>
</div>
<!--=================================================================================-->
<script>
   $(document).ready(function(){
      $('.parallax').parallax();
   });   
</script>