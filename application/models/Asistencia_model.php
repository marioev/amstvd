<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asistencia_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get asistencia by asistencia_id
     */
    function get_asistencia($asistencia_id)
    {
        return $this->db->get_where('asistencia',array('asistencia_id'=>$asistencia_id))->row_array();
    }
    /*
     * Get all asistencias by reunion and orden dia
     */
    function get_allasistencia($reunion_id, $ordendia_id)
    {
        $this->db->select('a.*, aso.asociado_nombre, aso.asociado_apellido');
        $this->db->where('a.reunion_id', $reunion_id);
        $this->db->where('a.ordendia_id', $ordendia_id);
        $this->db->join('orden_dia as od','a.ordendia_id = od.ordendia_id', 'left');
        $this->db->join('asociado as aso','a.asociado_id = aso.asociado_id', 'left');
        $this->db->order_by('aso.asociado_apellido asc, aso.asociado_nombre asc');
        //$this->db->join('estado as e','a.estado_id = e.estado_id', 'left');
        return $this->db->get("asistencia as a")->result_array();
    }
        
    /*
     * Get all asistencia
     */
    function get_all_asistencia()
    {
        $this->db->order_by('asistencia_id', 'desc');
        return $this->db->get('asistencia')->result_array();
    }
        
    /*
     * function to add new asistencia
     */
    function add_asistencia($params)
    {
        $this->db->insert('asistencia',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update asistencia
     */
    function update_asistencia($asistencia_id,$params)
    {
        $this->db->where('asistencia_id',$asistencia_id);
        return $this->db->update('asistencia',$params);
    }
    
    /*
     * function to delete asistencia
     */
    function delete_asistencia($asistencia_id)
    {
        return $this->db->delete('asistencia',array('asistencia_id'=>$asistencia_id));
    }
}
