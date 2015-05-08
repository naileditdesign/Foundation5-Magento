// Add all your lovely no conflict Jquery extensions, you mutha!

!function ($) {

$(document).foundation();

  /* Dropdown */

  $('.top-bar ul').parent('li').addClass('has-dropdown not-click');
  
  $('.top-bar li.has-dropdown ul').addClass('dropdown');

  $('ul.dropdown li:last-child').addClass('last');

	$('.home-cat li,.products-grid li').hover(
       function(){ $(this).addClass('active') },
       function(){ $(this).removeClass('active') }
       );

	// Highlight first word

	$('h3,.page-title h1').each(function() {
	var jqt = $(this);
	var txt = jqt.text();
	jqt.html('<span>'+txt.substring(0,(txt.indexOf(" ")))+'</span>'+ txt.substring((txt.indexOf(" "))));
	});

/* Off Canvas */

// Show Hide Home


// Slider 

//$('.single-item').slick({
  //dots: false,
  //infinite: true,
 // arrows: false,
  //speed: 500,
 // autoplay:true
//});



/* Accordion Layer Navextension */

$('#narrow-by-list dt').wrapInner('<span />');

$('#narrow-by-list dt:first-of-type').addClass( "open" );

$( "#narrow-by-list dt" ).click(function() {
  $( this ).toggleClass( "open" );
});


/* Product Page */

// Zoomer for Product page
  
  $('.zoom-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        //return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
      }
    },
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
      opener: function(element) {
        return element.find('img');
      }
    }
    
  });

var idx = document.URL.indexOf("#");
    if (idx != -1) {
        var hash = document.URL.substring(idx + 1);
        $(".tabs").children("dd").each(function() {
            var id = $(this).find("a").attr("href").substring(1);
            var $container = $("#" + id);
            $(this).removeClass("active");
            $container.removeClass("active");
            if (id == hash || $container.find("#" + hash).length) {
                $(this).addClass("active");
                $container.addClass("active");
            }
        });
    }


// Append Reviews to tabs

$('.box-collateral.box-reviews').appendTo('.tabs-content #Reviews .collateral-box');
$('.block-related').appendTo('.product-view .related');


}(window.jQuery);
