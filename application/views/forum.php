<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>
<!-----------------------------------------------------------------------------------------------------
   
------------------------------------------------------------------------------------------------------>
<!DOCTYPE html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="../../assets/js/materialize.js"></script>




</head>
<!--------------------------
-----------------------------
-------------------------
----------------------->
<body>

	 
<script>

jQuery(document).ready(function(){
jQuery(".card").hide();
jQuery(".preloader-wrapper").show();
jQuery( ".card" ).first().show( "slow", function showNext() {
    jQuery( this ).next( ".card" ).show( "slow", showNext );
  });
jQuery(".preloader-wrapper").hide();

});
	
jQuery.noConflict();

</script>

	
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>
	
	
<!--This manages the posting feature -->
<div class="container">
	<?php echo form_open_multipart( 'Forum');?>
	<?php echo validation_errors(); ?>


	<ul class="collapsible popout" data-collapsible="accordion">
		<li>
			<div class="collapsible-header hoverable z-depth-0"><i class="material-icons">mode_edit</i>What's Your Research?</div>
			<div class="collapsible-body hoverable z-depth-5">
				<div class="container">
					<div class="row">

<!-- This is collapsible paper uploading top piece *********************************
*************************************************************************************
**************************************************************************************
*********************************************************************-->

						<div class="input-field col s12">
							<input name="title" type="text" class="validate" length="75">
							<label for="title" data-error="Too Long!" data-success="right">Title</label>
						</div>
						<div class="input-field col s12">
							<textarea name="abstract" type="text" class="materialize-textarea" length="2500"></textarea>
							<label for="abstract">Quick Summary (Abstract)</label>
						</div>
						<div class="input-field col s12">
							<textarea name="additionalinfo" class="materialize-textarea"></textarea>
							<label for="additionalinfo">Additional Information</label>
						</div>

						<div class="input-field col s12 l3">
							<label class="active" for="topic">Topic Area:</label>
							<select name="topic" class="browser-default">
								<option selected disabled>-- Please Select One --</option>
								<?php echo $options;?>
							</select>
						</div>


						<div class="input-field file-field col s12 l9">
							<div class="file-field input-field">
								<div class="btn">
									<span>File</span>
									<input type="file" name="research_paper" multiple>
								</div>
								<div class="file-path-wrapper">
									<input name="filepaths" class="file-path validate" type="text" placeholder="Upload one or more files">
								</div>
							</div>

						</div>
						<div class="col s12 right-align">
							<button class="btn waves-effect waves-light" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
						</div>
					</div>



				</div>


			</div>
</div>
</div>
</li>
</ul>
</form>



<!-- This is the loading bar -->
<!--*********************************************************************************************************************-->
<div class="center-align">
 <div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
</div>
<!-- END OF LOADING BAR -->



<!--This manages the posts themselves -->

<div class="container">
	<div class="row">
		<div class="col s12 m12 l10"
		<div class="card"
			<?php foreach($forum as $row){ ?>
			<a href="<?php echo "http://www.labpetri.com/forum/comments/". $row->post_id; ?>"><div class="card-panel hoverable small left-align forum-border">
				
<!-- This manages within the individual cards on the forum -->
<!--******************************8******************************8******************************8******************************8******************************8-->
<!--******************************8******************************8******************************8******************************8-->
				<div class="row">
					<div class="col s12 m2 l2 blue-grey lighten-5">
						<div align="center" style="padding-top:17px;">
							<img class="circle responsive-img" src="files/profile_picture/<?php echo $pic; ?>">
						</div>
						
						<h5><b><center class="flow-text"><?php echo " " . $row->firstname . " " . $row->lastname;?></center></b></h5>
						<h6><center><?php echo " " . $row->school;?></center></h6>
					</div>
					<div class="col s12 m9 l9 white">
						<a href="<?php echo "http://www.labpetri.com/forum/comments/". $row->post_id; ?>"><h6><b><?php echo $row->title;?></b></h6></a>
						<i><?php echo "In " . $row->topic ?></i>
						<div class="divider"></div>
						<div class="container-fluid">
						<p class="flow-text"><textarea style="max-width: 100%; height:150px; border: none; resize: none;"><?php echo $row->abstract?></textarea></p>
						</div>
					</div>
					
					<div class="col s12 hide-on-med-and-up divider grey"></div>

<!-- PLEASE ADD VIEW COUNTER TO CODE BELOW -->
					
					<div class="col s4 m1 l1" style="padding-top: 3px";>
						<span class="blue-text text-darken-2"><h5><center><b><i class=" tiny material-icons">add</i>100</b></center></h5></span>
						<div class="col s12 hide-on-small-only divider grey lighten-2"></div>
						
					</div>
					
<!--******************************8******************************8******************************8******************************8******************************8-->

<!-- PLEASE ADD COMMENT COUNTER TO CODE BELOW -->

					
					<div class="col m1 l1 hide-on-med-and-down">
					<span class="grey-text text-darken-2 flow_text"><b><center><h6><i class="tiny material-icons">comment</i> 11</b></h6></center></span>
					</div>
					
					<div class="col s4 hide-on-med-and-up" style="padding-top: 4px">
					<span class="grey-text text-darken-2 flow_text"><b><center><h5><i class="tiny material-icons">comment</i> 11</b></h5></center></span>
					</div>

<!--******************************8******************************8******************************8******************************8******************************8-->

<!-- PLEASE ADD AMOUNT OF BOOKMARKED COUNTER TO CODE BELOW -->

					<div class="col m1 l1 hide-on-small-only" style="padding-top: 110px";>
						<span class="grey-text text-darken-2" style="vertical-align:middle"><h5><center><b><i class=" tiny material-icons">bookmark</i>1</b></center></h6></span>
					</div>
					
					<div class="col s4 hide-on-med-and-up" style="padding-top: 4px";>
						<span class="grey-text text-darken-2" style="vertical-align:middle"><h5><center><b><i class=" tiny material-icons">bookmark</i>1</b></center></h6></span>
							</div>

<!--******************************8******************************8******************************8******************************8******************************8-->


				</div>
							
		</div>



<!-- PLEASE ADD ADSENSE google ads TO CODE BELOW -->


			<?php } ?>
	</div>
		<div class="col l2">

			<div class="card center">
				<div class="card-content center">
					<span class="card-title">Card Title</span>
					<p>News</p>
				</div>
				<div class="card-content">
					<span class="card-title">Card Title</span>
					<p>ADS</p>
				</div>
				<div class="card-content">
					<span class="card-title">Card Title</span>
					<p>ADS</p>
				</div>
				<div class="card-content">
					<span class="card-title">Card Title</span>
					<p>ADS</p>
				</div>
				<div class="card-content">
					<span class="card-title">Card Title</span>
					<p>Trending Research</p>
				</div>
				<div class="card-content">
					<span class="card-title">Card Title</span>
					<p>Daily LabPetri Newsletter</p>
				</div>
				<div class="card-action">
					<a href="#">LINK</a>
					<a href="#">LINK</a>
				</div>
			</div>
		</div>
</div>
	</div>

</div>

  		<script src="assets/js/materialize.js"></script>

</body>
</html>

