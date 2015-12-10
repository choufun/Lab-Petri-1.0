<div id="education_show">
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
   <div class="icon-border register_adj" align="right">
      <div class="container-fluid">
         <a class="reg_log" onclick="return show('education_edit','education_show');">
            <span>
               <i class="blue-text small material-icons icon-inner-border">edit</i>
            </span>
         </a>
      </div>
   </div>
</div>

<!-- EDIT QUERY
--------------------------------------------------------------------------------------------->
<div id="education_edit" style="display:none">
   <form>
      <div class="row">
         <div class="container-fluid">
            <h5><strong>Education</strong></h5>
         </div>
      </div>
      
      <div class="card">
         <div class="card-content">
            <div class="container-fluid">

               <div class="row">
                  <div class="input-field">
                     <input name="university" type="text" class="validate" placeholder="<?php echo $university;?>">
                     <label for="university">
                        <strong class="blue-text">University: </strong>
                     </label>
                  </div>
               </div>

               <div class="row">
                  <div class="input-field">
                     <input name="degree" type="text" class="validate" placeholder="<?php echo $major;?>">
                     <label for="degree">
                        <strong class="blue-text">Degree: </strong>
                     </label>
                  </div>
               </div>

               <div class="row">
                  <div class="input-field">
                     <input name="major" type="text" class="validate" placeholder="">
                     <label for="major">
                        <strong class="blue-text">Major: </strong>
                     </label>
                  </div>
               </div>
               
               <div class="row">
                  <div class="input-field">
                     <input name="minor" type="text" class="validate" placeholder="">
                     <label for="minor">
                        <strong class="blue-text">Minor: </strong>
                     </label>
                  </div>
               </div>
               
               <div class="row">
                  <div class="input-field">
                     <input name="certifications" type="text" class="validate" placeholder="">
                     <label for="certifications">
                        <strong class="blue-text">Certifications: </strong>
                     </label>
                  </div>
               </div>

               <input type="hidden" name="login" value="education">

               <div class="row" align="right"> 
                  <button class="front btn waves-effect blue darken-1" type="submit" name="action">
                     <strong>Save Changes</strong>
                  </button>
               </div>
               
               <div class="register_adj" align="right">
                  <a class="reg_log" onclick="return show('education_show','education_edit');">Cancel</a>
               </div>
               
            </div>
         </div>
      </div>
   </form>
</div>