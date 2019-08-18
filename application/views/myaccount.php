
<a style="font-size:20px;" href="<?php echo site_url('my-account'); ?>"><span class="ln ln-icon-Add-UserStar"></span> My Account</a>&nbsp;&nbsp;<a style="font-size:20px;" href="<?php echo site_url('my-exams'); ?>"><span class="ln ln-icon-Add-File"></span> My Exams</a>
<?php 
				   if ($user->everified != 1 && $user->login_type == 1) {
					   echo '<div class="notification warning closeable">Your email address hasn\'t been verified yet. Look for the verification email in your inbox and click the link in that email.</div>';
				   }
				?>

<?php 
				   if ($user->contact_email == "" && $user->login_type == 2) {
					   echo '<div class="notification warning closeable">Set a recovery contact email address so we can reach you in case we detect unusual activity in your Account or you accidentally get locked.</div>';
				   }

				   if ($user->contact_email != "" && $user->everified != 1) {
					   echo '<div class="notification warning closeable">Your recovery email address hasn\'t been verified yet. Look for the verification email in your inbox and click the link in that email.</div>';
				   }

				?>
<div class="my-account" style="margin:0px !important;">
		<div class="tabs-container">
			<div class="tab-content" id="tab2">
				

				<?php 
				   $error = validation_errors(); 
				   if ($error !="") {
					   echo '<div class="notification error closeable">'.$error.'</div>';
				   }
				?>

<?php  if ($user->login_type == 2) { ?>
				<form method="post" class="register" action="<?php echo site_url('my-account'); ?>">
					<input type="hidden" value="1" name="social" />
				<p class="form-row form-row-wide">
					<label for="username2">Full Name:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="name" id="username2" value="<?php echo $user->name; ?>" />
					</label>
					<?php echo form_error('name','<span style="color:red;">','</span>'); ?>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Contact Email Address:
						<i class="ln ln-icon-Mail" ></i>&nbsp;&nbsp;
						<input type="text" class="input-text " name="contact_email" id="email3" value="<?php echo $user->contact_email; ?>"  />
					</label>
					<?php echo form_error('contact_email','<span style="color:red;">','</span>'); ?>
				</p>
				<p class="form-row">
			<input type="submit" class="button border fw margin-top-10" name="register" value="Update" />
				</p>
				</form>
<?php } ?>




<?php  if ($user->login_type == 1) { ?>
				<form method="post" class="register" action="<?php echo site_url('my-account'); ?>">
					<input type="hidden" value="1" name="profile" />
				<p class="form-row form-row-wide">
					<label for="username2">Full Name:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="name" id="username2" value="<?php echo $user->name; ?>" />
					</label>
					<?php echo form_error('name','<span style="color:red;">','</span>'); ?>
				</p>
					
				<p class="form-row form-row-wide">
					<label for="email2">Email Address:
						<i class="ln ln-icon-Mail hide-email" style="display:none;"></i><span class="show-email"><?php echo $user->email; ?></span>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="showEdit();">edit</a>
						<input type="text" class="input-text hide-email" style="display:none;" name="email" id="email2" value="<?php echo $user->email; ?>"  />
					</label>
					<?php echo form_error('email','<span style="color:red;">','</span>'); ?>
				</p>
				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="register" value="Update" />
				</p>
				</form>
<?php } ?>
 <?php if ($user->login_type == 1) { ?>
				<form method="post" action="<?php echo site_url('my-account'); ?>">
				<input type="hidden" value="1" name="chk" />
				<h4 class="margin-bottom-10">Change Password</h4>
				<p class="form-row form-row-wide">
					<label for="password1">Current Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="opassword" id="password1"/>
					</label>
				</p>
				
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
<?php } ?>
			</div>
		</div>
	</div>
<script>
  function showEdit() {
    $('.hide-email').show();
    $('.sow-email').hide();
  }
</script>
