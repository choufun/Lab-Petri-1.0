<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
   
<!-- LOGO : TITLE
--------------------------------------------------------------------------------------------->
   <title>Lab Petri</title>
   <link rel="icon" href="assets/img/favicon.ico">
   <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0"/>
   
<!-- CSS
--------------------------------------------------------------------------------------------->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
   <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   <link href="assets/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   
   <style>
      a:hover { color: #00e5ff; }
   </style>
   
   <!-- NEEDS TO BE AT TOP -->
   <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-77852248-1', 'auto');
        ga('send', 'pageview');
   </script>
   
   <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/> -->
   <!-- Add the slick-theme.css if you want default styling -->
   <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css"/> -->
   
   <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.11/slick.css"/>
   
</head>

<!-- BODY
--------------------------------------------------------------------------------------------->
<body class="avoid-fout blue-grey lighten-5">
<!--<body class="avoid-fout page-blue grey lighten-3">-->
   <div class="navbar-fixed">

<!-- NAV
--------------------------------------------------------------------------------------------->
      <nav class="blue darken-1 z-depth-1" role ="navigation">
         <div class="nav-wrapper container">
            <a href="#" data-activates="mobile-demo" class="button-collapse">
               <i class="material-icons">menu</i>
            </a>

            <!-- LOGO
            ------------------------------------------------------------------------------------>
            <a id="logo-container" href="/" class="brand-logo">
               <img class="logo" align="left" src="assets/img/Logo.png" alt="logo" height="50" width="50">
         <?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
               { ?>
                  <!-- <strong>Petri Dish</strong> -->
                  <strong>Lab Cast</strong>
         <?php }
               else
               { ?>
                  <strong>Lab Petri</strong>
               <?php
               } ?>
               
            </a>

            <!-- DESKTOP : LAPTOP
            ------------------------------------------------------------------------------------>
            <ul class="right hide-on-med-and-down">
               <?php

                  /* LOGGED IN
                  ******************************************************************************/
                  if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
                  { ?>
                        <li class="tab">
                           <a href="labid">Lab ID</a>
                        </li>
                        <li class="tab">
                           <!--<a href="labcast">Lab Cast</a>-->
                           <a href="petridish">Petri Dish</a>
                        </li>                        
                        <li class="tab">
                           <a href="labmail">Lab Mail</a>
                        </li>
                        <li class="tab">
                           <a href="labmates">Lab Mates</a>
                        </li>                        
                        <li class="tab">
                           <a href="labfaq">Lab FAQ</a>
                        </li>
                        <li class="tab">
                           <a href="company">About Us</a>
                        </li>
                        <li class="tab">
                           <a href="login/logout">Logout</a>
                        </li>
            <?php }

                  /* NOT LOGGED IN
                  ******************************************************************************/
                  else
                  { ?>                  
                        <li class="tab">
                           <a href="company">About Us</a>
                        </li>
                        <li class="tab">
                           <a href="labcast">Lab Cast</a>
                        </li>
                        <li class="tab">
                           <a href="petridish">Petri Dish</a>
                        </li>
                        <li class="tab">
                           <a href="login">Login</a>
                        </li>
            <?php } ?>             
            </ul>

            <!-- MOBILE
            ------------------------------------------------------------------------------------>
            <ul id="mobile-demo" class="side-nav">    
               <?php

                  /* LOGGED IN
                  ******************************************************************************/
                  if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
                  { ?>
                        <li class="tab">
                           <a href="labid">Lab ID</a>
                        </li>
                        <li class="tab">
                           <!--<a href="labcast">Lab Cast</a>-->
                           <a href="petridish">Petri Dish</a>
                        </li>                        
                        <li class="tab">
                           <a href="labmail">Lab Mail</a>
                        </li>
                        <li class="tab">
                           <a href="labmates">Lab Mates</a>
                        </li>
                        <li class="tab">
                           <a href="labfaq">Lab FAQ</a>
                        </li>
                        <li class="tab">
                           <a href="company">About Us</a>
                        </li>
                        <li class="tab">
                           <a href="login/logout">Logout</a>
                        </li>
            <?php }

                  /* NOT LOGGED IN
                  ******************************************************************************/
                  else
                  { ?>
                        <li class="tab">
                           <a href="company">About Us</a>
                        </li>
                        <li class="tab">
                           <a href="labcast">Lab Cast</a>
                        </li>
                        <li class="tab">
                           <a href="petridish">Petri Dish</a>
                        </li>
                        <li class="tab">
                           <a href="login">Login</a>
                        </li>
            <?php } ?>               
            </ul>
         </div>
      </nav>
   </div>