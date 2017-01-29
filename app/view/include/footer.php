<footer class="h_footer hone_footer">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-lg-12 hidden-xs">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<ul class="footer_terms clearfix">
                        <li><a href="/terms">Terms &amp; Conditions</a></li>
                        <li><a href="/privacy">Privacy Policy</a></li>
                        <li><a href="/contactus">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<div class="social_row">
                    	  <a href="https://www.youtube.com/yahavidotcom" class="footer_gp"><i class="fa fa-youtube-play"></i></a> 
                        <a href="https://www.facebook.com/yahavidotcom" class="footer_fb"><i class="fa fa-facebook"></i></a> 
                        <a href="https://www.pinterest.com/yahavidotcom" class="footer_pri"><i class="fa fa-pinterest-p"></i></a> 
                        <a href="https://instagram.com/yahavidotcom" class="footer_inst"><i class="fa fa-instagram"></i></a>
                        <a href="https://www.twitter.com/yahavidotcom" class="footer_twi"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 hidden-lg hidden-md hidden-sm">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="social_row">
                          <a href="https://www.youtube.com/yahavidotcom" class="footer_gp"><i class="fa fa-youtube-play"></i></a> 
                        <a href="https://www.facebook.com/yahavidotcom" class="footer_fb"><i class="fa fa-facebook"></i></a> 
                        <a href="https://www.pinterest.com/yahavidotcom" class="footer_pri"><i class="fa fa-pinterest-p"></i></a> 
                        <a href="https://instagram.com/yahavidotcom" class="footer_inst"><i class="fa fa-instagram"></i></a>
                        <a href="https://www.twitter.com/yahavidotcom" class="footer_twi"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul class="footer_terms clearfix">
                        <li><a href="/terms">Terms &amp; Conditions</a></li>
                        <li><a href="/privacy">Privacy Policy</a></li>
                        <li><a href="/contactus">Contact Us</a></li>
                    </ul>
                </div>
            
            </div>
        </div>
    </div>
</footer><!--footer section end-->

