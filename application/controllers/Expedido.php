<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Expedido extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Expedido_model');
    } 

    /*
     * Listing of expedido
     */
    function index()
    {
        $data['expedido'] = $this->Expedido_model->get_all_expedido();
        
        $data['_view'] = 'expedido/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new expedido
     */
    function add()
    {   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('expedido_nombre','Expedido Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        if($this->form_validation->run())
        {
            $params = array(
                'expedido_nombre' => $this->input->post('expedido_nombre'),
            );
            $expedido_id = $this->Expedido_model->add_expedido($params);
            redirect('expedido');
        }else{
            $data['_view'] = 'expedido/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a expedido
     */
    function edit($expedido_id)
    {   
        // check if the expedido exists before trying to edit it
        $data['expedido'] = $this->Expedido_model->get_expedido($expedido_id);
        if(isset($data['expedido']['expedido_id']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('expedido_nombre','Expedido Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())
            {   
                $params = array(
                    'expedido_nombre' => $this->input->post('expedido_nombre'),
                );

                $this->Expedido_model->update_expedido($expedido_id,$params);            
                redirect('expedido');
            }
            else
            {
                $data['_view'] = 'expedido/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The expedido you are trying to edit does not exist.');
    } 

    /*
     * Deleting expedido
     */
    /*function remove($expedido_id)
    {
        $expedido = $this->Expedido_model->get_expedido($expedido_id);

        // check if the expedido exists before trying to delete it
        if(isset($expedido['expedido_id']))
        {
            $this->Expedido_model->delete_expedido($expedido_id);
            redirect('expedido/index');
        }
        else
            show_error('The expedido you are trying to delete does not exist.');
    }*/
    
}
