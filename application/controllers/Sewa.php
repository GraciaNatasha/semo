<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

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
		$this->load->model('Kendaraan_model','Kendaraan');	
		$this->load->model('Sewa_model','Sewa');
		$this->load->model('DDL_model','DDL');				
	}

	/*CREATE*/
	public function index()
	{					
		$data1['Sewa']=$this->Sewa->getAllSewa();
		$data1['listAgama']=$this->DDL->getAllAgama();
		$data1['listJenisAsuransi']=$this->DDL->getAllJenisAsuransi();
		$data1['listNasabah']=$this->Nasabah->getAllNasabah();
		$data1['listNoStok']=$this->Kendaraan->getAllKendaraanForSewa();

		$data1['noPiutang']=0;
		$data['content'] = $this->load->view('sewa',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function addSewa(){		
		$data_insert = $this->input->post();
		$data_insert["tglTransaksi"] = date('Y-m-d');
		$data_insert["username"] = $this->session->userdata('username');
		
		if(!empty($data_insert)){
			//add/edit nasabah	
			if($data_insert["tipeNasabah"] == "baru"){
				$data_insert["IDNasabah"] = $this->Nasabah->addNasabah($data_insert);
			}			

			//add kendaraan
			//$data_insert["IDKendaraan"] = $this->Kendaraan->addKendaraan($data_insert);
			//edit status kendaraan jadi disewa

			//add transaksi sewa			
			$success = $this->Sewa->addSewa($data_insert);
			if($success){				
				$this->session->set_flashdata('success', 'Sukses membuat transaksi sewa');
			}else{
				$this->session->set_flashdata('error', 'Gagal  membuat transaksi sewa');
			}
		}
		redirect('Sewa','refresh');
	}

	/*LIST*/
	public function viewAll(){
		$data1['listSewa']=$this->Sewa->getAllSewa();
		$data['content'] = $this->load->view('sewaList',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function viewDetail($noPiutang){
		$data1["dataSewa"] = $this->Sewa->getSewaByNoPiutang($noPiutang);
		$data1["dataDetailSewa"] = $this->Sewa->getDetailSewaByNoPiutang($noPiutang);			
		$data1["dataNasabah"] = $this->Nasabah->getNasabahById($data1["dataSewa"]->IDNasabah);
		$data1["dataKendaraan"] = $this->Kendaraan->getKendaraanById($data1["dataSewa"]->IDKendaraan);
		$data1['noPiutang']=$data1["dataSewa"]->noPiutang;
		$data1['listNoStok']=$this->Kendaraan->getAllKendaraan();
			
		$data1['listAgama']=$this->DDL->getAllAgama();
		$data1['listJenisAsuransi']=$this->DDL->getAllJenisAsuransi();
		$data['content'] = $this->load->view('sewa',$data1,true);
		$this->load->view('sidebar',$data);
	}

	/*BAYAR*/
	public function pay()
	{					
		$data1['noPiutang']="";
		$data1['noPolisi']="";
		$data['content'] = $this->load->view('sewaPay',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function getListDetailForPayment(){
		$data_insert = $this->input->post();

		if(!empty($data_insert)){
			$data1["dataDetailSewa"] = $this->Sewa->getListDetailForPayment($data_insert);
			$data1['noPiutang']=$data_insert['noPiutang'];
			$data1['noPolisi']=$data_insert['noPolisi'];
			//echo $data1["dataDetailSewa"];die();
			if($data1["dataDetailSewa"] == -1){				
				$this->session->set_flashdata('error', 'Masukan No.Piutang atau No.Polisi Kendaraan');
				redirect('Sewa/pay','refresh');
			}else{
				if(count($data1["dataDetailSewa"]) == 0){				
					$this->session->set_flashdata('error', 'No.Piutang tidak ditemukan atau sudah lunas');
				}else{
					$data1['noPiutang']=$data1["dataDetailSewa"][0]->noPiutang;					
					$data['content'] = $this->load->view('sewaPay',$data1,true);
					$this->load->view('sidebar',$data);
				}
			}
		}

	}
	

}
