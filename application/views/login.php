<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
   <div class = "container">
      <div class="center col s12 l6 offset-l3"> 
         <div class = "card hover">
            <div class = "card-content blue white-text">
               <h5 align="center"><strong>Login</strong></h5>
            </div>
            <div class="divider"></div>
            <div class = "card-content">
               <div class ="left-align">
                  <h6 class="red-text">
                     <?php echo validation_errors(); ?>
                     <?php echo form_open('Login'); ?> 
                  </h6>
               </div>
               <div class = "container">
                  <div class="row">
                     <i class="large material-icons">perm_identity</i>
                  </div>
                  <div class="row">
                     <div class="input-field">
                        <input name="email" type="email" class="validate">
                        <label for="email">Email</label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="input-field">
                        <input name="password" type="password" class="validate">
                        <label for="password">Password</label>
                     </div>
                  </div>
                  <div class="row"> 
                     <button class="btn waves-effect waves-light blue" type="submit" name="action">Login
                     </button>
                  </div>
               </div>
               </form>
         </div>
      </div>
   </div>
</div>
</div>