<!--POPUP SECTION-->
<div class="overlay_login"></div>
<div class="login_popup">
    <ul class="popuptab clearfix">
    	<li class="active"><a href="#">Artist</a></li>
        <li><a href="#">Audience</a></li>
        <li><a href="#">Business</a></li>
    </ul>
    <div class="clearfix"><span class="pop_close pull-right"></span></div>
    
	<div class="popup_row" style="display:block;">

        <div class="popup_row_in login-section" style="display:block;">
            <h4>Why Sign Up</h4>
            <div class="sinuptext">
                <p>Be showcased to an assorted audience</p>
                <p>Come closer to the seekers community</p>
                <p>Grow your network to success</p>
            </div>
            
             <div class="popuplogo"><img src="/assets/images/popuplogo.png" alt="image" class="img-responsive"></div>
             
            <div class="btnbox">
                <a href="#" class="lg-fb btn-block" onclick="fb_login('1')"><i class="fa fa-facebook"></i><span>Sign in with Facebook</span></a>
                <a href="#" class="lg-gp btn-block"onclick="gp_login('1')"><i class="fa fa-google-plus"></i><span>Sign in with Google</span></a>
            </div>
 
            <div class="sign_btnrow">
                <span>or use your e-mail instead</span>
                <button type="button" class="active btn-login2">Login</button>
                <button type="button" class="btn-sign3">Sign up</button>
            </div><!--sign_btnrow end-->
        </div><!--popup_row_in end-->
         
        <div class="popup_row_in" id="sinup_box">
         	<h4>Why Sign Up</h4>
            <div class="sinuptext">
                <p>Helps you reach artists faster Curate your own events faster Access all the pertinent analytics</p>
            </div>
            <form action="#" method="post" id="artist_signup">
                <ul class="input_formbox">
                    <li><input type="text" name="name" placeholder="Name"></li>
                    <li><input type="email" name="email" placeholder="Email"></li>
                    <li><input type="password" name="password" placeholder="Password"></li>
                    <li><input type="password" placeholder="Confirm Password" name="confirmpassword"></li>
                </ul>
            
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active" id="artist_signup_submit" >Submit</button>
                    <button type="button" class="btn-back" id="artist_back">Back</button>
                </div><!--sign_btnrow end-->
            </form>
            <div class="privcy_box">
                <p>by clicking submit you agree to our<br/> <a href="#">User Terms</a> &amp; <a href="#">Privacy Policy</a></p>
            </div>
        </div><!--popup_row_in end-->
         
        <div class="popup_row_in" id="login_box">
         	<h4>Why Login</h4>
            <div class="sinuptext">
                <p>Helps you reach artists faster Curate your own events faster Access all the pertinent analytics</p>
            </div>

            <form action="#" method="post" id="artist_login">
                <ul class="input_formbox">
                    <li><input type="text" name="email" placeholder="Email"></li>
                    <li><input type="password" name="password" placeholder="Password"></li>
                </ul>
            
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active" id="artist_login_submit">Submit</button>
                    <button type="button" class="btn-back-login">Back</button>
                    <a href="#" class="btn_forgot">Forgot Password?</a>
                </div>
            </form>
        </div><!--popup_row_in end--> 

        <div class="popup_row_in forget_password" style="display:none">
          <h4>Forget Your Password?</h4>
            <div class="sinuptext">
                <p>Reset Your Password Here.</p>
            </div>

            <form action="#" method="post" class="forget">
                <ul class="input_formbox">
                    <li><input type="text" name="email" placeholder="Email"></li>
                </ul>
                
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active">Submit</button>
                    <button type="button" class="btn-back-login">Back</button>
                    <a style="font-size:10px" href="#" class="have_code">Have Code?</a>
                </div>
            </form>
            <form action="#" method="post" class="reset" style="display:none">
                <ul class="input_formbox">
                    <li><input type="text" name="email" placeholder="Email"></li>
                    <li><input type="text" name="pass_code" placeholder="Code"></li>
                    <li><input type="text" name="password" placeholder="New Password"></li>
                    <li><input type="text" name="confirmpassword" placeholder="Confirm Password"></li>
                </ul>
                
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active">Submit</button>
                    <button type="button" class="btn-back-login">Back</button>
                </div>
            </form>
        </div>
    </div>
    <!--popup_row end-->
    
     
   
    <div class="popup_row">
        <div class="popup_row_in" style="display:block;">
            <h4>Why Sign Up</h4>
           	 <div class="sinuptext">
                <p>Perceive new experiences</p>
                <p>Choose from an endless interface</p>
                <p>Stay updated</p>
            </div>
            
            <div class="popuplogo"><img src="/assets/images/popuplogo.png" alt="image" class="img-responsive"></div>
            
            <div class="btnbox">
                <a href="#" class="lg-fb btn-block" onclick="fb_login('3')"><i class="fa fa-facebook"></i><span>Sign in with Facebook</span></a>
                <a href="#" class="lg-gp btn-block"onclick="gp_login('3')"><i class="fa fa-google-plus"></i><span>Sign in with Google</span></a>
            </div>
            
            
         </div><!--popup_row_in end-->
         
         <div class="popup_row_in" id="sinup_box">
         	<h4>Why Sign Up</h4>
            <div class="sinuptext">
                <p>Helps you reach artists faster Curate your own events faster Access all the pertinent analytics</p>
            </div>
            <form action="#" method="post">
                <ul class="input_formbox">
                    <li><input type="text" name="text" placeholder="Name"></li>
                    <li><input type="text" name="text" placeholder="Email"></li>
                    <li><input type="password" name="password" placeholder="Password"></li>
                    <li><input type="password" name="password" placeholder="Confirm Password"></li>
                </ul>
            
                <div class="sign_btnrow margin-b40">
                    <button type="button" class="active">Submit</button>
                    <button type="button" class="btn-back">Back</button>
                </div><!--sign_btnrow end-->
            </form>
            <div class="privcy_box">
                <p>by clicking submit you agree to our<br/> <a href="#">User Terms</a> &amp; <a href="#">Privacy Policy</a></p>
            </div>
         </div><!--popup_row_in end-->
         
         <div class="popup_row_in" id="login_box">
         	<h4>Why Login</h4>
            <div class="sinuptext">
                <p>Helps you reach artists faster Curate your own events faster Access all the pertinent analytics</p>
            </div>

            <form action="#" method="post">
                <ul class="input_formbox">
                    <li><input type="text" name="name" placeholder="Email"></li>
                    <li><input type="password" name="password" placeholder="Password"></li>
                </ul>
            
                <div class="sign_btnrow margin-b40">
                    <button type="button" class="active">Submit</button>
                    <a href="#" class="btn_forgot">Forgot Password?</a>
                </div>
            </form>
         </div><!--popup_row_in end--> 

         <div class="popup_row_in forget_password" style="display:none">
          <h4>Forget Your Password?</h4>
            <div class="sinuptext">
                <p>Reset Your Password Here.</p>
            </div>

            <form action="#" method="post" class="forget">
                <ul class="input_formbox">
                    <li><input type="text" name="email" placeholder="Email"></li>
                </ul>
                
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active">Submit</button>
                    <button type="button" class="btn-back-login">Back</button>
                    <a style="font-size:10px" href="#" class="have_code">Have Code?</a>
                </div>
            </form>
            <form action="#" method="post" class="reset" style="display:none">
                <ul class="input_formbox">
                    <li><input type="text" name="email" placeholder="Email"></li>
                    <li><input type="text" name="pass_code" placeholder="Code"></li>
                    <li><input type="text" name="password" placeholder="New Password"></li>
                    <li><input type="text" name="confirmpassword" placeholder="Confirm Password"></li>
                </ul>
                
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active">Submit</button>
                    <button type="button" class="btn-back-login">Back</button>
                </div>
            </form>
        </div>
    </div>
    <!--popup_row end-->
    
    
    <div class="popup_row">
        <div class="popup_row_in login-section" style="display:block;">
            <h4>Why Sign Up</h4>
             <div class="sinuptext">
                <p>Filter out your search for performers</p>
                <p>Curate an exceptional show</p>
                <p>Broaden your audience</p>
            </div>
            
            <div class="popuplogo"><img src="/assets/images/popuplogo.png" alt="image" class="img-responsive"></div>
            
            <div class="btnbox">
                <a href="#" class="lg-fb btn-block" onclick="fb_login('2')"><i class="fa fa-facebook"></i><span>Sign in with Facebook</span></a>
                <a href="#" class="lg-gp btn-block"onclick="gp_login('2')"><i class="fa fa-google-plus"></i><span>Sign in with Google</span></a>
            </div>
            
            <div class="sign_btnrow">
                <span>or use your e-mail instead</span>
                <button type="button" class="active btn-login2">Login</button>
                <button type="button" class="btn-sign3">Sign up</button>
            </div><!--sign_btnrow end-->
         </div><!--popup_row_in end-->
         
         <div class="popup_row_in" id="sinup_box">
         	<h4>Why Sign Up</h4>
            <div class="sinuptext">
                <p>Helps you reach artists faster Curate your own events faster Access all the pertinent analytics</p>
            </div>
            <form action="#" method="post" id="business_signup">
                <ul class="input_formbox">
                    <li><input type="text" name="name" placeholder="Name"></li>
                    <li><input type="email" name="email" placeholder="Email"></li>
                    <li><input type="password" name="password" placeholder="Password"></li>
                    <li><input type="password" placeholder="Confirm Password" name="confirmpassword"></li>
                </ul>
            
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active" id="business_signup_submit">Submit</button>
                    <button type="button" id="business_back" class="btn-back">Back</button>
                </div><!--sign_btnrow end-->
            </form>
            <div class="privcy_box">
                <p>by clicking submit you agree to our<br/> <a href="#">User Terms</a> &amp; <a href="#">Privacy Policy</a></p>
            </div>
         </div><!--popup_row_in end-->
         
         <div class="popup_row_in" id="login_box">
         	<h4>Why Login</h4>
            <div class="sinuptext">
                <p>Helps you reach artists faster Curate your own events faster Access all the pertinent analytics</p>
            </div>

            <form action="#" method="post" id="business_login">
                <ul class="input_formbox">
                    <li><input type="text" name="email" placeholder="Email"></li>
                    <li><input type="password" name="password" placeholder="Password"></li>
                </ul>
            
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active" id="business_login_submit">Submit</button>
                    <button type="button" class="btn-back-login">Back</button>
                    <a href="#" class="btn_forgot">Forgot Password?</a>
                </div>
            </form>
         </div><!--popup_row_in end--> 
         <div class="popup_row_in forget_password" style="display:none">
          <h4>Forget Your Password?</h4>
            <div class="sinuptext">
                <p>Reset Your Password Here.</p>
            </div>

            <form action="#" method="post" class="forget">
                <ul class="input_formbox">
                    <li><input type="text" name="email" placeholder="Email"></li>
                </ul>
                
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active">Submit</button>
                    <button type="button" class="btn-back-login">Back</button>
                    <a style="font-size:10px" href="#" class="have_code">Have Code?</a>
                </div>
            </form>
            <form action="#" method="post" class="reset" style="display:none">
                <ul class="input_formbox">
                    <li><input type="text" name="email" placeholder="Email"></li>
                    <li><input type="text" name="pass_code" placeholder="Code"></li>
                    <li><input type="text" name="password" placeholder="New Password"></li>
                    <li><input type="text" name="confirmpassword" placeholder="Confirm Password"></li>
                </ul>
                
                <div class="sign_btnrow margin-b40">
                    <button type="submit" class="active">Submit</button>
                    <button type="button" class="btn-back-login">Back</button>
                </div>
            </form>
        </div>
    </div>
    <!--popup_row end-->

