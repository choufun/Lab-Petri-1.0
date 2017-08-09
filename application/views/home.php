<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="google-site-verification" content="slSKWp74kPFZdOKueCWQVvzgv1LXPo-utMadfKm1YOI"/>
        <title>Lab Petri</title>
        <link rel="icon" href="assets/img/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0;"/>
        <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <style>
            #profile-image {
                border-radius: 50%;
                border: 1px solid #fbc02d ;
            }
            a:hover { color: #00e5ff; }
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
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-77852248-1', 'auto');
            ga('send', 'pageview');
        </script>
        <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
    </head>
    <body class="blue">
<!-- DESKTOP
----------------------------------------------------------------------------->
        <div class="container-fluid blue parallax-container" id="index-banner">
            <div class="row">
                <div class="white-text col s12 m12 l12">
                    <div class="card-content">
                        <h1><strong>Lab Petri</strong>&nbsp;<img class="responsive-img" src="assets/img/Logo.png" height="150" width="150" align="right"></h1>
                        <h6><strong>Promoting STEM Education and Research</strong></h6>
                        <div class="divider"></div>
                        <h6 class="white-text">
                            <div id="section-1" class="col s6 m6 l6">
                                <strong>Bringing the Future Sooner</strong>
                            </div>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:150px;">
                <div class="col s12 m10 offset-m1">
                    <div class="col s12 m4 l4">
                        <div class="card-content">
                            <button class="front btn-large grey lighten-5 blue-text z-depth-2" type="submit" name="action" style="width:100%; height:100%;">
                                <h5><small>NEWSFEED</small></h5>
                            </button>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card-content">
                            <button class="front btn-large grey lighten-5 blue-text z-depth-2" type="submit" name="action" style="width:100%; height:100%;">
                                <h5><small>FORUM</small></h5>
                            </button>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card-content">
                            <button class="front btn-large grey lighten-5 blue-text z-depth-2" type="submit" name="action" style="width:100%; height:100%;">
                                <h5><small>LOGIN</small></h5>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid white">
            <div class="section">
               <?php include 'application/views/company/aboutus.php';?>
            </div>
        </div>
        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
            </div>
            <div class="parallax para_pics"><img src="../../assets/img/Lab_Photo_1.jpg"></div>
        </div>
        <div class="container-fluid white">
            <div class="section">
               <?php include 'application/views/company/how_it_works.php';?>
            </div>
        </div>
        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
            </div>
            <div class="parallax para_pics"><img src="../../assets/img/Computer_Science_Photo_1.jpg"></div>
        </div>
        <div class="container-fluid white">
            <div class="section">
               <?php include 'application/views/company/team.php';?>
                <div class="divider"></div>
               <?php include 'application/views/company/donors.php';?>
                <div class="divider"></div>
               <?php include 'application/views/company/footer.php';?>
            </div>
        </div>
        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
            </div>
            <div class="parallax para_pics"><img src="../../assets/img/Mathematics_Photo_1.jpg"></div>
        </div>

    <script>
    $(document).ready(function(){
        $('.parallax').parallax();
    });

    /*
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
*/
    </script>
<script src="assets/js/materialize.js"></script>
<script src="assets/js/materialize.min.js"></script>
<script src="assets/js/custom.js"></script>
   </body>
</html>