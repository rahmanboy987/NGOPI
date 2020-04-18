<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Admin_model');

        $this->data['user'] = $this->Admin_model->get_session();
        if ($this->session->userdata('email') == null) {
            redirect(base_url('home/login'));
        }
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

    public function user()
    {
        $data['user'] = $this->Admin_model->getAllUser();

        $data['title'] = 'NGOPI - Karyawan';
        $this->load->view('admin/_include/head', $data);
        $this->load->view('admin/_include/side');
        $this->load->view('admin/_include/nav');
        $this->load->view('admin/user', $data);
        $this->load->view('admin/_include/foot');
    }

    public function add_user()
    {
        $nama = $this->input->post('nama_user');
        $email = $this->input->post('email_user');
        $pass = password_hash($this->input->post('pass_user'), PASSWORD_DEFAULT);
        $phone = $this->input->post('phone_user');
        $ktp = $this->input->post('ktp_user');
        $role = $this->input->post('role_user');
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'pass' => $pass,
            'phone' => $phone,
            'ktp' => $ktp,
            'role' => $role
        );
        $this->db->insert('user', $data);
        redirect('admin/user');
    }

    public function edit_user($id)
    {
        $nama = $this->input->post('nama_user');
        $email = $this->input->post('email_user');
        $pass = $this->input->post('pass_user');
        $phone = $this->input->post('phone_user');
        $ktp = $this->input->post('ktp_user');
        $role = $this->input->post('role_user');
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'pass' => $pass,
            'phone' => $phone,
            'ktp' => $ktp,
            'role' => $role
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        redirect('admin/user');
    }

    public function hapusUser($id)
    {
        $this->Admin_model->hapusUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/user');
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');

        redirect('admin');
    }
}
