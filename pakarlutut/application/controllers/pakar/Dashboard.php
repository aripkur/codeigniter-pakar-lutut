<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['judulhalaman'] = "Admin - Dashboard";
        $data['user'] = $this->session->userdata();
        $data['totalcedera'] = $this->Cedera_model->count();
        $data['totalkaidah'] = $this->Kaidah_model->count('kaidah_kode');
        $data['totalgejala'] = $this->Gejala_model->count();

        $this->load->view('pakar/templates/header', $data);
        $this->load->view('pakar/dashboard', $data);
        $this->load->view('pakar/templates/footer');
    }
}