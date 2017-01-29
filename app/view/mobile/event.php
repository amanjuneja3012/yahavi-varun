<?php
$event=$data['event'];
$curl=new curl;
$json=$curl->get(API_URL.'/venue/zomato/'.$event->zomato_url.'?'.Helper::queryToken());
$zomato=json_decode($json);
$ev_name=$event->name;
if ($event->artist_id>0) {
    $ev_name.=' with '.$event->artist_name;
}
$ev_desc=$event->venue_name.', '.$event->city.', '.$event->locality;
?>
<meta property="og:title" content="<?=$ev_name?>" />
<meta property="og:url" content="<?=WEB_URL?>/event/<?=$event->id?>"/>
<meta property="og:description" content="<?=$ev_desc?>" />
<meta property="og:type" content="article"/> 
<meta property="og:image" content="<?=API_URL?>/images/admin_event/<?=$event->event_image?>"/>
<?php
require_once '../app/view/include/header.php';
?>
<style type="text/css">
    .width2{
        width:70px;
    }
    .width3{
        margin-left: 70px;
    }
    .carousel_box h4{
        margin-bottom:5px !important;
    }
</style>
<div class="breadcrime">
    <div class="container">
        <div class="row">&nbsp;</div>
    </div>
</div><!--breadcrime end-->
<div class="page_wrap">
    <div class="container outsite_shadow padding-t97 margin-b30">
    <div class="row padding_bot20 padding_top20 bg_indigo">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="artist_social padding-l20 color-white">
                <div class="artist_profile business_artist clearfix">
                    <h4 class="sufi_night"><?=$event->venue_name?></h4> 
                </div>
            
                
            </div><!--artist_profile end--> 
            
            <div class="artist_sche padding-l20 color-white"> 
                <div class="artist_profile clearfix">
                    <div class="mapmarker_row ongoing_map" style="display:inline">
                        <?php $loc=$zomato->id>0?$zomato->location:$event ?>
                        <i class="fa fa-map-marker"></i>
                        <span class="mapmarker_name"><?=$loc->locality?>, </span><small class="city_change" style="display:inline;margin:0"><?=$loc->city?></small>
                        <br>
                        <?php 
                        if ($event->mobile) {?>
                            <i class="fa fa-mobile"></i>
                            <span><a href="tel:<?=$event->mobile?>" style="color: rgba(255, 255, 255, 0.84);"><?=$event->mobile?></a></span>
                        <?php }?>
                        
                    </div>                   
                </div>
                
            </div><!--artist_sche end-->
        </div>
        <!--end col-lg-4-->
        
        <div class="col-md-4 col-sm-4 col-xs-12">
            
            <div class="gallery_editrow">
                <h2 class="actname_text"><?=$event->name?></h2>
                <div style="font-size:14px;"><?=(count($event->artists) || $event->other_artists)?' with ':''?>
                <span><?=$event->other_artists?></span>
                    <?php foreach ($event->artists as $key1 => $value1) {?>

                    <a href="<?=$artist_url.'/'.$value1->id?>">
                      <span title="<?=$value1->name?>"><?php echo ucfirst(strtolower($value1->name));echo $key1<count($event->artists)-1?',':''?></span>
                    </a>
                    <?php } ?>
                </div>
             </div>

            <div id="gallery_open" class="gallery_row clearfix">
                <div class="gallery_coll"><img src="<?=API_URL?>/images/admin_event/<?=$event->event_image?>" alt="image" class="img-responsive" width="332px;" style="height:250px;"></div>
                
            </div>
        </div><!--end col-->
        
        
        <div class="col-lg-3 col-md-3 col-sm-3">
                
          &nbsp;
            
        </div>
    </div>
    
    <div class="row pro-present"></div><!--pro-present end-->

    <div class="crwsel_width owl_paddingnone">
        <div id="owl-carou1" class="owl-carousel">

            <div class="item" id="crousel_trigger1">
                <div class="act_col">
                    <div class="carousel_box venue-carouselbox">
                            <h4 class="bg_orange">Event Description</h4>
                            <div class="carousel_intro">
                                <div class="carousel_text">
                                    <h5>Description</h5>
                                        <p title="<?=$event->brief_desc?>">
                                            <?=$event->brief_desc?>
                                        </p>
                                </div>
                            </div>
                        </div> 
                 </div>
           </div><!--item end-->

           <div class="item" id="crousel_trigger3">
                <div class="act_col">
                    <div class="carousel_box venue-carouselbox">
                            <h4 class="bg_red">Event Info</h4>
                            <div class="carousel_intro">
                                
                                <div class="carousel_text">
                                    <h5>Art Category</h5>
                                    <p><?=$event->art_category?></p>
                                </div>
                                <div class="carousel_text">
                                    <h5>Artist Category</h5>
                                    <p><?=$event->artist_category?></p>
                                </div>
                                <div class="carousel_text">
                                    <h5>Event Type</h5>
                                    <p><?=$event->event?></p>
                                </div>
                                <div class="carousel_text">
                                    <h5>Event Date</h5>
                                    <p><?=date('d M y',strtotime($event->t_from)).', '.date('h:i A',strtotime($event->t_from))?></p>
                                </div>
                                
                                <div class="carousel_text">
                                    <h5>Duration</h5>
                                    <?php 
                                    $s=strtotime($event->t_to)-strtotime($event->t_from);
                                    $h=floor($s/3600);
                                    $m=floor(($s%3600)/60);
                                    ?>
                                    <p><?=$h.' hrs '.$m.' min'?></p>
                                </div>
                            </div>
                        </div> 
                </div>
           </div><!--item end-->
            
            


            <?php if (!$zomato->id || $zomato->id=='0') {?>
            <div class="item" id="crousel_trigger2">
                <div class="act_col">
                    <div class="carousel_box venue-carouselbox">
                            <h4 class="bg_blue">Additional Info</h4>
                            <div class="carousel_intro">
                                <div class="carousel_text">
                                    <h5>City</h5>
                                    <p><?=$event->city?></p>
                                </div>
                                <div class="carousel_text">
                                    <h5>Locality</h5>
                                    <p><?=$event->locality?></p>
                                </div>
                                <!-- <div class="carousel_text">
                                    <h5>Budget</h5>
                                    <p></p>
                                </div> -->
                    
                            </div>
                        </div>  
                 </div>
            </div>
            <?php }else{?> 
              <div class="item" id="crousel_trigger_venue_info">
                <div class="act_col">
                    <div class="carousel_box venue-carouselbox zomato">
                            <h4 class="bg_blue">Venue Info</h4>
                            <div class="carousel_intro">
                                <div class="carousel_text zomato_add">
                                    <div class="width2 pull-left">
                                        <h5>Address</h5>    
                                    </div>
                                    <div class="width3">
                                        <p>
                                            <?=$zomato->location->address?>
                                        </p>
                                    </div>
                                    
                                </div>
                                <div class="carousel_text zomato_loc">
                                    <div class="width2 pull-left">
                                        <h5>Locality</h5>    
                                    </div>
                                    <div class="width3">
                                        <p>
                                            <?=$zomato->location->locality?>
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel_text zomato_city">
                                    <div class="width2 pull-left">
                                        <h5>City</h5>    
                                    </div>
                                    <div class="width3">
                                        <p>
                                            <?=$zomato->location->city?>
                                        </p>
                                    </div>
                                </div>
                                

                                <div class="carousel_text zomato_cost">
                                    <div class="width2 pull-left">
                                        <h5>Cost for 2</h5>    
                                    </div>
                                    <div class="width3">
                                       <p> <?=$zomato->currency.' '.$zomato->average_cost_for_two.' apprx.'?></p>
                                    </div>
                                    
                                </div>
                                <div class="carousel_text zomato_rat">
                                    <div class="width2 pull-left">
                                        <h5>Rating</h5>    
                                    </div>
                                    <div class="width3">
                                        <p><?=$zomato->user_rating->aggregate_rating?></p>
                                    </div>
                                    
                                </div>
                                <div class="carousel_text zomato_cui">
                                    <div class="pull-left">
                                        <h5>Cuisines</h5>    
                                    </div>
                                    <div class="width3">
                                        <p><?=$zomato->cuisines?></p>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="powred_zomato" style="font-size:8px">
                                Powered By:&nbsp;&nbsp; <img src="/assets/images/zomatologo.png" style="width:80px;display:inline-block"> 
                            </div>
                        </div> 
                </div>
              </div>

              <div class="item" id="venue_location">
                <div class="act_col">
                    <div class="carousel_box venue-carouselbox">
                            <h4 class="bg_orange">Location</h4>
                            <div class="carousel_intro">
                                <div  class="carousel_text" style="width:250px;height:226px">
                                    <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCWU5OJnKeeiPo8VQ16BWCJrDvxw294VRw&q=<?=$zomato->location->latitude.' '.$zomato->location->longitude?>"
width="250" height="226" frameborder="0" style="border:0"
allowfullscreen></iframe>
                                </div>
                        </div>
                    </div> 
                 </div>
              </div>
            <?php }?>
            




            

            

            <!--item end-->

      
        </div> 


        <div class="potancial-box event_potancial">
            <div class="refer_popup" id="ref_friend">
                <span class="close-refer sprit-closeicon"></span>
                <h6>Refer a friend</h6>
                <div class="referform">
                    <div class="refer-multiple"><i class="fa fa-plus"></i></div>
                    <form action="#" method="post">
                        <div class="appendmain">
                            <div class="referinput">
                                <label>Name/E-mail</label>
                                <input type="text">
                            </div>
                        </div>
                      

                      <div class="referform_buttonrow clearfix"><button type="button">Send</button></div>
                      
                    </form>
                </div>
            </div><!--refer_popup end-->

            <div class="refer_popup refer_popup_height" id="ref_friend2">
                <span class="close-refer sprit-closeicon"></span>
                <h6>APPLY FOR EVENT</h6>
                <div class="applyevent-box">
                    <form action="#" method="post">
                        <div class="applyevent">
                            <label for="quote">Quote:</label>
                            <input type="text" placeholder="15,000" id="quote">
                        </div>
                        <div class="applyevent">
                            <label for="inclusion">Inclusions/Exclusions:</label>
                            <textarea id="inclusion"></textarea>
                        </div>
                       <button type="button">Apply</button>
                    </form>
                </div>
            </div><!--refer_popup end-->

            <ul>
                <li><span class="sprit-shortlist"></span><small>Shortlist Event</small></li>
                <li><span class="sprit-refer"></span> <small>Refer a Friend</small></li>
                <li><span class="sprit-apply"></span> <small>Apply For Event</small></li>
            </ul>
            
        </div> 
    </div>
