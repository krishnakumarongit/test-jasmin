<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">

<title><?php echo isset($meta['title']) ? $meta['title'] : ''; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="<?php echo site_url('assets/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/css/colors/green.css'); ?>" id="colors">

<link rel="shortcut icon" href="<?php echo site_url('favicon.ico'); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo site_url('favicon.ico'); ?>" type="image/x-icon">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>
<div id="wrapper">


<!-- Header
================================================== -->
<header class="sticky-header">
<div class="container">
	<div class="sixteen columns">

		<!-- Logo -->
		<div id="logo">
			<h1><a href="index.html"><img src="<?php echo site_url('assets/images/logo.png'); ?>" alt="Work Scout" /></a></h1>
		</div>

		<!-- Menu -->
		<nav id="navigation" class="menu">
			<ul id="responsive">

				<li><a href="index.html">Home</a>
					<ul>
						<li><a href="index.html">Home #1</a></li>
						<li><a href="index-2.html">Home #2</a></li>
						<li><a href="index-3.html">Home #3</a></li>
						<li><a href="index-4.html">Home #4</a></li>
						<li><a href="index-5.html">Home #5</a></li>
					</ul>
				</li>

				<li><a href="#">Pages</a>
					<ul>
						<li><a href="job-page.html">Job Page</a></li>
						<li><a href="job-page-alt.html">Job Page Alternative</a></li>
						<li><a href="resume-page.html">Resume Page</a></li>
						<li><a href="shortcodes.html">Shortcodes</a></li>
						<li><a href="icons.html">Icons</a></li>
						<li><a href="pricing-tables.html">Pricing Tables</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</li>

				<li><a href="#">For Candidates</a>
					<ul>
						<li><a href="browse-jobs.html">Browse Jobs</a></li>
						<li><a href="browse-categories.html">Browse Categories</a></li>
						<li><a href="add-resume.html">Add Resume</a></li>
						<li><a href="manage-resumes.html">Manage Resumes</a></li>
						<li><a href="job-alerts.html">Job Alerts</a></li>
					</ul>
				</li>

				<li><a href="#">For Employers</a>
					<ul>
						<li><a href="add-job.html">Add Job</a></li>
						<li><a href="manage-jobs.html">Manage Jobs</a></li>
						<li><a href="manage-applications.html">Manage Applications</a></li>
						<li><a href="browse-resumes.html">Browse Resumes</a></li>
					</ul>
				</li>

				<li><a href="blog.html">Blog</a></li>
			</ul>


			<ul class="responsive float-right">
<?php  if (isset($_SESSION['id']) && $_SESSION['id'] > 0 ) { ?>
<li><a href="<?php echo site_url('my-account'); ?>"><i class="fa fa-user"></i> My Account</a></li>
<li><a href="<?php echo site_url('logout'); ?>"><i class="fa fa-lock"></i> Logout</a></li>
<?php } else { ?>
<li><a href="<?php echo site_url('sign-up'); ?>"><i class="fa fa-user"></i> Sign Up</a></li>
<li><a href="<?php echo site_url('log-in'); ?>"><i class="fa fa-lock"></i> Log In</a></li>
<?php } ?>
	</ul>

		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>



<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<h2><?php echo isset($bc['title']) ? $bc['title'] : ''; ?></h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<?php echo isset($bc['link']) ? $bc['link'] : ''; ?>
				</ul>
			</nav>
		</div>

	</div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">
	<?php if(isset($_SESSION['success']) && $_SESSION['success'] !="" ){ ?>
	<div class="notification success closeable">
			<?php echo $_SESSION['success']; ?>
		</div>
	<?php } $_SESSION['success'] = ''; ?>
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] !="" ){ ?>
	<div class="notification error closeable">
			<?php echo $_SESSION['error']; ?>
		</div>
	<?php } $_SESSION['error'] = ''; ?>
	
    <?php echo $content; ?>	
</div>

<div class="margin-top-30"></div>

<div id="footer">
	<!-- Main -->
	<div class="container">

		<div class="seven columns">
			<h4>About</h4>
			<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			<a href="#" class="button">Get Started</a>
		</div>

		<div class="three columns">
			<h4>Company</h4>
			<ul class="footer-links">
				<li><a href="#">About Us</a></li>
				<li><a href="#">Careers</a></li>
				<li><a href="#">Our Blog</a></li>
				<li><a href="#">Terms of Service</a></li>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Hiring Hub</a></li>
			</ul>
		</div>
		
		<div class="three columns">
			<h4>Press</h4>
			<ul class="footer-links">
				<li><a href="#">In the News</a></li>
				<li><a href="#">Press Releases</a></li>
				<li><a href="#">Awards</a></li>
				<li><a href="#">Testimonials</a></li>
				<li><a href="#">Timeline</a></li>
			</ul>
		</div>		

		<div class="three columns">
			<h4>Browse</h4>
			<ul class="footer-links">
				<li><a href="#">Freelancers by Category</a></li>
				<li><a href="#">Freelancers in USA</a></li>
				<li><a href="#">Freelancers in UK</a></li>
				<li><a href="#">Freelancers in Canada</a></li>
				<li><a href="#">Freelancers in Australia</a></li>
				<li><a href="#">Find Jobs</a></li>

			</ul>
		</div>

	</div>

	<!-- Bottom -->
	<div class="container">
		<div class="footer-bottom">
			<div class="sixteen columns">
				<h4>Follow Us</h4>
				<ul class="social-icons">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
				<div class="copyrights">©  Copyright 2015 by <a href="#">Work Scout</a>. All Rights Reserved.</div>
			</div>
		</div>
	</div>
</div>

<div id="backtotop"><a href="#"></a></div>

</div>

<script src="<?php echo site_url('assets/scripts/jquery-2.1.3.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/custom.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/jquery.superfish.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/jquery.themepunch.tools.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/jquery.themepunch.revolution.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/jquery.themepunch.showbizpro.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/jquery.flexslider-min.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/chosen.jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/waypoints.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/jquery.counterup.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/jquery.jpanelmenu.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/stacktable.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/headroom.min.js'); ?>"></script>

<?php echo isset($js) ? $js : ''; ?>
</body>
</html>
