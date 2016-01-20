<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width", initial-scale=1.0, user-scalable=0 />
		<title><?php bloginfo('name'); ?></title>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/img/favicon.png"/>
		<?php wp_head(); ?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	</head>
<body <?php body_class(); ?>>
	<div class="container-fluid wrapper-header">
		<!-- site-header -->
		<header class="site-header">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					<?php if ( get_theme_mod( 'pcd_logo' ) ) : ?>
		    			<div class='site-logo'>
		        			<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'pcd_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
		    			</div>
						<?php else : ?>
						    <hgroup>
						        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
						        <h5 class='site-description'><?php bloginfo( 'description' ); ?><?php if(is_page(6)){ ?>- About Me
						        <?php } ?></h5>
						    </hgroup>
					<?php endif; ?>
					<nav class="site-nav">
					<?php 
						$args = array(
							'theme_location' => 'primary'
							);
					?>
					<?php wp_nav_menu( $args); ?>
				</nav>
				</div>
				<div class="hidden-xs col-sm-4">
					<div class="hd-search pull-right">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<div class="row tagline-row">
				<div class="col-md-12">
					<div class="tagline">
						<?php if(is_page(56)){ ?>
								<h1>Hello</h1>
								<p>welcome to my website</p>
						<?php }else{ ?>
								<h1><?php wp_title(''); ?></h1>
						<?php }
						?>
					</div>
				</div>
			</div>
			<img class="headshot" src="<?php echo get_template_directory_uri();?>/img/header.png" alt="<?php echo bloginfo('author'); ?>">
		</header> <!-- /site-header -->
	</div> <!-- wrappper-header -->
	<div class="container-fluid wrapper-main">