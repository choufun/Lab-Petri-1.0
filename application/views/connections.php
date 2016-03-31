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
   
   $document.ready(function showHint(str) {
       if (str.length == 0) {
           document.getElementById("txtHint").innerHTML = "";
           return;
       } else {
           var xmlhttp = new XMLHttpRequest();
           xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                   document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
               }
           };
           xmlhttp.open("GET", "temp.php?q=" + str, true);
           xmlhttp.send();
       }
   });
   
</script>

<div class="container">
   <div class="row">
      <div class="card">
         <form>
            First name: <input type="text" onkeyup="showHint(this.value)">
         </form>
      </div>
   </div>
   
   
   <span id="search_results"></span>
</div>

<div class="grey lighten-4">
   <div class="container">
      <div class="row" align="center">
         <form>
            <div class="input-field col s12 m12 l12">
               <i class="blue-text small material-icons">search</i>
               <input class="validate green-text" placeholder="'university' + 'major'" type="text">
               <label>Search and grow your network!</label>
            </div>
         </form>
      </div>
   </div>
   
   
   <div class="container">
      <div class="navigation">
         
         <!-- UNDERGRADUATES
         ------------------------------------------------------------------------>
         <div id="undergraduates">
            <div class="col s12 m12 l12">
               <div class="row">
                  <h3 align="center">Undergraduates</h3>
               </div>
            </div>
            <div class="col s12 m12 l12">
               <ul class="collapsible" data-collapsible="accordion">
                  <?php include 'application/views/connections/undergraduates.php';?>
               </ul>
            </div>
         </div>
         
         <!-- GRADUATES
         ------------------------------------------------------------------------>
         <div id="graduates">
            <ul class="collection with-header">
               <li class="collection-header">
                  <h4>Graduates</h4>
               </li>
               <li class="collection-item">
                  <div>Alvin
                     <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                     </a>
                  </div>
               </li>
               <li class="collection-item">
                  <div>Alvin
                     <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                     </a>
                  </div>
               </li>
            </ul>
         </div>
         
         <!-- PRPFESSORS
         ------------------------------------------------------------------------>
         <div id="professors">
            <ul class="collection with-header">
               <li class="collection-header">
                  <h4>Professors</h4>
               </li>
               <li class="collection-item">
                  <div>Alvin
                     <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                     </a>
                  </div>
               </li>
               <li class="collection-item">
                  <div>Alvin
                     <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                     </a>
                  </div>
               </li>
            </ul>
         </div>
         
      </div>
      
   </div>
   
   <div class="container">   
      <div class="connections">
         <?php //include 'application/views/connections/undergraduates.php';?>
      </div>
   </div>
   <?php //include 'application/views/connections/graduates.php';?>
   <?php //include 'application/views/connections/professors.php';?>
   
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
