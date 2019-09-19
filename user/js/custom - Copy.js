$(document).ready(function(){

	$('.dropdown-hover').hover(function(){
		$('.dropdown-toggle', this).trigger('click');
	});
	$('.close-inform').click(function(e){
		e.preventDefault()
		$(this).parent('div').slideUp();
	});

$("#mob-menu").on("click",function(){$(this).toggleClass("active");});
$('#mob-menu').on('click', function() {
    $('.nav-mob').toggleClass('SlideInLeft');
  });


 $("#schedule2-button").click(function(){
        $("#schedule-step2").addClass('d-block').removeClass('d-none');
        $("#schedule-step1").addClass('d-none').removeClass('d-block');
    });
 $("#makeup1-button").click(function(){
        $("#makeup-step0").addClass('d-none').removeClass('d-block');
        $("#makeup-step1").addClass('d-block').removeClass('d-none');
    });
 $("#makeup2-button").click(function(){
        $("#makeup-step1").addClass('d-none').removeClass('d-block');
        $("#makeup-step2").addClass('d-block').removeClass('d-none');
    });
  $("#step-back1").click(function(){
        $("#schedule-step1").addClass('d-block').removeClass('d-none');
        $("#schedule-step2").addClass('d-none').removeClass('d-block');
    });
  $("#btn-back-enrol-chng").click(function(){
        $("#change_enroll_step1").addClass('d-block').removeClass('d-none');
        $("#change_enroll_step2").addClass('d-none').removeClass('d-block');
    });
  $("#btn-enrol-chng").click(function(){
        $("#change_enroll_step2").addClass('d-block').removeClass('d-none');
        $("#change_enroll_step1").addClass('d-none').removeClass('d-block');
    });
  

$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    dots:true,
    pagination: true,
    autoplayTimeout: 3000,
	autoHeight:true,
    stopOnHover: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
});


});

 