</div>
</div>
<?php 
require_once '../app/view/include/footer.php';
?>

<script type="text/javascript">
$(document).ready(function() {


// POPUP GALLERY TAB
    $('.videobtn-multiple').click(function(){
       $('.addnewinput').clone().appendTo('.addnewinput-row');
    });

    $('.btn-videouplod').click(function(){
        $('.content-viewlist').find('.addnew-video').trigger('click').show();
    })

    $('.btn-videoclose').click(function(){
        $('.addnew-video').hide();
    });


//NOTIFICATION PART
    $('#notification').click(function(){
        if($('.notification-row').is(':hidden')){
            $('.notification-row').show();
        }else{
            $('.notification-row').hide();
        }
    });
    
    $(document).on('click',function(event){
        if(!$(event.target).closest('#notification').length && !$(event.target).closest('.notification-row').length){
                $('.notification-row').hide();
            }
    });
    

    $('.tab-noti li').click(function(){
        $(this).addClass('active').siblings('li').removeClass('active');
        var num = $(this).index();
        $('.tab-noti-content:eq('+num+')').slideDown().siblings('.tab-noti-content').hide();
        return false;
    });
    
    
// gallery social
    $('.slider-wrapper').hover(function(){
        $(this).find('.gallery-social').clearQueue().slideDown();
         }, function(){
        $(this).find('.gallery-social').clearQueue().slideUp(function(){
            $(this).removeAttr('style');
        });
    });
    

//POPUP CHECKBOX
    $('.marginadjust').on('click', function(){
        if($(this).is(':checked')){
            $('.checkedtext').show();
            }else{
            $('.checkedtext').hide();
        }
    });
    

//TOOLTIP
     $('[data-title]').on('mouseover', function(event){
        showTooltip(event, $(this).attr('data-title'));
    })
    $('[data-title]').on('mouseout', function(){
        hideTooltip();
    });
        

    
// FEEDBACK STAR
    $('.feedback_starhover').click(function(){
        if($('.fb-rating').is(':hidden')){
            $('.fb-rating').slideDown();
        }else{
            $('.fb-rating').slideUp();
        }
    });


//Multiple Select Box
    window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 });
    window.test = $('.testsel').SumoSelect({okCancelInMulti:true });
    window.testSelAll = $('.testSelAll').SumoSelect({okCancelInMulti:true, selectAll:true });
    window.testSelAll2 = $('.testSelAll2').SumoSelect({selectAll:true });   