</div>
<!--login_popup end-->



<script type="text/javascript" src="/assets/js/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/assets/js/owl.carousel.js"></script>

<script type="text/javascript" src="/assets/js/custome.js"></script>

<script type="text/javascript" src="/assets/js/jquery.mousewheel.min.js"></script> 

<script type="text/javascript" src="/assets/js/jquery.carousel-1.1.js"></script>

<script type="text/javascript" src="/assets/js/cookie.js"></script>

<script type="text/javascript" src="/assets/js/jquery.flexslider.js"></script>

<script type="text/javascript" src="/assets/js/jquery-ui.js"></script>



<script type="text/javascript" src="/assets/js/jquery.nicescroll.js"></script>



<script type="text/javascript" src="/assets/js/star-rating.js"></script>

<script src="https://maps.google.com/maps/api/js"></script>

<script type="text/javascript" src="/assets/js/lightbox.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js"></script>

<script type="text/javascript">
var query_token='<?=Helper::queryToken()?>';
  $(".btn_forgot").click(function(){
    $(this).parents('div.popup_row').find('div.popup_row_in').hide();
    $(this).parents('div.popup_row').find('div.forget_password').show();
    $("form.forget").show();
    $("form.reset").hide();
    return false;
  });
  $(".have_code").click(function(){
    $("form.forget").hide();
    $("form.reset").show();
    return false;
  });
  $("form.forget").submit(function(e){
    e.preventDefault();
    var formData=$(this).serialize();
       $.ajax({
        url: '<?=API_URL?>/account/forgetPassword?'+query_token,
        data: formData,
        type: 'POST'
      }).done(function(data){
        result=$.parseJSON(data);
        if (result.success==1) {
          alert('We sent you code');
          $("form.forget,form.reset").toggle("display");
        } else {
          alert('Email not registered');
        };
      });
  });
  $("form.reset").submit(function(e){
    var $this=$(this);
    e.preventDefault();
    var formData=$(this).serialize();
       $.ajax({
        url: '<?=API_URL?>/account/resetPassword?'+query_token,
        data: formData,
        type: 'POST'
      }).done(function(data){
        result=$.parseJSON(data);
        if (result.success==1) {
          alert('Password Successfully reset');
          $this.find('.btn-back-login').trigger('click');
          $("form.forget,form.reset").toggle("display");
        } else {
          alert('Invalid Code');
        };
      });
  });
