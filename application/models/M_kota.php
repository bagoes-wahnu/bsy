<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kota extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'kota';
        $this->primary_key  = 'ID_KOTA';
        $this->order_by     = 'ID_KOTA ASC';
    }
    
    public function get_data_konsolidasi($id_kota=null)
    {
        if ($id_kota == null) {
            $query = $this->db->query("
                SELECT
                    SUM(ASET_REALISASI)AS ASET_REALISASI,
                    SUM(ASET_TARGET)AS ASET_TARGET,
                    SUM(TABUNGAN_REALISASI)AS TABUNGAN_REALISASI,
                    SUM(TABUNGAN_TARGET)AS TABUNGAN_TARGET,
                    SUM(DEPOSITO_REALISASI)AS DEPOSITO_REALISASI,
                    SUM(DEPOSITO_TARGET)AS DEPOSITO_TARGET,
                    SUM(KREDIT_REALISASI)AS KREDIT_REALISASI,
                    SUM(KREDIT_TARGET)AS KREDIT_TARGET,
                    SUM(PENDAPATAN_REALISASI)AS PENDAPATAN_REALISASI,
                    SUM(PENDAPATAN_TARGET)AS PENDAPATAN_TARGET,
                    SUM(BIAYA_REALISASI)AS BIAYA_REALISASI,
                    SUM(BIAYA_TARGET)AS BIAYA_TARGET,
                    SUM(LABA_REALISASI)AS LABA_REALISASI,
                    SUM(LABA_TARGET)AS LABA_TARGET,
                    SUM(CAR)AS CAR,
                    SUM(ROA)AS ROA,
                    SUM(ROE)AS ROE,
                    SUM(BOPO)AS BOPO,
                    SUM(CR)AS CR,
                    SUM(LDR)AS LDR,
                    SUM(KAP)AS KAP,
                    SUM(NPL_GROSS)AS NPL_GROSS,
                    SUM(NPL_NET)AS NPL_NET,
                    SUM(NIM)AS NIM
                FROM
                    import_kota
            ");
        } else {
            $query = $this->db->query("
                SELECT
                    SUM(ASET_REALISASI)AS ASET_REALISASI,
                    SUM(ASET_TARGET)AS ASET_TARGET,
                    SUM(TABUNGAN_REALISASI)AS TABUNGAN_REALISASI,
                    SUM(TABUNGAN_TARGET)AS TABUNGAN_TARGET,
                    SUM(DEPOSITO_REALISASI)AS DEPOSITO_REALISASI,
                    SUM(DEPOSITO_TARGET)AS DEPOSITO_TARGET,
                    SUM(KREDIT_REALISASI)AS KREDIT_REALISASI,
                    SUM(KREDIT_TARGET)AS KREDIT_TARGET,
                    SUM(PENDAPATAN_REALISASI)AS PENDAPATAN_REALISASI,
                    SUM(PENDAPATAN_TARGET)AS PENDAPATAN_TARGET,
                    SUM(BIAYA_REALISASI)AS BIAYA_REALISASI,
                    SUM(BIAYA_TARGET)AS BIAYA_TARGET,
                    SUM(LABA_REALISASI)AS LABA_REALISASI,
                    SUM(LABA_TARGET)AS LABA_TARGET,
                    SUM(CAR)AS CAR,
                    SUM(ROA)AS ROA,
                    SUM(ROE)AS ROE,
                    SUM(BOPO)AS BOPO,
                    SUM(CR)AS CR,
                    SUM(LDR)AS LDR,
                    SUM(KAP)AS KAP,
                    SUM(NPL_GROSS)AS NPL_GROSS,
                    SUM(NPL_NET)AS NPL_NET,
                    SUM(NIM)AS NIM
                FROM
                    import_kota
                WHERE 
                    ID_KOTA = $id_kota
            ");
        }

        return  $query->row_array();
    }
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */