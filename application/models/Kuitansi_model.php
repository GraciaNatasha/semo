<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuitansi_model extends CI_Model {

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
	} 
	
	public function addKuitansi($data){
		$queryString="INSERT INTO trpemasukanpengeluaran(noKuitansi,dariUntuk,nominal,keterangan,tglTransaksi,tipe,username) VALUES(?,?,?,?,?,?,?)";
		try {
			$query = $this->db->query($queryString,array($data["noKuitansi"],$data["dariUntuk"],$data["nominal"],$data["keterangan"],$data["tglTransaksi"],$data["tipe"],$data["username"]));
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		catch(Exception $ex) {
			var_dump($ex);
		}
	}

	public function getAllKuitansi($tipe,$data=""){
		$result = array();
		if($data == ""){
			$queryString="SELECT * FROM trpemasukanpengeluaran WHERE tipe=? ORDER BY tglTransaksi";
			$query=$this->db->query($queryString,array($tipe));
		}else{
			$queryString="SELECT * FROM trpemasukanpengeluaran WHERE tipe=? AND tglTransaksi BETWEEN ? AND ? ORDER BY tglTransaksi";
			$query=$this->db->query($queryString,array($tipe,$data["tglDari"],$data["tglSampai"]));
		}

		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->noKuitansi = $query->row($i)->noKuitansi;
				$temp->dariUntuk = $query->row($i)->dariUntuk;
				$temp->nominal = $query->row($i)->nominal;
				$temp->keterangan = $query->row($i)->keterangan;
				$temp->tglTransaksi = $query->row($i)->tglTransaksi;
				$temp->tipe = $query->row($i)->tipe;
				$temp->username = $query->row($i)->username;

				array_push($result, $temp);
			}
		}	
		return $result;
	}

	public function getAllLaporanKeluarMasuk($tipe,$data=""){
		$result = array();
		$condition = "";

		if ($tipe == "Apalis") {
			$condition = "tipe IN('L','M')";
		}else if ($tipe == "BJM") {
			$condition = "tipe IN('KL','KM')";
		}

		if($data == ""){
			$queryString="SELECT * FROM trpemasukanpengeluaran WHERE ".$condition." ORDER BY tglTransaksi";
			$query=$this->db->query($queryString);
		}else{
			$queryString="SELECT * FROM trpemasukanpengeluaran WHERE ".$condition." AND tglTransaksi BETWEEN ? AND ? ORDER BY tglTransaksi";
			$query=$this->db->query($queryString,array($data["tglDari"],$data["tglSampai"]));
		}

		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->noKuitansi = $query->row($i)->noKuitansi;
				$temp->dariUntuk = $query->row($i)->dariUntuk;
				$temp->nominal = $query->row($i)->nominal;
				$temp->keterangan = $query->row($i)->keterangan;
				$temp->tglTransaksi = $query->row($i)->tglTransaksi;
				$temp->tipe = $query->row($i)->tipe;
				$temp->username = $query->row($i)->username;

				array_push($result, $temp);
			}
		}	
		return $result;
	}

}
?>