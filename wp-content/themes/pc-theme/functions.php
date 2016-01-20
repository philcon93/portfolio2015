<?php

function add_resources(){
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );

	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"), false, '1.11.2', true);
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'instafeed-js', get_template_directory_uri() . '/js/instafeed.js',array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js',array('jquery'), '1.0.0', true );

	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts','add_resources');

//Get top ancestor
function get_top_ancestor_id(){
	global $post;

	if ($post->post_parent) {
		$ancestor = array_reverse(get_post_ancestors($post->ID));
		return $ancestor[0];
	}
		return $post->ID;
}
//Does page have Children
function has_children(){
	global $post;

	$pages = get_pages('child_of='.$post->ID);
	return count($pages);

}
// Customize excerpt word count length
function custom_excerpt_length(){
	return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');

//Theme setup
function pcdesigns_setup(){

	//Navigation Menus
	register_nav_menus(array(
		'primary'=> __( 'Primary Menu'),
		'footer'=> __( 'Footer Menu'),
	));

	//Add feature image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 120, true);

	add_image_size('banner-image', 920, 210, true);

	//Add post format support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'pcdesigns_setup');

//Add our widget locations
function our_widgets_init(){
	register_sidebar(array(
			'name'=>'Sidebar',
			'id'=>'sidebar1',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title'=> '<h4 class="sidebar-title">',
			'after_title' => '</h4>'
		));
	register_sidebar(array(
		'name'=>'Footer Area 1',
		'id'=>'footer1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title'=> '<h3 class="footer-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name'=>'Footer Area 2',
		'id'=>'footer2',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title'=> '<h3 class="footer-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name'=>'Footer Area 3',
		'id'=>'footer3',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title'=> '<h3 class="footer-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name'=>'Footer Area 4',
		'id'=>'footer4',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title'=> '<h3 class="footer-title">',
		'after_title' => '</h3>'
	));
}
add_action('widgets_init','our_widgets_init');

//Customize Appearence Options
function pcdesigns_customize_register($wp_customize){
	$wp_customize->add_setting('pcd_link_color', array(
		'default'=>'#006ec3',
		'transport'=>'refresh'
		));
	$wp_customize->add_setting('pcd_btn_color', array(
		'default'=>'#006ec3',
		'transport'=>'refresh'
		));
	$wp_customize->add_setting('pcd_btn_hover_color', array(
		'default'=>'#4d8fc1',
		'transport'=>'refresh'
		));
	$wp_customize->add_section('pcd_standard_colors', array(
		'title'=>__('Standard Colors' , 'PC Designs Theme'),
		'priority'=>30
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pcd_link_color_control' , array(
		'label'=>__('Link Color', 'PC Designs Theme'),
		'section'=>'pcd_standard_colors',
		'settings'=>'pcd_link_color'
		)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pcd_btn_color_control' , array(
		'label'=>__('Button Color', 'PC Designs Theme'),
		'section'=>'pcd_standard_colors',
		'settings'=>'pcd_btn_color'
		)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pcd_btn_hover_color_control' , array(
		'label'=>__('Button Hover Color', 'PC Designs Theme'),
		'section'=>'pcd_standard_colors',
		'settings'=>'pcd_btn_hover_color'
		)));
	//Add logo that replaces title and description
	$wp_customize->add_section( 'pcd_logo_section' , array(
	    'title'       => __( 'Logo', 'PC Designs Theme' ),
	    'priority'    => 20,
	    'description' => 'Upload a logo to replace the default site name and description in the header',
		));
	$wp_customize->add_setting( 'pcd_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pcd_logo', array(
	    'label'    => __( 'Logo', 'PC Designs Theme' ),
	    'section'  => 'pcd_logo_section',
	    'settings' => 'pcd_logo',
		)));
}
add_action('customize_register','pcdesigns_customize_register');

//Output Customize CSS
function pcdesigns_customize_css(){ ?>
	<style type="text/css">
		a:link,
		a:visited{
			color:<?php echo get_theme_mod('pcd_link_color')?>;
		}
		.site-header nav ul li.current-menu-item a:link,
 		.site-header nav ul li.current-menu-item a:visited,
 		.site-header nav ul li.current-page-ancestor a:link,
 		.site-header nav ul li.current-page-ancestor a:visited{
 			background-color:<?php echo get_theme_mod('pcd_link_color')?>;
 		}
 		div.hd-search #searchsubmit{
 			background-color:<?php echo get_theme_mod('pcd_btn_color')?>;
 		}
 		div.hd-search #searchsubmit:hover{
 			background-color:<?php echo get_theme_mod('pcd_btn_hover_color')?>;
 		}
 		.btn{
 			background-color:<?php echo get_theme_mod('pcd_btn_color')?>;
 		}
 		.btn:hover{
 			background-color:<?php echo get_theme_mod('pcd_btn_hover_color')?>;
 		}
 		a.home-posts-button{
 			background-color:<?php echo get_theme_mod('pcd_btn_color')?>;
 		}
 		a.home-posts-button:hover{
 			background-color:<?php echo get_theme_mod('pcd_btn_hover_color')?>;
 		}
	</style>
<?php }
add_action('wp_head','pcdesigns_customize_css');