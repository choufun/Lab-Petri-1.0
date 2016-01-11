<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   #profile-image
   {
      border-radius: 50%;
      border: 3px solid white;
      width: 75px;
      height: 75px;
   }
</style>

<?php
foreach($posts as $row) {
?>
<div class="row">
   <div class="col s10 m10 l10">
      <div class="card z-depth-2">
         <div class="card-content">
            <h5>
               <img class="responsive-img z-depth-1"
                    src="files/profile_picture/<?php echo $this->forum_model->get_profile_picture($row->user_id); ?>"
                    id="profile-image">
               &nbsp;&nbsp;<strong><?php echo $row->title; ?></strong>
            </h5>
         </div>

         <div class="divider"></div><div class="divider"></div>
         <div class="divider"></div><div class="divider"></div>

         <div class="card-content">
            <?php echo $row->abstract; ?>
         </div>
      </div>
   </div>
   <div class="col s2 m2 l2">
      <div class="card z-depth-2">
         <div class="card-content">
            <div class="container">
            <p>View</p>
            <p>Comment</p>
            <p>Seen: x</p>
            </div>
         </div>
      </div>
   </div>
</div>
<?php } ?>
