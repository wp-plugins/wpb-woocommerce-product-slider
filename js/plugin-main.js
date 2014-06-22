jQuery.noConflict();
(function( $ ) {
  $(function() {
  
// owl trigger for content area
$(document).ready(function() {
  
	// custom js
	
	if ($('.owl-item').width() < 500) {
		$('.owl-wrapper-outer').addClass('big_layout');
	}
	if ($('.owl-item').width() < 260) {
		$('.owl-wrapper-outer').addClass('medium_layout');
	}
	if ($('.owl-item').width() < 200) {
		$('.p_price').attr('style','display:none;');
		$('.owl-wrapper-outer').addClass('small_layout').removeClass('medium_layout');
	}
	$('.wpb_slider_area span.amount').addClass('p_price');
	
	// 1st update
	
	$(".wpb_fix_cart a.button").unwrap();
	$(".amount.p_price").wrap("<div class='pro_price_area'></div>");


});

});
})(jQuery);