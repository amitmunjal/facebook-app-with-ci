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
			
				$userAPIData['method'] = 'fql.query';
				$userAPIData['query']  = 'SELECT uid, name, pic_square FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me() Limit 28)';
				$friendsDetails = $this->facebook->api($userAPIData);
			} catch(Exception $ex) {
				if($ex->getCode() == 0) {
				
					$url = parent :: getLoginURL();
					echo "<script type='text/javascript'> top.location.href = '$url'; </script>";
					exit;
				}
			}
			$data['friends'] = $friendsDetails;
			$this->load->view('friends', $data);
		}
	}
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */