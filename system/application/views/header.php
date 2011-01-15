<?php
header('HTTP/1.0 200 OK'); // stoopid IIS
header('Content-Type: text/html; Charset=UTF-8');
$this->load->helper('html');
$this->load->helper('myhtml');

//Store all the html data in a variable $ret
$ret  = doctype('html5'); // For doc type declaration
$ret .= '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">';
$ret .= '<head>';
$ret .= '<title>Cool Facebook App with Codeigniter</title>';

//Define the meta tags here
$meta = array(
			array('http-equiv'=>'Content-Type', 'content'=>'text/html;charset=utf-8'),
			array('name'=>'author', 'content'=>'Amit Munjal - http://www.facebook.com/munjal4186'),
			array('name'=>'description', 'content'=>'just for test'),
			array('name'=>'keywords', 'content'=>'Demo Facebook Application')
		);

$ret .= meta( $meta ); //meta() function for meta tags
$ret .= link_tag('css/tipsy.css'); //link_tag() function for link tag
$ret .= script_tag('js/jquery-1.3.2.min.js'); //script_tag() function for the script tag -- loaded from myhtml helper
$ret .= script_tag('js/jquery.tipsy.js');

//ready() function for the ToolTip
$ret .= '<script type="text/javascript">';
$ret .= '$(document).ready(function(){';
$ret .= '$(".tooltip").tipsy({ gravity: "s" });';
$ret .= '});';
$ret .= '</script>';
$ret .= '</head>';

$ret .= '<body>';
echo $ret;
?>