<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Informacion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get informacion by informacion_id
     */
    function get_informacion($informacion_id)
    {
        return $this->db->get_where('informacion',array('informacion_id'=>$informacion_id))->row_array();
    }
        
    /*
     * Get all informacion
     */
    function get_all_informacion()
    {
        $this->db->order_by('informacion_id', 'desc');
        return $this->db->get('informacion')->result_array();
    }
        
    /*
     * function to add new informacion
     */
    function add_informacion($params)
    {
        $this->db->insert('informacion',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update informacion
     */
    function update_informacion($informacion_id,$params)
    {
        $this->db->where('informacion_id',$informacion_id);
        return $this->db->update('informacion',$params);
    }
    
    /*
     * function to delete informacion
     */
    function delete_informacion($informacion_id)
    {
        return $this->db->delete('informacion',array('informacion_id'=>$informacion_id));
    }
    /*
     * Get all informaciones
     */
    function get_all_informaciones($filtro, $gestion_id)
    {
        $comp = " ";
        if($gestion_id > 0){
            $comp = $comp." and i.gestion_id = ".$gestion_id;
        }
        $sql = "SELECT
                 i.*, g.gestion_nombre, e.estado_nombre, e.estado_color
              FROM
              informacion as i
              LEFT JOIN gestion as g on i.gestion_id = g.gestion_id
              LEFT JOIN estado e on i.estado_id = e.estado_id
              WHERE 
                   (i.informacion_titulo like '%".$filtro."%' or i.informacion_contenido like '%".$filtro."%')
                   ".$comp."
              ORDER By i.informacion_fecha desc";

        $aporte = $this->db->query($sql)->result_array();
        return $aporte;
    }
}
