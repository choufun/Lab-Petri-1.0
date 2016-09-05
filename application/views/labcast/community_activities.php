<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card-content"><h5>Community Activities:</h5></div>
      <div class="divider"></div>
      
<?php foreach ($activities as $cast) { ?>
      <div class="card-content">
         <?php echo $cast->activity; ?>
      </div>
<?php if ($cast !== end($activities)) { ?><div class="divider"></div><?php }
}?>