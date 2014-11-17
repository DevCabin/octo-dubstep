<?php
/**
 * The front page. Gotta have it.
 *
 * @package Azalea 2.0


=============================================

Starter Front-page.php

=============================================


 */

get_header(); ?>

	<div class="slide-container">
		<div class="new-slider">
			
<?php query_posts('cat=2'); while (have_posts()) : the_post(); ?>
<div>			
	<?php the_post_thumbnail(); ?>
<?php if(get_the_content() !="") { ?>
	<div class="slide-caption">
		<?php the_content(); ?>
	</div>
<?php } ?>
</div>			
<?php endwhile; ?>
<?php wp_reset_query(); ?>
			
			

		</div>
	</div>

	<div id="primary" class="content-area frontpage">
		<main id="main" class="site-main" role="main">
		<div class="container">
			

<?php include('big-three.php'); ?>

				<div class="sub-big-three row">
<?php while ( have_posts() ) : the_post(); ?>					
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php // the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<h1 class="entry-title">ORTHOPEDIC SURGERY, SPORTS MEDICINE &amp; <br/>
						PAIN MANAGEMENT FOR EAST TEXAS
					</h1>
					</header><!-- .entry-header -->
						<div class="entry-content">

							<?php the_content(); ?>

						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				
				</div>
			
		</div><!-- container -->

<div class="clearfix"></div>		

<?php include('yellow.php'); ?>

<?php include('blue.php'); ?>

<?php // include('vid.php'); ?>

<?php dynamic_sidebar( 'home-page-video' ); ?>

	<div class="clearfix"></div>

<?php endwhile; // end of the loop. ?>	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
