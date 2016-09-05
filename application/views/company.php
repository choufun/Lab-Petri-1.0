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
               <div class="container-fluid flow-text grey-text text-darken-3" style="margin: 45px;">
                  <h4 class="green-text text-darken-3"><strong>About Us:</strong></h4>
                  <p>                     
                     <!--Lab Petri is a networking website driven by minorities who have a passion for STEM field research. 
                     Our goal is to not only increase student and professional involvement in the STEM fields but to specifically target underrepresented minorities in the STEM fields.
                     -->Lab Petri is a nonprofit organization and networking website for students currently in or entering the STEM fields. Our goal is to promote the STEM majors and to help students find research opportunities within or outside their Universities. We want to encourage students to pursue and continue their education in science and technology by giving them more opportunities to do concrete work, as well as show them what their education will make them capable of achieving.<br></br>  

Research is an important part of a well-rounded academic experience for an undergraduate student and those who enter research labs, and are published in academic journals as a result, end up with a significant advantage in terms of finding future employment or entering graduate school. We would like research to be a more fundamental aspect of the curriculum of the average student in a STEM major.
<br></br>
Lab Petri is under IRS section 501(c)(3). 
 


                     
                    <!--Lab Petri can help students engage with potential employers for opportunities in research.
                     We provide our website as a setting where students, professors, and potential employers can establish working relationships that may
                     result in continued educational opportunities, internships, or even employment in the STEM field.        <br><br>   
                    
                    Research is an important part of a well-rounded academic experience for an undergraduate student and those who enter research labs, and are published in academic journals as a result, end up with a significant advantage in terms of finding future employment or entering graduate school. 
                    We would like research to be a more fundamental aspect of the curriculum of the average student in a STEM major. -->
                    
                  </p>
               </div>
            </div>               
            <div class="divider"></div>            
            <div class="card-content">
               <h4 align="center" class="green-text text-darken-3"><strong>Benefits for Students</strong></h4>
               <div class="row">
                  <div class="col s12">
                     <ul class="tabs">
                        <li class="tab col s4"><strong><a class="active blue-text text-darken-3" href="#undergraduate">Connect with Professors</a></strong></li>
                        <li class="tab col s4"><strong><a class="blue-text text-darken-3" href="#graduate">Build Your Resume</a></strong></li>
                        <li class="tab col s4"><strong><a class="blue-text text-darken-3" href="#professors">Search For Topics That Interest You</a></strong></li>
                     </ul>
                  </div>
               </div>
               <div id="undergraduate" class="flow-text grey-text text-darken-3" style="margin: 45px;">
                  <h5>Connect with Professors</h5>
                  <p>
                     Lab Petri aims to connect students and professors to allow students to inquire about open positions in research labs. 
                     This task may be daunting otherwise. Lab Petri would like to help facilitate this process.             
                     <br><br>                    
                  </p>
               </div>
               <div id="graduate" class="flow-text grey-text text-darken-3" style="margin: 45px;">
                  <h5>Build Your Resume</h5>
                  <p>
                    Research is an important part of a well-rounded academic experience for an undergraduate student. Those who enter research labs, and are published in academic journals as a result, end up with a significant advantage in terms of finding future employment or entering graduate school. 
                    We would like research to be a more fundamental aspect of the curriculum of the average student in a STEM major
                     <!--Students who find research through lab petri are given stipends through which they can be compensated for their work where they otherwise would not.                        
                     We would like students to actively search for research using our platform and be financially compensated for their hard work. This is achieved through
                     grant applications on the company end. 
                     
                        Student assistants that graduate students would otherwise be hard-pressed 
                        to find will accessible through Lab Petri.
                     -->
                  </p>
               </div>
               <div id="professors" class="grey-text text-darken-3" style="margin: 45px;">
                  <h5>Search For Topics That Interest You</h5>
                  <p class="flow-text">
                    Students can view what other students are researching and can connect with one another to ask questions and collaborate.
                     We hope that this collaborative environment that is provided through our forum system will inspire new projects, discoveries, and serendipitous teamwork.
                     <br><br>
                  </p>
               </div>
               <div class="divider"></div>
               <h4 align="center" class="green-text text-darken-3"><strong>Benefits for Professors</strong></h4>
               <div class="row">
                  <div class="col s12">
                     <ul class="tabs">
                        <li class="tab col s6"><strong><a class="active blue-text text-darken-3" href="#part_1">Making it Simpler To Find Lab Assistants</a></strong></li>
                        <li class="tab col s6"><strong><a class="blue-text text-darken-3" href="#part_2">Expanding Your Research Presence</a></strong></li>
                     </ul>
                  </div>
               </div>
               <div id="part_1" class="flow-text grey-text text-darken-3">
                  <h5>Making it Simpler To Find Lab Assistants</h5>
                  <p>
                     
                     Our goal is to make professors' workload smaller so that they achieve more.                   
                     
                     Lab Petri hopes to simplify the process of finding student assistants for professors so as to not only provide more opportunities for students to get 
                     noticed but help professors save time in the process of selecting them. 
                     <br><br>
                  </p>
               </div>
               <div id="part_2" class="flow-text grey-text text-darken-3">
                  <h5>Expand Your Research Presence</h5>
                  <p>
                     By allowing graduate students and professors to post descriptions of research projects, students can learn more about the lab's activities.
                     This will expand interest in the lab's research further and faster than conferencing, graduate defenses, and writing grants might.  
                     
                     <br><br>                        
                  </p>
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