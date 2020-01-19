<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaidah_model extends My_Crud
{
    protected $_nama_tabel = 'tbl_kaidah';
    protected $_primary_key = 'kaidah_id';

    function __construct()
    {
        parent::__construct();
    }

    public function ambilSemua($kode=NULL){
        if($kode){
            $query = $this->db->query('SELECT GROUP_CONCAT(fk_gejala ORDER BY fk_gejala ASC) gejala_id FROM tbl_kaidah WHERE tbl_kaidah.kaidah_kode="'.$kode.'"');

            $method='row';
        }else{
            $query = $this->db->query('SELECT tbl_kaidah.kaidah_kode, tbl_cedera.cedera_nama, GROUP_CONCAT(tbl_gejala.gejala_nama ORDER BY tbl_gejala.gejala_id ASC) gejala, GROUP_CONCAT(tbl_gejala.gejala_id ORDER BY tbl_gejala.gejala_id ASC) gejala_id, tbl_cedera.cedera_id cedera_id, tbl_cedera.nilai_cf nilai_cf FROM tbl_kaidah JOIN tbl_cedera ON tbl_kaidah.fk_cedera = tbl_cedera.cedera_id JOIN tbl_gejala ON tbl_kaidah.fk_gejala= tbl_gejala.gejala_id GROUP BY tbl_kaidah.kaidah_kode');

            $method='result';
        }
        return $query->$method();
    }
}