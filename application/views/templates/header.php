<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<head>
      <!--<link rel="icon" href="http://getbootstrap.com/favicon.ico">-->
      <title> Lab Petri </title>      
<!-- MATERIALIZE CSS 
      - Imported materialize.css
      - Let browser know website is optimized for mobile
      - Import custom basic.css
------------------------------------------------------------------------------------------------------>
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.css" media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
   
      <link href="../../assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="assets/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link rel="icon" href="assets/img/favicon.ico" type="image/gif" sizes="16x16"> 
   </head>
<!-- BODY
------------------------------------------------------------------------------------------------------>
  <body style ="margin-top:1000 px" class="avoid-fout page-blue">     
<!-- NAV BAR
      - Nav Tabs
------------------------------------------------------------------------------------------------------->
      <nav class="blue" role ="navigation">
         <div class="nav-wrapper container">
			 <!--Logo--> 
            <img class="logo" align="left" src="assets/img/Logo.png" alt="logo" height="50" width="50">
            <a id="logo-container" href="/" class="brand-logo">
               <strong>Lab Petri</strong>
            </a>

			 <!-- For Desktop -->
			 <ul class="right hide-on-med-and-down">

          <?php
				//For Logged In Users
				if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
            {
					echo '<li class="tab col s4"> <a href="profile/">'.$this->session->firstname.'</a></li>';
               echo '<li class="tab col s4"> <a href="peer/">Peers</a></li>';
					echo '<li class="tab col s4"> <a href="login/logout"> Logout </a></li>';
				}

				//For Not Logged In Users
            else
            {
				   echo '<li> <a href="register/"> Sign-Up </a></li>';
				   echo '<li> <a href="login"> Login </a></li>';
				   echo '<li> <a href="forum"> The Petri Dish </a></li>';
            }
         ?>               
      		</ul>
			
			 <!--For Mobile-->
            <ul id="nav-mobile" class="side-nav">    
				<?php
			 	//Logged In Users
				if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
            {
					echo '<li class="tab col s4"> <a href="profile/">'.$this->session->firstname.'</a></li>';
              	echo '<li class="tab col s4"> <a href="peer/"> Peers </a></li>';
					echo '<li class="tab col s4"> <a href="login/logout"> Logout </a></li>';
				}
				//Not Logged In Users
            else
            {
				  echo '<li> <a href="register/"> Sign-Up </a></li>';
				  echo '<li> <a href="login"> Login </a></li>';
				  echo '<li> <a href="forum"> The Petri Dish </a></li>';
            }
				?>               
            </ul>
			 
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>

         </div>
      </nav>