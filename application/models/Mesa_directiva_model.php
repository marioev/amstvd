<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Mesa_directiva_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get mesa_directiva by mesadir_id
     */
    function get_mesa_directiva($mesadir_id)
    {
        return $this->db->get_where('mesa_directiva',array('mesadir_id'=>$mesadir_id))->row_array();
    }
        
    /*
     * Get all mesa_directiva
     */
    function get_all_mesa_directiva()
    {
        $this->db->order_by('mesadir_id', 'desc');
        return $this->db->get('mesa_directiva')->result_array();
    }
        
    /*
     * function to add new mesa_directiva
     */
    function add_mesa_directiva($params)
    {
        $this->db->insert('mesa_directiva',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update mesa_directiva
     */
    function update_mesa_directiva($mesadir_id,$params)
    {
        $this->db->where('mesadir_id',$mesadir_id);
        return $this->db->update('mesa_directiva',$params);
    }
    
    /*
     * function to delete mesa_directiva
     */
    function delete_mesa_directiva($mesadir_id)
    {
        return $this->db->delete('mesa_directiva',array('mesadir_id'=>$mesadir_id));
    }
}
