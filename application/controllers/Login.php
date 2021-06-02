<?php

Class Login extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Organizacion_model');
    }

    public function index()
    {
        $data = array(
            'msg' => $this->session->flashdata('msg'),
        );
        $organ_id = 1;
        $licencia_id = 1;
        $data['organizacion'] = $this->Organizacion_model->get_organizacion($organ_id);
        $licencia = $this->Organizacion_model->get_diaslicencia($licencia_id);
    	/*$licencia="SELECT DATEDIFF(licencia_fechalimite, CURDATE()) as dias FROM licencia WHERE licencia_id = 1";
        $lice = $this->db->query($licencia)->row_array();
        */
        
        //print_r($data['organizacion']);
        //echo $data['organizacion']['organ_slogan']."ererererer";
        if ($licencia['dias']<=10) {
            $data['diaslicencia'] = $licencia['dias'];
            $this->load->view('login/inicio',$data);
    	} else{
            $data['diaslicencia'] = 5000;
            $this->load->view('login/inicio',$data);	
    	}
    }
    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('', 'refresh');
    }
    public function mensajeacceso(){
        redirect('login/mensajeacceso');
    }
}

