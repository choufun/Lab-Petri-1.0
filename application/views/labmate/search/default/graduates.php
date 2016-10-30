<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
foreach ($graduates as $university=>$value)
{
   /* DEBUGGING PURPOSES:
   *************************************************************************/
   /*
   print_r($data);
   echo "<br>";
   echo "<br>";
   print_r($university);
   echo "<br>";
   echo "<br>";
   print_r($value);
   echo "<br>";
   echo "<br>";
   foreach($value as $array=>$object)
   {
      echo $object->user_id."<br>";
   }
   */
?>
<li>
   <!-- CAROUSEL HEADER
   ------------------------------------------------------------------------>
   <div class="collapsible-header blue-text text-darken-4">
      <strong><?php echo $university; ?></strong>
   </div>
   
   <!-- CAROUSEL BODY
   ------------------------------------------------------------------------>
   <div class="collapsible-body">
      <div class="row">
         <!--<ul style="margin: 0px -2px 0px 0px;">-->
         <ul>
            
<?php
/*foreach ($directory as $user_id)
{
   if ($user_id == "research" || $user_id == "pictures" ||
       $user_id == "." || $user_id == "..") { continue; }           
   else
   { */?>
<?php
foreach ($value as $array=>$object)
{
   if ($object->user_id !== $this->session->user_id)
   { ?>
            <li class="col s12 m6 l4">
               <div class="card hoverable">
                  <div class="card-content">
                     <div class="row">
                        <div class="container-fluid">
                           <div class="col s4 m4 l4">
                              <img class="responsive-img z-depth-1"
      src="users/<?php echo $object->user_id; ?>/pictures/<?php echo $this->labmate_model->get_profile_picture($object->user_id); ?>"
      id="profile-image">&nbsp;
                           </div>
                           <div class="col s8 m8 l8">
                              <div align="center">
                                 <h5><?php echo $this->labmate_model->get_user($object->user_id); ?></h5>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col s4 m4 l4 offset-s4 offset-m4 offset-l4">
                           <a class="green-text" href="/profile" target="_blank">View</a>
                        </div>
                        <div class="col s4 m4 l4">
                           <a class="green-text" href="/profile" target="_blank">Connect</a>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
<?php
         }
   /*}
}*/ ?>
<?php } ?>
         </ul>
      </div>
   </div>
</li>
<?php
} ?>