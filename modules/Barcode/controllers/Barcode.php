<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends MX_Controller {
	
	function __construct()
    {
     parent::__construct();
     $this->load->model("M_bar");
     $this->load->library('form_validation');
     $this->load->helper('url');
     $this->load->library('session');
 }

 function index()
 {
    $data["bar"] = $this->M_bar->getAll();
    $this->load->view('v_bar',$data);
}
function getdata($id=null){
    $guest = $this->M_bar;
    $data["guest"] = $guest->getById($id);
        // if (!$data["guest"]) show_404();

    $this->load->view("edit_form", $data);

}

function _code($id=null)
{

     $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './upload/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name=$id.'.png'; //buat name dari qr code sesuai dengan id

        $params['data'] ="http://localhost/magang/projek1/barcode/tamu/".$id; //data yang akan di jadikan QR CODE diskominfo/tamu/cek/1
        $params['level'] = 'H'; //H=High
        $params['size'] = 9;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }

    public function generate()
    {
        $qrcode2 = $this->M_bar;
        $data = array ('success' => false, 'messages'=> array());       
        $valid = $this->form_validation;

        $valid->set_rules('id','id','trim|required');                                  
        $valid->set_error_delimiters('<p class="text-danger">', '</p>');
        if($valid->run() == FALSE)
        {
          foreach($_POST as $key => $value) 
          {
              $data['messages'][$key] = form_error($key);
          }               
          
      }
      else
      {
        $code=$this->input->post('id');              
        $img = $code.'.png';
        $qrcode = $this->_code($code);
        $data['info'] = "<img src=".base_url('upload/qrcode/'.$img)." class='rounded mx-auto d-block'>";
        $data['success'] = true;  
        $qrcode2->save();
        $data['redirect'] = base_url('barcode');
        $this->session->set_flashdata('success', 'Berhasil disimpan'); 

    }
    echo json_encode($data);        

}

public function tamu($id = null)
{
    $guest = $this->M_bar;
    $data["guest"] = $guest->tamu($id);
    if (!empty($data["guest"])) {
        $this->load->view("form_tamu", $data);
    } else {
        $this->load->view("form_kosong", $data);
    }

}

    //fungsi tambah
public function add()
{
    $qrcode = $this->M_bar;
    $validation = $this->form_validation;
    $validation->set_rules($qrcode->rules());

    if ($validation->run()) {
        $qrcode->save();
        redirect('barcode');
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    $this->load->view("form_baru");
}

    //fungsi edit
// public function edit($id = null)
// {
//     if (!isset($id)) redirect('barcode');

//     $qrcode = $this->M_code;
//     $validation = $this->form_validation;
//     $validation->set_rules($qrcode->rules());

//     if ($validation->run()) {

//         $qrcode->update();
//         redirect('barcode');
//         $this->session->set_flashdata('success', 'Berhasil disimpan');
//     }

//     $data["qrcode"] = $qrcode->getById($id);
//         // if (!$data["qrcode"]) show_404();

//     $this->load->view("edit_form", $data);
// }
    //fungsi delete
// public function delete($id=null)
// {
//     if (!isset($id)) show_404();

//     if ($this->M_code->delete($id)) {
//         redirect(site_url('barcode'));
//     }
// }

}

