<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaidah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Cedera_model', 'Gejala_model', 'Kaidah_model']);

        if($this->session->userdata('login') == NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silahkan login dulu !</div>');
            redirect('pakar/auth');
        }
    }
    public function index()
    {
        $data['judulhalaman'] = "Admin - Kaidah";
        $data['user'] = $this->session->userdata();

        $data['cedera'] = $this->Cedera_model->get();
        $data['gejala'] = $this->Gejala_model->get();
        $data['kaidah'] = $this->Kaidah_model->ambilSemua();

        $this->load->view('pakar/templates/header', $data);
        $this->load->view('pakar/kaidah', $data);
        $this->load->view('pakar/templates/footer');
    }

    public function tambah(){
        $gejala = $this->input->post('form-kaidah-fkgejala');
        foreach($gejala as $datagejala){
            $data['kaidah_kode'] = $this->input->post('form-kaidah-kode');
            $data['fk_gejala'] = $datagejala;
            $data['fk_cedera'] = $this->input->post('form-kaidah-fkcidera');
            $id = $this->Kaidah_model->insert($data);
        }

        if( $id > 0){
            $this->_keterangan(TRUE, 'Tambah');
        }else{
            $this->_keterangan(FALSE, 'Tambah');
        }
    }

    public function hapus($kode){
        $where = ['kaidah_kode' => $kode];
        if($this->Kaidah_model->delete(NUll, $where) > 0 ){
            $this->_keterangan(TRUE, 'Hapus');
        }else{
            $this->_keterangan(FALSE, 'Hapus');
        }
    }

    public function ubah(){
        $kaidah_kode = $this->input->post('form-kaidah-kode-hidden'); 
        $cedera_id = intval($this->input->post('form-kaidah-fkcidera')); 
        $dbgejala = $this->Kaidah_model->ambilSemua($kaidah_kode);   //iki ijik string

        $formgejala = $this->input->post('form-kaidah-fkgejala');    //iki wes array 
        $dbgejala = explode(",",$dbgejala->gejala_id);               //tekan kene, sesuk nehh =========================

        if(array_diff($formgejala,$dbgejala)){
            foreach(array_diff($formgejala,$dbgejala) as $tambahGejala){
                $data['kaidah_kode'] = $kaidah_kode;
                $data['fk_cedera'] = $cedera_id;
                $data['fk_gejala'] = intval($tambahGejala);
                $this->Kaidah_model->insert($data);
            }
        }
        if(array_diff($dbgejala,$formgejala)){
            foreach( array_diff($dbgejala,$formgejala) as $hapusGejala){
                $where['kaidah_kode'] = $kaidah_kode;
                $where['fk_cedera'] = $cedera_id;
                $where['fk_gejala'] = intval($hapusGejala);
                $this->Kaidah_model->delete(NULL, $where);
            } 
        }

        $dataUpdate['fk_cedera'] = $cedera_id;
        $whereUpdate['kaidah_kode'] = $kaidah_kode;
        if($this->Kaidah_model->update($dataUpdate, NULL, $whereUpdate) >= 0){
            $this->_keterangan(TRUE, 'Update');
        }else{
            $this->_keterangan(FALSE, 'Update');
        }
    }

    public function tes(){
        $data['fk_cedera'] = 2;
        $where['kaidah_kode'] = 'K1';
        $this->Kaidah_model->update($data, NULL, $where);
    }
    private function _keterangan($status, $aksi){
        if($status){
             $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil '.$aksi.' Data !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('pakar/kaidah');
            
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Gagal '.$aksi.' Data !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('pakar/kaidah');
        }
    }
}