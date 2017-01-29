<?php
header('Content-Type: text/html; charset=utf-8');
header('X-XSS-Protection: 1; mode=block');
header("Content-Security-Policy:default-src * 'unsafe-inline' 'unsafe-eval'");
header_remove('X-Powered-By');
ini_set('display_errors', 0);
require_once '../app/init.php';
define('REQUEST_TOKEN', Helper::getRequestToken());
$route=new Route;
$route->any('/','home@index');
$route->any('/signin','home@index');
$route->any('/terms','home@terms');
$route->any('/privacy','home@privacy');
$route->any('/aboutus','home@aboutus');
$route->any('/contactus','home@contactus');
$route->any('/aboutus/:section','home@aboutusSection');
$route->any('/logout','account@logout');
$route->any('/login','account@login');
$route->any('/feature-video','home@featureVideo');
$route->any('/videos','home@videos');
$route->any('/artist/list','home@artistList');
$route->any('/event/list','home@eventList');

$route->any('/bookartist','home@bookartist');


foreach (Helper::staticUrl() as $key => $value) {
	$route->get($key,'home@staticUrl');
}
$route->any('/artist/:id','home@artistId');
$route->any('/test','test@index');
$route->any('/artist','home@artist');
$route->any('/event','home@event');
$route->any('/event/:id','home@eventId');
$route->any('/oppevent/:id','home@oppeventId');


$route->any('/street-jammers','home@streetJammers');
$route->any('/magic-manas','home@magicManas');

$route->post('/street-jammers/mail','home@streetJammersMailTo');
$route->any('/create-event','home@createEvent');
$route->any('/save-event','home@saveFormToDrive');
$route->any('/verify','account@verify');
$route->any('/verified','account@bookeartist_verify');





$route->any('/filter','home@filter');
$route->any('/unsubscribe','Account@unsubscribe_mail');

$route->any('/mailer/unsubscribe/:token','account@unsubscribe');
$route->any('/js/footer.js','Assets@footerjs');
$route->any('/404','Assets@notfound');
$route->run();
?>
