<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pagado_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pagado by pagado_id
     */
    function get_pagado($pagado_id)
    {
        $this->db->select('p.*, a.*, u.usuario_nombre');
        $this->db->where('p.pagado_id', $pagado_id);
        $this->db->join('asociado as a','p.asociado_id = a.asociado_id', 'left');
        $this->db->join('usuario as u','p.usuario_id = u.usuario_id', 'left');
        return $this->db->get("pagado as p")->row_array();
    }
    
    /*
     * function to add new pagado
     */
    function add_pagado($params)
    {
        $this->db->insert('pagado',$params);
        return $this->db->insert_id();
    }
    /*
     * Get all pagado by pagado_id en aporte_asociado
     */
    function getall_pagadoasociado($pagado_id)
    {
        $this->db->select('aa.*, a.aporte_nombre, ta.tipoaporte_nombre');
        $this->db->where('aa.pagado_id', $pagado_id);
        $this->db->join('aporte as a','aa.aporte_id = a.aporte_id', 'left');
        $this->db->join('tipo_aporte as ta','a.tipoaporte_id = ta.tipoaporte_id', 'left');
        return $this->db->get("aporte_asociado as aa")->result_array();
    }
}
