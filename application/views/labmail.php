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

<script>
   /* AJAX :: posting blog
****************************************************************************/   
   function ajax_send_messages(){
      $.ajax({
         url: "<?php echo base_url().'labmail/send_messages'; ?>",
         type: "POST",
         cache: false,
         data: $('#message_form').serialize(),
         success: function(html)
         {
            $('#new_messages').append(html);
         },
         error: function(XMLHttpRequest, status, errorThrown)
         {
            alert("STATUS: " + status + "Error: " + errorThrown);
         },
      });
   }
</script>

<?php
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
<div class="container-fluid">
   <div class="card">
   
<!-- MESSAGES
----------------------------------------------------------------------->
      <div class="row">
         <div class="row col s12 m9 l9">
            <div class="card-content flow-text grey-text text-darken-3">
            <?php if ($this->input->get('id') !== NULL) { ?>
               <h5>My Messages:<a href="labmail"><span style="font-size: 14px;">&nbsp;&nbsp;&nbsp;Back to Inbox</span></a></h5>
            <?php } else { ?> <h5>My Inbox:</h5> <?php } ?>
            </div>
            <div class="divider"></div>
            <div class="card-content" id="messages">
               
<!-- PREVIOUS MESSAGES
----------------------------------------------------------------------->
               <?php include 'application/views/labmail/messages.php';?>
            </div>   
         </div>
   
<!-- FRIENDS LIST
----------------------------------------------------------------------->
         <div class="row col s12 m3 l3">
            <div class="card-content"><h5>Connections:</h5></div>
            <div class="divider"></div>
            <div class="card-content container-fluid" id="friends">
               <?php include 'application/views/labmail/friends_list.php';?>
            </div>     
         </div>
      </div>
   
<!-- MESSAGE FORM
----------------------------------------------------------------------->
<?php if ($this->input->get('id') !== NULL) {
      $this->labmail_model->unset_message_notification(); ?>
      <div class="row">
         <div class="col s12 m10 offset-m1">
            <?php include 'application/views/labmail/message_form.php';?>
         </div>
      </div>
   </div>
</div>
<?php
   }
}
else { redirect(''); } ?>

<script type="text/javascript">
  
   // SCROLLS MESSAGES DOWN
   $(document).ready(function()
   {
      $('#messages').animate({
      scrollTop: $('#messages').get(0).scrollHeight}, 10);
   });
   
</script>