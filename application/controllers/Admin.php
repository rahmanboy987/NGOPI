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

        $this->user = $this->Admin_model->get_session();
        if ($this->session->userdata('email') == null) {
            redirect(base_url('home/login'));
        }
    }

    function load_view($id = null, $data = null)
    {
        if ($id == null) {
            redirect(base_url('admin'));
        } else {
            $data['title'] = 'NGOPI - ' . ucwords($id);

            $this->load->view('admin/_include/head', $data);
            $this->load->view('admin/_include/side');
            $this->load->view('admin/_include/nav', $this->user);
            $this->load->view("admin/$id");
            $this->load->view('admin/_include/foot');
        }
    }

    public function index()
    {
        $this->load_view('index');
    }

    public function user()
    {
        if ($this->user['role'] != 1) {
            redirect(base_url('admin'));
        } else {
            $data['all_user'] = $this->Admin_model->getAllUser();
            $this->load_view('user', $data);
        }
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
        $phone = $this->input->post('phone_user');
        $ktp = $this->input->post('ktp_user');
        $role = $this->input->post('role_user');
        $data = array(
            'nama' => $nama,
            'email' => $email,
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
