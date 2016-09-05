<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card-content">
   <div class="row container-fluid">
      <div class="col s12 m12 l12">
         <h6 class="blue-text text-darken-5">
            <span class="green-text left">Description:</span>
            <span class="right">
               <span class="green-text">Topic:</span>&nbsp;
               <span class="grey-text text-darken-2"><?php echo $post->topic; ?></span>
            </span>
            <br>
         </h6>
      </div>
      <div class="col s12 m12 l12">
         <p class="grey-text text-darken-3 truncate">
            <?php echo $post->abstract; ?>
         </p>
      </div>
   </div>
</div>