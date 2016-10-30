<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   #profile-image
   {
      border-radius: 50%;
      border: 1px solid #fbc02d ;
   }
</style>

<div class="container-fluid">    
   <div class="row">      
      <div class="col s12 m12 l12">
         <div class="card">
            <?php include 'application/views/company/aboutus.php';?>
            <div class="divider"></div>            
            <?php include 'application/views/company/how_it_works.php';?>
            <div class="divider"></div>
            <?php include 'application/views/company/team.php';?>
            <div class="divider"></div>
            <?php include 'application/views/company/donors.php';?>
            <div class="divider"></div>
            <?php include 'application/views/company/footer.php';?>
         </div>
      </div>
   </div>
</div>
