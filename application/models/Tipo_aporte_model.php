<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_aporte_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tipo_aporte by tipoaporte_id
     */
    function get_tipo_aporte($tipoaporte_id)
    {
        return $this->db->get_where('tipo_aporte',array('tipoaporte_id'=>$tipoaporte_id))->row_array();
    }
        
    /*
     * Get all tipo_aporte
     */
    function get_all_tipo_aporte()
    {
        $this->db->order_by('tipoaporte_nombre', 'asc');
        return $this->db->get('tipo_aporte')->result_array();
    }
        
    /*
     * function to add new tipo_aporte
     */
    function add_tipo_aporte($params)
    {
        $this->db->insert('tipo_aporte',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tipo_aporte
     */
    function update_tipo_aporte($tipoaporte_id,$params)
    {
        $this->db->where('tipoaporte_id',$tipoaporte_id);
        return $this->db->update('tipo_aporte',$params);
    }
    
    /*
     * function to delete tipo_aporte
     */
    function delete_tipo_aporte($tipoaporte_id)
    {
        return $this->db->delete('tipo_aporte',array('tipoaporte_id'=>$tipoaporte_id));
    }
}
