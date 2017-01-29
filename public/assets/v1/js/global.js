$(document).ready(function(){


		// header profile click show profile menu
	$('#profilepick').on('click', function(){
		$('#profilemenu').slideToggle();
	});	
	$('#profilesign-out').on('click', function(){
		$('#profilemenu').slideUp();
	});
	$(document).on('click', function(e){
		if(!$(e.target).closest('#profilepick, #profilemenu').length){
			$('#profilemenu').slideUp();
		}
	});

	$('.modal-trigger').leanModal();  // modal popoup

	// LOGIN MODAL TAB SECTION
	$('.jq-login, .fan-btn').click(function(){
		$('#signup-section, #forgot, #resetpassword').hide();
		$('#login-section').show();
	});
	$('.jq-signup').click(function(){
		$('#login-section, #forgot, #resetpassword').hide();
		$('#login-section').show();
	});

	$('.jq-logintab li').click(function(){
		if($(this).hasClass('login')){
			return false;
		}else{
			$(this).parents('#login-section').hide();
		    $('#signup-section').show();
		}
		return false;
	});

	$('.jq-signuptab li').click(function(){
		if($(this).hasClass('signup')){
			return false;
		}else{
			$(this).parents('#signup-section').hide();
			$('#login-section').show();
		}
		return false;
	}); 


	$('.singup-innertab li').click(function(){
		$(this).addClass('active').siblings('li').removeClass('active');
		var num = $(this).index();
		$('.singuptab-article:eq('+num+')').hide().siblings('.singuptab-article').show();
		return false;
	});

	/*$('.forgot-btn').click(function(){
		$(this).parents('.modalcontent').hide();
		$('#forgot').show();
	});*/

	/*$('.next-forgot').click(function(){
		$('#forgot').hide();
		$('#resetpassword').show();
	});*/

	/*$('#return-login').click(function(){
		$('#forgot').hide();
		$('#login-section').show();
	});*/

	/*$('#return-password').click(function(){
		$('#forgot').show();
		$('#resetpassword').hide();
		
	});*/
   // LOGIN MODAL TAB SECTION END

// ASIDENAV
	$('.sidemenu').on('click', function(){
		if(parseInt($('#asidenav').css('right'))<0){
			$('#asidenav').animate({right:0});
			$('.overlay-popup').fadeIn();
		}
	});
	$('.aside-close, .overlay-popup').on('click', function(){
		$('#asidenav').animate({right:-200});
		$('.overlay-popup').fadeOut();
	});
	// ASIDENAV END


});

(function ( $ ) {
 
    $.fn.rating = function( options ) {
      var settings = $.extend({
        rating:0,
        disabled:false,
        rclass:'rating-icon',
      },options );
      return this.each(function(){
        var parent=$(this);
        if (settings.disabled==true) {
          $(this).addClass('disabled');
        };
        $(this).html(
          function(){
            var html='';
            for (var i = 1;i<=5; i++) {
              if (i<=settings.rating) {
                html+='<span style="padding-right:3px;" class="'+settings.rclass+'" data-id="'+i+'"><i class="fa fa-star"></i></span>';  
              }else{
                html+='<span style="padding-right:3px;" class="'+settings.rclass+'" data-id="'+i+'"><i class="fa fa-star-o"></i></span>';
              };
              
            };
            return html;
          }
        );
        $(this).on('click','.'+settings.rclass,function(e){
          if (parent.hasClass('disabled')) {
            return false;
          };
          var id=$(this).attr('data-id');
          $.each(parent.find('.'+settings.rclass),function(){
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
      });      
    };
  }
(jQuery));



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

