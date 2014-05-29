<?php
/**
 * taraza functions and definitions
 *
 * @package taraza
 */

 require_once (get_template_directory() . '/inc/admin-menu.php');


if ( ! function_exists( 'taraza_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function taraza_setup() {
	load_theme_textdomain( 'taraza', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'taraza' )
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'taraza_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	//Add additional generated image sizes
    add_image_size( 'taraza-slide', 460, 345, true ); //(cropped)
	add_image_size( 'taraza-list', 220, 150, true ); 
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}
}
endif; // taraza_setup
add_action( 'after_setup_theme', 'taraza_setup' );


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function taraza_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'taraza' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar(array(
        'name' => __( 'footer-right', 'taraza' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div class="footer-right" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ));	
	  register_sidebar(array(
        'name' => __( 'footer-center', 'taraza' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div class="footer-center" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ));	
	  register_sidebar(array(
        'name' => __( 'footer-left', 'taraza' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<div class="footer-left" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ));
	  register_sidebar(array(
        'name' => __( 'footer-bottom', 'taraza' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<div class="footer-bottom" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ));
	  
	  register_sidebar( array(
		'name' => 'Home Page Left',
		'id' => 'taraza_home_left',
		'before_widget' => '<div class="wgh_left" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => 'Home Page Right',
		'id' => 'taraza_home_right',
		'before_widget' => '<div class="wgh_right" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'taraza_widgets_init' );


	
/**
 * Enqueue scripts and styles.
 */
function taraza_scripts() {  
	wp_enqueue_script( 'taraza-js', get_template_directory_uri() . '/js/taraza.js',array( 'jquery' ),'',true);	
	wp_enqueue_style( 'taraza-style', get_stylesheet_uri() );
    wp_register_style('taraza-googleFonts', '//fonts.googleapis.com/css?family=Voltaire');
    wp_enqueue_style( 'taraza-googleFonts');
	
	wp_enqueue_script( 'taraza-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true ); 
    wp_enqueue_script( 'nice-scroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js','','',true);	 	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	
	global $taraza; 
	if ( ! empty ( $taraza['post_lightbox_id'] ) ) {
	  wp_enqueue_script('taraza_fancybox',get_template_directory_uri().'/js/fancybox.js','','',true);
	}
		
}
add_action( 'wp_enqueue_scripts', 'taraza_scripts' );

	

/**
 * Enqueue scripts and styles  in administration.
 */
function taraza_enqueue($hook) { 
    if( 'appearance_page_taraza' != $hook ) return;        
	wp_enqueue_script( 'taraza', get_template_directory_uri() . '/js/admin-taraza.js', array('wp-color-picker' ), false, true );
	wp_enqueue_script( 'joliselect', get_template_directory_uri() . '/js/joliSelect.js', array(),true );	
	wp_enqueue_style( 'taraza-admin', get_template_directory_uri() . '/css/taraza-admin.css' );	
	wp_enqueue_style( 'joliselectcss', get_template_directory_uri() . '/css/joliSelect.css' );	
	wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
}
add_action( 'admin_enqueue_scripts', 'taraza_enqueue' );


//Load Java Scripts to Footer
add_action('wp_footer', 'taraza_load_js');
function taraza_load_js() { ?>

<script type="text/javascript">
jQuery(window).load(function() {
/* slider */
    var n_im = jQuery('#ul_image li').length;
	if (n_im> 2){
		var w= jQuery("#HPImage").width() /2; 
		var st=false; 
		setInterval(function(){
			 if ((!jQuery("#xx").is(":visible")) && st==false){			
					jQuery("#HPImage ul").animate({marginLeft:-w},1200,function(){	           
					jQuery(this).css({marginLeft:0}).find("li:last").after(jQuery(this).find("li:first"));	 			
				 })  }
		  },<?php echo taraza_get_option('taraza_sl_pau'); ?>);   
    }
   jQuery( "#HPImage li" ).hover(
	  function() {
		st=true; 
	  }, function() {
		st=false;
	  } 
	);
});
</script>
	
	
	
<?php // } 
} 

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function taraza_ChangeColor($couleur,$changementTon){
  //<0 fonce la couleur , >0 eclaircit la couleur
  
  $couleur=substr($couleur,1,6);
  $cl=explode('x',wordwrap($couleur,2,'x',3));
  $couleur='';
  for($i=0;$i<=2;$i++){
   $cl[$i]=hexdec($cl[$i]);
  
   $cl[$i]=$cl[$i]+$changementTon;
   if($cl[$i]<0) $cl[$i]=0;
   if($cl[$i]>255) $cl[$i]=255;
   $couleur.=StrToUpper(substr('0'.dechex($cl[$i]),-2));
  }
  return '#'.$couleur; 
}


function taraza_decorer_titre ($titre, $n=2){
    if ($n<=1) $n=1;
	$l=strlen($titre);if ($n> $l) $n=$l;		
	$titre3= '</span>'.substr ( $titre,$n); 
	$titre1= substr ($titre,0, $n-1); 
	$titre2= substr ($titre,$n-1, 1); 
	return $titre1.'<span class="title_letter">'.$titre2.'</span>'.$titre3;
	
}

function taraza_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}
function taraza_custom_excerpt_length( $length ) {
return 40;
}
add_filter( 'excerpt_length', 'taraza_custom_excerpt_length', 999 );

function taraza_reduce_chaine($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words).' [...]';
}


if ( ! function_exists( 'taraza_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own taraza_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function taraza_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'taraza' ) . '</span>';

	

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'taraza' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'taraza' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'taraza' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

function taraza_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

	/***
	// Add Meta Boxes on Admin Post Init
	***/	
	add_action("admin_init", "taraza_admin_init");
	function taraza_admin_init(){
		add_meta_box("taraza-post-settings-meta", __("Custom Post Settings","taraza"), "taraza_post_settings_box", "post", "side", "default");				
	}
	
	/***
	//	Save
	***/
	add_action('save_post', 'taraza_save_meta_box_content');
	function taraza_save_meta_box_content(){
        $is_valid_nonce = ( isset( $_POST[ 'taraza_nonce' ] ) && wp_verify_nonce( $_POST[ 'taraza_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';	
		global $post;
		if ($post){
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE && !$is_valid_nonce) {
				return $post->ID;
			} else {
				if ( $post->post_type == 'post' ) {
				   $t_ps= sanitize_text_field($_POST["taraza_post_settings"]);
				   update_post_meta($post->ID, "taraza_post_settings", $t_ps);			
				}
				
			}	
		}
	}
	/***
	//	Meta Box Display
	***/
	function taraza_post_settings_box(){
	  global $post;
	  $taraza_custom = get_post_custom($post->ID);
	  $taraza_post_settings = isset($taraza_custom["taraza_post_settings"][0])?$taraza_custom["taraza_post_settings"][0]:'';
	  wp_nonce_field( basename( __FILE__ ), 'taraza_nonce' );?> 
	  <p><?php _e('Single post page layout:', 'taraza' ); ?> 
	  <select name="taraza_post_settings">
	  	<?php
	  		$taraza_custom_post_settings = array(
	  			'fullwidth' => __('Full Width','taraza'),
	  			'rightsidebar' => __('Right Sidebar','taraza'),
				'leftsidebar' => __('Left Sidebar','taraza'),
	  		);	
			foreach ( $taraza_custom_post_settings as $taraza_custom_settings_key => $taraza_custom_settings_value ) {				
			  	echo "<option " .selected( $taraza_custom_settings_key, $taraza_post_settings ) ." value='". esc_attr($taraza_custom_settings_key) ."'>" . $taraza_custom_settings_value . "</option>"; 
			}
	  	?>
		</select>
		</p>
	  <?php
	}

add_filter( 'the_title', 'taraza_title' );

function taraza_title( $title ) {
	if ( $title == '' ) {
	  return __('Untitled', 'taraza');
	} else {
	  return $title;
	}
}

?>