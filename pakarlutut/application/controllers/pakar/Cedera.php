<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cedera extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cedera_model');

        if($this->session->userdata('login') == NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silahkan login dulu !</div>');
            redirect('pakar/auth');
        }
    }
    public function index()
    {
        $data['judulhalaman'] = "Admin - Cedera";
        $data['user'] = $this->session->userdata();
        $data['cedera'] = $this->Cedera_model->get();

        $this->load->view('pakar/templates/header', $data);
        $this->load->view('pakar/cedera', $data);
        $this->load->view('pakar/templates/footer');
    }

    public function tambah(){
        $data['cedera_kode'] = $this->input->post('form-cedera-kode');
        $data['cedera_nama'] = $this->input->post('form-cedera-nama');
        $data['cedera_solusi'] = $this->input->post('form-cedera-solusi');
        $data['nilai_cf'] = $this->input->post('form-cedera-nilaicf');

        if($this->Cedera_model->insert($data) > 0){
            $this->_keterangan(TRUE, 'Tambah');
        }else{
            $this->_keterangan(FALSE, 'Tambah');
        }
    }

    public function hapus($id){

        if($this->Cedera_model->delete($id) > 0 ){
            $this->_keterangan(TRUE, 'Hapus');
        }else{
            $this->_keterangan(FALSE, 'Hapus');
        }
    }

    public function ubah(){
        $id = $this->input->post('form-cedera-id');
        $data['cedera_kode'] = $this->input->post('form-cedera-kode');
        $data['cedera_nama'] = $this->input->post('form-cedera-nama');
        $data['cedera_solusi'] = $this->input->post('form-cedera-solusi');
        $data['nilai_cf'] = $this->input->post('form-cedera-nilaicf');

        if($this->Cedera_model->update($data, $id) >= 0){
            $this->_keterangan(TRUE, 'Update');
        }else{
            $this->_keterangan(FALSE, 'Update');
        }
    }

    private function _keterangan($status, $aksi){
        if($status){
             $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil '.$aksi.' Data !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('pakar/cedera');
            
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Gagal '.$aksi.' Data !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('pakar/cedera');
        }
    }
}