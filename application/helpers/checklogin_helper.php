<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('isLoggedIn'))
{
    function isLoggedIn()
    {
        $CI =& get_instance();
    	$checkLogin = $CI->session->userdata('username');
       	if(!isset($checkLogin) || $checkLogin != true)
       	{
        	redirect('Auth','refresh');
    	}
    }   
}