<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_model extends CI_Model
{
    private $_table = "guest";

    public $id;
    public $id_card;
    public $tgl;
    public $nama;
    public $instansi;
    public $telp;
    public $person;
    public $keperluan;
    public $foto = "default.jpg";
//fungsi validasi
    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'instansi',
            'label' => 'Instansi',
            'rules' => 'required'],

            ['field' => 'telp',
            'label' => 'Telpon',
            'rules' => 'numeric'],

            ['field' => 'person',
            'label' => 'Person',
            'rules' => 'required'],

            ['field' => 'dura',
            'label' => 'Durasi/Lama bertemu',
            'rules' => 'numeric'],

            ['field' => 'keperluan',
            'label' => 'Keperluan',
            'rules' => 'required']
        ];
    }
//fungsi tampil data
    public function getAll()
    {
        $this->db->select("a.id,a.person,a.status,a.id_card,a.tgl,a.nama,a.instansi,a.telp,a.keperluan,a.foto,b.st_antri,b.nama as nama_pegawai,b.id_peg,b.durasi,a.dura");
        $this->db->from('guest a');
        $this->db->join('pegawai b','b.id_peg=a.person');
        $this->db->order_by('a.id','DESC');
        $query = $this->db->get()->result();
        if($this->db->affected_rows()>0) return $query;
        else return false;
    }
//fungsi untuk mengambil data berdasarkan id
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    //fungsi untuk mengambil data berdasarkan id
    public function getPegawai()
    {
        return $this->db->query('select * from pegawai order by id_peg asc')->result();
    }

//fungsi simpan/tambah data
    public function save()
    {
        $nama_file = 'fau_'.time().'.jpg';

        $date = Date("Y-m-d H:i:s", time()+60*60*6);
        $post = $this->input->post();
        $this->id_card = $post["id_card"];
        $this->tgl = $date;
        $this->nama = $post["nama"];
        $this->instansi = $post["instansi"];
        $this->telp = $post["telp"];
        $this->person = $post["person"];
        $this->keperluan = $post["keperluan"];
        $this->foto = $nama_file;
        // if (!empty(glob(FCPATH."upload/guest/$nama_file"))) {

        //     $filename = $this->input->post("old_image");
        //     unlink("upload/guest/$filename");
        //     $this->foto = $nama_file;

        // } else  {
        //     $this->foto = 'default.jpg';     
        // }
        $this->dura = $post["dura"];
        //$this->saveImageToDatabase();
        $this->db->insert($this->_table, $this);
    }


// fungsi edit/update
    public function update($id=null)
    {
        $nama_file = 'fau_'.time().'.jpg';
        $direktori = 'upload/guest/';
        $target = $direktori.$nama_file;
        $date = Date("Y-m-d H:i:s", time()+60*60*6);
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->id_card = $post["id_card"];
        $this->tgl = $date;
        $this->nama = $post["nama"];
        $this->instansi = $post["instansi"];
        $this->telp = $post["telp"];
        $this->person = $post["person"];
        $this->keperluan = $post["keperluan"];
        
        // $this->foto = $nama_file;
        /*if (!empty(glob(FCPATH."upload/guest/$nama_file"))) {

            $filename = $this->input->post("old_image");
            unlink("upload/guest/$filename");
            $this->foto = $nama_file;

        } else  {
            $this->foto = $post["old_image"];     
        }*/
        if (!empty($_FILES["foto"]["name"])) {
            $this->foto = $this->_uploadImage();
        } else {
            $this->foto = $post["old_image"];
        }

        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array('id' => $id));
    }

    //fungsi pengambilan data pegawai untuk select
    function getUsers($searchTerm=""){
        $this->db->select('id_peg,nama,status,durasi');
        $this->db->where("nama like '%".$searchTerm."%' and status='1'");
        $fetched_records = $this->db->get('pegawai');
        $users = $fetched_records->result_array();

     // Initialize Array with fetched data
        $data = array();
        foreach($users as $user){
            if ($user['durasi']==0) {
                $data[] = array("id"=>$user['id_peg'], "text"=>$user['nama']);
            } else{
                $data[] = array("id"=>$user['id_peg'], "text"=>$user['nama'].' Antri '.$user['durasi'].' Menit');    
            }
            
        }
        return $data;
    }

//fungsi pengambilan data idcard untuk select
    function getIdcard($idcard=""){

     // Fetch users
     $this->db->select('*');
     $this->db->where("id like '%".$idcard."%' and status='1'");
     $fetched_records = $this->db->get('qrcode');
     $users = $fetched_records->result_array();

     // Initialize Array with fetched data
     $data = array();
     foreach($users as $user){
        $data[] = array("id"=>$user['id'], "text"=>$user['id']);
    }
    return $data;
}

//fungsi upload image (belum fix)
private function _uploadImage()
{
    $config['upload_path']          = './upload/guest/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = 'fau_'.time().'.jpg';
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}
//fungsi hapus image
private function _deleteImage($id)
{
    $guest = $this->getById($id);
    if ($guest->foto != "default.jpg") {
        $filename = explode(".", $guest->foto)[0];
        return array_map('unlink', glob(FCPATH."upload/guest/$filename.*"));
    }
}
//fungsi update status
public function update_status(){
    $id = $_REQUEST['sid'];
    $saval = $_REQUEST['sval'];
    if ($saval==1) {
        $status2=2;
    }
    else if($saval==2){
        $status2=1;
    }
    $data=array('status' => $status2);
    $this->db->where('id',$id);
    return $this->db->update('guest',$data);
}
}