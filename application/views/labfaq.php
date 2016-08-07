<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
::-webkit-input-placeholder
{
   color: #000000;
   font-weight: bold;
}
:-moz-placeholder
{ /* older Firefox*/
   color: #000000;
   font-weight: bold;
}
::-moz-placeholder
{ /* Firefox 19+ */ 
   color: #000000;
   font-weight: bold;
} 
:-ms-input-placeholder
{ 
   color: #000000;
   font-weight: bold;
}
</style>
<?php
if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE))
{
?>
<!-- START CONTAINER
---------------------------------------------------------------------------->
<div>

<!-- LABFAQ :: tabs
---------------------------------------------------------------------------->
   <div class="row">
      <div class="col s12">
         <ul class="tabs">

<!-- TAB :: how to do's
---------------------------------------------------------------------------->
            <li class="tab col s4">
               <a href="#hd-container" class="black-text"><strong>Tutorials</strong></a>
            </li>
            
<!-- TAB :: manual
---------------------------------------------------------------------------->
            <li class="tab col s4">
               <a href="#man-container" class="active black-text"><strong>Manual</strong></a>
            </li>
            
<!-- TAB :: q and a's
---------------------------------------------------------------------------->
            <li class="tab col s4">
               <a href="#qa-container" class="black-text"><strong>Q and A's</strong></a>
            </li>
            
         </ul>
      </div>
   </div>

<!-- HD-CONTAINER :: how to do's
---------------------------------------------------------------------------->
   <div id="hd-container" class="container">
      <div class="card">
         <?php include 'application/views/labfaq/how_to_dos.php'; ?>    
      </div>
   </div>
   
<!-- MAN-CONTAINER :: manual
---------------------------------------------------------------------------->
   <div id="man-container" class="container">
      <div class="card">
         <?php include 'application/views/labfaq/manual.php'; ?>    
      </div>
   </div>
   
<!-- QA-CONTAINER :: q and a's
---------------------------------------------------------------------------->
   <div id="qa-container" class="container">
      <div class="card">
         <h4 align="center" class="blue-text text-darken-3 flow-text">
            <strong>Submit Your Question Here</strong>
         </h4>
         <div class="card-content">      
            <?php echo form_open('Labfaq'); ?>

            <div class="row">
               <div class="input-field col s6">
                  <label class="green-text active" for ='firstname'> First Name: </label>
                  <input class="blue-text text-darken-2" type="text" name="firstname">
               </div>

               <div class="input-field col s6">
                  <label class="green-text active" for ='lastname'> Last Name: </label>
                  <input class="blue-text text-darken-2" type="text" name="lastname">
               </div>
            </div>

            <div class="row">
               <div class="input-field col s12">
                  <label class="green-text active" for ='email'> Email: </label>
                  <input class="blue-text text-darken-2" type="email" name="email">
               </div>
            </div>

            <div class="row">
               <div class="input-field col s12"> 
                  <?php
                  /*
                     $data_textarea = array(
                        'name' => 'textarea',
                        'rows' => 150,
                        'cols' => 50,
                        'placeholder' => "Write your message here...",
                     );
                     echo form_textarea($data_textarea);
                  */
                  ?>
                  <strong><textarea
                            name="issue",
                            style="height:200px; width:100%; resize:none;"
                            class="blue-text"
                            placeholder="Describe your issue here..."></textarea></strong>
               </div>
            </div>

            <div class="row" align="right"> 
               <button class="back btn waves-effect blue darken-1" type="submit" name="action">
                  <strong>SUBMIT</strong>
               </button>
            </div>

            <?php echo form_close(); ?>
         </div>
      </div>
   </div>

<!-- END CONTAINER
---------------------------------------------------------------------------->
</div>
<?php
}
else
{
   redirect('');
}
?>