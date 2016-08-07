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
   
<!-- MESSAGES
----------------------------------------------------------------------->
   <div class="row">
      <div class="col s12 m9 l9">
         <div class="card">
            <div class="card-content">
<?php if ($this->input->get('id') !== NULL) { ?>
               <h5>My Messages:</h5>
<?php } 
      else
      { ?>
               <h5>My Mail:</h5>
    <?php } ?>
            </div>
            <div class="divider"></div>
            <div class="card-content" id="messages">   
               
<!-- PREVIOUS MESSAGES
----------------------------------------------------------------------->
               <?php include 'application/views/labmail/messages.php';?>
               
<!-- NEW MESSAGES
----------------------------------------------------------------------->
               <div id="new_messages"></div>
            </div>
         </div>      
      </div>   
   
<!-- FRIENDS LIST
----------------------------------------------------------------------->
      <div class="col s12 m3 l3">
         <div class="card">
            <div class="card-content">
               <h5>Connections:</h5>
            </div>
            <div class="divider"></div>
            <div class="card-content" id="friends">
               <div class="container-fluid">
                  <?php include 'application/views/labmail/friend_list.php';?>
               </div>
            </div>
         </div>         
      </div>
   </div>
   
<!-- MESSAGE FORM
----------------------------------------------------------------------->
<?php
   if ($this->input->get('id') !== NULL) { ?>
   <div class="row">
      <div class="col s8 m8 l8 offset-s2 offset-m2 offset-l2">
         <?php include 'application/views/labmail/message_form.php';?>
      </div>
   </div>
</div>
<?php
   }
}
 else { redirect(''); } ?>

<script type="text/javascript">
<?php /*
if ($this->input->get('id') !== NULL) { ?>
   $(document).ready(function(){
      setTimeout(function(){
         window.location.reload(1);
      }, 50000);
   });
<?php }
*/ ?>
  
   // SCROLLS MESSAGES DOWN
   $(document).ready(function()
   {
      $('#messages').animate({
      scrollTop: $('#messages').get(0).scrollHeight}, 10);
   });
   
   // SEND MESSAGE
   function send_message()
   {
      var site_url = "<?php echo site_url('labmail/ajax'); ?>";
      $("#new_messages").load(site_url, $("#message_form").serializeArray());
      return false;
   }
   
/*
   $(document).ready(function()
   {
      $("#submit").click(function(){
         $.post(
            'https://wwww.labpetri.org/labmail/ajax',
            $("#form").serializeArray(),
            function(resp)
            {
               $("#new_messages").append(resp);
            }
         );
      });
   });
*/   
   
</script>