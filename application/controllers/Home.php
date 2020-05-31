<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Home_model');
        $this->warkop_settings = $this->Home_model->warkop_settings();
    }

    // ============================ INDEX FUNCTION ==================================
    public function index()
    {
        $data['highlight'] = $this->Home_model->getHighlight();
        $data['schedule'] = $this->Home_model->getSchedule();
        $data['title'] = $this->warkop_settings['name'] . ' - Home';

        $this->load->view('home/_include/head', $data);
        $this->load->view('home/index');
        $this->load->view('home/_include/foot');
    }

    // ============================ MENU FUNCTION ==================================
    public function menu()
    {
        $data['settings'] = $this->Home_model->warkop_settings();
        $data['title'] = $this->warkop_settings['name'] . ' - Menu';
        $data['menu'] = $this->Home_model->tampil_menu();
        $this->load->view('home/_include/head', $data);
        $this->load->view('home/menu');
        $this->load->view('home/_include/foot');
    }

    // ============================ LOGIN FUNCTION ==================================
    public function login()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('pass', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = $this->warkop_settings['name'] . ' - Login';
                $this->load->view('auth/login');
            } else {
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
                        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert"><b>Login</b> Berhasil!</div>');
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert"><b>Login</b> Gagal!</div>');
                    }
                }
                redirect('home/login');
            }
        }
    }
}
