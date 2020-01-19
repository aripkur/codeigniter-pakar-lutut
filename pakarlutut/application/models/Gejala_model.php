<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends My_Crud
{
    protected $_nama_tabel = 'tbl_gejala';
    protected $_primary_key = 'gejala_id';

    function __construct()
    {
        parent::__construct();
    }
}