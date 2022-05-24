<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import_kota extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'import_kota';
        $this->primary_key  = 'ID_KOTA';
        $this->order_by     = 'ID_KOTA ASC';
    }

    public function get_year($id_kota=false)
    {
        $query = "SELECT DISTINCT
        TAHUN
        FROM
        history_import
        WHERE
        JENIS = 'realisasi'
        AND DELETED = 0";

        if($id_kota==true){
            $query .= " AND ID_KOTA = '{$id_kota}'";
        }

        $query .= " ORDER BY TAHUN DESC";

        return $this->db->query($query)->result_array();
    }

    public function get_month($id_kota=false, $year=false)
    {
        $query = "SELECT DISTINCT
        TAHUN, BULAN
        FROM
        history_import
        WHERE
        JENIS = 'realisasi'
        AND DELETED = 0";

        if($id_kota==true){
            $query .= " AND ID_KOTA ='{$id_kota}'";
        }

        if($year==true){
            $query .= " AND TAHUN = '{$year}'";
        }

        $query .= " ORDER BY TAHUN DESC, BULAN DESC";

        return $this->db->query($query)->result_array();
    }

    public function get_data()
    {
    	return $this->db->query("
    		SELECT
    		*
    		FROM import_kota imk
    		JOIN kota kt ON kt.ID_KOTA = imk.ID_KOTA;")->result_array();
    }

    public function get_detail($id_kota)
    {
    	return $this->db->query("
    		SELECT
    		*
    		FROM import_kota imk
    		JOIN kota kt ON kt.ID_KOTA = imk.ID_KOTA
    		AND imk.ID_KOTA = '$id_kota';")->result_array();
    }

    public function grid()
    {
        return $this->db->query(
            "SELECT
            kt.ID_KOTA,
            kt.KOTA,
            imk.BULAN,
            imk.TAHUN
            FROM
            import_kota imk
            JOIN kota kt ON kt.ID_KOTA = imk.ID_KOTA
            GROUP BY
            kt.ID_KOTA,
            kt.KOTA,
            imk.BULAN,
            imk.TAHUN;")->result_array();
    }

    public function grid_kota($id_kota)
    {
        return $this->db->query(
            "SELECT
            kt.ID_KOTA,
            kt.KOTA,
            imk.BULAN,
            imk.TAHUN
            FROM
            import_kota imk
            JOIN kota kt ON kt.ID_KOTA = imk.ID_KOTA
            WHERE kt.ID_KOTA = '$id_kota'
            GROUP BY
            kt.ID_KOTA,
            kt.KOTA,
            imk.BULAN,
            imk.TAHUN;")->result_array();
    }

    public function get_graph($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("SUM(imk.ASET_REALISASI) AS ASET_REALISASI,
            SUM(imk.ASET_TARGET) AS ASET_TARGET,
            SUM(imk.LABA_REALISASI) AS LABA_REALISASI,
            SUM(imk.LABA_TARGET) AS LABA_TARGET,
            SUM(imk.BIAYA_REALISASI) AS BIAYA_REALISASI,
            SUM(imk.BIAYA_TARGET) AS BIAYA_TARGET,
            SUM(imk.PENDAPATAN_REALISASI) AS PENDAPATAN_REALISASI,
            SUM(imk.PENDAPATAN_TARGET) AS PENDAPATAN_TARGET,
            SUM(imk.TABUNGAN_REALISASI) AS TABUNGAN_REALISASI,
            SUM(imk.TABUNGAN_TARGET) AS TABUNGAN_TARGET,
            SUM(imk.DEPOSITO_REALISASI) AS DEPOSITO_REALISASI,
            SUM(imk.DEPOSITO_TARGET) AS DEPOSITO_TARGET,
            SUM(imk.KREDIT_REALISASI) AS KREDIT_REALISASI,
            SUM(imk.KREDIT_TARGET) AS KREDIT_TARGET,
            AVG(imk.CAR_TARGET) AS CAR_TARGET,
            AVG(imk.CAR_REALISASI) AS CAR_REALISASI,
            AVG(imk.ROA_TARGET) AS ROA_TARGET,
            AVG(imk.ROA_REALISASI) AS ROA_REALISASI,
            AVG(imk.ROE_TARGET) AS ROE_TARGET,
            AVG(imk.ROE_REALISASI) AS ROE_REALISASI,
            AVG(imk.BOPO_TARGET) AS BOPO_TARGET,
            AVG(imk.BOPO_REALISASI) AS BOPO_REALISASI,
            AVG(imk.CR_TARGET) AS CR_TARGET,
            AVG(imk.CR_REALISASI) AS CR_REALISASI,
            AVG(imk.LDR_TARGET) AS LDR_TARGET,
            AVG(imk.LDR_REALISASI) AS LDR_REALISASI,
            AVG(imk.KAP_TARGET) AS KAP_TARGET,
            AVG(imk.KAP_REALISASI) AS KAP_REALISASI,
            AVG(imk.NPL_GROSS_TARGET) AS NPL_GROSS_TARGET,
            AVG(imk.NPL_GROSS_REALISASI) AS NPL_GROSS_REALISASI,
            AVG(imk.NPL_NET_TARGET) AS NPL_NET_TARGET,
            AVG(imk.NPL_NET_REALISASI) AS NPL_NET_REALISASI,
            AVG(imk.NIM_TARGET) AS NIM_TARGET,
            AVG(imk.NIM_REALISASI) AS NIM_REALISASI
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function get_last_data($id_kota='')
    {
        $this->db->select('imk.ID_KOTA, imk.BULAN, imk.TAHUN')
        ->from('import_kota imk');

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        $this->db->order_by('TAHUN', 'DESC')
        ->order_by('BULAN', 'DESC');

        return $this->db->get()->row_array();
    }

    public function graph_tabungan($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.TABUNGAN_REALISASI) AS TABUNGAN_REALISASI,
            SUM(imk.TABUNGAN_TARGET) AS TABUNGAN_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_deposito($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.DEPOSITO_REALISASI) AS DEPOSITO_REALISASI,
            SUM(imk.DEPOSITO_TARGET) AS DEPOSITO_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_kredit($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.KREDIT_REALISASI) AS KREDIT_REALISASI,
            SUM(imk.KREDIT_TARGET) AS KREDIT_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_aset($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.ASET_REALISASI) AS ASET_REALISASI,
            SUM(imk.ASET_TARGET) AS ASET_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_laba($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.LABA_REALISASI) AS LABA_REALISASI,
            SUM(imk.LABA_TARGET) AS LABA_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_biaya($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.BIAYA_REALISASI) AS BIAYA_REALISASI,
            SUM(imk.BIAYA_TARGET) AS BIAYA_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_pendapatan($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.PENDAPATAN_REALISASI) AS PENDAPATAN_REALISASI,
            SUM(imk.PENDAPATAN_TARGET) AS PENDAPATAN_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_car($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.CAR_REALISASI) AS CAR_REALISASI,
            SUM(imk.CAR_TARGET) AS CAR_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_roa($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.ROA_REALISASI) AS ROA_REALISASI,
            SUM(imk.ROA_TARGET) AS ROA_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_roe($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.ROE_REALISASI) AS ROE_REALISASI,
            SUM(imk.ROE_TARGET) AS ROE_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_bopo($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.BOPO_REALISASI) AS BOPO_REALISASI,
            SUM(imk.BOPO_TARGET) AS BOPO_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_cr($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.CR_REALISASI) AS CR_REALISASI,
            SUM(imk.CR_TARGET) AS CR_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_ldr($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.LDR_REALISASI) AS LDR_REALISASI,
            SUM(imk.LDR_TARGET) AS LDR_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_kap($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.KAP_REALISASI) AS KAP_REALISASI,
            SUM(imk.KAP_TARGET) AS KAP_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_npl_gross($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.NPL_GROSS_REALISASI) AS NPL_GROSS_REALISASI,
            SUM(imk.NPL_GROSS_TARGET) AS NPL_GROSS_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_npl_net($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.NPL_NET_REALISASI) AS NPL_NET_REALISASI,
            SUM(imk.NPL_NET_TARGET) AS NPL_NET_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function graph_nim($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.NIM_REALISASI) AS NIM_REALISASI,
            SUM(imk.NIM_TARGET) AS NIM_TARGET
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function get_pie($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("imk.TAHUN");
        }

        if($month == true){
            $this->db->select("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->select("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->select("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->select("imk.BRANCH");
        }

        $this->db->select("
            SUM(imk.TAB_SURYA) AS TAB_SURYA,
            SUM(imk.ATM_KHUSUS) AS ATM_KHUSUS,
            SUM(imk.ATM_SURYA) AS ATM_SURYA,
            SUM(imk.TAB_PENSIUN) AS TAB_PENSIUN,
            SUM(imk.TAS) AS TAS,
            SUM(imk.TAB_KU) AS TAB_KU,
            SUM(imk.TAB_UMROH) AS TAB_UMROH,
            SUM(imk.THT_UMUM) AS THT_UMUM,
            SUM(imk.TAB_SIMPEL) AS TAB_SIMPEL,
            SUM(imk.TAB_PIKNIK) AS TAB_PIKNIK,
            SUM(COALESCE(imk.TAB_SURYA, 0) + COALESCE(imk.ATM_KHUSUS, 0) + COALESCE(imk.ATM_SURYA, 0) + COALESCE(imk.TAB_PENSIUN, 0) + COALESCE(imk.TAS, 0) + COALESCE(imk.TAB_KU, 0) + COALESCE(imk.TAB_UMROH, 0) + COALESCE(imk.THT_UMUM, 0) + COALESCE(imk.TAB_SIMPEL, 0) + COALESCE(imk.TAB_PIKNIK, 0)
            ) AS TOTAL
            ")
        ->from('import_kota imk');

        if($year == true){
            $this->db->where('imk.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('imk.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('imk.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('imk.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('imk.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("imk.TAHUN");
        }

        if($month == true){
            $this->db->group_by("imk.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("imk.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("imk.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("imk.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

    public function get_pie_deposito($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("dps.TAHUN");
        }

        if($month == true){
            $this->db->select("dps.BULAN");
        }

        if($id_kota == true){
            $this->db->select("dps.ID_KOTA");
        }

        if($group == true){
            $this->db->select("dps.`GROUP`");
        }

        if($branch == true){
            $this->db->select("dps.BRANCH");
        }

        $this->db->select("
            SUM(dps.DEP_1) AS DEP_1,
            SUM(dps.DEP_3) AS DEP_3,
            SUM(dps.DEP_6) AS DEP_6,
            SUM(dps.DEP_12) AS DEP_12,
            SUM(COALESCE(dps.DEP_1,0) + COALESCE(dps.DEP_3,0) + COALESCE(dps.DEP_6,0) + COALESCE(dps.DEP_12,0)) AS TOTAL
            ")
        ->from('import_kota dps');

        if($year == true){
            $this->db->where('dps.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('dps.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('dps.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('dps.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('dps.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("dps.TAHUN");
        }

        if($month == true){
            $this->db->group_by("dps.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("dps.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("dps.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("dps.BRANCH");
        }

        $res = $this->db->get();

        return $res->row_array();
    }

    public function get_pie_kredit($year=false, $month=false, $id_kota=false, $group=false, $branch=false)
    {
        if($year == true){
            $this->db->select("krd.TAHUN");
        }

        if($month == true){
            $this->db->select("krd.BULAN");
        }

        if($id_kota == true){
            $this->db->select("krd.ID_KOTA");
        }

        if($group == true){
            $this->db->select("krd.`GROUP`");
        }

        if($branch == true){
            $this->db->select("krd.BRANCH");
        }

        $this->db->select("
            SUM(krd.KRED_UMUM) AS KRED_UMUM,
            SUM(krd.KRED_PEG) AS KRED_PEG,
            SUM(krd.KRED_MOTOR) AS KRED_MOTOR,
            SUM(krd.KRED_MOTOR_BT) AS KRED_MOTOR_BT,
            SUM(krd.KRED_URK) AS KRED_URK,
            SUM(krd.KRED_MOBIL) AS KRED_MOBIL,
            SUM(COALESCE(krd.KRED_UMUM, 0) + COALESCE(krd.KRED_PEG, 0) + COALESCE(krd.KRED_MOTOR, 0) + COALESCE(krd.KRED_MOTOR_BT, 0) + COALESCE(krd.KRED_URK, 0) + COALESCE(krd.KRED_MOBIL, 0)) AS TOTAL
            ")
        ->from('import_kota krd');

        if($year == true){
            $this->db->where('krd.TAHUN', $year);
        }

        if($month == true){
            $this->db->where('krd.BULAN', $month);
        }

        if($id_kota == true){
            $this->db->where('krd.ID_KOTA', $id_kota);
        }

        if($group == true){
            $this->db->where('krd.`GROUP`', $group);
        }

        if($branch == true){
            $this->db->where('krd.BRANCH', $branch);
        }

        if($year == true){
            $this->db->group_by("krd.TAHUN");
        }

        if($month == true){
            $this->db->group_by("krd.BULAN");
        }

        if($id_kota == true){
            $this->db->group_by("krd.ID_KOTA");
        }

        if($group == true){
            $this->db->group_by("krd.`GROUP`");
        }

        if($branch == true){
            $this->db->group_by("krd.BRANCH");
        }


        $res = $this->db->get();

        return $res->row_array();
    }

}
