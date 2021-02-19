<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Organizacion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get organizacion by organ_id
     */
    function get_organizacion($organ_id)
    {
        return $this->db->get_where('organizacion',array('organ_id'=>$organ_id))->row_array();
    }
        
    /*
     * Get all organizacion
     */
    function get_all_organizacion()
    {
        $this->db->order_by('organ_id', 'desc');
        return $this->db->get('organizacion')->result_array();
    }
        
    /*
     * function to add new organizacion
     */
    function add_organizacion($params)
    {
        $this->db->insert('organizacion',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update organizacion
     */
    function update_organizacion($organ_id,$params)
    {
        $this->db->where('organ_id',$organ_id);
        return $this->db->update('organizacion',$params);
    }
    
    /*
     * function to delete organizacion
     */
    function delete_organizacion($organ_id)
    {
        return $this->db->delete('organizacion',array('organ_id'=>$organ_id));
    }
}
