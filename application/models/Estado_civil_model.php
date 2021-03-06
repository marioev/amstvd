<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Estado_civil_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get estado_civil by estadocivil_id
     */
    function get_estado_civil($estadocivil_id)
    {
        return $this->db->get_where('estado_civil',array('estadocivil_id'=>$estadocivil_id))->row_array();
    }
        
    /*
     * Get all estado_civil
     */
    function get_all_estado_civil()
    {
        $this->db->order_by('estadocivil_nombre', 'asc');
        return $this->db->get('estado_civil')->result_array();
    }
        
    /*
     * function to add new estado_civil
     */
    function add_estado_civil($params)
    {
        $this->db->insert('estado_civil',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update estado_civil
     */
    function update_estado_civil($estadocivil_id,$params)
    {
        $this->db->where('estadocivil_id',$estadocivil_id);
        return $this->db->update('estado_civil',$params);
    }
    
    /*
     * function to delete estado_civil
     */
    function delete_estado_civil($estadocivil_id)
    {
        return $this->db->delete('estado_civil',array('estadocivil_id'=>$estadocivil_id));
    }
}
