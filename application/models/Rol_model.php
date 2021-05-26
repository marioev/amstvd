<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Rol_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get rol by rol_id
     */
    function get_rol($rol_id)
    {
        return $this->db->get_where('rol',array('rol_id'=>$rol_id))->row_array();
    }
    
    /* function to add new rol
    */
    function add_rol($params)
    {
        $this->db->insert('rol',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update rol
     */
    function update_rol($rol_id,$params)
    {
        $this->db->where('rol_id',$rol_id);
        return $this->db->update('rol',$params);
    }
    
    /*
     * function to delete rol
     */
    function delete_rol($rol_id)
    {
        return $this->db->delete('rol',array('rol_id'=>$rol_id));
    }

    public function get_grupos($iddes)
    {
        $this->db->select('idgrupo,nombres,appat,apmat,ci,email,cargo,nombre_agru,costo_cu,iddes,usuarios.idusu');
        $this->db->from('grupos');
        $this->db->join('agrupaciones', 'agrupaciones.idagru = grupos.idagru');
        $this->db->join('usuarios', 'usuarios.idusu = grupos.idusu');
        $this->db->where('grupos.iddes', $iddes);
        $query = $this->db->get();

        return $query->result();
    }

    /*add by adolf*/

    public function get_permisos($tipousuario_id)
    {
        $this->db->select('*');
        $this->db->from('rol_usuario');
        $this->db->join('tipo_usuario', 'tipo_usuario.tipousuario_id = rol_usuario.tipousuario_id');
        $this->db->join('rol', 'rol.rol_id = rol_usuario.rol_id');
        $this->db->where('rol_usuario.tipousuario_id', $tipousuario_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tipousuarios()
    {
        $this->db->select('*');
        $this->db->from('tipo_usuario');
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_allrol()
    {
        $rol = $this->db->query("
            SELECT
                r.*
            FROM
                rol r
        ")->result_array();
        return $rol;
   }
   function get_allrol_padre()
    {
        $rol = $this->db->query("
            SELECT
                r.*, estado_color, estado_nombre
            FROM
                rol r, estado e
            WHERE
                e.estado_id = r.estado_id
                and r.rol_idfk = 0
        ")->result_array();
        return $rol;
   }
   function get_allrol_hijo()
    {
        $rol = $this->db->query("
            SELECT
                r.*, e.estado_color, e.estado_nombre
            FROM
                rol r, estado e
            WHERE
                e.estado_id = r.estado_id
                and r.rol_idfk != 0
        ")->result_array();
        return $rol;
   }
    function get_allrol_padreordenado()
    {
        $rol = $this->db->query("
            SELECT
                r.*, estado_color, estado_nombre
            FROM
                rol r, estado e
            WHERE
                e.estado_id = r.estado_id
                and r.rol_idfk = 0
            ORDER BY r.rol_nombre ASC
        ")->result_array();
        return $rol;
   }
}
