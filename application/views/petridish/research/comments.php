<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $sorted_order_ids = $this->petridish_model->get_post_comments($post->comment_id); ?>
<div id="comments.<?php echo $post->comment_id; ?>" style="display:none"> 
   <?php include 'application/views/petridish/research/comments/desktop.php';?>
   <?php //include 'application/views/petridish/research/comments/mobile.php';?>
</div>