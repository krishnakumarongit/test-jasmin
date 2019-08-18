<div class="my-account">
<ul class="tabs-nav1">
<li>Don't have an account? <a href="<?php echo site_url('sign-up'); ?>">Sign up</a></li>
</ul>
<div class="tabs-container">
<!-- Login -->
<div class="tab-content" id="tab1" >
	<form method="post" class="login" action="" onsubmit="return login_validate();">
<input type="hidden" name="_token" value="<?php echo $_SESSION['_token'] ?>" />
<?php 
				   $error = validation_errors(); 
				   if ($error !="") {
					   echo '<div class="notification error closeable">'.$error.'</div>';
				   }
				?>
<input type="hidden" value="1" name="chk" />
<div style="text-align:center;height:55px;">
<ul class="social-icons" style="margin:auto;width:50%;">
					<li><a class="facebook" href="<?php echo site_url('/facebook'); ?>"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="<?php echo site_url('/twitter'); ?>"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="<?php echo site_url('/google'); ?>"><i class="icon-gplus"></i></a></li>
				</ul>
<span style="clear:both;">&nbsp;</span>
</div>

<hr />
		<p class="form-row form-row-wide">
			<label for="username">Email:
				<i class="ln ln-icon-Mail"></i>
				<input type="text" class="input-text" name="email" id="username" value="<?php echo set_value('email'); ?>" />
			</label>
                        <?php echo form_error('email','<span style="color:red;">','</span>'); ?>
                        <span id="login_email" style="color:red;display:none;">The Email field is required.</span>
		</p>
		<p class="form-row form-row-wide">
			<label for="password">Password:
				<i class="ln ln-icon-Lock-2"></i>
				<input class="input-text" type="password" name="password" id="password"/>
			</label>
                        <?php echo form_error('password','<span style="color:red;">','</span>'); ?>
                       <span id="login_password" style="color:red;display:none;">The Password field is required.</span>
		</p>
		<p class="form-row">
			<input type="submit" class="button border fw margin-top-10" name="login" value="Login" />
		</p>

		<p class="lost_password">
			<a href="<?php echo site_url('forgot-password'); ?>" >Lost your password ?</a>
		</p>
	</form>
</div>
</div>
</div>
