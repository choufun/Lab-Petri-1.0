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

<!--This manages the posts themselves -->
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


<div class="container">
	<div class="row">
		<div class="col s12 l10">
			<?php foreach($forum as $row){ ?>
			<div class="card" style="display:none;">
				<div class="row">
					<div class="col s3 l1">
						<img class="responsive-img circle" src="/assets/profile_pic/profile.jpg">
					</div>
					<div class="col s9 l11">
						<b><?php echo $row->title;?></b>
						<div class="divider"></div>
						<h6><?php echo "Posted by: " . $row->firstname . " " . $row->lastname . " from " . $row->school;?></h6>
						<h6><?php echo "Topic Area: " . $row->topic ?></h6>
						<div class="divider"></div>

					</div>

				</div>
				<div class="col s12 l12">
					<a href="#">Endorsed by 5000 People | </a>
					<a href="#">5000 Comments</a>
					<div class="divider"></div>

				</div>


				<div class="row">
					<div class="col s3 l2 offset-l6 ">
						<a href="#"><i class="tiny material-icons">thumb_up</i>Endorse</a>
					</div>
					<div class="col s3 l2">
						<a href="<?php echo "http://www.labpetri.com/forum/comments/". $row->post_id; ?>"><i class="tiny material-icons">forum</i>View Post</a>
					</div>
					<div class="col s3 l2">
						<a href="#"><i class="tiny material-icons">share</i>Share</a>
					</div>
				</div>
			</div>






			<?php } ?>

		</div>
		<div class="col l2 hide-on-med-and-down">
			<div class="card center">
				<div class="card-content center">
					<span class="card-title">Card Title</span>
					<p>News</p>
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


</body>
</html>

