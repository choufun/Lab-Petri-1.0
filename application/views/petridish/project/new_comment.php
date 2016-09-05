<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{ ?>
<div class="row">
   <div class="col s12 m6 offset-m6">
      <div class="card">
         <div class="card-content">
            <?php echo form_open_multipart('Petridish');
                  echo validation_errors(); ?>

               <div class="input-field col s12">
                  <textarea name="comments" type="text" class="materialize-textarea" placeholder="Write a comment..."></textarea>
               </div>

               <input type="hidden" name="comment_id" value="<?php echo $post->comment_id;?>">
               <input type="hidden" name="new_comment" value="new_comment">

            
               <div class="row col s12">
                  <button class="btn-large grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                          style="width:100%; height:100%;">
                     <h5><span class="grey-text text-darken-2"><small>Comment</small></span></h5>
                  </button>
               </div>
            <?php echo form_close(); ?>
         </div>
      </div>
   </div>
</div>
<?php
} ?>