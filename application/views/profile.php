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
      <div class="card card-border">
         
<!-- PROFILE HEADER
----------------------------------------------------------------------------------->
         <div class="blue white-text">
            <div class="profile">
               <center>
                  <!-- <img class="image" src="assets/profile_pic/profile.jpg" alt="Profile Picture"> -->
                  <img class="image" src="files/profile_picture/<?php echo $profile_picture; ?>"
                       alt="Profile Picture">
               </center>
            </div>
            <div>
               <span class="title">
                  <h3 align="center" class="name">
                     <strong>
                        <?php echo $this->session->firstname." ".$this->session->lastname;?>
                     </strong>
                  </h3>
               </span>
               <div align="right" class="icon-border">
                  <a href="#" data-activates="slide-out" class="button-collapse show-on-large">
                     <!-- <i class="white-text small material-icons">settings</i> -->
                     <i class="white-text small material-icons inner-border">subject</i>                     
                  </a>
               </div>
            </div>
            <div class="divider"></div><div class="divider"></div>
            <div class="divider"></div><div class="divider"></div>
         </div>
         
         <div class="content col s12 m6">

<!-- SIDE NAV
----------------------------------------------------------------------------------->
            <ul id="slide-out" class="side-nav">
               <br>
               <li>
                  <a class="modal-trigger blue white-text waves-effect"
                     href="#profile_picture" onclick="close_side_nav()">
                     My Profile Picture
                  </a>
               </li><br>
               <li>
                  <a class="modal-trigger blue white-text waves-effect"
                     href="#account_information" onclick="close_side_nav()">
                     My Account Information
                  </a>
               </li><br>
               <li>
                  <a class="modal-trigger blue white-text waves-effect"
                     href="#research_buddies" onclick="close_side_nav()">
                     My Research Buddies
                  </a>
               </li><br>
               <li>
                  <a class="modal-trigger blue white-text waves-effect"
                     href="#photo_album" onclick="close_side_nav()">
                     My Photo Album
                  </a>
               </li><br>
               <li>
                  <a class="modal-trigger blue white-text waves-effect"
                     href="#messages" onclick="close_side_nav()">
                     My Messages
                  </a>
               </li><br>
               <li>
                  <a class="modal-trigger blue white-text waves-effect"
                     href="#contributions" onclick="close_side_nav()">
                     My Contributions
                  </a>
               </li>
            </ul>
            
