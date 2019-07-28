<div class="my-account">
		<div class="tabs-container">
			<div class="tab-content" id="tab2">
				<?php 
				   $error = validation_errors(); 
				   if ($error !="") {
					   echo '<div class="notification error closeable">'.$error.'</div>';
				   }
				?>
				<form method="post" action="">
				<input type="hidden" value="1" name="chk" />
				<h4 class="margin-bottom-10">Reset Password</h4>
				<p class="form-row form-row-wide">
				 <label for="password1">New Password:
				     <i class="ln ln-icon-Lock-2"></i>
				     <input class="input-text" type="password" name="password" id="password1"/>
				 </label>
				</p>
				<p class="form-row form-row-wide">
				  <label for="password2">Repeat Password:
					<i class="ln ln-icon-Lock-2"></i>
					<input class="input-text" type="password" name="cpassword" id="password2"/>
				  </label>
				</p>
				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10"  value="Submit" />
				</p>
				</form>
			</div>
		</div>
	</div>
