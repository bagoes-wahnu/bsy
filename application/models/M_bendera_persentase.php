<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bendera_persentase extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'bendera_persentase';
        $this->primary_key  = 'ID_BENDERA_PERSENTASE';
        $this->order_by     = 'ID_KOTA ASC';
    }

    public function get_for_all($id_kota = null)
    {
        $this->db->select('
                bendera_persentase.ID_KOTA,
                bendera_persentase.ID_WILAYAH,
                bendera_persentase.ID_CABANG,
                bendera_persentase.ID_KAS,
                WILAYAH,
                CABANG,
                KAS,
                TABUNGAN,
                DEPOSITO,
                KREDIT,
                LABA,
                ASSET')
        ->from('bendera_persentase')
        ->join('kota', 'bendera_persentase.ID_KOTA = kota.ID_KOTA', 'left')
        ->join('wilayah', 'bendera_persentase.ID_WILAYAH = wilayah.ID_WILAYAH', 'left')
        ->join('cabang', 'bendera_persentase.ID_CABANG = cabang.ID_CABANG', 'left')
        ->join('kas', 'bendera_persentase.ID_KAS = kas.ID_KAS', 'left');
        if (isset($id_kota)) {
            $this->db->where('bendera_persentase.ID_KOTA', $id_kota);
        }
        // $query = $this->db->query("
        //     SELECT
        //         bendera_persentase.ID_KOTA,
        //         bendera_persentase.ID_WILAYAH,
        //         bendera_persentase.ID_CABANG,
        //         bendera_persentase.ID_KAS,
        //         WILAYAH,
        //         CABANG,
        //         KAS,
        //         TABUNGAN,
        //         DEPOSITO,
        //         KREDIT,
        //         LABA,
        //         ASSET
        //     FROM
        //         bendera_persentase
        //     LEFT JOIN kota ON bendera_persentase.ID_KOTA = kota.ID_KOTA
        //     LEFT JOIN wilayah ON bendera_persentase.ID_WILAYAH = wilayah.ID_WILAYAH
        //     LEFT JOIN cabang ON bendera_persentase.ID_CABANG = cabang.ID_CABANG
        //     LEFT JOIN kas ON bendera_persentase.ID_KAS = kas.ID_KAS
        // ");
        $query = $this->db->get();
        return $query->result_array();
    }
 
    public function get_for_wilayah($id_kota)
    {
       $query = $this->db->query("
            SELECT
                bendera_persentase.ID_KOTA,
                bendera_persentase.ID_WILAYAH,
                WILAYAH,
                TABUNGAN,
                DEPOSITO,
                KREDIT,
                LABA,
                ASSET
            FROM
                bendera_persentase
            JOIN wilayah ON bendera_persentase.ID_WILAYAH = wilayah.ID_WILAYAH
        ");

       return $query->result_array();
    }

    public function get_for_cabang($id_kota)
    {
       $query = $this->db->query("
            SELECT
                bendera_persentase.ID_KOTA,
                bendera_persentase.ID_CABANG,
                CABANG,
                TABUNGAN,
                DEPOSITO,
                KREDIT,
                LABA,
                ASSET
            FROM
                bendera_persentase
            JOIN cabang ON bendera_persentase.ID_CABANG = cabang.ID_CABANG
        ");
    }

    public function get_for_kas($id_kota)
    {
        $query = $this->db->query("
            SELECT
                bendera_persentase.ID_KOTA,
                bendera_persentase.ID_KAS,
                KAS,
                TABUNGAN,
                DEPOSITO,
                KREDIT,
                LABA,
                ASSET
            FROM
                bendera_persentase
            JOIN kas ON bendera_persentase.ID_KAS = kas.ID_KAS
        ");

        return $query->result_array();
    }
}

/* End of file M_bendera_persentase.php */
/* Location: ./application/models/M_bendera_persentase.php */