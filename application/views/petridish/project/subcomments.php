<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
<div class="divider"></div>
<?php
$show = $comment->comment_id.$comment->order_id.'_show';
$edit = $comment->comment_id.$comment->order_id.'_edit';
?>

<!-- HEADER
-------------------------------------------------------------------->
<div id="<?php echo $show; ?>">
   <a class="right btn" onclick="return show('<?php echo $edit; ?>','<?php echo $show; ?>');">
      Reply
   </a>
</div>

<!-- BODY
-------------------------------------------------------------------->
<div id="<?php echo $edit; ?>" style="display:none">
   <?php echo validation_errors(); ?>
   <?php echo form_open_multipart('Petridish'); ?>
      <div class="container">
         <div class="row">
            <div class="input-field col s12">
               <textarea name="subcomments" type="text" class="materialize-textarea" length="2500"></textarea>
            </div>
            
            <input type="hidden" name="comment_id" value="<?php echo $comment->comment_id;?>">
            <input type="hidden" name="order_id" value="<?php echo $comment->order_id;?>">
            <input type="hidden" name="new_subcomment" value="new_subcomment">

            <div class="col s12 right-align">
               <button class="btn waves-effect waves-light" type="submit" name="action">
                  Reply <i class="material-icons right">mode_edit</i>
               </button>
            </div>
         </div>
      </div>
   </form>
   <a class="right btn" onclick="return show('<?php echo $show; ?>','<?php echo $edit; ?>');">
      Cancel
   </a>
</div>
<?php } ?>