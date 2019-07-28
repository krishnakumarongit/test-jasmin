<div class="my-account">
<ul class="tabs-nav1">
<li>Don't have an account? <a href="<?php echo site_url('sign-up'); ?>">Sign up</a></li>
</ul>
<div class="tabs-container">
<!-- Login -->
<div class="tab-content" id="tab1" >
	<form method="post" class="login" action="">
<?php 
				   $error = validation_errors(); 
				   if ($error !="") {
					   echo '<div class="notification error closeable">'.$error.'</div>';
				   }
				?>
<input type="hidden" value="1" name="chk" />
		<p class="form-row form-row-wide">
			<label for="username">Email:
				<i class="ln ln-icon-Mail"></i>
				<input type="text" class="input-text" name="email" id="username" value="" />
			</label>
                        <?php echo form_error('email','<span style="color:red;">','</span>'); ?>
		</p>
		<p class="form-row form-row-wide">
			<label for="password">Password:
				<i class="ln ln-icon-Lock-2"></i>
				<input class="input-text" type="password" name="password" id="password"/>
			</label>
                        <?php echo form_error('password','<span style="color:red;">','</span>'); ?>
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
