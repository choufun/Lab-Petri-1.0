<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	 <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

 

</head>
	<div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content black-text">
				<b><center><h4><?php echo $post->title?></h4></b></center>
			  <center><h5><?php echo "Posted by: ". $post->firstname . " " . $post->lastname?></h5></center>
			 <i> <b><center><h6><?php echo "Submitted Under: ". $post->topic;?></h6></b></center></i>
				<div class="white divider" style=" padding-top:30px";></div>
		
				<p class="flow-text"><textarea style="max-width: 100%; height:600px; border:none;"><?php echo $post->abstract?></textarea></p>
				
				<div class="divider"></div>
			  <h6><i><?php echo $post->additional_info?></i></h6>
				  
			  <a href="http://www.labpetri.com/files/research_paper/<?php echo $post->file_path?>">
				<h5><center>View Attached File</center></h6>
				 
			  </a>
		   </div>
			</div>
		</div>
	</div>


<!--COMMENT SECTION!!!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------->
	   <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content black-text">
              <span class="card-title">Comments on the Research</span>
				<?php echo form_open('http://www.labpetri.com/Forum/new_comment_post/'.$post->post_id)?>
				<?php echo validation_errors(); ?>
					<div class="input-field col s12">
          			<textarea name="new_parent_comment" type = "text" class="materialize-textarea" length="2500"></textarea>
          			<label for="new_parent_comment">Submit Your Insight To This Research!</label>
				<div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
				</div>
			</div>
		<?php 
			if($comments->num_rows() > 0){
			foreach($comments->result() as $row){ ?>
				<div class="row">
        			<div class="col s12">
          				<div class="card">
            				<div class="card-content black-text">
								<div class="row">
									<div class="col s2 l1">
              							<img src="/assets/profile_pic/profile.jpg" class="circle responsive-img"> 
									</div>
									<div class="col s10 l11">
											<b class="hide-on-large-only"><?php echo $row->firstname . " " .  $row->lastname; ?></b>
										    <b class="hide-on-large-only"><?php echo " | " .  $row->school; ?></b>

											<b class="hide-on-med-and-down"><?php echo $row->firstname . " " .  $row->lastname; ?></b>
											<h6 class="hide-on-med-and-down"><?php echo "University: " . $row->school; ?></h6>
											<h6 class="hide-on-med-and-down"><?php echo "Posted on: " . $row->school; ?></h6>
									</div>
									<div class="col s12">
										  <div class="divider"></div>
										  <p><?php echo $row->message; ?></p>
									</div>
								</div>
            				</div>
							<div>
								<div class="divider"></div>
								<a href="#">Endorsed by 5000 People | </a>
								<a href="#">5000 Comments</a>
							</div>
            				<div>
								<div class="divider"></div>
								<div class= "row">
									<div class="col s4 l1">
										<a href="#"><i class="material-icons">thumb_up</i>Endorse</a>
									</div>
									<div class="col s4 l1">
										<a href="#"><i class="material-icons">reply</i>Reply</a>
									</div>
								</div>
            				</div>
							<?php 
							if($replies->num_rows() > 0){
								foreach($replies->result() as $reply){
									if($reply->comment_id === $row->comment_id){?>
								<div>
									<h5><?php echo $reply->reply_message;?></h5>
								</div>
							<?php }}}?>
							
          				</div>
        			</div>
     			 </div>
		<?php }
		}		?>
    
	</div>
			</div>
		   </div>
	</div>
