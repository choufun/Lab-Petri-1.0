<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- JAVASCRIPT
--------------------------------------------------------------------------------------------->
<script>
   $(document).ready(function(){
      $("button.front").click(function(){
         $("#front").slideUp("slow");
         $("div.progress").fadeIn("slow");
      });
      
      $("button.back").click(function(){
         $("#back").slideUp("slow");
         $("div.progress").fadeIn("slow");
      });
   });
</script>

<!-- DEBUGGING PURPOSES
--------------------------------------------------------------------------------------------->
<center><?php //var_dump($_SESSION);?></center>

<!-- PRELOADER : BAR
--------------------------------------------------------------------------------------------->
<div class="progress green lighten-1" id="bar" style="display:none">
   <div class="indeterminate blue lighten-1"></div>
</div>

<div class="row">
   <div class = "container">

<!-- CARD
--------------------------------------------------------------------------------------------->      
      <div align="center" class="col s12 m10 l8 offset-m1 offset-l2">
         <div class="card blue darken-2">
            <div class = "card card-border hoverable" style="margin: 2px 2px;">

<!-- HEADER LOGO
--------------------------------------------------------------------------------------------->
               <div id="header" class ="card-content blue white-text">
                  <img class="logo2 white z-depth-1" src="assets/img/Logo.png">
               </div>               
               <div class="divider"></div><div class="divider"></div>       

<!-- LOGIN FORM
--------------------------------------------------------------------------------------------->
               <?php include 'application/views/login/login_form.php';?>

<!-- REGISTER FORM
--------------------------------------------------------------------------------------------->
               <?php include 'application/views/login/registration_form.php';?>
            </div>         
         </div>
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
      window.scrollTo(0,0);
      return false;
   }
</script>