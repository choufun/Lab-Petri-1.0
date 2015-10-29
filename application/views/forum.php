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
			<a href="<?php echo "http://www.labpetri.com/forum/comments/". $row->post_id; ?>"><div class="card-panel hoverable small forum-border">
				
				<div class="row">
					<div class="col s2 l2 grey lighten-2">
						<img class="responsive-img circle" src="files/profile_picture/<?php echo $pic; ?>">
						<h6><b><center><?php echo " " . $row->firstname . " " . $row->lastname;?></center></b></h6>
						<h6><center><?php echo " " . $row->school;?></center></h6>
					</div>
					<div class="col s9 l8 white">
						<a href="<?php echo "http://www.labpetri.com/forum/comments/". $row->post_id; ?>"><h6><b><?php echo $row->title;?></b></h6></a>
						<i><?php echo "In " . $row->topic ?></i>
						<div class="divider"></div>
					</div>
					<div class="col s1 l2 white">
						<span class="blue-text text-darken-2"><center><h5><b>+100</b></h5></center></span>

					</div>

				</div>
			
			</div>





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


</body>
</html>

