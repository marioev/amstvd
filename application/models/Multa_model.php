<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Multa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get multa by multa_id
     */
    function get_multa($multa_id)
    {
        return $this->db->get_where('multa',array('multa_id'=>$multa_id))->row_array();
    }
        
    /*
     * Get all multa
     */
    function get_all_multa()
    {
        $this->db->order_by('multa_id', 'desc');
        return $this->db->get('multa')->result_array();
    }
        
    /*
     * function to add new multa
     */
    function add_multa($params)
    {
        $this->db->insert('multa',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update multa
     */
    function update_multa($multa_id,$params)
    {
        $this->db->where('multa_id',$multa_id);
        return $this->db->update('multa',$params);
    }
    
    /*
     * function to delete multa
     */
    function delete_multa($multa_id)
    {
        return $this->db->delete('multa',array('multa_id'=>$multa_id));
    }
}
