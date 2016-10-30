<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card" style="margin-right:40px; margin-left: 40px;">
   <div class="card-content" style="margin: 0px 15px;">     
   
      <!-- NAVIGATION
      --------------------------------------------------------------------------->
      <div class="navigation">
         
         <!-- UNDERGRADUATES
         ------------------------------------------------------------------------>
         <div id="undergraduates">
            <div class="container-fluid">
               <div class="row blue-text text-darken-4" align="center">
                  <div class=""><h3><strong>Undergraduates</strong></h3></div>
               </div>
               <div class="row" align="center">
                  <h6>
                     <small class="grey-text text-darken-1">Showing:
                        <strong class="green-text">All</strong>
                     </small>      
                  </h6>
               </div>
               <div class="col s12 m12 l12">
                  <div class="row">
                     <ul class="collapsible" data-collapsible="accordion">
                        <?php include 'application/views/labmate/search/default/undergraduates.php';?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

         <!-- GRADUATES
         ------------------------------------------------------------------------>
         <div id="undergraduates">
            <div class="container-fluid">
               <div class="col s12 m12 l12">
                  <div class="row">
                     <h3 class="blue-text text-darken-4" align="center">
                        <strong>Graduates</strong>
                     </h3>
                     <h6 align="center">
                        <small class="grey-text text-darken-1">Showing:
                           <strong class="green-text">All</strong>
                        </small>
                     </h6>
                  </div>
               </div>
               <div class="col s12 m12 l12">
                  <div class="row">
                     <ul class="collapsible" data-collapsible="accordion">
                        <?php include 'application/views/labmate/search/default/graduates.php';?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

         <!-- PRPFESSORS
         ------------------------------------------------------------------------>
         <div id="undergraduates">
            <div class="container-fluid">
               <div class="col s12 m12 l12">
                  <div class="row">
                     <h3 class="blue-text text-darken-4" align="center">
                        <strong>Professors</strong>
                     </h3>
                     <h6 align="center">
                        <small class="grey-text text-darken-1">Showing:
                           <strong class="green-text">All</strong>
                        </small>
                     </h6>
                  </div>
               </div>
               <div class="col s12 m12 l12">
                  <div class="row">
                     <ul class="collapsible" data-collapsible="accordion">
                        <?php include 'application/views/labmate/search/default/professors.php';?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>