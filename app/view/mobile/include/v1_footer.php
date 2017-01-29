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

$json=$curl->get(API_URL.'/business/profile?access_token='.$_COOKIE['access_token']);
$venue_id=json_decode($json->text)->data->venue_id;

$headerKey = isset($data['headerKey'])?$data['headerKey']:'';
?>

<style type="text/css">
.singup-innertab li.active a{
color: #ffffff!important;
background: #01a2a5;

}
.mobile_loginselect.active{
display: table;
}
.mobile_loginselect.active .inputrow,
.mobile_loginselect.active .loginselect{
display:table-cell;
}

.mobile_loginselect .loginselect{width:100px; margin-right: 10px;}

.mobile_loginselect.active .inputrow{width:100%;}
.mobile_loginselect.active .inputrow.paddingl{padding-left:10px;}


.loginselect.toggle{display: none;}

.loginselect .select2-container--default .select2-selection--single{
border-radius:5px;
border-color:#ccc;
}

.loginselect .select2-container .select2-selection--single{height:36px;}

.loginselect .select2-container--default .select2-selection--single .select2-selection__rendered{line-height: 34px;}


.loginselect .select2-container--default .select2-selection--single .select2-selection__arrow{
height:36px;
}
.inputrow .width65{width: 65%;}
#reg, .log{
color: #374f8a;
cursor: pointer;
font-size: 12px;
margin-top: 10px;
}


</style>



<section id="login-content">

		<div class="row loginsection">
			<div class="col s12">
				<style type="text/css">
					#cw1.active a{
						color:#000000 !important;
					}
					#cw2.active a{
						color:#000000 !important;
					}
				</style>
				<ul class="login-tab jq-logintab clearfix">
					<li class="active jqblogin-btn" id="cw1"><a href="#">Login</a></li>
					<li class="jqsignup-btn" id="cw2"><a href="#">Signup</a></li>
				</ul>

				
				<div class="modalcontent" id="login-section" style="display:block">
					<div class="modal-right">
						<div class="login-content card">
						<form action="javascript:void(0)" method="post" id="login" data-parsley-excluded='[disabled]'>
						 <div class="mobile_loginselect">
						 	<div class="loginselect toggle">
						 		<select data-placeholder="Select one"  name="country_id" class="js-example-basic-single country" style="width:100%;" data-parsley-required data-parsley-required-message="You can't leave this empty">
						 			<option> </option>
						 		</select>
						 	</div>
							<div class="inputrow">
								<span class="input-icon"><i class="fa fa-user"></i></span>
								<input id="a1" type="text" placeholder="Email or Mobile" name="email" data-parsley-required data-parsley-required-message="Please enter your email id or mobile " data-parsley-pattern="^[a-zA-Z0-9@.\-_]+$" data-parsley-pattern-message="Please enter your email id or mobile"   class="input-custome">
							</div>
						 </div>

							<div class="inputrow">
								<span class="input-icon"><i class="fa fa-lock"></i></span>
								<input type="password" id="a2" placeholder="Password" name="password" data-parsley-required data-parsley-required-message="Please enter your password" class="input-custome">
							</div>
							<div class="right-align" style="margin-top:-10px;"><span class="forgot-btn" style="margin-top:0; margin-bottom: 6px; font-size: 11px;">Forgot Password?</span></div>
							<div class="center-align">
								<button type="submit" class="waves-effect waves-light btn center-align loginbtn" id="login_btn">LOGIN</button> 
							</div>
							<div class="center-align" id='reg'>Register Here</div>
							

							<div class="row-or margin-adjust" style="margin-bottom:9px">
								<span>Social Login</span>
							</div>

							<div class="center-align login-social">
								<a class="waves-effect waves-light btn login-fb" onclick="fb_login('0',this)"><i class="fa fa-facebook left"></i><span>facebook</span></a>
								<a class="waves-effect waves-light btn login-gl" onclick="gp_login('0',this)"><i class="fa fa-google-plus left"></i><span>Google +</span></a>
							</div>
							</form>
						</div>
					</div>
				</div>
				

				<div class="modalcontent" id="signup-section">
					<div class="modal-right card">
						<div class="singuptab-box clearfix">
							<span>i am :</span>
							<ul class="singup-innertab pull-right ">
								<li id="artist-btn"><a href="#">Artist</a></li>
								<li id="business-btn"><a href="#">Business</a></li>
							</ul>
						</div>
						<div class="login-content singup-adjust business-signup singuptab-article">
							<form accept="#" method="post" id="business_signup" data-type="2">
								<div class="inputrow">
									<input type="text" placeholder="Name"  data-parsley-required data-parsley-required-message="Please enter your name" data-parsley-maxlength="50" data-parsley-maxlength-message="Name should not exceed 50 characters" name="name"  class="input-custome">
								</div>

								<div class="inputrow">
									<input type="email" placeholder="Email"  data-parsley-required data-parsley-required-message="Please enter your email id" data-parsley-type="email" data-parsley-type-message="Please enter a valid email id" name="email" class="input-custome">
								</div>
								
								<div class=" inputrow" style="margin-bottom: 15px;">
									<select data-placeholder="Select one"  name="country_id" class="js-example-basic-single country" style="width:100%;" data-parsley-required data-parsley-required-message="You can't leave this empty">
										<option> </option>
									</select>
								</div>
								<div class="inputrow ">
									<input type="text" placeholder="Mobile" name="mobile" data-parsley-required data-parsley-required-message="please enter your mobile" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-minlength-message="please enter 10 digit only" data-parsley-maxlength-message="please enter 10 digit only" data-parsley-type="digits" data-parsley-type-message="please enter digit only"  class="input-custome">
								</div>

								

								<div class="inputrow">
									<input type="Password" placeholder="Password"  name="password" data-parsley-required data-parsley-required-message="Please enter your password first" name="password" id="business_password" class="input-custome">
								</div>
								<input type="hidden"  name="type" value="2" class="input-custome">
								<div class="center-align"><button type="submit" class="waves-effect waves-light btn center-align loginbtn" id="business_signup_btn">SUBMIT</button></div>

								<div class="center-align log">Already Registered Login Here </div>
								<div class="row-or signup-margin-adjust"><span>Social Login</span></div>
								
							</form>
								

								<div class="center-align login-social">
									<button type="button" class="waves-effect waves-light btn login-fb" onclick="fb_login('2',this)"><i class="fa fa-facebook left"></i><span>facebook</span></button>
									<button type="button" class="waves-effect waves-light btn login-gl" onclick="gp_login('2',this)"><i class="fa fa-google-plus left"></i><span>Google +</span></button>
								</div>
								<p class="signterms">By signing up you agree to our <a href="<?=WEB_URL?>/terms">User Terms</a> &amp; <a href="<?=WEB_URL?>/privacy">Privacy Policy</a></p>
						</div>
						<div class="login-content singup-adjust artist-signup singuptab-article" style="display:block">
						 	<form action="#" method="post" id="artist_signup" data-type="1">
								<div class="inputrow">
									<input type="text" placeholder="Name"  name="name" data-parsley-required data-parsley-required-message="Please enter your name" data-parsley-maxlength="50" data-parsley-maxlength-message="Name should not exceed 50 characters"  class="input-custome">
								</div>

								<div class="inputrow">
									<input type="email" placeholder="Email"  name="email" data-parsley-required data-parsley-required-message="Please enter your email id" data-parsley-type="email" data-parsley-type-message="Please enter a valid email id" class="input-custome">
								</div>
								
									<div class="inputrow" style="margin-bottom: 15px;">
										<select data-placeholder="Select one"  name="country_id" class="js-example-basic-single country" style="width:100%;" data-parsley-required data-parsley-required-message="You can't leave this empty">
											<option> </option>
										</select>
									</div>
									<div class="inputrow">
										<input type="text" placeholder="Mobile" name="mobile" data-parsley-required data-parsley-required-message="please enter your mobile" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-minlength-message="please enter 10 digit only" data-parsley-maxlength-message="please enter 10 digit only" data-parsley-type="digits" data-parsley-type-message="please enter digit only"  class="input-custome">
									</div>

								

								<div class="inputrow">
									<input type="Password" placeholder="Password" name="password"  data-parsley-required data-parsley-required-message="Please enter your password" id="artist_password" class="input-custome">
								</div>
								<input type="hidden"  name="type" value="1" class="input-custome">

								<div class="center-align">
									<button type="submit" class="waves-effect waves-light btn center-align loginbtn" id="artist_signup_btn">SUBMIT</button>
								</div>
								<div class="center-align log">Already Registered Login Here </div>

								<div class="row-or signup-margin-adjust"><span>Social Login</span></div>
							</form>

								<div class="center-align login-social">
									<button type="button" class="waves-effect waves-light btn login-fb" onclick="fb_login('1',this)"><i class="fa fa-facebook left"></i><span>facebook</span></button>
									<button type="button" class="waves-effect waves-light btn login-gl" onclick="gp_login('1',this)"><i class="fa fa-google-plus left"></i><span>Google +</span></button>
								</div>
						 	



							<p class="signterms">By signing up you agree to our <a href="<?=WEB_URL?>/terms" >User Terms</a> &amp; <a href="<?=WEB_URL?>/privacy">Privacy Policy</a></p>
						</div>
						
					</div>
				</div>


				<div class="forget-section" id="forgot">
					<div class="forgot-logo">
						<h2>Forgot password ?</h2>
					</div>

					<div class="card">
						<form action="javascript:void(0)" method="post" id="forget_pass" data-parsley-excluded='[disabled]' >
							<div class="inputrow">
								<label class="forget-label">Enter your Email  ID to help us identify you.</label>
								<input type="email" placeholder="Email id" data-parsley-required data-parsley-required-message="please enter email" data-parsley-type="email" name="email" class="input-custome">
							</div>
							<button type="submit" class="waves-effect btn next-forgot">Next</button>
						</form>
					</div>

				</div>


				<form action="javascript:void(0)" method="post" id="reset_pass" data-parsley-excluded='[disabled]'>
					<div class="forget-section" id="resetpassword">
						<div class="forgot-logo">
							<h2>Reset your password </h2>

						</div>

						<div class="card">
							<div class="inputrow">
								<label class="forget-label">Password reset code has been sent to your E-mail ID & contact number. Please Check</label>
								<input type="email" placeholder="Email id" name="email" data-parsley-required data-parsley-type="email" disabled="disabled" class="input-custome">
							</div>
							<div class="inputrow">
								<input type="text" placeholder="Enter your code" data-parsley-required name="pass_code" class="input-custome">
							</div>
							<div class="inputrow">
								<input type="password" placeholder="New password" data-parsley-required  name="password" id="password" class="input-custome">
							</div>
							<div class="inputrow">
								<input type="password" placeholder="Confirm password" data-parsley-required data-parsley-equalto="#password" class="input-custome">
							</div>
							<button type="submit" class="waves-effect btn resetbtn">Submit</button>
						</div>
					</div>
				</form>


			</div>
		</div>
	</section>


