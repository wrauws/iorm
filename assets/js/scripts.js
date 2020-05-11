(function( $ ) {
	'use strict';
	
	BackgroundCheck.init({
	  targets: '.article-banner',
	  images: '.article-banner'
	});
	
	// BackgroundCheck.init({
	//   targets: '.article-banner'
	// });
	var body = document.body;
	var classList = $('.article-banner').attr("class").split(/\s+/);
	for (var i = 0; i < classList.length; i++) {
	    if (classList[i] !== 'article-banner') {
	       body.classList.add(classList[i]);
	    }
	}


})( jQuery );