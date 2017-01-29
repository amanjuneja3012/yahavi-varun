$(document).ready(function(){
	
	home= new Home();
	
});

var Home=function(){
	this.render_banner();
	 this.render_trending_events()
	 this.render_trending_blog();
	this.bind();

}
Home.prototype.bind=function(){
	var waypoints = $('#header-waypoint').waypoint({
	  handler: function(direction) {
	   $('#main-header').toggleClass('light')
	  }
	})
}
Home.prototype.render_banner = function(first_argument) {
	  var owl = $("#owl-demo");

		      owl.owlCarousel({
		        // navigation : true,
		        // singleItem : true,
		        // transitionStyle : "fadeUp",
		        // //autoHeight : true,
		        navigation: true, // Show next and prev buttons
		        slideSpeed: 300,
		        paginationSpeed: 400,
		        singleItem: true,
		        autoWidth:true,
		        transitionStyle: "fadeUp",
		        loop:true,
		        stagePadding:10,
		        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
		      });
		    $('#intro-section').css('height',(854/480)*window.innerWidth + 'px')
};

Home.prototype.render_trending_events=function(){
	  var owl = $("#trending-event-slider");
		      owl.owlCarousel({
		        // navigation : true,
		        // singleItem : true,
		        // transitionStyle : "fadeUp",
		        // //autoHeight : true,
		        navigation: true, // Show next and prev buttons
		        slideSpeed: 300,
		        paginationSpeed: 400,
		        singleItem: true,
		        autoWidth:true,
		        transitionStyle: "fadeUp",
		        loop:true,
		        stagePadding:10,
		        afterMove:function(){
		        	var i=$("#trending-event-slider").find('.owl-pagination .owl-page.active').index();
		        	console.log(i);
		        	var el=$('#trending-event-list');
		        	var target=el.find('[data-index="'+ i +'"]');
		        	if(target.hasClass('active')) return;

		        	el.find('.active').removeClass('active');
		        	target.addClass('active')
		        },
		        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]

		      });

		    //$('#trending-event-slider img').css('height',$('#trending-event-slider').width())

		    $('.event-controls a').on('click',function(){
                if($(this).attr('href')=='/event'){
                    return true;    
                }else{
                    var owl =  $("#trending-event-slider").data('owlCarousel');
                if($(this).attr('data-action')=='next')
                    owl.next();
                else
                    owl.prev();
            }                
            });

		    $('.trending-event').on('click',function (argument) {
		    	if($(this).hasClass('active')) return;
		    	var index=parseInt($(this).attr('data-index'));
	    	    var owl =  $("#trending-event-slider").data('owlCarousel');
		    	owl.goTo(index);
		    })
	
}

Home.prototype.render_trending_blog=function(){
	
	  var owl = $("#blog-owl");

		      owl.owlCarousel({
		        // navigation : true,
		        // singleItem : true,
		        // transitionStyle : "fadeUp",
		        // //autoHeight : true,

		        navigation: true, // Show next and prev buttons
		        items:3,
		        slideSpeed: 300,
		        paginationSpeed: 400,
		        itemsScaleUp:true,
		        transitionStyle: "fadeUp",
		        loop:true,
		        stagePadding:10,

		        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]

		      });
}
