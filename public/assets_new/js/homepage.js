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
	data: null,
	
	init: function(){
		var dataUrl = 'http://api.beta.yahavi.com/home/data',
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
		var request_token = getCookie("request_token");
		
		//for testing purposes
		request_token="07fd5fe4c79ecf8cfdf6e2d8aa555d5aaa46ad2d1d72c1cfd2aaa82b04cba7b4";
		//end
		
		if (typeof request_token == "undefined" || request_token == null){
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
		var $component = $(selectorMatrix["HOMEPAGE"]["BANNER"]["FEATURED"]);
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
			slidesToShow: 3,
			slidesToScroll: 3,
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
		      	arrow:true,
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		      	arrow:true,
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

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

$(document).ready(function () {
	homepage.init();
});