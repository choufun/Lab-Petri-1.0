<?php defined('BASEPATH') OR exit('No direct script access allowed');
if ($questions === NULL) {
    echo "";
} else {
   foreach($questions as $post) { ?>
      <div id="post_show_<?php echo $post->question_id; ?>">
         <div class="card z-depth-2 hoverable hide-on-med-and-down">
            <div class="card-content">
                <div class="row">
                    <div class="col s9">
                        <h4 class="blue-text text-darken-5"><strong><?php echo $post->question.'<br>'; ?></strong></h4>
                    </div>
                    <div class="col s3" align="right">
                       <?php echo $post->year.'.'.$post->month.'.'.$post->day.'<br>'; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <span class="green-text">Topic:</span>&nbsp;<strong><?php echo $post->topic.'<br>'; ?></strong>
                    </div>
                </div>
            </div>
         </div>
      </div>
<?php
   }
} ?>