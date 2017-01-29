
  <style type="text/css">
  .label{
    position: absolute;
    display:none;
  }

  .modal .modal-footer .btn {
    float: none;
    margin: 6px 0;

}
.modal .modal-footer.conformation-footer .cancelbtn {
    background-color: transparent;
    color: #6e6e6e;
}
.signterms a{
  color:#2f4b93
}
#reg, .log{
  margin-top: 10px;
  margin-bottom: -10px;
  color: #374f8a;
  cursor: pointer;
  font-size: 14px;
}
.loginselect.toggle{
  display: none;
}
.loginselect, .loginselect > select{
  width: 122px;
}
.loginselect .select2-container--default .select2-selection--single{
  background-color:#fafafa;
  border-radius:5px;
}
.loginselect .select2-container .select2-selection--single{
  height: 40px;
}
.loginselect .select2-container--default .select2-selection--single .select2-selection__rendered{
  line-height: 38px;
}
.loginselect .select2-container--default .select2-selection--single .select2-selection__arrow{
  height: 40px;
}
.inputrow .width65{
  width: 65%;
}
.select2-indexadjust .select2-container{
  z-index: 9999 !important;
}
.row-or span{
  font-size: 18px;
  margin-top: -12px;
}
.row-or.signup-margin-adjust {
    margin-top: 30px;
    margin-bottom: 35px;
}
</style>
  <div class="overlay-popup"></div>
    <div id="modal1" class="modal login-modal">
      <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close btn-flat"><i class="fa fa-times"></i></a>
      </div>
      <div class="modalcontent" id="login-section" style="display:block;">
        <div class="modal-aside">
          <h3>Why login with us !</h3>
          <article class="login-article">
            <div class="tooltipped" data-position="right" data-delay="30" data-tooltip="Not registered As Artist? Please click on Signup"><img src="/assets/v1/img/login/artist.png" alt="Yahavi artist login"></div>
            <h5>Artist</h5>
            <p>Showcase and connect your talent to an infinite stream of audience. Grow!</p>
          </article>
          <article class="login-article">
            <div class="tooltipped" data-position="right" data-delay="30" data-tooltip="Not registered As Business? Please click on Signup"><img src="/assets/v1/img/login/business.png" alt="Yahavi business login"></div>
            <h5>Business</h5>
            <p>Discover and identify fan favourite performers and artists of various genres and styles. Broaden your business smoothly.
 </p>
          </article>

           <article class="login-article">
            <div class="tooltipped" data-position="right" data-delay="30" data-tooltip="Not registered As Fan? Please Login Directly Using Facebook or Gplus" ><img src="/assets/v1/img/login/fan.png" alt="Yahavi fan login"></div>
            <h5>fan</h5>
            <p>Know and stay updated about different performers and venues. <b>NO NEED TO SIGN UP! <br> </b> </p>
              <p style="color:#ff5a53;"> <b> Login using Facebook.</b> </p>

          </article>
        </div>
        <div class="modal-right">
          <ul class="login-tab jq-logintab clearfix">
            <li class="active login"><a href="#">Login</a></li>
            <li><a href="#">Signup</a></li>
          </ul>

          <div class="login-content" style="margin-top:88px;">
           <form action="javascript:void(0)" method="post" id="login" data-parsley-excluded='[disabled]'>
                <div class="clearfix">
                  <div class="loginselect toggle left">
                    <select data-placeholder="Select one" name="country_id" class="js-example-basic-single country" style="width:100%;" data-parsley-required data-parsley-required-message="You can't leave this empty">
                      <option> </option>
                    </select>
                  </div>
                  <div class="inputrow">
                    <span class="input-icon"><i class="fa fa-user"></i></span>
                    <label for="a1" class="label">Email</label>
                    <input id="a1" type="text" placeholder="Email or Mobile" name="email" data-parsley-required data-parsley-required-message="Please enter your email id or mobile " data-parsley-pattern="^[a-zA-Z0-9@.\-_]+$" data-parsley-pattern-message="Please enter your email id or mobile"   class="input-custome">
                  </div>
                </div>

                <div class="inputrow">
                  <span class="input-icon"><i class="fa fa-lock"></i></span>
                  <label for="a2" class="label">Password</label>
                  <input type="password" placeholder="Password" name="password" data-parsley-required data-parsley-required-message="Please enter your password" class="input-custome" id="a2">
                </div>
                <div class="right-align" style="margin-top:-10px;"><span class="forgot-btn" style="margin-top:0; margin-bottom: 0; font-size: 12px;position: relative;">Forgot Password?</span></div>
                <div class="center-align">
                  <button type="submit" class="waves-effect waves-light btn center-align loginbtn" id="login_btn">LOGIN</button> 
                </div>
                
                <!-- <div class="center-align"><span class="forgot-btn">Forgot Password?</span></div> -->
                <div class="center-align" id="reg" style="font-size: 12px; margin-bottom:106px;">Register Here</div>
                <div class="row-or margin-adjust" style="margin-bottom:35px; margin-top:27px;">
                 <span style="width:135px; margin-left: -67px;">Social Login</span>
                </div>
                <div class="center-align login-social" style="margin-top: -20px;">
                  <a class="waves-effect waves-light btn login-fb" onclick="fb_login('0',this)"><i class="fa fa-facebook left"></i>facebook</a>
                  <a class="waves-effect waves-light btn login-gl" onclick="gp_login('0',this)"><i class="fa fa-google-plus left"></i>Google +</a>
                </div>
                <p class="signterms">By signing up you agree to our <a href="/terms">User Terms</a> &amp; <a href="/privacy">Privacy Policy</a></p>
            </form>
          </div>
        </div>
      </div>

      <div class="modalcontent" id="signup-section">
        <div class="modal-aside">
          <h3>Why Signup with us !</h3>
          <article class="login-article">
            <div style="cursor: pointer;" class="tooltipped artist-btn" data-position="right" data-delay="30" data-tooltip="Not registered As Artist? Please click on Artist Button"><img src="/assets/v1/img/login/artist.png" alt="Yahavi artist login"></div>
            <h5>Artist</h5>
            <p>Showcase and connect your talent to an infinite stream of audience. Grow!</p>
          </article>

          <article class="login-article">
            <div style="cursor: pointer;" class="tooltipped business-btn" data-position="right" data-delay="30" data-tooltip="Not registered As Business? Please click on Business Button"><img src="/assets/v1/img/login/business.png" alt="Yahavi business login"></div>
            <h5>Business</h5>
            <p>Discover and identify fan favourite performers and artists of various genres and styles. Broaden your business smoothly. </p>
          </article>
          
           <article class="login-article">
            <div style="cursor: pointer;" class="tooltipped fan-btn" data-position="right" data-delay="30" data-tooltip="Not registered As Fan? Please Click on Login And Login Directly Using Facebook or Gplus"><img src="/assets/v1/img/login/fan.png" alt="Yahavi fan login"></div>
            <h5>fan</h5>
            <p>Know and stay updated about different performers and venues. <b>NO NEED TO SIGN UP!</b> </p>
          </article>
        </div>
        <div class="modal-right">
          <ul class="login-tab jq-signuptab clearfix">
            <li><a href="#">Login</a></li>
            <li class="active signup" id="signup"><a href="#">Signup</a></li>
          </ul>

          <div class="singuptab-box clearfix">
            <span>I AM :</span>
            <ul class="singup-innertab pull-right">
              <li><a href="#" class="artist-btn">Artist</a></li>
              <li><a href="#" class="business-btn">Business</a></li>
            </ul>
          </div>
          <div class="login-content singup-adjust singuptab-article business-signup">
            <form accept="#" method="post" autocomplete="off" id="business_signup" data-type="2" data-parsley-excluded='[disabled]'>
              <div class="inputrow">
              <label for="a3" class="label">Name</label>
                <input type="text" placeholder="Name" data-parsley-required data-parsley-required-message="Please enter your name" data-parsley-maxlength="50" data-parsley-maxlength-message="Name should not exceed 50 characters" name="name" class="input-custome" id="a3">
              </div>

              <div class="inputrow">
              <label for="a4" class="label">Email</label>
                <input type="email" placeholder="Email" data-parsley-required data-parsley-required-message="Please enter your email id" data-parsley-type="email" data-parsley-type-message="Please enter a valid email id" name="email" class="input-custome" id="a4">
              </div>
              <div class="inputrow clearfix">
                <div class="loginselect left">
                  <select data-placeholder="Select one"  name="country_id" class="js-example-basic-single country" style="width:100%;" data-parsley-required data-parsley-required-message="You can't leave this empty">
                    <option> </option>
                  </select>
                </div>
                <div class="right width65">
                  <input type="text" placeholder="Mobile" name="mobile" data-parsley-required data-parsley-required-message="please enter your mobile" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-minlength-message="please enter 10 digit only" data-parsley-maxlength-message="please enter 10 digit only" data-parsley-type="digits"  class="input-custome">
                </div>
              </div>

              <div class="inputrow">
              <label for="artist_password" class="label">Password</label>
                <input type="Password" placeholder="Password" data-parsley-required data-parsley-required-message="Please enter your password first" name="password" id="artist_password" class="input-custome">
              </div>

              <!-- <div class="inputrow">
              <label for="a5" class="label">Confirm Password</label>
                <input type="Password" placeholder="Confirm password" data-parsley-required data-parsley-required-message="Please confirm your password" data-parsley-equalto="#artist_password" data-parsley-equalto-message="Password should be same as above"  class="input-custome" id="a5">
              </div> -->
              <div class="inputrow">
                <input type="hidden"  name="type" value="2" class="input-custome">
              </div>

              <div class="center-align">
                <button type="submit" class="waves-effect waves-light btn center-align loginbtn" id="business_signup_btn">SUBMIT</button>
              </div>
              <div class="center-align log" style="font-size: 12px;">Already Registered Login Here </div>
              <div class="row-or signup-margin-adjust"><span style="width: 135px;margin-left: -67px;">Social Login</span></div>
              
            </form>
            <div class="center-align login-social" style="margin-top: -20px;">
                <button class="waves-effect waves-light btn login-fb" onclick="fb_login('2',this)"><i class="fa fa-facebook left"></i>facebook</button>
                <button class="waves-effect waves-light btn login-gl" onclick="gp_login('2',this)"><i class="fa fa-google-plus left"></i>Google +</button>
            </div>
            <p class="signterms">By signing up you agree to our <a href="/terms">User Terms</a> &amp; <a href="#">Privacy Policy</a></p>
          </div>


          <div class="login-content singup-adjust singuptab-article artist-signup" style="display:block">
           <form action="#" method="post" autocomplete="off" id="artist_signup" data-type="1">
              <div class="inputrow">
              <label for="a6" class="label">Name</label>
                <input type="text" placeholder="Name" name="name" data-parsley-required data-parsley-required-message="Please enter your name" data-parsley-maxlength="50" data-parsley-maxlength-message="Name should not exceed 50 characters" class="input-custome" id="a6">
              </div>

              <div class="inputrow">
              <label for="a7" class="label">Email</label>
                <input type="email" placeholder="Email" name="email" data-parsley-required data-parsley-required-message="Please enter your email id" data-parsley-type="email" data-parsley-type-message="Please enter a valid email id" class="input-custome" id="a7">
              </div>

              <div class="inputrow clearfix">
                <div class="loginselect left">
                  <select data-placeholder="Select one"  name="country_id" class="js-example-basic-single country" style="width:100%;" data-parsley-required data-parsley-required-message="You can't leave this empty">
                    <option> </option>
                  </select>
                </div>
                <div class="right width65">
                  <input type="text" placeholder="Mobile" name="mobile" data-parsley-required data-parsley-required-message="please enter your mobile" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-minlength-message="please enter 10 digit only" data-parsley-maxlength-message="please enter 10 digit only" data-parsley-type="digits"  class="input-custome">
                </div>
              </div>

              <div class="inputrow">
              <label for="business_password" class="label">Password</label>
                <input type="Password" name="password" placeholder="Password" data-parsley-required data-parsley-required-message="Please enter your password" id="business_password" class="input-custome">
              </div>

              <!-- <div class="inputrow">
              <label for="a8" class="label">Confirm Password</label>
                <input type="Password" placeholder="Confirm password" data-parsley-required data-parsley-required-message="Please confirm your password" data-parsley-equalto="#business_password" data-parsley-equalto-message="Password should be same as above" class="input-custome" id="a8">
              </div> -->
              <div class="inputrow">
                <input type="hidden"  name="type" value="1" class="input-custome">
              </div>

              <div class="center-align">
                <button type="submit" class="waves-effect waves-light btn center-align loginbtn" id="artist_signup_btn">SUBMIT</button>
              </div>
              <div class="center-align log" style="font-size: 12px;">Already Registered Login Here </div>
              <div class="row-or signup-margin-adjust"><span style="width: 135px;margin-left: -67px;">Social Login</span></div>
            </form>
            <div class="center-align login-social" style="margin-top: -20px;">
                <button class="waves-effect waves-light btn login-fb" onclick="fb_login('1',this)"><i class="fa fa-facebook left"></i>facebook</button>
                <button class="waves-effect waves-light btn login-gl" onclick="gp_login('1',this)"><i class="fa fa-google-plus left"></i>Google +</button>
            </div>
            <p class="signterms">By signing up you agree to our <a href="/terms">User Terms</a> &amp; <a href="/privacy">Privacy Policy</a></p>
          </div>
        </div>
      </div>

      <div class="forget-section" id="forgot">
        <div class="forgot-logo">
          <img src="/assets/v1/img/logo-dark.png" alt="yahavi logo">
          <h3>Forgot password?</h3>
        </div>
        <form action="javascript:void(0)" autocomplete="off" method="post" id="forget_pass" data-parsley-excluded='[disabled]' >
          <div class="inputrow">
            <label for="b0" class="forget-label" style="text-align:center">Enter your Email  ID to help us identify you.</label>
            <input type="email" placeholder="Email id" data-parsley-required data-parsley-type="email" name="email" class="input-custome" id="b0">
          </div>
          <button type="submit" class="waves-effect btn next-forgot">Next</button>
        </form>

        <div class="center-align">
          <span class="forgot-backtbtn" id="return-login">Return to login</span>
        </div>
      </div>

      <form action="javascript:void(0)" autocomplete="off" method="post" id="reset_pass" data-parsley-excluded='[disabled]'>

        <div class="forget-section" id="resetpassword">
          <div class="forgot-logo">
            <img src="/assets/v1/img/logo-dark.png" alt="Yahavi logo">
            <div>
              <h3 style="margin-top:-10px;">Reset your password </h3>
              <h3 style="font-size:15px; margin-top:-10px">Password reset code has been sent to your E-mail ID & contact number. Please Check</h3>
            </div>
          </div>

          <div class="inputrow">
          <label for="b1" class="label">Email</label>
            <input type="email" placeholder="Email id" name="email" class="input-custome" data-parsley-required data-parsley-type="email" disabled="disabled" 
            style="color: black" id="b1">
          </div>
          <div class="inputrow">
          <label for="b2" class="label">Code</label>
            <input type="text" placeholder="Enter your code" data-parsley-required name="pass_code" class="input-custome" id="b2">
          </div>
          <div class="inputrow">
          <label for="password" class="label">Password</label>
            <input type="password" placeholder="New password" data-parsley-required  name="password" id="password" class="input-custome">
          </div>
          <div class="inputrow">
          <label for="b4" class="label">Confirm Password</label>
            <input type="password" placeholder="Confirm password" data-parsley-required data-parsley-equalto="#password" class="input-custome" id="b4">
          </div>
          <button type="submit" class="waves-effect btn resetbtn">Submit</button>

          <div class="center-align">
            <span class="forgot-backtbtn" id="return-password">back</span>
          </div>
        </div>
      </form>
    </div>

    <div id="modal3" class="modal adjust-modalwidth25" style="width:30%">
      <div class="modal-content center-align">
        You are trying to register as an <b>ARTIST</b>. Do you want to continue?
      </div>
      <div class="modal-footer center-align conformation-footer clearfix">
        <a href="javascript:void(0)" class=" modal-action modal-close waves-effect waves-green btn w_no cancelbtn ">no</a>
        <a href="javascript:void(0)" class=" modal-action modal-close waves-effect waves-green btn  w_yes" style="margin-left: 15px;">yes</a>
      </div>
    </div>

    <div id="modal4" class="modal adjust-modalwidth25" style="width:30%">
      <div class="modal-content center-align">
        You are trying to register as a <b>BUSINESS</b>. Do you want to continue?
      </div>
      <div class="modal-footer center-align conformation-footer clearfix">
        <a href="javascript:void(0)" class=" modal-action modal-close waves-effect waves-green btn w_no cancelbtn ">no</a>
        <a href="javascript:void(0)" class=" modal-action modal-close waves-effect waves-green btn  w_yes" style="margin-left: 15px;">yes</a>
      </div>
    </div>

