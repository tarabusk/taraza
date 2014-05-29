<?php

if(taraza_get_option('taraza_hp_txt1') !='' || taraza_get_option('taraza_hp_txt2') !=''){
  echo '<div id="div_hp">';
  if (taraza_get_option('taraza_hp_txt1') != ''){    
    echo '<h1 id="titre_hp">'.taraza_get_option('taraza_hp_txt1').' </h1>';
  }
  if (taraza_get_option('taraza_hp_txt2') != ''){    
    echo '<div id="slogan_hp">'.taraza_get_option('taraza_hp_txt2').' </div>';
  }
  echo '</div>';
}	

?>

<?php if (taraza_get_option('taraza_sl')=='on') {?>
<div id="HPImage">
<?php
  $n_sl=6;
  $aff_dft=taraza_get_option('taraza_hp_sl_im1_id')=='';						   
    echo ' <ul id="ul_image">  ';
	for($i = 1; $i <= $n_sl; $i++){	                  			   
				   $tarazalink = taraza_get_option( 'taraza_hp_sl_lk'.$i); 
				   $tarazanivoimg = wp_get_attachment_image_src( taraza_get_option('taraza_hp_sl_im'.$i.'_id'), 'taraza-slide', false, '' ); 
                   $titre =taraza_get_option('taraza_hp_sl_title'.$i);$legend=taraza_get_option('taraza_hp_sl_txt'.$i);				   				 	  
				  ?>	
				<?php if (taraza_get_option('taraza_hp_sl_im'.$i.'_id')!=''){ ?>
			  <?php  ?>
				<li style="background:url('<?php echo $tarazanivoimg[0] ?>') no-repeat; height:340px;">	
					<a href="<?php echo $tarazalink; ?>">
					<!--<img src="<?php echo $tarazanivoimg[0] ?>"   alt="<?php echo $titre; ?>" />-->
					<?php if (trim($titre)=='' && trim($legend)==''){?> 
					  <div class="back_home_legend" style="opacity:0;" >
					<?php  }else{ ?> 	
					  <div class="back_home_legend" >
					<?php  } ?> 
				    
					<?php if ($tarazalink!='') {?><div class="kmore"> <?php  echo __('+', 'taraza'); ?></div> <?php } ?> 
				    
						<div class="home_legend" > 
				    		<h3> <?php echo $titre; ?></h3>
				    		<?php echo $legend; ?>
				  			
				   		</div>	
					
				    </div>
				    </a>					
				</li>

                <?php }else if ($i <=4 && $aff_dft){ ?>
                   <li style="background:url('<?php echo get_template_directory_uri(); ?>/img/slide<?php echo $i;?>.jpg') no-repeat; height:340px;">	
					<a href="#">
					<!--<img  src="<?php echo get_template_directory_uri(); ?>/img/slide<?php echo $i;?>.jpg" />-->
				    <div class="back_home_legend" >
					<div class="kmore"> <?php  echo __('+', 'taraza'); ?></div> 
				    	<div class="home_legend" > 
				    		<h3> TaraZa</h3>
				    		<?php echo __('Theme Wordpress - Add a link and a legend ','taraza'); echo ' '.$i."";  ?>
				  			
				   		</div>
				    </div>
				    </a>
					
				    </li>
                   
              <?php  }	?>
			 
             			  
			<?php } ?>	 	
    <?php echo '</ul>  ';
       
	?>	
</div>
<div class="clear"></div>
<div id="xx"></div>
</div>
<?php } ?>
<?php if (is_active_sidebar('taraza_home_left') || is_active_sidebar('taraza_home_right')) {?>	
<div  class="taraza_sep_width"> 
		<?php if ( !dynamic_sidebar('taraza_home_left')) : ?>
        <!-- If no widget -->
		
		<?php endif; ?>	
		
		<?php if (!dynamic_sidebar('taraza_home_right')) : ?>
        <!-- If no widget -->
		<?php endif; ?>		
	
		<div class="clear"> </div>
</div>
<?php } ?>	
<div class="sep"></div>
<?php if (is_page()){  ?>
<div id="primary-home" class="content-area">
		<main id="main" class="site-main-page" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'taraza' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
					<?php edit_post_link( __( 'Edit', 'taraza' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
				</article>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
</div><!-- #primary -->
<?php } ?>
<div class="blog_block">
    
		<?php //wp_reset_postdata();  ?>
		<?php $taraza_query = new WP_Query('&ignore_sticky_posts=1&paged='.$paged); ?>
		<?php while ($taraza_query -> have_posts()) : $taraza_query -> the_post(); ?>
			<?php get_template_part( 'content-blog', get_post_format() );	?>												
		<?php endwhile; ?>
		<?php taraza_paging_nav(); ?>	
	
</div><!-- blog_block -->
	 
