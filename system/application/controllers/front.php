<?php

class Front extends MY_Controller {

	function Front()
	{
		parent::My_Controller();
		//$this->load->library('curl');
	}
	
	function index()
	{
		$session         = $this->facebook->getSession();
		
		//Check that active access token is available or not
		if($session) {
		
			try {
			
			$contents = $this->facebook->api('/me/friends');//Fetch the friends names and ids
			} catch(Exception $ex) {
				if($ex->getCode() == 0) {
				
					$url = parent :: getLoginURL();
					echo "<script type='text/javascript'> top.location.href = '$url'; </script>";
					exit;
				}
			}
			$data['friends'] = $contents['data'];
			$this->load->view('friends', $data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */