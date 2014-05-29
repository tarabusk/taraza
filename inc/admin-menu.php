<?php

// create custom plugin settings menu
add_action('admin_menu', 'taraza_menu');
 
function taraza_menu() {
 
   add_theme_page(
        
		__('Options TaraZa Theme', 'taraza'), 
		__('Options TaraZa', 'taraza'),            
		'administrator',       
		'taraza',        
		'taraza_settings'  
		
	);
 
	
    //call register settings function
    add_action( 'admin_init', 'taraza_register_settings' );

}


function taraza_register_settings() {
    register_setting( 'taraza', 'taraza_tab_options', 'taraza_tab_sanitize');
}

function taraza_sanitize_hex_color( $color ) {
	if ( '' === $color )
		return '';
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;

	return null;
}

$taraza_tab_options= array(    
    'taraza_fcl' => '#222222', // Font Color
    'taraza_lcl' => '#d21f43', // Link Color 
    'taraza_ff' => 'Roboto Condensed',         // Font Family
    'taraza_title_ff' => 'Roboto Condensed',   // Titles Font Family (h1, h2 ...)
	
    'taraza_header_bkcl' => '#ffffff', // header bacground color
	'taraza_header_fcl' => '#1a1a1a',         // header font color
	'taraza_header_ff' => 'Roboto Condensed',          // header font family
	'taraza_header_ccl' => '#d21f43',  // Menu hover Color
	'taraza_header_clnlt' => '#d21f43', //Color of the enlightned letter
	'taraza_header_nlt' => '',          //Enlight the nth letter of the title
	
	
	'taraza_hp_txt1' => '',            // Home page Title
	'taraza_hp_txt2' => '',            // Home page Slogan
	'taraza_hp_nblog' => 9,            // Home page Slogan
	
	'taraza_sl' => 'on',      // Display Slider	
	'taraza_sl_pau' => 5000,  //  Slider speed	
	
	'taraza_hp_sl_title1' => '',
	'taraza_hp_sl_txt1' => '',
	'taraza_hp_sl_lk1' => '',
	'taraza_hp_sl_im1' => '',
	'taraza_hp_sl_im1_id' => '',
	
	'taraza_hp_sl_title2' => '',
	'taraza_hp_sl_txt2' => '',
	'taraza_hp_sl_lk2' => '',
	'taraza_hp_sl_im2' => '',
	'taraza_hp_sl_im2_id' => '',
	
	'taraza_hp_sl_title3' => '',
	'taraza_hp_sl_txt3' => '',
	'taraza_hp_sl_lk3' => '',
	'taraza_hp_sl_im3' => '',
	'taraza_hp_sl_im3_id' => '',
	
	'taraza_hp_sl_title4' => '',
	'taraza_hp_sl_txt4' => '',
	'taraza_hp_sl_lk4' => '',
	'taraza_hp_sl_im4' => '',
	'taraza_hp_sl_im4_id' => '',
	
	'taraza_hp_sl_title5' => '',
	'taraza_hp_sl_txt5' => '',
	'taraza_hp_sl_lk5' => '',
	'taraza_hp_sl_im5' => '',
	'taraza_hp_sl_im5_id' => '',
	
	'taraza_hp_sl_title6' => '',
	'taraza_hp_sl_txt6' => '',
	'taraza_hp_sl_lk6' => '',
	'taraza_hp_sl_im6' => '',
	'taraza_hp_sl_im6_id' => '',
		
			
	'taraza_sn' => 'off',
	'taraza_sn1' => '',
	'taraza_sn2' => '',
	'taraza_sn3' => '',
	'taraza_sn4' => '',
	
	'taraza_sel' => '',	
);

function taraza_get_option($opt){
    global $taraza_tab_options;
    $tab_opt=get_option('taraza_tab_options', $taraza_tab_options);	
	$opt=$tab_opt[$opt];  
	return $opt; 
}

