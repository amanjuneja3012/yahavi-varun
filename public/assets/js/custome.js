$(document).ready(function() {
	
// header drop down
	$('.viepage1').hover(function(){
		$(this).find('.show_wrapper').clearQueue().slideDown();
		 }, function(){
		$(this).find('.show_wrapper').clearQueue().slideUp(function(){
			$(this).removeAttr('style');
		});
	});
	var dHeight=$(window).height()-50;
$(".mobile_filterscroll").css("height",dHeight);
//Login Popup Tab
	$('.popuptab li').click(function(){
		$(this).addClass('active').siblings('li').removeClass('active');
		var num = $(this).index();
		$('.popup_row:eq('+num+')').slideDown(700).siblings('.popup_row').hide();
		return false;	
	});
	

//SCRIPT FOR LOGIN POPUP
	var left_a = ($(window).width() - $('.login_popup').width())/2,
		top_a = ($(window).height() - $('.login_popup').height())/2;
	$('.loginbtn li a').click(function(){
		$('.popuptab li').eq($(this).parent('li').index()).trigger('click');
		$('.login_popup').css({left:left_a, top:top_a}).fadeIn();
		$('.overlay_login').fadeIn();
		return false;
	});
	
	$('.mobile_login').click(function(){
        $('.popuptab li:first').eq($(this).parent('li').index()).trigger('click');
        $('.login_popup').css({left:left_a, top:top_a}).fadeIn();
        $('.overlay_login').fadeIn();
        return false;
    });
	
	$(window).resize(function(){
		left_a = ($(window).width()- $('.login_popup').width())/2,
		top_a = ($(window).height()- $('.login_popup').height())/2;
		$('.login_popup').css({left:left_a, top:top_a});
	});
	
	$('.pop_close, .overlay_login').click(function(){
		$('.login_popup, .overlay_login').fadeOut();
	});
	
	
	$('.btn-login2').click(function(){
		$(this).parents('.popup_row_in').hide().siblings('#login_box').slideDown();
	});
	
	$('.btn-sign3').click(function(){
		$(this).parents('.popup_row_in').hide().siblings('#sinup_box').slideDown();
	});

	$('.btn-back').click(function(){
		$(this).parents('.popup_row_in').hide().prev('.popup_row_in').show();
	});

	$('.btn-back-login').click(function(){
		$(this).parents('#login_box').hide();
		$('.forget_password').hide();
		$(this).parents('.popup_row').find('.popup_row_in.login-section').show();
	});


// CUSTOME AUTO SUGGEST SELECTBOX
    $('.actosuggest > input, .actosuggest > i').click(function(){
    var current = $(this).parents('.actosuggest');
       if(current.find('.actosuggest_list').is(':hidden')){
       		$('.actosuggest_list').fadeOut();
            current.find('.actosuggest_list').fadeIn();
       }else{
             current.find('.actosuggest_list').fadeOut();
       	}
    });


    $('.actosuggest_list li').click(function(){
        var current = $(this).parents('.actosuggest').find('input');
        current.val($(this).text());
        $('.actosuggest_list').fadeOut(100);
    });

    $(document).on('click', function(event){
        if(!$(event.target).closest('.actosuggest').length && !$(event.target)
        	.closest('.actosuggest_list').length){
            $('.actosuggest_list').fadeOut(100);
        }
    });

    $(".actosuggest_list").niceScroll({
        cursorcolor:"#a8afb0",
        cursorwidth: "10px",
        autohidemode:false,
        background: "rgba(95, 131, 139, 0.8)",
        boxzoom:false
    });// Scroll


    	

// Calender	
	if($('.responsive-calendar').length){
		$(".responsive-calendar").responsiveCalendar({
		// time: '2015-04',
		  events: {
			"2015-04-26": {}, 
			"2015-05-03":{}, 
			"2015-06-12": {}}
		});	
	}


});


//TOOLTIP 
function showTooltip(e, text){
    if(!$('.tooltip-cu').length){
        $('<div class="tooltip-cu">'+ text + '</div>').appendTo('body').css({position: 'absolute', zIndex : 99999999});
        $('.tooltip-cu').css({
            left : e.pageX - $('.tooltip-cu').width()/2,
            top: e.pageY - ($('.tooltip-cu').height()+10)
        });
    }else{
        $('.tooltip-cu').text(text);
        $('.tooltip-cu').css({
            left : e.pageX - $('.tooltip-cu').width()/2,
            top: e.pageY - ($('.tooltip-cu').height()+10)
        })
    }
}
function hideTooltip(e, text){
    $('.tooltip-cu').remove();
}



   // ASIDE NAVE
    if($('.mobile_menu_new').length){
        $('.mobile_menu_new').click(function(){
            if(parseInt($('#sidebar').css('left'))<0){
                $('#sidebar').animate({left:0});
                $('.sidebar-overlay').fadeIn();
            }else{
                    $('#sidebar').animate({left:-220});
                    $('.sidebar-overlay').fadeOut();
            }
        });

        $('.sidebar-overlay').click(function(){
            $('#sidebar').animate({left:-220});
            $('.sidebar-overlay').fadeOut();
         }); 
    }
     

    if($('.jq_asidemenu').length){
     $('.jq_asidemenu').click(function(){
        var $this = $(this),
            $wrapper = $this.parents('ul');

            $wrapper.find('.submenu1').slideUp();
            $wrapper.find('i').removeClass('active').addClass('downairro');

            if($this.next('.submenu1').is(':hidden')){
                $this.next('.submenu1').slideDown();
                $this.find('i').removeClass('downairro').addClass('active');
            }
        return false;
     });
    }

    $(".login_mbl").click(function(){
    	$(".loginbtn").find("a:first").trigger("click");
    });






//search bar
$(".home_search.mobile").parents('form').submit(function(e){
        var text=$(this).find('[type="text"]');
        if (!text.val()) {
            text.focus();
            e.preventDefault();
        };
    });

    $(".hidden-md").find(".home_search.mobile").find('[type="text"]').focus(function(){
        $(this).animate({
            width: '100%'
        }, 400, function(){
// callback function
});

    });

$(".hidden-md").find(".home_search.mobile").find('[type="text"]').blur(function(){
        if ($(this).val()) {
            return false;
        };
        $(this).animate({
            width: '0'
        }, 400, function(){
// callback function
});

});