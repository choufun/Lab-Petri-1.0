<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('Labmail', array('id' => 'message_form')); ?>   

<!-- MESSAGE
---------------------------------------------------------------------->
   <div class="row flow-text">
      <div class="input-field">
         <strong>
            <input id="message" name="message" type="text" class="validate grey-text text-darken-3"
                   placeholder="Message here..." autofocus>
         </strong>
      </div>
   </div>
   <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">

<!-- SEND
---------------------------------------------------------------------->
   <div class="hide row col s12 m6 offset-m6">
      
      <div class="col s12 flow-text" align="center">
         <button class="btn-large waves-effect grey lighten-5 grey-text text-darken-3" type="button"
                 style="width:100%; height:100%;" onclick="ajax_send_messages();" id="submit_blog">
               <h5><span class="grey-text text-darken-3"><small>SEND</small></span></h5>
         </button>
      </div> 
      
   </div>
<?php echo form_close(); ?>