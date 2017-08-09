<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="front" class="container-fluid">
    <div class="card-content login-border">
        <span class="red-text" style="display: inline-block; padding: 0px 0px 40px;"><?php echo validation_errors(); ?></span>

       <?php echo form_open('login'); ?>

        <!-- EMAIL
        ---------------------------------------------------------------------->
        <div class="row">
            <div class="input-field" >
                <input name="email" type="email" style="text-align:center; font-size:1.2em;" class="validate grey-text text-darken-2">
                <label class="green-text text-darken-2 active" style="font-size:1.2em" for="email">Email:</label>
            </div>
        </div>

        <!-- PASSWORD
        ---------------------------------------------------------------------->
        <div class="row">
            <div class="input-field">
                <input id="login_password" name="password" type="password" style="text-align:center; font-size:1.2em;" class="validate grey-text text-darken-2">
                <label class="green-text text-darken-2 active" style="font-size:1.2em" for="password">Password:</label>
            </div>
        </div>
        <input type="hidden" name="login" value="login">

        <!-- LOGIN
        ---------------------------------------------------------------------->
        <div class="row">

            <div class="row col s12 m6">
                <button class="front btn-large grey lighten-5 grey-text text-darken-3" type="submit" name="action"
                        style="width:100%; height:100%;" id="login_button">
                    <h5><span class="grey-text text-darken-3"><small>Login</small></span></h5>
                </button>
            </div>

            <div class="row col s12 m6">
                <button class="btn-large grey lighten-5 grey-text" onclick="return show('back','front');"
                        style="width:100%; height:100%;">
                    <h5><small>Sign Up</small></h5>
                </button>
            </div>


        </div>
       <?php echo form_close(); ?>
    </div>
</div>