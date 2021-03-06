<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Configuracion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Configuracion_model');
    } 
    
    /*
     * Listing of configuracions
     */
    function index()
    {
        $config_id = 1;
        $data['configuracion'] = $this->Configuracion_model->get_configuracion($config_id);
        $data['_view'] = 'configuracion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new configuracion
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)     
        {
            $params = array(
                'config_apikey' => $this->input->post('config_apikey'),
            );
            $config_id = $this->Configuracion_model->add_configuracion($params);
            redirect('configuracion');
        }
        else
        {
            $data['_view'] = 'configuracion/add';
            $this->load->view('layouts/main',$data);
        } 
    } 

    /*
     * Editing a configuracion
     */
    function edit($config_id)
    {
        // check if the configuracion exists before trying to edit it
        $data['configuracion'] = $this->Configuracion_model->get_configuracion($config_id);
        if(isset($data['configuracion']['config_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {
                $params = array(
                    'config_apikey' => $this->input->post('config_apikey'),
                );
                $this->Configuracion_model->update_configuracion($config_id,$params);            
                redirect('configuracion');
            }
            else
            {
                $data['_view'] = 'configuracion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('La configuracion que intenta modificar no existe!.');
    }
    
}
