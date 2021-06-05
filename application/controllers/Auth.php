<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		$this->load->model('User_model','user');		
	}

	public function index()
	{		
		$this->load->view('login');		
	}

	public function checkLogin()
	{		
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->user->login($username,$password);

		if($query == false){
			$error['err'] = 'Invalid username or password';
			$this->load->view('login',$error);
		}		
		else{
			$data = array (
					'username' => $query->username,
					'IDRole' => $query->IDRole
				);
			$this->session->set_userdata($data);	
			redirect('Nasabah','refresh');	
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}

}
