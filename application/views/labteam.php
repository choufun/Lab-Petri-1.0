<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   #profile-image
   {
      border-radius: 50%;
      border: 3px solid white;
      width: 100px;
      height: 100px;
   }
   
   .slick-prev, .slick-next {background: #4caf50;}
</style>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>

<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{
?>
<div class="container-fluid grey lighten-4">

<!-- SEARCH BAR
-------------------------------------------------------------------------------------->
   <div><?php //include 'application/views/connections/search/bar.php'; ?></div>
   
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
      <div><?php //include 'application/views/connections/search/new.php'; ?></div>
<?php
   }
   else 
   { ?>
     <div><?php include 'application/views/labteam/search/default.php'; ?></div>
<?php
   } ?>
   </div>
   
   <div class="row">
      <div class="card">
         <h3 class="blue-text text-darken-4" align="center">
            <strong>Pending Notifications:</strong>

   <?php if ($pendings !== NULL)
         { 
            foreach ($pendings as $pending)
            { ?>
               <div class="container">
                  <div class="card col s12 m12 l12">
                     <div class="card-content">
                        <div class="row">
                           <div class="col s6 m6 l6">
                              <?php echo $this->labteam_model->get_user($pending->user_id); ?>
                           </div>
                           <div class="col s3 m3 l3">
                              <a href="labteam/accept?id=<?php echo $pending->user_id;?>&id2=<?php echo $pending->friend_id;?>">
                                 Accept
                              </a>
                           </div>
                           <div class="col s3 m3 l3">
                              <a href="#">Decline</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
      <?php }
         } ?>
      </div>
   </div>
</div>
<?php
}
else { redirect(''); }
?>

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