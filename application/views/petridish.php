<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- CSS
---------------------------------------------------------------------------->
<style>
   .tabs .indicator { background-color: #2196f3; }   
</style>

<div class="container-fluid blue-grey lighten-5">
 
<!-- PETRI DISH :: tabs
---------------------------------------------------------------------------->
   <div class="col s12">
      <div class="row">
         <ul class="tabs">
<!-- TAB :: research
---------------------------------------------------------------------------->
            <li class="tab col s4">
               <a href="#research_opportunities" class="active black-text"><strong>Research</strong></a>
            </li>            
<!-- TAB :: projects
---------------------------------------------------------------------------->
            <li class="tab col s4">
               <a href="#project_opportunities" class="black-text"><strong>Projects</strong></a>
            </li>             
<!-- TAB :: jobs
---------------------------------------------------------------------------->
            <li class="tab col s4">
               <a href="#job_opportunities" class="black-text"><strong>Jobs</strong></a>
            </li> 
         </ul>
      </div>
   </div>

<!-- RESEARCH :: section ------------------------------------------------------------->
   <div id="research_opportunities">
      
<!-- RESEARCH :: new post ------------------------------------------------------------> 
      <div class="container-fluid" style="margin: 0px 40px;">
          <?php include 'application/views/petridish/research/new_post.php';?>
      </div>
      
<!-- RESEARCH :: posts --------------------------------------------------------------->   
      <?php include 'application/views/petridish/research/posts.php';?> 
   </div>
   
<!-- PROJECT :: section -------------------------------------------------------------->
   <div id="project_opportunities">
      <div class="container-fluid" style="margin: 0px 40px;">      
         
<!-- PROJECT :: new post ------------------------------------------------------------->
         <?php include 'application/views/petridish/project/new_post.php';?>
      </div>
      
<!-- posts --------------------------------------------------------------------------->   
      <?php include 'application/views/petridish/project/posts.php';?> 
      
   </div>
   
<!-- JOB :: section ------------------------------------------------------------------>
   <div id="job_opportunities">
      <div class="container">
         
<!-- new post ------------------------------------------------------------------------>
         <?php // include 'application/views/petridish/job/new_post.php';?>
         <div align="center"> Coming Soon </div>
      </div>
<!-- posts --------------------------------------------------------------------------->   
      <?php // include 'application/views/petridish/job/posts.php';?>
      
   </div> 
</div>

<!-- JAVASCRIPT ---------------------------------------------------------------------->
<script type="text/javascript">
   
   function show(current, hidden)
   {
      document.getElementById(current).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
   }

   function toggle(comments)
   {
      var all = document.getElementById(comments);
      if ( all.style.display != 'none' ) { all.style.display = 'none'; }
      else { all.style.display = ''; }
      return false;
   }  
</script>