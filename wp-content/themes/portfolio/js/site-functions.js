(function($) {
	$(document).ready(function($){
		var myElement = document.querySelector(".site-header");
		// construct an instance of Headroom, passing the element
		var headroom  = new Headroom(myElement);
		// initialise
		headroom.init(); 


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


/*
Lazy load and fade in main image
------------------------------------*/

window.onload = function loadStuff() {
	


	  var win, doc, img, header, enhancedClass;
	  
	  // Quit early if older browser (e.g. IE 8).
	  if (!('addEventListener' in window)) {
	    return;
	  }
	  
	  win = window;
	  doc = win.document;
	  img = new Image();
	  header = doc.querySelector('.site-background');
	  enhancedClass = 'site-background-enhanced';

	  //remove syntax highlighter
	  var element = document.getElementById("syntaxhighlighteranchor");
		element.outerHTML = "";
		delete element;
	  

	  // Rather convoluted, but parses out the first mention of a background
	  // image url for the enhanced header, even if the style is not applied.
	  var bigSrc = (function () {

	    // Find all of the CssRule objects inside the inline stylesheet 
	    var styles = doc.querySelector('style').sheet.cssRules;
	    // Fetch the background-image declaration...
	    var bgDecl = (function () {
	      // ...via a self-executing function, where a loop is run
	      var bgStyle, i, l = styles.length;
	      for (i=0; i<l; i++) {
	        // ...checking if the rule is the one targeting the
	        // enhanced header.
	        if (styles[i].selectorText &&
	            styles[i].selectorText == '.'+enhancedClass) {
	          // If so, set bgDecl to the entire background-image
	          // value of that rule
	          bgStyle = styles[i].style.backgroundImage;
	          // ...and break the loop.
	          break; 
	        }
	      }
	      // ...and return that text.

	      return bgStyle;

	    }());
	    // Finally, return a match for the URL inside the background-image
	    // by using a fancy regex I Googled up, as long as the bgDecl 
	    // variable is assigned at all.         
	    return bgDecl && bgDecl.match(/(?:\(['|"]?)(.*?)(?:['|"]?\))/)[1];
	  }());


	  // Assign an onLoad handler to the dummy image *before* assigning the src
	  
	  
	  img.onload = function () {
	  	header.className += ' ' +enhancedClass;
	    
	  };
	  // Finally, trigger the whole preloading chain by giving the dummy
	  // image its source.
	  if (bigSrc) {
	    img.src = bigSrc;
	  }

	  
	};
