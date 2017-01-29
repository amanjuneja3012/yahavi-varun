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
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Yahavi</title>

<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/materialize.css">
<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/jquery-ui.css">

<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/global.css">

<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/owl.css">

<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/common.css">
<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/parsley.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">

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