<!-- MODALS
----------------------------------------------------------------------------------->
            
            <!-- MY PROFILE PICTURE
            ----------------------------------------------------------------------->
            <div id="profile_picture" class="modal">
               <div class="modal-content">
                  <div class="card card-border">
                     <div align="center" class="blue white-text">
                        <div class="profile">
                           <a class="right modal-action modal-close waves-effect btn-flat white-text">
                              x
                           </a>
                           <center>
                              <!-- <img class="image" src="assets/profile_pic/profile.jpg" alt="Profile Picture"> -->
                              <img class="image" src="files/profile_picture/<?php echo $profile_picture; ?>"
                                   alt="Profile Picture">
                           </center>
                           <span class="title">
                              <h4>Profile Picture</h4>
                           </span>
                        </div>
                        <div class="divider"></div>
                        <div class="divider"></div>
                     </div>
                     <div align="center" class="content col s12 m6">
                        <h5>
                           <strong>Change Picture:</strong>
                        </h5>
                        <h6 class="index-content">
                           <?php echo $error;?>
                           <?php echo form_open_multipart('profile/do_upload_pic');?>
                           <input type="file" name="userfile"/>
                           <input type="submit" value="Upload"/>
                           </form>
                        </h6>
                     </div>
                  </div>
               </div>
            </div>
         
            <!-- MY ACCOUNT INFORMATION
            ----------------------------------------------------------------------->
            <div id="account_information" class="modal">
               <div class="modal-content">
                  <div class="card">
                     <div align="center" class="blue white-text">
                        <div class="profile">
                           <a class="right modal-action modal-close waves-effect btn-flat white-text">
                              x
                           </a>
                           <span class="title">
                              <h4>Account Information:</h4>
                           </span>
                        </div>
                        <div class="divider"></div>
                        <div class="divider"></div>
                     </div>
                     <div class="content index-content">
                        <div class="account_info">
                           <h5><strong>University: </strong><small><?php echo $university;?></small></h5>
                           <h5><strong>Major: </strong><small><?php echo $major;?></small></h5>
                           <h5><strong>Email: </strong><small><?php echo $this->session->email;?></small></h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         
            <!-- MY RESEARCH BUDDIES
            ----------------------------------------------------------------------->
            <div id="research_buddies" class="modal">
               <div class="modal-content">
                  <div class="card">
                     <div align="center" class="blue white-text">
                        <div class="profile">
                           <a class="right modal-action modal-close waves-effect btn-flat white-text">
                              x
                           </a>
                           <span class="title">
                              <h4>Research Buddies:</h4>
                           </span>
                        </div>
                        <div class="divider"></div>
                        <div class="divider"></div>
                     </div>
                     <div class="content">
                     </div>
                  </div>
               </div>
            </div>
         
            <!-- MY PHOTO ALBUM
            ----------------------------------------------------------------------->
            <div id="photo_album" class="modal">
               <div class="modal-content">
                  <div class="card">
                     <div align="center" class="blue white-text">
                        <div class="profile">
                           <a class="right modal-action modal-close waves-effect btn-flat white-text">
                              x
                           </a>
                           <span class="title">
                              <h4>Photo Album:</h4>
                           </span>
                        </div>
                        <div class="divider"></div>
                        <div class="divider"></div>
                     </div>
                     <div class="content">
                        <?php echo $pictures; ?>
                     </div>
                  </div>
               </div>
            </div>
            
            <!-- MY MESSAGES
            ----------------------------------------------------------------------->
            <div id="messages" class="modal">
               <div class="modal-content">
                  <div class="card">
                     <div align="center" class="blue white-text">
                        <div class="profile">
                           <a class="right modal-action modal-close waves-effect btn-flat white-text">
                              x
                           </a>
                           <span class="title">
                              <h4>Messages:</h4>
                           </span>
                        </div>
                        <div class="divider"></div>
                        <div class="divider"></div>
                     </div>
                     <div class="content">
                     </div>
                  </div>
               </div>
            </div>
         
            <!-- MY CONTRIBUTIONS
            ----------------------------------------------------------------------->
            <div id="contributions" class="modal">
               <div class="modal-content">
                  <div class="card">
                     <div align="center" class="blue white-text">
                        <div class="profile">
                           <a class="right modal-action modal-close waves-effect btn-flat white-text">
                              x
                           </a>
                           <span class="title">
                              <h4>Contributions</h4>
                           </span>
                        </div>
                        <div class="divider"></div>
                        <div class="divider"></div>
                     </div>
                     <div class="content">
                     </div>
                  </div>
               </div>
            </div>
         
<!-- ACCOUNT INFORMATION
----------------------------------------------------------------------------------->
            <h4 align="center" class="index-content">
               <strong class="grey-text text-darken-1">
                  Profile Information
               </strong>
            </h4>
            <div class="account_info">
               <div class="black-text">
                  <h5><strong>Education</strong></h5>
                  <div class="index-content">
                     <div class="index-content">
                        <h5 class="blue-text text-darken-2">
                           <strong>University: </strong>
                           <small>
                              <span class="black-text">
                                 <?php echo $university;?>
                              </span>
                           </small>
                        </h5>
                        <h5 class="blue-text text-darken-2">
                           <strong>Degree: </strong>
                           <small>
                              <span class="black-text">
                              </span>
                           </small>
                        </h5>
                        <h5 class="blue-text text-darken-2">
                           <strong>Major: </strong>
                           <small>
                              <span class="black-text">
                                 <?php echo $major;?>
                              </span>
                           </small>
                        </h5>
                        <h5 class="blue-text text-darken-2">
                           <strong>Minor: </strong>
                           <small>
                              <span class="black-text">
                              </span>
                           </small>
                        </h5>
                        <h5 class="blue-text text-darken-2">
                           <strong>Certifications:</strong>
                           <small>
                              <span class="black-text">
                              </span>
                           </small>
                        </h5>
                     </div>
                  </div>
                  <div align="right" class="icon-border">
                     <span>
                        <i class="blue-text small material-icons">subject</i>                     
                     </span>
                  </div>
               </div>
               
               <div class="divider blue lighten-4"></div>
               <div class="divider blue lighten-4"></div>
               
               <div class="black-text">
                  <h5><strong>Contact Information</strong></h5>
                  <div class="index-content">
                     <div class="index-content">
                        <h5 class="blue-text text-darken-2">
                           <strong>Email: </strong>
                           <small>
                              <span class="black-text">
                                 <?php echo $this->session->email;?>
                              </span>
                           </small>
                        </h5>
                        <h5 class="blue-text text-darken-2">
                           <strong>Phone: </strong>
                           <span class="black-text">
                           </span>
                        </h5>
                        <h5 class="blue-text text-darken-2">
                           <strong>LinkedIn: </strong>
                           <span class="black-text">
                           </span>
                        </h5>
                     </div>
                  </div>
                  <div align="right" class="icon-border">
                     <span>
                        <i class="blue-text small material-icons">subject</i>                     
                     </span>
                  </div>
               </div>
               
               <div class="divider blue lighten-4"></div>
               <div class="divider blue lighten-4"></div>
               
               <div class="black-text">
                  <h5><strong>Work Experience</strong></h5>
                  <div class="index-content">
                     <div class="index-content">
                        <h5 class="blue-text text-darken-2">
                           <strong>Software Engineer: </strong>
                        </h5>
                        <div class="grey-text text-darken-2">
                           <h5><small>Company: </small></h5>
                           <h5><small>Location: </small></h5>
                           <h5><small>Details: </small></h5>
                           <h5><small>Reference: </small></h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="index-content">
               <div align="right" class="icon-border">
                  <span>
                     <i class="blue-text small material-icons">subject</i>                     
                  </span>
               </div>
            </div>
         </div>
      
         <div class="divider"></div>
         <div class="divider"></div>
            
