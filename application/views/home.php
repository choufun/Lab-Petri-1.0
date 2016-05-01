<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
   <head>

   <!-- LOGO : TITLE
   --------------------------------------------------------------------------------------------->
      <title>Lab Petri</title>
      <link rel="icon" href="assets/img/favicon.ico">
      <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0;"/>

      <!--
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
      -->
      <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      
      <!--
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
      -->
   </head>

<style>
   #home-container
   {
      width:100%;
      height:100%;
      margin: -32px 0px 0px;
      padding: 215px 250px;
   }
   #mobile-container { margin: 10px 10px; }
   #section-1 { margin-left: -10px; }
   #section-2 { padding-left: 25px; }
</style>
   <!-- BODY
   --------------------------------------------------------------------------------------------->
   <body class="blue">
      <!-- LARGE SCREEN
      ----------------------------------------------------------------------------->
      <div class="container-fluid blue hide-on-med-and-down" id="home-container">
         <!-- <div class="col s12 m12 l12"> -->
         <div class="row">  
            <div class="row white-text col s12 m12 l12">                  
               <h1>Lab Petri<img class="responsive-img" src="assets/img/Logo.png" height="120" width="120" align="right"></h1>                  
               <h5>Find Research, Build Connections</h5>                  
               <div class="divider"></div>                  
               <h6 class="white-text">
               <div id="section-1" class="col s4 m4 l4">Help Us Grow<strong id="section-2">It's Free</strong>!</div>
               <div class="col s4 m4 l4 offset-s4 offset-m4 offset-l4" align="right">
                  <a href="http://www.labpetri.org/company" class="white-text" align="right">About Us</a>
               </div>
            </h6>
         </div>               
         </div>
         <div class="row">
            <a class="white-text blue lighten-1 waves-effect waves-light btn col s3 m3 l3 offset-m5 offset-l5" href="forum">
               Petri Dish
            </a>
            <a class="white-text blue lighten-1 waves-effect waves-light btn col s3 m3 l3 offset-m1 offset-l1" href="login">
               Login
            </a>
         </div>     
      </div>      
      <!-- MOBILE SCREEN
      ----------------------------------------------------------------------------->
      <div class="container-fluid blue hide-on-med-and-up white-text" id="mobile-container">
         <div class="row">
            <h3>
               Lab Petri
               <img class="responsive-img" src="assets/img/Logo.png" height="120" width="120" align="right">
            </h3>
            <h6>
               Find Research, Build Connections
            </h6>
            <div class="divider"></div>
            <h6 class="white-text">
               <div id="section-1" class="col s4 m4 l4">Help Us Grow</div>
               <div><strong>It's Free</strong>!</div>               
            </h6>
         </div>
         <div class="row">
            <div class="row" align="right">
               <a href="http://www.labpetri.org/company"
                  class="white-text col s4 m4 l4 offset-s8 offset-m8 offset-l8">
                  About Us
               </a>
            </div>
            <div class="row" align="right">
               <a class="white-text blue lighten-1 waves-effect waves-light btn col s4 m4 l4 offset-s4 offset-m8 offset-l8"
                  href="forum">
                  Petri Dish
               </a>
            </div>         
            <div>                
               <a class="white-text blue lighten-1 waves-effect waves-light btn col s4 m4 l4 offset-s4 offset-m8 offset-l8"
                  href="login">
                  Login
               </a>
            </div>
         </div>
      </div>   
   </body>
</html>