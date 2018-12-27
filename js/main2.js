jQuery(document).ready(function($){
	var slidesWrapper2 = $('.cd-hero-slider2');

	//check if a .cd-hero-slider exists in the DOM 
	if ( slidesWrapper2.length > 0 ) {
		var primaryNav2 = $('.cd-primary-nav2'),
			sliderNav2 = $('.cd-slider-nav2'),
			navigationMarker2 = $('.cd-marker2'),
			slidesNumber = slidesWrapper2.children('li').length,
			visibleSlidePosition = 0,
			autoPlayId,
			autoPlayDelay = 4000;

		//upload videos (if not on mobile devices)
		uploadVideo(slidesWrapper2);

		//autoplay slider
		setAutoplay(slidesWrapper2, slidesNumber, autoPlayDelay);

		//on mobile - open/close primary navigation clicking/tapping the menu icon
		primaryNav2.on('click', function(event){
			if($(event.target).is('.cd-primary-nav')) $(this).children('ul').toggleClass('is-visible');
		});
		
		//change visible slide
		sliderNav2.on('click', 'li', function(event){
			event.preventDefault();
			var selectedItem = $(this);
			if(!selectedItem.hasClass('selected')) {
				// if it's not already selected
				var selectedPosition = selectedItem.index(),
					activePosition = slidesWrapper2.find('li.selected').index();
				
				if( activePosition < selectedPosition) {
					nextSlide(slidesWrapper2.find('.selected'), slidesWrapper2, sliderNav2, selectedPosition);
				} else {
					prevSlide(slidesWrapper2.find('.selected'), slidesWrapper2, sliderNav2, selectedPosition);
				}

				//this is used for the autoplay
				visibleSlidePosition = selectedPosition;

				updateSliderNavigation(sliderNav2, selectedPosition);
				updateNavigationMarker(navigationMarker2, selectedPosition+1);
				//reset autoplay
				setAutoplay(slidesWrapper2, slidesNumber, autoPlayDelay);
			}
		});
	}
	
	

	function nextSlide(visibleSlide, container, pagination, n){
		visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			visibleSlide.removeClass('is-moving');
		});

		
		
		/*****************/
		//$('#popup-youtube-player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*'); 
		container.children('li').eq(n).addClass('selected from-right').prevAll().addClass('move-left');
		checkVideo(visibleSlide, container, n);   		
		/****************/
	}

	function prevSlide(visibleSlide, container, pagination, n){
		visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			visibleSlide.removeClass('is-moving');
		});
		/*****************/
		//$('#popup-youtube-player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');    
		container.children('li').eq(n).addClass('selected from-left').removeClass('move-left').nextAll().removeClass('move-left');
		checkVideo(visibleSlide, container, n);						
		/****************/


	}

	function updateSliderNavigation(pagination, n) {
		var navigationDot = pagination.find('.selected');
		navigationDot.removeClass('selected');
		pagination.find('li').eq(n).addClass('selected');
	}

	function setAutoplay(wrapper, length, delay) {
		if(wrapper.hasClass('autoplay')) {
			clearInterval(autoPlayId);
			autoPlayId = window.setInterval(function(){autoplaySlider(length)}, delay);
		}
	}

	function autoplaySlider(length) {
		if( visibleSlidePosition < length - 1) {
			nextSlide(slidesWrapper2.find('.selected'), slidesWrapper2, sliderNav2, visibleSlidePosition + 1);
			visibleSlidePosition +=1;
		} else {
			prevSlide(slidesWrapper2.find('.selected'), slidesWrapper2, sliderNav2, 0);
			visibleSlidePosition = 0;
		}
		updateNavigationMarker(navigationMarker2, visibleSlidePosition+1);
		updateSliderNavigation(sliderNav2, visibleSlidePosition);
	}

	function uploadVideo(container) {
		container.find('.cd-bg-video-wrapper').each(function(){
			var videoWrapper = $(this);
			if( videoWrapper.is(':visible') ) {
				// if visible - we are not on a mobile device 
				var	videoUrl = videoWrapper.data('video'),
					video = $('<video loop><source src="'+videoUrl+'.mp4" type="video/mp4" /><source src="'+videoUrl+'.webm" type="video/webm" /></video>');
				video.appendTo(videoWrapper);
				// play video if first slide
				if(videoWrapper.parent('.cd-bg-video.selected').length > 0) video.get(0).play();
			}
		});
	}

	function checkVideo(hiddenSlide, container, n) {
		;
		
		// 
		
		/*
		//check if a video outside the viewport is playing - if yes, pause it
		var hiddenVideo = hiddenSlide.find('video');
		if( hiddenVideo.length > 0 ) hiddenVideo.get(0).pause();
*/
		//check if the select slide contains a video element - if yes, play the video
		var visibleVideo = container.children('li').eq(n).find('video');
		if( visibleVideo.length > 0 ) {
			//$('#popup-youtube-player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*'); 
			clearInterval(autoPlayId);
			
		}
	}

	function updateNavigationMarker(marker, n) {
		marker.removeClassPrefix('item').addClass('item-'+n);
	}

	$.fn.removeClassPrefix = function(prefix) {
		//remove all classes starting with 'prefix'
	    this.each(function(i, el) {
	        var classes = el.className.split(" ").filter(function(c) {
	            return c.lastIndexOf(prefix, 0) !== 0;
	        });
	        el.className = $.trim(classes.join(" "));
	    });
	    return this;
	};
});