</script>

<script type="text/javascript">
    $("#artist_signup").submit(function (e) {
       e.preventDefault();
       if ($(this).find("input[name='password']").val()!=$(this).find("input[name='confirmpassword']").val()) {
            alert("Password and Confirm password mismatch");
            return false;
       };
       var formData=$(this).serialize()+'&type=1';
       $("#artist_signup_submit").attr("disabled", true);
		$("#artist_signup_submit").css({'opacity':0.32});
		$("#artist_signup_submit").html("Processing...");
		$("#artist_signup_submit").addClass('not-allowed');
       $.ajax({
        url: '<?=API_URL?>/account/register?'+query_token,
        data: formData,
        type: 'POST'
      }).done(function(data){
        result=$.parseJSON(data);
        $("#artist_signup_submit").attr("disabled", false);
		$("#artist_signup_submit").css({'opacity':1});
		$("#artist_signup_submit").html("Submit");
		$("#artist_signup_submit").removeClass('not-allowed');
        if (result.success==1) {
          alert('Registration Successfull');
          $('#artist_back').trigger('click');
          $.ajax({
        url: '<?=API_URL?>/account/login?'+query_token,
        data: formData,
        type: 'POST'
      }).done(function(data){
        result=$.parseJSON(data);
        $("#artist_login_submit").attr("disabled", false);
        $("#artist_login_submit").css({'opacity':1});
        $("#artist_login_submit").html("Submit");
        $("#artist_login_submit").removeClass('not-allowed');
        if (result.success==1) {
          $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('user_type',1,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          window.location.replace('<?=ARTIST_URL?>');
        } else {
          alert('Invalid login/password');
        };

      })
        } else {
          if (result.error=='100') {
            alert('email already register,please login');
            $('#artist_back').trigger('click');
          }else{
            alert('some error')
          };
        };
        console.log(result);
      });
    });
    
    $("#artist_login").submit(function (e) {
        e.preventDefault();
        var formData=$(this).serialize()+'&type=1';
        $("#artist_login_submit").attr("disabled", true);
		$("#artist_login_submit").css({'opacity':0.32});
		$("#artist_login_submit").html("Processing...");
		$("#artist_login_submit").addClass('not-allowed');
        $.ajax({
        url: '<?=API_URL?>/account/login?'+query_token,
        data: formData,
        type: 'POST'
      }).done(function(data){
        result=$.parseJSON(data);
        $("#artist_login_submit").attr("disabled", false);
		$("#artist_login_submit").css({'opacity':1});
		$("#artist_login_submit").html("Submit");
		$("#artist_login_submit").removeClass('not-allowed');
        if (result.success==1) {
          $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('user_type',1,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          window.location.replace('<?=ARTIST_URL?>');
        } else {
          alert('Invalid login/password');
        };

      })
    })    
</script>

<script type="text/javascript">
    $("#business_signup").submit(function (e) {
       e.preventDefault();
       if ($(this).find("input[name='password']").val()!=$(this).find("input[name='confirmpassword']").val()) {
            alert("Password and Confirm password mismatch");
            return false;
       };     
       var formData=$(this).serialize()+'&type=2';
       $("#business_signup_submit").attr("disabled", true);
		$("#business_signup_submit").css({'opacity':0.32});
		$("#business_signup_submit").html("Processing...");
		$("#business_signup_submit").addClass('not-allowed');
       $.ajax({
        url: '<?=API_URL?>/account/register?'+query_token,
        data: formData,
        type: 'POST'
      }).done(function(data){
        result=$.parseJSON(data);
        $("#business_signup_submit").attr("disabled", false);
		$("#business_signup_submit").css({'opacity':1});
		$("#business_signup_submit").html("Submit");
		$("#business_signup_submit").removeClass('not-allowed');
        if (result.success==1) {
          alert('Registration Successfull');
          $('#business_back').trigger('click');
        } else {
          if (result.error=='100') {
            alert('email already register,please login');
            $('#business_back').trigger('click');
          }else{
            alert('some error')
          };
        };
        console.log(result);
      });
    });
    
    $("#business_login").submit(function (e) {
        e.preventDefault();
        var formData=$(this).serialize()+'&type=2';
        $("#business_login_submit").attr("disabled", true);
		$("#business_login_submit").css({'opacity':0.32});
		$("#business_login_submit").html("Processing...");
		$("#business_login_submit").addClass('not-allowed');
        $.ajax({
        url: '<?=API_URL?>/account/login?'+query_token,
        data: formData,
        type: 'POST'
      }).done(function(data){
        result=$.parseJSON(data);
        $("#business_login_submit").attr("disabled", false);
		$("#business_login_submit").css({'opacity':1});
		$("#business_login_submit").html("Submit");
		$("#business_login_submit").removeClass('not-allowed');
        if (result.success==1) {
          $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('user_type',2,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          window.location.replace('<?=BUSINESS_URL?>');
        } else {
          alert('Invalid login/password');
        };

      })
    })    
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
// logs the user in the application and facebook
function fb_login(type){
FB.getLoginStatus(function(r){
     if(r.status === 'connected'){
            afterFbLogin(type);
     }else{
        FB.login(function(response) {
            if(response.authResponse) {
              afterFbLogin(type);
            } else {
              alert('not logged in');
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
                formData.access_token=FB.getAuthResponse().accessToken;
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
                    alert('This email Belong to some other account');
                    return false;
                };
                if (type==1) {
                  $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  $.cookie('user_type',1,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  window.location.replace('<?=ARTIST_URL?>');
                }else if (type==2) {
                  $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  $.cookie('user_type',2,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  window.location.replace('<?=BUSINESS_URL?>');
                }else if (type==3) {
                  $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  $.cookie('user_type',3,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  window.location.replace('<?=FAN_URL?>/login');
                };       
            })
        });
}
</script>
<script type="text/javascript">
    // Responsive menu
    $('.open_mobilemenu').click(function(){
        if(parseInt($('.mobile_aside').css('right'))<0){
            $('.mobile_aside').animate({right:0});
            $('.overlay_login').fadeIn();
        }else{
            $('.mobile_aside').animate({right:-180});
            $('.open_mobilemenu').fadeIn();
            }   
    }); 
    
    $('.close_mobilemenu, .overlay_login, .pop_close').click(function(){
        $('.mobile_aside').animate({right:-180});
        $('.overlay_login').fadeOut();
    });

    $('.responsive_menu').on('click', '.show_submenu', function(){
        $('.submenu_main').slideToggle();
        $('.responsive_menu li > i').toggleClass('fa-angle-down');
        
    });

    $('.mobile_setting').click(function(){
        $('.mobile_terms').slideToggle();
    });

</script>

<script type="text/javascript">
var type_u='0';
  (function() {
   var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
   po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
 })();

 function gp_login(type){
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
           formData.access_token=result.access_token;
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
                    alert('This email Belong to some other account');
                    return false;
                };
                if (type_u==1) {
                  $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  $.cookie('user_type',1,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  window.location.replace('<?=ARTIST_URL?>');
                }else if (type_u==2) {
                  $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  $.cookie('user_type',2,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  window.location.replace('<?=BUSINESS_URL?>');
                }else if (type_u==3) {
                  $.cookie('access_token',result.data.access_token,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  $.cookie('user_type',3,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                  window.location.replace('<?=FAN_URL?>/login');
                };       
            })               
        });
    }
}

function onLoadCallback()
{
    gapi.client.setApiKey('AIzaSyDSuxOegWET2FnPD0_l4G8_iEovwJp3_Zs');
    gapi.client.load('plus', 'v1',function(){});
}
</script>