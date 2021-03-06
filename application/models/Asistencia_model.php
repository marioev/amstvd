<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asistencia_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get asistencia by asistencia_id
     */
    function get_asistencia($asistencia_id)
    {
        return $this->db->get_where('asistencia',array('asistencia_id'=>$asistencia_id))->row_array();
    }
        
    /*
     * Get all asistencia
     */
    function get_all_asistencia()
    {
        $this->db->order_by('asistencia_id', 'desc');
        return $this->db->get('asistencia')->result_array();
    }
        
    /*
     * function to add new asistencia
     */
    function add_asistencia($params)
    {
        $this->db->insert('asistencia',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update asistencia
     */
    function update_asistencia($asistencia_id,$params)
    {
        $this->db->where('asistencia_id',$asistencia_id);
        return $this->db->update('asistencia',$params);
    }
    
    /*
     * function to delete asistencia
     */
    function delete_asistencia($asistencia_id)
    {
        return $this->db->delete('asistencia',array('asistencia_id'=>$asistencia_id));
    }
}
