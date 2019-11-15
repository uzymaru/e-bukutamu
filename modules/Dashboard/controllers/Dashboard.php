<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {
	
	function __construct()
    {
     parent::__construct();
     $this->load->model("M_dash");
     $this->load->library('form_validation');
     $this->load->helper('url');
     $this->load->library('session');
 }

 function index()
 {
    $data["tamu"] = $this->M_dash->getAll();
    $this->load->view('v_dash',$data);
}
//fungsi edit status
public function update_status(){
    if(isset($_REQUEST['sval'])){
        $this->load->model('M_dash','guest');
        $up_status = $this->guest->update_status();

        if($up_status>0){
            $this->session->set_flashdata('success',"Guest Status Updated Successfully");
        } else {
            $this->session->set_flashdata('failed',"Guest Status Not Updated Successfully");
        }
        return redirect('Dashboard');
    }
   }

}

