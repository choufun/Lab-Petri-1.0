<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
<?php if ($user_id !== $this->session->user_id) { ?>
   
   <div class="col s6 m6 l6" align="left">
      <?php echo $message; ?>
   </div>
   
<?php } else { ?>
   
   <div class="col s6 m6 l6 offset-s6 offset-m6 offset-l6" align="right">
      <?php echo $message; ?>
   </div>
   
<?php } ?>               
</div>