</div>
<div class="overlay-popup"></div>
<div id="asidenav">
	<span class="aside-close"><i class="fa fa-times"></i></span>
	<div class="navhead clearfix">

	<?php if($user->id){ ?>
	<div>
	<div class="navlogin-profile left"><img src="<?=$user->profile_pic?>?d=55x55" onError="this.src='/assets/images/gallery1.jpg';" alt="Image" title=""></div>
		<div class="navlogin-name " style="line-height:normal;">
			<?php if($user->user_type==3){ ?>
				<div class="wrap "><a href="<?=$profile_url?>"><?=$user->name?></a></div>
				<a class="waves-effect waves-light btn view_profile_btn" href="<?=$profile_url?>">View profile</a>

			<?php } else{ ?>
				<div class="wrap "><a href="<?=$profile_url.'/'.$user->id?>"><?=$user->name?></a></div>
				<a class="waves-effect waves-light btn view_profile_btn" href="<?=$profile_url.'/'.$user->id?>">View profile</a>
			<?php } ?>
		</div>
	</div>
	<?php }else{ ?>
		<div>
			<div class="navlogin-profile signup-span left"><img src="/assets/mobile/v1/img/fan.png"></div>
			<div class="navlogin-name">
				<span class="signup-span">SIGN IN</span>
			</div>
		</div>
	<?php } ?>	
	</div>
	<nav>
		<?php if($user->user_type==1){ ?>

		<div class="nav-inner artist-logged ">
			<ul>
				<li><a href="javascript:void(0)" class="submenu-toggle waves-effect waves-teal"><i class="material-icons" style="vertical-align: middle;">work</i>My opportunities <i class="fa fa-plus right subicon" aria-hidden="true" style="margin-top:5px;"></i></a>
					<ul class="aside-submenu">
						<li><a href="<?=ARTIST_URL?>/opportunities/event">Opportunities</a></li>
						<li><a href="<?=ARTIST_URL?>/opportunities/event/applied">Applications</a></li>
						<li><a href="<?=ARTIST_URL?>/opportunities/event/invited">Invitations</a></li>
						<li><a href="<?=ARTIST_URL?>/opportunities/event/shortlisted">Shortlisted</a></li>
						<li><a href="<?=ARTIST_URL?>/opportunities/event/booked">Bookings</a></li>
					</ul>
				</li>
				<li id="account_id"><a class="waves-effect waves-teal" href="<?=ARTIST_URL?>/account"><i class="fa fa-user" aria-hidden="true"></i>My account</a></li>
			</ul>
		</div>
		<?php } if($user->user_type==2){ ?>
		<div class="nav-inner business-logged ">
			<ul>
				<!-- <li><a href="#"><i class="material-icons">work</i>Plan Event</a></li> -->
				
				<li><a id="plan_event" href="/venue/<?=$venue_id?>/event/ongoing" class="submenu-toggle submenu-toggle waves-effect waves-teal"><i class="material-icons">work</i>Plan Event <i class="fa fa-plus right subicon" aria-hidden="true"></i></a>
					<ul class="aside-submenu">
						<li><a href="<?=BUSINESS_URL?>/event/create">Create Event</a></li>
						<li><a href="<?=BUSINESS_URL?>/venue/<?=$venue_id?>/event/ongoing">Ongoing Events </a></li>
						<li><a href="<?=BUSINESS_URL?>/venue/<?=$venue_id?>/event/booked">Booked Events</a></li>
						<li><a href="<?=BUSINESS_URL?>/artist/compare">Compare List</a></li>
						<li><a href="<?=BUSINESS_URL?>/artist/potential">Potential List</a></li>
						<li><a href="<?=BUSINESS_URL?>/event/archives">Archives</a></li>
					</ul>
				</li>
				<li id="account_id"><a class="waves-effect waves-teal" href="<?=BUSINESS_URL?>/account"><i class="fa fa-user" aria-hidden="true"></i>My account</a></li>
			</ul>
		</div>
		<?php } ?>

		<div class="nav-inner">
			<h4>Explore</h4>
			<ul>
				<li><a id="home_id" class="waves-effect waves-teal" href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a id="artists_id" class="waves-effect waves-teal" href="/artist"><i class="fa fa-microphone" aria-hidden="true"></i>Artists</a></li>
				<li><a id="events_id" class="waves-effect waves-teal" href="/event"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Events</a></li>
				<li><a id="blogs_id" class="waves-effect waves-teal" href="<?=BLOG_URL?>"><i class="fa fa-rss" aria-hidden="true"></i>Blogs</a></li>
				<li><a id="videos_id" class="waves-effect waves-teal" href="/videos"><i class="fa fa-youtube-play" aria-hidden="true"></i>Videos</a></li>
			</ul>
		</div>
		<div class="nav-inner">
			<h4>Other</h4>
			<ul>
				<li><a id="aboutus_id" class="submenu-toggle waves-effect waves-teal" href="javascript:void(0)" class="submenu-toggle"><i class="fa fa-smile-o" aria-hidden="true"></i>About Us
				<i id="click_plus" class="fa fa-plus right subicon" aria-hidden="true"></i></a>
					<ul class="aside-submenu aboutus_li">
					  <li id="brand1" ><a href="<?=WEB_URL?>/aboutus">Brand Video</a></li> 
			          <li id="company1" ><a href="<?=WEB_URL?>/aboutus/company">Company</a></li>
			          <li id="culture1" ><a href="<?=WEB_URL?>/aboutus/culture">Culture</a></li>
			          <li id="team1" ><a href="<?=WEB_URL?>/aboutus/team">Team</a></li>  
			          <li id="news1" ><a href="<?=WEB_URL?>/aboutus/news">News Room</a></li>
			          <li id="testim1" ><a href="<?=WEB_URL?>/aboutus/testimonial">Testimonial</a></li>
					</ul>
				</li>
				<li id="pri_id" ><a class="waves-effect waves-teal" href="<?=WEB_URL?>/privacy"><i class="fa fa-gavel" aria-hidden="true"></i>Privacy Policy</a></li>
				<li id="ter_id" ><a class="waves-effect waves-teal" href="<?=WEB_URL?>/terms"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>User Terms</a></li>
				<li id="con_id" ><a class="waves-effect waves-teal" href="<?=WEB_URL?>/contactus"><i class="fa fa-phone" aria-hidden="true"></i>Contact us</a></li>
				<?php if($user->id){ ?>
				<li id="lo_id" ><a class="waves-effect waves-teal" href="<?=WEB_URL?>/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign out</a></li>
				<?php } ?>
			</ul>
		</div>
	</nav>

	<div class="aside-footer">
		<a href="https://instagram.com/yahavidotcom"><i class="fa fa-instagram"></i></a>
		<a href="https://www.facebook.com/yahavidotcom"><i class="fa fa-facebook"></i></a>
		<a href="https://www.twitter.com/yahavidotcom"><i class="fa fa-twitter"></i></a>
		<a href="https://www.linkedin.com/company/yahavi"><i class="fa fa-linkedin"></i></a>
		<a href="https://www.pinterest.com/yahavidotcom"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
	</div>
