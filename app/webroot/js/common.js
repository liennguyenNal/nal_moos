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
	
});