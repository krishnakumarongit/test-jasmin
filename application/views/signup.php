<div class="my-account">

		<ul class="tabs-nav1">
			<li class="">Already have an account?&nbsp;<a href="<?php echo site_url('log-in'); ?>">Log in</a></li>
		</ul>

		<div class="tabs-container">
			<div class="tab-content" id="tab2">
<div style="text-align:center;height:55px;">
<ul class="social-icons" style="margin:auto;width:50%;">
					<li><a class="facebook" href="<?php echo site_url('/facebook'); ?>"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="<?php echo site_url('/twitter'); ?>"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="<?php echo site_url('/google'); ?>"><i class="icon-gplus"></i></a></li>
				</ul>
<span style="clear:both;">&nbsp;</span>
</div>
<hr />
				<?php 
				   $error = validation_errors(); 
				   if ($error !="") {
					   echo '<div class="notification error closeable">'.$error.'</div>';
				   }
				?>
				<form method="post" class="register" onsubmit="return registerValidate();" action="<?php echo site_url('sign-up'); ?>" autocomplete="off">	
				<input type="hidden" name="check_post" value="1" />
				<input type="hidden" name="_token" value="<?php echo $_SESSION['_token'] ?>" />
				<p class="form-row form-row-wide">
					<label for="username2">Full Name:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="fullname" id="fullname" value="<?php echo set_value('fullname'); ?>" autocomplete="off"/>
						
					</label>
					<?php echo form_error('fullname','<span style="color:red;">','</span>'); ?>
 					<span id="reg_name" style="color:red;display:none;">The Full Name field is required.</span>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Email Address:
						<i class="ln ln-icon-Mail"></i>
						<input type="text" class="input-text" name="email" id="email" value="<?php echo set_value('email'); ?>" autocomplete="off" />
					</label>
					<?php echo form_error('email','<span style="color:red;">','</span>'); ?>
					<span id="reg_email" style="color:red;display:none;">The Email field is required.</span>
				</p>

				<p class="form-row form-row-wide">
					<label for="password1">Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" id="password1" autocomplete="off" />
					</label>
                                        <i style="float:right;">* 6 or more characters</i>
					<?php echo form_error('password','<span style="color:red;">','</span>'); ?>
                                        <span id="reg_password" style="color:red;display:none;">The Password field is required.</span>
				</p>

				<p class="form-row form-row-wide">
					<label for="password2">Repeat Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="cpassword" id="cpassword" value="<?php echo set_value('cpassword'); ?>" id="password2" autocomplete="off" />
					</label>
					<?php echo form_error('cpassword','<span style="color:red;">','</span>'); ?>
                                        <span id="reg_cpassword" style="color:red;display:none;">The Repeat Password field is required.</span>
					<span id="reg_cpassword_confirm" style="color:red;display:none;">The Password and Repeat Password don't match.</span>
				</p>

				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
				</p>

				</form>
			</div>
		</div>
	</div>
