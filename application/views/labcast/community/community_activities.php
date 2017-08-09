<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card" style="margin-right:40px; margin-left: 40px;">
   <div class="card-content">
      <center><h4><strong>Community Activities</strong></h4></center>
   </div>
   <div class="divider"></div>
   
   <?php foreach ($activities as $cast)
{ ?>
      <div class="card-content">
         <?php echo $cast->activity; ?>
      </div>
<?php if ($cast !== end($activities)) { ?><div class="divider"></div><?php }
}?>
</div>
      
