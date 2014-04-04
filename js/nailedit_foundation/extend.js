// Add all your lovely no conflict Jquery extensions, you mutha!


!function ($) {

$(document).foundation();


  /* Dropdown */


	$('.top-bar ul').parent('li').addClass('has-dropdown not-click');
	
	$('.top-bar li.has-dropdown ul').addClass('dropdown');

	$('ul.dropdown li:last-child').addClass('last');

	$('.home-cat li').hover(
       function(){ $(this).addClass('active') },
       function(){ $(this).removeClass('active') }
       )

	// Tbar Mover

	$('.toolbar-top .toolbar').appendTo('.t-bar');



/* Off Canvas */

$('.right-off-canvas-menu ul.links,.left-off-canvas-menu ul').addClass('off-canvas-list');



/* Accordion Layer Navextension */

$ (document).ready(function(){
$("#narrow-by-list > dt").click(function(){
if(false == $(this).next().is(':visible')) {
$('#narrow-by-list dd').slideUp(300);
}
$(this).next().slideToggle(300);
});
$('#narrow-by-list dd').hide();
$('#narrow-by-list dd:eq(0)').show();
});


/* Product Page */

$(".quan").appendTo(".product-options");

}(window.jQuery);
