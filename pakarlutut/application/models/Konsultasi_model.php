<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function dataCedera(){
        $query = $this->db->query('SELECT tbl_cedera.cedera_nama, GROUP_CONCAT(tbl_kaidah.fk_gejala ORDER BY tbl_kaidah.fk_gejala ASC) gejala, tbl_cedera.nilai_cf nilaicf, tbl_cedera.cedera_solusi solusi FROM tbl_kaidah JOIN tbl_cedera ON tbl_kaidah.fk_cedera = tbl_cedera.cedera_id GROUP BY tbl_kaidah.fk_cedera');

        return $query->result();
    }

    public function dataGejala(){
        $query = $this->db->query('SELECT * FROM tbl_gejala ORDER BY gejala_id ASC');

        return $query->result();
    }
}