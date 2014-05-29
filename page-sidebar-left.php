<?php
/*
Template Name: Page with left sidebar
*/
get_header(); ?>
 <?php get_sidebar('left'); ?>
	<div id="primary" class="content-area-right">
		<main id="main" class="site-main-page" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->		
	</div><!-- #primary -->
<?php get_footer(); ?>