function taraza_tab_sanitize($input) {
//var_dump($input);exit;


  global $taraza_tab_options;
  $options = get_option('taraza_tab_options', $taraza_tab_options ); 

   $options['taraza_fcl'] = trim(taraza_sanitize_hex_color($input['taraza_fcl']));
   $options['taraza_lcl'] = trim(taraza_sanitize_hex_color($input['taraza_lcl']));
    $options['taraza_ff'] = trim(sanitize_text_field($input['taraza_ff']));
   $options['taraza_title_ff'] = trim(sanitize_text_field($input['taraza_title_ff']));
 
   $options['taraza_header_bkcl'] = trim(taraza_sanitize_hex_color($input['taraza_header_bkcl']));
   $options['taraza_header_fcl'] = trim(taraza_sanitize_hex_color($input['taraza_header_fcl']));
   $options['taraza_header_ff'] = trim(sanitize_text_field($input['taraza_header_ff']));
   $options['taraza_header_ccl'] = trim(taraza_sanitize_hex_color($input['taraza_header_ccl']));
   $options['taraza_header_clnlt'] = trim(taraza_sanitize_hex_color($input['taraza_header_clnlt']));
   $options['taraza_header_nlt'] = trim(intval($input['taraza_header_nlt']));
   
    
	$options['taraza_hp_txt1'] = trim(sanitize_text_field($input['taraza_hp_txt1']));
	$options['taraza_hp_txt2'] = trim(sanitize_text_field($input['taraza_hp_txt2']));
	$options['taraza_hp_nblog'] = trim(intval($input['taraza_hp_nblog']));
	
	
	$options['taraza_sl'] = trim(sanitize_text_field($input['taraza_sl']));	
	$options['taraza_sl_pau'] = trim(intval($input['taraza_sl_pau']));
	
	$n_sl=6;
    for($i = 1; $i <= $n_sl; $i++){
	    $options['taraza_hp_sl_title'.$i] = trim(sanitize_text_field($input['taraza_hp_sl_title'.$i]));
		$options['taraza_hp_sl_txt'.$i] = trim(sanitize_text_field($input['taraza_hp_sl_txt'.$i]));
		$options['taraza_hp_sl_lk'.$i] = trim(esc_url_raw($input['taraza_hp_sl_lk'.$i]));
		$options['taraza_hp_sl_im'.$i] = trim(sanitize_text_field($input['taraza_hp_sl_im'.$i]));
		$options['taraza_hp_sl_im'.$i.'_id'] = trim(sanitize_text_field($input['taraza_hp_sl_im'.$i.'_id']));
    }
	
	$options['taraza_sn'] = trim(sanitize_text_field($input['taraza_sn']));
	$options['taraza_sn1'] = trim(esc_url_raw($input['taraza_sn1']));
	$options['taraza_sn2'] = trim(esc_url_raw($input['taraza_sn2']));
	$options['taraza_sn3'] = trim(esc_url_raw($input['taraza_sn3']));
	$options['taraza_sn4'] = trim(esc_url_raw($input['taraza_sn4']));
	
    $options['taraza_sel'] = trim($input['taraza_sel']);
	
	return $options;
}


