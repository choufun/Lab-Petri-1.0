<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>   
   h1, h2, h3, h4, h5, h6 { display: inline; }
   
   .summary-container
   {
      margin: 0px 35px;
   }
   
   .description-container
   {
      margin: 0px 20px;
   }
   
   .post-container
   {
      padding: -20px 0px;
   }
   
   .profile-image
   {
      border-radius: 50%;
      width: 100px;
      height: 100px;
   }
   
   .mobile-profile-image
   {
      border-radius: 50%;
      width: 75px;
      height: 75px;
   }
</style>

<div class="container-fluid flow-text" style="padding: 0px 40px;">
<?php
foreach($posts as $post)
{
?>
   <div class="post-container">      
      <a href="post?key=<?php echo $post->post_id; ?>" target="_blank">         
         <div class="card z-depth-1 hoverable">            
            <!-- TOP SECTION
                 DESKTOP | LAPTOP
            ----------------------------------------------------->
            <div class="card-content hide-on-med-and-down" style="margin: 0px 5px;">
               <!-- IMAGE -->
               <img class="responsive-img z-depth-1 profile-image"
                    src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $this->forum_model->get_profile_picture($post->user_id); ?>">
               <!-- TITLE -->
               <h4 class="blue-text text-darken-5">
                  &nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $post->title; ?></strong>
               </h4>
               <!-- DATE & TIME -->
               <h6 class="grey-text text-darken-2">&nbsp;&nbsp;Steven Chou posted on           
                  <?php echo $post->month." ".$post->day.", ".$post->yr; ?>&nbsp;at&nbsp;<?php echo $this->forum_model->get_time($post->initial_time); ?>.
               </h6>
               <h6 class="grey-text text-darken-2 right">
                  <?php echo $this->forum_model->get_num_views($post->post_id); ?>&nbsp;:&nbsp;Views
               </h6>
            </div>
            <!-- TOP SECTION
                 MOBILE
            ----------------------------------------------------->
            <div class="card-content hide-on-med-and-up">
               <div class="row" align="center">                  
                  <!-- IMAGE-->
                  <div class="col s12 m12 l12">
                     <img class="responsive-img z-depth-1 profile-image"
                          src="users/<?php echo $post->user_id; ?>/pictures/<?php echo $this->forum_model->get_profile_picture($post->user_id); ?>">
                  </div>
                  <div class="col s12 m12 l12">
                     <!-- TITLE -->
                     <h4 class="blue-text text-darken-5"><strong><?php echo $post->title; ?></strong></h4>
                     <br>
                     <h6 class="grey-text text-darken-2">
                        <?php echo $this->forum_model->get_num_views($post->post_id); ?>&nbsp;:&nbsp;Views
                     </h6>
                  </div>
                  <div class="col s12 m12 l12">
                     <!-- DATE & TIME -->
                     <h6 class="grey-text text-darken-2">
                        <small>
                           Steven Chou posted on           
                           <?php echo $post->month." ".$post->day.", ".$post->yr; ?>&nbsp;at&nbsp;<?php echo $this->forum_model->get_time($post->initial_time); ?>.
                        </small>
                     </h6>
                  </div>
               </div>
            </div>
            <div class="divider"></div>
            <!-- MID SECTION
                 DESKTOP | LAPTOP
            ----------------------------------------------------->
            <div class="card-content summary-container hide-on-med-and-down">
               <h6 class="blue-text text-darken-5">
                  <span class="green-text left">Description:</span>
                  <span class="right">
                     <span class="green-text">Topic:</span>&nbsp;
                     <span class="grey-text text-darken-2">
                        <?php echo $post->topic; ?>
                     </span>
                  </span>
                  <br>
               </h6>
               <div class="container-fluid">
                  <div class="desciption-container">
                     <h5 class="grey-text text-darken-2">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><?php echo $post->abstract; ?></small>
                     </h5>
                  </div>
               </div>
            </div>
            <!-- MID SECTION
                 MOBILE
            ----------------------------------------------------->
            <div class="card-content hide-on-med-and-up">
               <div class="row container-fluid">
                  <div class="col s12 m12 l12">
                     <h6 class="blue-text text-darken-5">
                        <span class="green-text left">Description:</span>
                        <span class="right">
                           <span class="green-text">Topic:</span>&nbsp;
                           <span class="grey-text text-darken-2">
                              <?php echo $post->topic; ?>
                           </span>
                        </span>
                        <br>
                     </h6>
                  </div>
                  <div class="col s12 m12 l12">
                     <h6 class="grey-text text-darken-2">
                        <?php echo $post->abstract; ?>
                     </h6>
                  </div>
               </div>
            </div>
<?php 
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{ ?>        <div class="divider"></div>            
            <!-- BOTTOM SECTION
                 DESKTOP | LAPTOP
            ----------------------------------------------------->
            <div class="card-content hide-on-med-and-down">
               <div class="container-fluid">
                  <div class="row" align="center">
                     <!-- BOOKMARK : FUNCTION -->
                     <div class="col s6 m6 l6">
                        <small class="grey-text text-darken-2">
                           <i class="small material-icons">add</i>
                        </small>
                        <a href="forum/add_bookmark?id=<?php echo $post->post_id; ?>">
                           <h5>
                              <small><span class="grey-text text-darken-1">Bookmark</span></small>
                           </h5>
                        </a>
                     </div>
                     <!-- COMMENTS : FUNCTION -->
                     <div class="col s6 m6 l6">
                        <small class="grey-text text-darken-2">
                           <i class="small material-icons">comment</i>
                        </small>
                        <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">
                           <h5>                              
                              <span class="grey-text text-darken-2">
                                 <small>
                                    <?php echo $this->forum_model->get_num_comments($post->comment_id); ?>
                                    :&nbsp;Comments
                                 </small>
                              </span>
                           </h5>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- BOTTOM SECTION
                 MOBILE
            ----------------------------------------------------->
            <div class="card-content hide-on-med-and-up">
               <div class="container-fluid">
                  <div class="row" align="center">                     
                     <!-- BOOKMARK : FUNCTION -->
                     <div class="col s6 m6 l6">
                        <h6 class="grey-text text-darken-2">
                           <i class="small material-icons">add</i>
                           <a href="forum/add_bookmark?id=<?php echo $post->post_id; ?>">           
                              Bookmark
                           </a>
                        </h6>
                     </div>
                     <!-- COMMENTS : FUNCTION -->
                     <div class="col s6 m6 l6">
                        <h6 class="grey-text text-darken-2">
                           <i class="small material-icons">comment</i>
                           <a onclick="return toggle('comments.<?php echo $post->comment_id; ?>');">                              
                              <?php echo $this->forum_model->get_num_comments($post->comment_id); ?>
                              :&nbsp;Comments
                           </a>
                        </h6>
                     </div>
                  </div>
               </div>
            </div>
   <?php
   } ?> </div>
      </a>
   </div>
<!-- COMMENTS -->
<?php include 'application/views/forum/comments.php';?>
<?php 
}
?>
</div>