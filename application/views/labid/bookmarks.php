<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{
?>
<div class="divider"></div>
<div class="card-content">
   <div class="container-fluid">
      <div class="col s12 m12 l12">
         <div class="row">
            <div align="center" class="row">
               <h5 class="blue-text text-darken-2">
                  <strong>My Bookmarks</strong>
               </h5>
            </div>
         </div>                
         <div class="card z-depth-1 blue darken-2"> 
            <div class="col s12 m12 l12">
               <div class="card z-depth-3" style="margin: 1px 1px;">        
      <?php if ($bookmarks !== NULL)
            { ?>
         <?php foreach($bookmarks as $bookmark)
               { ?>                  
                  <a href="post?key=<?php echo $bookmark->post_id; ?>" target="_blank">
                     <div class="card-content" style="margin: 0px 5px;">
                        <h5 class="active">
                           <small>
                              <strong class="blue-text text-darken-5">
                                 <?php echo $this->labid_model->get_bookmark_title($bookmark->post_id); ?>
                              </strong>
                           </small>
                        </h5>
                  <?php if ($this->session->user_id == $bookmark->user_id)
                        { ?>
                           <div align="right">                        
                        <?php echo form_open('profile/delete_bookmark'); ?>
                              <input type="hidden" name="bookmark" value="<?php echo $bookmark->bookmark_id; ?>"/>
                              <button class="front btn waves-effect blue darken-1" type="submit" name="action">
                                 <strong>Remove</strong>
                              </button>                        
                        <?php echo form_close(); ?>
                          </div>
                  <?php }  ?>
                     </div>
                  </a>                  
            <?php if ($bookmark !== end($bookmarks)) { ?> <div class="divider"></div> <?php } ?>
         <?php }
            }
            else
            { ?>
                  <h5>Bookmark Posts at Petri Dish</h5>   
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