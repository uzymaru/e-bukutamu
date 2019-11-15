<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_dash extends CI_Model {
	private $_table = "guest";
	public function cek_user($username, $password) {
		$this->db->where("email = '$username' or username = '$username'");
		$this->db->where('password', md5($password));
		$query = $this->db->get('user');
		return $query->row_array();
	}
    //untuk mengambil data
    public function getAll()
    {
        $this->db->where('a.status=1');
        $this->db->select("a.id,a.person,a.status,a.id_card,a.tgl,a.nama,a.instansi,a.telp,a.keperluan,a.foto,b.st_antri,b.nama as nama_pegawai,b.id_peg,b.durasi,a.dura");
        $this->db->from('guest a');
        $this->db->join('pegawai b','b.id_peg=a.person');
        $this->db->order_by('a.id','DESC');
        $query = $this->db->get()->result();
        if($this->db->affected_rows()>0) return $query;
        else return false;
    }
    //fungsi update status
    public function update_status(){
        $id = $_REQUEST['sid'];
        $saval = $_REQUEST['sval'];
        if ($saval==1) {
            $status=0;
        }
        else{
            $status=1;
        }
        $data=array('status' => $status);
        $this->db->where('id',$id);
        return $this->db->update('guest',$data);
    }
}
