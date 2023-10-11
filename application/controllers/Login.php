<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_login');
        $this->load->model('M_Admin');
    }
    public function index()
    {
        $data['title'] = "Login";
        $data['page'] = "Login";
        if ($this->M_login->logged_id()) {
            redirect('Login/home');
        } else {
            $this->load->view('login/login', $data);
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $passwordx = md5($password);
        $set = $this->M_login->login($username, $passwordx);
        if ($set) {
            $log = [
                'level' => $set->level,
                'id_login' => $set->id_login,
                'username' => $set->username,
                'id_anggota' => $set->id_anggota,
                'status' => 'Logged'
            ];
            $this->session->set_userdata($log);
            redirect('Login/home');
        } else {
            $this->session->set_flashdata('message', 'Username atau Password Salah');
            redirect('Login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function home()
    {
        $data = array(
            'title' => "Dashboard",
            'page' => "Dashboard",
            'dataPengguna' => $this->M_Admin->getCountPengguna(),
            'dataBarang' => $this->M_Admin->getCountBarang(),
            'dataPinjam' => $this->M_Admin->getCountPinjam(),
            'dataKembali' => $this->M_Admin->getCountKembali()
        );

        $this->load->view('dashboard/dashboard', $data);
    }
}

/* End of file Login.php */
