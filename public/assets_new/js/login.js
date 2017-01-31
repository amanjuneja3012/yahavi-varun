/* 
 * Sign UP Sign In Layer JS
 */

var login = {
	appendLoginlayer: function(){
		var innerHtml = "";
		innerHtml += 
			'<div class="signup-container">' +
				'<div class="login">' +
					'<div class="login-header"><span id="signin">Sign In </span>/<span id="signup"> Sign Up</span></div>' +
					'<div class="social-button-container">' +
						'<div class="social-Button fb">Continue with Facebook</div>' +
						'<div class="social-Button google">Continue with Google</div>' +
					'</div>' +
					'<div class="signin-form">' +
						'<div class="break">' +
							'<span class="dash text">Or</span>' +
						'</div>' +
						'<div class="form">' +
							'<input type="" name="" class="input" placeholder="EMAIL ID OR MOBILE NUMBER">' +
							'<input type="" name="" class="input" placeholder="PASSWORDS">' +
						'</div>' +
						'<div class="forgot-password">Forgot password?</div>' +
						'<div class="social-Button signUp">Sign In</div>' +
					'</div>' +
					'<div class="signup-form hide">' +
						'<div class="break">' +
							'<span class="dash text">Or</span>' +
						'</div>' +
						'<div class="form">' +
							'<input type="" name="" class="input" placeholder="NAME">' +
							'<input type="" name="" class="input" placeholder="MOBILE NUMBER">' +
							'<input type="" name="" class="input" placeholder="EMAIL ID">' +
							'<input type="" name="" class="input" placeholder="PASSWORDS">' +
						'</div>' +
						'<div class="social-Button signUp">Sign Up</div>' +
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
	bindEvents: function(){
		$(".signup-container span#signup").click(function(event){
			$(".signup-container .signin-form").hide();
			$(".signup-container .signup-form").show();
		});
		$(".signup-container span#signin").click(function(event){
			$(".signup-container .signup-form").hide();
			$(".signup-container .signin-form").show();
		});		
	}
}

$(document).ready(function () {
	$("#login-button").click(function(event){
		login.appendLoginlayer();
		login.bindEvents();
	});
	
});