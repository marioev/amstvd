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
    /*function delete_rol($rol_id)
    {
        return $this->db->delete('rol',array('rol_id'=>$rol_id));
    }*/
    
    /* obtiene los roles padre ordenados en alfabeticamente */
    function get_allrol_padre()
    {
        $this->db->select('r.*, e.estado_color, e.estado_nombre');
        $this->db->from('rol as r');
        $this->db->join('estado as e','r.estado_id = e.estado_id');
        $this->db->where('r.rol_idfk','0');
        $this->db->order_by('r.rol_nombre asc');
        return $this->db->get()->result_array();
   }
   
   /* obtiene los roles hijo ordenados alfabeticamente */
   function get_allrol_hijo()
    {
        $this->db->select('r.*, e.estado_color, e.estado_nombre');
        $this->db->from('rol as r');
        $this->db->join('estado as e','r.estado_id = e.estado_id');
        $this->db->where('r.rol_idfk !=','0');
        $this->db->order_by('r.rol_nombre asc');
        return $this->db->get()->result_array();
        
        return $rol;
    }
}
