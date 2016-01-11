<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<head>
   
<!-- LOGO : TITLE
--------------------------------------------------------------------------------------------->
   <title>Lab Petri</title>
   <link rel="icon" href="assets/img/favicon.ico">
   <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0;"/>

<!-- CSS
--------------------------------------------------------------------------------------------->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
   <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   <link href="assets/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   
   <!-- NEEDS TO BE AT TOP -->
   <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
</head>

<!-- BODY
--------------------------------------------------------------------------------------------->
<body class="avoid-fout page-blue">
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
               <strong>Lab Petri</strong>
            </a>

            <!-- DESKTOP : LAPTOP
            ------------------------------------------------------------------------------------>
            <ul class="right hide-on-med-and-down">
               <?php

                  /* LOGGED IN
                  ******************************************************************************/
                  if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
                  {
                     echo
                     '
                        <li class="tab">
                           <a href="profile">'.$this->session->firstname.' '.$this->session->lastname.'</a>
                        </li>
                        <li class="tab">
                           <a href="peer">Research Buddies</a>
                        </li>
                        <li class="tab">
                           <a href="login/logout">Logout</a>
                        </li>
                     ';
                  }

                  /* NOT LOGGED IN
                  ******************************************************************************/
                  else
                  {
                     echo
                     '
                        <li class="tab">
                           <a href="forum">Petri Dish</a>
                        </li>
                        <li class="tab">
                           <a href="company">Company</a>
                        </li>
                        <li class="tab">
                           <a href="login">Login</a>
                        </li>
                     ';
                  }
               ?>               
            </ul>

            <!-- MOBILE
            ------------------------------------------------------------------------------------>
            <ul id="mobile-demo" class="side-nav">    
               <?php

                  /* LOGGED IN
                  ******************************************************************************/
                  if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
                  {
                     echo
                     '
                        <li class="tab">
                           <a href="profile">'.$this->session->firstname.' '.$this->session->lastname.'</a>
                        </li>
                        <li class="tab">
                           <a href="peer">Research Buddies</a>
                        </li>
                        <li class="tab">
                           <a href="login/logout">Logout</a>
                        </li>
                     ';
                  }

                  /* NOT LOGGED IN
                  ******************************************************************************/
                  else
                  {
                     echo
                     '
                        <li class="tab">
                           <a href="forum">Petri Dish</a>
                        </li>
                        <li class="tab">
                           <a href="company">Company</a>
                        </li>
                        <li class="tab">
                           <a href="login">Login</a>
                        </li>
                     ';
                  }
               ?>               
            </ul>
         </div>
      </nav>
   </div>