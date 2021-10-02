<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Orden_dia_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get orden_dia by ordendia_id
     */
    function get_orden_dia($ordendia_id)
    {
        return $this->db->get_where('orden_dia',array('ordendia_id'=>$ordendia_id))->row_array();
    }
        
    /*
     * Get all orden_dia
     */
    function get_all_orden_dia($reunion_id)
    {
        $this->db->select('od.*');
        $this->db->from('orden_dia as od');
        $this->db->where('od.reunion_id',$reunion_id);
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new orden_dia
     */
    function add_orden_dia($params)
    {
        $this->db->insert('orden_dia',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update orden_dia
     */
    function update_orden_dia($ordendia_id,$params)
    {
        $this->db->where('ordendia_id',$ordendia_id);
        return $this->db->update('orden_dia',$params);
    }
    
    /*
     * function to delete orden_dia
     */
    function delete_orden_dia($ordendia_id)
    {
        return $this->db->delete('orden_dia',array('ordendia_id'=>$ordendia_id));
    }
}