</div>

<div id="searchDropDown" class="dropdown-content-list">
	<a href="javascript:void(0)" class="artist-search-btn"> in Artists</a>
	<a href="javascript:void(0)" class="event-search-btn"> in Events</a>
	<a href="javascript:void(0)" class="blog-search-btn"> in Blogs</a>
	<a href="javascript:void(0)" class="video-search-btn"> in Videos</a>
</div>

<div id="modal3" class="modal mediamodal">
    <div class="modal-content">
      <p>You are trying to register as an <b>ARTIST</b>. Do you want to continue?</p>
    </div>
    <div class="modal-footer modalfooter-btn">
     <a class="btn modal-close btnbg-white w_no">no</a>
      <a class="btn modal-close modalremove1 w_yes">yes</a>
    </div>
</div>

<div id="modal4" class="modal mediamodal">
    <div class="modal-content">
      <p>You are trying to register as <b>BUSINESS</b>. Do you want to continue?</p>
    </div>
    <div class="modal-footer modalfooter-btn">
     <a class="btn modal-close btnbg-white w_no">no</a>
      <a class="btn modal-close modalremove1 w_yes">yes</a>
    </div>
</div>
          
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js??v=3.exp&amp;sensor=false&amp;libraries=places"></script>
<script type="text/javascript" src="/assets/mobile/v1/js/jquery-ui.js"></script>
<script type="text/javascript" src="/assets/mobile/v1/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/assets/mobile/v1/js/materialize.js"></script>
<script type="text/javascript" src="/assets/mobile/v1/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="/assets/mobile/v1/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/mobile/v1/js/select2.js"></script> 
<script type="text/javascript" src="/assets/mobile/v1/js/home.js"></script> 
<script type="text/javascript" src="/assets/mobile/v1/js/filter.js"></script> 
<script type="text/javascript" src="/assets/mobile/v1/js/global.js"></script>
<script type="text/javascript" src="/assets/mobile/v1/js/parsley.js"></script>
<script type="text/javascript" src="/assets/mobile/v1/js/cookie.js"></script>
<script type="text/javascript" src="/assets/mobile/v1/js/scroll.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.3.4/release/featherlight.gallery.min.js" type="text/javascript"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.3.4/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var query_token='<?=Helper::queryToken()?>';
var arr=[];
var access_token="<?=isset($_COOKIE['access_token'])?$_COOKIE['access_token']:''?>";
$(document).ready(function(){

  $('#artist_signup, #business_signup').find('input, textarea, button, select').attr('disabled',true);
  $('.login-fb ,.login-gl').prop('disabled',true);
  
  $('#artist-btn').click(function(){
    $('#modal3').openModal();
  });
  $('.w_yes').click(function(){
    $('#artist_signup').find('input, textarea, button, select').removeAttr('disabled');
    $('.login-fb ,.login-gl').prop('disabled',false);
  });
  $('.w_no').click(function(){
    $('#artist_signup').find('input, textarea, button, select').attr('disabled',true);
    $('.login-fb ,.login-gl').prop('disabled',true);
    return false;
  });

  $('#business-btn').click(function(){
    $('#modal4').openModal();
  });
  $('.w_yes').click(function(){
    $('#business_signup').find('input, textarea, button, select').removeAttr('disabled');
    $('.login-fb ,.login-gl').prop('disabled',false);
  });
  $('.w_no').click(function(){
    $('#business_signup').find('input, textarea, button, select').attr('disabled',true);
    $('.login-fb ,.login-gl').prop('disabled',true);
    return false;
  });







	$('#login-content, .loginback-btn').hide();

// Trending Events slider going button

// trending event for follow section
	/*$('.m-follow i').click(function(){
		$(this).parents('.m-follow').toggleClass('active');
	})*/

// blog carousel for more click toggle
	$('.btn-more').click(function(){
		var $elm = $(this).parents('.artist-carousel-content').find('.blog-article'),
			$text = $(this);
		if($elm.is(':hidden')){
			$elm.show();
			$text.text('less');
		}else{
			$elm.hide();
			$text.text('more');
		}
	});
	$(document).on('click', function(event){
		if(!$(event.target).closest('.btn-more').length){
			$('.blog-article').hide();
			$('.btn-more').text('more');

		}
	});
	// LOGIN MODAL TAB SECTION
	
	
	$('.jq-logintab li').on('click', function(){
		
		var $this = $(this);
		$this.addClass('active').siblings('li').removeClass('active');
		if($this.hasClass('jqblogin-btn')){
			$('#login-section').show();
			$('#signup-section, #forgot, #resetpassword').hide();
		}else if($this.hasClass('jqsignup-btn')){
			$('#login-section').hide();
			$('#signup-section').show();
		}
		return false;
	});

	$('.singup-innertab li').click(function(){
		
		$(this).addClass('active').siblings('li').removeClass('active');
		var num = $(this).index();
		$('.singuptab-article:eq('+num+')').hide().siblings('.singuptab-article').show();
		return false;
	});

	$('.forgot-btn').click(function(){
		
		$('.login-tab, #login-section, #resetpassword').hide();
		$('#forgot').show();
		arr.push('#login-section');
	});

	/*$('.next-forgot').click(function(){
		$('#forgot').hide();
		$('#resetpassword').show();
		arr.push('#forgot');
	});*/

	$('.loginback-btn').click(function(){
		if(arr.length==0){
			singout();
			
			return false;
		}
		if(arr.length==1){
			$('.jq-logintab').show();
		}
		$('#signup-section, #forgot, #resetpassword,#login-section').hide();
		$(arr.pop()).show();
	});// LOGIN MODAL TAB SECTION END

	// login section
	 $('#signup-section').find('input, textarea, button, select').attr('disabled',true);
	 $('.singup-innertab li').click(function(){
	    $('#signup-section').find('input, textarea, button, select').removeAttr('disabled');
	 });
// LOGIN MODAL TAB SECTION

$('.login-span').click(function(){
	$('.header-signup').trigger('click');
	$('#asidenav').animate({
		left: -280
	});
	$('.overlay-popup').fadeOut();
	$('.jqblogin-btn').trigger('click');
});
$('.signup-span').click(function(){
	$('.header-signup').trigger('click');
	$('#asidenav').animate({
		left: -280
	});
	$('.overlay-popup').fadeOut();
	$('.jqsignup-btn').trigger('click');
});

$('#reg').click(function(){
	$('.jqsignup-btn').trigger('click');
});
$('.log').click(function(){
	$('.jqblogin-btn').trigger('click');
})


});


