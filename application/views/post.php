<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-------------------------------------------------------------------------------------
   POST VIEW
   ---------
      - EMAIL
      - TITLE
      - SUMMARY
      - DATE : YYYY - MM - DD
      - TIME : HH:MM:SS

-------------------------------------------------------------------------------------->
<div class="divider"></div>
<h5>Post</h5>
<div class="divider"></div>
<!------------------------------------------------------------------------------------>
<div class="row">
   <div class="col s12">
      <div class="card green lighten-5">
         
         <form method="post" accept-charset="utf-8" action="post">

            <div class="row">
               <div class="input-field col s8">
                  <label class="active" for="title"> Title: </label>
                  <input type="text" name="title" class="validate">
               </div>
            </div>
            <div class="row">
               <div class="input-field col s10">
                  <label class="active" for="summary"> Summary: </label>
                  <textarea name="summary"></textarea>
               </div>
            </div>
<!------------------------------------------------------------------------------------>
            <div class="right">
               <button class="btn" type="submit" name="action">
                  <i class="material-icons">hi</i>
               </button>
            </div>
         </form>
      </div>
   </div>
</div>
