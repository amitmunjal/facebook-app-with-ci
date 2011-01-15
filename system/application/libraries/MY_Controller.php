<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends Controller
{
	function My_Controller()
	{
		parent :: Controller();
		self :: loadFBLibrary();
	}
	
	function loadFBLibrary() {
		
		$this->load->library('facebook',array(
											  'appId'  => FB_APP_ID,
											  'secret' => FB_APP_SECRET,
											  'cookie' => true,
											));	
		
		$session = $this->facebook->getSession();
		
		//IF user hasn't authorized the application then it will be redirect to the permission page
		if(!$session) {
		
			$url = self :: getLoginURL();
			//Redirect to the parent window
			echo "<script type='text/javascript'> top.location.href = '$url'; </script>";
		}
	}
	
	function getLoginURL() 
	{
		//Fetch the login url for permissions
		$url = $this->facebook->getLoginURL(array(
												   'canvas' => 1,
												   'fbconnect' => 0,
												   'req_perms'  => 'email,publish_stream',
												   'return_session'  => 1
		       ));
		
		return $url;
	}
}