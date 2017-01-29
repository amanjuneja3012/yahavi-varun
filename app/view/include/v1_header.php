<?php 
$curl=new curl;
@$json=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
$user=$json->data;

if($user->user_type==1){
  $profile_url=ARTIST_URL;
}elseif($user->user_type==2){
  $profile_url=BUSINESS_URL;
}else{
  $profile_url=FAN_URL;
}
$headerKey = isset($data['headerKey'])?$data['headerKey']:'';
$head=$data['head'];

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

?>

<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
<meta charset="utf-8">
<title><?=$data['title']?$data['title']:'Yahavi'?></title>
<link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700,500,500italic,700italic,800,400italic,300italic,300,800italic,900'>

<link rel="stylesheet" type="text/css" href="/assets/v1/css/materialize.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/owl-carousel/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/owl-carousel/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/owl-carousel/owl.transitions.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/select2.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/grid.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/mason.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/global.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/home.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/event.css"> 
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/artist.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/common.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/parsley.css">
  <link rel="stylesheet" type="text/css" href="/assets/v1/css/featherlight.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
<?php foreach ($head as $key => $value) {
  echo $value;
} 
?>
<noscript>
  <meta http-equiv="refresh" content="0; url=https://www.yahavi.com/404" />
</noscript>
<style type="text/css">
  .label{
    position: absolute;
    display:none;
  }
</style>
</head>
<body>

<div id="layout">
<div class="message">
  <p></p>
</div>
  <header id="main-header" class="clearfix light static">
    <nav class="smooth-transition">
      <div class="nav-wrapper clearfix ">
        <a href="/" class="brand-logo">
          <img src="/assets/v1/img/logo.png" class=" logo img-responsive dark" alt="yahavi logo">
          <img src="/assets/v1/img/logo-dark.png"  class=" logo img-responsive light" alt="yahavi logo dark">
        </a>
        <form action="/artist/" method="GET"  class="header-search">
          <div class="input-field">
          <label for="search" class="label">Search</label>
            <input id="search" type="search" name="search" value="<?=Input::get('search')?>" required placeholder="What are you looking for ?" autocomplete="off" onfocus="this.placeholder = ''" onblur="this.placeholder = 'What are you looking for ?'">
            <span class="icon-label"><img src="/assets/v1/img/search-icon.png" alt="search icon"></span>
            <div id="searchDropDown" class="dropdown-content-list-header">
              <a href="#" class="artist-search-btn"> in Artists</a>
              <a href="#" class="event-search-btn"> in Events</a>
              <a href="#" class="blog-search-btn"> in Blogs</a>
              <a href="#" class="video-search-btn"> in Videos</a>
            </div>
          </div>
        </form>
        <ul class="right hide-on-med-and-down">
          <li class="<?=$headerKey=='artist'?'active':''?>"><a href="/artist">Artists</a></li>
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
          <img src="<?=$user->profile_pic?>?d=35x35" style="cursor: pointer;" alt="<?=$user->name?>">
          <?php }else{?>
          <img src="/assets/images/gallery1.jpg?>?d=35x35" alt="login image" style="cursor: pointer;">
          <?php }?>            
            </span>
            <div class="card profile-menu" style="display:none" id="profilemenu">
              <div class="profile-head clearfix">
                <div class="head-profileimg left">
                <?php if(!empty($user->profile_pic)){?>            
          <img src="<?=$user->profile_pic?>?d=35x35" alt="<?=$user->name?>" style="cursor: pointer;">
          <?php }else{?>
          <img src="/assets/images/gallery1.jpg?>?d=35x35" alt="login image" style="cursor: pointer;">
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

              <ul class="list1 ">
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
