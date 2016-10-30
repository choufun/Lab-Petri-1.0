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
      width: 100%;
      height: 100%;
      margin: auto;
      padding: 100px 150px;
   }
   #mobile-container { margin: 10px 10px; }
   #section-1{ 
      margin: 20px 0px 0px 70px;
      padding-top:10px
   }
   #section-2{ 
      margin: 20px 0px 0px 120px;
      padding-top:15px;
   }
   #picture
   {
      display: block;
      margin: auto;
      width: 60%;
   }
   #mobile-section-1{margin-left:-10px}
   #mobile-picture
   {
      display: block;
      margin: auto;
      width: 100%;
   }
   #buttons
   {
      margin: auto;
      width: 75%;
      padding:10px;
   }
   #footer
   {
      bottom:0;
      padding-top: 45px;
   }
</style>
   <!-- BODY
   --------------------------------------------------------------------------------------------->
   <body class="blue">
      <!-- LARGE SCREEN
      ----------------------------------------------------------------------------->
      <div class="container-fluid hide-on-med-and-down" id="home-container">
         <!-- <div class="col s12 m12 l12"> -->
         <div class="row">  
            <div class="row white-text col s12 m12 l12">
               
               
               <h1><img class="responsive-img" src="assets/img/Logo.png" height="60" width="60" align="left">&nbsp;<strong>Lab Petri</strong></h1>
               
               
               <div id="section-1" class="white-text" style="font-size:48px;">
                  <strong style="margin:inherit;">Promoting STEM Education and Research</strong>
               </div>
               
               <div id="section-2" class="white-text" style="font-size:48px;">
                  <strong style="margin:inherit;">Bringing the Future Sooner</strong>
               </div>
               
            </div>
            
            
         </div>
         
         <div class="">

            <div class="flow-text row" id="buttons">
               
               <!--<a class="blue-text grey lighten-3 waves-effect waves-light btn-large col s3 m3 l3 offset-m2 offset-l2" href="labcast">-->
               <a class="blue-text grey lighten-3 waves-effect waves-light btn-large col s3 m3 l3 offset-m2 offset-l3" href="labcast">
                  <strong>Lab Cast</strong>
               </a>
               <!--<a class="blue-text grey lighten-3 waves-effect waves-light btn-large col s3 m3 l3 offset-m1 offset-l1" href="login">-->
               <a class="blue-text grey lighten-3 waves-effect waves-light btn-large col s3 m3 l3" href="login">
                  <strong>Login</strong>
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

            <div class="divider" style="margin-top:25px;"></div>
            <!--
            <div class="row">
               <a class="blue-text white waves-effect waves-light btn col s3 offset-s9" href="login?id=registration">
                  <strong>Sign Up</strong>
               </a>
            </div>
            -->

            <!--
            <img src="http://www.awwwards.com/awards/submissions/2015/12/565f269190510.jpeg" id="picture">
            -->

            <!--
            <div class="white-text" id="motto" style="font-size:48px;text-align:center;">
               
               Bringing The Future Sooner
               
               <strong style="font-family:Palatino Linotype;font-size:48px;text-align:center;"><i>Bringing The Future Sooner</i></strong>
               
            </div>
            -->
            
            <div id="footer" class="row">
               <div class="col s12 m12 l12">        
                  <div class="col s12 m3 l4" align="center">
                     <a href="company" target="_blank">
                        <h5 class="white-text" style="font-size:18px">
                           About Us
                        </h5>
                     </a>
                  </div>
                  <div class="col s12 m3 l4" align="center">
                     <a href="http://www.facebook.com/labpetri" target="_blank">
                        <h5 class="white-text" style="font-size:18px">
                           Facebook Page
                        </h5>
                     </a>
                  </div>
                  <div class="col s12 m3 l4" align="center">
                     <a target="_blank" href="https://www.linkedin.com/company/7958457?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A7958457%2Cidx%3A2-1-2%2CtarId%3A1463476850427%2Ctas%3ALab%20Petri">
                        <h5 class="white-text" style="font-size:18px">
                           LinkedIn Page
                        </h5>
                     </a>
                  </div>
               </div>
            </div>
            

         </div>
      </div>      
      <!-- MOBILE SCREEN
      ----------------------------------------------------------------------------->
      <div class="container-fluid hide-on-large-only white-text" id="mobile-container">
         <div class="row">
            <h3>
               Lab Petri
               <img class="responsive-img" src="assets/img/Logo.png" height="120" width="120" align="right">
            </h3>
            <h6>
               Bringing the Future Sooner
            </h6>
            <div class="divider"></div>
            <h6 class="white-text">
               <div id="mobile-section-1" class="col s4 m4 l4">
                  <a href="https://www.labpetri.org/company"
                     class="white-text">
                     Help Us Grow
                  </a>
               </div>
               <div><strong>It's Free!</strong></div>               
            </h6>
            <div class="divider"></div>
            <h6 class="white-text">
               <a href="company" class="white-text">
                  About Us
               </a>
            </h6>
         </div>
         <div class="row">
            <div class="row" align="center">
               <a class="white-text blue waves-effect waves-light btn col s4 m4 l4 offset-s4 offset-m4 offset-l4"
                  href="labcast">
                  Lab Cast
               </a>
            </div>
            <div>                
               <a class="white-text blue waves-effect waves-light btn col s4 m4 l4 offset-s4 offset-m4 offset-l4"
                  href="login">
                  Login
               </a>
            </div>
         </div>
         <!--
         <img src="http://www.awwwards.com/awards/submissions/2015/12/565f269190510.jpeg" id="mobile-picture">
         -->
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