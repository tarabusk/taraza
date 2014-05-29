<?php
/**
 * @package taraza
 */
?>
		<div class="view view-taraza" id="post-<?php the_ID(); ?>"> 	
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			else {
				echo '<img src="' . get_stylesheet_directory_uri() . '/img/default.png" />';
				echo '<div class="title-no-thumb">';the_title(); echo'</div>';
			} ?>
						
				<div class="mask">
				   <a href="<?php the_permalink() ?>">
					<h2><?php the_title(); ?></h2>
					<p><?php echo(get_the_excerpt()); ?></p>
										        							
				   </a>											
				</div>
		</div>