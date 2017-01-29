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
		
		'API_URL'	       =>'https://api.beta.yahavi.com',
		'DOMAIN_URL'	   =>'http://myyahavi.com',
		'ARTIST_URL'	   =>'https://artist.local.yahavi.com',
		'BUSINESS_URL'	   =>'https://business.local.yahavi.com',
		'BLOG_URL'	       =>'https://blog.local.yahavi.com',
		'DOMAIN_NAME'	   =>'myyahavi.com',
		'FAN_URL'	       =>'https://fan.local.yahavi.com',
		'WEB_URL'		   =>'http://myyahavi.com',

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