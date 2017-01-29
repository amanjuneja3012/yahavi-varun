$(document).ready(function(){

// modal popoup
   $('.modal-trigger').leanModal({});

// select2
	if($('select').length){
		$("select").select2({minimumResultsForSearch: -1});
	}
	if($('.select2visible').length){
		$(".select2visible").select2();
	}


// header search section
	$('.icon-label').on('click', function(){
		$('.headersearch-show').animate({
			width:'100%'
		}, 500);
		$('#searchtext1').focus();
	});
	$('.backarrow2').on('click', function(){
		$('.headersearch-show').animate({
			width:'0'
		});
	});

	$('.searchtext1-close').on('click', function(){
		$('#search').val('').focus();
	});



//footer section to accordion
 $('.about-links h2').click(function(){
 	var $this = $(this)
 		$wrapper = $this.parents('.footer-accordion').find('.footerlist').slideUp();
 	if($this.next('.footerlist').is(':hidden')){
 		$this.find('i').removeClass('fa-plus').addClass('fa-minus');
 		$this.next('.footerlist').slideToggle();
 	}else{
 		$this.find('i').removeClass('fa-minus').addClass('fa-plus');
 	}
 });


// ASIDENAV
	$('.sidemenu').on('click', function(){
		if(parseInt($('#asidenav').css('left'))<0){
			$('#asidenav').animate({left:0});
			$('.overlay-popup').fadeIn();
		}
	});
	$('.aside-close, .overlay-popup').on('click', function(){
		$('#asidenav').animate({left:-280});
		$('.overlay-popup').fadeOut();
	});

	$('#asidenav nav').niceScroll();
    $('.nav-inner ul .submenu-toggle').click(function(){
    var $this = $(this),
    $wrapper = $this.parents('.nav-inner').find('.aside-submenu');
    $('.aside-submenu').slideUp();

    var icon = $(this).parents('nav');
    icon.find('i.fa-minus').removeClass('fa-minus').addClass('fa-plus');

    if ($wrapper.is(':hidden')) {
      $wrapper.slideDown();
      $this.find('i.fa-plus').addClass('fa-minus');
    } else {
      $wrapper.slideUp();
      $this.find('i.fa-plus').removeClass('fa-minus');
    }
    return false;
  });
	// ASIDENAV END


});

 var msg=$('.message');
$(document).on('click',function(){
  if(msg.is(':visible')){
    msg.delay(2000).fadeOut(2000);
  }
});
function message(text){
  if(text=='error'){
    return msg.addClass('message_error').show().find('p').text("Some Problem Occured").parent().delay(2000).fadeOut(2000);
  }else{
    return $('.message').show().find('p').text(text).parent().delay(2000).fadeOut(2000);
  }
}


(function ( $ ) {
 
    $.fn.rating = function( options ) {
        var settings = $.extend({
          rating:0,
          disabled:false,
        },options );
        var parent=this;
        if (settings.disabled==true) {
        	this.addClass('disabled');
        };
        $(this).html(
          function(){
            var html='';
            for (var i = 1;i<=5; i++) {
              if (i<=settings.rating) {
                html+='<span style="padding-right:3px;" class="rating-icon" data-id="'+i+'"><i class="fa fa-star"></i></span>';  
              }else{
                html+='<span style="padding-right:3px;" class="rating-icon" data-id="'+i+'"><i class="fa fa-star-o"></i></span>';
              };
              
            };
            return html;
          }
        );
        this.on('click','.rating-icon',function(e){
          if (parent.hasClass('disabled')) {
            return false;
          };
          var id=$(this).attr('data-id');
          $.each(parent.find('.rating-icon'),function(){
            $(this).find('i').removeClass('fa-star-o');
            if ($(this).attr('data-id')<=id) {
              $(this).find('i').addClass('fa-star');
            }else{
              $(this).find('i').addClass('fa-star-o');
            };

          });
          settings.current=id;
          if (settings.change !== undefined) {
             settings.change(id);
          }
        });        
    };
 
}( jQuery ));


(function($) {
  $.fn.shorten = function (settings) {
    var config = {
      showChars: 100,
      ellipsesText: "...",
      moreText: ">>",
      lessText: "<<"
    };
    if (settings) {
      $.extend(config, settings);
    }
    $(document).off("click", '.morelink'); 
    $(document).on({click: function () {
        var $this = $(this);
        if ($this.hasClass('less')) {
          $this.removeClass('less');
          $this.html(config.moreText);
        } else {
          $this.addClass('less');
          $this.html(config.lessText);
        }
        $this.parent().prev().toggle();
        $this.prev().toggle();
        return false;
      }
    }, '.morelink');
    return this.each(function () {
      var $this = $(this);
      if($this.hasClass("shortened")) return;
      $this.addClass("shortened");
      var content = $this.html();
      if (content.length > config.showChars) {
        var c = content.substr(0, config.showChars);
        var h = content.substr(config.showChars, content.length - config.showChars);
        var html = c + '<span class="moreellipses">' + config.ellipsesText + ' </span><span class="morecontent"><span>' + h + '</span> <a href="#" class="morelink">' + config.moreText + '</a></span>';
        $this.html(html);
        $(".morecontent span").hide();
      }
    }); 
  };
 })(jQuery);
