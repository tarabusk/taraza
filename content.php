<?php
/**
 * @package taraza
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php //taraza_posted_on(); ?>
		</div><!-- .entry-meta -->
		
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_archive() || is_front_page()) :  ?>
	<div class="entry-summary">
	<?php if ( has_post_thumbnail() ) { 
				the_post_thumbnail('thumbnail');
			}
		?>
		<?php the_excerpt(); ?>
		<div class="clear"> </div>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
	<?php if (has_post_thumbnail() ) {
				the_post_thumbnail('medium');
			}
		?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'taraza' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'taraza' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'taraza' ) );
				if ( $categories_list && taraza_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'taraza' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'taraza' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'taraza' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'taraza' ), __( '1 Comment', 'taraza' ), __( '% Comments', 'taraza' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'taraza' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
