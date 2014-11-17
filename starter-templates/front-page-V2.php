<?php
/**
 * The front page. Gotta have it.
 *
 * @package Dakota Plains
 */

get_header(); ?>

	<div class="slide-container hidden-xs">
		<div class="new-slider">
		
		<?php
		wp_reset_query();
		$args = array( 'post_type' => 'slider', 'posts_per_page' => 12 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		?>
			<div>	
				<img src="<?php the_field('image');?>" alt="<?php the_title();?> - <?php echo get_the_content();?>" />	
				<div class="slide-caption">
					<?php the_content();?>
				</div>
			</div>

		<?php endwhile; wp_reset_query(); ?>

			<?php
			/*
			 query_posts('cat=2'); while (have_posts()) : the_post(); ?>
			<div>			
				<?php the_post_thumbnail(); ?>
			<?php if(get_the_content() !="") { ?>
				<div class="slide-caption">
					<?php the_content(); ?>
				</div>
			<?php } ?>
			</div>			
			<?php endwhile; ?>
			<?php wp_reset_query();  
			*/ 
			?>
			

		</div>
	</div>

	<div class="slide-container-mobile visible-xs-inline-block">
	<div class="clear clearfix"></div>	
		
			<div class="slide-caption">
				<?php the_field('slide_area_text');?>
			</div>
			
	<div class="clear clearfix"></div>
	</div>


	<div class="sub-slide container">
		<div class="row">
			<div class="col-md-3">
				<a href="<?php the_field('big_three_link_one');?>"><img src="/wp-content/uploads/2014/11/button_pay-online_DAKP.png" alt="" /></a>
				<br />
				<a href="<?php the_field('big_three_link_one');?>"><img src="/wp-content/uploads/2014/11/button_learn-more_pay-online2.png" alt="" /></a>
			</div>
			<div class="col-md-3">
				<a href="<?php the_field('big_three_link_two');?>"><img src="/wp-content/uploads/2014/11/button_pay-online_MRI.png" alt="" /></a>
				<br />
				<a href="<?php the_field('big_three_link_two');?>"><img src="/wp-content/uploads/2014/11/button_learn-more_pay-online2.png" alt="" /></a>
			</div>
			<div class="col-md-3">
				<a href="<?php the_field('big_three_link_three');?>"><img src="/wp-content/uploads/2014/11/button_Tour-our-facility.png" alt="" /></a>
			</div>	
		</div>	
	</div>


	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">
		<h2 class="home">About Us</h2>	

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'dakota-plains' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php // edit_post_link( __( 'Edit', 'dakota-plains' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

			<div class="home-readmore">
				<a href="<?php the_field('read_more_link');?>"><img src="/wp-content/uploads/2014/11/button_learn-more_large.png" alt="" /></a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- #content -->	
<?php endwhile; // end of the loop. ?>

<?php include('careers.php'); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="patient-resources">
	<div class="container">
		<div class="col-md-4">
			<h4>Patient Resources</h4>
		</div>
		<div class="col-md-8 pr_right">
			
			<?php the_field('patient_resources_text');?>
			
			<div class="ctas">
				<a class="first" href="<?php the_field('link_one_url');?>"><?php the_field('link_one_text');?></a>
				<a class="second" href="<?php the_field('link_two_url');?>"><?php the_field('link_two_text');?></a>
			</div>
		</div>
	</div>
</div>

<?php endwhile; // end of the loop. ?>
<div>

<?php get_footer(); ?>
