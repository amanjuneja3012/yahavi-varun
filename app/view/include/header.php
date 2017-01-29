<?php 
$curl=new curl;
@$json=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
$user=$json->data;
switch (@$user->user_type) {
  case '1':
    $artist_url=ARTIST_URL;
    $pic=API_URL.'/images/artist'.$user->profile_pic;
    break;
  case '2':
    $artist_url=BUSINESS_URL;
    $pic='<?=API_URL?>/images/business'.$user->profile_pic;
    break;
  default:
    $artist_url=WEB_URL;
    break;
}
$event_url=$artist_url.'/event';
$artist_url.='/artist';
@$title=$data['title']?$data['title']:'Yahavi';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?=$title?></title>
<link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/assets/css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="/assets/css/parsley.css">
<link rel="stylesheet" type="text/css" href="/assets/css/star-rating.css">
<link rel="stylesheet" type="text/css" href="/assets/css/lightbox.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/css/select2.min.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


</head>

<body>

<!--page-wrap start-->

<div id="sidebar">
  <div class="sidebar-overlay"></div>
  <div class="asidescroll">
    <ul>

       <?php 
          if ($user->user_type) {
            if ($user->user_type==1) {?>
              <li>
                <a href="<?=ARTIST_URL?>">Profile</a>
              </li>
            <?php }else{?>
            <li>
            <a href="<?=BUSINESS_URL?>">Profile</a>
          </li>
            <?php }
          }
          ?>

      <li>
        <a href="/">Homepage </a>
      </li>


          <li>
            <a href="#" class="jq_asidemenu">Why Yahavi 
              <span class="updown_airro"><i class="downairro"></i></span>
            </a>
            <ul class="submenu1">
              <li><a href="/aboutus">Brand Video</a></li>
              <li><a href="/aboutus/company">Company</a></li>
              <li><a href="/aboutus/culture">Culture</a></li>
              <li><a href="/aboutus/team">Team</a></li>
              <li><a href="/aboutus/archives">Archive</a></li>
              <li><a href="/aboutus/news-room">News Room</a></li>
              <li><a href="/aboutus/testimonial">Testimonial</a></li>
            </ul>
          </li>

         
    </ul>
  </div>

  <div id="sidebar-footer" class="sidebar_adsjust">


  <ul>
      <li><i class="fa fa-gavel"></i><a href="/privacy">Privacy Policy</a></li>
      <li><i class="fa fa-phone"></i><a href="/contactus">contact Us</a></li>
      <?php 
      if ($user->id) {?>
        <li><i class="fa fa-sign-out"></i><a href="/logout">Logout</a></li>
      <?php }
      ?>
      
    </ul>

    <!-- <div class="sidebar_icon">
      <span><i class="fa fa-question-circle"></i></span>
      <span><i class="fa fa-black-tie"></i></span>
      <span><i class="fa fa-phone"></i></span>
    </div> -->
  </div>
</div>





