<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{ ?>
    <div class="divider"></div>

   <?php
   $show = $comment->comment_id.$comment->order_id.'_show';
   $edit = $comment->comment_id.$comment->order_id.'_edit';
   ?>

    <!-- REPLY :: subcomment
    --------------------------------------------------------------------------------->
    <div id="<?php echo $show; ?>">
        <button class="btn-large grey lighten-5 grey-text text-darken-2" onclick="return show('<?php echo $edit; ?>','<?php echo $show; ?>');"
                style="width:100%; height:100%;">
            <h5><span class="grey-text text-darken-2"><small>Reply</small></span></h5>
        </button>
    </div>

    <!-- SUBMIT : CANCEL :: subcomment
    --------------------------------------------------------------------------------->
    <div id="<?php echo $edit; ?>" style="display:none">
       <?php echo validation_errors();
       echo form_open_multipart('Home'); ?>
        <div class="container-fluid">

            <div class="row">
                <div class="input-field col s10 offset-s1">
                    <textarea name="subcomments" type="text" class="materialize-textarea flow-text" style="font-size:20px;"></textarea>
                </div>
                <input type="hidden" name="comment_id" value="<?php echo $comment->comment_id;?>">
                <input type="hidden" name="order_id" value="<?php echo $comment->order_id;?>">
                <input type="hidden" name="new_subcomment" value="new_subcomment">
            </div>

            <div class="row">
                <div class="row col s12 m6">
                    <button class="btn-large grey lighten-5 grey-text" onclick="return show('<?php echo $show; ?>','<?php echo $edit; ?>');"
                            style="width:100%; height:100%;">
                        <h5><small>Cancel</small></h5>
                    </button>
                </div>
                <div class="row col s12 m6">
                    <button class="btn-large grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                            style="width:100%; height:100%;">
                        <h5><span class="grey-text text-darken-2"><small>Submit</small></span></h5>
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>
   <?php
} ?>