// header-signup click login section show
function singup(i){
	$('footer').hide();
	var i=$('.right').hide();
	$('#content').hide();
	$('#login-content, .loginback-btn').show();
	$('.filter-toggle').hide();
	$('.jqlogin-btn').trigger('click');
}

// login section hide
function singout(i){
	$('footer').show();
	var i=$('.right').show();
	$('#content').show();
	$('#login-content').hide();
	$('#login-content, .loginback-btn').hide();
	$('.filter-toggle').show();
}



	

</script>
<script type="text/javascript">
	 var email='';var password='';var country_code=false;
  $(document).ready(function(){
    $('#login').parsley({errorTemplate: "<span class='my-parsley-error' style='color:red; position:absolute; bottom:0; font-size:12px;'></span>",errorsWrapper: "<div></div>",});
    $('#login').submit(function(e){
      e.preventDefault();
      var formData=$(this).serializeArray();
      if(country_code){
        var val=$('.country').val()+$('#a1').val();
        formData[1].value=val;
      }
      var text=$('#login_btn').text();
      $('#login_btn').text('Processing...').prop('disabled',true);
      $.ajax({
        url:'<?=API_URL?>/account/login?'+query_token,
        data:formData,
        type:'POST',
      }).done(function(data){
        var result=$.parseJSON(data);
        if(result.success==1){
          console.log(result);
          $('#login_btn').text(text).prop('disabled',false);
          $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('user_type',result.data.type,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          window.location.replace('/login');
        }
        else{
          $('#login_btn').text(text).prop('disabled',false);
          message(result.message);
          return false;
        }
      });
    });
    $('#forget_pass').parsley({errorTemplate: "<span class='my-parsley-error' style='color:red; position:absolute; bottom:51px; font-size:12px;'></span>",errorsWrapper: "<div></div>",});
     $('#forget_pass').submit(function(e){
      e.preventDefault();
      var formData=$(this).serialize();
      var forgotData = $(this).serializeArray();
      var forgotEmail = forgotData[0].value;
       for (var i=0; i < forgotData.length; i++) {
        if (forgotData[i].name === 'email') {
            forgotEmail =  forgotData[i].value;
        }
    }
      var text=$('.next-forgot').text();
      $('.next-forgot').text('Processing...').prop('disabled',true);
      $.ajax({
        url:'<?=API_URL?>/account/forgetPassword?'+query_token,
        data:formData,
        type:'POST',
      }).done(function(data){
        console.log(data);
        var result=$.parseJSON(data);
        if(result.success==1){
          $('.next-forgot').text(text).prop('disabled',false);
          $('#forgot').hide();
          $('#resetpassword').show();
          arr.push('#forgot');
          $('#resetpassword').find('input[name="email"]').val(forgotEmail);
          return false;
        }
        if(result.success==0){
          $('.next-forgot').text(text).prop('disabled',false);
          message(result.message);
          return false;
        }
      });
    });
     $('#reset_pass').parsley({errorTemplate: "<span class='my-parsley-error' style='color:red; position:absolute; bottom:0px; font-size:12px;'></span>",errorsWrapper: "<div style='position:relative'></div>",});
     $('#reset_pass').submit(function(e){
      e.preventDefault();
      var formData=$(this).serialize();
      var email=$('#resetpassword').find('input[name="email"]').val();
      formData=formData+'&email='+email;
      var text =$('.resetbtn').text();
      $('.resetbtn').text('processing..').prop('disabled',true);
      $.ajax({
        url:'<?=API_URL?>/account/resetpassword?'+query_token,
        data:formData,
        type:'POST',
      }).done(function(data){
        var result=$.parseJSON(data);
        if(result.success==1){
          $('.resetbtn').text(text).prop('disabled',false);
          message(' Your password has been reset. Please login.');
          $('#login-section').show();
          $('#reset_pass').hide();
          return false;
        }
        if(result.success==0){
          if(result.message=='Invalid Code'){
            message("Please enter valid code");
          }else{
            message('some problem occured');
          }
          $('.resetbtn').text('Submit').prop('disabled',false);
          return false;
        }

      });
    });
    $('#artist_signup').parsley({errorTemplate: "<span class='my-parsley-error' style='color:red; position:absolute; bottom:0; font-size:12px;'></span>",errorsWrapper: "<div></div>",});
    $('#artist_signup').submit(function(e){
      e.preventDefault();
      var text=$('#artist_signup_btn').text();
      $('#artist_signup_btn').prop('disabled',true).text('processing');
      var formData=$(this).serializeArray();
      $.ajax({
        url:'<?=API_URL?>/account/register?'+query_token,
        data:formData,
        type:'POST',
      }).done(function(data){
        var result=$.parseJSON(data);
        if(result.success==1){
          message('You have sucessfully registered as an ARTIST.');
          $('#artist_signup_btn').prop('disabled',false).text(text);
          email=$('.artist-signup [name="email"]').val();
          password=$('.artist-signup [name="password"]').val();
          console.log(email);
          $('#a1').val(email);
          $('#a2').val(password);
          $('#login').trigger('submit');
          return false;
          
        }
        if(result.success==0){
          if(result.message.email=='email should be unique'){
            message('Email already registered. Please login.');
            $('#artist_signup_btn').prop('disabled',false).text(text);
            return false;
          }
          if(result.message=='Duplicate Mobile'){
            message('Mobile Already Registered Please Register With Another Mobile');
            $('#artist_signup_btn').prop('disabled',false).text(text);
            return false;
          }
          message("error");
        }
      });
      
    });


    $('#business_signup').parsley({errorTemplate: "<span class='my-parsley-error' style='color:red; position:absolute; bottom:0; font-size:12px;'></span>",errorsWrapper: "<div></div>",});
    $('#business_signup').submit(function(e){
       e.preventDefault();
      var text=$('#business_signup_btn').text();
      $('#business_signup_btn').prop('disabled',true).text('processing');
      var formData=$(this).serializeArray();
      $.ajax({
        url:'<?=API_URL?>/account/register?'+query_token,
        data:formData,
        type:'POST',
      }).done(function(data){
        var result=$.parseJSON(data);
        if(result.success==1){
          country_code=false;
          message('You have sucessfully registered as an BUSINESS.');
          $('#business_signup_btn').prop('disabled',false).text(text);
          email=$('.business-signup [name="email"]').val();
          password=$('.business-signup [name="password"]').val();
          $('#a1').val(email);
          $('#a2').val(password);
          $('#login').trigger('submit');
          return false;
        }
        if(result.success==0){
          if(result.message.email=='email should be unique'){
            message('Email already registered. Please login.');
             $('#business_signup_btn').prop('disabled',false).text(text);
            return false;
          }
          if(result.message=='Duplicate Mobile'){
            message('Mobile Already Registered Please Register With Another Mobile');
            $('#business_signup_btn').prop('disabled',false).text(text);
            return false;
          }
          message("error");
        }
      });
    });
  });
</script>







<div id="fb-root"></div>
<script type="text/javascript">
//<![CDATA[
window.fbAsyncInit = function() {
   FB.init({
     appId      : '1537332409822532', // App ID
     channelURL : '', // Channel File, not required so leave empty
     status     : true, // check login status
     cookie     : true, // enable cookies to allow the server to access the session
     oauth      : true, // enable OAuth 2.0
     xfbml      : false  // parse XFBML
   });
};
var fb_btn;
var gp_btn;
// logs the user in the application and facebook
function fb_login(type,this1){
   fb_btn=$(this1);
   if(fb_btn.hasClass('ajax-active')){
   	return false;
   }
  fb_btn.prop('disabled',true).find('span').text('processing...');
  fb_btn.addClass('ajax-active');


FB.getLoginStatus(function(r){
     if(r.status === 'connected'){
            afterFbLogin(type);
     }else{
        FB.login(function(response) {
            if(response.authResponse) {
              afterFbLogin(type);
            } else {
              message('not logged in');
            }
     },{scope:'email,public_profile'});
 }
});
}
// Load the SDK Asynchronously
(function() {
   var e = document.createElement('script'); e.async = true;
   e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';                
   document.getElementById('fb-root').appendChild(e);
}());
//]]>

function afterFbLogin (type) {
    FB.api('/me?fields=email,name,id,picture.type(large)', function(response) {
            var formData=response;
                formData.s_access_token=FB.getAuthResponse().accessToken;
                formData.social='fb';
                formData.type=type;
                formData.social_id=response.id;
                formData.profile_pic=response.picture.data.url;
            $.ajax({
                url: '<?=API_URL?>/account/social-login?'+query_token,
                data: formData,
                type: 'POST'
              }).done(function(data){
                result=$.parseJSON(data);
                if (result.success!='1') {
                    if(result.message.email){
                      message("We could not retrieve your email-id from facebook.Please sign up using your email-id.");
                      fb_btn.prop('disabled',false).find('span').text('Facebook');
                      fb_btn.removeClass('ajax-active');
                      return false;
                    }
                    else{
                    message('Email already registered. Please login.');
                    fb_btn.prop('disabled',false).find('span').text('Facebook');
                    fb_btn.removeClass('ajax-active');
                    return false;
                  }
                }
                else{
                  if(result.data.reg==1){
                  	if(result.data.type==1){
                  		message("You have sucessfully registered as an ARTIST.");
                  	}else if(result.data.type==2){
                  		message("You have sucessfully registered as an BUSINESS.");
                  	} else{
                  		message("You have sucessfully registered as an FAN.");
                  	}
                    fb_btn.prop('disabled',false).find('span').text('Facebook');
                  }
                }

                $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                $.cookie('user_type',result.data.type,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                window.location.replace('/login');     
            })
        });
}
</script>



<script type="text/javascript">
var type_u='0';
  (function() {
   var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
   po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
 })();

 function gp_login(type,this1){
  gp_btn=$(this1);
  if(gp_btn.hasClass('ajax-active')){
  	return false;
  }
  gp_btn.prop('disabled',true).find('span').text('processing...');
  gp_btn.addClass('ajax-active');

  type_u=type;
  var myParams = {
    'clientid' : '571790511441-egqr9hf58v2dtslpjjoru6b8p3i7lgq6.apps.googleusercontent.com',
    'cookiepolicy' : 'single_host_origin',
    'callback' : 'afterGpLogin',
    'approvalprompt':'force',
    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
  };
  gapi.auth.signIn(myParams);
}


function afterGpLogin(result)
{
    if(result['status']['signed_in'])
    {
        var request = gapi.client.plus.people.get(
        {
            'userId': 'me'
        });
        request.execute(function (response)
        {
           var formData={};
           formData.name=response.displayName;
           formData.s_access_token=result.access_token;
           formData.social='gplus';
           formData.type=type_u;
           formData.social_id=response.id;
           formData.profile_pic=response.image.url+'&sz=500';
           formData.email=response.emails[0].value;
           console.log(formData);
           $.ajax({
                url: '<?=API_URL?>/account/social-login?'+query_token,
                data: formData,
                type: 'POST'
              }).done(function(data){
                result=$.parseJSON(data);
                if (result.success!='1') {
                    message('Email already registered. Please login.');
                    gp_btn.prop('disabled',false).find('span').text('Google +');
                    gp_btn.removeClass('ajax-active');
                    return false;
                }else{
                  if(result.data.reg==1){
                  	if(result.data.type==1){
                  		message("You have sucessfully registered as an ARTIST.");
                  	}else if(result.data.type==2){
                  		message("You have sucessfully registered as an BUSINESS.");
                  	} else{
                  		message("You have sucessfully registered as an FAN.");
                  	}
                    gp_btn.prop('disabled',false).find('span').text('Google +');
                  }
                }
                $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                $.cookie('user_type',result.data.type,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                window.location.replace('/login');       
            })               
        });
    }
}

function onLoadCallback()
{
    gapi.client.setApiKey('AIzaSyDSuxOegWET2FnPD0_l4G8_iEovwJp3_Zs');
    gapi.client.load('plus', 'v1',function(){});
}
$(document).ready(function(){
	$('.subscribe_btn').on('click',function(e){
		e.preventDefault();
		var emailaddress = $('#first_name2').val();
		if( !isValidEmailAddress( emailaddress ) ) { 
			message("Please enter a valid email address.");
			return false;
		}else{
			$.ajax({
				url: '<?=API_URL?>/subscribe?'+query_token,
				data: {email: emailaddress},
				type: 'POST'
			}).done(function(data){
				result=$.parseJSON(data);
				if (result.success!='1') {
					message('error');
					return false;
				}else{
					message(result.message); 
					window.location.href="/";                              
				}                       
			});
		}
	});
});
window.onclick = function(event) {
  if (!event.target.matches('#search')) {
    $('#searchDropDown').hide();
  }
}
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}



</script>
<script type="text/javascript">
var is_approved="<?=$user->is_approved?>";
$('.btngoing').click(function(){
    if (!access_token) {
    	$.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    	$.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    	$.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $('.header-signup').trigger('click');
      $('.jqblogin-btn').trigger('click');
      return false;
    };
    $this=$(this);
    var going_count=parseInt($(this).parents('.clearfix').find('.right').attr('data-id'));
    console.log(going_count);
     var id=$this.attr("data-id");
        $(this).prop('disabled',true);
        if (($this).hasClass('ajax-waiting')) {
          return false;
        };
        $this.addClass('ajax-waiting');
        if($this.hasClass('active')){
           $.ajax({
            url:'<?=API_URL?>/eventgoing/'+id+'/remove',
            data:query_token,
            method:'POST',
             }).done(function(data){
               $this.removeClass('ajax-waiting');
            result=$.parseJSON(data);
            if(result.success=='1'){
              $this.text('Going?');
                $this.removeClass('active');
                $this.removeClass('ajax-waiting').prop('disabled',false);
                going_count-=1;
                $this.parents('.clearfix').find('.right').attr('data-id',going_count);
                if(going_count>1000){
                	going_count=parseInt(going_count/1000)+'K Attending';
                }else{
                	going_count+=' Attending';
                }
                $this.parents('.clearfix').find('.right').text(going_count);
               return false;
            }
            else{
                message("error");
            }
            return false;
        }); 
        }else{
                $.ajax({
                url:'<?=API_URL?>/eventgoing/'+id,
                data:query_token,
                method:'POST',
                 }).done(function(data){
                   $this.removeClass('ajax-waiting');
                result=$.parseJSON(data);
                if(result.success=='1'){
                  $this.text('Going').append('<i class="fa fa-check"></i>');
                    $this.addClass('active');
                    $this.removeClass('ajax-waiting').prop('disabled',false);
                    going_count+=1;
                    $this.parents('.clearfix').find('.right').attr('data-id',going_count);
                if(going_count>1000){
                	going_count=parseInt(going_count/1000)+'K Attending';
                }else{
                	going_count+=' Attending';
                }
                $this.parents('.clearfix').find('.right').text(going_count);
                   return false;
                }
                else{
                    message("error");
                }
                return false;
            });
        }








    /*$('.btngoing').show();
    $(this).hide();*/
  });




 $('.event-following').click(function(){
    $this=$(this);
    
    var event_id=$(this).attr('data-id');
    if (!access_token) {
    	$.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    	$.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    	$.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $('.header-signup').trigger('click');
      $('.jqblogin-btn').trigger('click');
      return false;
    };
    var follow_count=$(this).attr('data-follow');
    if (($this).hasClass('ajax-waiting')) {
      return false;
    };
    $this.addClass('ajax-waiting');
    if($(this).hasClass('active')){
      $.ajax({
            url:'<?=API_URL?>/eventfollow/'+event_id+'/remove',
            data:query_token,
            method:'POST',
             }).done(function(data){
            result=$.parseJSON(data);
            if(result.success=='1'){
                $this.removeClass('ajax-waiting');
                $this.removeClass('active').find('small').text(parseInt(follow_count)-1);
                $this.attr('data-follow',parseInt(follow_count)-1)
               return false;
            }
            else{
                message("error");
            }
            return false;
        });
    }else{
       $.ajax({
                url:'<?=API_URL?>/eventfollow/'+event_id,
                data:query_token,
                method:'POST',
                 }).done(function(data){
                result=$.parseJSON(data);
                if(result.success=='1'){
                    $this.removeClass('ajax-waiting');
                    $this.addClass('active').find('small').text(parseInt(follow_count)+1);;
                    $this.attr('data-follow',parseInt(follow_count)+1)
                   return false;
                }
                else{
                    message("error");
                }
                return false;
            });
    }
  });

	$(document).on('click','.srtist-following',function(){
	    $this=$(this);
    
    var artist_id=$(this).attr('data-id');
    if (!access_token) {
    	$.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    	$.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    	$.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $('.header-signup').trigger('click');
      $('.jqblogin-btn').trigger('click');
      return false;
    };
    if(is_approved==0 && '<?=$user->user_type?>'!=3){
    	message("To enhance user experience we are approving profiles. Either your profile is incomplete or it is awaiting approval. Please wait for a bit.");
    	return false;
    }

    var follow_count=$(this).attr('data-fan');
    if (($this).hasClass('ajax-waiting')) {
      return false;
    };
    $this.addClass('ajax-waiting');
    if($(this).hasClass('active')){
      $.ajax({
            url:'<?=API_URL?>/artist/'+artist_id+'/fan/remove',
            data:query_token,
            method:'POST',
             }).done(function(data){
            result=$.parseJSON(data);
            if(result.success=='1'){
                $this.removeClass('ajax-waiting');
                $this.removeClass('active').find('small').text(parseInt(follow_count)-1);
                $this.attr('data-fan',parseInt(follow_count)-1)
               return false;
            }
            else{
                message("error");
            }
            return false;
        });
    }else{
       $.ajax({
                url:'<?=API_URL?>/artist/'+artist_id+'/fan',
                data:query_token,
                method:'POST',
                 }).done(function(data){
                result=$.parseJSON(data);
                if(result.success=='1'){
                    $this.removeClass('ajax-waiting');
                    $this.addClass('active').find('small').text(parseInt(follow_count)+1);;
                    $this.attr('data-fan',parseInt(follow_count)+1)
                   return false;
                }
                else{
                    message("error");
                }
                return false;
            });
    }
	  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var $searchText = $('[name=search]');
		$('#search').click(function(){
			if($.trim($searchText.val())!==''){
				$('#searchDropDown').show();
			}
		});

		var $first = $('.artist-search-btn'); 
		var $second = $('.event-search-btn');
		var $third = $('.blog-search-btn');
		var $fourth = $('.video-search-btn');
		$searchText.bind('keyup change', function(e) {
			if($.trim($searchText.val())!==''){
				$('#searchDropDown').show();
			}
			var inArtist = '<strong class="searchTextColor">  &nbsp;&nbsp;in Artists</strong>';
			var inEvents = '<strong class="searchTextColor">  &nbsp;&nbsp;in Events</strong>';
			var inBlogs = '<strong class="searchTextColor">  &nbsp;&nbsp;in Blogs</strong>';
			var inVideos = '<strong class="searchTextColor">  &nbsp;&nbsp;in Videos</strong>';
			$first.text($.trim($searchText.val()));
			$first.append(inArtist);
			$second.text($.trim($searchText.val()));
			$second.append(inEvents);
			$third.text($.trim($searchText.val()));
			$third.append(inBlogs);
			$fourth.text($.trim($searchText.val()));
    		$fourth.append(inVideos);

		});
		

		$(document).on('click','.artist-search-btn',function(){
			window.location.href='/artist?search='+$searchText.val();
		});
		$(document).on('click','.event-search-btn',function(){
			window.location.href='/event?search='+$searchText.val();
		});
		$(document).on('click','.blog-search-btn',function(){
			window.location.href='<?=BLOG_URL?>?search='+$searchText.val();
		});
		$(document).on('click','.video-search-btn',function(){
			window.location.href='<?=WEB_URL?>/videos?search='+$searchText.val();
		});



		var selected_search;
		var li = $('#searchDropDown > a');
		var liSelected;
		$('#search').on('keyup change',function(e){
			if($('#searchDropDown').is(':visible')){
				if(e.which === 40){
					if(liSelected){
						liSelected.removeClass('in-search-focus');
						next = liSelected.next();
						if(next.length > 0){              
							liSelected = next.addClass('in-search-focus');
						}else{
							liSelected = li.eq(0).addClass('in-search-focus');
						}
					}else{
						liSelected = li.eq(0).addClass('in-search-focus');
					}
				}
				if(e.which === 38){
					if(liSelected){
						liSelected.removeClass('in-search-focus');
						next = liSelected.prev();
						if(next.length > 0){
							liSelected = next.addClass('in-search-focus');
						}else{
							liSelected = li.last().addClass('in-search-focus');
						}
					}else{
						liSelected = li.last().addClass('in-search-focus');
					}
				}
				if(e.which === 13){     
					$('#searchDropDown').hide();
					selected_search = $('#searchDropDown > a.in-search-focus');     
					if(selected_search.hasClass('event-search-btn') || selected_search.hasClass('blog-search-btn') ||selected_search.hasClass('video-search-btn')){
						e.preventDefault();
						selected_search.click();
					}
				}
				if(e.which === 27 && $('#searchDropDown').is(':visible')){
					$('#searchDropDown').fadeOut(500);
				}
			}     
		});
	});

	/*$(document).click(function(e) {
		if (!$(e.target).closest('#search,.icon-label').length) {
			 $('.headersearch-show').animate({
    			width: '0'
  			});
		}
	});*/
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('[data-share]').on('callajax',function() {
      var t=$(this);
      var d=$.parseJSON(t.attr('data-share'));
      $.ajax({
        url: '<?=API_URL?>/url/share?'+query_token,
        data: {id:d.id,type:d.type,url:d.url},
      })
      .done(function(data) {
        var d=$.parseJSON(data);
        if(d.success=='1'){
          var c=d.data.fb_count+d.data.gp_count+d.data.tw_count;
          t.text(c);
        }
      });
      
    });
    $('[data-share]').trigger('callajax');
  });
