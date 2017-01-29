<?php
/**
*			 
*/
class Input 		
{
	public static function get($key=null){
		if(is_array($key)){
			$get=array();
			foreach ($key as $key) {
				$get[$key]=self::clean(self::get($key));
			}
			return $get;
		}else{
			if(!isset($key)){
				$get=array();
				foreach ($_GET as $key => $value) {
					$get[$key]=self::clean($value);
				}
				return $get;
			}
		}
		return isset($_GET[$key]) ?self::clean($_GET[$key]):'';
	}

	public static function post($key=null){
		if(is_array($key)){
			$post=array();
			foreach ($key as $key) {
				$post[$key]=self::clean(self::post($key));
			}
			return $post;
		}else{
			if(!isset($key)){
				$post=array();
				foreach ($_POST as $key => $value) {
					$post[$key]=self::clean($value);
				}
				return $post;
			}
		}
		return isset($_POST[$key]) ?self::clean($_POST[$key]):'';
	}
	public static function put($key=null){
		parse_str(file_get_contents("php://input"),$_PUT);
		if(is_array($key)){
			$put=array();
			foreach ($key as $key) {
				$put[$key]=self::clean(self::put($key));
			}
			return $put;
		}else{
			if(!isset($key)){
				$put=array();
				foreach ($_PUT as $key => $value) {
					$put[$key]=self::clean($value);
				}
				return $put;
			}
		}
		return isset($_PUT[$key]) ?self::clean($_PUT[$key]):'';
	}
	public static function any($key=null){
		if(is_array($key)){
			$any=array();
			foreach ($key as $key) {
				$any[$key]=self::clean(self::any($key));
			}
			return $any;
		}else{
			if(!isset($key)){
				$any=array();
				foreach ($_REQUEST as $key => $value) {
					$any[$key]=self::clean($value);
				}
				return $any;
			}
		}
		return isset($_REQUEST[$key]) ?self::clean($_REQUEST[$key]):'';
	}

	private static function clean($var=''){
		if (isset($var)) {
			if (is_array($var)) {
				foreach ($var as $key => $value) {
					$var[$key]=htmlspecialchars((trim($value)));
				}
			}else{
				$var=htmlspecialchars((trim($var)));		
			}
		}else{
			$var='';
		}
		return $var;
	}

