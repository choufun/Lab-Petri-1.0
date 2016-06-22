<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   ::-webkit-input-placeholder { color: black; }
   :-moz-placeholder { /* Firefox 18- */ color: black; }
   ::-moz-placeholder {  /* Firefox 19+ */ color: black; }
   :-ms-input-placeholder { color: black; }
 /*-------------------------------------------------------------------*/
   #messages
   {
      overflow-y: auto;
      width: auto;
      height: 250px;
   }
   
   #friends
   {
      overflow-y: auto;
      width: auto;
      height: 250px;
   }   
</style>

<?php
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{ ?>
<div class="container-fluid">
   <!-- AJAX PURPOSES -->
   <!--
   <div class="row">   
      <div id='result'>         
      </div>
   </div>
   -->
   
  <!--MESSAGE BOX
----------------------------------------------------------------------->
   <div class="row">
      <div class="col s12 m9 l9">
         <div class="card">
            <div class="card-content">
               <h5>Messages:</h5>
            </div>
            <div class="divider"></div>
            <div class="card-content" id="messages">               
   <?php //echo $messages;
      if ($messages !== NULL)
      {
         foreach($messages as $message)
         { ?> 
               <div class="row">
               <?php if ($message->user_id !== $this->session->user_id)
               { ?>
                  <div class="col s6 m6 l6" align="left">
                     <?php echo $message->message; ?>
                  </div>
         <?php }
               else
               { ?>
                  <div class="col s6 m6 l6 offset-s6 offset-m6 offset-l6" align="right">
                     <?php echo $message->message; ?>
                  </div>
         <?php } ?>               
               </div>
<?php    }
      }
      else
      { ?>
               <div class="row">
                  <h6>
                     Select a friend to start messaging.
                  </h6>
               </div>
<?php } ?>               
            </div>
         </div>      
      </div>   
   
      <!--FRIENDS BOX
      ----------------------------------------------------------------------->
      <div class="col s12 m3 l3">
         <div class="card">
            <div class="card-content">
               <h5>Friends:</h5>
            </div>
            <div class="divider"></div>
            <div class="card-content" id="friends">
               <div class="container-fluid">
   <?php
      if ($friends !== NULL)
      {
         foreach($friends as $friend)
         { ?>
                  <?php //echo $friend->friend_id; ?>
                  <a href="message?id=<?php echo $friend->friend_id;?>">
                     <div class="card z-depth-1 hoverable">
                        <div class="card-content">
                           <?php echo $this->message_model->get_name($friend->friend_id); ?>
                        </div>
                     </div>
                  </a>
   <?php }
      }
      else
      { ?>
                  <h6>
                     Search and start building connections <a href="connections">here</a>.
                  </h6>
   <?php 
      } ?>
               </div>
            </div>
         </div>         
      </div>
   </div>
<?php
   if ($this->input->get('id') !== NULL)
   { ?>
   <div class="row">
      <div class="col s8 m8 l8 offset-s2 offset-m2 offset-l2">
         <?php echo form_open('Message', array('id' => 'form')); ?>   
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
               <!--<button class="front btn waves-effect blue darken-1" type="submit" id="send">-->
               <button class="front btn waves-effect blue darken-1" onclick="return send();" id="send">
                  <strong>SEND</strong>
               </button>
            </div>         
         <?php echo form_close(); ?>
      </div>
   </div>
</div>
<?php
   } ?>
<?php
}
else
{
   redirect('');
}
?>

<script type="text/javascript">
   <?php
if ($this->input->get('id') !== NULL) { ?>
   $(document).ready(function(){
      setTimeout(function(){
         window.location.reload(1);
      }, 50000);
   });
<?php } ?>
  
   $(document).ready(function(){
      $('#messages').animate({
      scrollTop: $('#messages').get(0).scrollHeight}, 10);
   });
/*
   function send()
   {
      $.ajax({
         type: "POST",
         url: "message/sends_message",
         cache: false,
         data: $('#form').serialize(),
         success: function(json)
         {
            var obj = jQuery.parseJSON(json);
            alert(obj['MESSAGE']);
            $('#result').html(obj['MESSAGE']);
         }
      });
      return false;
   }
   
   $(document).ready(function()
   {      
      $("#send").click(function()
      {       
         $.ajax({
            type: "POST",
            url: "message/sends_message",
            data: $('#form').serialize(),
            //data: {message: $("#message").val()},
            dataType: "html",
            cache: false,
            success: function(data)
            {   
               alert(data);
               $('#messages').html(data);
            }
         });
         return false;
      });
   });
*/
</script>