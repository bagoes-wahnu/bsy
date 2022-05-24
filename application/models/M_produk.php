<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'produk';
        $this->primary_key  = 'ID_PRODUK';
        $this->order_by     = 'ID_PRODUK ASC';
    }
    

    public function find($search=null)
    {
        if (isset($search)) {
            $this->db->select('*')
            ->from('produk')
            ->like('NAMA_PRODUK', $search);

            $query = $this->db->get();
        } else {

        }

        return $query->result_array();
    }

    public function get_produk($start=0,$length=10,$count=false, $search=false, $where=false, $order=false, $by=false)
    {
        $this->db->query("SET @num:=0;");
        $limit='';
        if($order == true)
            $order = 'ORDER BY '.$order.' '.$by;
        else
            $order = '';
        if($count == false)
            $limit = 'LIMIT '.$length.' OFFSET '.$start;
        if($search == true) {
            if ($where == true) 
                $where .= " AND NAMA_PRODUK LIKE '%{$search}%'";
            else        
                $where = "WHERE
                 NAMA_PRODUK LIKE '%{$search}%'";
        }
                
        $sql = "
            SELECT
                ID_PRODUK,
                PRODUK,
                (@num:=@num+1) NOMER
            FROM
                produk
            $where

            $order
            
            $limit
        ";
        $query = $this->db->query($sql);
        
        if($count == false)
            return $query->result_array();
        else
            return $query->num_rows();
    }

    function grid_json($start, $length, $search='', $count, $sorting, $colsorting, $special_condition=false)
    {
        // select database
        $this->db->select("*")
        ->from($this->table_name)
        ->where('DELETED', 0);

        // search area
        if($search != ''){
            $this->db->where("(NAMA_PRODUK LIKE '%{$search}%')");
        }

        if($special_condition == true){
            $this->db->where($special_condition);
        }

        // urutan data
        $this->db->order_by($colsorting,$sorting);

        // limit data
        if($count == false) $this->db->limit($length,$start);

        $query = $this->db->get();

        if($count == false){
            return $query->result_array();
        }else{
            return $query->num_rows();
        }
    }
}

/* End of file M_produk.php */
/* Location: ./application/models/M_produk.php */