<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package taraza
 */
?>

	</div><!-- #content -->
	<footer id="footer-widget" class="site-footer" role="contentinfo">	
	<div id="" class="taraza_width"> 
		<?php if ( !dynamic_sidebar('footer-left')) : ?>
        <!-- If no widget -->
		<?php endif; ?>	
		<?php if ( !dynamic_sidebar('footer-center')) : ?>
        <!-- If no widget -->
		<?php endif; ?>	
		<?php if ( !dynamic_sidebar('footer-right')) : ?>
        <!-- If no widget -->
		<?php endif; ?>		
	
		<div class="clear"> </div>
	</div>
	</footer><!-- #colophon -->	
	<footer id="colophon" class="site-footer" role="contentinfo">	
		<div class="taraza_width site-info">
		<?php if (!dynamic_sidebar('footer-bottom')) : ?>
        <!-- If no widget -->
		<?php do_action( 'taraza_credits' ); ?>
			<a href="<?php echo esc_url('http://wordpress.org/'); ?>" rel="generator"><?php printf(__( 'Proudly powered by %s', 'taraza' ), 'WordPress'); ?></a>
			<span class=""> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'taraza' ), 'TaraZa', '<a href="'.esc_url('http://tarabusk.net').'" rel="designer">Tarabusk</a>' ); ?>
		<?php endif; ?>	
			
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>