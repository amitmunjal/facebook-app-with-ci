<?php
$this->load->view('header');
echo br();
foreach($friends as $friend) {
	
	$imageAttr = array(
          'src' => 'http://graph.facebook.com/' . $friend['id'] . '/picture?type=square',
          'class' => 'tooltip',
          'title' => $friend['name'],
	);
	echo img($imageAttr);
	sleep(0.1);
}

$this->load->view('footer');
?>