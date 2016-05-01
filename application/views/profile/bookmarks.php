<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{
?>
<div class="divider"></div><div class="divider"></div>
<div class="divider"></div><div class="divider"></div>

<div class="card-content">
   <div class="container-fluid">
      <div class="col s12 m12 l12">
         <div class="row">
            <div align="center" class="row">
               <h5 class="blue-text text-darken-2">
                  <strong>Bookmarks</strong>
               </h5>
            </div>
         </div>
                
         <div class="card z-depth-1 blue darken-2"> 
            <div class="col s12 m12 l12">
               <div class="card z-depth-3" style="margin: 5px 5px;">
        
      <?php if ($bookmarks !== NULL)
            { ?>
         <?php foreach($bookmarks as $bookmark)
               { ?>
                  <a href="post?key=<?php echo $bookmark->post_id; ?>" target="_blank">
                     <div class="card-content" style="margin: 0px 5px;">
                        <h5 class="active">
                           <small>
                              <strong class="blue-text text-darken-5">
                                 <?php echo $this->profile_model->get_bookmark_title($bookmark->post_id); ?>
                              </strong>
                           </small>
                        </h5>
                     </div>
                  </a>
                     
                  <div class="divider"></div><div class="divider"></div>
                  <div class="divider"></div><div class="divider"></div>               
         <?php }
            }
            else
            { ?>
                  <h5>No Bookmarks</h5>   
      <?php } ?>      
               </div>
            </div>
         </div>
         
      </div>
   </div>
</div>
<?php
}
?>