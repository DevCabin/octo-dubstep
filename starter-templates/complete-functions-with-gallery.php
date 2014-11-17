<?php
/**
 * THEME_NAME functions and definitions
 *
 * @package THEME_NAME
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'THEME_NAME_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function THEME_NAME_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on THEME_NAME, use a find and replace
	 * to change 'THEME_NAME' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'THEME_NAME', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'THEME_NAME' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'THEME_NAME_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // THEME_NAME_setup
add_action( 'after_setup_theme', 'THEME_NAME_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function THEME_NAME_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'THEME_NAME' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'THEME_NAME_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function THEME_NAME_scripts() {
	//styles
	// Bootstrap
	wp_enqueue_style( 'THEME_NAME-bs-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20141031', 'all' );
	wp_enqueue_style( 'THEME_NAME-bs-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '20141031', 'all' );
	// Slick (you know, the slider slider you'll ever need)
	wp_enqueue_style( 'THEME_NAME-slick-style', get_template_directory_uri() . '/css/slick.css', array(), '20141031', 'all' );
	// Lightbox for Bootstrap from http://ashleydw.github.io/lightbox/
	wp_enqueue_style( 'THEME_NAME-lightbox-style', get_template_directory_uri() . '/css/ekko-lightbox.min.css', array(), '20141107', 'all' );
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
	// Slick slider js
	wp_enqueue_script( 'THEME_NAME-slick-slider', get_template_directory_uri() . '/js/slick.min.js', array(), '20141021', true );
	// And lightbox js
	wp_enqueue_script( 'THEME_NAME-lightbox', get_template_directory_uri() . '/js/ekko-lightbox.min.js', array(), '20141107', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'THEME_NAME_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// All my custom stuff



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
	/*
		array(
			'name' 		=> 'PHP Code Widget',
			'slug' 		=> 'php-code-widget',
			'required' 	=> false,
		),
	*/
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
    
    <!--h3>Social Icons</h3>
    <h4>Leave Fields Blank if you don't want to use them.</h4>
    <table class="form-table">
        <tr>
            <th scope="row">Paste in the URL of your Facebook PAGE:</th>
            <td>
                <input type="text" name="my_theme_options[facebook_url]" size="40" value="<?php echo stripslashes($options["facebook_url"]); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">URL of your Facebook LOGO (upload in Media section first):</th>
            <td>
                <input type="text" name="my_theme_options[facebook_logo_url]" size="40" value="<?php echo stripslashes($options["facebook_logo_url"]); ?>" />
            </td>
        </tr>
       <tr>
            <th scope="row">Paste in the URL of your Twitter PAGE:</th>
            <td>
                <input type="text" name="my_theme_options[Twitter_url]" size="40" value="<?php echo stripslashes($options["Twitter_url"]); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">URL of your Twitter LOGO (upload in Media section first):</th>
            <td>
                <input type="text" name="my_theme_options[Twitter_logo_url]" size="40" value="<?php echo stripslashes($options["Twitter_logo_url"]); ?>" />
            </td>
        </tr>
       <tr>
            <th scope="row">Paste in the URL of your LinkedIN PAGE:</th>
            <td>
                <input type="text" name="my_theme_options[linkedin_url]" size="40" value="<?php echo stripslashes($options["linkedin_url"]); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">URL of your LinkedIN LOGO (upload in Media section first):</th>
            <td>
                <input type="text" name="my_theme_options[linkedin_logo_url]" size="40" value="<?php echo stripslashes($options["linkedin_logo_url"]); ?>" />
            </td>
        </tr>        
    </table>
    <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p-->    

    <h3>Other Settings</h3>
    
    <table class="form-table">
        <tr>
            <th scope="row">Paste in the URL of your FAVICON:</th>
            <td>
                <input type="text" name="my_theme_options[favicon_url]" size="40" value="<?php echo stripslashes($options["favicon_url"]); ?>" />
            </td>
        </tr>
        <!--tr>
            <th scope="row">URL of your Facebook LOGO (upload in Media section first):</th>
            <td>
                <input type="text" name="my_theme_options[facebook_logo_url]" size="40" value="<?php echo stripslashes($options["facebook_logo_url"]); ?>" />
            </td>
        </tr>
       <tr>
            <th scope="row">Paste in the URL of your Twitter PAGE:</th>
            <td>
                <input type="text" name="my_theme_options[Twitter_url]" size="40" value="<?php echo stripslashes($options["Twitter_url"]); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">URL of your Twitter LOGO (upload in Media section first):</th>
            <td>
                <input type="text" name="my_theme_options[Twitter_logo_url]" size="40" value="<?php echo stripslashes($options["Twitter_logo_url"]); ?>" />
            </td>
        </tr>
       <tr>
            <th scope="row">Paste in the URL of your LinkedIN PAGE:</th>
            <td>
                <input type="text" name="my_theme_options[linkedin_url]" size="40" value="<?php echo stripslashes($options["linkedin_url"]); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">URL of your LinkedIN LOGO (upload in Media section first):</th>
            <td>
                <input type="text" name="my_theme_options[linkedin_logo_url]" size="40" value="<?php echo stripslashes($options["linkedin_logo_url"]); ?>" />
            </td>
        </tr-->        
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
  /*
  // Usage
  $excerpt = get_the_excerpt();
  echo string_limit_words($excerpt,25);
  */
}

add_filter( 'the_content_more_link', 'modify_read_more_link' );
	function modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">[ READ MORE ]</a>';
}