<footer>
    <div class="container-fluid footer-content">
      <div class="row">
        <div class="col s5 about-links">
          <h2>Know About us</h2>
          <span><a href="/aboutus">Brand Video</a></span> 
          <span><a href="/aboutus/#section-one">Company</a></span>
          <span><a href="/aboutus/#section-two">Culture</a></span>
          <span><a href="/aboutus/#section-three">Team</a></span>  
          <span><a href="/aboutus/#section-four">News Room</a></span>
          <span><a href="/aboutus/#section-five">Testimonial</a></span>
        </div>
        <div class="col s3 social-links">
          <h2>Stay Connected</h2>
          <a href="https://www.facebook.com/yahavidotcom" target="_blank" class=""> <i class="fa fa-facebook"></i></a>
          <a href="https://www.twitter.com/yahavidotcom" target="_blank" class=""> <i class="fa fa-twitter"></i></a>
          <a href="https://www.linkedin.com/company/yahavi" target="_blank" > <i class="fa fa-linkedin"></i></a>
          <a href="https://instagram.com/yahavidotcom" target="_blank" class=""> <i class="fa fa-instagram"></i></a>
          <a href="https://www.pinterest.com/yahavidotcom" target="_blank" > <i class="fa fa-pinterest"></i></a>
        </div>
        <div class="col s4 subscribe">
          <h2>Stay Upto Date</h2> 
          <form class="form-inline">
            <div>
            <label for="first_name2" class="label">email</label>
              <input value="" id="first_name2" type="text" placeholder="Enter your email id">
              <button class="btn subscribe_btn" type="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col s6" style="padding-left:0">
          <ul class="privacy left clearfix">
            <li><a href="/artist/list">Artists</a></li>
            <li><a href="/event/list">Events</a></li>
            <li><a href="<?=BLOG_URL?>">Blogs</a></li>
            <li><a href="/videos">Videos</a></li>
          </ul>
        </div>
        <div class="col s6" style="float: right;">
          <ul class="privacy right clearfix">
            <li><a href="/terms">User Terms</a></li>
            <li><a href="/privacy">Privacy Policy</a></li>
            <li><a href="/contactus">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
