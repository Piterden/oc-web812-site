<?php 

use NetSTI\Backend\Models\Security;
use Illuminate\Support\Facades\Request;

App::before(function ($request) {
	if(!Request::secure() && Security::get('https'))
		return Redirect::secure(Request::path());

	if(!isCommandLineInterface() && checkBan(Request::ip()))
		return View::make('netsti.backend::banned');
});

function isCommandLineInterface(){
	return (php_sapi_name() === 'cli');
}

function checkBan($ip){
	if(strpos(serialize(Security::get('ips')), '"'.$ip.'"') !== false)
		return true;
}

 ?>