<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asociado_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get asociado by asociado_id
     */
    function get_asociado($asociado_id)
    {
        return $this->db->get_where('asociado',array('asociado_id'=>$asociado_id))->row_array();
    }
        
    /*
     * Get all asociado
     */
    function get_all_asociado($filtro)
    {
        $this->db->select('a.*, ec.estadocivil_nombre, ex.expedido_nombre, e.estado_nombre, e.estado_color, g.genero_nombre');
        $this->db->from('asociado as a');
        $this->db->join('estado_civil as ec','a.estadocivil_id = ec.estadocivil_id', 'left');
        $this->db->join('expedido as ex','a.expedido_id = ex.expedido_id', 'left');
        $this->db->join('estado as e','a.estado_id = e.estado_id', 'left');
        $this->db->join('genero as g','a.genero_id = g.genero_id', 'left');
        $this->db->like('a.asociado_apellido', $filtro);
        $this->db->or_like('a.asociado_nombre', $filtro);
        $this->db->or_like('a.asociado_ci', $filtro);
        $this->db->order_by('a.asociado_apellido asc, a.asociado_nombre asc');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new asociado
     */
    function add_asociado($params)
    {
        $this->db->insert('asociado',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update asociado
     */
    function update_asociado($asociado_id,$params)
    {
        $this->db->where('asociado_id',$asociado_id);
        return $this->db->update('asociado',$params);
    }
    
    /*
     * function to delete asociado
     */
    /*function delete_asociado($asociado_id)
    {
        return $this->db->delete('asociado',array('asociado_id'=>$asociado_id));
    }*/
    /*
     * Get all asociados segun su estado!..
     */
    function get_all_asociadosestado($estado_id)
    {
        $this->db->select('a.*');
        $this->db->from('asociado as a');
        $this->db->where('a.estado_id',$estado_id);
        $this->db->order_by('a.asociado_apellido asc, a.asociado_nombre asc');
        return $this->db->get()->result_array();
    }
}
