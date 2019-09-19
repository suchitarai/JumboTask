
$(document).ready(function(){
    $('.close-inform').click(function(e){
		e.preventDefault()
		$(this).parent('div').removeClass('d-block').slideUp();	
	});
   
 
$("#mob-menu").on("click",function(){$(this).toggleClass("active");});
$('#mob-menu').on('click', function() {
    $('.nav-mob').toggleClass('SlideInLeft');
  });
$('#toggle-filter').on('click', function() {
    $('.filter-menu').toggleClass('SlideInRight');
  });
  $('#close-filter').on('click', function() {
    $('.filter-menu').removeClass('SlideInRight');
  });
  
$("#btn-chng-enrl").click(function(){
		setTimeout(function(){  $("#verify-enroll").addClass('d-block').removeClass('d-none'); }, 600);
		setTimeout(function(){ $('#modal-change-enrl').modal('hide'); }, 500);  
    });
	$("#btn-back-enrol-chng").click(function(){
        $("#change_enroll_step1").addClass('d-block').removeClass('d-none');
        $("#change_enroll_step2").addClass('d-none').removeClass('d-block');
    });
  $("#btn-enrol-chng").click(function(){
        $("#change_enroll_step2").addClass('d-block').removeClass('d-none');
        $("#change_enroll_step1").addClass('d-none').removeClass('d-block');
    });
 
 $('input[type=file]').change(function () {
var val = $(this).val().toLowerCase();

if (this.files[0].size > 1048576)  //1Mb
    {
        //reset file upload control
       $(this).val('');
       //show an alert to the user
       alert('Allowed file size exceeded 1MB');
    }
});

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    pagination: true,
	autoplay: true,
    autoPlayTimeout: 2000,
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

 