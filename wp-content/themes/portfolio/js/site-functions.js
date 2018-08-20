(function($) {
	$(document).ready(function($){
		var myElement = document.querySelector(".site-header");
		// construct an instance of Headroom, passing the element
		var headroom  = new Headroom(myElement);
		// initialise
		headroom.init(); 

		//Load large image
		$('.site').addClass('site-enhanced');

		/*----------------------------------------------
		# Sticky Header
		-----------------------------------------------*/

		var topofDiv = $("#masthead").offset().top; //gets offset of header
		var height = $("#masthead").outerHeight();

		$(window).scroll(function(){

			if($(window).scrollTop() > (topofDiv + height) && !($('.home').length)){
		       $(".site-header, body").addClass('header-fixed');
		       $('.site-content').css({
		       	'paddingTop':height//fudge factor
		       });
		    }
		    else{
		       $(".site-header, body").removeClass('header-fixed');
		        $('.site-content').css({
			       'paddingTop':'0px'
			    });
		    }


		    if($('.header-fixed').length==0){
		    	$('#header .img-clip').addClass('hid');
		    }else{
		    	setTimeout(function(){
		    		$('#header .img-clip').removeClass('hid');
		    	},1150);
		    	
		    }
		});

		$('#masthead').append('<div id="menu-overlay"></div>');
		$('#menu-overlay').on('click',function(){
			$('#primary-menu, .menu-toggle').attr('aria-expanded', false);
			$('#site-navigation').removeClass('toggled');
		});	


		/*----------------------------------------------
		# Homepage
		-----------------------------------------------*/
		$('.site-header').addClass('darken');

		$('#home-navigation a').on('click', function(e){
			var theURL=$(this).attr('href');
			$('.img-clip').toggleClass('spin');
			$('body').addClass('home-animate');

			var theDirect=setTimeout(function(){
				window.location.href = theURL;
			},1000);
		});


		/*----------------------------------------------
		# Blog
		-----------------------------------------------*/

		$('.section-toggle').on('click',function(){
			$(this).toggleClass('active');
		});


		/*-------------------------------------------------
		# Modal
		--------------------------------------------------*/

		$(function() {
		  $(".modal-switch").on("change", function() {
		    if ($(this).is(":checked")) {
		      $("body").addClass("modal-open");
		    } else {
		      $("body").removeClass("modal-open");
		    }
		  });

		  $(".modal-fade-screen, .modal-close").on("click", function() {
		    $(".modal-state:checked").prop("checked", false).change();
		  });

		  $(".modal-inner").on("click", function(e) {
		    e.stopPropagation();
		  });
		
		});




	});
})( jQuery );

