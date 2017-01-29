
$(document).ready(function(){

// ASIDE NAVE
if($('.navicon').length){
	$('.navicon').click(function(){
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






//search bar
$(".header_search").parents('form').submit(function(e){
        var text=$(this).find('[type="text"]');
        if (!text.val()) {
            text.focus();
            e.preventDefault();
        };
    });

    $(".header_search").find('[type="text"]').focus(function(){
        $(this).animate({
            width: '100%'
        }, 400, function(){
// callback function
});

    });

$(".header_search").find('[type="text"]').blur(function(){
        if ($(this).val()) {
            return false;
        };
        $(this).animate({
            width: '0'
        }, 400, function(){
// callback function
});

});










});
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
                html+='<span class="rating-icon" data-id="'+i+'"><i class="fa fa-star"></i></span>';  
              }else{
                html+='<span class="rating-icon" data-id="'+i+'"><i class="fa fa-star-o"></i></span>';
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