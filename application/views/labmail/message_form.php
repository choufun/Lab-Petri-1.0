<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('Labmail', array('id' => 'message_form')); ?>   

<!-- MESSAGE
---------------------------------------------------------------------->
   <div class="row">
      <div class="input-field">
         <input id="message" name="message" type="text" class="validate blue-text text-darken-2"
                placeholder="Reply here..." autofocus>
         <label class="green-text active" for="email">My message:</label>
      </div>
   </div>
   <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">

<!-- SEND
---------------------------------------------------------------------->
   <div class="row" align="right"> 
      <!--<button class="btn waves-effect blue darken-1" onclick="return send_message()">SEND</button>-->
      <button class="btn waves-effect blue darken-1" type="submit">SEND</button>
   </div>
<?php echo form_close(); ?>