</script>

<script type="text/javascript">
<?php 
if (env=='prod') {?>
  window.__lo_site_id = 60166;
  (function() {
    var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
    wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
    })();
<?php } ?>
</script>
<link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
<link rel="stylesheet" type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat'>
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700,500,500italic,700italic,800,400italic,300italic,300,800italic,900'>
<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700,500,500italic,700italic,800,400italic,300italic,300,800italic,900'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="//cdn.rawgit.com/noelboss/featherlight/1.3.4/release/featherlight.min.css" type="text/css" rel="stylesheet" />
<link href="//cdn.rawgit.com/noelboss/featherlight/1.3.4/release/featherlight.gallery.min.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/assets/mobile/v1/css/select2.css">

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-W45NWV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W45NWV');</script>
<!-- End Google Tag Manager -->

<script type="text/javascript">
  $(document).ready(function(){
    $('body').addClass('select2-indexadjust');
    $('body select').select2({minimumResultsForSearch:10000});
    $('#a1').on('keyup', function(){
      $this=$(this);
      var div_1=$(this).parents('.mobile_loginselect');
      if($.isNumeric($(this).val())){
        $('.loginselect.toggle').show();
        div_1.addClass('active');
        country_code=true;
      }else{
        $('.loginselect.toggle').hide();
        div_1.removeClass('active');
        country_code=false;
      }
    });
  })
