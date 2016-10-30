<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- AJAX SUBMISSION -->
<!--
<div class="col s12 flow-text" align="center">
   <button class="btn-large waves-effect grey lighten-5 grey-text text-darken-3" type="button" name="action"
           style="width:100%; height:100%;" onclick="ajax();" id="submit_blog">
      Submit
   </button>
</div> 
-->
<?php
if ($messages !== NULL) {   
   if ($messages === "no messages") { ?>
      <h6>Start messaging your new connnection.</h6>
<?php
   } else {
      foreach($messages as $message) { ?> 
         <div class="row flow-text black-text">

   <!-- FRIEND MESSAGES
   ----------------------------------------------------------------------->         
   <?php if ($message->user_id !== $this->session->user_id) { ?>

            <div class="col s6 m6 l6" align="left">
               <small><strong><?php echo $message->message; ?></strong></small>
            </div>

   <!-- USER MESSAGES
   ----------------------------------------------------------------------->
   <?php } else { ?>

            <div class="col s6 m6 l6 offset-s6 offset-m6 offset-l6" align="right">
               <small><strong><?php echo $message->message; ?></strong></small>
            </div>

   <?php } ?>               
      </div>
<?php } ?>
      
      <span id="new_messages"></span>
<?php
   }
}
else
{
   include 'application/views/labmail/messages/pending_notifications.php';
   include 'application/views/labmail/messages/message_notifications.php';
}
?>