//JQUERY SCROLL
    $(".nicescroll_profile").niceScroll({
        cursorcolor:"rgba(0, 0, 0, 0.54)",
        cursorborder:"0",
        cursorwidth: "10px",
        autohidemode:false,
        background: "rgba(0, 0, 0, 0.20)",
        boxzoom:false
    });
    
    $(".fans_scroll").niceScroll({
        cursorcolor:"rgba(0, 0, 0, 0.54)",
        cursorborder:"0",
        cursorwidth: "5px",
        autohidemode:false,
        background: "rgba(0, 0, 0, 0.20)",
        boxzoom:false
    });
    
    $(".notification_scroll, .addnew-scroll").niceScroll({
        cursorcolor:"#a8afb0",
        cursorwidth: "10px",
        autohidemode:false,
        background: "rgba(95, 131, 139, 0.2)",
        boxzoom:false
    });

    $(".referform").niceScroll({
        cursorcolor:"#a8afb0",
        cursorwidth: "10px",
        cursorborder: "0",
        autohidemode:false,
        background: "rgba(95, 131, 139, 0.2)",
        boxzoom:false
    });//POTANCIAL POPUP


    $("#owl-carou1").owlCarousel({
        margin:10,
        autoPlay: false,
        items : 3,
        itemsCustom:[[0, 1],[680, 2],[1200,3]],
        pagination:false,
        slideSpeed:800,
        navigation : true
    });


