<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
   <div align="right" class="container index-content">
      <form>
         <i class="blue-text small material-icons">search</i>
         <input size="25">
      </form>
   </div>
</div>

<div class="row">
   <div class="container">
   <?php
      foreach ($users as $user)
      { ?>
         <div class="row">
            <div class="col s10 m10 l10">
               <div class="card z-depth-3">
                  <div class="card-content">
                     <h5>
                        <?php echo $user->firstname; ?>
                     </h5>
                  </div>
               </div>
            </div>
         </div>
   <?php
      } ?> 
   </div>
</div>

