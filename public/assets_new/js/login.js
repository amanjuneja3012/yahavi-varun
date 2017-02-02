/* 
 * Sign UP Sign In Layer JS
 */

var login = {
	apiUrl: 'http://api.beta.yahavi.com',
	getRequestToken: function(){
		var request_token = $.cookie("request_token");
		
		if (typeof request_token == "undefined" || request_token == null){
			//todo remove after dev
			return "89d9d0a13dc3d561463fb8ef11c3cdf2ba1ac85a05304dc7b420299b4beb295b";
			return null;
		}
		return request_token;
	},
	appendLoginlayer: function(){
		var innerHtml = "";
		innerHtml += 
			'<div class="signup-container">' +
				'<div class="login">' +
					'<div class="login-header"><span id="signin-tab">Sign In </span>/<span id="signup-tab"> Sign Up</span></div>' +
					'<div class="social-button-container">' +
						'<div class="social-Button fb">Continue with Facebook</div>' +
						'<div class="social-Button google">Continue with Google</div>' +
					'</div>' +
					'<div class="signin-form">' +
						'<div class="break">' +
							'<span class="dash text">Or</span>' +
						'</div>' +
						'<form class="form">' +
							'<input type="text" name="email" class="input" placeholder="EMAIL ID OR MOBILE NUMBER">' +
							'<input type="password" name="password" class="input" placeholder="PASSWORD">' +
						'</form>' +
						'<div class="forgot-password">Forgot password?</div>' +
						'<div id="signin-button" class="social-Button signUp">Sign In</div>' +
					'</div>' +
					'<div class="signup-form hide">' +
						'<div class="break">' +
							'<span class="dash text">Or</span>' +
						'</div>' +
						'<form class="form">' +
							'<input type="text" name="name" class="input" placeholder="NAME">' +
							'<input type="hidden" name="country_id" class="input" value="103">' +
							'<input type="text" name="mobile" class="input" placeholder="MOBILE NUMBER">' +
							'<input type="text" name="email" class="input" placeholder="EMAIL ID">' +
							'<input type="password" name="password" class="input" placeholder="PASSWORDS">' +
							'<input type="radio" name="type" class="input" value="1" checked>Artist' +
							'<input type="radio" name="type" class="input" value="2">Business' +
						'</form>' +
						'<div id="signup-button" class="social-Button signUp">Sign Up</div>' +
					'</div>' +
				'</div>' +
			'</div>';
		$("#login-layer-target").html(innerHtml);
	},
	showLoginlayer: function(){
		$(".signup-container").show();
	},
	hideLoginlayer: function(){
		$(".signup-container").hide();
	},
	doSignUp: function(evt,form){
		evt.preventDefault();
		var formData, query_token, 
			//todo temporaray
			domain_name=window.location.hostname.replace("www.","");
		
		formData = $(form).serializeArray();
		query_token = "request_token="+this.getRequestToken();
		console.log('signup request');
		console.log(this.apiUrl+'/account/login?'+query_token);
		console.log(formData);
		$.ajax({
			url:this.apiUrl+'/account/register?'+query_token,
			data:formData,
			type:'POST',
			}).done(function(data){
				var result=$.parseJSON(data);
				if(result.success==1){
					console.log(result);
					$.cookie('access_token',result.data.access_token,{ domain: domain_name ,path:'/'});
					$.cookie('user_type',result.data.type,{ domain: domain_name ,path:'/'});
					alert("Register Successful");
				}
				else{
					console.log(result);
					alert(result.message);
					return false;
				}
		  });
	},
	doSignIn: function(evt,form){
		evt.preventDefault();
		var formData, query_token,
			//todo temporaray
			domain_name=window.location.hostname.replace("www.","");
		//Check form parsing
		
		formData = $(form).serializeArray();
		
		/* wtf is this?
		  if(country_code){
			var val=$('.country').val()+$('#a1').val();
			formData[1].value=val;
		  }
		*/
		query_token = "request_token="+this.getRequestToken();
		console.log('login request');
		console.log(this.apiUrl+'/account/login?'+query_token);
		console.log(formData);
		$.ajax({
			url:this.apiUrl+'/account/login?'+query_token,
			data:formData,
			type:'POST',
			}).done(function(data){
				var result=$.parseJSON(data);
				if(result.success==1){
					console.log(result);
					$.cookie('access_token',result.data.access_token,{ domain: domain_name ,path:'/'});
					$.cookie('user_type',result.data.type,{ domain: domain_name ,path:'/'});
					alert("Login Successful");
				}
				else{
					console.log(result);
					alert(result.message);
					return false;
				}
		  });
	},
	
	bindEvents: function(){
		var self = this;
		$(".signup-container span#signup-tab").click(function(event){
			$(".signup-container .signin-form").hide();
			$(".signup-container .signup-form").show();
		});
		$(".signup-container span#signin-tab").click(function(event){
			$(".signup-container .signup-form").hide();
			$(".signup-container .signin-form").show();
		});
		$(".signin-form form").submit(function(evt){
			self.doSignIn(evt,this);
		});
		$(".signup-form form").submit(function(evt){
			self.doSignUp(evt,this);
		});
		$('#signin-button').click(function(evt){
			$(this).closest(".signin-form").find("form").submit();
		});
		$('#signup-button').click(function(evt){
			$(this).closest(".signup-form").find("form").submit();
		});
	}
}

$(document).ready(function () {
	$("#login-button").click(function(event){
		login.appendLoginlayer();
		login.bindEvents();
	});
	
});
