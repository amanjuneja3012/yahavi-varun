<?php 
$curl=new curl;
@$json=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
$user=$json->data;
$pic=$user->profile_pic;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Yahavi</title>
<link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="/assets/mobile/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/assets/mobile/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="/assets/mobile/css/jquery.timepicker.css">
<link rel="stylesheet" type="text/css" href="/assets/mobile/css/style.css">

<link href="/assets/css/lightbox.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/assets/mobile/css/parsley.css">
<link rel="stylesheet" type="text/css" href="/assets/css/cropper.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<div id="sidebar">
	<div class="sidebar-overlay"></div>
	<ul>
		<li>
			<a href="/">Profile</a>
		</li>
		<li>
			<a href="<?=WEB_URL?>">Homepage 
			</a>
	
		</li>
        <li>
        	<a href="#" class="jq_asidemenu">Why Yahavi 
        		<span class="updown_airro"><i class="downairro"></i></span>
        	</a>
        	<ul class="submenu1">
			  <li><a href="<?=WEB_URL?>/aboutus">Brand Video</a></li>
              <li><a href="<?=WEB_URL?>/aboutus/company">Company</a></li>
              <li><a href="<?=WEB_URL?>/aboutus/culture">Culture</a></li>
              <li><a href="<?=WEB_URL?>/aboutus/team">Team</a></li>
              <li><a href="<?=WEB_URL?>/aboutus/archives">Archive</a></li>
              <li><a href="<?=WEB_URL?>/aboutus/news-room">News Room</a></li>
              <li><a href="<?=WEB_URL?>/aboutus/testimonial">Testimonial</a></li>
			</ul>
        </li>
	</ul>

	<div id="sidebar-footer" class="sidebar_adsjust">
		<ul>
			<li><i class="fa fa-cog"></i><a href="/privacy">Privacy Policy</a></li>
			<li><i class="fa fa-phone"></i><a href="/contactus">Contact Us</a></li>
            <li><i class="fa fa-sign-out"></i><a href="/logout">Logout</a></li>
		</ul>

		<div class="sidebar_icon">
			<span><i class="fa fa-question-circle"></i></span>
			<span><i class="fa fa-black-tie"></i></span>
			<span><i class="fa fa-phone"></i></span>
		</div>
	</div>
</div>

<header class="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-2 col-sm-1 col-md-1">
				<div class="navicon">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="col-xs-10 col-sm-11 col-md-11">
				<div class="header_signup pull-right">
	
					<div class="viewpage">
						<form action="/artist" method="GET">
							<div class="header_search">
								<input type="text" placeholder="Search..." value="<?=Input::get('search')?>" name="search" style="width:<?=Input::get('search')?'100%':'0px'?>;padding:0px">
								<button type="submit" class="hd_search"> <i class="fa fa-search"></i></button>
							</div>
						</form>
					</div>

					<div class="viewpage" style="display:none;">
						<div class="headerbell">
							<a href="#"><i class="fa fa-bell"></i></a>
						</div>
					</div>

					<div class="viewpage">
						<div class="profileimg"><img src="<?=$user->profile_pic?>" onError="this.src='/assets/images/gallery1.jpg';" alt="img"></div>
					</div>


				</div>
			</div>
		</div>
	</div>
</header>