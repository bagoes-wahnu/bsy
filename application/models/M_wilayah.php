<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wilayah extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'wilayah';
        $this->primary_key  = 'ID_WILAYAH';
        $this->order_by     = 'ID_WILAYAH ASC';
    }

    public function get_data()
    {
        return $this->db->query("
            SELECT 
            wly.*, kt.KOTA, kt.STATUS AS STATUS_KOTA
            FROM wilayah wly 
            JOIN kota kt ON wly.ID_KOTA = kt.ID_KOTA
            WHERE kt.DELETED=0
            AND wly.DELETED=0;")->result_array();
    }

    public function get_by_kota($id_kota)
    {
        return $this->db->query("
            SELECT 
            wly.*, kt.KOTA, kt.STATUS AS STATUS_KOTA
            FROM wilayah wly 
            JOIN kota kt ON wly.ID_KOTA = kt.ID_KOTA
            WHERE kt.DELETED=0
            AND wly.DELETED=0
            AND wly.ID_KOTA='$id_kota';")->result_array();
    }

    public function get_data_active()
    {
        return $this->db->query("
            SELECT 
            wly.*, kt.KOTA, kt.STATUS AS STATUS_KOTA
            FROM wilayah wly 
            JOIN kota kt ON wly.ID_KOTA = kt.ID_KOTA
            WHERE kt.DELETED=0
            AND wly.DELETED=0
            AND wly.STATUS=1;")->result_array();
    }
    
    public function get_linkage()
    {
        $query = $this->db->query("
            SELECT
                linkage.ID_LINKAGE,
                linkage.ID_KOTA,
                NAMA_BANK,
                (SELECT SUM(detail_linkage.BAKI_DEBIT) FROM detail_linkage WHERE DELETED = 0 AND detail_linkage.ID_KOTA = linkage.ID_KOTA AND detail_linkage.ID_LINKAGE = linkage.ID_LINKAGE) AS BAKI_DEBET,
                TYPE,
                LOGO,
                STATUS
            FROM
                linkage
            LEFT JOIN detail_linkage ON (
                detail_linkage.ID_LINKAGE = linkage.ID_LINKAGE
            )
            WHERE
                linkage.DELETED = 0
            GROUP BY
                linkage.ID_LINKAGE
            ORDER BY
                linkage.ID_KOTA,
                TYPE ASC
        ");

        return $query->result_array();
    }

    public function get_jaringan_kantor($id_kantor)
    {
        $query = $this->db->query("
            SELECT
                *
            FROM
                cabang
            JOIN wilayah ON cabang.ID_WILAYAH=wilayah.ID_WILAYAH
            where
                wilayah.ID_KOTA = $id_kota AND cabang.STATUS = 1
        ");

        return $query->result_array();
    }

    public function search($id_kota=null,$wilayah=null)
    {
        $query = $this->db->query("
            SELECT
                *
            FROM
                wilayah
            WHERE
                ID_KOTA = $id_kota AND WILAYAH LIKE '%$wilayah%'    
        ");

        return $query->result_array();
    }

    public function get_kantor($id_wilayah,$kategori='')
    {
        if ($kategori == '') {
            $query_kategori = '';
        } else {
            $query_kategori = "AND kas.KATEGORI = '$kategori'";
        }

        $query = $this->db->query("
            SELECT
                *
            FROM
                wilayah
            JOIN cabang ON wilayah.ID_WILAYAH = cabang.ID_WILAYAH AND cabang.STATUS = 1 AND cabang.DELETED = 0
            JOIN kas ON kas.ID_CABANG = cabang.ID_CABANG AND kas.STATUS = 1
            WHERE
                wilayah.ID_WILAYAH =  $id_wilayah $query_kategori AND wilayah.STATUS = 1 AND wilayah.DELETED = 0
        ");

        return $query->result_array();
    }
}

/* End of file M_wilayah.php */
/* Location: ./application/models/M_wilayah.php */