<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_bar extends CI_Model {
	private $_table = "guest";
	private $_tabel = "qrcode";
    public $id;
    public $kartu;

    public function rules()
    {
        return [
            ['field' => 'id',
            'label' => 'Id',
            'rules' => 'required'],

            ['field' => 'kartu',
            'label' => 'Kartu',
            'rules' => 'required']
        ];
    }
    //untuk mengambil data
    public function getAll()
    {
        $hasil=$this->db->query("SELECT * FROM qrcode order by id ASC")->result();
        return $hasil;
    }
    //fungsi ambil idcard tamu yang aktif
    public function tamu($id)
    {
        return $this->db->get_where($this->_table, ["id_card" => $id])->row();
    }
    //fungsi simpan/tambah data
    public function save()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->kartu = $post["kartu"];
        $this->db->insert($this->_tabel, $this);
    }
}