</footer>

<aside id="asidenav">
      <span class="aside-close"><i class="fa fa-times"></i></span>
      <nav>
        <ul>
          <li><a href="/aboutus">brand video</a></li>
          <li><a href="/aboutus/#section-one">company</a></li>
          <li><a href="/aboutus/#section-two">culture</a></li>
          <li><a href="/aboutus/#section-three">team</a></li>
          <li><a href="/aboutus/#section-four">news room</a></li>
          <li><a href="/aboutus/#section-five">testimonial</a></li>
      </ul>

      <ul>
          <li><a href="/terms">User Terms</a></li>
          <li><a href="/privacy">Privacy Policy</a></li>
          <li itemscope itemtype="https://data-vocabulary.org/Organization"><span style="display:none" itemprop="name">Yahavi</span><a href="/contactus">Contact Us</a></li>
      </ul>
  </nav>

  <div class="aside-footer">
    <a class="href-instagram" href="https://instagram.com/yahavidotcom" target="_blank"><i class="fa fa-instagram"></i></a>
    <a class="href-facebook" href="https://www.facebook.com/yahavidotcom" target="_blank"><i class="fa fa-facebook"></i></a>
    <a class="href-twitter" href="https://www.twitter.com/yahavidotcom" target="_blank"><i class="fa fa-twitter"></i></a>
    <a class="href-linkedin" href="https://www.linkedin.com/company/yahavi" target="_blank"><i class="fa fa-linkedin"></i></a>
    <a class="href-pinterest" href="https://www.pinterest.com/yahavidotcom" target="_blank"><i class="fa fa-pinterest"></i></a>