<div class="home_header statick_header"> 
    <div class="container-fluid">
            <div class="row">
                  <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                    <div class="clearfix">

                       <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="row">
                                         <span class="mobile_menu_new hidden-lg hidden-sm hidden-md pull-left">
                                          <i>&nbsp;</i>
                                          <i>&nbsp;</i>
                                          <i>&nbsp;</i>
                                        </span>
                                        <a href="/">
                                        <img class="logo" src="/assets/images/logo.png" alt="logo" class="img-responsive"></a>
                                    </div>

                                </div>
                                <div class="col-xs-10 hidden-md hidden-sm hidden-lg">
                                    <div class="row">
                                    <?php 
                                    if (!$user->id) {?>
                                      <button class="btn btn-primary login_mbl" style="float: right;margin-left: 10px;">Login</button>
                                    <?php }else{?>
                                    <div style="float:right" class="profile_img"><img src="<?=$user->profile_pic?>" onError="this.src='/assets/images/gallery1.jpg';" alt="image"></div>
                                    <?php }
                                    ?>
                                       
                                        <form action="<?=$artist_url?>" method="GET" class="pull-right">
                                            <div class="home_search mobile">
                                                <input type="text" placeholder="What are you looking for ?" autocomplete="off" onfocus="this.placeholder = ''" onblur="this.placeholder = 'What are you looking for ?'" name="search" value="<?=Input::get('search')?>" style="width:<?=Input::get('search')?'100%':'0px'?>;padding:0px" >
                                                <!-- <input type="submit" class="sprit-headericon"> -->
                                                <button type="submit" class="hd_search"><i class="fa fa-search"></i></button>
                                            </div>
                                        </form>


                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

    
                        
                        <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-2 col-lg-1 col-md-2 col-sm-2 hidden-xs home_padiing_adjust">
                            <div class="viepage1 pull-right width_90">
                                <!--<span class="show-list botm_border">City <i></i></span>
                                <div class="show_wrapper">                     
                                    <ul class="show-drop">
                                        <li><a href="#">Delhi</a></li>
                                        <li><a href="#">Mumbai</a></li>
                                        <li><a href="#">Delhi</a></li>
                                        <li><a href="#">Mumbai</a></li>
                                    </ul>
                                </div>-->
                            </div><!--viepage1 end-->
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs home_padiing_adjust">
                            <form action="<?=$artist_url?>" method="GET">
                                <div class="home_search mobile">
                                    <input type="text" placeholder="Search..." name="search" value="<?=Input::get('search')?>">
                                    <!-- <input type="submit" class="sprit-headericon"> -->
                                    <button type="submit" class="hd_search"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>    
                  </div>
                    <!--col-lg-8 end-->
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 hidden-xs home_padiing_adjust">
                        <div class="header-loginpart clearfix" style="margin-top:5px">   
                            <div class="viepage1 width125">
                                <span class="show-list">Why Yahavi</span>
                                <div class="show_wrapper">
                                    <ul class="show-drop">
                                    <li><a href="/aboutus">Brand Video</a></li>
                                    <li><a href="/aboutus/company">Company</a></li>
                                    <li><a href="/aboutus/culture">Culture</a></li>
                                    <li><a href="/aboutus/team">Team</a></li>
                                    <li><a href="/aboutus/archives">Archive</a></li>
                                    <li><a href="/aboutus/news-room">News Room</a></li>
                                    <li><a href="/aboutus/testimonial">Testimonial</a></li>
                                </ul>
                                </div>  
                            </div><!--viepage1 end-->
                            
                            <div class="viepage1 width_90">
                              <a href="<?=BLOG_URL?>" target="blank"><span class="show-list">Blog</span></a>
                            </div><!--viepage1 end-->
                                
                            <?php if (!isset($user->id)) {?>
                                <div class="viepage1 width_90" >
                                <button class="btn btn-primary show-list" style="width:90px;margin-top:-8px" > Login</button>
                                <div class="show_wrapper">                   
                                    <ul class="show-drop padding-drp loginbtn">
                                        <li><a href="#">Artist</a></li>
                                        <li><a href="#">Audience</a></li>
                                        <li><a href="#">Business</a></li>
                                    </ul>
                                </div>
                            </div>    
                            <?php }else { ?>
                            
                                <?php if ($user->user_type==1){ ?>
                                <div class="viepage1 width_90">
                                  <div class="profile_img"><img src="<?=$user->profile_pic?>?d=35x35" onError="this.src='/assets/images/gallery1.jpg';" alt="image"></div>
                                      <div class="show_wrapper signupwidth-adjust">                   
                                        <ul class="show-drop">
                                            <li><a href="<?=ARTIST_URL?>">Profile</a></li>
                                            <li><a href="<?=ARTIST_URL?>/logout">Logout</a></li>
                                        </ul>
                                      </div>
                                  </div>
                                <?php }elseif ($user->user_type==2) {?>
                                  <div class="viepage1 width_90">
                                  <div class="profile_img"><img src="<?=$user->profile_pic?>?d=35x35" onError="this.src='/assets/images/gallery1.jpg';" alt="image"></div>
                                      <div class="show_wrapper signupwidth-adjust">                   
                                        <ul class="show-drop">
                                            <li><a href="<?=BUSINESS_URL?>">Profile</a></li>
                                            <li><a href="<?=BUSINESS_URL?>/logout">Logout</a></li>
                                        </ul>
                                      </div>
                                  </div>
                                <?php }elseif ($user->user_type==3) {?>
                                  <div class="viepage1 width_90">
                                  <div class="profile_img"><img src="<?=$user->profile_pic?>?d=35x35" alt="image"></div>
                                      <div class="show_wrapper signupwidth-adjust">                   
                                        <ul class="show-drop">

                                            <li><a href="<?=FAN_URL?>">Profile</a></li>
                                            <li><a href="<?=WEB_URL?>/logout">Logout</a></li>
                                        </ul>
                                      </div>
                                  </div>
                                <?php } }?>
                            
            
             
                        </div>   
                    </div>
                    <!--col-lg-4 end-->
                    
                </div>
        </div>
