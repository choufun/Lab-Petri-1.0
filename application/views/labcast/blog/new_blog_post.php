<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php //echo base_url();?>
<div class="container-fluid" style="margin: 0px 40px;">
<?php //if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE) && ($this->session->lastname == "Admin"))
   if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
   <?php echo form_open('Labcast', array('id' => 'form'));?>
      <ul class="collapsible popout" data-collapsible="accordion" id="post_blog">
         <li>
            <div class="collapsible-header hoverable z-depth-0">
               <h5 class="grey-text text-darken-2 hide-on-med-and-down"><small><i class="material-icons blue-grey-text">mode_edit</i>Write a Blog Post.</small></h5>
               <h6 class="grey-text text-darken-2 hide-on-large-only"><small><i class="material-icons blue-grey-text">mode_edit</i>Write a Blog Post.</small></h6>
            </div>            
            <div class="collapsible-body hoverable z-depth-5 white">
               <div class="row">                        
                  <div class="input-field col s12">
                     <input name="title" type="text" class="validate">
                     <label class="blue-text" for="title">Title:</label>
                  </div>         
                  <div class="input-field col s12">
                     <input name="quotes" type="text" class="validate">
                     <label class="blue-text" for="quotes">Quotes:</label>
                  </div>         
                  <div class="input-field col s12">
                     <textarea name="blog" type="text" class="materialize-textarea"></textarea>
                     <label class="blue-text" for="blog">Blog:</label>
                  </div>               
                  <input type="hidden" name="new_blog_post" value="new_blog_post">                   
                  <!-- NORMAL POST SUBMISSION -->
                  <!--
                  <div class="col s12 flow-text" align="center">
                     <button class="btn-large waves-effect grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                             style="width:100%; height:100%;">
                     Submit
                     </button>
                  </div>                        
                  -->
                  
                  <!-- AJAX SUBMISSION -->
                  <div class="col s12 flow-text" align="center">
                     <button class="btn-large waves-effect grey lighten-5 grey-text text-darken-3" type="button" name="action"
                             style="width:100%; height:100%;" onclick="ajax();" id="submit_blog">
                        Submit
                     </button>
                  </div> 
                  
               </div>
            </div>
         </li>
      </ul>
   <?php echo form_close(); ?>
<?php } ?>
</div>