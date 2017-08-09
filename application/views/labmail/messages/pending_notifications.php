<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
<?php if ($requests !== NULL) { ?>
<?php foreach ($requests as $request) { ?>
   <div class="card hoverable">
      <div class="card-content">
         <div class="row col s9">
            <?php echo $this->labmail_model->get_friends_name($request->user_id);?>&nbsp;requested to be a connection.
         </div>
         <div class="row col s3">
            <a href="labmail/accepts?id=<?php echo $request->user_id;?>">
               <button class="btn-large grey lighten-5 grey-text text-darken-3" style="width:100%; height:100%;">
                  Connect
               </button>
            </a>
         </div>
      </div>
   </div>
<?php } ?>
<?php
}
else 
{ ?>
   <div class="card">
      <div class="card-content">
         <h6>No Pending Requests</h6>
      </div>
   </div>
<?php } ?>
</div>