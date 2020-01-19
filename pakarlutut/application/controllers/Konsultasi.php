<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konsultasi_model');
    }
    public function index()
    {
        $data['aktifHome'] = '';
        $data['aktifKonsultasi'] = 'active';
        $data['aktifAbout'] = '';
        $data['title'] = 'Kosultasi';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/konsultasi');
        $this->load->view('user/templates/footer');
    }

    public function pertanyaan(){
        $data = $this->Konsultasi_model->dataGejala();
        echo json_encode($data);
    }

    public function cedera(){
        $data = $this->Konsultasi_model->dataCedera();
        echo json_encode($data);
    }
}