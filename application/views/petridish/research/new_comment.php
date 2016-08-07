<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{ ?>
<div class="row">
   <div class="col s6 offset-s6">
      <?php echo form_open_multipart('Petridish');
            echo validation_errors(); ?>

         <div class="input-field col s12">
            <textarea name="comments" type="text" class="materialize-textarea" placeholder="Write a comment..."></textarea>
         </div>
      
         <input type="hidden" name="comment_id" value="<?php echo $post->comment_id;?>">
         <input type="hidden" name="new_comment" value="new_comment">

         <div class="col s12" align="right">
            <button class="btn waves-effect waves-light" type="submit" name="action">Comment
               <i class="material-icons right">mode_edit</i>
            </button>
         </div>
      <?php echo form_close(); ?>
   </div>
</div>
<?php
} ?>