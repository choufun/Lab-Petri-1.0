<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==TRUE)) { ?>
   <?php echo form_open_multipart('Home', array('id' => 'new_forum_post'));?>
   <?php echo validation_errors(); ?>
    <!--<ul class="collapsible popout" data-collapsible="accordion">-->
    <ul class="collapsible" data-collapsible="expandable">
        <li>
            <div class="collapsible-header hoverable z-depth-0">
                <h5 class="grey-text text-darken-2 hide-on-med-and-down">
                    <small>
                        <i class="material-icons blue-grey-text">mode_edit</i>
                        Post a new career opportunity.
                    </small>
                </h5>
                <h6 class="grey-text text-darken-2 hide-on-large-only">
                    <small>
                        <i class="material-icons blue-grey-text">mode_edit</i>
                        Post a new career opportunity.
                    </small>
                </h6>
            </div>
            <div class="collapsible-body hoverable z-depth-5 white">
                <div class="container-fluid" style="padding: 0px 40px;">
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="title" type="text" class="validate">
                            <label class="blue-text" for="title"><strong>Position:</strong></label>
                        </div>
                        <div class="input-field col s12">
                            <textarea name="description" type="text" class="materialize-textarea"></textarea>
                            <label class="blue-text" for="description"><strong>Description:</strong></label>
                        </div>
                        <input type="hidden" name="new_opportunity" value="new_opportunity">
                        <div class="col s12 flow-text" align="center">
                            <button class="btn-large waves-effect grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                                    style="width:100%; height:100%;">
                                Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
   <?php echo form_close(); ?>
<?php } else { ?>
    <div class="card">
        <div align="center" class="card-content">
            <i class="material-icons">mode_edit</i>&nbsp;
            <span class="blue-text">Login</span> to <span class="green-text">post</span> a research.
        </div>
    </div>
<?php } ?>