<?php
$time=$data['time'];
$blog=$data['blog'];
$artists=$data['artists']->result;
$user=$data['user'];
$events=$data['events']->events;
$featured_media=$data['featured_media'];
$featured_event=$data['featured_event'];
$my_acc='';
if($user->user_type==1){
  $profile_url=ARTIST_URL;
  $event_url=ARTIST_URL;
  $my_acc=ARTIST_URL.'/account';
}elseif($user->user_type==2){
  $profile_url=BUSINESS_URL;
  $event_url=BUSINESS_URL;
  $my_acc=BUSINESS_URL.'/account';
}
elseif($user->user_type==3){
  $profile_url=FAN_URL;
  $event_url=WEB_URL;
  $my_acc='#';
}
else{
  $profile_url =  WEB_URL;
  $event_url=WEB_URL;
  $my_acc='#';
}
$headerKey = isset($data['headerKey'])?$data['headerKey']:'';
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Yahavi</title>


<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/materialize.css">
<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/global.css">
<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/owl.css">

<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/common.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">

<meta property="og:title" content="YAHAVI" />
<meta property="og:url" content="<?=WEB_URL?>"/>
<meta property="og:description" content="

The journey from talent and creativity to recognition and fame has never been an easy one. The artist within us must navigate a maze of activities: creating content, showcasing artworks, connecting et al until our free spirit feels trapped in systems and business protocols. The internet is our generation’s obvious and omnipresent messiah, but it’s just as easy to be lost as it is to be found or be discovered on the web. This is where we, Yahavi, pop up.

At Yahavi, we are working to create a one-stop platform, a smooth accession path that will not only help you discover the right opportunities week-in, week-out but also will help you connect directly with the right people, be they promoters, fans or audiences. The idea is to use technology as the enabler and provide you the access to all this on-the-go so that art takes the centre stage but managing it doesn’t.

With a young team that has extensive experience across technology and management and has a strong passion for arts, we have our heart in the right place and the DNA to deliver. What we are working on right now is just the beginning
" />
<meta property="og:type" content="article"/> 
<meta property="og:image" content="<?=WEB_URL?>/assets/v1/images/facebook_share.png"/>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


<!--Google Analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61755173-1', 'auto');
  ga('send', 'pageview');

</script>


<!--Comscore-->
<script>
  var _comscore = _comscore || [];
  _comscore.push({ c1: "2", c2: "19999774" });
  (function() {
    var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
    s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
    el.parentNode.insertBefore(s, el);
  })();
</script>
<style type="text/css">
#trending-videos .owl-controls{
  position: unset;
}
#trending-videos .owl-next,#trending-videos .owl-prev{
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto;
  height: 45px;
  width: 45px;
  padding: 0;
  background: none;
  font-size: 45px
}
#trending-videos .owl-controls{
  margin-top: 0;
}
#trending-videos .item{
  margin: 0;
}
#trending-videos .owl-next{
  right: 0;
}
#trending-videos .owl-next i{
  margin-left: 30px;
}
#trending-videos .owl-prev i{
  margin-right: 30px;
}
#trending-videos .owl-prev{
  left: 0;
}
  #owl-videos,#owl-videos iframe{
    width: 100%;
  }
  #owl-videos{
    overflow: hidden;
  }
  .scrim1{
    text-align: left;
    color: rgb(67, 67, 67);
    font-size: 12px;
    position: absolute;
    width: 100%;
    height: 98.5%;
    z-index: 1;
  }
  .name2 a{
    display: inline-block;
    color: #e8c646;
    font-size: 12px;
  }
  iframe{
    border:0;
  }
  .name2 span,.name2 a{
    display: inline-block;
    width: 100%;
  }
  .name2 span{
    font-size: 14px;
    color:#fff;
    max-height: 34px;
    overflow: hidden;
  }
  .name2{
    transform: translateY(-50%);
    top: 50%;
    position: relative;
    left: 10%;
    width: 80%;
  }
