<?php 
/**
* 
*/
class Account
{

	public function login(){
		$token=$_COOKIE['access_token'];
		$type=$_COOKIE['user_type'];
		if (!$token || !in_array($type, [1,2,3])) {
			$this->logout();
		}
		$token=$_COOKIE['access_token'];
        $_SESSION['access_token']=$token;
        setcookie('access_token',$token,time()+3600*24*365,'/','.'.DOMAIN_NAME);
        setcookie('user_type',$type,time()+3600*24*365,'/','.'.DOMAIN_NAME);
        switch ($type) {
        	case '1':
        		$l=ARTIST_URL;
        		if (isset($_COOKIE['artist_next'])) {
        			$l.=$_COOKIE['artist_next'];
        			if($_COOKIE['artist_next']=='/'){
        				$l=WEB_URL;
        			}
        		}
        		break;
        	case '2':
        		$l=BUSINESS_URL;
        		if (isset($_COOKIE['business_next'])) {
        			$l.=$_COOKIE['business_next'];
        			if($_COOKIE['business_next']=='/'){
        				$l=WEB_URL;
        			}
        		}
        		break;
        	case '3':
        		$l=FAN_URL;
        		if (isset($_COOKIE['fan_next'])) {
        			$l=WEB_URL;
        			$l.=$_COOKIE['fan_next'];
        		}
        		break;
        	default:
        		$l=WEB_URL;
        		break;
        }
        setcookie('artist_next',null,time()-10000,'/','.'.DOMAIN_NAME);
        setcookie('business_next',null,time()-10000,'/','.'.DOMAIN_NAME);	
        setcookie('fan_next',null,time()-10000,'/','.'.DOMAIN_NAME);
        setcookie('request_token',null,time()-10000,'/','.'.DOMAIN_NAME);
        header('location:'.$l);
        die;
	}
	public function logout(){
		$curl=new curl;
		$data=$curl->post(API_URL.'/account/logout?'.Helper::queryToken())->text;
		if (json_decode($data)->success==1) {
			session_destroy();
			foreach ($_COOKIE as $key => $value) {
				setcookie($key,null,time()-10000,'/','.'.DOMAIN_NAME);	
			}
		}
		header('location:'.WEB_URL);
	}
	public function verify(){
		$curl=new curl;
		$data=json_decode($curl->get(API_URL.'/account/verify/link?token='.Input::get('token').'&'.Helper::queryToken()));
		$user=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
		if($user->user_type==1){
			header('location:'.ARTIST_URL.'/basic');
		}if($user->user_type==2){
			header('location:'.BUSINESS_URL.'/basic');
		}
		return View::make('home/verify',['data'=>$data]);
	}

	public function bookeartist_verify(){
		return View::make('home/bookeartist_verify');
	}
	public function unsubscribe($token){
		if ($token=trim($token)) {
			(new model)->update("UPDATE mailer set is_unsubscribed=1 WHERE token='$token'");	
		}
		header('Location:/');
	}

	public function unsubscribe_mail(){
		$curl=new curl;
		$data=json_decode($curl->get(API_URL.'/artist/email/unsubscribe?token='.Input::get('token')));
		return View::make('home/unsubscribe',['data'=>$data]);
	}
}
?>