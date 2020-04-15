<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'NGOPI - Dashboard';
        $this->load->view('admin/_include/head', $data);
        $this->load->view('admin/_include/side');
        $this->load->view('admin/_include/nav');
        $this->load->view('admin/index');
        $this->load->view('admin/_include/foot');
    }

    public function login()
    {
        $data['title'] = 'NGOPI - Login';
        $this->load->view('auth/login');
    }
    public function forgot()
    {
        $data['title'] = 'NGOPI - Forgot Password';
        $this->load->view('auth/forgot');
    }

    public function user()
    {
        $data['title'] = 'NGOPI - Dashboard';
        $this->load->view('admin/_include/head', $data);
        $this->load->view('admin/_include/side');
        $this->load->view('admin/_include/nav');
        $data['user'] = $this->User_model->getAllUser();
        $this->load->view('admin/user', $data);
        $this->load->view('admin/_include/foot');
    }

    public function hapusUser($id)
    {
        $this->User_model->hapusUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/user');
    }
}
