<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head>
    <!--Basic Bootstrap Stuff, Nothing to Care About -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
	<link rel="import" href="../../assets/polymer/polymer.html">
    <title>Brian's Project Page</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/jumbotron/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Jumbotron Template for Bootstrap_files/ie-emulation-modes-warning.js"></script><style type="text/css"></style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        
    
    <!--The Header's style sheet -->
    
    
  </head>
    
<body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.projectsbybrian.website/#">
              <img alt="Brand" src="http://getbootstrap.com/favicon.ico">
          </a>
          <a class="navbar-brand">
             <input type="text" placeholder="Search Brian's Project" class="form-control">
          </a>
           <a class="navbar-brand">
               <button type="submit" class="btn btn-success">Go</button>
           </a>
        </div>
        <a class="navbar-brand navbar-right" href="http://www.projectsbybrian.website/index.php/Register"> 
            
            <button class="btn btn-primary disabled">
                Logged in as: <?php 
                if($this->session->userdata('email') != ""){
                    echo $this->session->userdata('email');
                } 
                else{
                    echo "Guest";
                }?>
            </button>
            
            <button type="submit" id="login_signout" class="btn btn-primary btn-warning" onload = "toggleLogin()"  >
            <?php 
                
                if($this->session->logged_in == FALSE){
                    echo "Login/Sign Up"; ?>
                    <script type="text/javascript">document.getElementById("login_signout").className = 'btn btn-primary btn-warning';</script>
                    <?php
                }
                else{
                    echo "Sign out"; ?>
                    <script type="text/javascript">document.getElementById("login_signout").className = 'btn btn-primary btn-danger';</script>
                    <?php
            }?>

            </button>
          </a>        
       
    </nav>
