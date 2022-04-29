<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Reunion extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reunion_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }
    /*
     * Listing of reunion
     */
    function index()
    {
        if($this->acceso(8)){
            $data['estagestion_id'] = $this->session_data['gestion_id'];
            $this->load->model('Gestion_model');
            $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

            $this->load->model('Tipo_reunion_model');
            $data['all_tipo_reunion'] = $this->Tipo_reunion_model->get_all_tipo_reunion();

            $data['_view'] = 'reunion/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new reunion
     */
    function add()
    {
        if($this->acceso(9)){
            if(isset($_POST) && count($_POST) > 0)     
            {
                $estado_id = 6; // 6 = EN REUNION
                $params = array(
                    'tiporeunion_id' => $this->input->post('tiporeunion_id'),
                    'estado_id' => $estado_id,
                    'gestion_id' => $this->input->post('gestion_id'),
                    'reunion_fecha' => $this->input->post('reunion_fecha'),
                    'reunion_inicio' => $this->input->post('reunion_inicio'),
                    //'reunion_fin' => $this->input->post('reunion_fin'),
                    'reunion_tolerancia' => $this->input->post('reunion_tolerancia'),
                );
                $reunion_id = $this->Reunion_model->add_reunion($params);
                redirect('reunion');
            }else{
                $this->load->model('Tipo_reunion_model');
                $data['all_tipo_reunion'] = $this->Tipo_reunion_model->get_all_tipo_reunion();

                $this->load->model('Gestion_model');
                $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                $data['_view'] = 'reunion/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a reunion
     */
    function edit($reunion_id)
    {
        if($this->acceso(10)){
            // check if the reunion exists before trying to edit it
            $data['reunion'] = $this->Reunion_model->get_reunion($reunion_id);

            if(isset($data['reunion']['reunion_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {
                    $params = array(
                        'tiporeunion_id' => $this->input->post('tiporeunion_id'),
                        'estado_id' => $this->input->post('estado_id'),
                        'gestion_id' => $this->input->post('gestion_id'),
                        'reunion_fecha' => $this->input->post('reunion_fecha'),
                        'reunion_inicio' => $this->input->post('reunion_inicio'),
                        'reunion_fin' => $this->input->post('reunion_fin'),
                        'reunion_tolerancia' => $this->input->post('reunion_tolerancia'),
                    );

                    $this->Reunion_model->update_reunion($reunion_id,$params);            
                    redirect('reunion');
                }else{
                    $this->load->model('Tipo_reunion_model');
                    $data['all_tipo_reunion'] = $this->Tipo_reunion_model->get_all_tipo_reunion();

                    $this->load->model('Estado_model');
                    $tipo = 3; // 1 = EN REUNION; CONCLUIDO
                    $data['all_estado'] = $this->Estado_model->get_all_estadotipo($tipo);

                    $this->load->model('Gestion_model');
                    $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                    $data['_view'] = 'reunion/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The reunion you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting reunion
     */
    /*function remove($reunion_id)
    {
        $reunion = $this->Reunion_model->get_reunion($reunion_id);

        // check if the reunion exists before trying to delete it
        if(isset($reunion['reunion_id']))
        {
            $this->Reunion_model->delete_reunion($reunion_id);
            redirect('reunion/index');
        }
        else
            show_error('The reunion you are trying to delete does not exist.');
    }*/
    
    /* * busca reuniones en index */
    function buscar_reunion()
    {
        if($this->acceso(8)){
            if ($this->input->is_ajax_request()) {
                $filtro     = $this->input->post('filtro');
                $gestion_id = $this->input->post('gestion_id');
                $tiporeunion_id = $this->input->post('tiporeunion_id');
                $datos = $this->Reunion_model->get_las_reunion($filtro, $gestion_id, $tiporeunion_id);
                echo json_encode($datos);
            }
            else
            {                 
                show_404();
            }
        }
    }
    /* * Finalizar una reunion */
    function finalizar_reunion()
    {
        if($this->acceso(8)){
            if ($this->input->is_ajax_request()) {
                $reunion_id = $this->input->post('reunion_id');
                $reunion_fin = date("H:i:s");
                $estado_id = 7; //Concluido
                $params = array(
                    'estado_id' => $estado_id,
                    'reunion_fin' => $reunion_fin,
                );
                $this->Reunion_model->update_reunion($reunion_id,$params);
                echo json_encode("ok");
            }
            else
            {                 
                show_404();
            }
        }
    }
}
