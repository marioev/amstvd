<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asociado extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Asociado_model');
    } 

    /*
     * Listing of asociado
     */
    function index()
    {
        //$data['asociado'] = $this->Asociado_model->get_all_asociado();
        $data['_view'] = 'asociado/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new asociado
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('asociado_apellido','Apellido','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        $this->form_validation->set_rules('asociado_nombre','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        $this->form_validation->set_rules('asociado_ci','C.I.','trim|required|is_unique[asociado.asociado_ci]', array('required' => 'Este Campo no debe ser vacio', 'is_unique' => 'este usuario ya existe.'));
        $this->form_validation->set_rules('asociado_login','usuario','trim|required|is_unique[asociado.asociado_login]', array('required' => 'Este Campo no debe ser vacio', 'is_unique' => 'este usuario ya existe.'));
        $this->form_validation->set_rules('asociado_clave','Contraseña','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        //$this->form_validation->set_rules('usuario_login', 'usuario_login', 'required|is_unique[usuario.usuario_login]', array('is_unique' => 'Este login de usuario ya existe.'));
        if($this->form_validation->run())
        {
            /* *********************INICIO imagen***************************** */
            $foto="";
            if (!empty($_FILES['asociado_foto']['name'])){
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/asociados/';
                        $img_full_path = $config['upload_path'];

                        $config['allowed_types'] = 'gif|jpeg|jpg|png|bmp';
                        $config['image_library'] = 'gd2';
                        $config['max_size'] = 0;
                        $config['max_width'] = 0;
                        $config['max_height'] = 0;
                        
                        $new_name = time(); //str_replace(" ", "_", $this->input->post('asociado_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('asociado_foto');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif" || $img_data['file_ext'] == ".bmp") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/asociados/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }
                        }
                        /* ********************F I N  para resize***************************** */
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/asociados/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/asociados/'."thumb_".$new_name.$extension;
                        $confi['create_thumb'] = FALSE;
                        $confi['maintain_ratio'] = TRUE;
                        $confi['width'] = 100;
                        $confi['height'] = 100;

                        $this->image_lib->clear();
                        $this->image_lib->initialize($confi);
                        $this->image_lib->resize();

                        $foto = $new_name.$extension;
                    }
            /* *********************FIN imagen***************************** */
            $estado_id = 1; // ACTIVO
            $fecha_activacion = date("Y-m-d H:i:s");
            $params = array(
                'estado_id' => $estado_id,
                'estadocivil_id' => $this->input->post('estadocivil_id'),
                'expedido_id' => $this->input->post('expedido_id'),
                'genero_id' => $this->input->post('genero_id'),
                'asociado_nombre' => $this->input->post('asociado_nombre'),
                'asociado_apellido' => $this->input->post('asociado_apellido'),
                'asociado_fechanac' => $this->input->post('asociado_fechanac'),
                'asociado_ci' => $this->input->post('asociado_ci'),
                //'asociado_ciext' => $this->input->post('asociado_ciext'),
                'asociado_codigo' => $this->input->post('asociado_codigo'),
                'asociado_direccion' => $this->input->post('asociado_direccion'),
                'asociado_telefono' => $this->input->post('asociado_telefono'),
                'asociado_celular' => $this->input->post('asociado_celular'),
                'asociado_foto' => $foto,
                'asociado_email' => $this->input->post('asociado_email'),
                'asociado_login' => $this->input->post('asociado_login'),
                'asociado_clave' => md5($this->input->post('asociado_clave')),
                //'asocadio_codactivacion' => $this->input->post('asocadio_codactivacion'),
                'asociado_fechactivacion' => $fecha_activacion,
            );
            $asociado_id = $this->Asociado_model->add_asociado($params);
            redirect('asociado');
        }else{
            $this->load->model('Estado_model');
            $data['all_estado'] = $this->Estado_model->get_all_estado();

            $this->load->model('Estado_civil_model');
            $data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();

            $this->load->model('Expedido_model');
            $data['all_expedido'] = $this->Expedido_model->get_all_expedido();

            $this->load->model('Genero_model');
            $data['all_genero'] = $this->Genero_model->get_all_genero();
            
            $data['_view'] = 'asociado/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a asociado
     */
    function edit($asociado_id)
    {   
        // check if the asociado exists before trying to edit it
        $data['asociado'] = $this->Asociado_model->get_asociado($asociado_id);
        if(isset($data['asociado']['asociado_id']))
        {
            if ($this->input->post('asociado_ci') != $data['asociado']['asociado_ci']) {
            $is_unique = '|is_unique[asociado.asociado_ci]';
            } else {
                $is_unique = '';
            }
            if ($this->input->post('asociado_login') != $data['asociado']['asociado_login']) {
                $is_uniquelog = '|is_unique[asociado.asociado_login]';
            } else {
                $is_uniquelog = '';
            }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('asociado_apellido','Apellido','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('asociado_nombre','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('asociado_ci','C.I.','trim|required'.$is_unique, array('required' => 'Este Campo no debe ser vacio', 'is_unique' => 'este usuario ya existe.'));
            $this->form_validation->set_rules('asociado_login','usuario','trim|required'.$is_uniquelog, array('required' => 'Este Campo no debe ser vacio', 'is_unique' => 'este usuario ya existe.'));
            //$this->form_validation->set_rules('asociado_clave','Contraseña','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())
            {
                /* *********************INICIO imagen***************************** */
                $foto="";
                    $foto1= $this->input->post('asociado_foto1');
                if (!empty($_FILES['asociado_foto']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/asociados/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png|bmp';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('asociado_foto');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif" || $img_data['file_ext'] == ".bmp") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/asociados/';
                        $conf['maintain_ratio'] = TRUE;
                        $conf['create_thumb'] = FALSE;
                        $conf['width'] = 800;
                        $conf['height'] = 600;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                    }
                    /* ********************F I N  para resize***************************** */
                    //$directorio = base_url().'resources/imagenes/';
                    $base_url = explode('/', base_url());
                    //$directorio = FCPATH.'resources\images\productos\\';
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/'.$base_url[3].'/resources/images/asociados/';
                    //$directorio = $_SERVER['DOCUMENT_ROOT'].'/amstvd/resources/images/asociados/';
                    if(isset($foto1) && !empty($foto1)){
                      if(file_exists($directorio.$foto1)){
                          unlink($directorio.$foto1);
                          //$mimagenthumb = str_replace(".", "_thumb.", $foto1);
                          $mimagenthumb = "thumb_".$foto1;
                          if(file_exists($directorio.$mimagenthumb)){
                              unlink($directorio.$mimagenthumb);
                          }
                      }
                  }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/asociados/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/asociados/'."thumb_".$new_name.$extension;
                    $confi['create_thumb'] = FALSE;
                    $confi['maintain_ratio'] = TRUE;
                    $confi['width'] = 100;
                    $confi['height'] = 100;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($confi);
                    $this->image_lib->resize();

                    $foto = $new_name.$extension;
                }else{
                    $foto = $foto1;
                }
            /* *********************FIN imagen***************************** */
                $params = array(
                    'estado_id' => $this->input->post('estado_id'),
                    'estadocivil_id' => $this->input->post('estadocivil_id'),
                    'expedido_id' => $this->input->post('expedido_id'),
                    'genero_id' => $this->input->post('genero_id'),
                    'asociado_nombre' => $this->input->post('asociado_nombre'),
                    'asociado_apellido' => $this->input->post('asociado_apellido'),
                    'asociado_fechanac' => $this->input->post('asociado_fechanac'),
                    'asociado_ci' => $this->input->post('asociado_ci'),
                    //'asociado_ciext' => $this->input->post('asociado_ciext'),
                    'asociado_codigo' => $this->input->post('asociado_codigo'),
                    'asociado_direccion' => $this->input->post('asociado_direccion'),
                    'asociado_telefono' => $this->input->post('asociado_telefono'),
                    'asociado_celular' => $this->input->post('asociado_celular'),
                    'asociado_foto' => $foto,
                    'asociado_email' => $this->input->post('asociado_email'),
                    'asociado_login' => $this->input->post('asociado_login'),
                    //'asociado_clave' => $this->input->post('asociado_clave'),
                    //'asocadio_codactivacion' => $this->input->post('asocadio_codactivacion'),
                    //'asociado_fechactivacion' => $this->input->post('asociado_fechactivacion'),
                );
                $this->Asociado_model->update_asociado($asociado_id,$params);            
                redirect('asociado');
            }else{
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $this->load->model('Estado_civil_model');
                $data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();

                $this->load->model('Expedido_model');
                $data['all_expedido'] = $this->Expedido_model->get_all_expedido();

                $this->load->model('Genero_model');
                $data['all_genero'] = $this->Genero_model->get_all_genero();

                $data['_view'] = 'asociado/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El asociado que intentas modificar no existe.');
    } 

    /*
     * Deleting asociado
     */
    /*function remove($asociado_id)
    {
        $asociado = $this->Asociado_model->get_asociado($asociado_id);

        // check if the asociado exists before trying to delete it
        if(isset($asociado['asociado_id']))
        {
            $this->Asociado_model->delete_asociado($asociado_id);
            redirect('asociado/index');
        }
        else
            show_error('The asociado you are trying to delete does not exist.');
    }
    */
    /* funcion que busca asociados */
    function buscar_asociados()
    {
        if($this->input->is_ajax_request()){
            $filtro = $this->input->post('filtro');
            $res_asociados = $this->Asociado_model->get_all_asociado($filtro);
            echo json_encode($res_asociados);
        }else{
            show_404();
        }
    }
    /* funcion que da de baja a un asociado*/
    function dardebaja_asociado()
    {
        if($this->input->is_ajax_request()){
            $asociado_id = $this->input->post('asociado_id');
            $estado_id = 2;
            $params = array(
                    'estado_id' => $estado_id,
                );
            $this->Asociado_model->update_asociado($asociado_id, $params);
            echo json_encode("ok");
        }else{
            show_404();
        }
    }
    /* funcion que da de alta a un asociado*/
    function dardealta_asociado()
    {
        if($this->input->is_ajax_request()){
            $asociado_id = $this->input->post('asociado_id');
            $estado_id = 1;
            $params = array(
                    'estado_id' => $estado_id,
                );
            $this->Asociado_model->update_asociado($asociado_id, $params);
            echo json_encode("ok");
        }else{
            show_404();
        }
    }
    /** funcion que restablece acceso al sistema de un asociado
     *  ci por defecto!....   */
    function restablecer_asociado()
    {
        if($this->input->is_ajax_request()){
            $asociado_id = $this->input->post('asociado_id');
            $asociado_ci = $this->input->post('asociado_ci');
            $params = array(
                'asociado_login' => $asociado_ci,
                'asociado_clave' => md5($asociado_ci),
                );
            $this->Asociado_model->update_asociado($asociado_id, $params);
            echo json_encode("ok");
        }else{
            show_404();
        }
    }
    
    /* funcion que busca asociados activos */
    function buscar_asociadosactivos()
    {
        if($this->input->is_ajax_request()){
            $filtro = $this->input->post('filtro');
            $res_asociados = $this->Asociado_model->get_all_asociadoactivos($filtro);
            echo json_encode($res_asociados);
        }else{
            show_404();
        }
    }
}
