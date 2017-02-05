<?php
$time=$data['time'];
$blog=$data['blog'];
$artists=$data['artists']->result;
$user=$data['user'];
$events=$data['events']->events;
$featured_event=$data['featured_event'];
$featured_media=$data['featured_media'];
$my_acc='';

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
<html>
<head>
	<title>Yahavi - Search Events and Book artists in Delhi/NCR, Bangalore, Mumbai, Kolkata, Chennai, Hyderabad</title>
	<link rel="stylesheet" href="/assets_new/css/homepage.css">
	<link rel="stylesheet" href="/assets_new/css/login.css">
	<link rel="stylesheet" href="/assets_new/css/slick.css">
	<link rel="stylesheet" href="/assets_new/css/slick-theme.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<div class="header" >
		<span class="logo-container">
			<span class="header-logo" ></span>
			<span class='header-logo-text'>YAHAVI</span>
		</span>
		<span>
			<span class='header-logo'></span>
			<span class='header-logo'></span>
			<span class='header-logo'></span>
			<button id="login-button" style="float: right;height: 100%;width: 10%;">Sign In</button>
		</span>
	</div>
	<div id="homeBanner" class="top-carousal-card-container">
		<div class="top-carousal-card" style="background-image: url(http://tinyurl.com/jnz8fkg);">
			<h1 class="top-carousal-card-heading">Random Music Gig</h1>
			<p class="top-carousal-card-sub-heading">Someday, Someplace</p>
		</div>
		<div class="top-carousal-card" style="background-image: url(http://tinyurl.com/h3p2vqf);">
			<h1 class="top-carousal-card-heading">NH7 Weekender</h1>
			<p class="top-carousal-card-sub-heading">November 3, Kolkata</p>
		</div>
	</div>
	<div id="homeCarouselContainer" class="bottom-container">
		<div class="bottom-carousal-container">
			<span class="title">Popular Events</span>
			<span class="view-all-button">View all</span>
			<div class="carousal-card-container _events">
				<div class="cards">
					<div class="card-image"></div>
					<div class="card-image-tag">Loading...</div>
					<div class="card-bottom-info">
						<div class="card-header-text">Loading...</div>
						<div class="card-text"></div>
						<div class="card-time">Loading...</div>
						<div class="card-venue">Loading...</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-carousal-container">
			<span class="title">Popular Artists</span>
			<span class="view-all-button">View all</span>
			<div class="carousal-card-container _artists">
				<div class="cards">
					<div class="card-image"></div>
					<div class="card-image-tag">Loading...</div>
					<div class="card-bottom-info">
						<div class="card-header-text">Loading...</div>
						<div class="card-text"></div>
						<div class="card-time">Loading...</div>
						<div class="card-venue">Loading...</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-carousal-container">
			<span class="title">Popular Videos</span>
			<span class="view-all-button">View all</span>
			<div class="video-card-container _videos">
				<div class="video-cards">
					<div class="video-card-image"></div>
				</div>
			</div>
		</div>
		<div class="bottom-carousal-container">
			<span class="title">Blog</span>
			<span class="view-all-button">View all</span>
			<div class="carousal-card-container _blogs">
				<div class="cards">
					<div class="card-image"></div>
					<div class="card-image-tag">Loading...</div>
					<div class="card-bottom-info">
						<div class="card-header-text">Loading...</div>
						<div class="card-text">Loading...</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="login-layer-target">
		
	</div>
</body>
</html>
<script type="text/javascript" src="/assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/assets/js/cookie.js"></script>
<script type="text/javascript" src="/assets_new/js/slick.min.js"></script>
<script type="text/javascript" src="/assets_new/js/homepage.js"></script>
<script type="text/javascript" src="/assets_new/js/login.js"></script>

