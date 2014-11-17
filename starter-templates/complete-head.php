<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Dakota Plains
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<?php // add this to the top of every PHP file where you will need the options
	$options = get_option('my_theme_options'); 
?>

<style>
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

<?php // make cool modern stuff compatible with old crappy browsers ?>
 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!--[if lt IE 9]>
   <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<![endif]-->



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'dakota-plains' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding" id="logo-top">
			
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_option( 'my_theme_options[new_logo]', $options["new_logo"] ); ?>" alt="Logo for <?php bloginfo( 'name' ); ?>" /></a>
			</h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'dakota-plains' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
