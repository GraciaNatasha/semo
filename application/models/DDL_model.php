<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DDL_model extends CI_Model {

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
		$this->load->model('DDL_model','DDL');	
	} 

	public function getAllAgama(){
		$result = array();
		$queryString="SELECT * FROM ltagama";
		$query=$this->db->query($queryString);
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->IDAgama = $query->row($i)->IDAgama;
				$temp->namaAgama = $query->row($i)->namaAgama;

				array_push($result, $temp);
			}
		}
		return $result;
	}

	public function getAllJenisAsuransi(){
		$result = array();
		$queryString="SELECT * FROM ltjenisasuransi";
		$query=$this->db->query($queryString);
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->IDJenisAsuransi = $query->row($i)->IDJenisAsuransi;
				$temp->namaJenisAsuransi = $query->row($i)->namaJenisAsuransi;

				array_push($result, $temp);
			}
		}
		return $result;
	}
	
	public function getAllCaraBayar(){
		$result = array();
		$queryString="SELECT * FROM ltcarabayar";
		$query=$this->db->query($queryString);
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->IDCaraBayar = $query->row($i)->IDCaraBayar;
				$temp->namaCaraBayar = $query->row($i)->namaCaraBayar;

				array_push($result, $temp);
			}
		}
		return $result;
	}

}
?>