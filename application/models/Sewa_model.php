<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa_model extends CI_Model {

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
		$this->load->model('Sewa_model','Sewa');	
	} 


	public function addSewa($data){
		$queryString="INSERT INTO trsewa(noPiutang,IDNasabah,IDKendaraan,HDKSewa,DPSewa,IDJenisAsuransi,asuransiSewa,bungaSewa,masaKreditSewa,angsuranPerBulan,biayaAdmSewa,jatuhTempoAngsuran1,namaSales,tglPernyataanSewa,username) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		try {
			$query = $this->db->query($queryString,array($data["noPiutang"],$data["IDNasabah"],$data["IDKendaraan"],$data["HDKSewa"],$data["DPSewa"],$data["IDJenisAsuransi"],$data["asuransiSewa"],$data["bungaSewa"],$data["masaKreditSewa"],$data["angsuranPerBulan"],$data["biayaAdmSewa"],$data["jatuhTempoAngsuran1"],$data["namaSales"],$data["tglPernyataanSewa"],$data["username"]));

			//add detail sewa
			for ($i=0; $i < $data["masaKreditSewa"]; $i++) { 
				$queryString1="INSERT INTO trdetailsewa(noPiutang,sewaKe,tglJatuhTempo,nominal,denda,statusLunas,username) VALUES(?,?,?,?,?,?,?)";
				try {					
					$addMonth = "+" . $i . " months";
					$tglJatuhTempoBulanan = date('Y-m-d', strtotime($addMonth, strtotime($data["jatuhTempoAngsuran1"])));
					
					$query1 = $this->db->query($queryString1,array($data["noPiutang"],$i+1,$tglJatuhTempoBulanan,$data["angsuranPerBulan"],0,"B",$data["username"]));
					//status lunas : B = Belum lunas ; S = Sebagian ; L = Lunas ;
				}
				catch(Exception $ex) {
					var_dump($ex);
				}

			}
			
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		catch(Exception $ex) {
			var_dump($ex);
		}
	}

	public function getSewaByNoPiutang($noPiutang){
		$queryString="SELECT * FROM trsewa WHERE noPiutang=?";
		$query=$this->db->query($queryString,array($noPiutang));
		
		if($query->num_rows()>0)
		{		
			$temp = new stdClass();
			$i=0;
			
			$temp->noPiutang = $query->row($i)->noPiutang;
			$temp->IDNasabah = $query->row($i)->IDNasabah;
			$temp->IDKendaraan = $query->row($i)->IDKendaraan;
			$temp->HDKSewa = $query->row($i)->HDKSewa;
			$temp->DPSewa = $query->row($i)->DPSewa;
			$temp->IDJenisAsuransi = $query->row($i)->IDJenisAsuransi;
			$temp->asuransiSewa = $query->row($i)->asuransiSewa;
			$temp->bungaSewa = $query->row($i)->bungaSewa;
			$temp->masaKreditSewa = $query->row($i)->masaKreditSewa;
			$temp->angsuranPerBulan = $query->row($i)->angsuranPerBulan;
			$temp->biayaAdmSewa = $query->row($i)->biayaAdmSewa;
			$temp->jatuhTempoAngsuran1 = $query->row($i)->jatuhTempoAngsuran1;
			$temp->namaSales = $query->row($i)->namaSales;
			$temp->tglPernyataanSewa = $query->row($i)->tglPernyataanSewa;
			$temp->username = $query->row($i)->username;

			return $temp;
		}else{
			return false;
		}
	}

	public function getAllSewa(){
		$result = array();
		$queryString="SELECT * FROM trsewa a JOIN (SELECT IDNasabah,namaNasabah FROM msnasabah) b ON a.IDNasabah = b.IDNasabah JOIN (SELECT noPiutang,sewaKe FROM trdetailsewa WHERE statusLunas IN ('B','S') GROUP BY noPiutang ORDER BY sewaKe) c ON a.noPiutang = c.noPiutang ORDER BY tglPernyataanSewa";
		$query=$this->db->query($queryString);
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();			
				$temp->noPiutang = $query->row($i)->noPiutang;
				$temp->kreditTerakhirKe = $query->row($i)->sewaKe;
				$temp->namaNasabah = $query->row($i)->namaNasabah;
				$temp->HDKSewa = $query->row($i)->HDKSewa;
				$temp->DPSewa = $query->row($i)->DPSewa;
				$temp->IDJenisAsuransi = $query->row($i)->IDJenisAsuransi;
				$temp->asuransiSewa = $query->row($i)->asuransiSewa;
				$temp->bungaSewa = $query->row($i)->bungaSewa;
				$temp->masaKreditSewa = $query->row($i)->masaKreditSewa;
				$temp->angsuranPerBulan = $query->row($i)->angsuranPerBulan;
				$temp->biayaAdmSewa = $query->row($i)->biayaAdmSewa;
				$temp->jatuhTempoAngsuran1 = $query->row($i)->jatuhTempoAngsuran1;
				$temp->namaSales = $query->row($i)->namaSales;
				$temp->tglPernyataanSewa = $query->row($i)->tglPernyataanSewa;
				$temp->username = $query->row($i)->username;

				array_push($result, $temp);
			}
		}
		return $result;
	}

	/*public function deleteSewaById($IDSewa){
		$queryString = "DELETE FROM trsewa WHERE IDSewa=?";		
		$query=$this->db->query($queryString,array($IDSewa));
	}*/

	public function getNoPiutangByNasabahNKendaraan($data)
	{		
		$queryString="SELECT * FROM trsewa WHERE IDKendaraan=? AND IDNasabah=?";
		$query=$this->db->query($queryString,array($data['IDKendaraan'],$data['IDNasabah']));
		
		if($query->num_rows()>0)
		{		
			$temp = new stdClass();
			$i=0;
			
			$temp->noPiutang = $query->row($i)->noPiutang;
			$temp->IDNasabah = $query->row($i)->IDNasabah;
			$temp->IDKendaraan = $query->row($i)->IDKendaraan;
			$temp->HDKSewa = $query->row($i)->HDKSewa;
			$temp->DPSewa = $query->row($i)->DPSewa;
			$temp->IDJenisAsuransi = $query->row($i)->IDJenisAsuransi;
			$temp->asuransiSewa = $query->row($i)->asuransiSewa;
			$temp->bungaSewa = $query->row($i)->bungaSewa;
			$temp->masaKreditSewa = $query->row($i)->masaKreditSewa;
			$temp->angsuranPerBulan = $query->row($i)->angsuranPerBulan;
			$temp->biayaAdmSewa = $query->row($i)->biayaAdmSewa;
			$temp->jatuhTempoAngsuran1 = $query->row($i)->jatuhTempoAngsuran1;
			$temp->namaSales = $query->row($i)->namaSales;
			$temp->tglPernyataanSewa = $query->row($i)->tglPernyataanSewa;
			$temp->username = $query->row($i)->username;

			return $temp;
		}else{
			return false;
		}
	}



	/*DETAIL SEWA*/
	public function getDetailSewaByNoPiutang($noPiutang){
		$result = array();
		$queryString="SELECT * FROM trdetailsewa WHERE noPiutang=?";
		$query=$this->db->query($queryString,array($noPiutang));
		
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();			
				$temp->noPiutang = $query->row($i)->noPiutang;
				$temp->sewaKe = $query->row($i)->sewaKe;
				$temp->tglJatuhTempo = $query->row($i)->tglJatuhTempo;
				$temp->nominal = $query->row($i)->nominal;
				$temp->denda = $query->row($i)->denda;
				$temp->statusLunas = $query->row($i)->statusLunas;
				$temp->username = $query->row($i)->username;

				array_push($result, $temp);
			}		

			return $result;
		}else{
			return false;
		}
	}

	public function getListDetailForPayment($data){
		$result = array();

		if($data["noPiutang"] != ""){
			// by no piutang
			$queryString="SELECT noPiutang,sewaKe,tglJatuhTempo,nominal,denda,statusLunas FROM trdetailsewa WHERE noPiutang=? AND statusLunas IN('B','S') ORDER BY tglJatuhTempo";
			$query=$this->db->query($queryString,array($data["noPiutang"]));

			if($query->num_rows()>0)
			{		
				for($i=0;$i<$query->num_rows();$i++)
				{
					$temp = new stdClass();			
					$temp->noPiutang = $query->row($i)->noPiutang;
					$temp->sewaKe = $query->row($i)->sewaKe;
					$temp->tglJatuhTempo = $query->row($i)->tglJatuhTempo;
					$temp->nominal = $query->row($i)->nominal;
					$temp->denda = $query->row($i)->denda;
					$temp->statusLunas = $query->row($i)->statusLunas;

					array_push($result, $temp);
				}		

				return $result;
			}
		}else if($data["noPolisi"] != ""){
			// by no polisi
			$queryString="SELECT noPiutang,sewaKe,tglJatuhTempo,nominal,denda,statusLunas FROM trdetailsewa a JOIN trsewa b ON a.noPiutang=b.noPiutang JOIN mskendaraan c ON b.IDKendaraan=c.IDKendaraan WHERE noPolisiKendaraan=? AND statusLunas IN('B','S') ORDER BY tglJatuhTempo";
			$query=$this->db->query($queryString,array($data["noPolisi"]));

			if($query->num_rows()>0)
			{		
				for($i=0;$i<$query->num_rows();$i++)
				{
					$temp = new stdClass();			
					$temp->noPiutang = $query->row($i)->noPiutang;
					$temp->sewaKe = $query->row($i)->sewaKe;
					$temp->tglJatuhTempo = $query->row($i)->tglJatuhTempo;
					$temp->nominal = $query->row($i)->nominal;
					$temp->denda = $query->row($i)->denda;
					$temp->statusLunas = $query->row($i)->statusLunas;

					array_push($result, $temp);
				}		

				return $result;
			}
		}else{
			// no polisi & no piutang kosong
			return -1;
		}
	}
	
}
?>