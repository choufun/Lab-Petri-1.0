<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
   #profile-image
   {
      border-radius: 50%;
      border: 1px solid #fbc02d ;
   }
</style>

<div class="container-fluid">    
   <div class="row">      
      <div class="col s12 m12 l12">
         <div class="card">
            <div class="card-content">
               <h4 class="green-text text-darken-4"><strong>Mission Statement:</strong></h4>
               <h6 class="container-fluid flow-text grey-text text-darken-4" style="margin: 45px;">                
                  Lab Petri is a networking website through which graduate students and professors
                  can communicate with undergraduate students find suitable undergraduate research assistants. 
                  <br><br>
                 <!--
                  Lab Petri aims to help students with poor access to educational resources and
                  students in disadvantaged circumstances to find and apply to research labs.
                 -->
                 Lab Petri is a business founded and owned by minorities who have a passion for STEM field research. 
                 Our goal is to not only increase student and professional involvement in the STEM fields but to specifically target underrepresented minorities in the STEM fields.
                  <br><br>
                  Lab Petri wants to help students engage with potential employers for opportunities in research. We aim to use our online forum 
                  as a place where students, professors, and potential employers can establish working relationships that may result in continued educational opportunities, internships, 
                 or even employment in the STEM field.                 
              </h6>
            </div>               
            <div class="divider"></div>
            <div class="card-content">
               <h4 align="center" class="green-text text-darken-3"><strong>Benefits for Users:</strong></h4>
               <div class="row">
                  <div class="offset-l3 col s12 m12 l6">
                     <ul class="tabs">
                        <li class="tab col s4 m4 l2"><strong><a class="active blue-text text-darken-3" href="#undergraduate">Undergraduates</a></strong></li>
                        <li class="tab col s4 m4 l2"><strong><a class="blue-text text-darken-3" href="#graduate">Graduates</a></strong></li>
                        <li class="tab col s4 m4 l2"><strong><a class="blue-text text-darken-3" href="#professors">Professors</a></strong></li>
                     </ul>
                  </div>
               </div>
               <div class="row" style="margin: 45px;">
                  <div id="undergraduate" class="flow-text">
                     <h5>Undergraduate Students:</h5>
                     Research is a hands-on learning experience that students can potentially get paid to engage in. 
                     Students that involve themselves with research have better resumes and gain experience doing research which is invaluble for when these undergraduate students
                     become graduate students. Research is essentially required for students looking to obtain a graduate degree involving 
                     the biological sciences. Lab Petri hopes to provide all undergraduate students an equal opportunity to obtain research
                     opportunities. 
                  </div>
                  <div id="graduate" class="flow-text">
                     <h5>Graduate Students:</h5>
                     Graduate Students are often required to do research as part of their degree. Graduate students using Lab Petri can 
                     find undergraduate research assistants in order to facilitate publication and completion of research. Finding help is 
                     extremely simple with Lab Petri's forum system. Student assistants that graduate students would otherwise be hard-pressed 
                     to find will accessible through Lab Petri. 
                  </div>
                  <div id="professors" class="flow-text">
                     <h5>Professors:</h5>
                     Professors that find research assistants using Lab Petri will be relieved as the platform will allow them to manage their lab staffing digitally.
                     finding new student assistants is time consuming and, as many undergraduate students (or their students) may know, a professors time is valuable. 
                     Lab Petri hopes to simplify the process of finding student assistants for professors so as to not only provide more opportunities for students to get 
                     noticed but help Professors save time in the process of selecting them. 
                  </div>
               </div>              
            </div>         
         </div>
      </div>
   </div>
</div>

<!-- TEAM MEMBERS-->   
<?php include 'application/views/company/team.php';?>

<!-- FOOTER
------------------------------------------------------------------------------------------->
<div class="row blue darken-1 z-depth-1" id="footer-1">
   <div class="container" id="footer-border">
      <div class="col s12 m12 l12">
         <div class="row">            
            <div class="col s3 m3 l3" align="center">
               <a class="white-text" href="http://www.facebook.com/labpetri" target="_blank">
                  Facebook
               </a>
            </div>
            <div class="col s3 m3 l3" align="center">
               <a target="_blank" class="white-text" href="https://www.linkedin.com/company/7958457?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A7958457%2Cidx%3A2-1-2%2CtarId%3A1463476850427%2Ctas%3ALab%20Petri">
                  LinkedIn
               </a>
            </div> 
            <div class="col s3 m3 l3" align="center">
               <a class="white-text" href="company?id=privacy">
                  Privacy Rights
               </a>
            </div>
         </div>   
      </div>      
   </div>
</div>