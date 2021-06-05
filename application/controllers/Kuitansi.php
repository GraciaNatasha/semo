<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuitansi extends CI_Controller {

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
		$this->load->model('Kuitansi_model','Kuitansi');	
		$this->load->model('DDL_model','DDL');				
		$this->load->model('Sewa_model','Sewa');				
	}

	public function index(){
	}

	public function view($tipe=""){
		$data1['tipe'] = $tipe;
		$data_insert = $this->input->post();

		if(!empty($data_insert)){			
			$data1['dataTanggal'] = $data_insert;
			$data1['listKuitansi']=$this->Kuitansi->getAllKuitansi($tipe,$data_insert);			
		}else{
			$data1['listKuitansi']=$this->Kuitansi->getAllKuitansi($tipe);
		}

		$data['content'] = $this->load->view('kuitansiList',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function create($tipe="")
	{				
		$data1['tipe'] = $tipe;
		$data['content'] = $this->load->view('kuitansiKeluarMasuk',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function addKuitansiKeluarMasuk(){		
		$data_insert = $this->input->post();	
		$data_insert["tglTransaksi"] = date('Y-m-d');
		$data_insert["username"] = $this->session->userdata('username');

		if(!empty($data_insert)){
			if($this->Kuitansi->addKuitansi($data_insert)){
				$this->session->set_flashdata('success', 'Sukses menambah Kuitansi');
			}else{
				$this->session->set_flashdata('error', 'Gagal menambah Kuitansi');
			}
		}
		redirect('Kuitansi/create/'.$data_insert["tipe"],'refresh');
	}

	public function paySewa($noPiutang)
	{				
		$data1['noPiutang'] = $noPiutang;
		$data1['listCaraBayar']=$this->DDL->getAllCaraBayar();

		$data['content'] = $this->load->view('kuitansiSewa',$data1,true);
		$this->load->view('sidebar',$data);
	}

	public function calcBayarSewa(){			
		$data["noPiutang"] = $this->input->post('noPiutang');	
		$nominal = $this->input->post('nominal');			
		$dataDetailSewa = $this->Sewa->getListDetailForPayment($data);

		$result = new stdClass();
		$result->nominal = $nominal;

		$i = 0;
		$denda = 0;
		$pemenuhanSewa = 0;
		$pemenuhanSewaKe = "";
		$sebagianSewa = 0;
		$sebagianSewaKe = 0;
		$today = new DateTime();
		$flag = "Bayar";

		while($nominal > 0){
			$dateJatuhTempo = date_create($dataDetailSewa[$i]->tglJatuhTempo); 
			if($today > $dateJatuhTempo && $flag == "Bayar"){
				$diff = date_diff($today, $dateJatuhTempo);
				$dendaPerAngsuran = 0.004 * $diff->days * $dataDetailSewa[$i]->nominal; 
				$denda += $dendaPerAngsuran;
				$nominal -= $dendaPerAngsuran;
				$flag = "Denda";
			}else{
				if($dataDetailSewa[$i]->nominal <= $nominal){
					$pemenuhanSewa += $dataDetailSewa[$i]->nominal;
					if($pemenuhanSewaKe == ""){
						$pemenuhanSewaKe = $dataDetailSewa[$i]->sewaKe;	
					}else{
						$pemenuhanSewaKe = $pemenuhanSewaKe.", ".$dataDetailSewa[$i]->sewaKe;						
					}
					$nominal -= $dataDetailSewa[$i]->nominal;
				}else{
					$sebagianSewa += $nominal;
					$sebagianSewaKe += $dataDetailSewa[$i]->sewaKe;
					$nominal -= $dataDetailSewa[$i]->nominal;
				}

				$i += 1;
				$flag = "Bayar";
			}
		}

		if($pemenuhanSewaKe == ""){
			$pemenuhanSewaKe = "-";
		}

		$result->denda = $denda;
		$result->pemenuhanSewa = $pemenuhanSewa;
		$result->pemenuhanSewaKe = $pemenuhanSewaKe;
		$result->sebagianSewa = $sebagianSewa;
		$result->sebagianSewaKe = $sebagianSewaKe;

		/*foreach ($dataDetailSewa as $data) {			
			var_dump($data);
		}

		echo " denda ".$denda;
		echo " pemenuhanSewa ".$pemenuhanSewa;
		echo " pemenuhanSewaKe ".$pemenuhanSewaKe;
		echo " sebagianSewa ".$sebagianSewa;
		echo " sebagianSewaKe ".$sebagianSewaKe;
		die();*/
		echo json_encode($result);
	}

	public function laporan($tipe){
		$data1['tipe'] = $tipe;
		$data_insert = $this->input->post();

		if(!empty($data_insert)){			
			$data1['dataTanggal'] = $data_insert;
			if($tipe == "Apalis" || $tipe == "BJM"){
				$data1['listLaporan']=$this->Kuitansi->getAllLaporanKeluarMasuk($tipe,$data_insert);				
			}else if($tipe == "Sewa"){
				$data1['listLaporan']=$this->Kuitansi->getAllLaporanSewa($tipe,$data_insert);	
			}			
		}else{
			if($tipe == "Apalis" || $tipe == "BJM"){
				$data1['listLaporan']=$this->Kuitansi->getAllLaporanKeluarMasuk($tipe);				
			}else if($tipe == "Sewa"){
				$data1['listLaporan']=$this->Kuitansi->getAllLaporanSewa($tipe);
			}
		}

		$data['content'] = $this->load->view('laporan',$data1,true);
		$this->load->view('sidebar',$data);
	}

}
