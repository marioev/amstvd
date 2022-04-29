<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asistencia extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Asistencia_model');
        $this->load->model('Tipo_multa_model');
        $this->load->model('Multa_model');
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
     * Deleting asistencia
     */
    /*function remove($asistencia_id)
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
    }*/
    /*
     * control de asistencia
     */
    function control($reunion_id, $ordendia_id)
    {
        if($this->acceso(16)){
            //$data['all_asistencia'] = $this->Asistencia_model->get_allasistencia($ordendia_id);
            $data['reunion_id'] = $reunion_id;
            $data['ordendia_id'] = $ordendia_id;
            $this->load->model('Orden_dia_model');
            $data['orden_dia'] = $this->Orden_dia_model->get_orden_dia($ordendia_id);
            $this->load->model('Estado_model');
            $tipo = 4;
            $data['all_estado'] = $this->Estado_model->get_all_estadotipo($tipo);

            $data['all_tipomulta'] = $this->Tipo_multa_model->get_all_tipomulta_vigente();

            $data['_view'] = 'asistencia/control';
            $this->load->view('layouts/main',$data);
        }
    }
    /* registra orden del día */
    function registrar_asistencia()
    {
        if($this->acceso(16)){
            if ($this->input->is_ajax_request()){
                $this->load->model('Asociado_model');
                $estado_id  = 1;
                //$fechahora = date("Y-m-d H:i:s");
                $all_asociado = $this->Asociado_model->get_all_asociadosestado($estado_id);
                foreach ($all_asociado as $asociado) {
                    $params = array(
                        'reunion_id' => $this->input->post('reunion_id'),
                        'ordendia_id' => $this->input->post('ordendia_id'),
                        'asociado_id' => $asociado["asociado_id"],
                        'asistencia_estado' => $this->input->post('asistencia_estado'),
                        'asistencia_fecha' => $this->input->post('asistencia_fecha'),
                        'asistencia_hora' => $this->input->post('asistencia_hora'),
                    );
                    $asistencia_id = $this->Asistencia_model->add_asistencia($params);
                }
                echo json_encode("ok");
            }else{
                show_404();
            }
        }
    }
    /* obtiene la asistencia de una reunión */
    function get_asistencia()
    {
        if ($this->input->is_ajax_request()){
            $reunion_id  = $this->input->post('reunion_id');
            $ordendia_id = $this->input->post('ordendia_id');
            $all_asistencia = $this->Asistencia_model->get_allasistencia($ordendia_id);
            echo json_encode($all_asistencia);
        }else{
            show_404();
        }
    }
    /* modificar la asistencia de un asociado */
    function modificar_asistencia()
    {
        if($this->acceso(16)){
            if ($this->input->is_ajax_request()){
                $asistencia_id  = $this->input->post('asistencia_id');
                $params = array(
                    'asistencia_estado' => $this->input->post('laasistencia'),
                );
                $this->Asistencia_model->update_asistencia($asistencia_id,$params);
                echo json_encode("ok");
            }else{
                show_404();
            }
        }
    }
    /* guarda la multa de los que no asistieron a una reunion */
    function guardar_asistenciamulta()
    {
        if($this->acceso(16)){
            if ($this->input->is_ajax_request()){
                $ordendia_id = $this->input->post('ordendia_id');
                $reunion_id = $this->input->post('reunion_id');
                $valormulta  = $this->input->post('valormulta');
                $all_asistencia = $this->Asistencia_model->get_allasistencia($ordendia_id);
                $lafecha = date("Y-m-d");
                $lahora = date("H:i:s");
                $estado_pendiente = 3;
                $estado_cancelado = 4;
                //$all_tipomulta = $this->Tipo_multa_model->get_all_tipomulta_vigente();
                $resdelele = $this->Multa_model->delete_asistenciamulta($reunion_id);
                foreach ($all_asistencia as $asistencia) {
                    if($asistencia["asistencia_estado"] == "RETRASO PAGADO"){
                        $all_multa = $valormulta;
                        foreach($all_multa as $valorm) {
                            if($valorm["nombre"] == "RETRASO A REUNION"){
                                $params = array(
                                    'asistencia_id' => $asistencia['asistencia_id'],
                                    'estado_id' => $estado_cancelado,
                                    'multa_socio' => $asistencia["asociado_apellido"]." ".$asistencia["asociado_nombre"],
                                    'multa_nombrepago' => $asistencia["asistencia_estado"],
                                    'multa_fecha' => $lafecha,
                                    'multa_hora' => $lahora,
                                    'multa_fechapago' => $lafecha,
                                    'multa_horapago' => $lahora,
                                    'multa_monto' => $valorm["lamulta"],
                                    'multa_obs' => "Pago en Reunion",
                                );
                                $multa_id = $this->Multa_model->add_multa($params);
                                break;
                            }
                        }
                    }elseif($asistencia["asistencia_estado"] == "RETRASO SIN PAGAR"){
                        $all_multa = $valormulta;
                        foreach($all_multa as $valorm) {
                            if($valorm["nombre"] == "RETRASO A REUNION"){
                                $params = array(
                                    'asistencia_id' => $asistencia['asistencia_id'],
                                    'estado_id' => $estado_pendiente,
                                    'multa_socio' => $asistencia["asociado_apellido"]." ".$asistencia["asociado_nombre"],
                                    'multa_nombrepago' => $asistencia["asistencia_estado"],
                                    'multa_fecha' => $lafecha,
                                    'multa_hora' => $lahora,
                                    'multa_monto' => $valorm["lamulta"],
                                );
                                $multa_id = $this->Multa_model->add_multa($params);
                                break;
                            }
                        }
                    }elseif($asistencia["asistencia_estado"] == "FALTA"){
                        $all_multa = $valormulta;
                        foreach($all_multa as $valorm) {
                            if($valorm["nombre"] == "FALTA A REUNION"){
                                $params = array(
                                    'asistencia_id' => $asistencia['asistencia_id'],
                                    'estado_id' => $estado_pendiente,
                                    'multa_socio' => $asistencia["asociado_apellido"]." ".$asistencia["asociado_nombre"],
                                    'multa_nombrepago' => $asistencia["asistencia_estado"],
                                    'multa_fecha' => $lafecha,
                                    'multa_hora' => $lahora,
                                    'multa_monto' => $valorm["lamulta"],
                                );
                                $multa_id = $this->Multa_model->add_multa($params);
                                break;
                            }
                        }
                    }
                }
                echo json_encode("ok");
            }else{
                show_404();
            }
        }
    }
}
