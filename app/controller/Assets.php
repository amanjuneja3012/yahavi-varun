<?php
class Assets
{
	public function footerjs(){
		header("Cache-control: Public,max-age=3600");
		header("Pragma:Cache");
		return View::make('include/footerjs');
	}
	public function notfound(){
		return View::make('home/404');
	}
}
?>