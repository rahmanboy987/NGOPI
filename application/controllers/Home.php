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

    public function index()
    {
        $data['highlight'] = $this->Home_model->getHighlight();
        $data['schedule'] = $this->Home_model->getSchedule();
        $data['title'] = $this->warkop_settings['name'] . ' - Home';

        $this->load->view('home/_include/head', $data);
        $this->load->view('home/index');
        $this->load->view('home/_include/foot');
    }

    public function menu()
    {
        $data['settings'] = $this->Home_model->warkop_settings();
        $data['title'] = $this->warkop_settings['name'] . ' - Menu';
        $data['menu'] = $this->menumodel->tampil_menu();
        $this->load->view('home/_include/head', $data);
        $this->load->view('home/menu');
        $this->load->view('home/_include/foot');
    }
	
    public function pesanan()
    {
        if($this->session->userdata("keranjang")){
            $data['io'] = $this->menumodel->daftar();
        } else {
            $data['io'] = 1;
        }
        $data['title'] = 'NGOPI - pesanan';
        $this->load->view('home/_include/head', $data);
        $this->load->view('home/pesanan');
        $this->load->view('home/_include/foot');
    }

    public function tampil_menu(){
        $this->load->view('home/menu',$data);
    }
	
    public function aku($id_menu)
    {
        if (!$this->session->userdata("keranjang")) {
            $temp[] = $id_menu;
            $this->session->set_userdata('keranjang', $temp);
            redirect('home/pesanan');
        } else {
            $temp = $this->session->userdata("keranjang");
            array_push($temp, $id_menu);
            $this->session->set_userdata('keranjang',$temp);
            redirect('home/pesanan');
        }
    }
    public function hapus($id_menu){
        $id_menu = $this->input->post('id_menu',true);
        $this->menumodel->hapus($id_menu);
        redirect('home/menu');
    }

    public function login()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        } else {
            $data['title'] = $this->warkop_settings['name'] . ' - Login';
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
        $data['title'] = $this->warkop_settings['name'] . ' - Forgot Password';
        $this->load->view('auth/forgot');
    }
}
