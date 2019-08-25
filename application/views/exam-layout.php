<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">

<title>My Exam</title>
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

	</div>
</div>
</header>
<div class="clearfix"></div>
<!-- Content
================================================== -->
<!-- Container -->
<div class="container" style="min-height:600px;">

    <?php echo $content; ?>	
</div>

<div class="margin-top-30"></div>

<div id="footer">
	<!-- Main -->
	
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
<script>
	    $('.subject-list').on('change', function() {

		    $('.subject-list').not(this).prop('checked', false);  

		});
</script>
</body>
</html>
