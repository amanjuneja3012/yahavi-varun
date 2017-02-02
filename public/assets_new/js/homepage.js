/*
 * Homepage JS
 */

var selectorMatrix ={
	"HOMEPAGE":{
		"BANNER":{
			"FEATURED":"#homeBanner"
		},
		"CAROUSEL":{
			"EVENTS":"#homeCarouselContainer ._events",
			"ARTISTS":"#homeCarouselContainer ._artists",
			"VIDEOS":"#homeCarouselContainer ._videos",
			"BLOGS":"#homeCarouselContainer ._blogs",
		}
	}
};
		
var homepage = {
	apiUrl: 'http://api.beta.yahavi.com',
	data: null,
	
	init: function(){
		var dataUrl = this.apiUrl+'/home/data',
			params = {'request_token':this.getRequestToken()},
			self = this;
		$.ajax({
              url:dataUrl,
              data:params,
              method:'GET',
               }).done(function(data){
					var result = $.parseJSON(data);
					if(result.success=='1'){
						self.data = result.data;
						self.populateHomepage();
						return false;
					}
					else{
						self.log("homepage data request failed");
					}
              return false;
          });
	},
	
	getRequestToken: function(){
		var request_token = $.cookie("request_token");
		
		if (typeof request_token == "undefined" || request_token == null){
			//todo remove after dev
			return "89d9d0a13dc3d561463fb8ef11c3cdf2ba1ac85a05304dc7b420299b4beb295b";
			return null;
		}
		return request_token;
	},
	
	populateHomepage: function(){
		if(this.data){
			this.populateFeaturedEvent(this.data.featured_event);
			this.populateEventsCarousel(this.data.events.events);
			this.populateArtistsCarousel(this.data.artists.result);
			this.populateVideosCarousel(this.data.featured_media);
			this.populateBlogsCarousel(this.data.blog);
		}
	},

	populateFeaturedEvent: function(data){
		var $component = $(selectorMatrix["HOMEPAGE"]["BANNER"]["FEATURED"]),
			prependHtml = "";
//		console.log(data);
		$.each(data,function(key,event){
			prependHtml +='<div class="top-carousal-card _featured" style="background-image: url(\''+event.event_image+'\');">' +
							'<h1 class="top-carousal-card-heading">'+event.name+'</h1>' +
							'<p class="top-carousal-card-sub-heading">'+event.dateStr+' '+event.locality+'</p>' +
							'</div>';
		});
		$component.prepend(prependHtml);
		this.makeResponsiveCarouselBanner($component);
	},
	makeResponsiveCarouselBanner: function(el){
		el.slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows:false,
			autoplay: true,
			autoplaySpeed: 2000,
			lazyLoad: 'ondemand',
			responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		      }
		    }
		  ]
		});
	},
	populateEventsCarousel: function(data){
		var $component = $(selectorMatrix["HOMEPAGE"]["CAROUSEL"]["EVENTS"]),
			innerHtml="";
		$.each(data,function(key,event){
//			console.log(event);
			innerHtml +='<div class="cards" id="event_'+event.id+'">' +
							'<div class="card-image" style="background-image: url(\''+event.event_image+'\');"></div>' +
							'<div class="card-image-tag">'+event.art_category+'</div>' +
							'<div class="card-bottom-info">' +
								'<div class="card-header-text">'+event.name+'</div>' +
								'<div class="card-text">'+event.brief_desc+'</div>' +
								'<div class="card-time">'+event.dateStr+'</div>' +
								'<div class="card-venue">'+event.venue_name+', '+event.locality+'</div>' +
							'</div>' +
						'</div>';
		});
		$component.html(innerHtml);
		this.makeResponsiveCarousel($component);
	},
	makeResponsiveCarousel: function(el){
		el.slick({
			dots: true,
			infinite: false,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 1,
			lazyLoad: 'ondemand',
			responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		      	arrows:true,
		        slidesToShow: 3,
		        slidesToScroll: 3,
		        infinite: false,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		      	arrows:true,
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		      	arrows:true,
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});
	},
	populateArtistsCarousel: function(data){
		var $component = $(selectorMatrix["HOMEPAGE"]["CAROUSEL"]["ARTISTS"]),
			innerHtml="";
		$.each(data,function(key,artist){
//			console.log(artist);
			innerHtml +='<div class="cards" id="artist_'+artist.id+'">' +
							'<div class="card-image" style="background-image: url(\''+artist.profile_pic	+'\');"></div>' +
							'<div class="card-image-tag">'+artist.art_category+'</div>' +
							'<div class="card-bottom-info">' +
								'<div class="card-header-text">'+artist.name+'</div>' +
								'<div class="card-text">'+artist.brief_intro+'</div>' +
								'<div class="card-time">'+artist.fan_count+' followers'+'</div>' +
								'<div class="card-venue">'+artist.rating+' stars'+'</div>' +
							'</div>' +
						'</div>';
		});
		$component.html(innerHtml);
		this.makeResponsiveCarousel($component);
	},
	populateVideosCarousel: function(data){
		var $component = $(selectorMatrix["HOMEPAGE"]["CAROUSEL"]["VIDEOS"]),
			innerHtml="";
		$.each(data,function(key,video){
//			console.log(video);
			innerHtml +='<div class="video-cards" id="video_'+video.id+'">' +
							'<div class="video-card-image" style="background-image: url(\''+video.thumb+'\');"></div>' +
						'</div>';
		});
		$component.html(innerHtml);
		this.makeResponsiveCarouselCenterPadded($component);
	},
	makeResponsiveCarouselCenterPadded: function(el){
		el.slick({
		  centerMode: true,
		  centerPadding: '80px',
		  slidesToShow: 3,
		  lazyLoad: 'ondemand',
		  responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: true,
		        centerMode: true,
		        centerPadding: '60px',
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: true,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 1
		      }
		    }
		  ]
		});
	},
	populateBlogsCarousel: function(data){
		var $component = $(selectorMatrix["HOMEPAGE"]["CAROUSEL"]["BLOGS"]),
			innerHtml="";
		$.each(data,function(key,blog){
//			console.log(blog);
			innerHtml +='<div class="cards" id="blog_'+blog.post_id+'">' +
							'<div class="card-image" style="background-image: url(\''+blog.post_image+'\');"></div>' +
							'<div class="card-image-tag">'+blog.category+'</div>' +
							'<div class="card-bottom-info">' +
								'<div class="card-header-text">'+blog.post_title+'</div>' +
								'<div class="card-text">'+blog.desc+'</div>' +
							'</div>' +
						'</div>';
		});
		$component.html(innerHtml);
		this.makeResponsiveCarousel($component);
	},
	
	logger: true,
	log:  function(msg) {
        if (this.logger == true) {
            console.log(msg);
        }
    }
}

$(document).ready(function () {
	homepage.init();
});