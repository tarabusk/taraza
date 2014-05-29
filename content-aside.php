<?php
/**
 * The template for displaying posts in the Aside post format.
 *
 * @package WordPress
 * @subpackage taraza
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'taraza' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'taraza' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php if ( is_single() ) : ?>
			<?php taraza_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'taraza' ), '<span class="edit-link">', '</span>' ); ?>

			<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
				<?php get_template_part( 'author-bio' ); ?>
			<?php endif; ?>

		<?php else : ?>			
			<?php edit_post_link( __( 'Edit', 'taraza' ), '<span class="edit-link">', '</span>' ); ?>
		<?php endif; // is_single() ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
