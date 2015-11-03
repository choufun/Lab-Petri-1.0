<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- JAVASCRIPT
--------------------------------------------------------------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
   $(document).ready(function(){
      $("button.front").click(function(){
         $("#front").slideUp("slow");
         $("div.progress").fadeIn("slow");
      });
      
      $("button.back").click(function(){
         $("#back").slideUp("slow");
         $("div.progress").fadeIn("slow");
      });
   });
</script>

<!-- DEBUGGING PURPOSES
--------------------------------------------------------------------------------------------->
<center>
<?php
   //print_r($_SESSION);
   //var_dump($_SESSION);
?>
</center>

<!-- PRELOADER : BAR
--------------------------------------------------------------------------------------------->
<div class="progress green lighten-1" id="bar" style="display:none">
   <div class="indeterminate blue lighten-1"></div>
</div>

<div class="row">
   <div class = "container">

<!-- CARD
--------------------------------------------------------------------------------------------->      
      <div align="center" class="col s12 m6 l6 offset-l3">
         <div class = "card card-border">
            
<!-- HEADER LOGO
--------------------------------------------------------------------------------------------->
            <div id="header" class ="card-content blue white-text">
               <img class="logo2" src="assets/img/Logo.png">
            </div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>        

<!-- LOGIN
--------------------------------------------------------------------------------------------->
            <div id="front">
               <div class = "card-content login-border">
                  <div class = "container-fluid">
                     <?php echo validation_errors(); ?>
                     <?php echo form_open('Login'); ?>
                        <!-- EMAIL
                        ---------------------------------------------------------------------->
                        <div class="row">
                           <div class="input-field">
                              <input name="email" type="email" class="validate">
                              <label for="email">Email</label>
                           </div>
                        </div>
                        <!-- PASSWORD
                        ---------------------------------------------------------------------->
                        <div class="row">
                           <div class="input-field">
                              <input name="password" type="password" class="validate">
                              <label for="password">Password</label>
                           </div>
                        </div>
                        <input type="hidden" name="login" value="login">
                        <!-- LOGIN
                        ---------------------------------------------------------------------->
                        <div class="row"> 
                           <button class="front btn waves-effect blue darken-1" type="submit" name="action">
                              <strong>LOGIN</strong>
                           </button>
                        </div>
                     </form>
                     <!-- REGISTER LINK
                     ------------------------------------------------------------------------->
                     <div class="register_adj" align="right">
                        <a class="reg_log waves-effect" onclick="return show('back','front');">Register</a>
                     </div>
                  </div>
               </div>
            </div>

<!-- REGISTER
--------------------------------------------------------------------------------------------->         
            <div id="back" style="display:none">
               <div class = "card-content login-border">
                  <div align="center" class = "container-fluid">
                     <form method="post" accept-charset="utf-8" action="login">
                        <!-- FIRST AND LAST NAME
                        ---------------------------------------------------------------------->
                        <div class="row">
                           <div class="input-field col s6">
                              <label class="active" for ='firstname'> First Name: </label>
                              <input type="text" name="firstname">
                           </div>

                           <div class="input-field col s6">
                              <label class="active" for ='lastname'> Last Name: </label>
                              <input type="text" name="lastname">
                           </div>
                        </div>
                        <!-- EMAIL
                        ---------------------------------------------------------------------->
                        <div class="row">
                           <div class="input-field col s12">
                              <label class="active" for ='email'> Email: </label>
                              <input type="text" name="email">
                           </div>
                        </div>
                        <!-- PASSWORD
                        ---------------------------------------------------------------------->
                        <div class="row">
                           <div class="input-field col s12">
                              <label class="active" for ='email'> Password: </label>
                              <input type="password" name="password">
                           </div>
                        </div>
                        <!-- PASSWORD CONFIRMATION
                        ---------------------------------------------------------------------->
                        <div class="row">
                           <div class="input-field col s12">
                              <label class="active" for ='passwordconf'> Password Confirmation: </label>
                              <input type="password" name="passwordconf">
                           </div>
                        </div>
                        <!-- UNIVERSITY
                        ---------------------------------------------------------------------->
                        <div class="row">
                           <div class="input-field col s12">
                              <label class="active" for="university"> University: </label><br>
                              <select class="browser-default" name="university">
                                 <option selected disabled>-- Please Select One --</option>
                                 <?php echo $schools;?>
                              </select>
                           </div>
                        </div>
                        <!-- MAJOR
                        ---------------------------------------------------------------------->
                        <div class="input-field col s12">
                           <div class="row">
                              <label class="active" for="major"> Major: </label><br>
                              <select class="browser-default" name="major">
                                 <option selected disabled>-- Please Select One --</option>
                                 <?php echo $options;?>
                              </select>
                           </div>
                        </div>
                        <input type="hidden" name="register" value="register">
                        <!-- REGISTER
                        ---------------------------------------------------------------------->
                        <div class="row"> 
                           <button class="back btn waves-effect blue darken-1" type="submit" name="action">
                              <strong>REGISTER</strong>
                           </button>
                        </div>
                     </form>
                     <!-- LOGIN LINK
                     ------------------------------------------------------------------------->
                     <div class="register_adj" align="right">
                        <a class="reg_log waves-effect" onclick="return show('front','back');">Login</a>
                     </div>
                  </div>
               </div>
            </div>
<!-------------------------------------------------------------------------------------------> 
         </div>
      </div>
   </div>
</div>

<!-- JAVASCRIPT
--------------------------------------------------------------------------------------------->
<script type="text/javascript">   
   function show(current, hidden)
   {
      document.getElementById(current).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
   }
</script>