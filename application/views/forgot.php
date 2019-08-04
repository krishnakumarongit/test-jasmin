<div class="my-account">
<ul class="tabs-nav1">
<li></li>
</ul>
<div class="tabs-container">
<!-- Login -->
<div class="tab-content" id="tab1" >
        <?php 
	 $error = validation_errors(); 
	 if ($error !="") {
	   echo '<div class="notification error closeable">'.$error.'</div>';
	  }
	?>
	<form method="post" class="login" onsubmit="return validate();">
                <input type="hidden" name="check_post" value="1" />
		<input type="hidden" name="_token" value="<?php echo $_SESSION['_token'] ?>" />
		<p class="form-row form-row-wide">
			<label for="username">Email:
				<i class="ln ln-icon-Male"></i>
				<input type="text" class="input-text" name="email" id="email" value="<?php echo set_value('email'); ?>" />
			</label>
                        <?php echo form_error('email','<span style="color:red;">','</span>'); ?>
			<span id="forgot_invalid_email" style="color:red;display:none;">The Email field must contain a valid email address.</span>
		</p>
		
		<p class="form-row">
			<input type="submit" class="button border fw margin-top-10" name="login" value="Submit" />
		</p>

		<p class="lost_password">
			<a href="<?php echo site_url('log-in'); ?>" >Looking for log-in? </a>
		</p>
	</form>
</div>
</div>
</div>
