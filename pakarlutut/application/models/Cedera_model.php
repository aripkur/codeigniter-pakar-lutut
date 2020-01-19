<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cedera_model extends My_Crud
{
    protected $_nama_tabel = 'tbl_cedera';
    protected $_primary_key = 'cedera_id';

    function __construct()
    {
        parent::__construct();
    }
}