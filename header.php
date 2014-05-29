<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package taraza
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">	
		
	   <?php if (taraza_get_option('taraza_sn')=='on'){ ?>
				<div id="network">
				   <?php 
				   if (taraza_get_option('taraza_sn1')!='') echo '<a href="'.esc_url(taraza_get_option('taraza_sn1')).'">
				       <img class="network" src="'.get_template_directory_uri().'/img/facebook-icon.png";" alt=""/>
					 </a>';
				   if (taraza_get_option('taraza_sn2')!='') echo '<a href="'.esc_url(taraza_get_option('taraza_sn2')).'">
				     <img class="network" src="'.get_template_directory_uri().'/img/linkedin-icon.png";" alt=""/>
					 </a>';
				   if (taraza_get_option('taraza_sn3')!='') echo '<a href="'.esc_url(taraza_get_option('taraza_sn3')).'">
				     <img class="network" src="'.get_template_directory_uri().'/img/twitter-icon.png";" alt=""/>
					 </a>';
				   ?>
				</div>
			<?php } ?>
	    <div class="taraza_width">	
				<div class="header_logo">
				 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				 <?php $nlt=taraza_get_option('taraza_header_nlt'); if ($nlt==''){$nlt=1;}?>
				 <?php if ($nlt!=0) {echo taraza_decorer_titre (get_bloginfo( 'name' ), $nlt);} else {echo get_bloginfo( 'name' );} ?> </a>                 
				</div> 
				<div class="header_content">
					<div class="site-description">
					 <?php bloginfo( 'description' ); ?></div>
					
					<nav id="nav_main" class="nav_header" role="navigation">
						<div class="menu-toggle"></div>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'menu_main' ,'container_class' => 'menu_header', 'after'=>'', 'fallback_cb' => 'wp_page_menu',) ); ?>				
					</nav><!-- #nav_main -->
				</div>
			<div class="clear"> </div>
        </div>
		  
	</header><!-- #masthead -->

	<div id="content" class="site-content">
