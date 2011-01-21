<?php
$this->load->view('header');
$this->load->helper('form'); //load the form helper for the button(form_button)
$this->load->helper('url'); //load this helper for the site_url function

echo br(2);
$friendCount = 0;
	echo '<div id="friendsDiv">';
		foreach($friends as $friend) {
			
			$imageAttr = array(
				  'src' => $friend['pic_square'],
				  'class' => 'tooltip',
				  'title' => $friend['name'],
			);
			echo img($imageAttr);
			sleep(.1);
		}
		echo br();
		$data = array(
			'name' => 'button',
			'content' => 'Next',
			'onclick' => 'objFriend.fetchFriends(\'' . site_url() . '/ajax/friends/fetchFriends\', 1);'
		);
		echo form_button($data);	
	echo '</div>';
echo '<script type="text/javascript">var objFriend = new friendClass();</script>';
$this->load->view('footer');
?>