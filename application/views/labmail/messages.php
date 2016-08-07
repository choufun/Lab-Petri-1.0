<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
if ($messages !== NULL) {
   foreach($messages as $message)
   { ?> 
      <div class="row">
<?php if ($message->user_id !== $this->session->user_id) { ?>
         <div class="col s6 m6 l6" align="left">
            <?php echo $message->message; ?>
         </div>
<?php } else { ?>
         <div class="col s6 m6 l6 offset-s6 offset-m6 offset-l6" align="right">
            <?php echo $message->message; ?>
         </div>
<?php } ?>               
      </div>
<?php
   }
} else { ?>
      <!-- <div class="row"><h6>My Notifications:</h6></div> -->
<?php
} ?> 