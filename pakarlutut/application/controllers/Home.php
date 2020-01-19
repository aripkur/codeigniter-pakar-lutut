<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['aktifHome'] = 'active';
        $data['aktifKonsultasi'] = '';
        $data['aktifAbout'] = '';
        $data['title'] = 'Home';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/home');
        $this->load->view('user/templates/footer');
    }
}