</div>
<div class="mobile_aside">
        <div class="mobile_inner">
           <span class="pop_close sprit-closeicon"></span>

            <ul class="responsive_menu mobile_loginbtn">
                <li><a href="#">Events</a></li>
                <li><a href="#">Artists</a></li>
                <li><a href="#">Blog</a></li>
                <li class="show_submenu"><a href="#">Why Yahavi</a>
                <i class="fa fa-angle-up"></i>
                    <ul class="submenu_main">
                        <li><a href="/aboutus">Brand Video</a></li>
                        <li><a href="/aboutus/company">Company</a></li>
                        <li><a href="/aboutus/culture">Culture</a></li>
                        <li><a href="/aboutus/team">Team</a></li>
                        <li><a href="/aboutus/archives">Archive</a></li>
                        <li><a href="/aboutus/news-room">News Room</a></li>
                        <li><a href="/aboutus/testimonial">Testimonial</a></li>
                    </ul>
                </li>
            </ul>
            <?php if (!isset($user->id)) {?>
                                <div class="mobile_loginrow clearfix">
                                    <i class="pull-right spriticon2-icon2 mobile_login"></i>
                                    <i class="pull-left spriticon2-icon1 mobile_setting"></i>
                                </div> 
                            <?php }else { ?>
                            
                                <?php if ($user->user_type==1){ ?>
                                  <ul class="responsive_menu mobile_loginbtn">
            
                                      <li class="show_submenu"><a href="#">My Account</a>
                                      <i class="fa fa-angle-up"></i>
                                          <ul class="submenu_main">
                                              <li><a href="#">Dashboard</a></li>
                                              <li><a href="#">Opportunities</a></li>
                                              <li><a href="#">Network</a></li>
                                              <li><a href="#">Profile</a></li>
                                              <li><a href="#">Calendar</a></li>
                                              <li><a href="<?=ARTIST_URL?>/logout">Logout</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                                <?php }elseif ($user->user_type==2) {?>
                                  <ul class="responsive_menu mobile_loginbtn">
            
                                      <li class="show_submenu"><a href="#">My Account</a>
                                      <i class="fa fa-angle-up"></i>
                                          <ul class="submenu_main">
                                              <li><a href="#">Dashboard</a></li>
                                              <li><a href="#">Opportunities</a></li>
                                              <li><a href="#">Network</a></li>
                                              <li><a href="#">Profile</a></li>
                                              <li><a href="#">Calendar</a></li>
                                              <li><a href="<?=BUSINESS?>/logout">Logout</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                                <?php }elseif ($user->user_type==3) {?>
                                  <ul class="responsive_menu mobile_loginbtn">
            
                                      <li class="show_submenu"><a href="#">My Account</a>
                                      <i class="fa fa-angle-up"></i>
                                          <ul class="submenu_main">
                                              <li><a href="#">Dashboard</a></li>
                                              <li><a href="#">Opportunities</a></li>
                                              <li><a href="#">Network</a></li>
                                              <li><a href="#">Profile</a></li>
                                              <li><a href="#">Calendar</a></li>
                                              <li><a href="<?=WEB?>/logout">Logout</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                                <?php }?> 
                                <div class="mobile_loginrow clearfix">
                                  <i class="pull-left spriticon2-icon1 mobile_setting"></i>
                                </div>
                                <?php }?>
            
            <div class="mobile_terms">
                <span><a href="/privacy">privacy policy</a></span>
                <span><a href="/contactus">Contact Us</a></span>
            </div>
        </div>
    </div>