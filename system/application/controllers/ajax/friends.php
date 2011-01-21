<?php
class Friends extends MY_Controller {

	function __construct() {
		
		parent::MY_Controller();
	}
	function fetchFriends() {
		
		$currentPageNo = (int)$this->uri->segment(4);
		$offset = $currentPageNo * 28;
		try {
			/**
			fetch loggedin user's friends name and their profile picture
			**/
			$userAPIData['method'] = 'fql.query';
			$userAPIData['query']  = "SELECT uid, name, pic_square FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me() Limit $offset,28)";
			
			$friendsDetails        = $this->facebook->api($userAPIData);
		} catch(Exception $ex) {
			if($ex->getCode() == 0) {
			
				$url = parent :: getLoginURL();
				echo "<script type='text/javascript'> top.location.href = '$url'; </script>";
				exit;
			}
		}
		echo json_encode($friendsDetails); 
	}
}
?>