	public static function url(){
		return [
			'music-artists'								=>'art_category_id=1',
			'music-artist-in-delhi-ncr'					=>'city_id=323&art_category_id=1',
			'music-artist-in-mumbai'					=>'city_id=817&art_category_id=1',
			'music-artist-in-kolkata'					=>'city_id=821&art_category_id=1',
			'music-artist-in-chennai'					=>'city_id=820&art_category_id=1',
			'music-artist-in-banglore'					=>'city_id=549&art_category_id=1',
			'music-artist-in-hyderabad'					=>'city_id=818&art_category_id=1',
			'standup-comedians'							=>'art_category_id=2',
			'standup-comedian-in-delhi-ncr'				=>'city_id=323&art_category_id=2',
			'standup-comedian-in-mumbai'				=>'city_id=817&art_category_id=2',
			'standup-comedian-in-kolkata'				=>'city_id=821&art_category_id=2',
			'standup-comedian-in-chennai'				=>'city_id=820&art_category_id=2',
			'standup-comedian-in-bangalore'				=>'city_id=549&art_category_id=2',
			'standup-comedian-in-hyderabad'				=>'city_id=818&art_category_id=2',
			'magicians'									=>'art_category_id=3',
			'magician-in-delhi-ncr'						=>'city_id=323&art_category_id=3',
			'magician-in-mumbai'						=>'city_id=817&art_category_id=3',
			'magician-in-kolkata'						=>'city_id=821&art_category_id=3',
			'magician-in-chennai'						=>'city_id=820&art_category_id=3',
			'magician-in-bangalore'						=>'city_id=549&art_category_id=3',
			'magician-in-hyderabad'						=>'city_id=818&art_category_id=3',
			'anchors'									=>'city_id=549&art_category_id=4',
			'anchor-in-delhi-ncr'						=>'city_id=323&art_category_id=4',
			'anchor-in-mumbai'							=>'city_id=817&art_category_id=4',
			'anchor-in-kolkata'							=>'city_id=821&art_category_id=4',
			'anchor-in-chennai'							=>'city_id=820&art_category_id=4',
			'anchor-in-bangalore'						=>'city_id=549&art_category_id=4',
			'anchor-in-hyderabad'						=>'city_id=818&art_category_id=4',
			'rock-bands'								=>'art_category_id=1&artist_category_id[]=2&genre_id[]=1',
			'rock-band-in-delhi-ncr'					=>'city_id=323&art_category_id=1&artist_category_id[]=2&genre_id[]=1',
			'rock-band-in-mumbai'						=>'city_id=817&art_category_id=1&artist_category_id[]=2&genre_id[]=1',
			'rock-band-in-kolkata'						=>'city_id=821&art_category_id=1&artist_category_id[]=2&genre_id[]=1',
			'rock-band-in-chennai'						=>'city_id=820&art_category_id=1&artist_category_id[]=2&genre_id[]=1',
			'rock-band-in-bangalore'					=>'city_id=549&art_category_id=1&artist_category_id[]=2&genre_id[]=1',
			'rock-band-in-hyderabad'					=>'city_id=818&art_category_id=1&artist_category_id[]=2&genre_id[]=1',
			'jazz-bands'								=>'art_category_id=1&artist_category_id[]=2&genre_id[]=2',
			'jazz-band-in-delhi-ncr'					=>'city_id=323&art_category_id=1&artist_category_id[]=2&genre_id[]=2',
			'jazz-band-in-mumbai'						=>'city_id=817&art_category_id=1&artist_category_id[]=2&genre_id[]=2',
			'jazz-band-in-kolkata'						=>'city_id=821&art_category_id=1&artist_category_id[]=2&genre_id[]=2',
			'jazz-band-in-chennai'						=>'city_id=820&art_category_id=1&artist_category_id[]=2&genre_id[]=2',
			'jazz-band-in-bangalore'					=>'city_id=549&art_category_id=1&artist_category_id[]=2&genre_id[]=2',
			'jazz-band-in-hyderabad'					=>'city_id=818&art_category_id=1&artist_category_id[]=2&genre_id[]=2',
			'hindi-singer'								=>'art_category_id=1&artist_category_id[]=1&language_id[]=5',
			'drummer'									=>'art_category_id=1&artist_category_id[]=13&artist_category_id[]=12',
			'guitarist'									=>'art_category_id=1&artist_category_id[]=7',
			'bassist'									=>'art_category_id=1&artist_category_id[]=13&artist_category_id[]=12',
			'sufi-musicians'							=>'https://www.yahavi.com/artist/?search=sufi',
			'sufi-artist'								=>'https://www.yahavi.com/artist/?search=sufi',
			'djs'										=>'art_category_id=1&artist_category_id[]=3',
			'dj-in-delhi-ncr'							=>'city_id=323&art_category_id=1&artist_category_id[]=3',
			'dj-in-mumbai'								=>'city_id=817&art_category_id=1&artist_category_id[]=3',
			'dj-in-kolkata'								=>'city_id=821&art_category_id=1&artist_category_id[]=3',
			'dj-in-chennai'								=>'city_id=820&art_category_id=1&artist_category_id[]=3',
			'dj-in-bangalore'							=>'city_id=549&art_category_id=1&artist_category_id[]=3',
			'dj-in-hyderabad'							=>'city_id=818&art_category_id=1&artist_category_id[]=3',
			'bollywood-dj'								=>'art_category_id=1&artist_category_id[]=3&genre_id[]=9',
			'edm-dj'									=>'art_category_id=1&artist_category_id[]=3&genre_id[]=6',
			'vocalist'									=>'art_category_id=1&artist_category_id[]=1',
			'bollywood-singer'							=>'art_category_id=1&artist_category_id[]=1&genre_id[]=9',
			'english-singer'							=>'art_category_id=1&artist_category_id[]=1&language_id[]=4',
			'hindi-singer'								=>'art_category_id=1&artist_category_id[]=1&language_id[]=5',
			'comedian'									=>'art_category_id=2',
		];
	}
}
?>