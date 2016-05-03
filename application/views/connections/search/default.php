<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
   <!-- NAVIGATION
   --------------------------------------------------------------------------->
   <div class="navigation">
      <button type="button" class="slick-prev blue center">Previous</button>
<button type="button" class="slick-next blue center">Previous</button>
      <!-- UNDERGRADUATES
      ------------------------------------------------------------------------>
      <div id="undergraduates">
         <div class="container-fluid">
            <div class="col s12 m12 l12">
               <div class="row">
                  <h3 class="blue-text text-darken-4" align="center">
                     <strong>Undergraduates</strong>
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
                     <?php include 'application/views/connections/undergraduates.php';?>
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
                     <?php include 'application/views/connections/graduates.php';?>
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
                     <?php include 'application/views/connections/professors.php';?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>