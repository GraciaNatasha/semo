<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {

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
		$this->load->model('Nasabah_model','Nasabah');	
		$this->load->model('DDL_model','DDL');		
	}
	
	public function index($id=0)
	{					
		$data1['Nasabah']=$this->Nasabah->getAllNasabah();
		$data1['listAgama']=$this->DDL->getAllAgama();		
		$data1['IDNasabah']=$id;
		if($id!=0)
		{
			$data1['editNasabah']=$this->Nasabah->getNasabahByID($id);
		}
		$data['content'] = $this->load->view('nasabah',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function addNasabah(){
		$data_insert = $this->input->post();	
		$data_insert["username"] = $this->session->userdata('username');

		if(!empty($data_insert)){
			if($this->Nasabah->addNasabah($data_insert)){
				$this->session->set_flashdata('success', 'Sukses menambah Nasabah');
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah Nasabah');
			}
		}
		redirect('Nasabah','refresh');
	}

	public function editNasabah($id){
		$data_insert = $this->input->post();	
		$data_insert["username"] = $this->session->userdata('username');
		
		if(!empty($data_insert)){
			$this->Nasabah->editNasabah($id,$data_insert);
		}
		redirect('Nasabah','refresh');
	}

	public function deleteNasabah($id){		
		if($this->Nasabah->checkNasabahHasTrans($id)){
			echo "ada";
			$this->session->set_flashdata('error', 'Nasabah tak bisa dihapus karena sudah melakukan transaksi');
			redirect('Nasabah','refresh');	
		}else{
			echo "gada";
			$this->Nasabah->deleteNasabahById($id);
			redirect('Nasabah','refresh');	
		}		
	}

	public function histori(){		
		$data1['namaNasabah'] = "";
		$data['content'] = $this->load->view('nasabahSearchForHistory',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function searchByName(){		
		$data_insert = $this->input->post();
		$data1['listNasabah']=$this->Nasabah->getAllNasabahByName($data_insert);
		$data1['namaNasabah'] = $data_insert['nama'];
		$data['content'] = $this->load->view('nasabahSearchForHistory',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function getHistori($IDNasabah){
		
		$data['content'] = $this->load->view('nasabahHistory',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function getNasabahByID()
	{
		$IDNasabah = $this->input->post('IDNasabah');
		$dataNasabah=$this->Nasabah->getNasabahByID($IDNasabah);

		echo json_encode($dataNasabah);
	}

}
