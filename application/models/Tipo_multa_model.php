<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_multa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tipo_multa by tipo_multa_id
     */
    function get_tipo_multa($tipomulta_id)
    {
        return $this->db->get_where('tipo_multa',array('tipomulta_id'=>$tipomulta_id))->row_array();
    }
        
    /*
     * Get all tipo_multa
     */
    function get_all_tipo_multa()
    {
        $this->db->select('tm.*, e.estado_nombre, e.estado_color');
        $this->db->from('tipo_multa as tm');
        $this->db->join('estado as e','tm.estado_id = e.estado_id', 'left');
        $this->db->order_by('tipomulta_nombre', 'asc');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new tipo_multa
     */
    function add_tipo_multa($params)
    {
        $this->db->insert('tipo_multa',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tipo_multa
     */
    function update_tipo_multa($tipomulta_id,$params)
    {
        $this->db->where('tipomulta_id',$tipomulta_id);
        return $this->db->update('tipo_multa',$params);
    }
    
    /*
     * function to delete tipo_multa
     */
    function delete_tipo_multa($tipomulta_id)
    {
        return $this->db->delete('tipo_multa',array('tipomulta_id'=>$tipomulta_id));
    }
    /*
     * Get all tipo_multa vigente
     */
    function get_all_tipomulta_vigente()
    {
        $this->db->select('tm.*, e.estado_nombre, e.estado_color');
        $this->db->from('tipo_multa as tm');
        $this->db->join('estado as e','tm.estado_id = e.estado_id', 'left');
        $this->db->where('tm.estado_id',1);
        $this->db->order_by('tipomulta_nombre', 'asc');
        return $this->db->get()->result_array();
    }
}
