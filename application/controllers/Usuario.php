<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Usuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }
    
    /*
     * Listing of usuario
     */
    function index()
    {
        $data['mensaje'] = "BORRAR";
        $data['page_title'] = "Usuarios";
        /*
        $data['usuario'] = $this->Usuario_model->get_all_usuario();
        */
        $data['_view'] = 'usuario/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new usuario
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario_nombre', 'Usuario Nombre', 'required');
        //$this->form_validation->set_rules('usuario_email', 'Email', 'trim|required|valid_email|min_length[5]|max_length[250]|callback_hay_email2');//OJO
        $this->form_validation->set_message('hay_email2', 'El email ya se registro, escriba uno diferente');
        $this->form_validation->set_rules('usuario_login', 'usuario_login', 'required|is_unique[usuario.usuario_login]',
        array('is_unique' => 'Este login de usuario ya existe.'));
        if ($this->form_validation->run()) {
        /* *********************INICIO imagen***************************** */
            $foto="";
            if (!empty($_FILES['usuario_imagen']['name'])){
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/usuarios/';
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
                        $this->upload->do_upload('usuario_imagen');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif" || $img_data['file_ext'] == ".bmp") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/usuarios/';
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
                        $confi['source_image'] = './resources/images/usuarios/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/usuarios/'."thumb_".$new_name.$extension;
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
                    $estado_id = 1;
                    $params = array(
                        'estado_id' => $estado_id,
                        'tipousuario_id' => $this->input->post('tipousuario_id'),
                        'usuario_nombre' => $this->input->post('usuario_nombre'),
                        'usuario_email' => $this->input->post('usuario_email'),
                        'usuario_login' => $this->input->post('usuario_login'),
                        'usuario_clave' => md5($this->input->post('usuario_clave')),
                        'usuario_imagen' => $foto,
                    );
                    $usuario_id = $this->Usuario_model->add_usuario($params);
                    redirect('usuario/index');
                } else {
                   
                    $this->load->model('Tipo_usuario_model');
                    $data['all_tipo_usuario'] = $this->Tipo_usuario_model->get_all_tipo_usuario();
                    //$this->load->model('parametro_model');
                    //$data['all_parametros'] = $this->parametro_model->get_all_parametros();
                    $data['page_title'] = "Usuarios";
                    $data['_view'] = 'usuario/add';
                    $this->load->view('layouts/main', $data);
                }

    }
    
    /*
     * Editing a usuario
     */
    function edit($usuario_id)
    {
        //if($this->acceso(148)){
        // check if the asociado exists before trying to edit it
        $data['usuario'] = $this->Usuario_model->get_usuario($usuario_id);
        if(isset($data['usuario']['usuario_id'])){
            if($this->input->post('usuario_login') != $data['usuario']['usuario_login']){
                $is_uniquelog = '|is_unique[usuario.usuario_login]';
            } else {
                $is_uniquelog = '';
            }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('usuario_nombre', 'Usuario Nombre', 'required');
            $this->form_validation->set_rules('usuario_email', 'Usuario Email', 'valid_email');
            $this->form_validation->set_rules('usuario_login','usuario','trim|required|xss_clean'.$is_uniquelog, array('required' => 'Este Campo no debe ser vacio', 'is_unique' => 'este usuario ya existe.'));
            if ($this->form_validation->run()) {
                /* *********************INICIO imagen***************************** */
                $foto="";
                    $foto1= $this->input->post('usuario_imagen1');
                if (!empty($_FILES['usuario_imagen']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/usuarios/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png|bmp';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('usuario_imagen');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif" || $img_data['file_ext'] == ".bmp") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/usuarios/';
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
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/'.$base_url[3].'/resources/images/usuarios/';
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
                    $confi['source_image'] = './resources/images/usuarios/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/usuarios/'."thumb_".$new_name.$extension;
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
                    'tipousuario_id' => $this->input->post('tipousuario_id'),
                    'usuario_nombre' => $this->input->post('usuario_nombre'),
                    'usuario_email' => $this->input->post('usuario_email'),
                    'usuario_login' => $this->input->post('usuario_login'),
                    //'usuario_clave' => $this->input->post('usuario_clave'),
                    'usuario_imagen' => $foto,
                );
                
                $this->Usuario_model->update_usuario($usuario_id, $params);
                redirect('usuario');
            } else {
                $this->load->model('Estado_model');
                $tipo = 1;
                $data['all_estado'] = $this->Estado_model->get_all_estadotipo($tipo);

                $this->load->model('Tipo_usuario_model');
                $data['all_tipo_usuario'] = $this->Tipo_usuario_model->get_all_tipo_usuario();
                $data['page_title'] = "Usuario";
                $data['_view'] = 'usuario/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The usuario you are trying to edit does not exist.');
        //}
    }
    /* verifica si hay login al registrar nuevo usuario */
    public function yahaylogin()
    {
        $login = $this->input->post('login');

        $res = $this->Usuario_model->yahay_login($login);
        echo $res;
    }
    
    /* verifica si hay login al modificar un usuario */
    public function yahayloginedit()
    {
        $login = $this->input->post('login');
        $usuario_id = $this->input->post('uid');

        $res = $this->Usuario_model->yahay_loginedit($usuario_id, $login);
        echo $res;
    }
    /* funcion que busca usuarios */
    function buscar_usuarios()
    {
        if($this->input->is_ajax_request()){
            $filtro = $this->input->post('filtro');
            $res_usuarios = $this->Usuario_model->get_all_usuario($filtro);
            echo json_encode($res_usuarios);
        }else{
            show_404();
        }
    }
    
    /* funcion registra nueva contraseña */
    function registrar_nuevacontrasenia()
    {
        if($this->input->is_ajax_request()){
            $usuario_id = $this->input->post('usuario_id');
            $usuario_clave = $this->input->post('usuario_clave');
            $params = array(
                'usuario_clave' => md5($usuario_clave),
            );
            $this->Usuario_model->Update_usuario($usuario_id, $params);
            echo json_encode("ok");
        }else{
            show_404();
        }
    }
    
    /* funcion que da de baja a un usuario*/
    function dardebaja_usuario()
    {
        if($this->input->is_ajax_request()){
            $usuario_id = $this->input->post('usuario_id');
            $estado_id = 2;
            $params = array(
                    'estado_id' => $estado_id,
                );
            $this->Usuario_model->update_usuario($usuario_id, $params);
            echo json_encode("ok");
        }else{
            show_404();
        }
    }
    
    /* funcion que da de alta a un usuario*/
    function dardealta_usuario()
    {
        if($this->input->is_ajax_request()){
            $usuario_id = $this->input->post('usuario_id');
            $estado_id = 1;
            $params = array(
                    'estado_id' => $estado_id,
                );
            $this->Usuario_model->update_usuario($usuario_id, $params);
            echo json_encode("ok");
        }else{
            show_404();
        }
    }
}
