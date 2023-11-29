<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>SmartEDU - Education Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
	<!-- Url theme -->
	<?php $urltheme = get_bloginfo('stylesheet_directory'); ?>
    <?php wp_head(); ?>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 

	<!-- Modal -->
	<!-- <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Customer Login</h4>
			</div>
			<div class="modal-body customer-box">
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
					<li><a href="#Registration" data-toggle="tab">Registration</a></li>
					<li style="border-left: 1px solid #eea412;"><a href="<?php echo site_url( "wp-login.php" ) ?>" >Login Admin</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email1" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Email" type="email">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<a href="">
										<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
											Submit
										</button>
									</a>
									<a class="for-pwd" href="javascript:;">Forgot your password?</a>
									
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="mobile" placeholder="Mobile" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="password" placeholder="Password" type="password">
								</div>
							</div>
							<div class="row">							
								<div class="col-sm-10">
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Save &amp; Continue
									</button>
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div> -->

    <!-- LOADER -->
	<!-- <div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div> -->
	<!-- END LOADER -->	
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo site_url('/index.php') ?>">
					<img src="<?php echo get_theme_file_uri() . '/assets/images/logo.png' ?> " alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					 <!-- <?php
					wp_nav_menu( array(
						'theme_location' => 'themeLocationOne',
						'menu_class'=> 'navbar-nav ml-auto', 
						'add_li_class'  => 'nav-item'
					));
					?> -->
					
					
					
					<ul class="navbar-nav ml-auto">
						<li class="nav-item <?php echo (is_page('home-page')) ? 'active' : ''; ?>">
							<a class="nav-link" href="<?php echo site_url('/') ?>">Home</a>
						</li>
						<li <?php if (get_post_type() == 'about' OR wp_get_post_parent_id( get_the_ID())) echo 'class="nav-item active"'; else echo 'class="nav-item"'; ?>>
							<a class="nav-link" href="<?php echo site_url('/about') ?>">About</a>
						</li>
						<li <?php if(get_post_type() == 'event' OR is_page('past-events') )  echo 'class="nav-item active"'; else echo 'class="nav-item"'; ?> ><a class="nav-link" href="<?php echo site_url('/event') ?>">Events</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="<?php echo site_url('/programmes') ?>" id="dropdown-a" data-toggle="dropdown">Programmes </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="<?php echo site_url( '/programmes/english') ?>">English </a>
								<a class="dropdown-item" href="<?php echo site_url( '/programmes/math') ?>">Math </a>
								<a class="dropdown-item" href="<?php echo site_url( '/programmes/biology') ?>">Biology </a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="<?php echo site_url('/blog') ?>" id="dropdown-a" data-toggle="dropdown">Blog </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="<?php echo site_url('/blog') ?>">Blog </a>
								<a class="dropdown-item" href="<?php echo site_url('/blog-single') ?>">Blog single </a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="<?php echo site_url('/professors') ?>">Professors</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo site_url('/pricing') ?>">Pricing</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo site_url('/contact') ?>">Contact</a></li>
						<li>
							<span class="js-search-trigger site-header__search-trigger nav-item" style="cursor: pointer;">
								<i class="fa fa-search" aria-hidden="true"></i></span>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if(is_user_logged_in()) { 
								?>
								<li>
									<a href="<?php echo wp_logout_url(); ?>" class="btn btn--small btn--dark-orange float-left btn--with-photo">
										<span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60 ); ?></span>
										<span class="btn__text nav-link">Logout</span>
									</a>
								</li>
								<?php
							} else {
								?>
							<li><a class="hover-btn-new log orange" href="<?php echo site_url( "wp-login.php" ) ?>"><span>Login</span></a></li>
						<?php
							}
						?>
                        
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->