.yplay{
    position: absolute;
    color: red;
    width: 52px;
    height: 52px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    font-size: 52px;
    display: none;
  }
    .time{
    position: absolute;
    bottom: 5px;
    right: 0px;
    padding: 5px;
    background: rgba(0, 0, 0,0.75) none repeat scroll 0% 0%;
    font-size: 12px;
    color: #fff;
    z-index: 9;
  }
 
  #owl-videos img{
    width: 100%;
  }
  .scrim1{
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&1+0,0.51+100 */
  background: -moz-linear-gradient(left,  rgba(0,0,0,1) 0%, rgba(0,0,0,0.51) 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(left,  rgba(0,0,0,1) 0%,rgba(0,0,0,0.51) 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right,  rgba(0,0,0,1) 0%,rgba(0,0,0,0.51) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#82000000',GradientType=1 ); /* IE6-9 */
  }
  .name2 .get-start{
    letter-spacing: normal;
    text-transform: none;
    padding-left: 0px;
    padding-right: 5px;
    height: 24px;
    line-height: 24px;
  }
  .name2 .get-start i{
    vertical-align: middle;
  }
  .message {
  background: #f9edbe;
  position: fixed;
  width: 100%;
  color: #222;
  z-index: 1255;
  text-align: center;
  font-weight: bold;
  border: 1px solid #f0c36d;
  min-height: 40px;
  display: none;
  
}
.message p {
  margin-top: 10px;
  margin-bottom: 5px;
}
.message_error{
  background: #f3b9a3;
}
</style>
</head>
<body>

<div id="layout">
<div class="message">
  <p></p>
</div>
  <header id="main-header" class="clearfix z-depth-1">
    <nav class="smooth-transition">
      <div class="nav-wrapper clearfix">
        <a class="left sidemenu" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
        <i class="fa fa-arrow-left loginback-btn" aria-hidden="true" style="display:none"></i>

        <div class="right">
          <form class="header-search left">
            <div class="input-field right-align">
              <!-- <input id="search" type="search"> -->
              <span class="icon-label"><img src="/assets/mobile/v1/img/search-icon.png"></span>
            </div>
          </form>
          <?php if($user->id){ ?>
          <!-- <span class="m-login-profile right"><img src="<?=$user->profile_pic?>" alt="img"></span> -->
          <?php  }else{ ?>
          <a onclick="singup()" href="javascript:void(0)" class="btn header-signup">sign in</a>
          <?php } ?>
        </div>

      </div>
    </nav>
    <div class="headersearch-show">
      <div class="headersearch-inner">
         <span class="backarrow2 left">
          <i class="fa fa-arrow-left" aria-hidden="true"></i>
         </span>
         <div class="headersearch-right">
          <form  method="post">
            <input id="search" type="text" name="search" value="<?=Input::get('search')?>"  autocomplete="off" placeholder="What are you looking for ?" id="searchtext1">
          </form>
          <i class="fa fa-times searchtext1-close" aria-hidden="true"></i>
         </div>
      </div>
    </div>
  </header>

  <section id="content">
    <div id="home-banner">
      <div id="owl-demo" class="owl-carousel">
        <?php foreach ($featured_event as $key => $value) { 
          if ($value->is_laughya=='0') {
            $elink='/event/'.$value->id;
          }else{
            $elink='/event?search=laughya';
          }
        ?>
         <a href="<?=$elink?>"><div class="item"><img onError="this.onerror=null;this.src='<?=$value->featured_image?>?d=720x640';" src="<?=$value->mobile_image?>?d=720x640" class="img-responsive"></div></a>
        <?php  } ?>
      </div>
    </div>
    <div class="white-section center-align" id="cta-section">
      <h3>Discover events happening around you</h3>
      <p>With our up-to-date database, you can find out new events and parties near you, with ease.</p>
      <a href="/event" class="btn" style="height:36px;padding-top:3px">Get Started</a>
    </div>
    

    <section id="trending-artist" class="home-section">
      <div class="section-heading-2">
        <span class="separator"></span>
        <h4>Popular Artists</h4>
      </div>

      <div class="row">
        <div class="col s12">
          <div id="owl-artist" class="owl-carousel owlcontrol1 owlevent-height300">
          <?php foreach ($artists as $key => $value) {
              if($key==5){
                break;
              }    ?>

            <div class="item card">
              <a href="/artist/<?=$value->id?>">
                <img src="<?=$value->profile_pic?>?d=300x300">
              </a>
              <div class="m-follow srtist-following <?=$value->is_fan>0?'active':''?>" data-id="<?=$value->id?>" data-fan="<?=$value->fan_count?>">
                <i class="fa fa-heart" aria-hidden="true"></i>
                <small>
                  <?php
                    if($value->fan_count>1000){
                      $value->fan_count=round($value->fan_count/1000,1).'k';
                    }
                   ?>
                   <?=$value->fan_count?>
                </small>
              </div>

              <div class="m-artist-title">
                <div class="m-artist-head clearfix">
                  <div class="left"><a href="/artist/<?=$value->id?>"><h4 style="color:#fff;width:200px" class="ellipsis"><?=$value->name?></h4></a></div>
                  <div class="right">
                    <span class="reting-astist font-adjust">
                    <i class="fa fa-star" aria-hidden="true"></i> <?=$value->rating?></span>
                  </div>
                </div>
                <div class="m-artist-head clearfix">
                  <div class="left"><span class="font12"><?=$value->artist_category?></span></div>
                  <div class="right"><span class="font12"><?=$value->rating_count?> Votes</span></div>
                </div>
              </div>
            </div>
          <?php   } ?>
            
          </div>
          <div class="event-controls center-align">
            <a href="/artist"><button class="btn" style="height:36px">View all</button></a>
          </div>
        </div>
      </div>
    </section>

    <section id="trending-events" class="home-section">
      <div class="section-heading-2">
        <span class="separator"></span>
        <h4>Trending Events</h4>
      </div>


      <div class="row">
    
        <div class="col s12">
          <div id="owl-event" class="owl-carousel owlcontrol1 owlevent-height200">
            <?php foreach ($events as $key => $value) {
              if($key==5){
                break;
              }    ?>

            <div class="item card">
              <div class="imgviewd">
                <a href="/event/<?=$value->id?>">
                  <img src="<?=$value->event_image?>?d=300x300">
                </a>
                <div class="imgviewd-text">
                <?php
                    if($value->event_view_count>1000){
                      $value->event_view_count=round($value->event_view_count/1000,1).'k Views';
                    }
                   ?>
                   <?=$value->event_view_count.' Views'?>
                </div>
              </div>
              <div class="m-follow event-following <?=$value->is_follow>0?'active':''?>" data-id="<?=$value->id?>" data-follow="<?=$value->event_follow_count?>">
                <i class="fa fa-heart" aria-hidden="true"></i>
                <small>
                  <?php
                    if($value->event_follow_count>1000){
                      $value->event_follow_count=round($value->event_follow_count/1000,1).'k';
                    }
                   ?>
                   <?=$value->event_follow_count?>
                </small>
              </div>
              <div class="event-carousel-content">
                <a href="/event/<?=$value->id?>"><h4><?=$value->name?></h4></a>
                <ul>
                    <?php 
                  $artist_name='';
                  if (sizeof($value->artists)) {
                    foreach ($value->artists as $key => $value1) {
                      $artist_name.='<a style="color:#2f4b93" href="/artist/'.$value1->id.'">'.$value1->name.'</a>,';
                    }
                    $artist_name=rtrim($artist_name,',');
                  }
                  ?>
                  <li class="wrap ellipsis"><?=$artist_name.' '.$value->other_artists?></li>
                  <li><i class="fa fa-cutlery" aria-hidden="true"></i> 
                  <?=$value->venue_name?></li>
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$value->locality.' , ' .$value->city?></li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i> 
                  <?=date('d-M-y ,  h:i A',strtotime($value->t_from))?></li>
                </ul>
                <div class="tilegoing-row clearfix">
                  <div class="left">

                    <!-- <div class="btngoing">Going?</div>

                    <div class="btngoing active">Going <i class="fa fa-check"></i></div> -->

                    <div data-id="<?=$value->id?>" class="btngoing <?=($value->is_going)>0?'active':''?>"><?=$value->is_going>0?'Going <i class="fa fa-check">':'Going?'?></i></div>

                  </div>
                  <div class="right" data-id="<?=$value->event_going_count?>">
                     <?php
                    if($value->event_going_count>1000){
                      $value->event_going_count=round($value->event_going_count/1000,1).'k Attending';
                    }
                   ?>
                   <?=$value->event_going_count.' Attending'?>
                  </div>
                </div>
              </div>
            </div>
            <?php   } ?>

          </div>
          <div class="event-controls center-align">
            <a href="/event"><button class="btn" style="height:36px">View all</button></a>
          </div>
        </div>

      </div>
    </section>

    <section id="trending-videos" class="home-section" style="display:<?=sizeof($featured_media)?'':'none'?>">
      <div class="section-heading-2">
        <span class="separator"></span>
        <h4>Trending Videos</h4>
      </div>
      <div class="row" style="margin-bottom:0">
        <div class="col s12" style="padding:0">
          <div id="owl-videos" class="owl-carousel">
            <?php foreach ($featured_media as $key => $value) {
              if (!$thumb=$value->json->items[0]->snippet->thumbnails->maxres->url) {
                $thumb=$value->json->items[0]->snippet->thumbnails->medium->url;
              }
              if (!$thumb) {
                $thumb=str_replace('0.jpg','mqdefault.jpg',$value->thumb);
              }
              $thumb='https://cdn.yahavi.com/url?url='.$thumb.'&d=480x300';
            try {
             $d=new DateInterval($value->json->items[0]->contentDetails->duration); 
            } catch (Exception $e) {
              
            }
            $t=sprintf("%02d", $d->s);
            $t=sprintf("%02d", $d->i).':'.$t;
            if ($d->h) {
              $t=sprintf("%02d", $d->h).':'.$t;
            }
            ?>
            <div class="item card">
              <div class="scrim1">
                <div class="name2">
                <span style="font-weight:600">
                  <?=$value->json->items[0]->snippet->title?$value->json->items[0]->snippet->title:''?>
                </span>
                <a class="ellipsis" style="margin-top:5px" href="/artist/<?=Helper::encodeSlug($value->artist_name,$value->artist_id)?>"><?=$value->artist_name?></a>
                <span style="font-size:12px;"><?=$value->artist_category?></span>
                </div>
              </div>
              <div class="imgviewd videom" data-time="<?=$t?>" data-src="<?=$value->src?>?autoplay=1" data-img="<?=$thumb?>" data-iframe="0">
                <img src="<?=$thumb?>">
                <div class="time"><?=$t?></div>
                <div class="yplay"><i class="fa fa-youtube-play"></i></div>
              </div>
            </div>
            <?php }?>
          </div>
          <div class="event-controls center-align" style="margin-top: 15px;margin-bottom: 0">
            <a href="/feature-video"><button class="btn" style="height:36px">View all</button></a>
          </div>
        </div>

      </div>
    </section>

    

    <section id="trending-blog" class="home-section">
      <div class="section-heading-2">
        <span class="separator"></span>
        <h4>Suggested  Blogs</h4>
      </div>

      <div class="row">
        <div class="col s12">
          <div id="owl-blog" class="owl-carousel owlcontrol1 owlevent-height169">
            <?php foreach ($blog as $key => $value) {
              $value->post_title=strip_tags($value->post_title);
              $value->post_content=strip_tags($value->post_content);
              if($key==5){
                break;
              }    ?>

              <div class="item card">
                <a href="<?=BLOG_URL.'/post/'.Helper::encodeSlug($value->post_title,$value->post_id)?>">
                  <img src="<?=$value->post_image?>?300x300">
                </a>
                <div class="artist-carousel-content clearfix">
                  <div class="m-blog-content" title="<?=$value->post_title?>">
                    <a class="ellipsis" href="<?=BLOG_URL.'/post/'.Helper::encodeSlug($value->post_title,$value->post_id)?>" style="color:rgb(0,0,0);display:inline-block;width:100%">
                    <?=$value->post_title?>
                    </a>
                  </div>
                  

                  <div class="right-align">
                    <span class="btn-more">more</span>
                  </div>
                  <div class="blog-article">
                  <?php if(strlen(trim(strip_tags($value->post_content))) < 155){?>
                    <?=trim(strip_tags($value->post_content))?> 
                    <?php }else{?>             
                    <?=substr(trim(strip_tags($value->post_content)),0,155)?>...         
                    <?php }?>
                  </div>
                </div>
              </div>
             <?php   } ?>
           
          </div>
          <div class="event-controls center-align">
            <a href="<?=BLOG_URL?>"><button class="btn" style="height:36px">View all</button></a>
          </div>
        </div>
      </div>
    </section>
  </section>
  <footer>
  <div class="container-fluid footer-content">
    <div class="row">
      <div class="col s12 subscribe">
        <h2>Stay Upto Date</h2> 
        <form class="form-inline ">
          <div>
            <input value="" id="first_name2" type="text" placeholder="Enter your email id">
            <button type="submit" class="btn subscribe_btn">Subscribe</button>
          </div> 
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col s12 social-links">
        <h2>Stay Connected</h2>
        <a href="https://www.facebook.com/yahavidotcom" target="_blank" class=""> <i class="fa fa-facebook"></i></a>
          <a href="https://www.twitter.com/yahavidotcom" target="_blank" class=""> <i class="fa fa-twitter"></i></a>
          <a href="https://www.linkedin.com/company/yahavi" target="_blank" > <i class="fa fa-linkedin"></i></a>
          <a href="https://instagram.com/yahavidotcom" target="_blank" class=""> <i class="fa fa-instagram"></i></a>
          <a href="https://www.pinterest.com/yahavidotcom" target="_blank" > <i class="fa fa-pinterest"></i></a>
      </div>
    </div>
    <div class="row footer-accordion">
      <div class="col s12">
        <div class="about-links">
          <h2 class="clearfix">Know about us <i class="fa fa-plus pull-right" aria-hidden="true"></i></h2>
          <div class="footerlist">
            <a href="<?=WEB_URL?>/aboutus">Brand Video</a> 
                <a href="<?=WEB_URL?>/aboutus/company">Company</a>
                <a href="<?=WEB_URL?>/aboutus/culture">Culture</a>
                <a href="<?=WEB_URL?>/aboutus/team">Team</a>  
                <a href="<?=WEB_URL?>/aboutus/news">News Room</a>
                <a href="<?=WEB_URL?>/aboutus/testimonial">Testimonial</a>
          </div>
        </div>

        <!-- <div class="about-links">
          <h2 class="clearfix">Artists <i class="fa fa-plus pull-right" aria-hidden="true"></i></h2>
          <div class="footerlist">
            <a href="#">Artists in Delhi</a>
            <a href="#">Artists in Mumbai</a>
            <a href="#">Artists in Bengaluru</a>
            <a href="#">Artists in Hyderabad</a>
            <a href="#">Artists in Goa</a>
            <a href="#">Artists in Kolkata</a>
            <a href="#">Testimonial</a>
          </div>
        </div>

        <div class="about-links">
          <h2 class="clearfix">Events <i class="fa fa-plus pull-right" aria-hidden="true"></i></h2>
          <div class="footerlist">
            <a href="#">Events in Delhi</a>
            <a href="#">Events in Bengaluru</a>
            <a href="#">Events in Hyderabad</a>
            <a href="#">Events in Goa</a>
            <a href="#">Events in Kolkata</a>
            <a href="#">Events in Mumbai</a>
            <a href="#">Testimonial</a>
          </div>
        </div> -->

        <div class="about-links"><h2><a href="/terms">User terms </a></h2></div>
        <div class="about-links"><h2><a href="/privacy">Privacy Policy</a></h2></div>
        <div class="about-links"><h2><a href="/contactus">Contact Us</a></h2></div>
      </div>
    </div>
  </div>
</footer>
<?php
    View::make('mobile/include/v1_footer');
  ?>


<script type="text/javascript">


$('#home_id').addClass('activebg-menue');

$(document).on('mouseenter','.owl-wrapper-outer',function(){
  $(this).addClass('timer-on');
}).on('mouseleave','.owl-wrapper-outer',function(){
  $(this).removeClass('timer-on');
})

$("#owl-videos").owlCarousel({
            singleItem : true,
      slideSpeed : 1000,
      navigation: true,
      pagination:false,
      singleItem: true,
      autoWidth:true,
      autoHeight:true,
      transitionStyle: "fadeUp",
      loop:true,
      stagePadding:10,
      navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
      autoPlay:false,
      afterAction : function(el){
         $('[data-iframe="1"]').each(function() {
    var t='<img src="'+$(this).attr('data-img')+'"><div class="yplay"><i class="fa fa-youtube-play"></i></div><div class="time">'+$(this).attr('data-time')+'</div>';
    $(this).html(t);
    $(this).attr('data-iframe', '0');
    $(this).parent().find('.scrim1').show();
  });

      },
            });
$(".scrim1").click(function() {
  $this=$(this).parent().find('.videom');
  var isI=$this.attr('data-iframe');
  var src=$this.attr('data-src');
  var thumb=$this.attr('data-thumb');
  if (isI=='0') {
    $('[data-iframe="1"]').each(function() {
    var t='<img src="'+$(this).attr('data-img')+'"><div class="yplay"><i class="fa fa-youtube-play"></i></div><div class="time">'+$(this).attr('data-time')+'</div>';
    $(this).html(t);
    $(this).attr('data-iframe', '0');
    $(this).parent().find('.scrim1').show();
  });
    var h=$this.height();
    var html='<iframe src="'+src+'" allowfullscreen style="height:'+h+'px">';
    $this.html(html);
  $this.attr('data-iframe', 1);
  $(this).hide();
  }
});
</script>
<link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat'>
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700,500,500italic,700italic,800,400italic,300italic,300,800italic,900'>
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700,500,500italic,700italic,800,400italic,300italic,300,800italic,900'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/select2.css">
</body>
</html>