// JavaScript Document
jQuery(document).ready(function() {

	function remove_last_input(elm) {
	  var val = jQuery(elm).val();
	var cursorPos = elm.selectionStart;
	jQuery(elm).val(
	   val.substr(0,cursorPos-1) + // before cursor - 1
	  val.substr(cursorPos,val.length) // after cursor
	)
	elm.selectionStart = cursorPos-1; // replace the cursor at the right place
	elm.selectionEnd = cursorPos-1;
	}


	jQuery('body').delegate('input.only_alpha_num','keyup',function(){
		if(!jQuery(this).val().match(/^[0-9a-z]*$/i)) // a-z et 0-9 uniquement
		  remove_last_input(this);
	}) ;
	jQuery('body').delegate('input.only_integer','keyup',function(){
		var chaine= jQuery(this).val();
		if(!chaine.charAt(chaine.length-1).match(/^\-?[0-9]*$/)) // numbers
		remove_last_input(this);
		if (jQuery(this).val().length >0)jQuery(this).val(number_format($(this).val(), 0, ',', ' '));	
	});
	
	// MENUS
	jQuery('.menu-admin li').click(function(){
    	jQuery('.menu-admin li').removeClass("active");
		jQuery("#bloc_gen,#bloc_hp, #bloc_sli, #bloc_goo, #bloc_sn").hide();
    	jQuery(this).addClass("active");
		
		jQuery(".wp-color-result").hide();
		
	});
	jQuery( "#menu_gen" ).click(function() {
	   jQuery("#taraza_sel").val('bloc_gen');
	   jQuery(".wrap-admin").css("backgroundColor",jQuery(this).css("backgroundColor"));
       jQuery("#bloc_gen").fadeIn();	   
	   jQuery(".wp-color-result").fadeIn();
    });
	jQuery( "#menu_hp" ).click(function() {
	   jQuery("#taraza_sel").val('bloc_hp');
	   jQuery(".wrap-admin").css("backgroundColor",jQuery(this).css("backgroundColor"));
       jQuery("#bloc_hp").fadeIn();
	   
    });
	jQuery( "#menu_sli" ).click(function() {
	   jQuery("#taraza_sel").val('bloc_sli');
	   jQuery(".wrap-admin").css("backgroundColor",jQuery(this).css("backgroundColor"));
       jQuery("#bloc_sli").fadeIn();
    });
	jQuery( "#menu_goo" ).click(function() {
	   jQuery("#taraza_sel").val('bloc_goo');
	   jQuery(".wrap-admin").css("backgroundColor",jQuery(this).css("backgroundColor"));
       jQuery("#bloc_goo").fadeIn();
    });
	jQuery( "#menu_sn" ).click(function() {
	   jQuery("#taraza_sel").val('bloc_sn');
	   jQuery(".wrap-admin").css("backgroundColor",jQuery(this).css("backgroundColor"));
       jQuery("#bloc_sn").fadeIn();
    });
	
	
	if ((jQuery("#taraza_sel").val()=="bloc_gen")|| (jQuery("#taraza_sel").val()=="")){
		jQuery( "#menu_gen" ).trigger( "click" );
	}else if ((jQuery("#taraza_sel").val()=="bloc_hp")){
		jQuery( "#menu_hp" ).trigger( "click" );
	}else if ((jQuery("#taraza_sel").val()=="bloc_sli")){
		jQuery( "#menu_sli" ).trigger( "click" );
	}else if ((jQuery("#taraza_sel").val()=="bloc_goo")){
		jQuery( "#menu_goo" ).trigger( "click" );
	}
	
	var myOptions = {
		// you can declare a default color here,
		// or in the data-default-color attribute on the input
		defaultColor: true,
		// a callback to fire whenever the color changes to a valid color
		change: function(event, ui){},
		// a callback to fire when the input is emptied or an invalid color
		clear: function() {},
		// hide the color picker controls on load
		hide: true,
		// show a group of common colors beneath the square
		// or, supply an array of colors to customize further
		palettes: true
   };
 
jQuery('.my-color-field').wpColorPicker(myOptions);


 jQuery("#taraza_ff").joliSelect(
   {
    'width'          : '160',
	'autocomplete'   : false,
	 'bkdColor'      : '#fcfcfc',
    'bkdColorSelect' : '#e7e7e7',
    'arrowColor'     : '#cfcfcf',
    'fontColor'      : '#535353',
	'fontfamilyselect':true
   });
    jQuery("#taraza_title_ff").joliSelect(
   {
    'width'          : '160',
	'autocomplete'   : false,
	 'bkdColor'      : '#fcfcfc',
    'bkdColorSelect' : '#e7e7e7',
    'arrowColor'     : '#cfcfcf',
    'fontColor'      : '#535353',
	'fontfamilyselect':true
   });
   
    jQuery("#taraza_header_ff").joliSelect(
   {
    'width'          : '160',
	'autocomplete'   : false,
	 'bkdColor'      : '#fcfcfc',
    'bkdColorSelect' : '#e7e7e7',
    'arrowColor'     : '#cfcfcf',
    'fontColor'      : '#535353',
	'fontfamilyselect':true
   });
  
 
   
   /***/

 jQuery('.taraza_img_btn').click(function() {
	 formfield = jQuery(this).prev("input").attr('name');
	 tableparent = jQuery(this).parent().parent().parent().parent("table");
	 
	 
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true&amp;post_id=0');
	 return false;	
});
 
window.send_to_editor = function(html) {
 var imgurl = jQuery('img',html).attr('src');

 var classes = jQuery('img', html).attr('class');
 var id = classes.replace(/(.*?)wp-image-/, ''); 
 jQuery("#"+formfield+"").val(imgurl);
 var ln= jQuery("#"+formfield+"_lnk");
 ln.attr('src',imgurl);
 ln.next("input").val(id);
 //jQuery("#"+formfield+"_id").val(id);
 if (tableparent){
	   tableparent.next("table").fadeIn();
 }
 var id=formfield.replace('taraza_hp_sl_im', '');
 var nextdel= jQuery("#delete_taraza_hp_sl_im"+(parseInt(id)-1)+"");		
		 if (nextdel){  
	      nextdel.fadeOut();
         }
		 var prevdel=jQuery("#delete_taraza_hp_sl_im"+(parseInt(id))+"");	
        if (prevdel){  
	      prevdel.fadeIn();
         }		
 tb_remove();
}
/***/

jQuery('.taraza_hp_sl_im_delete').click(function() {
    if (confirm ("Delete ? ")){
		 var id=jQuery(this).attr("id");
		 id=id.replace('delete_taraza_hp_sl_im', '');
		 jQuery("#taraza_hp_sl_im"+id+"").attr("value", "");
		 jQuery("#taraza_hp_sl_im"+id+"_id").attr("value", "");
		 jQuery("#taraza_hp_sl_lk"+id+"").attr("value", "");
		 jQuery("#taraza_hp_sl_txt"+id+"").attr("value", "");
		 jQuery("#taraza_hp_sl_title"+id+"").attr("value", "");
		 jQuery("#taraza_hp_sl_im"+id+"_lnk").attr("src", "");
		 jQuery(this).fadeOut();
		
		var nexttable= jQuery("#table_"+(parseInt(id)+1)+"");		
		 if (nexttable){  
	      nexttable.fadeOut();
         }
		 var nextdel= jQuery("#delete_taraza_hp_sl_im"+(parseInt(id)+1)+"");		
		 if (nextdel){  
	      nextdel.fadeOut();
         }
		 var prevdel=jQuery("#delete_taraza_hp_sl_im"+(parseInt(id)-1)+"");	
        if (prevdel){  
	      prevdel.fadeIn();
         }		 
	} 
});   
	
});



