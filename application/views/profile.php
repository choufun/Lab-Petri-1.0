<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
   <script>
      /* DELETE LINK
      ***********************************************************************************/
      function delete_link()
      {
         var size = document.getElementsByTagName("a").length - 1;
         var element = document.getElementsByTagName("a")[size];
         document.write(
            "<form method='post' accept-charset='utf-8' action='profile/delete'>\
               <button class='_link light-blue-text' type='submit' name='action' value='" + element + "'>\
                  Delete\
               </button>\
            </form>"
         );
      }
   /**********************************************************************************/
   </script>

   <div class="container-fluid grey lighten-4">
      
      <!-- DEBUGGING PURPOSES
      ----------------------------------------------------------------------------------->
      <div align="center" class="row">
         <?php //var_dump($_SESSION);?>
      </div>
      <div class="container col s12">
         <div class="card" id="card-border">

            <!-- PROFILE HEADER
            ----------------------------------------------------------------------------------->
               <div class="card-image">
                  <div class="blue darken-1 white-text container-fluid col s12">
                     <div class="row" id="profile-padding">
                        <div align="center" class="container-fluid">
                           <img class="responsive-img z-depth-2" src="files/profile_picture/<?php echo $profile_picture; ?>" id="profile-image">
                        </div>
                     </div>
                     <div class="row">
                        <div align="center" class="container-fluid">
                           <h3 id="username">
                              <strong>
                                 <?php echo $this->session->firstname." ".$this->session->lastname;?>
                              </strong>
                           </h3>
                        </div>
                     </div>
                     <div align="right" class="icon-border row">
                        <div class="container-fluid">
                           <a href="#" data-activates="slide-out" class="button-collapse show-on-large">
                              <i class="white-text small material-icons inner-border">subject</i>
                           </a>
                        </div>
                     </div>
                     <div class="divider"></div><div class="divider"></div>
                     <div class="divider"></div><div class="divider"></div>
                  </div>
               </div>
               <div class="card-content">

                  <!-- SIDE NAV
                  ----------------------------------------------------------------------------------->
                  <?php include 'application/views/profile/sidenav.php';?>

                  <!-- MODALS
                  ----------------------------------------------------------------------------------->
                  <?php include 'application/views/profile/modal.php';?>

                  <!-- PROFILE INFORMATION
                  ----------------------------------------------------------------------------------->
                  <div class="row">
                     <div class="container-fluid">
                        <div class="col s12">
                           <div align="center" class="row">
                              <div class="container-fluid">
                                 <h4><strong class="grey-text text-darken-1">Profile Information</strong></h4>
                              </div>
                           </div>

                           <!-- EDUCATION
                           -------------------------------------------------------------->
                           <div class="row">
                              <div class="container-fluid">
                                 <h5><strong>Education</strong></h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="container-fluid">
                                 <h5 class="blue-text text-darken-2">
                                    <strong>University: </strong>
                                    <small><span class="black-text"><?php echo $university;?></span></small>
                                 </h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="container-fluid">
                                 <h5 class="blue-text text-darken-2">
                                    <strong>Degree: </strong>
                                    <small><span class="black-text"></span></small>
                                 </h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="container-fluid">
                                 <h5 class="blue-text text-darken-2">
                                    <strong>Major: </strong>
                                    <small><span class="black-text"><?php echo $major;?></span></small>
                                 </h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="container-fluid">
                                 <h5 class="blue-text text-darken-2">
                                    <strong>Minor: </strong>
                                    <small><span class="black-text"></span></small>
                                 </h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="container-fluid">
                                 <h5 class="blue-text text-darken-2">
                                    <strong>Certifications: </strong>
                                    <small><span class="black-text"></span></small>
                                 </h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="container-fluid">
                                 <span>
                                    <i class="blue-text small material-icons">subject</i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="container-fluid">
                        <div class="divider blue lighten-4"></div>
                        <div class="divider blue lighten-4"></div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="container-fluid">
                        <div class="col s12">

                           <!-- CONTACT INFORMATION
                           -------------------------------------------------------------->
                           <div class="row">
                              <div class="container-fluid">
                                 <h5><strong>Contact Information</strong></h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="container-fluid">
                                 <h5>
                                    <strong class="blue-text text-darken-2">Email: </strong>
                                    <small><span><?php echo $this->session->email;?></span></small>
                                 </h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="container-fluid">
                                 <h5>
                                    <strong class="blue-text text-darken-2">Phone: </strong>
                                    <small><span></span></small>
                                 </h5>
                              </div>
                           </div>
                           <div class="row">
                              <div class="container-fluid">
                                 <h5>
                                    <strong class="blue-text text-darken-2">LinkedIn: </strong>
                                    <small><span></span></small>
                                 </h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="container-fluid">
                        <div class="divider blue lighten-4"></div>
                        <div class="divider blue lighten-4"></div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="container-fluid">
                        <div class="col s12">
                              
                           <!-- WORK EXPERIENCE
                           -------------------------------------------------------------->
                           <div class="row">
                              <div class="container-fluid">
                              <h5><strong>Work Experience</strong></h5>
                           </div>
                        </div>
                        <div class="row">
                           <div class="container-fluid">
                              <h5><strong class="blue-text text-darken-2">Software Engineer: </strong></h5>
                              <h5><small class="grey-text text-darken-2">Company: </small></h5>
                              <h5><small class="grey-text text-darken-2">Location: </small></h5>
                              <h5><small class="grey-text text-darken-2">Details: </small></h5>
                              <h5><small class="grey-text text-darken-2">Reference: </small></h5>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="card-content">
               <div class="row">
                  <div class="container-fluid">
                     <div class="col s12">

                        <!-- RESEARCH PORTFOLIO
----------------------------------------------------------------------------------->
                        <div align="center" class="row">
                           <div class="container-fluid">
                              <h4><strong class="grey-text text-darken-1">Lab Notebook</strong></h4>
                           </div>
                        </div>
                        <div class="row">
                           <div class="container-fluid">
                              <h5><strong>Summary</strong></h5>
                           </div>
                        </div>
                        <div class="row">
                           <div class="container-fluid">
                              <h5>
                                 <strong class="blue-text text-darken-2">Research Goal: </strong>
                                 <small><span></span></small>
                              </h5>
                           </div>
                        </div>
                        <div class="row">
                           <div class="container-fluid">
                              <h5>
                                 <strong class="blue-text text-darken-2">Interests: </strong>
                                 <small><span></span></small>
                              </h5>
                           </div>
                        </div>
                        <div class="row">
                           <div class="container-fluid">
                              <h5>
                                 <strong class="blue-text text-darken-2">Expertise: </strong>
                                 <small><span></span></small>
                              </h5>
                           </div>
                        </div>
                        <div class="row">
                           <div class="container-fluid">
                              <div class="divider blue lighten-4"></div>
                              <div class="divider blue lighten-4"></div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="container-fluid">
                              <h5>
                                 <strong>Research</strong>
                              </h5>
                           </div>
                        </div>
                        <div class="row">
                           <div class="container-fluid">
                              <?php echo $files; ?>
                              <?php echo $error;?>
                              <?php echo form_open_multipart('profile/do_upload');?>
                                 <input type="file" name="userfile" />
                                 <input type="submit" value="Upload" />
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>