<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
/* DELETE LINK
***********************************************************************************/   
   function delete_link()
   {
      var size = document.getElementsByTagName("a").length - 1;
      var element = document.getElementsByTagName("a")[size];
      document.write(
         "<form method='post' accept-charset='utf-8' action='profile/delete'>\
            <button class='_link light-blue-text' type='submit' name='action' value='"+element+"'>\
               Delete\
            </button>\
         </form>"
      );
   }    
/**********************************************************************************/
</script>
<div class="container-fluid">
   <div class="row">
      <div>
         <center>
            <?php
               //print_r($_SESSION);
               //var_dump($_SESSION);
            ?>
         </center>
      </div>
   </div>
   <div class="container">
      <div class="card">
         <div class="blue white-text">
            <div class="profile">
               <center>
                  <img class="image" src="assets/profile_pic/profile.jpg" alt="Profile Picture">
               </center>
            </div>
            <span class="title">
               <h3 align="center" class="name">
                  <strong>
                     <?php echo $this->session->firstname." ".$this->session->lastname;?>
                  </strong>
               </h3>
            </span>
            <div class="divider"></div><div class="divider"></div>
            <div class="divider"></div><div class="divider"></div>
         </div>
         <div class="content">
            <h4 align="center" class="index-content">
               <ul id="slide-out" class="side-nav">
                  <li>
                     <a class="modal-trigger" href="#modal1">
                        Profile Picture
                     </a>
                  </li>
<!-- Modal Structure
----------------------------------------------------------------------------------->
                  <div id="modal1" class="modal">
                     <div class="modal-content">
                        <div align="right">
                        <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat">
                           x
                        </a>
                        </div>
                        <h4>Upload Profile Picture</h4>
                        <div class="divider"></div>
                        <div class="divider"></div>
                        <div class="index-content container-fluid">
                           <?php echo $error;?>
                           <?php echo form_open_multipart('profile/do_upload_pic');?>
                              <input type="file" name="userfile"/>
                              <input type="submit" value="Upload"/>
                           </form>
                        </div>
                     </div>
                  </div>
<!--------------------------------------------------------------------------------->
               </ul>
               <a href="#" data-activates="slide-out" class="button-collapse show-on-large">
                  <i class="blue-text small material-icons">settings</i>
               </a>
<!-- ACCOUNT INFORMATION
----------------------------------------------------------------------------------->
               <strong>Account Information:</strong>
            </h4>
            <div class="account_info">
               <h5><strong>University: </strong><small><?php echo $university;?></small></h5>
               <h5><strong>Major: </strong><small><?php echo $major;?></small></h5>
               <h5><strong>Email: </strong><small><?php echo $this->session->email;?></small></h5>
            </div>
         </div>
         <div class="divider"></div><div class="divider"></div>
         <div class="divider"></div><div class="divider"></div>
            
<!-- RESEARCH PORTFOLIO
----------------------------------------------------------------------------------->
         <h4 align="center" class="index-content">
            <strong>Research Portfolio:</strong>
         </h4>
         <div class="action col s12 m6">
            <?php echo $files; ?>
            <div class="index-content">
               <?php echo $error;?>
               <?php echo form_open_multipart('profile/do_upload');?>
                  <input type="file" name="userfile"/>
                  <input type="submit" value="Upload"/>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>