<?php
/*
 * Blog.
*/
get_header(); ?>
			<?php /* Start the Loop */ ?>
			<div class="blog_block">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php				
					get_template_part( 'content-blog', get_post_format() );
				?>
			<?php endwhile; ?>
			<?php taraza_paging_nav(); ?>
			</div><!-- blog_block -->
<?php get_footer(); ?>