function taraza_settings( )
{

  global $taraza_tab_options;  
  $options = get_option('taraza_tab_options', $taraza_tab_options ); 
  $arrayFont=array('Roboto Condensed','Josefin Slab','Droid Sans','PT Sans' ,'Arvo','Neucha','Pacifico','Merienda', 'Raleway','Yanone Kaffeesatz', 'Fjalla One');
?>
	<div class="wrap-admin">
		<ul class="menu-admin"> 
		  <li id="menu_gen"><?php echo __('General','taraza'); ?></li> 
		  <li id="menu_sli"><?php echo __('Home Page','taraza'); ?> </li>	  
		  <li id="menu_goo"><?php echo __('Infos','taraza'); ?></li>		
		</ul>
		
		
		<form method="post" action="options.php">	    
		    <input type="hidden"  name="taraza_tab_options[taraza_sel]" id="taraza_sel" value="<?php echo $options[ 'taraza_sel' ]; ?>">
			<?php	
				settings_fields( 'taraza' );		
			?>
            <div class="bloc_menu" id="bloc_gen">	
			  <!-- HEADER -->
				    <fieldset>
					   <legend><?php echo __('Header','taraza'); ?></legend>
						<table class="form-table">		

						<tr valign="top" >					 
							<th scope="row"><label for="taraza_tab_options[taraza_header_bkcl]"><?php echo __('Header background Color','taraza'); ?> </label></th>
							<td><input type="text" name="taraza_tab_options[taraza_header_bkcl]" value="<?php echo $options[ 'taraza_header_bkcl']; ?>" class="my-color-field" data-default-color="#ffffff" /> </td>
						</tr>	
						
						<tr valign="top" >					 
							<th scope="row"><label for="taraza_header_fcl"><?php echo __('Header Font Color','taraza'); ?></label></th>
							<td><input type="text" name="taraza_tab_options[taraza_header_fcl]" value="<?php echo $options[ 'taraza_header_fcl' ]; ?>" class="my-color-field" data-default-color="#1a1a1a" /> </td>
						</tr>	
						
						
						
						<tr valign="top" >					 
							<th scope="row"><label for="taraza_tab_options[taraza_header_ff]"><?php echo __('Header Font Family','taraza'); ?></label></th>
							<td>
							<select id="taraza_header_ff" name="taraza_tab_options[taraza_header_ff]">
							<?php foreach($arrayFont as $valeur)
									{									
									  echo '<option  style="font-family:\''.$valeur.'\'" value="'.$valeur.'" '.selected( $valeur, $options['taraza_header_ff'] ) .'>'.$valeur.'</option>';	
									}
							?> </select>
						</td>
						</tr>	
						<tr valign="top" >					 
							<th scope="row"><label for="taraza_header_ccl"><?php echo __('Menu hover Color','taraza'); ?></label></th>
							<td><input type="text" name="taraza_tab_options[taraza_header_ccl]" value="<?php echo $options[ 'taraza_header_ccl']; ?>" class="my-color-field" data-default-color="#d21f43" /> </td>
						</tr>
						
						<tr valign="top" >					 
							<th scope="row"><label for="taraza_header_nlt"><?php echo __('Enlight the nth letter of the title (0 if none)','taraza');  ?></label></th>
						    <td><input type="text" class="only_integer" id="taraza_header_nlt" name="taraza_tab_options[taraza_header_nlt]" class="small-text" value="<?php if ($options['taraza_header_nlt'] =="") echo '1'; else echo $options['taraza_header_nlt']; ?>" /></td>			
						</tr>
                         <tr valign="top" >					 
							<th scope="row"><label for="taraza_header_clnlt"><?php echo __('Color of the enlightned letter','taraza'); ?></label></th>
							<td><input type="text" name="taraza_tab_options[taraza_header_clnlt]" value="<?php echo $options[ 'taraza_header_clnlt']; ?>" class="my-color-field" data-default-color="#d21f43" /> </td>
						</tr>
						
					 
						</table>
					</fieldset>
					
					 <!-- CONTENT -->
					
				<fieldset>
			    <legend><?php echo __('Content','taraza'); ?></legend>
					  <table class="form-table">
					  
					 
						
						<tr valign="top" >					 
							<th scope="row"><label for="taraza_ff"><?php echo __('Font Family','taraza'); ?></label></th>
							<td>
								<select id="taraza_ff" name="taraza_tab_options[taraza_ff]">
								<?php foreach($arrayFont as $valeur)
										{								
                                          echo '<option style="font-family:\''.$valeur.'\'"  value="'.$valeur.'"'.selected( $valeur, $options['taraza_ff'] ) .' >'.$valeur.'</option>';										 
										}
								?> </select>
							</td>
						</tr>
						
						<tr valign="top" >					 
							<th scope="row"><label for="taraza_title_ff"><?php echo __('Titles Font Family','taraza'); ?></label></th>
							<td>
								<select id="taraza_title_ff" name="taraza_tab_options[taraza_title_ff]">
								<?php foreach($arrayFont as $valeur)
										{							
                                         echo '<option style="font-family:\''.$valeur.'\'"  value="'.$valeur.'"' .selected( $valeur, $options['taraza_title_ff'] ) .'>'.$valeur.'</option>';	
										
										}
								?> </select>
							</td>
						</tr>
						
						<tr valign="top" >					 
							<th scope="row"><label for="taraza_fcl"><?php echo __('Font Color','taraza'); ?></label></th>
							<td><input type="text" name="taraza_tab_options[taraza_fcl]" value="<?php echo $options[ 'taraza_fcl' ]; ?>" class="my-color-field" data-default-color="#222222" /> </td>
						</tr>
						<tr valign="top" >					 
							<th scope="row"><label for="taraza_lcl"><?php echo __('Link Color','taraza'); ?></label></th>
							<td><input type="text" name="taraza_tab_options[taraza_lcl]" value="<?php echo $options['taraza_lcl']; ?>" class="my-color-field" data-default-color="#d21f43" /> </td>
						</tr>
						
						
						
					   </table>
				</fieldset>
									
			</div>
		
			<div class="bloc_menu"  id="bloc_sli">
			
			<fieldset>
			    <legend><?php echo __('Text Home Page','taraza'); ?></legend>			
					 <table class="form-table">		
					   <tr valign="top" >
							<th scope="row"><label for="taraza_hp_txt1"><?php echo __('Title Home page','taraza'); ?></label></th>
							<td> <textarea id="taraza_hp_txt1" name="taraza_tab_options[taraza_hp_txt1]" class="large-text"> <?php echo $options[ 'taraza_hp_txt1']; ?></textarea></td>
						</tr>	
				
						<tr valign="top" >
							<th scope="row"><label for="taraza_hp_txt2"><?php echo __('Slogan','taraza'); ?></label></th>
							<td> <textarea id="taraza_hp_txt2" name="taraza_tab_options[taraza_hp_txt2]" class="large-text"> <?php echo $options['taraza_hp_txt2'] ?></textarea></td>
						</tr>
					
						
						<tr valign="top">
						<th scope="row"><label  for="taraza_hp_nblog"><?php echo __('Nb of posts displayed','taraza'); ?></label></th>
						<td><input type="text" class="only_integer" id="taraza_hp_nblog" name="taraza_tab_options[taraza_hp_nblog]" class="small-text" value="<?php echo $options['taraza_hp_nblog']; ?>" /></td>
						
					</tr>
					
						
					 </table>
				  </fieldset>
					<!-- SLIDER -->
				<fieldset>
			    <legend><?php echo __('Slider Options - Home page','taraza'); ?></legend>	
				 <table class="form-table">			
					<tr valign="top" >
					 
						<th scope="row"><label for="taraza_tab_options[taraza_sl]"><?php echo __('Display slider','taraza'); ?></label></th>
						<td><input type="checkbox" name="taraza_tab_options[taraza_sl]"  <?php checked( "on", $options['taraza_sl']); ?>> </td>
					</tr>
					
					
					<tr valign="top">
						<th scope="row"><label  for="taraza_sl_pau"><?php echo __('Slider speed','taraza'); ?></label></th>
						<td><input type="text" class="only_integer" id="taraza_sl_pau" name="taraza_tab_options[taraza_sl_pau]" class="small-text" value="<?php echo $options['taraza_sl_pau']; ?>" /></td>
						
					</tr>
				
				
				</table>
				</fieldset>
				
				<fieldset> 
				<legend><?php echo __('Slider Images - Home page','taraza'); ?></legend>
				<?php echo __('Upload an image 460px * 345px for best result','taraza'); ?> <br/>
				<?php echo __('Each Image of the slider can have (or not) a legende (Title + Text) and an url link to another page','taraza'); ?> <br/>
				
				
				<!-- Image Slider -->
				<?php $display= "display:block;"; ?>
				<?php $n_sl=6;
				  for($i = 1; $i <= $n_sl; $i++){ ?>
				
				 
				   <table class="taraza_hp_sl_im" id="table_<?php echo $i; ?>" style="<?php echo $display; ?>border-bottom:1px solid #eaeaea;padding:10px 0px" >
				    <tr valign="top" style="border-top:1px solid #eaeaea;">
						<th scope="row"><label for="taraza_hp_sl_title<?php echo $i;?>"><?php echo __('Title Image','taraza'); ?> </label></th>					
						<td><input size="100"type="text" id="taraza_hp_sl_title<?php echo $i;?>" name="taraza_tab_options[taraza_hp_sl_title<?php echo $i;?>]" class="medium-text" value="<?php echo $options['taraza_hp_sl_title'.$i]; ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="taraza_hp_sl_txt<?php echo $i;?>"><?php echo __('Text Image','taraza'); ?></label></th>
						<td> <textarea id="taraza_hp_sl_txt<?php echo $i;?>"  name="taraza_tab_options[taraza_hp_sl_txt<?php echo $i;?>]" class="large-text"> <?php echo $options['taraza_hp_sl_txt'.$i]; ?></textarea></td>
						
					</tr>				
					<tr valign="top">
						<th scope="row"><label for="taraza_hp_sl_lk<?php echo $i;?>"><?php echo __('Link Page','taraza'); ?></label></th>
						
						<td><input type="text" size="100" id="taraza_hp_sl_lk<?php echo $i;?>" name="taraza_tab_options[taraza_hp_sl_lk<?php echo $i;?>]" class="medium-text" value="<?php echo $options['taraza_hp_sl_lk'.$i]; ?>" /></td>
					</tr>
					
					<tr valign="top">
					  <th scope="row"><label for="taraza_hp_sl_im<?php echo $i;?>"><?php echo __('Image (460px * 345px)','taraza'); ?></label></th>
					  <td>
						  <input id="taraza_hp_sl_im<?php echo $i;?>"   type="hidden"  name="taraza_tab_options[taraza_hp_sl_im<?php echo $i;?>]" value="<?php echo $options['taraza_hp_sl_im'.$i]; ?>" />
						  <input  type="hidden"  name="taraza_hp_sl_im<?php echo $i;?>" value="<?php echo $options['taraza_hp_sl_im'.$i]; ?>" />
						  <input id="taraza_hp_sl_im<?php echo $i;?>_button" class="taraza_img_btn" type="button" value="<?php echo __('Upload Image','taraza'); ?>" />
						  <img id="taraza_hp_sl_im<?php echo $i;?>_lnk" style="width:80px;float:right" src="<?php echo $options[ 'taraza_hp_sl_im'.$i]; ?>"/>
						  <input id="taraza_hp_sl_im<?php echo $i;?>_id" type="hidden" name="taraza_tab_options[taraza_hp_sl_im<?php echo $i;?>_id]" value="<?php echo $options[ 'taraza_hp_sl_im'.$i.'_id'];?>" />		 
					     <?php if ($options['taraza_hp_sl_im'.$i.'_id']!='' && $options[ 'taraza_hp_sl_im'.($i+1).'_id']==""){ ?>
						 <input id="delete_taraza_hp_sl_im<?php echo $i;?>" class="taraza_hp_sl_im_delete" type="button" value="<?php echo __('Delete this Image','taraza'); ?>" />  
					     <?php } else { ?>
						 <input id="delete_taraza_hp_sl_im<?php echo $i;?>" style="display:none;"class="taraza_hp_sl_im_delete" type="button" value="<?php echo __('Delete this Image','taraza'); ?>" />   
						 <?php } ?>
					</td>
					</tr>
					
					</table>
					 <?php  $display=$options[ 'taraza_hp_sl_im'.$i ]!=''?"display:block;":"display:none;" ?>
				<?php } // for ?>
				
				</fieldset>
			</div>
						
			<div class="bloc_menu" id="bloc_goo">
				
				
				<fieldset>
			    <legend><?php echo __('Social network','taraza'); ?></legend>	
				<table class="form-table">			
					<tr valign="top" >					 
						<th scope="row"><label for="taraza_sn"><?php echo __('Display Social networks infos','taraza'); ?></label></th>
						<td><input type="checkbox" name="taraza_tab_options[taraza_sn]"  <?php checked( "on", $options['taraza_sn']); ?>> </td>
					</tr>
					
					<tr valign="top">
						<th scope="row"><label  for="taraza_sn1"><?php echo __('Facebook','taraza'); ?></label></th>
						<td><input type="text" class="" id="taraza_sn1" name="taraza_tab_options[taraza_sn1]" class="medium-text" value="<?php echo $options[ 'taraza_sn1' ]; ?>" /></td>
						
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="taraza_sn2"><?php echo __('LinkedIN','taraza'); ?></label></th>
						<td><input type="text" class="" id="taraza_sn2" name="taraza_tab_options[taraza_sn2]" class="small-text" value="<?php echo $options[ 'taraza_sn2' ]; ?>" /></td>
						
					</tr>
					
					<tr valign="top">
						<th scope="row"><label for="taraza_sn3"><?php echo __('Twitter','taraza'); ?></label></th>
						<td><input type="text" class="" id="taraza_sn3" name="taraza_tab_options[taraza_sn3]" class="small-text" value="<?php echo $options['taraza_sn3' ]; ?>" /></td>
						
					</tr>
				
				</table>
				</fieldset>
			</div>
			<hr/>
			
				
		

			<p class="submit">
				<input type="submit" class="" value="<?php echo __('Options update','taraza'); ?>" />
			</p>
		</form>
	</div>
<?php
}

