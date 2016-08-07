<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   .collapsible-header
   {
      text-align:center;
   }
</style>

<div>
   <h5 align="center" class="blue-text text-darken-3 flow-text">
      <strong>Tutorials</strong>
   </h5>

<!-- START STEP CONTAINER
---------------------------------------------------------------------------->
   <div class="container">
      <ul class="collapsible popout" data-collapsible="accordion">
         
<!-- STEP 1 CONTAINER
---------------------------------------------------------------------------->
         <h4 align="center" class="blue-text text-darken-3 flow-text">
         Step 1
      </h4>
         <hr>
         <li>
            <div class="collapsible-header active">First</div>
            <div class="collapsible-body">
               <p>Step 1 placeholder</p>
            </div>
         </li>
         <li>
            <div class="collapsible-header">Second</div>
            <div class="collapsible-body">
               <p>Step 2 placeholder</p>
            </div>
         </li>
         <li>
            <div class="collapsible-header">Third</div>
            <div class="collapsible-body">
               <p>Step 3 placeholder</p>
            </div>
         </li>

<!-- STEP 2 CONTAINER
---------------------------------------------------------------------------->
         <h4 align="center" class="blue-text text-darken-3 flow-text">
         Step 2
      </h4>
         <hr>
         <li>
            <div class="collapsible-header">First</div>
            <div class="collapsible-body">
               <p>Step 1 placeholder</p>
            </div>
         </li>
         <li>
            <div class="collapsible-header">Second</div>
            <div class="collapsible-body">
               <p>Step 2 placeholder</p>
            </div>
         </li>
         <li>
            <div class="collapsible-header">Third</div>
            <div class="collapsible-body">
               <p>Step 3 placeholder</p>
            </div>
         </li>
         
<!-- STEP 3 CONTAINER
---------------------------------------------------------------------------->
         <h4 align="center" class="blue-text text-darken-3 flow-text">
         Step 3
      </h4>
         <hr>
         <li>
            <div class="collapsible-header">First</div>
            <div class="collapsible-body">
               <p>Step 1 placeholder</p>
            </div>
         </li>
         <li>
            <div class="collapsible-header">Second</div>
            <div class="collapsible-body">
               <p>Step 2 placeholder</p>
            </div>
         </li>
         <li>
            <div class="collapsible-header">Third</div>
            <div class="collapsible-body">
               <p>Step 3 placeholder</p>
            </div>
         </li>

<!-- END STEP CONTAINER
---------------------------------------------------------------------------->
      </ul>
   </div>

</div>

<script type="text/javascript">
   $(document).ready(function() {
      $('.collapsible').collapsible({
         accordion: false
      });
   });
</script>