<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Expedido_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get expedido by expedido_id
     */
    function get_expedido($expedido_id)
    {
        return $this->db->get_where('expedido',array('expedido_id'=>$expedido_id))->row_array();
    }
        
    /*
     * Get all expedido
     */
    function get_all_expedido()
    {
        $this->db->order_by('expedido_nombre', 'asc');
        return $this->db->get('expedido')->result_array();
    }
        
    /*
     * function to add new expedido
     */
    function add_expedido($params)
    {
        $this->db->insert('expedido',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update expedido
     */
    function update_expedido($expedido_id,$params)
    {
        $this->db->where('expedido_id',$expedido_id);
        return $this->db->update('expedido',$params);
    }
    
    /*
     * function to delete expedido
     */
    function delete_expedido($expedido_id)
    {
        return $this->db->delete('expedido',array('expedido_id'=>$expedido_id));
    }
}
