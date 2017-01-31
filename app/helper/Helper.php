<?php
/**
* 
*/

if( !function_exists('apache_request_headers') ) {
///
function apache_request_headers() {
  $arh = array();
  $rx_http = '/\AHTTP_/';
  foreach($_SERVER as $key => $val) {
    if( preg_match($rx_http, $key) ) {
      $arh_key = preg_replace($rx_http, '', $key);
      $rx_matches = array();
      // do some nasty string manipulations to restore the original letter case
      // this should work in most cases
      $rx_matches = explode('_', $arh_key);
      if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
        foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
        $arh_key = implode('-', $rx_matches);
      }
      $arh[$arh_key] = $val;
    }
  }
  return( $arh );
}
///
}

class Helper
{
	
	public static function pre($arr)
	{
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}
	public static function unique($id){
		$replace=array('a','b','c','d','e','f','g','h','i','j','k');
		$time=time().$id;
		$time[0]=$replace[0];
		$time[1]=$replace[1];
		$time[1]=$replace[1];
		$time[5]=$replace[5];
		echo $time;
	}
	public static function make_set(Array $details, Array $escape=array()){
		$set='';
		foreach ($details as $key => $value) {
			if (!in_array($key, $escape)) {
				$set.=$key.'=:'.$key.',';
			}
		}
		return rtrim($set,',');
	}
	public static function sorting(){
		$sort=Input::get('sort');
		$GET=$_GET;
		unset($GET['sort']);
		$self_url=count($GET)?'/artist?'.http_build_query($GET).'&sort=':'/artist'.'?sort=';
		switch ($sort) {
			case 'trending':
				return '<option value="'.$self_url.'rel">Relevence</option>
		                <option selected  value="'.$self_url.'trending">Trending</option>
		                <option value="'.$self_url.'name_0">Name</option>
		                <option value="'.$self_url.'rating_1">Rating</option>
		                <option value="'.$self_url.'fan_1">Fans</option>';
				break;
			case 'name_0':
				return '<option value="'.$self_url.'rel">Relevence</option>
		                <option value="'.$self_url.'trending">Trending</option>
		                <option selected value="'.$self_url.'name_1">Name &#8593;</option>
		                <option value="'.$self_url.'rating_1">Rating</option>
		                <option value="'.$self_url.'fan_1">Fans</option>';
            case 'name_1':
            	return '<option value="'.$self_url.'rel">Relevence</option>
		                <option value="'.$self_url.'trending">Trending</option>
		                <option selected value="'.$self_url.'name_0">Name &#8595;</option>
		                <option value="'.$self_url.'rating_1">Rating</option>
		                <option value="'.$self_url.'fan_1">Fans</option>';
            case 'rating_0':
            	return '<option value="'.$self_url.'rel">Relevence</option>
		                <option value="'.$self_url.'trending">Trending</option>
		                <option value="'.$self_url.'name_1">Name</option>
		                <option selected value="'.$self_url.'rating_1">Rating &#8593;</option>
		                <option value="'.$self_url.'fan_1">Fans</option>';
            	break;
            case 'rating_1':
            	return '<option value="'.$self_url.'rel">Relevence</option>
		                <option value="'.$self_url.'trending">Trending</option>
		                <option value="'.$self_url.'name_1">Name</option>
		                <option selected value="'.$self_url.'rating_0">Rating &#8595;</option>
		                <option value="'.$self_url.'fan_1">Fans</option>';
            	break;
            case 'fan_0':
            	return '<option value="'.$self_url.'rel">Relevence</option>
		                <option value="'.$self_url.'trending">Trending</option>
		                <option value="'.$self_url.'name_1">Name</option>
		                <option value="'.$self_url.'rating_1">Rating</option>
		                <option selected value="'.$self_url.'fan_1">Fans &#8593;</option>';
            	break;
            case 'fan_1':
            	return '<option value="'.$self_url.'rel">Relevence</option>
		                <option value="'.$self_url.'trending">Trending</option>
		                <option value="'.$self_url.'name_1">Name</option>
		                <option value="'.$self_url.'rating_1">Rating</option>
		                <option selected value="'.$self_url.'fan_0">Fans &#8595;</option>';
            	break;
            
			default:
				if (!$details['search'] && !$sort) {
					return '<option value="'.$self_url.'rel">Relevence</option>
		                <option selected  value="'.$self_url.'trending">Trending</option>
		                <option value="'.$self_url.'name_0">Name</option>
		                <option value="'.$self_url.'rating_1">Rating</option>
		                <option value="'.$self_url.'fan_1">Fans</option>';
				}
				return '<option value="'.$self_url.'rel" selected>Relevence</option>
		                <option  value="'.$self_url.'trending">Trending</option>
		                <option  value="'.$self_url.'name_0">Name</option>
		                <option  value="'.$self_url.'rating_1">Rating</option>
		                <option  value="'.$self_url.'fan_1">Fans</option>';
				break;
		}
        return $option;         
	}

