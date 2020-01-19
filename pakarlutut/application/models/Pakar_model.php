<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pakar_model extends My_Crud
{
    protected $_nama_tabel = 'tbl_pakar';
    protected $_primary_key = 'pakar_id';

    function __construct()
    {
        parent::__construct();
    }
}