</div>
</aside>
<div id="fb-root"></div>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://cdn.rawgit.com/noelboss/featherlight/1.4.0/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://maps.googleapis.com/maps/api/js??v=3.exp&amp;sensor=false&amp;libraries=places"></script>
<script type="text/javascript" src="/assets/v1/js/jquery-ui.js"></script>
<script type="text/javascript" src="/assets/v1/js/materialize.js"></script>
<script type="text/javascript" src="/assets/v1/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="/assets/v1/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/v1/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="/assets/v1/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/v1/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/assets/v1/js/select2.js"></script> 
<script type="text/javascript" src="/assets/v1/js/home.js"></script>  
<script type="text/javascript" src="/assets/v1/js/parsley.js"></script>
<script type="text/javascript" src="/assets/v1/js/cookie.js"></script>
<script type="text/javascript" src="/assets/v1/js/global.js"></script> 

<script src="//cdn.rawgit.com/noelboss/featherlight/1.3.4/release/featherlight.gallery.min.js" type="text/javascript"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.3.4/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/detect_swipe/2.1.1/jquery.detect_swipe.min.js"></script>
<script type="text/javascript" src="/assets/v1/js/scroll.js"></script>

<script type="text/javascript" src="/js/footer.js"></script>

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
var query_token='<?=Helper::queryToken()?>';
var access_token="<?=isset($_COOKIE['access_token'])?$_COOKIE['access_token']:''?>";
$(document).ready(function(){
  $('.btngoing').click(function(){
    if (!access_token) {
      $('.jq-login').trigger('click');
      $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      return false;
    };
    $this=$(this);
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
              $this.find('span').text('Going?');
                $this.removeClass('active');
                $this.removeClass('active').prop('disabled',false);
                var going=$this.find('small');
                going.text(going.text()-1);
               return false;
            }
            else{
                message("error");
            }
            return false;
        }); 
        }
        else{
                $.ajax({
                url:'<?=API_URL?>/eventgoing/'+id,
                data:query_token,
                method:'POST',
                 }).done(function(data){
                   $this.removeClass('ajax-waiting');
                result=$.parseJSON(data);
                if(result.success=='1'){
                  $this.find('span').text('Going').append('<i class="fa fa-check"></i>');
                  $this.find('btn-going i').addClass('fa-check');
                    $this.addClass('active');
                    $this.addClass('active').prop('disabled',false);
                    var going=$this.find('small');
                    going.text(parseInt(going.text())+1);
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

  $('.btn-social').on('click', function(){
    $(this).parents('.event-cta, .cta').find('.social-popup').toggle();
    var url=$(this).attr('data-url');
    if($('.social-popup').is(':visible')){
        $.ajax({
            url:'https://graph.facebook.com/v2.8/?id='+url+'&access_token=1537332409822532|38f19bd21aff0c7f8b12b07aff899277',
            method:'GET',
             }).done(function(data){
              if(typeof data.share === "undefined"){
                $('.share_count').text('0 shares'); 
              }else{
                $('.share_count').text(data.share.share_count+' shares');
              }

        });
    }
  });
   $(document).on('click',function(event){
        if(!$(event.target).closest('.btn-social, .social-popup1').length && !$(event.target).closest('.social-popup').length){
               $('.social-popup').hide();
            }
    });


   $(document).on('click','.event-following',function(){
    $this=$(this);
    
    var event_id=$(this).attr('data-id');
    if (!access_token) {
      $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $('.jq-login').trigger('click');
      return false;
    };
    var follow_count=$(this).find('span:nth-child(2)').text();
    if (($this).hasClass('ajax-waiting')) {
      return false;
    };
    $this.addClass('ajax-waiting');
    if($(this).hasClass('faved')){
      $.ajax({
            url:'<?=API_URL?>/eventfollow/'+event_id+'/remove',
            data:query_token,
            method:'POST',
             }).done(function(data){
            result=$.parseJSON(data);
            if(result.success=='1'){
                $this.removeClass('ajax-waiting');
                $this.removeClass('faved').find('span:nth-child(2)').text(parseInt(follow_count)-1);
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
                    $this.addClass('faved').find('span:nth-child(2)').text(parseInt(follow_count)+1);;
                   return false;
                }
                else{
                    message("error");
                }
                return false;
            });
    }
  });

  

  

  $('#return-password').click(function(){
    $('#forgot').show();
    $('.resetbtn').text('Submit').prop('disabled',false);
    $('#reset_pass').parsley().reset();
    $('#resetpassword').hide();
    $('#forget_pass').parsley().reset();
  });

  $('#return-login').click(function(){
    $('#forgot').hide();
    $('#login-section').show();
  });
  $('.forgot-btn').click(function(){
    $(this).parents('.modalcontent').hide();
    $('#forgot').show();
  });
  
 $('.artist-signup').find('input, textarea, button, select').attr('disabled',true);
  
  $('.artist-btn').click(function(){
    $('.singup-innertab li').eq(0).addClass('active').siblings('li').removeClass('active');
    $('#modal3').openModal();
  });
  $('.w_yes').click(function(){
    $('.artist-signup').find('input, textarea, button, select').removeAttr('disabled');
  });
  $('.w_no').click(function(){
    $('.artist-signup').find('input, textarea, button, select').attr('disabled',true);
  });

  $('.business-btn').click(function(){
    $('.singup-innertab li').eq(1).addClass('active').siblings('li').removeClass('active');
    $('#modal4').openModal();
  });

  $('.w_yes').click(function(){
    $('.business-signup').find('input, textarea, button, select').removeAttr('disabled');
  });
  $('.w_no').click(function(){
    $('.business-signup').find('input, textarea, button, select').attr('disabled',true);
  });
  $('.fb-share').click(function(e) {
        e.preventDefault();
        window.open(this.href, 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=1');
        return false;
  });
  $('#reg').click(function(){
      $('#login-section').hide();
      $('#signup-section').show();
  });
  $('.log').click(function(){
    $('#signup-section').hide();
    $('#login-section').show();
  })
});
  var email='';var password='';var country_code=false;



  $(document).ready(function(){
    $('#login').parsley({errorTemplate: "<span class='my-parsley-error' style='color:red; bottom:0; font-size:12px;'></span>",errorsWrapper: "<div></div>",});
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
    $('#forget_pass').parsley({errorTemplate: "<span class='my-parsley-error1'></span>",errorsWrapper: "<div></div>",});
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
        
        var result=$.parseJSON(data);
        if(result.success==1){
          $('.next-forgot').text(text).prop('disabled',false);
          $('#forgot').hide();
          $('#resetpassword').show();
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
     $('#reset_pass').parsley({errorTemplate: "<span class='my-parsley-error1' ></span>",errorsWrapper: "<div></div>",});
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
    $('#artist_signup').parsley({errorTemplate: "<span class='my-parsley-error' style='color:red; bottom:0; font-size:12px;'></span>",errorsWrapper: "<div></div>",});
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
          country_code=false;
          message('You have sucessfully registered as an ARTIST.');
          $('#artist_signup_btn').prop('disabled',false).text(text);
           email=$('.artist-signup [name="email"]').val();
           password=$('.artist-signup [name="password"]').val();
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


    $('#business_signup').parsley({errorTemplate: "<span class='my-parsley-error' style='color:red; bottom:0; font-size:12px;'></span>",errorsWrapper: "<div></div>",});
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
          message('You have sucessfully registered as a BUSINESS.');
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

window.fbAsyncInit = function() {
   FB.init({
     appId      : '1537332409822532', 
     channelURL : '', 
     status     : true, 
     cookie     : true, 
     oauth      : true, 
     xfbml      : false 
   });
};
var fb_btn;
var gp_btn;
function fb_login(type,this1){
   fb_btn=$(this1);
  fb_btn.prop('disabled',true).text('processing...');
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

(function() {
   var e = document.createElement('script'); e.async = true;
   e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';                
   document.getElementById('fb-root').appendChild(e);
}());
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
                      fb_btn.prop('disabled',false).text('Facebook');
                      return false;
                    }else if(result.message=='Un-authorized Access'){
                      message(result.message);
                      fb_btn.prop('disabled',false).text('Facebook');
                      return false;
                    } else{
                    message('Email already registered. Please login.');
                    fb_btn.prop('disabled',false).text('Facebook');
                    return false;
                  }
                }
                else{
                  if(result.data.reg==1){
                      if(result.data.type==1){
                        message("You have sucessfully registered as an ARTIST.");
                      }else if(result.data.type==2){
                        message("You have sucessfully registered as a BUSINESS.");
                      } else{
                        message("You have sucessfully registered as a FAN.");
                      }
                    
                    fb_btn.prop('disabled',false).text('Facebook');
                  }
                }

                $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                $.cookie('user_type',result.data.type,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                window.location.replace('/login');     
            })
        });
}




var type_u='0';
  (function() {
   var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
   po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
 })();

 function gp_login(type,this1){
  gp_btn=$(this1);
  gp_btn.prop('disabled',true).text('processing...');

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
           
           $.ajax({
                url: '<?=API_URL?>/account/social-login?'+query_token,
                data: formData,
                type: 'POST'
              }).done(function(data){
                result=$.parseJSON(data);
                if (result.success!='1') {
                    if(result.message=='Un-authorized Access'){
                      message('Un-authorized Access');
                    }else{
                      message('Email already registered. Please login.');
                    }
                    gp_btn.prop('disabled',false).text('Google +');
                    return false;
                }else{
                  if(result.data.reg==1){
                    if(result.data.type==1){
                        message("You have sucessfully registered as an ARTIST.");
                      }else if(result.data.type==2){
                        message("You have sucessfully registered as a BUSINESS.");
                      } else{
                        message("You have sucessfully registered as a FAN.");
                      }
                    gp_btn.prop('disabled',false).text('Google +');
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
var $searchText = $('[name=search]');
  $('#search').click(function(){
    if($searchText.val()!==''){
      $('#searchDropDown').show();
    }
  });
  $('.artist-search-btn').on('click',function(){
    window.location.href='<?=WEB_URL?>/artist?search='+$searchText.val();
  });
  $('.event-search-btn').on('click',function(){
    var type='<?=Input::get("type")?>';
    if (type=='past') {
      window.location.href='<?=WEB_URL?>/event?search='+$searchText.val()+'&type=past';
      return false;
    }
    window.location.href='<?=WEB_URL?>/event?search='+$searchText.val();
  });
  $('.blog-search-btn').on('click',function(){
    window.location.href='<?=BLOG_URL?>?search='+$searchText.val();
  });
  $('.video-search-btn').on('click',function(){
    window.location.href='<?=WEB_URL?>/videos?search='+$searchText.val();
  });
    var $first = $('.artist-search-btn'); 
    var $second = $('.event-search-btn');
    var $third = $('.blog-search-btn');
    var $fourth = $('.video-search-btn');
    $searchText.bind('keyup change', function(e) {
    $('#searchDropDown').show();
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


<?php 
$curl=new curl;
@$json=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
$user=$json->data;
if($user->is_approved>0 || $user->user_type==3 || !$_COOKIE['access_token']){?>
  $(document).ready(function(){
    
  $('.srtist-following').click(function(){
    $this=$(this);
    var artist_id=$(this).attr('data-id');
    if (!access_token) {
      $('.jq-login').trigger('click');
      $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      return false;
    };
    var fan_count=$(this).find('span').text();
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
              $this.removeClass('ajax-waiting');
            result=$.parseJSON(data);
            if(result.success=='1'){
                $this.removeClass('active').find('span').text(parseInt(fan_count)-1);
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
                  $this.removeClass('ajax-waiting');
                result=$.parseJSON(data);
                if(result.success=='1'){
                    $this.addClass('active').find('span').text(parseInt(fan_count)+1);;
                   return false;
                }
                else{
                    message("error");
                }
                return false;
            });
    }
  });
  });
<?php }else{?>
  $(document).ready(function(){
    
  $('.srtist-following').click(function(){
    message("To enhance user experience we are approving profiles.Either your profile is not complete or it is awaiting approval.Please wait for a bit.");
    
  });
  });
<?php }?>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('body').addClass('select2-indexadjust');
    $('body select').select2({minimumResultsForSearch:10000});
    $('#a1').on('keyup', function(){
      $this=$(this);
      var div_1=$(this).parent('.inputrow');
      if($.isNumeric($(this).val())){
        $('.loginselect.toggle').show();
        div_1.addClass('right');
        country_code=true;
      }else{
        $('.loginselect.toggle').hide();
        div_1.removeClass('right');
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
      $('.jq-login').trigger('click');
    });
  <?php } ?>
</script>