<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Aporte_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get aporte by aporte_id
     */
    function get_aporte($aporte_id)
    {
        return $this->db->get_where('aporte',array('aporte_id'=>$aporte_id))->row_array();
    }
        
    /*
     * Get all aporte
     */
    function get_all_aporte()
    {
        $this->db->order_by('aporte_id', 'desc');
        return $this->db->get('aporte')->result_array();
    }
        
    /*
     * function to add new aporte
     */
    function add_aporte($params)
    {
        $this->db->insert('aporte',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update aporte
     */
    function update_aporte($aporte_id,$params)
    {
        $this->db->where('aporte_id',$aporte_id);
        return $this->db->update('aporte',$params);
    }
    
    /*
     * function to delete aporte
     */
    function delete_aporte($aporte_id)
    {
        return $this->db->delete('aporte',array('aporte_id'=>$aporte_id));
    }
}
