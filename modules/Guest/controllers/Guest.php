<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("guest_model");
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');
    }
    //fungsi untuk load data dan view index
    public function index()
    {
        $data["tamu"] = $this->guest_model->getAll();
        $this->load->view("list", $data);
    }

    //fungsi untuk load data dan view list
    public function pegawai()
    {
        $data["pegawai"] = $this->guest_model->getPegawai();
        $this->load->view("pegawai", $data);
    }
    //fungsi tambah
    public function add()
    {
        /*move_uploaded_file($_FILES['webcam']['tmp_name'], $target);*/

        $guest = $this->guest_model;
        $validation = $this->form_validation;
        $validation->set_rules($guest->rules());

        if ($validation->run()) {
            
            $guest->save();
            redirect('guest');
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view("new_form");
    }
    //fungsi edit
    public function edit($id = null)
    {
        if (!isset($id)) redirect('guest');

        $guest = $this->guest_model;
        $validation = $this->form_validation;
        $validation->set_rules($guest->rules());

        if ($validation->run()) {
            $guest->update();
            redirect('guest');
            $this->session->set_flashdata('success',"Berhasil DiUpdate");
        }

        $data["guest"] = $guest->getById($id);
        // if (!$data["guest"]) show_404();
        
        $this->load->view("edit_form", $data);
    }
    //fungsi delete
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->guest_model->delete($id)) {
            redirect(site_url('guest'));
        }
    }
    //fungsi pengambilan data pegawai untuk select
    public function getUsers(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      // Get users
      $response = $this->guest_model->getUsers($searchTerm);
      echo json_encode($response);
  }

  public function getIdcard(){

      // Search term
      $idcard = $this->input->post('idcard');
      // Get users
      $response1 = $this->guest_model->getIdcard($idcard);
      echo json_encode($response1);
  }

   //fungsi untuk live edit status
  public function update_status(){
    if(isset($_REQUEST['sval'])){
        $this->load->model('guest_model','guest');
        $up_status = $this->guest->update_status();

        if($up_status>0){
            $this->session->set_flashdata('success',"Guest Status Updated Successfully");
        } else {
            $this->session->set_flashdata('failed',"Guest Status Not Updated Successfully");
        }
        return redirect('guest');
    }
}

public function upload(){
    $nama_file = 'fau_'.time().'.jpg';
    $direktori = 'upload/guest/';
    $target = $direktori.$nama_file;

    move_uploaded_file($_FILES['webcam']['tmp_name'], $target);
}

}