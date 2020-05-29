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
        $this->load->model('Home_model');

        $this->user = $this->Admin_model->get_session();
        if ($this->session->userdata('email') == null) {
            redirect(base_url('home/login'));
        }
        $this->warkop_settings = $this->Home_model->warkop_settings();
    }

    function load_view($id = null, $data = null)
    {
        if ($id == null) {
            redirect(base_url('admin'));
        } else {
            $data['title'] = $this->warkop_settings['name'] . ' - ' . ucwords($id);

            $this->load->view('admin/_include/head', $data);
            $this->load->view('admin/_include/side');
            $this->load->view('admin/_include/nav');
            $this->load->view("admin/$id");
            $this->load->view('admin/_include/foot');
        }
    }

    public function index()
    {
        $this->load_view('index');
    }

    public function report()
    {
        if ($this->user['role'] != 1) {
            redirect(base_url('admin'));
        } else {
            $this->load_view('report');
        }
    }

    public function stock()
    {
        $this->load_view('stock');
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

    public function kasir()
    {
        $this->load_view('kasir');
    }

    public function settings()
    {
        if ($this->user['role'] != 1) {
            redirect(base_url('admin'));
        } else {
            if ($this->input->post('set_settings') !== null) {
                $name = $this->input->post('nama_toko');
                $quotes = $this->input->post('quote_toko');
                $place = $this->input->post('alamat_toko');
                $phone = $this->input->post('telepon_toko');
                $data = array(
                    'name' => $name,
                    'quotes' => $quotes,
                    'place' => $place,
                    'phone' => $phone
                );
                $this->db->where('id', 1);
                $this->db->update('warkop_settings', $data);
                redirect('admin/settings');
            } else {
                $data['highlight'] = $this->Home_model->getHighlight();
                $data['schedule'] = $this->Home_model->getSchedule();
                $data['all_user'] = $this->Admin_model->getAllUser();
                $this->load_view('settings', $data);
            }
        }
    }

    public function profile()
    {
        $this->load_view('profile');
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

    public function edit_schedule($id)
    {
        $days = $this->input->post('hari');
        $descript = $this->input->post('waktu');
        $data = array(
            'days' => $days,
            'descript' => $descript
        );
        $this->db->where('id_schedule', $id);
        $this->db->update('schedule', $data);
        redirect('admin/settings');
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');

        redirect('admin');
    }
}
