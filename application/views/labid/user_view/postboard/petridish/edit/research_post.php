<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='title'> Title: </label>                        
      <input class="black-text" type="text" name="title" value="<?php echo $post->title; ?>">
   </strong>
</div>
<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='topic'> Topic: </label>                        
      <input class="black-text" type="text" name="topic" value="<?php echo $post->topic; ?>">
   </strong>
</div>
<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='description'> Description: </label>
      <textarea class="black-text materialize-textarea" name="description" type="text"><?php echo str_replace(array("<br />","<br>","<br/>"), "\r\n", $post->abstract); ?></textarea>
   </strong>
</div>
<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='gpa'> GPA: </label>                        
      <input class="black-text" type="text" name="gpa" value="<?php echo $post->gpa; ?>">
   </strong>
</div>
<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='major'> Major: </label>                        
      <input class="black-text" type="text" name="major" value="<?php echo $post->major; ?>">
   </strong>
</div>
<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='courses'> Courses: </label>                        
      <input class="black-text" type="text" name="courses" value="<?php echo str_replace(array("<br />","<br>","<br/>"), "\r\n", $post->courses); ?>">
   </strong>
</div>
<div class="input-field col s12">
   <strong>
      <label class="blue-text active" for ='extra'> Additional Information: </label>
      <textarea class="black-text materialize-textarea" name="extra" type="text"><?php echo str_replace(array("<br />","<br>","<br/>"), "\r\n", $post->extra); ?></textarea>
   </strong>
</div>
<input type="hidden" name="petridish" value="research">
<input type="hidden" name="id" value="<?php echo $post->post_id; ?>">