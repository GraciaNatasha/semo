<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() 
	{
		parent::__construct();
	} 
	
	function login($username,$password){
		$queryString = "SELECT username,IDRole FROM msuser WHERE username=? AND password=?";
		$query = $this->db->query($queryString,array($username,hash('sha512', $password)));
		if ($query != null && $query->num_rows() > 0) {
			$temp = new stdclass();

			$temp->username = $query->row(0)->username;
			$temp->IDRole = $query->row(0)->IDRole;
			
			return $temp;
		}
		else 
			return false;
	}

}
?>