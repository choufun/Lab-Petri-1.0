<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='title'> Title: </label>                        
      <input class="black-text" type="text" name="title" value="<?php echo $post->title; ?>">
   </strong>
</div>
<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='blog'> Blog: </label>
      <textarea class="black-text materialize-textarea" name="blog" type="text"><?php echo str_replace(array("<br />","<br>","<br/>"), "\r\n", $post->blog); ?></textarea>
   </strong>
</div>
<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='quotes'> Quotes: </label>
      <textarea class="black-text materialize-textarea" name="quotes" type="text"><?php echo str_replace(array("<br />","<br>","<br/>"), "\r\n", $post->quotes); ?></textarea>
   </strong>
</div>
<input type="hidden" name="labcast" value="blog">
<input type="hidden" name="id" value="<?php echo $post->post_id; ?>">