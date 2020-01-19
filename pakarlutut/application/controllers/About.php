<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['aktifHome'] = '';
        $data['aktifKonsultasi'] = '';
        $data['aktifAbout'] = 'active';
        $data['title'] = 'About';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/about');
        $this->load->view('user/templates/footer');
    }
}