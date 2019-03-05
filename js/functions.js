/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * add no-svg class to <html>
 */
(function($){
    $('html').attr('class','no-svg');
    
})(jQuery);

(function($){
	$('figure.wp-caption.aligncenter').removeAttr('style');
	$('img.aligncenter').wrap('<figure class="centered-image" />');
	
	/*
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */
	function supportsInlineSVG() {
		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
	}
	
	if ( true === supportsInlineSVG() ) {
		document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
	}
        
        $(document).on("scroll", function(){
		if
        ($(document).scrollTop() > 100){
		  $("header").addClass("shrink");
		}
		else
		{
			$("header").removeClass("shrink");
		}
	});
        
        $(".header-menu-toggle").click(function(){
            $("#menu-header-menu").toggleClass("active");
            $(".header-menu-toggle span").text("Menu");
            $(".active .header-menu-toggle span").text("Close");
        });
        
})(jQuery);