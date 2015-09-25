$(document).ready(function(){
	var swiper = new Swiper('.swiper-container', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
		spaceBetween: 30,
        effect: 'fade',
		loop:true,
		autoplay: 5000,
        autoplayDisableOnInteraction: false
    });
	$(".icon-menu").click (function(){
		$("#menu-page ul").toggle(200);
	});
	
	$(".icon-scroll").click(function(){
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;	
	});
	
	$('#form').find(':input:not(:button):not(:disabled):not(:hidden)').prop('disabled',true);
	
});