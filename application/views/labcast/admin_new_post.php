<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php //if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE) && ($this->session->lastname == "Admin"))
      if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE) && ($this->session->lastname == "Admin"))
      { ?>      
      <div class="divider"></div>
      <div class="card-content">
         Admin Interface
         <?php echo form_open('Labcast');?>
            <div class="input-field col s12">
               <input name="title" type="text" class="validate">
               <label class="blue-text" for="title">Title:</label>
            </div>
            <div class="input-field col s12">
               <textarea name="description" type="text" class="materialize-textarea"></textarea>
               <label class="blue-text" for="abstract">Description:</label>
            </div>
            <div class="input-field col s12">
               <input name="url" type="text" class="materialize-textarea" placeholder="Must include http://">
               <label class="blue-text" for="url">Found News URL:</label>
            </div>
            <input type="hidden" name="admin_post" value="admin_post">
            <div class="col s12 right-align">
               <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                  <i class="material-icons right">mode_edit</i>
               </button>
            </div>
         <?php echo form_close(); ?>         
      </div>
<?php } ?>