// POPUP SECTION
    $('.pro_crationtab li').click(function(e){
        var currentID = $(this).attr('id');
        $(this).addClass('active').siblings('li').removeClass('active');
        var num = $(this).index();
            $('.profile_tab_content:eq('+num+')').slideDown().siblings('.profile_tab_content').hide();  
        
        if(currentID === 'gallery_trigger' &&  flag1 === 0 && isTriger != true){
           initPhotoCrousel();
        }
        return false;
    });

    var isTriger = false;
    $('.gallery-viewlist li').click(function(){
        $(this).addClass('active').siblings('li').removeClass('active');
        var num = $(this).index();
        $('.content-viewlist:eq('+num+')').show(0, function(){
        if(num == 0 && flag1 == 0){
            initPhotoCrousel();
            // PHOTOS CAROUSEL

        }else if(num == 1 && flag2 == 0){
                $('#carousel-video').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 100,
                    itemMargin: 5,
                    asNavFor: '#slider-video',
                      init: function() {
                        $('#carousel-video li').css('position', 'relative');
                        $('#carousel-video li').append('<div class="remove"> </div>, <div class="videoplay-icon"> </div>')
                    }
                  });
                  $('#slider-video').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    sync: "#carousel-video"
                  });
                   // VIDEO CAROUSEL

            flag2 = 1
        }else if(num == 2 && flag3 == 0){
                  $('#carousel-audio').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 100,
                    itemMargin: 5,
                    asNavFor: '#slider-audio',
                      init: function() {
                        $('#carousel-audio li').css('position', 'relative');
                        $('#carousel-audio li').append('<div class="remove"> </div>')
                    }
                  });
                  $('#slider-audio').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    sync: "#carousel-audio"
                  });
            flag3 = 1
        }// AUDIO CAROUSEL

        }).siblings('.content-viewlist').hide();
 
        return false;
    }); // GALLERY-VIEWLIST SECTION

 $(document).on('click', '.remove', function(){
        var index = $(this).parent().index();
        $(this).parent().remove();
        $('#carousel ul li:eq('+index+')').remove();
   });
  // POPUP SCROUSEL REMOVE


