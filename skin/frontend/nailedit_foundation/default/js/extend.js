// Add all your lovely no conflict Jquery extensions, you mutha!

!function ($) {

$(document).foundation();


  /* Dropdown */


	$('.top-bar ul').parent('li').addClass('has-dropdown not-click');
	
	$('.top-bar li.has-dropdown ul').addClass('dropdown');

	$('ul.dropdown li:last-child').addClass('last');

	
	$('.top-bar li.nav-1').addClass('has-dropdown not-click');

	$('.home-cat li,.products-grid li').hover(
       function(){ $(this).addClass('active') },
       function(){ $(this).removeClass('active') }
       );


	$('.static-menu').hide();
	$('.nav-1').click(function() {
    $('.static-menu').slideDown('slow');
    return false;
  	});

	$('.static-menu a.close').click(function() {
    $('.static-menu').slideUp('fast');
    return false;
  	});

	// Tbar Mover

	$('.category-title').appendTo('.spanheader');
	$('.category-image').appendTo('.spanheader');

	$('.image-yes').appendTo('.spanheader .category-image');
	

	// Wrap h3 in header

	$( ".category-description h3" ).wrapAll( "<div class='ribbon'><div class='ribbon-stitches-top'><strong class='ribbon-content'></strong></div><div class='ribbon-stitches-bottom'></div></div>");



/* Off Canvas */

$('.right-off-canvas-menu ul.links,.left-off-canvas-menu ul').addClass('off-canvas-list');


// Slider 

$('.single-item').slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  autoplay:true
});



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

$( ".lower-options .regular-price" ).prepend( "<span class='ttos'>Total (Excl. Delivery)</span>" );

if ($('.lower-options').hasClass('product-options-bottom')) {
       $(".product-options-bottom").appendTo(".step-content");
};



// Append Options

if ($('.block-main').hasClass('dt-step1')) {
       $(".dt-step1").appendTo(".step1-block");
};

if ($('.block-main').hasClass('dt-step2')) {
       $(".dt-step2").appendTo(".step2-block");
};

if ($('#product-options-wrapper').hasClass('product-options')) {
       $(".product-options dl.last").appendTo(".step2-block");
};

// Li Clicker

		$(".dt-step1 li input:radio").hide().click(function(e){
		    e.stopPropagation();
		});
		$(".dt-step1 li").click(function(e){
		    $(this).closest(".dt-step1").find("li").removeClass("selected");
			
			$(this).addClass("selected").find("input:radio").click();
		});


		$(".dt-step2 li input:radio").hide().click(function(e){
		    e.stopPropagation();
		});
		$(".dt-step2 li").click(function(e){
		    $(this).closest(".dt-step2").find("li").removeClass("selected");
			
			$(this).addClass("selected").find("input:radio").click();
		});

		$('.block-main input.checkbox').click(function(){
		  if($(this).is(':checked')){
		    $(this).parent().addClass('selected');
		  }else{
		    $(this).parent().removeClass('selected');
		  }
		});


}(window.jQuery);