	public static function encodeSlug($string,$id){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return strtolower(preg_replace('/-{2,}/', '-', $slug.'-'.$id));
	}

	public static function decodeSlug($string){
		return end(explode('-', $string));
	}
	
	public static function isAjax(){
		$header=apache_request_headers();
		if (@$header['X-Requested-With']=='XMLHttpRequest') {
			return true;
		}
		return false;
	}
	public static function meta($meta){
		foreach ($meta as $key => $value) {
			$p='';
			foreach ($value as $key1 => $value1) {
				$p.=$key1.'="'.$value1.'" ';
			}
		$p1.='<meta '.$p.' ><meta/>'."\n";
		}
		return $p1;
	}
	public static function staticUrl($a=false){
		return [
			'/artist/book-a-band-for-event-party'=>['art_category_id=1&artist_category_id[]=2','Book A Band For Event/Party'],
			'/artist/musicians'=>['art_category_id=1','Musicians'],
			'/artist/musicians-in-delhi-ncr'=>['city_id=323&art_category_id=1','Musicians In Delhi/Ncr'],
			'/artist/musicians-in-mumbai'=>['city_id=817&art_category_id=1','Musicians In Mumbai'],
			'/artist/musicians-in-kolkata'=>['city_id=821&art_category_id=1','Musicians In Kolkata'],
			'/artist/musicians-in-chennai'=>['city_id=820&art_category_id=1','Musicians In Chennai'],
			'/artist/musicians-in-bangalore'=>['city_id=549&art_category_id=1','Musicians In Bangalore'],
			'/artist/musicians-in-hyderabad'=>['city_id=818&art_category_id=1','Musicians In Hyderabad'],
			'/artist/standup-comedians'=>['art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedians'],
			'/artist/standup-comedian-in-delhi-ncr'=>['city_id=323&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedian In Delhi/Ncr'],
			'/artist/standup-comedian-in-mumbai'=>['city_id=817&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedian In Mumbai'],
			'/artist/standup-comedian-in-kolkata'=>['city_id=821&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedian In Kolkata'],
			'/artist/standup-comedian-in-chennai'=>['city_id=820&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedian In Chennai'],
			'/artist/standup-comedian-in-bangalore'=>['city_id=549&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedian In Bangalore'],
			'/artist/standup-comedian-in-hyderabad'=>['city_id=818&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedian In Hyderabad'],
			'/artist/magicians'=>['art_category_id=3','Magicians'],
			'/artist/magician-in-delhi-ncr'=>['city_id=323&art_category_id=3','Magician In Delhi/Ncr'],
			'/artist/magician-in-mumbai'=>['city_id=817&art_category_id=3','Magician In Mumbai'],
			'/artist/magician-in-kolkata'=>['city_id=821&art_category_id=3','Magician In Kolkata'],
			'/artist/magician-in-chennai'=>['city_id=820&art_category_id=3','Magician In Chennai'],
			'/artist/magician-in-bangalore'=>['city_id=549&art_category_id=3','Magician In Bangalore'],
			'/artist/magician-in-hyderabad'=>['city_id=818&art_category_id=3','Magician In Hyderabad'],
			'/artist/anchors'=>['art_category_id=4','Anchors'],
			'/artist/anchor-in-delhi-ncr'=>['city_id=323&art_category_id=4','Anchor In Delhi/Ncr'],
			'/artist/anchor-in-mumbai'=>['city_id=817&art_category_id=4','Anchor In Mumbai'],
			'/artist/anchor-in-kolkata'=>['city_id=821&art_category_id=4','Anchor In Kolkata'],
			'/artist/anchor-in-chennai'=>['city_id=820&art_category_id=4','Anchor In Chennai'],
			'/artist/anchor-in-bangalore'=>['city_id=549&art_category_id=4','Anchor In Bangalore'],
			'/artist/anchor-in-hyderabad'=>['city_id=818&art_category_id=4','Anchor In Hyderabad'],
			'/artist/metal-band'=>['art_category_id=1&artist_category_id[]=2&genre_id[]=4','Metal Band'],
			'/artist/blues-band'=>['art_category_id=1&artist_category_id[]=2&genre_id[]=3','Blues Band'],
			'/artist/rock-bands'=>['art_category_id=1&artist_category_id[]=2&genre_id[]=1','Rock Bands'],
			'/artist/rock-bands-in-delhi-ncr'=>['city_id=323&art_category_id=1&artist_category_id[]=2&genre_id[]=1','Rock Bands In Delhi/Ncr'],
			'/artist/rock-bands-in-mumbai'=>['city_id=817&art_category_id=1&artist_category_id[]=2&genre_id[]=1','Rock Bands In Mumbai'],
			'/artist/rock-bands-in-kolkata'=>['city_id=821&art_category_id=1&artist_category_id[]=2&genre_id[]=1','Rock Bands In Kolkata'],
			'/artist/rock-bands-in-chennai'=>['city_id=820&art_category_id=1&artist_category_id[]=2&genre_id[]=1','Rock Bands In Chennai'],
			'/artist/rock-bands-in-bangalore'=>['city_id=549&art_category_id=1&artist_category_id[]=2&genre_id[]=1','Rock Bands In Bangalore'],
			'/artist/rock-bands-in-hyderabad'=>['city_id=818&art_category_id=1&artist_category_id[]=2&genre_id[]=1','Rock Bands In Hyderabad'],
			'/artist/jazz-bands'=>['art_category_id=1&artist_category_id[]=2&genre_id[]=2','Jazz Bands'],
			'/artist/guitarist'=>['art_category_id=1&artist_category_id[]=7','Guitarist'],
			'/artist/sufi-singer'=>['art_category_id=1&genre_id[]=8&search=sufi','Sufi Singer'],
			'/artist/edm-dj'=>['art_category_id=1&artist_category_id[]=3&genre_id[]=6','Edm Dj'],
			'/artist/dj'=>['art_category_id=1&artist_category_id[]=3','Dj'],
			'/artist/dj-in-delhi-ncr'=>['city_id=323&art_category_id=1&artist_category_id[]=3','Dj In Delhi/Ncr'],
			'/artist/dj-in-mumbai'=>['city_id=817&art_category_id=1&artist_category_id[]=3','Dj In Mumbai'],
			'/artist/dj-in-kolkata'=>['city_id=821&art_category_id=1&artist_category_id[]=3','Dj In Kolkata'],
			'/artist/dj-in-chennai'=>['city_id=820&art_category_id=1&artist_category_id[]=3','Dj In Chennai'],
			'/artist/dj-in-bangalore'=>['city_id=549&art_category_id=1&artist_category_id[]=3','Dj In Bangalore'],
			'/artist/dj-in-hyderabad'=>['city_id=818&art_category_id=1&artist_category_id[]=3','Dj In Hyderabad'],
			'/artist/bollywood-dj'=>['art_category_id=1&artist_category_id[]=3&genre_id[]=9','Bollywood Dj'],
			'/artist/hindi-band'=>['art_category_id=1&artist_category_id[]=2&language_id[]=5','Hindi Band'],
			'/artist/english-band'=>['art_category_id=1&artist_category_id[]=2&language_id[]=4','English Band'],
			'/artist/bengali-band'=>['art_category_id=1&artist_category_id[]=2&language_id[]=6','Bengali Band'],
			'/artist/punjabi-dj'=>['art_category_id=1&artist_category_id[]=3&language_id[]=11','Punjabi Dj'],
			'/artist/singer'=>['art_category_id=1&artist_category_id[]=1','Singer'],
			'/artist/bollywood-singer'=>['art_category_id=1&artist_category_id[]=1&genre_id[]=9','Bollywood Singer'],
			'/artist/english-singer'=>['art_category_id=1&artist_category_id[]=1&language_id[]=4','English Singer'],
			'/artist/hindi-singer'=>['art_category_id=1&artist_category_id[]=1&language_id[]=5','Hindi Singer'],
			'/artist/telugu-singer'=>['art_category_id=1&artist_category_id[]=1&language_id[]=13','Telugu Singer'],
			'/artist/punjabi-singer'=>['art_category_id=1&artist_category_id[]=1&language_id[]=11','Punjabi Singer'],
			'/artist/singers-in-delhi-ncr'=>['city_id=323&art_category_id=1&artist_category_id[]=1','Singers In Delhi/Ncr'],
			'/artist/singers-in-mumbai'=>['city_id=817&art_category_id=1&artist_category_id[]=1','Singers In Mumbai'],
			'/artist/singers-in-kolkata'=>['city_id=821&art_category_id=1&artist_category_id[]=1','Singers In Kolkata'],
			'/artist/singers-in-chennai'=>['city_id=820&art_category_id=1&artist_category_id[]=1','Singers In Chennai'],
			'/artist/singers-in-bangalore'=>['city_id=549&art_category_id=1&artist_category_id[]=1','Singers In Bangalore'],
			'/artist/singers-in-hyderabad'=>['city_id=818&art_category_id=1&artist_category_id[]=1','Singers In Hyderabad'],
			'/artist/hindi-singer-in-delhi-ncr'=>['city_id=323&art_category_id=1&artist_category_id[]=1&language_id[]=5','Hindi Singer In Delhi/Ncr'],
			'/artist/hindi-singer-in-mumbai'=>['city_id=817&art_category_id=1&artist_category_id[]=1&language_id[]=5','Hindi Singer In Mumbai'],
			'/artist/hindi-singer-in-kolkata'=>['city_id=821&art_category_id=1&artist_category_id[]=1&language_id[]=5','Hindi Singer In Kolkata'],
			'/artist/hindi-singer-in-chennai'=>['city_id=820&art_category_id=1&artist_category_id[]=1&language_id[]=5','Hindi Singer In Chennai'],
			'/artist/hindi-singer-in-bangalore'=>['city_id=549&art_category_id=1&artist_category_id[]=1&language_id[]=5','Hindi Singer In Bangalore'],
			'/artist/hindi-singer-in-hyderabad'=>['city_id=818&art_category_id=1&artist_category_id[]=1&language_id[]=5','Hindi Singer In Hyderabad'],
			'/artist/punjabi-singer-in-delhi-ncr'=>['city_id=323&art_category_id=1&artist_category_id[]=1&language_id[]=11','Punjabi Singer In Delhi/Ncr'],
			'/artist/punjabi-singer-in-mumbai'=>['city_id=817&art_category_id=1&artist_category_id[]=1&language_id[]=11','Punjabi Singer In Mumbai'],
			'/artist/bengali-singer-in-kolkata'=>['city_id=821&art_category_id=1&artist_category_id[]=1&language_id[]=6','Bengali Singer in kolkota'],
			'/artist/tamil-singer-in-chennai'=>['city_id=820&art_category_id=1&artist_category_id[]=1&language_id[]=12','Tamil Singer in Chennai'],
			'/artist/kannada-singer-in-bangalore'=>['city_id=549&art_category_id=1&artist_category_id[]=1&language_id[]=8','Kannada Singer in Bangalore'],
			'/artist/telugu-singer-in-hyderabad'=>['city_id=818&art_category_id=1&artist_category_id[]=1&language_id[]=13','Telugu Singer in Hyderabad'],
			'/artist/bhojpuri-singer'=>['art_category_id=1&artist_category_id[]=1&language_id[]=14','Bhojpuri Singer'],
			'/artist/comedian'=>['art_category_id=2','Comedian'],

			'/event/events-in-delhi-ncr'=>['city_id=323','Events In Delhi/Ncr'],
			'/event/events-in-mumbai'=>['city_id=817','Events In Mumbai'],
			'/event/events-in-kolkata'=>['city_id=821','Events In Kolkata'],
			'/event/events-in-chennai'=>['city_id=820&date=','Events In Chennai'],
			'/event/events-in-bangalore'=>['city_id=549','Events In Bangalore'],
			'/event/events-in-hyderabad'=>['city_id=818','Events In Hyderabad'],
			'/event/dj-night-in-delhi-ncr'=>['city_id=323&date=&art_category_id=1&artist_category_id[]=3','Dj Night In Delhi/Ncr'],
			'/event/dj-night-in-mumbai'=>['city_id=817&date=&art_category_id=1&artist_category_id[]=3','Dj Night In Mumbai'],
			'/event/dj-night-in-kolkata'=>['city_id=821&date=&art_category_id=1&artist_category_id[]=3','Dj Night In Kolkata'],
			'/event/dj-night-in-chennai'=>['city_id=820&date=&art_category_id=1&artist_category_id[]=3','Dj Night In Chennai'],
			'/event/dj-night-in-bangalore'=>['city_id=549&date=&art_category_id=1&artist_category_id[]=3','Dj Night In Bangalore'],
			'/event/dj-night-in-hyderabad'=>['city_id=818&date=&art_category_id=1&artist_category_id[]=3','Dj Night In Hyderabad'],
			'/event/standup-comedy-in-delhi-ncr'=>['city_id=323&date=&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedy In Delhi/Ncr'],
			'/event/standup-comedy-in-mumbai'=>['city_id=817&date=&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedy In Mumbai'],
			'/event/standup-comedy-in-kolkata'=>['city_id=821&date=&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedy In Kolkata'],
			'/event/standup-comedy-in-chennai'=>['city_id=820&date=&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedy In Chennai'],
			'/event/standup-comedy-in-bangalore'=>['city_id=549&date=&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedy In Bangalore'],
			'/event/standup-comedy-in-hyderabad'=>['city_id=818&date=&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedy In Hyderabad'],
			'/event/bollywood-night-in-delhi-ncr'=>['city_id=323&date=&search=bollywood','Bollywood Night In Delhi/Ncr'],
			'/event/bollywood-night-in-mumbai'=>['city_id=817&date=&search=bollywood','Bollywood Night In Mumbai'],
			'/event/bollywood-night-in-kolkata'=>['city_id=821&date=&search=bollywood','Bollywood Night In Kolkata'],
			'/event/bollywood-night-in-chennai'=>['city_id=820&date=&search=bollywood','Bollywood Night In Chennai'],
			'/event/bollywood-night-in-bangalore'=>['city_id=549&date=&search=bollywood','Bollywood Night In Bangalore'],
			'/event/bollywood-night-in-hyderabad'=>['city_id=818&date=&search=bollywood','Bollywood Night In Hyderabad'],
			'/event/live-sufi-night'=>['search=sufi','Live Sufi Night'],
			'/event/delhi-nightlife'=>['city_id=323','Delhi Nightlife'],
			'/event/standup-comedy-night'=>['&art_category_id=2&artist_category_id[]=18&artist_category_id[]=19','Standup Comedy Night'],
			'/event/open-mic-comedy'=>['date=&art_category_id=2&search=open-mic','Open Mic Comedy'],
			'/event/comedy-events-in-delhi'=>['city_id=323&date=&art_category_id=2','Comedy Events In Delhi'],
			'/event/events-happening-in-delhi'=>['city_id=323','Events Happening In Delhi'],
			'/event/bollywood-night'=>['search=bollywood','Bollywood Night'],
			'/event/commercial-night'=>['search=Commercial','Commercial Night'],			
		];
	}

