<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Crud extends CI_Model
{
    protected $_nama_tabel;
    protected $_primary_key;

    function __construct()
    {
        parent::__construct();
    }

    public function insert($data){
        $this->db->set($data);
        $this->db->insert($this->_nama_tabel);
        return $this->db->insert_id();
    }

    public function get($where=NULL, $single=FALSE){
        if($where){
            $this->db->where($where);
            $method = 'result';
        }
        if($single){
            $this->db->limit(1);
            $method = 'row';
        }else{
            $method = 'result';
        }
        return $this->db->get($this->_nama_tabel)->$method();
    }
    
    public function update($data=NULL, $id=NULL, $where=NULL)
    {
        if($id){
            $this->db->where($this->_primary_key, $id);
        }
        if($where){
            $this->db->where($where);
        }
        $this->db->update($this->_nama_tabel, $data);
        return $this->db->affected_rows();
    }

    public function delete($id=NULL, $where=NULL)
    {
        if($id){
            $this->db->where($this->_primary_key, $id);
        }
        if($where){
            $this->db->where($where);
        }
        $this->db->delete($this->_nama_tabel);
        return $this->db->affected_rows();
    }

    public function count($group=NULL){
        if($group){
            $this->db->group_by($group);
        }
		$this->db->from($this->_nama_tabel);
		return $this->db->count_all_results();
	}
    
    // public function tambah($data)
    // {
    //     $this->db->set($data);
    //     $this->db->insert($this->_nama_tabel);
    //     return $this->db->insert_id();
    // }

    // public function ambil_semua_data()
    // {
    //     return $this->db->get($this->_nama_tabel)->result_array();
    // }

    // public function ambil_semua_data_objek()
    // {
    //     return $this->db->get($this->_nama_tabel)->result();
    // }

    // public function ambil_sebagian_data($syarat = array())
    // {
    //     return $this->db->get_where($this->_nama_tabel, $syarat)->row();
    // }

    // public function update($data, $id)
    // {
    //     $this->db->where($this->_primary_key, $id);
    //     $this->db->update($this->_nama_tabel, $data);
    //     return $this->db->affected_rows();
    // }

    // public function hapus($id)
    // {
    //     $this->db->where($this->_primary_key, $id);
    //     $this->db->delete($this->_nama_tabel);
    //     return $this->db->affected_rows();
    // }
    
}