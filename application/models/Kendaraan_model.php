<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan_model extends CI_Model {

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
	} 
	
	public function addKendaraan($data){
		$queryString="INSERT INTO mskendaraan(merkKendaraan,jenisKendaraan,tipeKendaraan,noRangkaKendaraan,noMesinKendaraan,warnaKendaraan,tahunKendaraan,noPolisiKendaraan,statusKepemilikanKendaraan,username,noStok,tglBeli,beliDari,hargaBeli,IDCaraBayar) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		try {
			$query = $this->db->query($queryString,array($data["merk"],$data["jenis"],$data["tipe"],$data["noRangka"],$data["noMesin"],$data["warna"],$data["tahun"],$data["noPolisi"],$data["statusKepemilikan"],$data["username"],$data["noStok"],$data["tglBeli"],$data["beliDari"],$data["hargaBeli"],$data["IDCaraBayar"]));
			return $this->db->insert_id();
		}
		catch(Exception $ex) {
			var_dump($ex);
			
			//should write log file
		}
	}

	public function getKendaraanById($IDKendaraan){
		$queryString="SELECT * FROM mskendaraan WHERE IDKendaraan=?";
		$query=$this->db->query($queryString,array($IDKendaraan));
		
		if($query->num_rows()>0)
		{		
			$temp = new stdClass();
			$i=0;
			
			$temp->IDKendaraan = $query->row($i)->IDKendaraan;
			$temp->merkKendaraan = $query->row($i)->merkKendaraan;
			$temp->jenisKendaraan = $query->row($i)->jenisKendaraan;
			$temp->tipeKendaraan = $query->row($i)->tipeKendaraan;
			$temp->noRangkaKendaraan = $query->row($i)->noRangkaKendaraan;
			$temp->noMesinKendaraan = $query->row($i)->noMesinKendaraan;
			$temp->warnaKendaraan = $query->row($i)->warnaKendaraan;
			$temp->tahunKendaraan = $query->row($i)->tahunKendaraan;
			$temp->noPolisiKendaraan = $query->row($i)->noPolisiKendaraan;
			$temp->statusKepemilikanKendaraan = $query->row($i)->statusKepemilikanKendaraan; //Borobudur, lagi disewa, lunas
			$temp->noStok = $query->row($i)->noStok;
			$temp->tglBeli = $query->row($i)->tglBeli;
			$temp->beliDari = $query->row($i)->beliDari;
			$temp->hargaBeli = $query->row($i)->hargaBeli;
			$temp->IDCaraBayar = $query->row($i)->IDCaraBayar;

			return $temp;
		}else{
			return false;
		}
	}

	public function getAllKendaraan(){
		$result = array();
		$queryString="SELECT * FROM mskendaraan";
		$query=$this->db->query($queryString);
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->IDKendaraan = $query->row($i)->IDKendaraan;
				$temp->merkKendaraan = $query->row($i)->merkKendaraan;
				$temp->jenisKendaraan = $query->row($i)->jenisKendaraan;
				$temp->tipeKendaraan = $query->row($i)->tipeKendaraan;
				$temp->noRangkaKendaraan = $query->row($i)->noRangkaKendaraan;
				$temp->noMesinKendaraan = $query->row($i)->noMesinKendaraan;
				$temp->warnaKendaraan = $query->row($i)->warnaKendaraan;
				$temp->tahunKendaraan = $query->row($i)->tahunKendaraan;
				$temp->noPolisiKendaraan = $query->row($i)->noPolisiKendaraan;
				$temp->statusKepemilikanKendaraan = $query->row($i)->statusKepemilikanKendaraan; //BJM, disewakan, ditarik, lunas
				$temp->noStok = $query->row($i)->noStok;
				$temp->tglBeli = $query->row($i)->tglBeli;
				$temp->beliDari = $query->row($i)->beliDari;
				$temp->hargaBeli = $query->row($i)->hargaBeli;
				$temp->IDCaraBayar = $query->row($i)->IDCaraBayar;

				array_push($result, $temp);
			}
		}
		return $result;
	}

	public function getAllKendaraanForSewa(){
		$result = array();
		$queryString="SELECT * FROM mskendaraan WHERE statusKepemilikanKendaraan = 'BJM'";
		$query=$this->db->query($queryString);
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->IDKendaraan = $query->row($i)->IDKendaraan;
				$temp->noPolisiKendaraan = $query->row($i)->noPolisiKendaraan;
				$temp->noStok = $query->row($i)->noStok;

				array_push($result, $temp);
			}
		}
		return $result;
	}

	public function editKendaraan($id,$data){		
		$queryString = "UPDATE mskendaraan SET merkKendaraan=?,jenisKendaraan=?,tipeKendaraan=?,noRangkaKendaraan=?,noMesinKendaraan=?,warnaKendaraan=?,tahunKendaraan=?,noPolisiKendaraan=?,statusKepemilikanKendaraan=?,username=?,noStok=?,tglBeli=?,beliDari=?,hargaBeli=?,IDCaraBayar=? WHERE IDKendaraan=?";		
		$query=$this->db->query($queryString,array($data["merk"],$data["jenis"],$data["tipe"],$data["noRangka"],$data["noMesin"],$data["warna"],$data["tahun"],$data["noPolisi"],$data["statusKepemilikan"],$data["username"],$data["noStok"],$data["tglBeli"],$data["beliDari"],$data["hargaBeli"],$data["IDCaraBayar"],$id));
	}

	public function deleteKendaraanById($IDKendaraan){
		$queryString = "DELETE FROM mskendaraan WHERE IDKendaraan=?";		
		$query=$this->db->query($queryString,array($IDKendaraan));
	}

	public function getAllKendaraanTarik(){
		$result = array();
		$queryString="SELECT * FROM mskendaraan a JOIN trsewa b ON a.IDKendaraan=b.IDKendaraan AND statusKepemilikanKendaraan = 'ditarik' JOIN msnasabah c ON b.IDNasabah=c.IDNasabah JOIN trtarikkendaraan d ON d.noPiutang=b.noPiutang WHERE penebus IS NULL AND tglTebus IS NULL";
		$query=$this->db->query($queryString);
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->IDTarikKendaraan = $query->row($i)->IDTarikKendaraan;
				$temp->IDKendaraan = $query->row($i)->IDKendaraan;
				$temp->tglTarik = $query->row($i)->tglTarik;
				$temp->penarik = $query->row($i)->penarik;
				$temp->noPiutang = $query->row($i)->noPiutang;
				$temp->namaNasabah = $query->row($i)->namaNasabah;
				$temp->merkKendaraan = $query->row($i)->merkKendaraan;
				$temp->jenisKendaraan = $query->row($i)->jenisKendaraan;
				$temp->tipeKendaraan = $query->row($i)->tipeKendaraan;
				$temp->noRangkaKendaraan = $query->row($i)->noRangkaKendaraan;
				$temp->noMesinKendaraan = $query->row($i)->noMesinKendaraan;
				$temp->warnaKendaraan = $query->row($i)->warnaKendaraan;
				$temp->tahunKendaraan = $query->row($i)->tahunKendaraan;
				$temp->noPolisiKendaraan = $query->row($i)->noPolisiKendaraan;
				$temp->statusKepemilikanKendaraan = $query->row($i)->statusKepemilikanKendaraan; //Borobudur, lagi disewa, lunas

				array_push($result, $temp);
			}
		}
		return $result;
	}

	public function getKendaraanForTarikByIDNasabah($IDNasabah)
	{
		$result = array();
		$queryString="SELECT * FROM mskendaraan a JOIN trsewa b ON a.IDKendaraan=b.IDKendaraan AND statusKepemilikanKendaraan <> 'ditarik' JOIN msnasabah c ON b.IDNasabah=c.IDNasabah AND b.IDNasabah=?";
		$query=$this->db->query($queryString, array($IDNasabah));
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				/*$IDKendaraan = (string)$query->row($i)->IDKendaraan;
				$noPolisiKendaraan = (string)$query->row($i)->noPolisiKendaraan;
				$temp->$IDKendaraan = $noPolisiKendaraan;*/
				$temp->IDKendaraan = $query->row($i)->IDKendaraan;
				$temp->noPolisiKendaraan = $query->row($i)->noPolisiKendaraan;

				array_push($result, $temp);
			}
		}
		return $result;
	}

	public function tarikKendaraan($data){
		$queryString="INSERT INTO trtarikkendaraan(noPiutang,tglTarik,penarik,tglTebus,penebus,username) VALUES(?,?,?,NULL,NULL,?)";
		try {
			$query = $this->db->query($queryString,array($data["noPiutang"],$data["tglTarik"],$data["penarik"],$data["username"]));
			//UPDATE STATUS KEPEMILIKAN
			$queryString="UPDATE mskendaraan SET statusKepemilikanKendaraan='ditarik' WHERE IDKendaraan=?";
			try {
				$query = $this->db->query($queryString,array($data["IDKendaraan"]));
			}
			catch(Exception $ex) {
				var_dump($ex);
			}
			return $this->db->insert_id();
		}
		catch(Exception $ex) {
			var_dump($ex);
		}
	}

	public function tebusKendaraan($data)
	{
		$queryString="UPDATE trtarikkendaraan SET tglTebus=?, penebus=?, username=? WHERE IDTarikKendaraan=?";
		try {
			$query = $this->db->query($queryString,array($data["tglTebus"],$data["penebus"],$data["username"],$data["IDTarikKendaraan"]));
			//UPDATE STATUS KEPEMILIKAN
			$queryString="UPDATE mskendaraan SET statusKepemilikanKendaraan='disewakan' WHERE IDKendaraan=?";
			try {
				$query = $this->db->query($queryString,array($data["IDKendaraan"]));
			}
			catch(Exception $ex) {
				var_dump($ex);
			}
			return $this->db->insert_id();
		}
		catch(Exception $ex) {
			var_dump($ex);
		}
	}



}
?>