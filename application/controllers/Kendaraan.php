<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

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
		$this->load->model('Kendaraan_model','Kendaraan');	
		$this->load->model('Nasabah_model','Nasabah');	
		$this->load->model('Sewa_model','Sewa');
		$this->load->model('DDL_model','DDL');		
	}
	
	public function index($id=0)
	{					
		$data1['Kendaraan']=$this->Kendaraan->getAllKendaraan();
		$data1['IDKendaraan']=$id;
		$data1['listCaraBayar'] = $this->DDL->getAllCaraBayar();
		if($id!=0)
		{
			$data1['editKendaraan']=$this->Kendaraan->getKendaraanByID($id);
		}
		$data['content'] = $this->load->view('kendaraan',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function addKendaraan(){
		$data_insert = $this->input->post();
		$data_insert["username"] = $this->session->userdata('username');	

		if(!empty($data_insert)){
			if($this->Kendaraan->addKendaraan($data_insert)){
				$this->session->set_flashdata('success', 'Sukses menambah Kendaraan');
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah Kendaraan');
			}
		}
		redirect('Kendaraan','refresh');
	}

	public function editKendaraan($id){
		$data_insert = $this->input->post();
		$data_insert["username"] = $this->session->userdata('username');
		
		if(!empty($data_insert)){
			$this->Kendaraan->editKendaraan($id,$data_insert);
		}
		redirect('Kendaraan','refresh');
	}

	public function deleteKendaraan($id){
		$this->Kendaraan->deleteKendaraanById($id);
		redirect('Kendaraan','refresh');	
	}

	public function Tarik($IDTarikKendaraan="")
	{
		$data1['listNasabah']=$this->Nasabah->getAllNasabahForTarik();
		$data1['listKendaraanTarik']=$this->Kendaraan->getAllKendaraanTarik();
		$data1['IDTarikKendaraan']="";
		/*if($IDTarikKendaraan!="")
		{
			//edit BELOM
			$data1['editKendaraan']=$this->Kendaraan->getKendaraanByID($IDTarikKendaraan);
		}*/
		$data['content'] = $this->load->view('kendaraanTarik',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function getKendaraanForTarikByIDNasabah(){
		$IDNasabah = $this->input->post('IDNasabah');
		$listKendaraanTarik = $this->Kendaraan->getKendaraanForTarikByIDNasabah($IDNasabah);
		echo json_encode($listKendaraanTarik);

	}

	public function TarikKendaraan()
	{
		$data_insert = $this->input->post();
		$data_insert["username"] = $this->session->userdata('username');	
		$dataSewa = $this->Sewa->getNoPiutangByNasabahNKendaraan($data_insert);	
		$data_insert["noPiutang"] = $dataSewa->noPiutang;	

		if(!empty($data_insert)){
			if($this->Kendaraan->tarikKendaraan($data_insert)){
				$this->session->set_flashdata('success', 'Sukses menambah Kendaraan');
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah Kendaraan');
			}
		}
		redirect('Kendaraan/Tarik','refresh');
	}

	public function tebusKendaraan(){
		$data_insert = $this->input->post();
		$data_insert["username"] = $this->session->userdata('username');

		if(!empty($data_insert)){
			if($this->Kendaraan->tebusKendaraan($data_insert)){
				$this->session->set_flashdata('success', 'Sukses menambah Kendaraan');
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah Kendaraan');
			}
		}
		redirect('Kendaraan/Tarik','refresh');
	}

	public function getKendaraanByID()
	{
		$IDKendaraan = $this->input->post('IDKendaraan');
		$dataKendaraan = $this->Kendaraan->getKendaraanByID($IDKendaraan);
		$dataKendaraan->listCaraBayar = $this->DDL->getAllCaraBayar();
		//var_dump($dataKendaraan);die();
		echo json_encode($dataKendaraan);
	}

}
