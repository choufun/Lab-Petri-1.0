<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   #profile-image
   {
      border-radius: 50%;
      border: 3px solid white;
      width: 75px;
      height: 75px;
   }
</style>

<!-- AJAX
----------------------------------------------------------------------------------------->
<script>
/*   
   $document.ready(function() {
      $("#search").click(function()
      {
         $.ajax({
            url: "www.labpetri.com/connections/search",
            type: "POST",
            data: "type=article",
            dataType:"text",
            success: function(data) { alert("success"); },
         });
      });
   });
*/ 
</script>

<div class="container-fluid grey lighten-4">

<!-- SEARCH BAR
-------------------------------------------------------------------------------------->
   <div class="row">
      <div class="container">
      <?php echo form_open('Connections');?>
         <div class="input-field">
            <input name="search" type="text" class="validate blue-text text-darken-2" placeholder="COMING SOON">
            <label class="green-text active" for="search">Search</label>
         </div>   
      <?php echo form_close();?>
      </div>
   </div>
   <div align="center" class="row">
      <span class="red-text">
         <?php echo validation_errors(); ?>
      </span>
   </div>
   
<!-- SEARCH RESULTS
-------------------------------------------------------------------------------------->   
   <div class="row">
      <?php //echo $this->session->flashdata('searches'); ?>
      <?php print_r($this->session->flashdata('searches')); ?>
      
<!-- IF FLASHDATA IS SET THEN SEARCH NEW ELSE SET DEFAULT SEARCH
-------------------------------------------------------------------------------------->
<?php
   if ($this->session->flashdata('search') !== NULL)
   { ?>  
      <div>
         <?php include 'application/views/connections/search/new.php'; ?>
      </div>
<?php
   }
   else
   { ?>
      <div>
         <?php include 'application/views/connections/search/default.php'; ?>
      </div>
<?php
   } ?>
   </div> 
   
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.11/slick.min.js"></script>

<script type="text/javascript">
   
   $(document).ready(function(){
      $('.collapsible').collapsible({
         accordion : false
      });
   });
   
   $(document).ready(function(){
      $('.navigation').slick({
         arrows: true,
         dots: true,
         useCSS: true,
         swipe: true,
         draggable: true,
         infinite: true,
         speed: 300,
         slidesToShow: 1,
         slidesToScroll: 1,
         responsive: [
         {
            breakpoint: 1024,
            settings: { 
               slidesToShow: 1,
               slidesToScroll: 1,
               infinite: true,
            }
         },
         {
            breakpoint: 600,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }
         },
         {
            breakpoint: 480,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }
         }
         ]
      });   
   });
   
</script>