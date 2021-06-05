<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah_model extends CI_Model {

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
	} 
	
	public function addNasabah($data){
		$queryString="INSERT INTO msnasabah(namaNasabah,alamat,tglLahir,noTelp,email,IDAgama,noKTP,username) VALUES(?,?,?,?,?,?,?,?)";
		try {
			$query = $this->db->query($queryString,array($data["nama"],$data["alamat"],$data["tglLahir"],$data["noTelp"],$data["email"],$data["IDAgama"],$data["noKTP"],$data["username"]));
			return $this->db->insert_id();
		}
		catch(Exception $ex) {
			var_dump($ex);
			
			//should write log file
		}
	}

	public function getNasabahById($IDNasabah){
		$queryString="SELECT * FROM msnasabah WHERE IDNasabah=?";
		$query=$this->db->query($queryString,array($IDNasabah));
		
		if($query->num_rows()>0)
		{		
			$temp = new stdClass();
			$i=0;
			
			$temp->IDNasabah = $query->row($i)->IDNasabah;
			$temp->nama = $query->row($i)->namaNasabah;
			$temp->alamat = $query->row($i)->alamat;
			$temp->tglLahir = $query->row($i)->tglLahir;
			$temp->noTelp = $query->row($i)->noTelp;
			$temp->email = $query->row($i)->email;
			$temp->IDAgama = $query->row($i)->IDAgama;
			$temp->noKTP = $query->row($i)->noKTP;

			return $temp;
		}else{
			return false;
		}
	}

	public function getAllNasabah(){
		$result = array();
		$queryString="SELECT * FROM msnasabah a LEFT JOIN ltagama b ON a.IDAgama = b.IDAgama";
		$query=$this->db->query($queryString);
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->IDNasabah = $query->row($i)->IDNasabah;
				$temp->nama = $query->row($i)->namaNasabah;
				$temp->alamat = $query->row($i)->alamat;
				$temp->tglLahir = $query->row($i)->tglLahir;
				$temp->noTelp = $query->row($i)->noTelp;
				$temp->email = $query->row($i)->email;
				$temp->namaAgama = $query->row($i)->namaAgama;
				$temp->noKTP = $query->row($i)->noKTP;

				array_push($result, $temp);
			}
		}
		return $result;
	}

	public function editNasabah($id,$data){		
		$queryString = "UPDATE msnasabah SET namaNasabah=?,alamat=?,tglLahir=?,noTelp=?,email=?,IDAgama=?,noKTP=?,username=? WHERE IDNasabah=?";		
		$query=$this->db->query($queryString,array($data["nama"],$data["alamat"],$data["tglLahir"],$data["noTelp"],$data["email"],$data["IDAgama"],$data["noKTP"],$data["username"],$id));
	}

	public function deleteNasabahById($IDNasabah){
		$queryString = "DELETE FROM msnasabah WHERE IDNasabah=?";		
		$query=$this->db->query($queryString,array($IDNasabah));
	}

	public function checkNasabahHasTrans($IDNasabah){
		$queryString = "SELECT * FROM trsewa WHERE IDNasabah=?";		
		$query=$this->db->query($queryString,array($IDNasabah));	
		if($query->num_rows()>0){
			return True;
		}else{
			return False;
		}
	}

	public function getAllNasabahByName($data){
		$result = array();
		$queryString="SELECT * FROM msnasabah a LEFT JOIN ltagama b ON a.IDAgama = b.IDAgama WHERE namaNasabah LIKE '%".$data['nama']."%'";
		$query=$this->db->query($queryString,array($data['nama']));
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->IDNasabah = $query->row($i)->IDNasabah;
				$temp->nama = $query->row($i)->namaNasabah;
				$temp->alamat = $query->row($i)->alamat;
				$temp->tglLahir = $query->row($i)->tglLahir;
				$temp->noTelp = $query->row($i)->noTelp;
				$temp->email = $query->row($i)->email;
				$temp->namaAgama = $query->row($i)->namaAgama;
				$temp->noKTP = $query->row($i)->noKTP;

				array_push($result, $temp);
			}
		}
		//die();
		return $result;		
	}

	public function getAllNasabahForTarik()
	{
		$result = array();
		$queryString="SELECT a.IDNasabah,namaNasabah FROM msnasabah a JOIN (SELECT DISTINCT IDNasabah FROM trsewa c JOIN trdetailsewa d ON c.noPiutang=d.noPiutang AND d.statusLunas IN ('B','S')) b ON a.IDNasabah = b.IDNasabah";
		$query=$this->db->query($queryString);
		if($query->num_rows()>0)
		{		
			for($i=0;$i<$query->num_rows();$i++)
			{
				$temp = new stdClass();				
				$temp->IDNasabah = $query->row($i)->IDNasabah;
				$temp->nama = $query->row($i)->namaNasabah;

				array_push($result, $temp);
			}
		}
		//die();
		return $result;	
	}

}
?>