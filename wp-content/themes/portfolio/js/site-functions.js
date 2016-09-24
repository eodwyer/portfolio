(function($) {
	$(document).ready(function($){
		var myElement = document.querySelector(".site-header");
		// construct an instance of Headroom, passing the element
		var headroom  = new Headroom(myElement);
		// initialise
		headroom.init(); 

		var topofDiv = $(".site-branding").offset().top; //gets offset of header
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
			       'paddingTop':'10px'
			    });
		    }
		});


		/*----------------------------------------------
		# Homepage
		-----------------------------------------------*/
		$('.site-header').addClass('darken');

		$('#home-navigation a').on('click',function(e){
			e.preventDefault();
			var theURL=$(this).attr('href');
			$('.img-clip').toggleClass('spin');
			//$(this).toggleClass('selected');
			$('body').addClass('home-animate');

			var theDirect=setTimeout(function(){
				window.location.href = theURL;
			},1000);
		})

	});
})( jQuery );