</script>

<script type="text/javascript">
  var query_token='<?=Helper::queryToken()?>';
  $(document).ready(function(){
    showLoader($('.country'));
    $('select').select2({minimumResultsForSearch:10000});
    $.ajax({
      url:'<?=API_URL?>/form?access_token=<?=$_COOKIE["access_token"]?>',
      data:query_token,
    }).done(function(data){
      hideLoader($('.country'));
      $('#artist_signup_btn').prop('disabled',true);
      result=$.parseJSON(data);
      if (result.success==1) {
        var country=result.data.country;
        if (country.length) {
          country.unshift({id:'',text:''});
          $(".country").select2({
            data:country,
            minimumResultsForSearch : 10,
            placeholder: "Select a country",
            templateResult: formatCountry,
            templateSelection: formatCountry,
          }).val('103').trigger("change");
        };
      };
    });
    function formatCountry (country) {
      if (!country.c_code) { return country.text; }
      return $(
        '<span class="flag-icon flag-icon-'+ country.c_code.toLowerCase() +' flag-icon-squared"></span>' +
        '<span class="flag-text" data-code="'+country.code+'" >'+'  '+ country.text+"</span>"
        );
    };
  });
  function showLoader(elem){
    elem.parents('form').find('[type="submit"]').prop('disabled',true);
    $('<img class="ajax-loading" style="width:30px;position:absolute;right:8px;top:25px" src="/assets/v1/img/ajax-circular.gif">').insertAfter(elem);
  }
  function hideLoader(elem){
    elem.parents('form').find('[type="submit"]').prop('disabled',false);
    elem.parent().find('.ajax-loading').remove();
  }
  <?php 
  if(strtok($_SERVER["REQUEST_URI"],'?')=='/signin'){?>
    $(document).ready(function(){
      $('.header-signup').trigger('click');
    });
  <?php } ?>
</script>