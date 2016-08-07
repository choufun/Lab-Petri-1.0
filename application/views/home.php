<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
   <head>
     <meta name="google-site-verification" 
           content="slSKWp74kPFZdOKueCWQVvzgv1LXPo-utMadfKm1YOI" />
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
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-77852248-1', 'auto');
        ga('send', 'pageview');
      </script>
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
               <h1>Lab Petri&nbsp;<small class="grey-text">beta 1.0</small><img class="responsive-img" src="assets/img/Logo.png" height="120" width="120" align="right"></h1>                  
               <h5>Find Research, Build Connections</h5>                  
               <div class="divider"></div>                  
               <h6 class="white-text">
               <div id="section-1" class="col s6 m6 l6">
                  <a href="https://www.labpetri.org/support"
                     class="white-text">
                     Promoting STEM Education and Research
                  </a>
                  <strong id="section-2">Sign Up For Free!</strong></div>
               <div class="col s3 m3 l3 offset-s3 offset-m3 offset-l3" align="right">
                  <a href="company" class="white-text" align="right">About Us</a>
               </div>
            </h6>
         </div>               
         </div>
         <div class="row">
            
            <a class="white-text blue lighten-1 waves-effect waves-light btn col s3 m3 l3 offset-m5 offset-l5" href="petridish">
               Petri Dish
            </a>
            <a class="white-text blue lighten-1 waves-effect waves-light btn col s3 m3 l3 offset-m1 offset-l1" href="login">
               Login
            </a>
            
            <!--
            <a class="white-text blue lighten-1 waves-effect waves-light btn col s3 offset-s1" href="petridish">
               Petri Dish
            </a>
            <a class="white-text blue lighten-1 waves-effect waves-light btn col s3 offset-s1" href="login?id=registration">
               Sign Up
            </a>
            <a class="white-text blue lighten-1 waves-effect waves-light btn col s3 offset-s1" href="login">
               Login
            </a>
            -->
         </div>
         <div class="row">
            <a class="white-text blue lighten-1 waves-effect waves-light btn col s3 offset-s9" href="login?id=registration">
               <strong>Sign Up</strong>
            </a>
         </div>
      </div>      
      <!-- MOBILE SCREEN
      ----------------------------------------------------------------------------->
      <div class="container-fluid blue hide-on-large-only white-text" id="mobile-container">
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
               <div id="section-1" class="col s4 m4 l4">
                  <a href="https://www.labpetri.org/company"
                     class="white-text">
                     Help Us Grow
                  </a>
               </div>
               <div><strong>It's Free!</strong></div>               
            </h6>
         </div>
         <div class="row">
            <div class="row" align="center">
               <a href="company"
                  class="white-text col s4 m4 l4 offset-s8 offset-m8 offset-l8">
                  About Us
               </a>
            </div>
            <div class="row" align="center">
               <a class="white-text blue lighten-1 waves-effect waves-light btn col s4 m4 l4 offset-s4 offset-m4 offset-l4"
                  href="petridish">
                  Petri Dish
               </a>
            </div>
            <div class="row" align="center">
               <a class="white-text blue lighten-1 waves-effect waves-light btn col s4 m4 l4 offset-s4 offset-m4 offset-l4"
                  href="login?id=registration">
                  Sign Up
               </a>
            </div>
            <div>                
               <a class="white-text blue lighten-1 waves-effect waves-light btn col s4 m4 l4 offset-s4 offset-m4 offset-l4"
                  href="login">
                  Login
               </a>
            </div>
         </div>
      </div>
      <script>
$(document).ready(function(){
   var keyCodes = [61, 107, 173, 109, 187, 189];

   $(document).keydown(function(event) {   
      if (event.ctrlKey==true && (keyCodes.indexOf(event.which) != -1)) {
       alert('disabling zooming'); 
       event.preventDefault();
       }
   });

   $(window).bind('mousewheel DOMMouseScroll', function (event) {
      if (event.ctrlKey == true) {
        alert('disabling zooming'); 
        event.preventDefault();
      }
   });
});
      </script>
   </body>
</html>