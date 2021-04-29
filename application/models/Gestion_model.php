<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gestion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gestion by gestion_id
     */
    function get_gestion($gestion_id)
    {
        return $this->db->get_where('gestion',array('gestion_id'=>$gestion_id))->row_array();
    }
        
    /*
     * Get all gestion
     */
    function get_all_gestion()
    {
        $this->db->select('g.*, e.estado_nombre, e.estado_color');
        $this->db->from('gestion as g');
        $this->db->join('estado as e','g.estado_id = e.estado_id', 'left');
        $this->db->order_by('gestion_id', 'desc');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new gestion
     */
    function add_gestion($params)
    {
        $this->db->insert('gestion',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gestion
     */
    function update_gestion($gestion_id,$params)
    {
        $this->db->where('gestion_id',$gestion_id);
        return $this->db->update('gestion',$params);
    }
    
    /*
     * function to delete gestion
     */
    function delete_gestion($gestion_id)
    {
        return $this->db->delete('gestion',array('gestion_id'=>$gestion_id));
    }
}
