<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{
?>
<div class="card-content">
   <div class="container-fluid">
      <div class="col s12 m12 l12">
         <div align="center" class="row">
            <h5 class="black-text"><strong>My Petri Dish Posts</strong></h5>
         </div>
<?php
   if ($posts !== NULL)
   {  
      foreach($posts as $post)
      {
   ?>    <a href="post?key=<?php echo $post->post_id; ?>" target="_blank">
            <div class="card z-depth-1 hoverable flow-text">      
               <div class="col s12 m12 l12">
                     <div class="card-content blue-text" style="margin: 0px 5px;">
                        <h4><small><strong><?php echo $post->title; ?></strong></small></h4>
                     </div>                     
                     <div class="divider"></div>                     
                     <div class="card-content" style="margin: 0px 5px;">
                        <div class="grey-text text-darken-1">                          
                           <h6>
                              <strong>Description</strong>
                              <span class="right black-text">
                                 <strong><?php echo $post->month." ".$post->day.", ".$post->yr; ?></strong>
                              </span>
                           </h6>
                           <h6>
                              <span class="right">
                                 <strong><span class="green-text">Topic:</span>&nbsp;<?php echo $post->topic; ?></strong>
                              </span>
                              <br>
                           </h6>
                        </div>
                        <div class="container-fluid grey-text text-darken-4">
                           <small>
                              <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $post->abstract;?></strong>
                           </small>
                        </div>
                     </div>
                     <div class="divider"></div>                     
                     <div class="card-content">
                        <div class="container-fluid">
                           <div class="row" align="center">
                              <!-- VISITS : view
                              ------------------------------------------------------------------------>
                              <div class="row col s12 m6">
                                 <button class="front btn-large grey lighten-5 grey-text text-darken-4" type="submit" name="action"
                                          style="width:100%; height:100%;">
                                    <h5><small>Edit Post</small></h5>
                                 </button>
                                 <!--
                                 <small><i class="small material-icons">pageview</i></small>
                                 <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">
                                    <span class="green-text">0</span>:&nbsp;<span class="blue-text text-darken-2">Views</span>
                                 </a>
                                 -->
                              </div>                              
                              <!-- DELETE : function
                              ------------------------------------------------------------------------>
                              <div class="row col s12 m6">
                              <?php echo form_open('labid/delete_post'); ?>                        
                                 <input type="hidden" name="post" value="<?php echo $post->post_id; ?>"/>
                                 <input type="hidden" name="comment" value="<?php echo $post->comment_id; ?>"/>
                                 <button class="front btn-large grey lighten-5 grey-text" type="submit" name="action"
                                          style="width:100%; height:100%;">
                                    <h5><small>Remove Post</small></h5>
                                 </button>          
                              <?php echo form_close(); ?>
                              </div>
                           </div>                     
                        </div>
                     </div>
               </div>
            </div>
         </a>         
      <?php
      }       
   }
   else
   { ?>
      <div class="card-content" align="center">
         <h5><small><strong>Start posting at <a href="petridish">Petri Dish</a> or <a href="labcast">Lab Cast</a>.</strong></small></h5>
      </div>         
<?php
   } ?>         
      </div>
   </div>
</div>
<?php
}
?>