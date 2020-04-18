<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'NGOPI - Home';
        $this->load->view('home/_include/head', $data);
        $this->load->view('home/index');
        $this->load->view('home/_include/foot');
    }

    public function menu()
    {
        $data['title'] = 'NGOPI - Menu';
        $this->load->view('home/_include/head', $data);
        $this->load->view('home/menu');
        $this->load->view('home/_include/foot');
    }

    public function login()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        } else {
            $data['title'] = 'NGOPI - Login';
            $this->load->view('auth/login');
        }
    }

    public function signin()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($pass, $user['pass'])) {
                $data = [
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            }
        }
        redirect('home/login');
    }

    public function forgot()
    {
        $data['title'] = 'NGOPI - Forgot Password';
        $this->load->view('auth/forgot');
    }
}
