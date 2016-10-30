<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>   
   .slick-prev, .slick-next {background: #4caf50;}
</style>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>

<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)){ ?>
<div class="container-fluid grey lighten-4">   
   <div align="center" class="row"><span class="red-text"><?php echo validation_errors(); ?></span></div>   
<!-- SEARCH RESULTS
-------------------------------------------------------------------------------------->   
   <div class="row">
     <div><?php include 'application/views/labmate/search/default.php'; ?></div>
   </div>
</div>
<?php
}
else { redirect(''); } ?>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.11/slick.min.js"></script>

<script type="text/javascript">   
   $(document).ready(function () {
      $("button").click(function(event) {
         // Removes focus of the button.
         $(this).blur();
      });
   });
   
   $(document).ready(function(){
      $('.collapsible').collapsible({
         accordion : false
      });
   });
   
   $(document).ready(function(){
      $('.navigation').slick({
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