<!-- RESEARCH PORTFOLIO / CONTRIBUTIONS
----------------------------------------------------------------------------------->
         <div class="content col s12 m6">
            <h4 align="center" class="index-content">
               <strong class="grey-text text-darken-1">
                  Research Portfolio
               </strong>
            </h4>
            <div class="index-content">
               <h5 class="black-text">
                  <strong>Summary</strong>
               </h5>
               <div class="index-content">
                  <div >
                     <h5 class="blue-text text-darken-2">
                        <strong>Research Goal: </strong>
                        <small>
                           <span class="black-text">
                           </span>
                        </small>
                     </h5>
                  </div>
                  <div class="index-content">
                     <h5 class="blue-text text-darken-2">
                        <strong>Interests: </strong>
                        <small>
                           <span class="black-text">
                           </span>
                        </small>
                     </h5>
                     <h5 class="blue-text text-darken-2">
                        <strong>Expertise: </strong>
                        <small>
                           <span class="black-text">
                           </span>
                        </small>
                     </h5>
                  </div>
               </div>
               <div align="right" class="icon-border">
                  <span>
                     <i class="blue-text small material-icons">subject</i>                     
                  </span>
               </div>
            </div>
            <div class="index-content blue lighten-5">
               <div class="divider blue lighten-4"></div>
               <div class="divider blue lighten-4"></div>
            </div>
            <h5 class="black-text index-content">
               <strong>My Research</strong>
            </h5>
            <?php echo $files; ?>
            <div class="index-content">
               <?php echo $error;?>
               <?php echo form_open_multipart('profile/do_upload');?>
                  <input type="file" name="userfile"/>
                  <input type="submit" value="Upload"/>
               </form>
            </div>
      
            <div class="index-content">
               <div class="divider blue lighten-4"></div>
               <div class="divider blue lighten-4"></div>
            </div>
      
            <div class="index-content">
               <h5 class="black-text">
                  <strong>My Contributions</strong>
               </h5>
               <div class="grey-text text-darken-2 index-content">
                  <h5><strong>California State University, East Bay</strong></h5>
                  <h5><strong>California State University, Los Angeles</strong></h5>
                  <h5><strong>University of California, Santa Cruz</strong></h5>
                  <h5><strong>University of California, San Diego</strong></h5>
               </div>
            </div>
            <div class="index-content">
               <div align="right" class="icon-border">
                  <span>
                     <i class="blue-text small material-icons">subject</i>                     
                  </span>
               </div>
            </div>
         </div>

         <div class="divider"></div>
         <div class="divider"></div>

<!-- Research Photos
----------------------------------------------------------------------------------->
         <div class="content col s12 m6">
            <h4 align="center" class="index-content">
               <strong class="grey-text text-darken-1">
                  Research Photos
               </strong>
            </h4>
         </div>
      </div>
   </div>
</div>