	public static function getRequestToken(){
		if (isset($_COOKIE['request_token'])) {
			return $_COOKIE['request_token'];
			$curl=new curl;
			$json=$curl->get(API_URL.'/auth/request-token',['request_token'=>$_COOKIE['request_token']]);
			$data=json_decode($json->text);
			if ($data->success==1) {
				return $_COOKIE['request_token'];
			}
		}
		$time=microtime(true);
		$details=[
			'authorization'=>hash_hmac('sha256', API_PUBLIC_KEY.$time.API_PRIVATE_KEY, API_PRIVATE_KEY),
			'public_key'=>API_PUBLIC_KEY,
			'nonce'=>$time,
		];
		$curl=new curl;
		$json=$curl->post(API_URL.'/auth/request-token',$details);
		$data=json_decode($json->text);
		if ($data->success==0) {
			return false;
		}
		setcookie('request_token',$data->data->request_token,time()+3600*24*365,'/','.'.DOMAIN_NAME);
		$_COOKIE['request_token']=$data->data->request_token;
		return $data->data->request_token;
	}
	public static function queryToken(){
		if (isset($_COOKIE['access_token'])) {
			return 'access_token='.$_COOKIE['access_token'];
		}
		if (isset($_COOKIE['request_token'])) {
			return 'request_token='.$_COOKIE['request_token'];
		}
		return '';
	}
	public static function getClientIp(){
		$headers=apache_request_headers();
		if(array_key_exists('X-Forwarded-For',$headers)&&filter_var($headers['X-Forwarded-For'],FILTER_VALIDATE_IP,FILTER_FLAG_IPV4)){
			$ip=$headers['X-Forwarded-For'];
		}elseif(array_key_exists('HTTP_X_FORWARDED_FOR',$headers)&&filter_var($headers['HTTP_X_FORWARDED_FOR'],FILTER_VALIDATE_IP,FILTER_FLAG_IPV4)
		){
			$ip=$headers['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip=filter_var($_SERVER['REMOTE_ADDR'],FILTER_VALIDATE_IP,FILTER_FLAG_IPV4);
		}
		return$ip;
	}
	public static function share_count($url){
		$share_count=json_decode(file_get_contents('https://graph.facebook.com/v2.8/?id='.$url.'&access_token=1537332409822532|38f19bd21aff0c7f8b12b07aff899277'))->share->share_count;
		$share_count=$share_count?$share_count:0;
		return $share_count;
	}
}
?>