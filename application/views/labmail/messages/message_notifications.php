<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
<?php if ($new_messages !== NULL) { ?>
<?php foreach ($new_messages as $request) { ?>
   <div class="card hoverable">
      <div class="card-content">
         <div class="row col s9">
            <?php echo $this->labmail_model->get_friends_name($request->friend_id);?>&nbsp;sent a message.
         </div>
         <div class="row col s3">
            <a href="labmail?id=<?php echo $request->friend_id;?>">
               <button class="btn-large grey lighten-5 grey-text text-darken-3" style="width:100%; height:100%;">
                  Message
               </button>
            </a>
         </div>
      </div>
   </div>
<?php
   } ?>
<?php
}
else 
{ ?>
   <div class="card">
      <div class="card-content">
         <h6>No New Messages</h6>
      </div>
   </div>
<?php } ?>
</div>