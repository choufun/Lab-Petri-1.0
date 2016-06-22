<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{
?>
<div class="divider"></div><div class="divider"></div>

<div class="card-content">
   <div class="container-fluid">
      <div class="col s12 m12 l12">
         
         <div align="center" class="row">
            <h5 class="blue-text text-darken-2">
               <strong>Post Board</strong>
            </h5>
         </div>
    
<?php
   if ($posts !== NULL)
   { ?> 
         
   <?php foreach($posts as $post)
      {
   ?>    <a href="post?key=<?php echo $post->post_id; ?>" target="_blank">
            <div class="card z-depth-1 hoverable blue darken-2">      
               <div class="col s12 m12 l12">
                  <div class="card z-depth-3" style="margin: 2px 2px;">
                     <div class="card-content" style="margin: 0px 5px;">
                        <h5>
                           <small>
                              <strong class="blue-text text-darken-5">
                                 <?php echo $post->title; ?>
                              </strong>
                           </small>
                        </h5>
                        <h6>
                           <span class="right">
                              <small class="grey-text">
                                 <?php // echo $this->forum_model->get_time($post->initial_time); ?>
                              </small>
                           </span>
                        </h6>
                     </div>

                     <div class="divider"></div><div class="divider"></div>

                     <div class="card-content" style="margin: 0px 5px;">
                        <h6 class="blue-text text-darken-5">
                           <small class="green-text">Abstract</small>
                           <span class="right black-text">
                              <small><?php echo $post->month." ".$post->day.", ".$post->yr; ?></small>
                           </span><br>
                           <span class="right">
                              <small>
                                 <span class="green-text">Topic:</span>&nbsp;
                                 <?php echo $post->topic; ?>
                              </small>
                           </span><br>
                        </h6>
                        <div class="container-fluid">
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $post->abstract; ?>
                        </div>
                     </div>

                     <div class="divider"></div><div class="divider"></div>
                     
                     <div class="card-content">
                        <div class="container-fluid">
                           <div class="row" align="center">

                              <!-- VISITS : VIEW
                              ------------------------------------------------------------------------>
                              <div class="col s4 m4 l4 blue-text">
                                 <small><i class="small material-icons">pageview</i></small>
                                 <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">
                                    <span class="green-text">0</span>:&nbsp;<span class="blue-text text-darken-2">Views</span>
                                 </a>
                              </div>   

                              <!-- BOOKMARK : FUNCTION
                              ------------------------------------------------------------------------>
                              <div class="col s4 m4 l4 blue-text">
                                 <small><i class="small material-icons">library_add</i></small>
                                 <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">
                                    <span class="blue-text text-darken-2">Bookmark</span>
                                 </a>
                              </div>               
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
      <h5>No Posts</h5>   
<?php
   } ?>
         
      </div>
   </div>
</div>
<?php
}
?>