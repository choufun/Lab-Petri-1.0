<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
   <div class="row">
      <div class="responsive">
<?php
foreach ($directory as $user_id)
{
   if ($user_id == "research" || $user_id == "pictures" ||
       $user_id == "." || $user_id == "..") { continue; }           
   else
   { ?>
         <div class="card col s4 m4 l4">
            <div class="card-content">
               <div class="row">
                  <div class="container-fluid">
                     <div class="col s4 m4 l4">
                        <img class="responsive-img z-depth-1"
src="files/profile_picture/<?php echo $this->connections_model->get_profile_picture($user_id); ?>"
id="profile-image">&nbsp;
                     </div>
                     <div class="col s8 m8 l8">
                        <div align="center">
                           <h5><?php echo $this->connections_model->get_user($user_id); ?></h5>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col s4 m4 l4">
                     <a class="green-text" href="/profile" target="_blank">Prospect</a>
                  </div>
                  <div class="col s4 m4 l4">
                     <a class="green-text" href="/profile" target="_blank">Contact</a>
                  </div>
                  <div class="col s4 m4 l4">
                     <a class="green-text" href="/profile" target="_blank">Associate</a>
                  </div>
               </div>
            </div>
         </div>
<?php
   }
} ?>
      </div>
   </div>
</div>