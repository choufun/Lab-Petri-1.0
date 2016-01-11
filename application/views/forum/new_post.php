<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
<?php echo form_open_multipart('Forum');?>
<?php echo validation_errors(); ?>

   <ul class="collapsible popout" data-collapsible="accordion">
      <li>
         <!-- HEADER
         -------------------------------------------------------------------->
         <div class="collapsible-header hoverable z-depth-0">
            <i class="material-icons">mode_edit</i> What's Your Research?
         </div>
         
         <!-- BODY
         -------------------------------------------------------------------->
         <div class="collapsible-body hoverable z-depth-5">
            <div class="container">
               <div class="row">
                  
                  <div class="input-field col s12">
                     <input name="title" type="text" class="validate">
                     <label class="blue-text" for="title"s>Title:</label>
                  </div>
                  
                  <div class="input-field col s12">
                     <textarea name="abstract" type="text" class="materialize-textarea" length="2500"></textarea>
                     <label class="blue-text" for="abstract">Abstract:</label>
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
                        <i class="material-icons right">send</i>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </li>
   </ul>
</form>
<?php } else { ?>
   <div class="card">
      <div align="center" class="card-content">
         <i class="material-icons">mode_edit</i>&nbsp;
         <span class="blue-text">Login</span> to <span class="green-text">post</span> a research project.
      </div>
   </div>
<?php } ?>
