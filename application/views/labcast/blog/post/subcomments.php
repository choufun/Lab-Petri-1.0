<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>

<!-- SUBMIT : CANCEL :: subcomment
--------------------------------------------------------------------------------->
<div>
   <?php echo form_open('Blogpost'); ?>
      <div class="container-fluid">         
         <div class="row">
            <div class="input-field col s10 offset-s1">
               <textarea name="subcomments" type="text" class="materialize-textarea" placeholder="Write your comments here..."></textarea>
            </div>            
            <input type="hidden" name="comment_id" value="<?php echo $comment->comment_id;?>">
            <input type="hidden" name="order_id" value="<?php echo $comment->order_id;?>">
            <input type="hidden" name="key" value="<?php echo $this->input->get('key'); ?>">
            <input type="hidden" name="new_subcomment" value="new_subcomment">
         </div>         
         <div class="row">
            <div class="col s10 offset-s1">
               <button class="btn-large grey lighten-5 grey-text text-darken-4" type="submit" name="action"
                       style="width:100%; height:100%;">
                  <h5><span class="grey-text text-darken-2"><small>Comment In</small></span></h5>
               </button>
            </div>
         </div>
      </div>
   </form>   
</div>
<?php
} ?>