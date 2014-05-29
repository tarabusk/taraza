<?php
/**
 * @package taraza
 */
?>

<article id="post-<?php the_ID(); ?>" class="post_list" >
    <?php 
	  $tarazanivoimg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'taraza-list', false, '' );
	  if ( $tarazanivoimg ) {  ?>
	        <a href="<?php the_permalink(); ?>" rel="bookmark">
			<img src="<?php echo $tarazanivoimg[0] ?>"  data-thumb="<?php echo $tarazanivothmb ?>" alt="<?php the_title(); ?>" title="" />
		    </a>
		<?php	}?>
			
		
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php //taraza_posted_on(); ?>
		</div><!-- .entry-meta -->
		
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
	
		<?php echo taraza_reduce_chaine(get_the_excerpt(), 8) ; ?>
		<div class="clear"> </div>
	</div><!-- .entry-summary -->

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'taraza' ) );
				if ( $categories_list && taraza_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf($categories_list); ?>
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

		

		<?php //edit_post_link( __( 'Edit', 'taraza' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
