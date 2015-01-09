
///////////////////////////////////////////////////////////////////////////////

So you got a new project. Here's what to do:

1. Go to underscores.me and get a custom starter

2. Go to http://getbootstrap.com and get bootstrap (minified produciton one)

Extract and open both side by side

Copy the css folder from BS to the Underscores theme
Same with Fonts
Then open the BS JS folder and copy the files to the js folder in the theme

Copy "class-tgm-plugin-activation.php" over to the theme root folder.

Now time to open up functions.php

**If you need extra widget areas, there's code at the bottom**



Now to Modify the "enqueue_scripts" and styles stuff

in Functions.php Find this : 

/**
 * Enqueue scripts and styles.
 **/


For me it was on line 162
Do Bootstrap stuff above the stuff thats there. We want 
underscore to trump BS if there's a conflict. 

Also add the Slick files to the right folders, totally forgot.

Here is my complete one for the theme I'm working on while making these notes:

// CNTRL+H "THEME_NAME" with the current theme slug
<?php
/*
===============================================
Begin Code for Functions.php around line 165
===============================================
*/

function THEME_NAME_scripts() {
	//styles
	// Bootstrap
	wp_enqueue_style( 'THEME_NAME-bs-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20141031', true );
	wp_enqueue_style( 'THEME_NAME-bs-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '20141031', true );
	// Slick (the slider slider you'll ever need)
	wp_enqueue_style( 'THEME_NAME-slick-style', get_template_directory_uri() . '/css/slick.css', array(), '20141031', false );
	// Actual theme stylesheet so changes in the backend will stick
	wp_enqueue_style( 'THEME_NAME-style', get_stylesheet_uri() );


	//scripts
	// You gotta have modernizr
	wp_enqueue_script( 'THEME_NAME-modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '20141031', true );
	// More BS (bootstrap)
	wp_enqueue_script( 'THEME_NAME-bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20141031', true );
	// Underscore_s stuff
	wp_enqueue_script( 'THEME_NAME-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20141031', true );
	wp_enqueue_script( 'THEME_NAME-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	// And finally Slick slider js
	wp_enqueue_script( 'THEME_NAME-slick-slider', get_template_directory_uri() . '/js/slick.min.js', array(), '20141021', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dakota_plains_scripts' );

// Add jQuery the right way: http://css-tricks.com/snippets/wordpress/include-jquery-in-wordpress-theme/
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// End this bit of custom code

/*
In case the next dev who sees this is better than me ...
I know this is a little heavy. But speed of development trumps speed of load time
in 99% of our use cases. When I have the time I will trim this workflow and eliminate
un-used or redundant code.
*/


/*
===============================================
END
===============================================
*/
?>
A note on the above code: 

And un-comment line 41 
or add this line as needed:

add_theme_support( 'post-thumbnails' );


And finally, paste all this next part at the very bottom of your functions.php :

===================================================
Bottom of Functions.php
===================================================


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.3.6
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		/*
		array(
			'name'     				=> 'Wordpress Creation Kit PRO', // The plugin name
			'slug'     				=> 'wordpress-creation-kit-pro', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/wordpress-creation-kit-pro_2.0.6.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.0.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
               */
		// This is an example of how to include a plugin from the WordPress Plugin Repository
		array(
			'name' 		=> 'PHP Code Widget',
			'slug' 		=> 'php-code-widget',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Limit Login Attempts',
			'slug' 		=> 'limit-login-attempts',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Google XML Sitemaps',
			'slug' 		=> 'google-sitemap-generator',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'InfiniteWP Client',
			'slug' 		=> 'iwp-client',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Black Studio TinyMCE Widget',
			'slug' 		=> 'black-studio-tinymce-widget',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'ACF',
			'slug' 		=> 'advanced-custom-fields',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'WCK Custom Post Types',
			'slug' 		=> 'wck-custom-fields-and-custom-post-types-creator',
			'required' 	=> false,
		),		
		

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tgmpa';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}


// Custom Theme Options
function my_theme_admin_init() {
     register_setting('my_options', 'my_theme_options');
}

function setup_theme_admin_menus() {
    add_menu_page('Theme settings', '724 Options', 'manage_options', 
        '724_theme_settings', 'theme_front_page_settings');
         
    add_submenu_page('724_theme_settings', 
        'Front Page Elements', 'Front Page', 'manage_options', 
        '724_theme_settings', 'theme_front_page_settings'); 
}

function theme_front_page_settings() {
?>
<div class="wrap">
        <?php screen_icon('themes'); ?> 
        <h2>Theme Options</h2>
<form method="post" action="options.php">
    <?php 
    // Load the options from the WP db
    $options = get_option('my_theme_options');
    // WP built-in function to display the appropriate fields for saving options
    settings_fields("my_options"); ?>

    <h3>Top Logo Options</h3>
    <h4>Leave Fields Blank if you don't want to use them.</h4>
    <table class="form-table">
        <tr>
            <th scope="row">Paste in the URL of the new logo:</th>
            <td>
                <input type="text" name="my_theme_options[new_logo]" size="40" value="<?php echo stripslashes($options["new_logo"]); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">How many pixels top?</th>
            <td>
                <input type="text" name="my_theme_options[c_top]" size="40" value="<?php echo stripslashes($options["c_top"]); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">How many pixels left?</th>
            <td>
                <input type="text" name="my_theme_options[c_left]" size="40" value="<?php echo stripslashes($options["c_left"]); ?>" />
            </td>
        </tr>
         
    </table>
    <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
    

    <h3>Other Settings</h3>
    
    <table class="form-table">
        <tr>
            <th scope="row">Paste in the URL of your FAVICON:</th>
            <td>
                <input type="text" name="my_theme_options[favicon_url]" size="40" value="<?php echo stripslashes($options["favicon_url"]); ?>" />
            </td>
        </tr>
               
    </table>
    <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>  

</form>
</div>
<?php
}


add_action("admin_init", "my_theme_admin_init");
add_action("admin_menu", "setup_theme_admin_menus");

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

=============================
END Bottom of Functions.php
=============================




}?>
===================

Php and HTML bits 
by section

===================


===================
HEADER
===================

<!-- // If using theme options -->
<?php // add this to the top of every PHP file where you will need the options
	$options = get_option('my_theme_options'); 
?>

<style>
/*
Example usage of theme options
*/
#logo-top {
position: relative;
top: <?php echo get_option( 'my_theme_options[c_top]', $options["c_top"] ); ?>px;
left: <?php echo get_option( 'my_theme_options[c_left]', $options["c_left"] ); ?>px;
}
</style>

<!-- dynamic meta description -->
<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta name="description" content="
<?php wp_title(); ?> - 
<?php 
	$full_content = get_the_content(); // the_content minus formatting
	$new_content = strip_tags($full_content); // remove any formatting left
	echo substr($new_content, 0, 80); // limit the number of characters 
?> - <?php bloginfo('name'); ?>"  /> 
<?php endwhile; endif; elseif(is_home()) : ?>
<meta name="description" content="<?php wp_title(); ?> - <?php bloginfo('description'); ?>" />
<?php endif; ?>
<!--//  dynamic meta description -->

<?php /* // make cool modern stuff compatible with old crappy browsers 
// Here is two versions of the same thing, pick ONE

// Version ONE
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->   
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


// Version TWO
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
   <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<![endif]-->
*/
?>

===================
Front page / Pages
===================
// this ones not great for multiple on page
<h2>RECENT MEDIA POSTS</h2>
				
			<div class="home-entry">

				<?php
				global $post;
				$myposts = get_posts('numberposts=2&category=3');
				foreach($myposts as $post) :
				?>

				<h3><?php the_title(); ?></h3>
				<p><?php the_excerpt(); ?>
				</p><a class="home-readmore" href="<?php the_permalink(); ?>">READ MORE</a>

				<?php endforeach; ?>

			</div>
<div class="clearfix"></div>
<a class="blue_btn bpadd" href="/category/news/">MORE FROM THE MEDIA CENTER</a>



// ===================================
// ===================================


// this one is mucho better - used on enhancehc
			<?php 
				$args = array ( 'cat' => 8, 'showposts' => 3 );
				$custom_query = new WP_Query( $args );	

					if ( $custom_query->have_posts() ):
				    while ( $custom_query->have_posts() ) :
				        $custom_query->the_post();
			?>	
		
			<div class="col-md-4">
				<h3><?php the_title(); ?></h3>

			    <p><p class="hexc"><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,16); ?></p></p>

				<div class="readmore"><a href="<?php the_permalink(); ?>">READ MORE</a></div>
			</div>

			<?php endwhile; endif; wp_reset_query(); ?>	

// ===================================
// ===================================

<?php
// Goes with the excerpt function in functions.php
  $excerpt = get_the_excerpt();
  echo string_limit_words($excerpt,25);
?>


// ===================================
// ===================================

<small>This entry was posted on 
<?php the_time('l, F jS, Y') ?> at 
<?php the_time() ?> and is filed 
under <?php the_category(', ') ?>. You 
can follow any responses to this entry 
through the <?php comments_rss_link('RSS 2.0'); ?> 
feed.</small>


=====================
FOOTER
=====================


<div class="col-md-12">
		Copyright &copy; <?php echo date(Y); ?> <?php echo get_bloginfo('name'); ?>. All Rights Reserved. SITE DESIGNED AND DEVELOPED BY <a href="http://724factory.com" rel="designer">724 FACTORY <a href="http://724factory.com" rel="designer"><img src="/wp-content/uploads/2014/11/724icon_07.png" alt="724 factory logo" /></a>
</div>



<script type="text/javascript">

$('.new-slider').slick({
        autoplay: true
});// do not put in doc.ready function

$(document).ready(function(){

	$('a').each(function() {
		var a = new RegExp('/' + window.location.host + '/');
		if(!a.test(this.href)) {
		    $(this).click(function(event) {
		        event.preventDefault();
		        event.stopPropagation();
		        window.open(this.href, '_blank');
		    });
		}
	});

	$(document).ready(function(){ 
	  $('.top-right').find(".search-field").each(function(ev)
		  {
		    if(!$(this).val()) { 
		    $(this).attr("placeholder", "quick search");
		  }
	  });
	});		

}); // END $(document).ready
</script>

=============================
CSS
=============================

To make the menu on mobile work : 
// currently line 530 in style.css

.toggled ul ul {
    background: none repeat scroll 0 0 #fff;
    box-shadow: none;
    float: none;
    left: auto;
    position: relative;
    top: 1px;
    z-index: 99999;
}
.toggled ul.sub-menu {
    display: inline-block;
}
.toggled li {
    float:none;
}

.slide-caption {
		margin-left: 20%;
		padding: 20px;
		position: absolute;
		top: 145px;
		width: 50%;
}
.slide-caption p {
		color: #fff;
		font-family: "Open Sans",sans-serif;
		font-size: 4.5em;
		font-weight: bold;
		line-height: 1em;
		margin-bottom: 7px;
		text-shadow: 2px 2px 2px #000;
}

==============================
Extra widgets
==============================


Find the one little "register_sidebar" they have, and paste in these below it:

========================================
A huge set of commented out widgets
========================================

register_sidebar(array(
    'name'          => __('Primary', 'THEME_NAME'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'THEME_NAME'),
    'id'            => 'sidebar-footer',
    'description'   => 'Top left footer branding area',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 2', 'THEME_NAME'),
    'id'            => 'sidebar-footer-2',
    'description'   => 'Copyright info',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 3', 'THEME_NAME'),
    'id'            => 'sidebar-footer-3',
    'description'   => 'Bottom Left Menu Area',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Footer Copyright Left', 'THEME_NAME'),
    'id'            => 'sidebar-footer-4',
    'description'   => 'Below Footer Widgets, LEFT SIDE',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));  
  register_sidebar(array(
    'name'          => __('Footer Copyright Right', 'THEME_NAME'),
    'id'            => 'sidebar-footer-5',
    'description'   => 'Below Footer Widgets, RIGHT SIDE',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));   
  register_sidebar(array(
    'name'          => __('Far right Wider footer widget', 'THEME_NAME'),
    'id'            => 'sidebar-footer-6',
    'description'   => 'Far right wide footer section with icons at the top.',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));


======================================

Possible to do list and working notes

======================================

2015 Ultimate WP Starter theme

Ok, Ashley added to folder and gallery.html added for demo
from http://ashleydw.github.io/lightbox/

TO DO:

Maybe? https://github.com/taylormsj/acf-cf7 - CF7 for ACF :)
WP Security Audit Log : https://wordpress.org/plugins/wp-security-audit-log/
https://wordpress.org/plugins/ip-blacklist-cloud/

All I want from Bootstrap it seems is the col-md-* type
grid code and the responsive utilities. As of todays version of 
Bootstrap (11.17.14 v3.3.1) here's what you need: 
line 1389 - 2296 - includes basic table styling
and 
6038 - the end of the doc. 

I have included it in this folder, 
as bootstrap.darklit.css and bootstrap.darklit.min.css





Export field groups to PHP from ACF and include in theme :

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_home-page',
		'title' => 'Home Page',
		'fields' => array (
			array (
				'key' => 'field_545fcdb26deda',
				'label' => 'Green Area Text',
				'name' => 'green_area_text',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_545fce512de29',
				'label' => 'Green Area Name',
				'name' => 'green_area_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '508',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

// documentation

Instructions

    Copy the PHP code generated
    Paste into your functions.php file
    To activate any Add-ons, edit and use the code in the first few lines.


Notes

Registered field groups will not appear in the list of editable field groups. This is useful for including fields in themes.

Please note that if you export and register field groups within the same WP, you will see duplicate fields on your edit screens. To fix this, please move the original field group to the trash or remove the code from your functions.php file.


Include in theme

The Advanced Custom Fields plugin can be included within a theme. To do so, move the ACF plugin inside your theme and add the following code to your functions.php file:

include_once('advanced-custom-fields/acf.php');

To remove all visual interfaces from the ACF plugin, you can use a constant to enable lite mode. Add the following code to your functions.php file before the include_once code:

define( 'ACF_LITE', true );
