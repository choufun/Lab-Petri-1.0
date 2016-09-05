<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
<?php echo form_open_multipart('Petridish', array('id' => 'new_forum_post'));?>
<?php echo validation_errors(); ?>

   <ul class="collapsible popout" data-collapsible="accordion">
      <li>
         <!-- HEADER
         -------------------------------------------------------------------->
         <div class="collapsible-header hoverable z-depth-0">
            <h5 class="grey-text text-darken-2 hide-on-med-and-down"><small><i class="material-icons blue-grey-text">mode_edit</i>Post and share your research.</small></h5>
            <h6 class="grey-text text-darken-2 hide-on-large-only"><small><i class="material-icons blue-grey-text">mode_edit</i>Post and share your research.</small></h6>
         </div>
         
         <!-- BODY
         -------------------------------------------------------------------->
         <div class="collapsible-body hoverable z-depth-5 white">
            <div class="container-fluid" style="padding: 0px 40px;">                     
               
               <div class="row">                                       
                  
                  <div class="input-field col s12">
                     <input name="title" type="text" class="validate">
                     <label class="blue-text" for="title"><strong>Title:</strong></label>
                  </div>   
                  
                  <div class="input-field col s12">
                     <input name="topic" type="text" class="validate">
                     <label class="blue-text" for="topic"><strong>Topic:</strong></label>
                  </div>  
                                  
                  <div class="input-field col s12">
                     <textarea name="abstract" type="text" class="materialize-textarea"></textarea>
                     <label class="blue-text" for="abstract"><strong>Description:</strong></label>
                  </div>                 
                  
                  <div class="input-field col s12 m6">
                     <label class="blue-text" for="gpa"><strong>GPA:</strong></label><br><br>
                     <select class="browser-default" name="gpa">
                        <option selected disabled>-- Please Select One --</option>
                        <?php
                           $gpa = $this->petridish_model->get_gpas();
                           if ($gpa == NULL) {;}
                           else { foreach($gpa as $point) { echo $point; } }
                        ?>
                     </select><br>
                  </div>
                  
                  <div class="input-field col s12 m6">
                     <label class="blue-text" for="major"><strong>Major:</strong></label><br><br>
                     <select class="browser-default" name="major">
                        <option selected disabled>-- Please Select One --</option>
                        <?php
                           $topics = $this->petridish_model->get_topics();
                           if ($topics == NULL) {;}
                           else { foreach($topics as $topic) { echo $topic; } }
                        ?>
                     </select><br>
                  </div>
                  
                  <div class="input-field col s12">
                     <!--<textarea name="courses" type="text" class="materialize-textarea"></textarea>
                     <label class="blue-text" for="courses"><strong>Courses (required): [please use , to separate courses]</strong></label>-->
                     <textarea name="courses" type="text" class="materialize-textarea" placeholder="Please separate the courses by ,"></textarea>
                     <label class="blue-text" for="courses"><strong>Courses (required):</strong></label>
                                        
                  </div>
                  
                  <div class="input-field col s12">
                     <textarea name="extra" type="text" class="materialize-textarea"></textarea>
                     <label class="blue-text" for="extra"><strong>Additional Information:</strong></label>
                  </div>
                  
                  <!--
                  <div class="file-field input-field col s8">
                     <div><span class="blue-text">File:</span><input type="file" name="post_file"></div>                     
                     <div class="file-path-wrapper green-text"><input class="file-path validate" type="text"></div>
                  </div>
                  -->
                  <input type="hidden" name="new_post" value="new_post">
                  <input type="hidden" name="research" value="research">      
                  <div class="col s12 flow-text" align="center">
                     <button class="btn-large waves-effect grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                             style="width:100%; height:100%;">
                        Submit</button>
                  </div>
                  
               </div>
               
            </div>
         </div>
      </li>
   </ul>
<?php echo form_close(); ?>
<?php } else { ?>
   <div class="card">
      <div align="center" class="card-content">
         <i class="material-icons">mode_edit</i>&nbsp;
         <span class="blue-text">Login</span> to <span class="green-text">post</span> a research.
      </div>
   </div>
<?php } ?>