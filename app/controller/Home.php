<?php 
/**
* 
*/
class Home
{
	private $user=false;
	public function __construct(){
		if (isset($_COOKIE['access_token'])) {
			$curl=new curl;
			$user=json_decode($curl->get(API_URL.'/account?access_token='.$_COOKIE['access_token']));
			if ($user->data) {
				$this->user=$user->data;
			}else{
				setcookie('access_token',null,time()-10000,'/','.'.DOMAIN_NAME);
				setcookie('request_token',null,time()-10000,'/','.'.DOMAIN_NAME);
				header('location:'.WEB_URL);
			}
		}else{

		}
	}
	public function index(){
		$time=microtime(true);
		$curl=new curl;
		@$json=$curl->get(API_URL.'/home/data?'.Helper::queryToken());
		$data=json_decode($json)->data;
		$this->user=$data->user;
		$blog=$data->blog;
		$artists=$data->artists;
		$events=$data->events;
		return View::make('home/index',array('time'=>$time,'featured_media'=>$data->featured_media,'blog'=>$blog,'artists'=>$artists,'events'=>$events,'featured_event'=>$data->featured_event,'user'=>$this->user));
	}
	public function terms(){
		return View::make('home/terms',array('user'=>$this->user));
	}
	public function privacy(){
		return View::make('home/privacy',array('user'=>$this->user));
	}
	public function contactus(){
		return View::make('home/contactus',array('user'=>$this->user));
	}
	public function aboutus(){
		return View::make('home/aboutus',array('user'=>$this->user));
	}
	public function aboutusSection($section){
		return View::make('home/aboutus',array('section'=>$section));
	}
	public function artistId($slug){
		$id=Helper::decodeSlug($slug);
		$curl=new curl;
		@$user_type=$this->user->user_type;
		switch ($user_type) {
			case '1':
				header('location:'.ARTIST_URL.'/artist/'.$id);
				die;
			case '2':
				header('location:'.BUSINESS_URL.'/artist/'.$id);
				die;
			default:
				$json=$curl->get(API_URL.'/artist/'.$id.'?'.Helper::queryToken());
				$artist=json_decode($json)->data;
				if(!$artist->id){
					header('HTTP/1.1 404 Not Found');
					return View::make('home/404');
				}
				$vslug=Helper::encodeSLug($artist->name,$artist->id);
				if ($vslug!=$slug) {
					header('HTTP/1.1 301');
					return header('Location:/artist/'.$vslug);	
				}
				$json2=$curl->get(API_URL.'/artist/follower/'.$id.'?'.Helper::queryToken());
				$follower=json_decode($json2->text)->data;
				$json3=$curl->get(API_URL.'/artist/following/'.$id.'?'.Helper::queryToken());
				$following=json_decode($json3->text)->data;

				return View::make('home/artist',array('artist'=>$artist,'follower'=>$follower,'following'=>$following));
		}
	}
	public function artist(){
		@$user_type=$this->user->user_type;
		$query=Input::get();
		if (count($query)) {
			$get='?'.http_build_query($query);
		}else{
			$get='';
		}
		switch ($user_type) {
			case '1':
				header('location:'.ARTIST_URL.'/artist'.$get);
				die;
			case '2':
				header('location:'.BUSINESS_URL.'/artist'.$get);
				die;
			default:
				$curl=new curl;
				@$json=$curl->get(API_URL.'/artist?'.http_build_query($query).'&limit=9&'.Helper::queryToken());
				$artists=json_decode($json->text)->data;
				$count=(int)json_decode($json->text)->message;
				$json=$curl->get(API_URL.'/form?'.http_build_query($query).'&filter=artist&'.Helper::queryToken());
				$details=json_decode($json->text)->data;
				return View::make('home/artist-search',array('static'=>$this->viewData,'artists'=>$artists,'user'=>$this->user,'form'=>$details,'query'=>$query,'count'=>$count));
		}
	}
	public function event(){
		@$user_type=$this->user->user_type;
		$query=Input::get();
		//$query['access_token']=$_COOKIE['access_token'];
		if (count($query)) {
			$get='?'.http_build_query($query);
		}else{
			$get='';
		}
		switch ($user_type) {
			case '1':
				header('location:'.ARTIST_URL.'/event'.$get);
				die;
			case '2':
				header('location:'.BUSINESS_URL.'/event'.$get);
				die;
			default:
				$curl=new curl;
				$filter='event';
				if ($query['type']=='past') {
					$filter='eventp';
				}
				@$json=$curl->get(API_URL.'/admin/event?'.http_build_query($query).'&'.Helper::queryToken());
				$events=json_decode($json->text)->data;
				$count=(int)json_decode($json->text)->message;
				$json=$curl->get(API_URL.'/form?'.http_build_query($query).'&filter='.$filter.'&'.Helper::queryToken());
				$details=json_decode($json->text)->data;
				return View::make('home/event-search',array('static'=>$this->viewData,'events'=>$events,'user'=>$this->user,'form'=>$details,'query'=>$query,'count'=>$count));
		}
	}
	public function eventId($slug){
		$id=Helper::decodeSlug($slug);
		@$user_type=$this->user->user_type;
		switch ($user_type) {
			case '1':
				header('location:'.ARTIST_URL.'/event/'.$id);
				die;
			case '2':
				header('location:'.BUSINESS_URL.'/event/'.$id);
				die;
			default:
				$query=Input::get();
				$curl=new curl;
				@$json=$curl->get(API_URL.'/admin/event/'.$id.'?'.http_build_query($query).'&'.Helper::queryToken());
				@$event=json_decode($json->text)->data;
				if(!$event->id){
					header('HTTP/1.1 404 Not Found');
					return View::make('home/404');
				}
				$vslug=Helper::encodeSLug($event->name,$event->id);
				if ($vslug!=$slug) {
					header('HTTP/1.1 301');
					return header('Location:/event/'.$vslug);	
				} 

				return View::make('home/event',array('event'=>$event));
		}
	}
	public function oppeventId($id){
		@$user_type=$this->user->user_type;
		switch ($user_type) {
			case '1':
				header('location:'.ARTIST_URL.'/opportunities/event/'.$id);
				die;
			case '2':
				header('location:'.BUSINESS_URL.'/events/'.$id);
				die;
			default:
				$curl=new curl;
				@$json=$curl->get(API_URL.'/opp/event/'.$id.'?'.Helper::queryToken());
				@$event=json_decode($json->text)->data;
				if(!$event->id){
					header('HTTP/1.1 404 Not Found');
					return View::make('home/404');
				}
				return View::make('home/oppevent',array('event'=>$event));
		}
	}