///* Add Own CSS to the theme

add_action( 'wp_head', 'taraza_myThemeCss' );
function taraza_myThemeCss( )
{
	// Styles files in the options

    $ggf="";
	$ggf_b="<link href='//fonts.googleapis.com/css?family=";
	$ggf_e="' rel='stylesheet' type='text/css'>";
	$ff=array_unique (array(taraza_get_option('taraza_ff'),taraza_get_option('taraza_title_ff'),taraza_get_option('taraza_header_ff')));
	foreach($ff as $valeur)
{
			switch ( $valeur)
		{
			case 'Roboto Condensed': $ggf.=$ggf_b."Roboto+Condensed:300italic,400italic,700italic,400,700,300".$ggf_e;break;
			case 'Josefin Slab'    : $ggf.=$ggf_b."Josefin+Slab:300,400,700,300italic,400italic,700italic".$ggf_e;break;
			case 'Droid Sans'      : $ggf.=$ggf_b."Droid+Sans:400,700".$ggf_e; break;
			case 'PT Sans'         : $ggf.=$ggf_b."PT+Sans:400,700,400italic,700italic".$ggf_e; break;
			case 'Arvo'            : $ggf.=$ggf_b."Arvo:400,700,400italic,700italic".$ggf_e; break;
			case 'Neucha'          : $ggf.=$ggf_b."Neucha".$ggf_e; break;
			case 'Pacifico'        : $ggf.=$ggf_b."Pacifico".$ggf_e; break;
			case 'Merienda'        : $ggf.=$ggf_b."Merienda:400,700".$ggf_e;break;
			case 'Raleway'         : $ggf.=$ggf_b."Raleway:400,700,200".$ggf_e;break;
			case 'Fjalla One'      : $ggf.=$ggf_b."Fjalla+One".$ggf_e;break;
			case 'Yanone Kaffeesatz': $ggf.=$ggf_b."Yanone+Kaffeesatz:400,700,200".$ggf_e;break;
			default:                 $ggf.=$ggf_b."Roboto+Condensed:300italic,400italic,700italic,400,700,300".$ggf_e;break;
				
		}
}
 
  if ($ggf != ""){
    echo $ggf; 
  } 
  
  ?>
  
	<style type="text/css">
	   
		body {			
			color: <?php echo taraza_get_option( 'taraza_fcl'); ?>;
			font-family:<?php echo "'".taraza_get_option( 'taraza_ff' )."'"; ?>;
		}
        nav a{
		  font-family:<?php echo "'".taraza_get_option( 'taraza_ff' )."'"; ?>;		
		} 
	    <?php if (taraza_get_option( 'taraza_header_bkcl' )!="#ffffff"){ ?>
		#masthead, #colophon {
			background-color: <?php echo taraza_get_option( 'taraza_header_bkcl'); ?>;
			
		}
		
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"] {
			background-color:<?php echo taraza_get_option( 'taraza_header_bkcl'); ?>;	
		}
		
		<?php } ?>
		 <?php if (trim(taraza_get_option( 'taraza_hp_txt1'))==''){ ?>
		
		 <?php } ?>
	
		#masthead{
		font-family:<?php echo "'".taraza_get_option( 'taraza_header_ff' )."'"; ?>;
		}
		
		<?php if (taraza_get_option( 'taraza_header_fcl' )!="#222222"){ ?>
		#masthead, #colophon {
			color : <?php echo taraza_get_option( 'taraza_header_fcl' ); ?>;
		}
		.menu-toggle, .menu-toggle-2,.nav_header ul ul ul,.menu_header ul ul ul{
		  border-color : <?php echo taraza_get_option( 'taraza_header_fcl'); ?>;
		}
		
		#masthead a, #colophon a{		
			color : <?php echo taraza_get_option( 'taraza_header_fcl'); ?>;
		}
		<?php } ?>
		
		
	
		
		.nivo-caption {
		   border-color:  <?php echo taraza_get_option( 'taraza_header_bkcl' ); ?>;
		}
		
		.ns_teme_tara .nivo-controlNav a {
		  background: <?php echo taraza_get_option( 'taraza_header_bkcl' ); ?>;
     
		}
		
        <?php if (taraza_get_option( 'taraza_header_ccl' )!= "#d21f43"){ ?>
		.ns_teme_tara .nivo-controlNav a.active {
		   background: <?php echo taraza_get_option( 'taraza_header_ccl' ); ?>;
	
		}
		
		#menu_top ul li a {
		border-color:<?php echo taraza_get_option( 'taraza_header_ccl'); ?>;	
		}
		#et_active_menu_item {
	        background: <?php echo taraza_get_option( 'taraza_header_ccl'); ?>
		}		  
		.menu-toggle {	
            background: <?php echo taraza_get_option( 'taraza_header_ccl'); ?> ;
		}
		#nav_main ul>li a:before{
		    color :<?php echo taraza_get_option( 'taraza_header_ccl'); ?>;
		}
		/* nav_main */
		#menu_top a:hover, #nav_main a:hover, .menu a:hover,  .nav-menu a:hover {
		  color :<?php echo taraza_get_option( 'taraza_header_ccl'); ?>;	
		}
		blockquote {
		  border-color:<?php echo taraza_get_option( 'taraza_header_ccl'); ?>;	
		}
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"] {
			color:<?php echo taraza_get_option( 'taraza_header_ccl'); ?>;	
		}
		
        <?php } ?>
		 <?php if (taraza_get_option( 'taraza_header_clnlt')!= "#d21f43"){ ?>
		.title_letter{
		  color:<?php echo taraza_get_option( 'taraza_header_clnlt'); ?>;		  
		}
		<?php } ?>
		h1, h2, h3, h4, h5,.title-no-thumb{
		  font-family:<?php echo "'".taraza_get_option( 'taraza_title_ff' )."'"; ?>;	
		}
		a {color: <?php echo taraza_get_option( 'taraza_lcl'); ?>;}
		a:hover,
		a:focus,
		a:active {
			color: <?php echo taraza_ChangeColor(taraza_get_option( 'taraza_lcl' ), 25); ?>; 
		}	
	</style>
<?php
}
?>