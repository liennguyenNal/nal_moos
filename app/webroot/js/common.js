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
	
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip('show');
	})
	
	$(".scroll-lp").on("click", function(e){
		e.preventDefault();
		$("html, body").animate({ scrollTop: $("#formRegister").offset().top }, "slow");

	});
	
});

function calculateAge(birthYear, birthMonth, birthDay)
{
  
  todayDate = new Date();
  todayYear = todayDate.getFullYear();
  todayMonth = todayDate.getMonth();
  todayDay = todayDate.getDate();
  age = todayYear - birthYear; 

  if (todayMonth < birthMonth - 1)
  {
    age--;
  }

  if (birthMonth - 1 == todayMonth && todayDay < birthDay)
  {
    age--;
  }
  return age;
}