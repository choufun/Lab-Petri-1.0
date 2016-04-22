<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
<?php echo form_open_multipart('Forum', array('id' => 'new_forum_post'));?>
<?php echo validation_errors(); ?>

   <ul class="collapsible popout" data-collapsible="accordion">
      <li>
         <!-- HEADER
         -------------------------------------------------------------------->
         <div class="collapsible-header hoverable z-depth-0">
            <i class="material-icons green-text">mode_edit</i>What's your research?
         </div>
         
         <!-- BODY
         -------------------------------------------------------------------->
         <div class="collapsible-body hoverable z-depth-5 white">
            <div class="container">
               <div class="row">
                  
                  <div class="input-field col s12">
                     <input name="title" type="text" class="validate">
                     <label class="blue-text" for="title">Title:</label>
                  </div>
                  
                  <div class="input-field col s12">
                     <textarea name="abstract" type="text" class="materialize-textarea"></textarea>
                     <label class="blue-text" for="abstract">Abstract:</label>
                  </div>
                  
                  <div class="input-field col s8">
                     <label class="blue-text" for="topic">Topic:</label><br><br>
                     <select class="browser-default" name="topic">
                        <option selected disabled>-- Please Select One --</option>
                        <?php
                           $topics = $this->forum_model->get_topics();
                           if ($topics == NULL) {;}
                           else { foreach($topics as $topic) { echo $topic; } }
                        ?>
                     </select><br>
                  </div>
                  
                  <!--
                  <div class="input-field file-field col s12 l9">
                     <div class="file-field input-field">
                        <div class="btn">
                           <span>File</span>
                           <input type="file" name="research_paper" multiple>
                        </div>
                        <div class="file-path-wrapper">
                           <input name="filepaths" class="validate" type="text">
                        </div>
                     </div>
                  </div>
                  -->
                  <input type="hidden" name="new_post" value="new_post">
                  
                  <div class="col s12 right-align">
                     <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">mode_edit</i>
                     </button>
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
         <span class="blue-text">Login</span> to <span class="green-text">post</span> a research project.
      </div>
   </div>
<?php } ?>