	public function streetJammers(){
		return View::make('street-jammers');
	}
	public function magicManas(){
		return View::make('magic-manas');
	}
	public function streetJammersMailTo(){

		parse_str(htmlspecialchars_decode(Input::post("data")['formInput']), $data);
		if(Mail::send(array(
			'to'=>'streetjammers@yahavi.com',
			'from'=>$data['email'],
			'f_name'=>$data['name'],
			'subject'=>'Street Jammers',
			'body'=>$data['message']
		))){
			echo "true";
		}
		echo "true";
	}
	public function createEvent(){
		return View::make('home/create-event');
	}
	
	public function filter(){
		return View::make('home/filter');	
	}
	public function staticUrl(){
		$b=$this->parseUri();
		$uri=strtok($_SERVER['REQUEST_URI'],'?');
		$type=explode('/', $uri);
		$title=$b[1];
		$this->viewData=[
			'title'=>$title.' - Yahavi',
			'uri'=>$uri,
		];
		switch ($type[1]) {
			case 'artist':
				$this->artist();
				break;
			case 'event':
				$this->event();
				break;
			default:
				# code...
				break;
		}
	}
	public function parseUri(){
		$uri=strtok($_SERVER['REQUEST_URI'],'?');
		$arr=Helper::staticUrl()[$uri];
		parse_str($arr[0],$a);
		$_GET=array_merge($_GET,$a);
		return $arr;
	}
	public function artistList(){
		return View::make('home/artist-list');
	}
	public function eventList(){
		return View::make('home/event-list');
	}

	public function bookartist(){
		return View::make('home/bookartist');
	}
	public function featureVideo(){
		$query=Input::get();
		$curl=new curl;
		$json=$curl->get(API_URL.'/form?'.http_build_query($query).'&filter=videof&'.Helper::queryToken());
		$form=json_decode($json->text)->data;
		return View::make('home/feature-video',['form'=>$form,'user'=>$this->user]);
	}
	public function videos(){
		$query=Input::get();
		$curl=new curl;
		$json=$curl->get(API_URL.'/form?'.http_build_query($query).'&all_video=1&filter=videof&'.Helper::queryToken());
		$form=json_decode($json->text)->data;
		return View::make('home/videos',['form'=>$form,'user'=>$this->user]);
	}
}
?>