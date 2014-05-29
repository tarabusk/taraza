jQuery(document).ready(function() {

   /* Add >> for submenus */
   jQuery("#menu_main").fadeIn('slow'); 
	jQuery(".menu-item").each(function(){ 
      if (typeof(jQuery(this).children("ul").attr('class'))!= "undefined"){
	    jQuery(this).children("a").append("&nbsp;>>");
	  }
    });
	jQuery(".page_item").each(function(){ //alert (jQuery(this).children("ul").attr('class')+'jj');
      if (typeof(jQuery(this).children("ul").attr('class'))!= "undefined"){
	    jQuery(this).children("a").append("&nbsp;>>");
	  }
    });
	
	
	
		
	
	var container, button, menu;
	container = document.getElementById( 'nav_main' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'div' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';
	};
	// Menu Mobile
	jQuery(".menu-toggle,.menu-toggle-2").click(function() {
      jQuery(this ).toggleClass("ouvert");
	});
	
	jQuery(".menu-toggle-2").click(function() {
      jQuery(this ).next('div').toggleClass("toggled");
	});
	
	if (document.getElementById('menu_top')){
		length = document.getElementById('menu_top').childNodes[0].querySelectorAll("li").length;
		if (length < 3){// Don't display mobile feature if less than 3 items
		  jQuery(".menu-toggle-2").css("display","none");
		  jQuery("#menu_top").addClass("none");
		}
	}else{
	  jQuery(".menu-toggle-2").css("display","none");
	}
	
	if (!jQuery(".menu-toggle-2").is(":visible")){  
	   jQuery("#menu_top ul li").hover(function(){
		   
			if (jQuery.browser.msie ){ 
				jQuery(this).children("ul").stop(true, true).slideDown();
			  }else{
				jQuery(this).children("ul").stop(true, true).slideDown();
			  } 
			
			},function(){   
			 if (jQuery.browser.msie ){ 
				jQuery(this).children("ul").stop(true, true).slideUp();
			 }else{
				jQuery(this).children("ul").stop(true, true).slideUp();
			 }
		 
		 
		});
	}
	// Gestion du menu	
	 
		
		if (!jQuery(".menu-toggle").is(":visible")){
	   jQuery(".nav_header ul li").hover(function(){
	   
		var dec=jQuery(this).offset().left;
		//jQuery(this).children('ul').css({"left":0});
		jQuery(this).children('ul').css({"left":"-6px","paddingLeft":dec});
		
			if (jQuery.browser.msie ){ 
				jQuery(this).children("ul").stop(true, true).slideDown();
			  }else{
				jQuery(this).children("ul").stop(true, true).slideDown();
			  } 
			
			},function(){   
			 if (jQuery.browser.msie ){ 
				jQuery(this).children("ul").stop(true, true).slideUp();
			 }else{
				jQuery(this).children("ul").stop(true, true).slideUp();
			 }		 	 
		});				
	}
       		
		// *********** Home page ***********
		
		jQuery('a img').hover(
   function(){ jQuery(this).stop().animate({ opacity : '.75' });  },
   function(){ jQuery(this).stop().animate({ opacity : '1' }); }
  );
  
  jQuery("html").niceScroll({cursorwidth:"8px", cursorcolor:"#131313", cursoropacitymin:"0.1"});
});
	