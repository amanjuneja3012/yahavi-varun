<?php
$time=$data['time'];
$blog=$data['blog'];
$artists=$data['artists']->result;
$user=$data['user'];
$events=$data['events']->events;
$featured_event=$data['featured_event'];
$featured_media=$data['featured_media'];
$my_acc='';
if($user->user_type==1){
  $profile_url=ARTIST_URL;
  $event_url=ARTIST_URL;
  $my_acc=ARTIST_URL.'/account';
  $opp='<a href="'.ARTIST_URL.'/opportunities/event"><i class="material-icons">work</i> MY OPPORTUNITIES</a>';
}elseif($user->user_type==2){
  $profile_url=BUSINESS_URL;
  $event_url=BUSINESS_URL;
  $my_acc=BUSINESS_URL.'/account';
  $opp='<a href="'.BUSINESS_URL.'/event/create"><i class="material-icons">work</i> PLAN EVENT</a>';
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
$desc=htmlspecialchars('Looking for an artist to perform at your event? Yahavi is a Talent Discovery to create, showcase connect artist with right opportunity. Make your event a success');
$head=[
  '<meta name="Content-Type" content="text/html; charset=utf-8">',
  '<meta name="description" content="'.$desc.'">',
  '<meta name="keywords" content="yahavi,artist,event">',
  '<meta property="og:title" content="Yahavi - Search Events and Book artists in Delhi/NCR, Bangalore, Mumbai, Kolkata, Chennai, Hyderabad">',
  '<meta property="og:url" content="'.WEB_URL.'">',
  '<meta property="og:image" content="'.WEB_URL.'/assets/v1/img/facebook_share.png">',
  '<meta property="og:description" content="'.$desc.'">',
  '<meta property="og:type" content="article">',
  '<meta property="og:site_name" content="yahavi.com">',
  '<meta property="fb:app_id" content="1537332409822532">',
  '<link rel="canonical" href="https://www.yahavi.com/">',
  '<meta name="robots" content="noydir,noodp" />',
  '<link rel="alternate" hreflang="en" href="https://www.yahavi.com/">',
  '<link rel="publisher" href="https://plus.google.com/108957273343148298717">',
  '<meta name="twitter:card" content="summary_large_image">',
  '<meta name="twitter:site" content="@yahavidotcom">',
  '<meta name="twitter:creator" content="@yahavidotcom">',
  '<meta name="twitter:title" content="Yahavi - Search Events and Book artists in Delhi/NCR, Bangalore, Mumbai, Kolkata, Chennai, Hyderabad">',
  '<meta name="twitter:description" content="'.$desc.'">',
  '<meta name="twitter:image" content="'.WEB_URL.'/assets/v1/img/facebook_share.png">',
  '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
];
?>
<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
<meta charset="utf-8">
<title>Yahavi - Search Events and Book artists in Delhi/NCR, Bangalore, Mumbai, Kolkata, Chennai, Hyderabad</title>
<link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700,500,500italic,700italic,800,400italic,300italic,300,800italic,900'>

<link rel="stylesheet" type="text/css" href="/assets/v1/css/materialize.css">
<link rel="stylesheet" type="text/css" href="/assets/v1/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/assets/v1/owl-carousel/owl.theme.css">
<link rel="stylesheet" type="text/css" href="/assets/v1/owl-carousel/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="/assets/v1/css/global.css">
<link rel="stylesheet" type="text/css" href="/assets/v1/css/grid.css">
<link rel="stylesheet" type="text/css" href="/assets/v1/css/home.css">
<link rel="stylesheet" type="text/css" href="/assets/v1/css/parsley.css">
<link rel="stylesheet" type="text/css" href="/assets/v1/css/select2.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">

<?php 
foreach ($head as $key => $value) {
  echo $value;
}
?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
.featurebox-width{
  width: 100%;
  max-width: 100% !important;
}
  .label{
    position: absolute;
    display:none;
  }
  .iframe iframe{
    border:0;
  }
  .iframe img{
    width:100%;
    height:auto;
  }
  .featurevideo{
    padding-bottom: 40%;
  }
  .iframe{
    z-index: 999;
  }
  .yplay{
    position: absolute;
    width: 75px;
    height: 75px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    font-size: 75px;
    z-index: 9999;
    cursor: pointer;
  }
  .yplay i{
    color:rgba(255, 255, 255, 0.5);
    font-size: 75px;
  }
  .featurevideo{
    cursor: pointer;
  }
  .name2{
    color:white;
    text-align: left;
    font-size: 18px;
    position: absolute;
    top: 0px;
    left: 0px;
    z-index: 9999;
    width: 100%;
    height: 100%;
  }
  .name2 a{
    font-size: 14px;
    display: inline-block;
    width: 100%;
    margin-top: 5px;
    margin-left: 5px;
  }
  .name2 span{
    display: inline-block;
    width: 100%;
    margin-top: 5px;
    margin-left: 5px;
  }
  .time{
    position: absolute;
    bottom: 0px;
    right: 0px;
    padding: 5px;
    background: rgba(0, 0, 0,0.75) none repeat scroll 0% 0%;
    font-size: 12px;
  }
  #owl-videos .owl-next,.featurebox-width .owl-prev{
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 0;
  }
  .close-icon{
    bottom: 0;
    position: absolute;
    right: 0;
    cursor: pointer;
    z-index: 999;
  }
  .close-icon:hover{
    background: #fff;
  }
  .featurebox-width{
    max-width: 1200px;
  }
  #sync2 .item:first-child{
    margin-left: 0;
  }
  .hidden-video{
    display: none;
  }
  .scrim1{
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&1+0,0.51+100 */
  background: -moz-linear-gradient(left,  rgba(0,0,0,1) 0%, rgba(0,0,0,0.51) 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(left,  rgba(0,0,0,1) 0%,rgba(0,0,0,0.51) 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right,  rgba(0,0,0,1) 0%,rgba(0,0,0,0.51) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#82000000',GradientType=1 ); /* IE6-9 */
  }
  .name-a{
    position: relative;
    width: 50%;
    top: 50%;
    left: 4%;
    transform: translateY(-50%);
  }
  .name-a .title{
    font-size: 22px;
    font-weight: 600;
    margin:0 0 15px 0;
    max-height: 52px;
    overflow: hidden;
  }
  .name-a .aname,.name-a a{
    font-size: 14px;
    margin:0 0 5px 0;
    color: #fff;
  }
  .name-a span{
    font-size: 11px;
    display: inline;
    margin-top: 0;
    margin-left: 0;
  }
  .aname a{
    display: inline;
    font-weight: 600;
    color: #e8c646;
  }
  p.aname{
    font-size: 12px !important;
  }
  .name-a .get-start{
    letter-spacing: normal;
    text-transform: none;
    padding-left: 10px;
    padding-right: 10px;
  }
  .name-a .get-start i{
    vertical-align: middle;
  }
  #sync1 .owl-controls .owl-buttons div.owl-prev{
    left: 0;
    font-size: 52px;
  }
  #sync1 .owl-controls .owl-buttons div.owl-next{
    right: 0;
    font-size: 52px;
  }

  #sync1 .owl-controls .owl-buttons div{
    top: 0;
    bottom: 0;
    margin: auto;
    background: none;
    height: 52px;
    width: 52px;
  }
  .feature-videorow{
    padding: 0;
  }

  .message {
  background: #f9edbe;
  position: fixed;
  margin-top: 64px;
  margin-left: -31.5%;
/*  margin-left: 27%;*/
left: 50%;
  width: 63%;
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
.close-icon{
  display: none;
}
</style>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61755173-1', 'auto');
  ga('send', 'pageview');

</script>

<script>
  var _comscore = _comscore || [];
  _comscore.push({ c1: "2", c2: "19999774" });
  (function() {
    var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
    s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
    el.parentNode.insertBefore(s, el);
  })();
</script>
<noscript>
  <meta http-equiv="refresh" content="0; url=https://www.yahavi.com/404" />
</noscript>
</head>
<body>
<div id="layout">
<div class="message">
  <p></p>
</div>
  <header id="main-header" class="clearfix">
    <nav class="smooth-transition">
      <div class="nav-wrapper clearfix ">
        <a href="/" class="brand-logo">
          <img src="/assets/v1/img/logo.png" class=" logo img-responsive dark" alt="Yahavi logo">
          <img src="/assets/v1/img/logo-dark.png"  class=" logo img-responsive light" alt="Yahavi logo">
        </a>
        <form action="/artist/" method="GET" class="header-search">
          <div class="input-field">
          <label for="search" class="label">Search</label>
            <input id="search" type="search" name="search" value="<?=Input::get('search')?>" required placeholder="What are you looking for ?" autocomplete="off" onfocus="this.placeholder = ''" onblur="this.placeholder = 'What are you looking for ?'">
            <span class="icon-label"><img src="/assets/v1/img/search-icon.png" alt="search icon">
             <div id="searchDropDown" class="dropdown-content-list">
              <a href="#" class="artist-search-btn"> in Artists</a>
              <a href="#" class="event-search-btn"> in Events</a>
              <a href="#" class="blog-search-btn"> in Blogs</a>
              <a href="#" class="video-search-btn"> in Videos</a>
            </div>
            </span>
          </div>
        </form>
        <ul class="right hide-on-med-and-down">
          <li class="<?=$headerKey=='artist'?'active':''?>"><a href="/artist" class="">Artists</a></li>
          <li class="<?=$headerKey=='event'?'active':''?>"><a href="/event">Events</a></li>
          <li><a href="<?=BLOG_URL?>">Blogs</a></li>
          <li class="<?=$headerKey=='videos'?'active':''?>"><a href="/videos">Videos</a></li>

          <?php if(empty($user)){ ?>

          
          <li data-target="signup"><a class="modal-trigger jq-signup jq-login" href="#modal1">SIGN IN</a></li>
          <li class="sidemenu"><a href="javascript:void(0)"><i class="fa fa-bars"></i></a></li>

          <?php } else{ ?>
          <li class="login-profile">
          <span id="profilepick">
          <?php if(!empty($user->profile_pic)){?>            
          <img src="<?=$user->profile_pic?>?d=35x35" alt="login image" style="cursor: pointer;" alt="<?=$user->name?>">
          <?php }else{?>
          <img src="/assets/images/gallery1.jpg?>?d=35x35" alt="login image" style="cursor: pointer;" alt="No Image">
          <?php }?>
          </span>
            <div class="card profile-menu" style="display:none" id="profilemenu">
              <div class="profile-head clearfix">
                <div class="head-profileimg left">
                <?php if(!empty($user->profile_pic)){?>            
                <img src="<?=$user->profile_pic?>?d=35x35" alt="login image" style="cursor: pointer;" alt="<?=$user->name?>">
                <?php }else{?>
                <img src="/assets/images/gallery1.jpg?>?d=35x35" alt="login image" style="cursor: pointer;" alt="No image">
                <?php }?>
                </div>
                <div class="login-title">
                  <?php if(strlen($user->name)<=20){?>
                <h5><?=$user->name?></h5>
                <?php }else{?>
                  <h5><?=substr($user->name,0,20)?>...</h5>
                  <?php }?>

                  
                  <a href="<?=$profile_url?>"  class="waves-effect waves-light btn" style="font-size: 13px;">View profile</a>
                  
                </div>
              </div>

              <ul class="list1">
                <li><?=$opp?></li>
              </ul>

              <ul class="settinglist">
              <?php if($user->user_type!=3){ ?>

                <li><a href="<?=$my_acc?>"><i class="material-icons">settings</i> My Account</a></li>
              <?php } ?>
                <li id="profilesign-out"><a href="/logout"><i class="material-icons">input</i> Sign out</a></li>
              </ul>
            </div>

          </li>
          <?php } ?>



        </ul>
      </div>
    </nav>
  </header>

  <section id="content">
    <div id="header-waypoint"></div>
    <div id="home-banner">
      <div id="owl-demo" class="owl-carousel">
        <?php foreach ($featured_event as $key => $value) { 
          if ($value->is_laughya=='0') {
            $elink='/event/'.$value->slug;
          }else{
            $elink='/event?search=laughya';
          }
        ?>
          <a href="<?=$elink?>" target="_blank"><div class="item"><img style="width:100%" src="<?=$value->featured_image?>?d=0x484" class="img-responsive" alt="<?=$value->name?>"></div></a>
        <?php  } ?> 
      </div>
    </div>
    <div class="white-section center-align no-bg" id="cta-section">
      <h1>Discover events happening around you.</h1>
      <p>With our up-to-date database, you can find out new events and parties near you, with ease.</p>
      <a href="/event" class="btn  get-start">Get Started</a>
    </div>

    <section class="home-section" id="trending-artists">
      <div class="section-heading-2">
        <span class="separator"></span>
        <h1>Popular Artists</h1>
      </div>
      <div class="row negative-margin">

      <?php foreach ($artists as $key => $value) { if($key==6){
              break;
            }  ?>
        <div style="position:absolute;left:-300000px;top:-300000px">Yahavi Artists <?=$value->name?></div>
        <div class="col s3 artist-tile tile">       
          <div class="content redirectArtist" data-href="/artist/<?=Helper::encodeSlug($value->name,$value->id)?>">
            <div class="contentauto"  ><a style="color:black" href="/artist/<?=Helper::encodeSlug($value->name,$value->id)?>">
          <?php if(strlen(trim($value->name))<=35){ ?>
            <h6><?=$value->name?></h6>
            <?php }else{ ?>
            <h6><?=substr(trim($value->name),0,34)?>...</h6>
            <?php } ?></a>
            <small><?=$value->artist_category?></small>
            <small class="location"><?=$value->city?></small>
            <div class="cta stopRedirectArtist">
              <a href="javascript:void(0)">
                <i class="fa fa-star"></i>
                <span><?=$value->rating?></span>
              </a>
              <a class="srtist-following fix-margin <?=!empty($value->is_fan)?'active':''?>" data-id="<?=$value->id?>" href="javascript:void(0)">
                <i class="fa fa-heart"></i>
                <span>
                <?=$value->fan_count?>
                </span>
              </a>
            </div>            
          </div>
          </div>
          
          <img class="responsive-img" style="width:100%;height:100%" src="<?=$value->profile_pic?>?d=400x400" alt="<?=$value->name?>">
        </div>

          <?php if($key==3){ ?>
          <a href="/artist"><div class="col s6 view-all">
            <div class="cta"><span>View All</span></div>
            <img class="responsive-img" src="/assets/v1/img/1d.png" alt="View all"></a>
          </div> </a>
          <?php } ?>

        <?php } ?>
      </div>
    </section>
    <section id="trending-events" class="home-section">
      <div class="section-heading-2">
        <span class="separator"></span>
        <h1>Trending Events</h1>
      </div>

      <div class="row">
        <div class="col s5 event-detail-col">

          <div id="trending-event-list">

          <?php foreach ($events as $key => $value) {

            if($key==5){
              break;
            }    ?>
            <div style="position:absolute;left:-300000px;top:-300000px">Yahavi event <?=$value->name?></div>
            <div class="trending-event <?=$key==0?'active':''?>" data-index="<?=$key?>">
              <div class="details">
                <h6>
                <?php if(strlen(trim($value->name))<50){?>
                <a href="/event/<?=$value->slug?>" target="_blank" class="weblink-color-black">
                <?=$value->name?>
                </a> 
                <?php }else{?>
                <a href="/event/<?=$value->slug?>" target="_blank" class="weblink-color-black">
                <?=substr(trim($value->name),0,49)?>...
                 </a>
                <?php }?>
                  </h6>        
                <div class="detail">
                  <?=$value->other_artists?>
                </div>
                <?php if(strlen(trim($value->brief_desc))<95){?>
                <p class="desc ">
                <?=$value->brief_desc?>
                </p>
                <?php }else{?>
                <p class="desc ">
                <?=substr(trim($value->brief_desc),0,94)?>...
                </p>
                <?php }?>
                
                <div class="detail"><i class="fa fa-cutlery"></i><?=$value->venue_name?></div>
                <div class="detail"><i class="fa fa-map-marker"></i><?=$value->locality.' , ' .$value->city?></div>
                <div class="detail"><i class="fa fa-calendar"></i><?=date('d-M-y ,  h:i A',strtotime($value->t_from))?></div>

                <div class="event-cta">
                  <a class="btn-social" href="javascript:void(0)">
                    <i class="fa fa-share-alt"></i>
                    <?php $share=json_encode(['id'=>$value->id,'type'=>'admin_events','url'=>'https://yahavi.com/event/'.$value->slug]);?>
                                  <span class="count" data-share='<?=$share?>'><?=($value->fb_count+$value->tw_count+$value->gp_count)?></span>
                  </a>
                  <a class="event-following <?=!empty($value->is_follow)?'faved':''?>" data-id="<?=$value->id?>" href="javascript:void(0)">
                    <i class="fa fa-heart"></i>
                    <span class="count"><?=$value->event_follow_count?></span>
                  </a>

                  <div class="social-popup fix-horizontal">
                    <div class="socialinner">
                      <a class="twitter-bg fb-share" href="https://twitter.com/share?url=https://www.yahavi.com/event/<?=$value->slug?>"><i class="fa fa-twitter"></i></a>
                      <a class="facebook-bg fb-share" href="https://www.facebook.com/sharer/sharer.php?u=https://www.yahavi.com/event/<?=$value->slug?>"><i class="fa fa-facebook"></i></a>
                      <a class="google-bg fb-share" href="https://plus.google.com/share?url=https://www.yahavi.com/event/<?=$value->slug?>"><i class="fa fa-google-plus"></i></a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
        <?php   } ?>

            
            
          </div>
          <div class="event-controls">
            <a href="/event" data-action="all">View all</a>
          </div>
        </div>

        <div class="col s7" id="trending-event-slider-col">
          <div id="trending-event-slider" class="owl-carousel">
            
          <?php foreach ($events as $key2 => $value2) { if($key2==5){
              break;
            }   ?>
            <div class="item"><a href="/event/<?=$value2->slug?>" target="_blank"><img src="<?=$value2->event_image?>?d=675x450" class="img-responsive" alt="<?=$value->name?>" target="_blank"></a>
              <div class="btngoing <?=$value2->is_going?'active':''?> " data-id=<?=$value2->id?>>
                <span class="btn-going"><?=$value2->is_going?'Going <i class="fa fa-check">':'Going?'?></i></span>
                <small><?=$value2->event_going_count?></small>
              </div>

            </div>
            <?php  } ?>


          </div>
        </div>
      </div>
    </section>

    

    <div class="section-heading-2" style="display:<?=sizeof($featured_media)?'':'none'?>">
      <span class="separator"></span>
      <h1>Featured Videos</h1>
    </div>
    <div class="feature-videorow" style="display:<?=sizeof($featured_media)?'':'none'?>">
      <div class="feature-share" style="display:none">
        <span class="featuresgare-btn z-depth-1">
          <i class="fa fa-share-alt" aria-hidden="true"></i>
        </span>
        <div class="socialinner z-depth-2">
          <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
          <a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a>
        </div>
      </div>

      <div class="featurebox-width">
        <div class="close-icon">
          <i class="material-icons videoview" aria-hidden="true" style="color:#000;opacity:1">menu</i>
        </div>
        <div id="sync1" class="owl-carousel">
          <?php 
          foreach ($featured_media as $key => $value) {
            if (!$thumb=$value->json->items[0]->snippet->thumbnails->maxres->url) {
              $thumb=$value->json->items[0]->snippet->thumbnails->medium->url;
            }
            if (!$thumb) {
              $thumb=str_replace('0.jpg','mqdefault.jpg',$value->thumb);
            }
            $thumb='https://cdn.yahavi.com/url?url='.$thumb.'&d=1360x544';
            ?>
            <div data-iframe="0" class="item" data-src="<?=$value->src?>?autoplay=1" data-img="<?=$thumb?>">
              <div class="name2 scrim1">
                <div class="name-a">
                  <p class="title">
                    <?=$value->json->items[0]->snippet->title?$value->json->items[0]->snippet->title:''?>
                  </p>
                  <p class="aname">
                    By <a href="/artist/<?=Helper::encodeSlug($value->artist_name,$value->artist_id)?>"><?=$value->artist_name?></a>
                  </p>
                  <p class="aname" style="padding-bottom:15px;"><?=$value->artist_category?></p>
                  <div class="event-controls" style="width:77px">
                    <a data-action="all" href="/feature-video" target="_blank" class="stopPropagation">View All</a>
                  </div>
                </div>
              </div>
              <div class="featurevideo iframe">
                <img src="<?=$thumb?>">
              </div>
              <div class="yplay"><i class="material-icons">play_circle_outline</i></div>
            </div>
            <?php } ?>
          </div>
      </div>
      <div class="featurebox-width hidden-video" style="margin-top:20px">
          <div id="sync2" class="owl-carousel">
            <?php 
            foreach ($featured_media as $key => $value) {
              if (!$thumb=$value->json->items[0]->snippet->thumbnails->maxres->url) {
                $thumb=$value->json->items[0]->snippet->thumbnails->medium->url;
              }
              if (!$thumb) {
                $thumb=str_replace('0.jpg','mqdefault.jpg',$value->thumb);
              }
              try{
                $d=new DateInterval($value->json->items[0]->contentDetails->duration);
              }catch(Exception $e){

              }
              $t=sprintf("%02d", $d->s);
              $t=sprintf("%02d", $d->i).':'.$t;
              if ($d->h) {
                $t=sprintf("%02d", $d->h).':'.$t;
              }
              ?>
              <div class="item">
                <div class="featurevideo">
                  <img src="<?=$thumb?>" style="width:216px;height:108px">
                  <div class="time"><?=$t?></div>
                </div>
              </div>
              <?php } ?>
            </div>
      </div>
    </div>

    <section class="home-section" id="trending-blogs">
      <div class="section-heading-2">
        <span class="separator"></span>
        <h4>Suggested Blogs</h4>
      </div>

      <div class="row  negative-margin">
      <?php foreach ($blog as $key => $value) { 
            $value->post_content=trim(strip_tags($value->post_content));
           if($key==4){

              break;
            } ?>

        <div class="col s3 blog-tile tile">
          

          <div class="content redirectBlog" data-blogid="<?=$value->post_id?>">
            <h6 class="title">
            <?php if(strlen(trim($value->post_title)) < 65){?>
              <?=trim($value->post_title)?>
            <?php }else{?>            
            <?=substr(trim($value->post_title),0,64)?>...
            <?php }?>
            </h6>

            <p class="desc" style="padding: 9px;">
            <?php if(strlen(trim($value->post_content)) < 105){?>
              <?=trim($value->post_content)?> 
            <?php }else{?>             
            <?=substr(trim($value->post_content),0,105)?>...         
           <?php }?>
            </p>
            <div class="cta stopRedirectBlog">
              <a style="display:none" class="btn-social" href="javascript:void(0)">
                <i class="fa fa-share-alt"></i>
                <span><?=($value->fb_count+$value->gp_count+$value->tw_count)?></span>
              </a>
              <div class="social-popup">
                <div class="socialinner">
                  <a class="twitter-bg fb-share" href="https://twitter.com/share?url=<?=BLOG_URL.'/post/'.Helper::encodeSlug($value->post_title,$value->post_id)?>"><i class="fa fa-twitter"></i></a>
                  <a class="facebook-bg fb-share" href="https://www.facebook.com/sharer/sharer.php?u=<?=BLOG_URL.'/post/'.Helper::encodeSlug($value->post_title,$value->post_id)?>"><i class="fa fa-facebook"></i></a>
                  <a class="google-bg fb-share" href="https://plus.google.com/share?url=<?=BLOG_URL.'/post/'.Helper::encodeSlug($value->post_title,$value->post_id)?>"><i class="fa fa-google-plus"></i></a>
                </div>
              </div>
            </div>
          </div>


          <img class="responsive-img" src="<?=$value->post_image?>?d=400x225" alt="<?=strip_tags($value->post_title)?>">
        </div>

        <?php  } ?>
        
      </div>
      <div class="center-align cta">
        <a href="<?=BLOG_URL?>"><button class="btn">View All</button></a>
      </div>
    </section>

  </section>

</div>
  <?php
    View::make('include/v1_footer');
  ?>
<script type="text/javascript">
$(document).ready(function(){
 
$('.redirectArtist').on('click',function(){
   var artistUrl = $(this).attr('data-href');
   var win = window.open(artistUrl, '_blank');
   win.focus();
   return false;
}).find('.stopRedirectArtist').on('click', function (e) {
    e.stopPropagation();
});
});
$(document).ready(function(){
$('.redirectBlog').on('click',function(){
   var blogid = $(this).data('blogid');
   var blogUrl = '<?=BLOG_URL?>/post/';
  var win = window.open(blogUrl+blogid, '_blank');
   win.focus();
  
}).find('.stopRedirectBlog').on('click', function (e) {
    e.stopPropagation();
});
});

setInterval(function(){
  if ($("#home-banner").find('.owl-item').length>0 && !$("#home-banner").find('.owl-wrapper-outer').hasClass('timer-on')) {
    $("#home-banner").find(".owl-next").trigger("mouseup");  
  }
  if ($("#trending-event-slider").find('.owl-item').length>0 && !$("#trending-event-slider").find('.owl-wrapper-outer').hasClass('timer-on')) {
    $("#trending-event-slider").find(".owl-next").trigger("mouseup");  
  }
},4000);



$(document).on('mouseenter','.owl-wrapper-outer',function(){
  $(this).addClass('timer-on');
}).on('mouseleave','.owl-wrapper-outer',function(){
  $(this).removeClass('timer-on');
})
$(".view-all").css('height',($(document).width()/4)-20);
$(window).resize(function(){
  $(".view-all").css('height',($(document).width()/4)-20);
})
</script>
<script type="text/javascript">
  $('.videoview').on('click', function(){
    $(this).toggleClass('active');
    if($(this).hasClass('active')){
      $(this).text('close');
      $('.hidden-video').slideDown();
    }else{
      $(this).text('menu');
      $('.hidden-video').slideUp();
    }
  });
  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
    sync1.owlCarousel({
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
      afterAction : function(el){
        sync2.trigger("owl.goTo",this.currentItem);
        $("#sync2").find(".owl-item").removeClass("active").eq(this.currentItem).addClass("active");
        $('[data-iframe="1"]').each(function() {
    var t='<img src="'+$(this).attr('data-img')+'">';
    $(this).find('.featurevideo').html(t);
    $(this).find('.name2').show();
    $(this).attr('data-iframe', '0');
    $(".yplay").show();
  });

      },
      responsiveRefreshRate : 100,
    });
    sync2.owlCarousel({
      items : 7,
      itemsDesktop      : [1199,7],
      itemsDesktopSmall     : [979,7],
      itemsTablet       : [768,4],
      itemsMobile       : [479,2],
      pagination:false,
      responsiveRefreshRate : 100,
      afterInit : function(el){
        el.find(".owl-item").eq(0).addClass("active");
      }
    });

    $("#sync2").on("click", ".owl-item", function(e){
      var number = $(this).data("owlItem");
      sync1.trigger("owl.goTo",number);
      sync2.trigger("owl.goTo",number);
    });
   
$("#sync1").find(".item").click(function(){
  var isI=$(this).attr('data-iframe');
  var src=$(this).attr('data-src');
  var thumb=$(this).attr('data-thumb');
  if (isI=='1') {
    
  }else{
     $('[data-iframe="1"]').each(function() {
    var t='<img src="'+$(this).attr('data-img')+'">';
    $(this).find('.featurevideo').html(t);
    $(this).find('.name2').show();
    $(this).attr('data-iframe', '0');
  });
    var html='<iframe src="'+src+'" allowfullscreen>';
    $(this).find('.featurevideo').html(html);
    $(this).find('.name2').hide();
    $(this).attr('data-iframe', 1);
    $(".yplay").hide();
  }
});
$(".stopPropagation").click(function(e) {
  e.stopPropagation();
});
</script>
</body>
</html>