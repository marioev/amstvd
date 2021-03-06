<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asistencia extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Asistencia_model');
    } 

    /*
     * Listing of asistencia
     */
    function index()
    {
        $data['asistencia'] = $this->Asistencia_model->get_all_asistencia();
        
        $data['_view'] = 'asistencia/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new asistencia
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('asistenca_nombre','Asistenca Nombre','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'reunion_id' => $this->input->post('reunion_id'),
				'asociado_id' => $this->input->post('asociado_id'),
				'asistenca_nombre' => $this->input->post('asistenca_nombre'),
            );
            
            $asistencia_id = $this->Asistencia_model->add_asistencia($params);
            redirect('asistencia/index');
        }
        else
        {
			$this->load->model('Reunion_model');
			$data['all_reunion'] = $this->Reunion_model->get_all_reunion();

			$this->load->model('Asociado_model');
			$data['all_asociado'] = $this->Asociado_model->get_all_asociado();
            
            $data['_view'] = 'asistencia/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a asistencia
     */
    function edit($asistencia_id)
    {   
        // check if the asistencia exists before trying to edit it
        $data['asistencia'] = $this->Asistencia_model->get_asistencia($asistencia_id);
        
        if(isset($data['asistencia']['asistencia_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('asistenca_nombre','Asistenca Nombre','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'reunion_id' => $this->input->post('reunion_id'),
					'asociado_id' => $this->input->post('asociado_id'),
					'asistenca_nombre' => $this->input->post('asistenca_nombre'),
                );

                $this->Asistencia_model->update_asistencia($asistencia_id,$params);            
                redirect('asistencia/index');
            }
            else
            {
				$this->load->model('Reunion_model');
				$data['all_reunion'] = $this->Reunion_model->get_all_reunion();

				$this->load->model('Asociado_model');
				$data['all_asociado'] = $this->Asociado_model->get_all_asociado();

                $data['_view'] = 'asistencia/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The asistencia you are trying to edit does not exist.');
    } 

    /*
     * Deleting asistencia
     */
    function remove($asistencia_id)
    {
        $asistencia = $this->Asistencia_model->get_asistencia($asistencia_id);

        // check if the asistencia exists before trying to delete it
        if(isset($asistencia['asistencia_id']))
        {
            $this->Asistencia_model->delete_asistencia($asistencia_id);
            redirect('asistencia/index');
        }
        else
            show_error('The asistencia you are trying to delete does not exist.');
    }
    
}
