<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model(['Pakar_model']);
        $this->load->library('form_validation');


    }

    public function index()
    {
        $this->_cek_login();
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', ['required' => 'Masukan email dengan benar !']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Masukan password !']);
        if ($this->form_validation->run() == false) {
            $data['judulhalaman'] = "Halaman Login";
            $this->load->view('pakar/login', $data);
        }else{
            $this->_login();
        }
    }

    private function _login()
    { 
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where['pakar_email'] = $email;
        $pakar = $this->Pakar_model->get($where, TRUE);
        
        if($pakar){
            if(password_verify($password, $pakar->pakar_password)){
                $data = [
                    'nama' => $pakar->pakar_nama,
                    'login' => TRUE
                ];
                $this->session->set_userdata($data);
                redirect('pakar/dashboard');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal Masuk! Password salah.</div>');
                redirect('pakar/auth');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal Masuk! Email tidak terdaftar.</div>');
            redirect('pakar/auth');
        }
    }

    public function tes_daftar()
    {
        $data['pakar_nama'] = "Syaifudin";
        $data['pakar_email'] = "test@gmail.com";
        $data['pakar_password'] = password_hash("12345", PASSWORD_DEFAULT) ;
        $this->Pakar_model->insert($data);
    }
    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('login');
       
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil keluar...</div>');
        redirect('pakar/auth');
        
    }

    private function _cek_login(){
        if($this->session->userdata('login')){
            redirect('pakar/dashboard');
        }
    }
}