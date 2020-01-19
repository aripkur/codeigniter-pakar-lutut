<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gejala_model');

        if($this->session->userdata('login') == NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silahkan login dulu !</div>');
            redirect('pakar/auth');
        }
    }
    public function index()
    {
        $data['judulhalaman'] = "Admin - Gejala";
        $data['user'] = $this->session->userdata();
        $data['gejala'] = $this->Gejala_model->get();

        $this->load->view('pakar/templates/header', $data);
        $this->load->view('pakar/gejala', $data);
        $this->load->view('pakar/templates/footer');
    }

    public function tambah(){
        $data['gejala_kode'] = $this->input->post('form-gejala-kode');
        $data['gejala_nama'] = $this->input->post('form-gejala-nama');
        $data['gejala_gambar'] = $this->_uploadGambar($this->input->post('form-gejala-kode'));

        if($this->Gejala_model->insert($data) > 0){
            $this->_keterangan(TRUE, 'Tambah');
        }else{
            $this->_keterangan(FALSE, 'Tambah');
        }
    }

    public function hapus($id){

        if($this->Gejala_model->delete($id) > 0 ){
            $this->_keterangan(TRUE, 'Hapus');
        }else{
            $this->_keterangan(FALSE, 'Hapus');
        }
    }

    public function ubah(){
        $id = $this->input->post('form-gejala-id');
        $data['gejala_kode'] = $this->input->post('form-gejala-kode');
        $data['gejala_nama'] = $this->input->post('form-gejala-nama');

        if (!empty($_FILES['form-gejala-gambar']['name'])) {
            $data['gejala_gambar'] = $this->_uploadGambar($this->input->post('form-gejala-kode'));
        } else {
            $data['gejala_gambar'] = $this->input->post('form-gejala-gambar-lama');
        }
        if($this->Gejala_model->update($data, $id) >= 0){
            $this->_keterangan(TRUE, 'Update');
        }else{
            $this->_keterangan(FALSE, 'Update');
        }
    }

    private function _uploadGambar($nama_gambar){
        $config['upload_path']          = './images/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $nama_gambar;
        $config['overwrite']			= true;
        $config['max_size']             = 5024;

        $this->load->library('upload', $config);
        if($_FILES['form-gejala-gambar']['name'] != ""){
            if ($this->upload->do_upload('form-gejala-gambar')) {
                return $this->upload->data("file_name");
            }
            return "default.jpeg";
        }else{
            return "default.jpeg";
        }
    }

    private function _keterangan($status, $aksi){
        if($status){
             $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil '.$aksi.' Data !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('pakar/gejala');
            
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Gagal '.$aksi.' Data !</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('pakar/gejala');
        }
    }


    // public function ambil_data_objek(){
    //     echo json_encode($this->Gejala_model->ambil_semua_data_objek());
    // }

    // public function ambil_data(){  
    //     $syarat['gejala_id'] = $this->input->post('id');
    //     echo json_encode($this->Gejala_model->ambil_sebagian_data($syarat));
    // }
}