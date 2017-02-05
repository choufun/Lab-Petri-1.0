<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card" style="margin-right:20px; margin-left: 20px;">
   <div class="card-content">
      <div class="row">
         <span id="blog_post"></span>
<?php foreach($blog as $post) { ?>       
         <a href="blogpost?key=<?php echo $post->post_id; ?>" target="_blank">
            <div class="col s12 m6">
               <div class="card hoverable">
                  <div class="card-content">
                     <div class="row" align="left">
<?php $picture = $this->labcast_model->get_profile_picture($post->user_id);
      if ($picture === NULL) { ?> <i class="large material-icons profile-image black-text">perm_identity</i> <?php } else {?><img class="responsive-img z-depth-1 profile-image" src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $picture; ?>"><?php } ?>
                     </div>
                     <div class="row blue-text truncate" align="center">
                        <h5><strong><?php echo $post->title; ?></strong></h5>
                     </div>
                     <div class="row" align="right">                        
                        <h5><small class="grey-text text-darken-1"><strong><?php echo $post->month." ".$post->day.", ".$post->yr; ?></strong></small></h5>
                     </div>
                     <div class="row" align="right">                        
                        <h5><small class="black-text truncate"><strong>"<?php echo $post->quotes; ?>"</strong></small></h5>
                     </div>
                  </div>
               </div>
            </div>
         </a>
<?php
   }
?>
      </div>
   </div>
</div>