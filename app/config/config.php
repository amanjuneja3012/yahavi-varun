<?php
date_default_timezone_set('Asia/Kolkata');
$config=[
	'local'=>[
		'DB_NAME'	       =>'yahavi_db',
		'ADMIN_DB'		   =>'admin',
		'DB_USER'	       =>'root',
		'DB_PASSWORD'	   =>'',
		'DB_HOST'	       =>'127.0.0.1',
		'DRIVER'	       =>'mysql',
		
		'API_URL'	       =>'http://api.beta.yahavi.com',
		'DOMAIN_URL'	   =>'http://www.myyahavi.com',
		'ARTIST_URL'	   =>'http://artist.myyahavi.com',
		'BUSINESS_URL'	   =>'http://business.myyahavi.com',
		'BLOG_URL'	       =>'http://blog.myyahavi.com',
		'DOMAIN_NAME'	   =>'myyahavi.com',
		'FAN_URL'	       =>'http://fan.myyahavi.com',
		'WEB_URL'		   =>'http://www.myyahavi.com',

		'PER_PAGE_LIMIT'   =>'15',
		'API_PUBLIC_KEY'   =>'demokey',
		'API_PRIVATE_KEY'  =>'demokey',
	],
];

if (!defined('env')) {
	define('env', 'local');
}
foreach ($config[env] as $key => $value) {
	define($key, $value);
}
?>