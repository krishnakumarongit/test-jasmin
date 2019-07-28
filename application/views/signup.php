<div class="my-account">

		<ul class="tabs-nav1">
			<li class="">Already have an account?&nbsp;<a href="<?php echo site_url('log-in'); ?>">Log in</a></li>
		</ul>

		<div class="tabs-container">
			<div class="tab-content" id="tab2">
				<?php 
				   $error = validation_errors(); 
				   if ($error !="") {
					   echo '<div class="notification error closeable">'.$error.'</div>';
				   }
				?>
				<form method="post" class="register" action="<?php echo site_url('sign-up'); ?>" autocomplete="off">	
				<input type="hidden" name="check_post" value="1" />
				<p class="form-row form-row-wide">
					<label for="username2">Full Name:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="fullname" id="fullname" value="<?php echo set_value('fullname'); ?>" autocomplete="off"/>
						
					</label>
					<?php echo form_error('fullname','<span style="color:red;">','</span>'); ?>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Email Address:
						<i class="ln ln-icon-Mail"></i>
						<input type="text" class="input-text" name="email" id="email" value="<?php echo set_value('email'); ?>" autocomplete="off" />
					</label>
					<?php echo form_error('email','<span style="color:red;">','</span>'); ?>
				</p>

				<p class="form-row form-row-wide">
					<label for="password1">Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password" value="<?php echo set_value('password'); ?>" id="password1" autocomplete="off" />
					</label>
                                        <i style="float:right;">* 6 or more characters</i>
					<?php echo form_error('password','<span style="color:red;">','</span>'); ?>
				</p>

				<p class="form-row form-row-wide">
					<label for="password2">Repeat Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>" id="password2" autocomplete="off" />
					</label>
					<?php echo form_error('cpassword','<span style="color:red;">','</span>'); ?>
				</p>

				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
				</p>

				</form>
			</div>
		</div>
	</div>
