<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $post = $this->post_model->get_post($_GET['key']); ?>
<?php $comments = $this->post_model->get_comments($post->comment_id); ?>

<div class="container col s12 m12 l12">
   <div class="card">
      <div align="center">
         <h4><?php echo $post->title; ?></h4>
      </div>
      
      <div>
         <?php echo $post->topic; ?>
      </div>
      
      <div>
         <p><?php echo $post->abstract; ?></p>
      </div>
      
   </div>
   
   <?php foreach ($comments as $comment)
   { ?>
      <div class="card col s4 m4 l4">
         <p><?php echo $comment->comments; ?></p>
      </div>
   <?php } ?>

</div>