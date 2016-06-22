<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" id="messages">
   <div class="card">
      <div class="card-content">
     
<?php //echo $messages;
      foreach($messages as $message)
      { ?>
         <div class="row">
            <?php echo $message->message; ?>
         </div>
<?php } ?>
            
      </div>
   </div>      
</div>