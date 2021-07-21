<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pagado extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pagado_model');
        $this->session_data = $this->session->userdata('logged_in');
    } 
    
    /* funcion que registra el pago de aportes */
    function pagar()
    {
        if($this->input->is_ajax_request()){
            $all_parapagar = $this->input->post('parapagar');
            $asociado_id = $this->input->post('asociado_id');
            $usuario_id = $this->session_data['usuario_id'];
            $estado_id = 4; // cancelado
            $fecha = date("Y-m-d");
            $hora  = date("H:i:s");
            
            $gestion_id = $this->session_data['gestion_id'];
            $this->load->model('Gestion_model');
            $gestion = $this->Gestion_model->get_gestion($gestion_id);
            $num_recibo = $gestion["gestion_numingreso"]+1;
            $params = array(
                'asociado_id' => $this->input->post('asociado_id'),
                'usuario_id' => $usuario_id,
                'estado_id' => $estado_id,
                'pagado_numrecibo' => $num_recibo,
                'pagado_quienpaga' => $this->input->post('pagado_quienpaga'),
                'pagado_total' => $this->input->post('pagado_total'),
                'pagado_efectivo' => $this->input->post('pagado_efectivo'),
                'pagado_cambio' => $this->input->post('pagado_cambio'),
                'pagado_fecha' => $fecha,
                'pagado_hora' => $hora,
                'pagado_obs' => $this->input->post('pagado_obs'),
            );
            $pagado_id = $this->Pagado_model->add_pagado($params);
            
            $params = array(
                'gestion_numingreso' => $num_recibo,
            );
            $this->Gestion_model->update_gestion($gestion_id,$params);
            
            $this->load->model('Aporte_asociado_model');
            foreach($all_parapagar as $parapagar) {
                $params = array(
                    'pagado_id' => $pagado_id,
                    'estado_id' => $estado_id,
                    'aporteasoc_cobrado' => $parapagar["aporteasoc_cobrado"],
                );
                
                $this->Aporte_asociado_model->update_aporte_asociado($parapagar["aporteasoc_id"],$params);
            }
            echo json_encode("$pagado_id");
        }else{
            show_404();
        }
    }
    
    /*
     * comprobante de cobro de un asociado
     */
    function recibo_carta($pagado_id)
    {
        $this->load->model('Organizacion_model');
        $organ_id = 1;
        $data['organizacion'] = $this->Organizacion_model->get_organizacion($organ_id);
        
        $this->load->model('Configuracion_model');
        $config_id = 1;
        $data['configuracion'] = $this->Configuracion_model->get_configuracion($config_id);
        
        $this->load->helper('numeros_helper'); // para convertir numeros a letras
        
        $data['pagado'] = $this->Pagado_model->get_pagado($pagado_id);
        $data['aporte_asociado'] = $this->Pagado_model->getall_pagadoasociado($pagado_id);
        
        $data['_view'] = 'pagado/recibo_carta';
        $this->load->view('layouts/main',$data);
    }
}