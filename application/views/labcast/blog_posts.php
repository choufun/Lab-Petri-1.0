<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
   <div class="card-content">
      <div class="row">
<?php 
   $i = 0;
   foreach($blog as $post)
   { ?>
   <?php if ($i == 0)
         { ?>
            <span id="blog_post"></span>
   <?php } ?>
         <div class="col s12 m4">
            <div class="card hoverable">
               <div class="card-content">
                  <div class="row" align="center">
<?php $picture = $this->labcast_model->get_profile_picture($post->user_id);
if ($picture === NULL) { ?>
                     <i class="large material-icons profile-image black-text">perm_identity</i>
<?php } else {?>
            <!-- IMAGE -->           
                     <img class="responsive-img z-depth-1 profile-image"
                          src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $picture; ?>">            
<?php } ?>
                  </div>
                  <div class="row blue-text" align="center">
                     <h5><strong><?php echo $post->title; ?></strong></h5>
                  </div>
                  <div class="row">
                     <h5>
                        <small>
                           <strong>"<?php echo $post->quotes; ?>"</strong>
                        </small>
                     </h5>
                  </div>
               </div>
            </div>
         </div>
<?php
    $i++;
   }
?>
      </div>
   </div>
</div>