//profile creation popup
    var left_a = ($(window).width() - $('.profile_cration').width())/2,
        top_a = ($(window).height() - $('.profile_cration').height())/2;


    $('#gallery_open').click(function(){
        $('.pro_crationtab').find('#gallery_trigger').trigger('click');
        $('.gallery-viewlist').find('#viewlist-trigger').trigger('click');
        $('.profile_cration').css({left:left_a, top:top_a}).fadeIn();
        $('.overlay_creation').fadeIn();
        return false;
    });


    $('#crousel_trigger_gallery').dblclick(function(){
        $('.pro_crationtab').find('#gallery_trigger').trigger('click');
        $('.gallery-viewlist').find('#viewlist-trigger').trigger('click');
        $('.profile_cration').css({left:left_a, top:top_a}).fadeIn();
        $('.overlay_creation').fadeIn();
        return false;
    });


    $('#crousel_trigger1').dblclick(function(){
        $('.pro_crationtab').find('#art_trigger').trigger('click');
        $('.profile_cration').css({left:left_a, top:top_a}).fadeIn();
        $('.overlay_creation').fadeIn();
        return false;
    });
    
    $('#crousel_trigger2').dblclick(function(){
        $('.pro_crationtab').find('#addition_trigger').trigger('click');
        $('.profile_cration').css({left:left_a, top:top_a}).fadeIn();
        $('.overlay_creation').fadeIn();
        return false;
    });
    
    
    $('#crousel_trigger3').dblclick(function(){
        $('.pro_crationtab').find('#event_trigger').trigger('click');
        $('.profile_cration').css({left:left_a, top:top_a}).fadeIn();
        $('.overlay_creation').fadeIn();
        return false;
    });


    $(window).resize(function(){
        left_a = ($(window).width()- $('.profile_cration').width())/2,
        top_a = ($(window).height()- $('.profile_cration').height())/2;
        $('.profile_cration').css({left:left_a, top:top_a});
    });
    
    $('.profile_crationclose, .overlay_creation').click(function(){
        $('.profile_cration, .overlay_creation').fadeOut();
    });

                
});

var flag1 =0, flag2 = 0, flag3 = 0;
    function initPhotoCrousel(){
    $('.content-viewlist:first').show().siblings('div').hide();
    $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 100,
        itemMargin: 5,
        asNavFor: '#slider',
          init: function() {
            $('#carousel li').css('position', 'relative');
            $('#carousel li').append('<div class="remove"> </div>')
        }
      });
      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel"
      });
      flag1 = 1;
    }
</script>

<script type="text/javascript">
        var latitude ='<?=$zomato->location->latitude?>';
        var longitude = '<?=$zomato->location->longitude?>'
        var coords = new google.maps.LatLng(latitude, longitude);
        var mapOptions = {
            zoom: 15,
            center: coords,
            mapTypeControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(
                document.getElementById("mapPlaceholder"), mapOptions
            );
            var marker = new google.maps.Marker({
            position: coords,
            map: map,
            title: "Restaurant location!"
            });
</script>
</body>
</html>



