<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-----------------------------------------------------------------------------
   CONTACT VIEW
   ------------
      - Fields :
               : First Name, Middle Name, Last Name
               : Email Name
               : Subject

      function display()
               : determines the user display based on user login status

------------------------------------------------------------------------------>
<div class="divider"></div>
<h5>Contact Us</h5>
<div class="divider"></div>

	<div class="row">
		<div class="col s12">
         <div class="card green lighten-5">
			 <?php echo validation_errors(); ?>
             <?php echo form_open('Contact');?>
			 
             <div class="row">
				 <div class="input-field col s5">
					<label class="active" for ='firstname'> First Name: </label>
                 	<input type="text" name="firstname" class="validate"/>
				 </div>
                 
			 	<div class="input-field col s5">
                 	<label class="active" for ='lastname'> Last Name: </label>
                 	<input type="text" name="lastname" class="validate"/>
				 </div>
             </div>
			 
			 <div class="row">
				 <div class="input-field col s10">
					 <label class="active" for='email'> Email Address </label>
					 <input type="email" name="email" class="validate"/>
				 </div>
			</div>
			 <div class="row">
				 <div class="input-field col s10">
                 	<label class="active" for='subject'>Subject</label>
                 	<input type="text" name="subject" class="validate"/>
				 </div>
			 </div>
			 <div class="row">
				 <div class="col s10">
                 	<label class="active" for='message'> Message: </label>
					<textarea name="message"></textarea>
				 </div>
			</div>
                 <div>
                    <input type="submit" value="Send" />
                 </div>
             </form>
         </div>
      </div>
   </div>
