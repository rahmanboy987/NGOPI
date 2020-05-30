<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
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
            $data['all_penjualan'] = $this->Admin_model->getAllPenjualan();
            $this->load_view('report', $data);
        }
    }

    public function stock()
    {
        $data['all_menu'] = $this->Admin_model->getAllMenu();
        $this->load_view('stock', $data);
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
        $data['all_menu'] = $this->Admin_model->getAllMenu();
        $data['all_keranjang'] = $this->Admin_model->getAllKeranjang($this->user['id']);
        $this->load_view('kasir', $data);
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

    public function add_menu()
    {
        $nama_produk = $this->input->post('nama_menu');
        $harga_jual = $this->input->post('harga_menu');
        $stock_produk = $this->input->post('stock_menu');
        $jenis_produk = $this->input->post('jenis_menu');
        $data = array(
            'nama_produk' => $nama_produk,
            'harga_jual' => $harga_jual,
            'stock_produk' => $stock_produk,
            'jenis_produk' => $jenis_produk
        );
        $this->db->insert('produk', $data);
        redirect('admin/stock');
    }

    public function edit_menu($id)
    {
        $nama_produk = $this->input->post('nama_produk');
        $harga_jual = $this->input->post('harga_jual');
        $stock_produk = $this->input->post('stock_produk');
        $jenis_produk = $this->input->post('jenis_menu');
        $data = array(
            'nama_produk' => $nama_produk,
            'harga_jual' => $harga_jual,
            'stock_produk' => $stock_produk,
            'jenis_produk' => $jenis_produk
        );
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
        redirect('admin/stock');
    }

    public function hapusMenu($id)
    {
        $this->Admin_model->hapusMenu($id);
        redirect('admin/stock');
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

    public function add_keranjang()
    {
        $id_user = $this->user['id'];
        $id_barang = $this->input->post('id_barang');
        $jumlah_jual = $this->input->post('jumlah_jual');
        $data = array(
            'id_user' => $id_user,
            'id_barang' => $id_barang,
            'jumlah_jual' => $jumlah_jual
        );
        $this->db->insert('keranjang', $data);
        redirect('admin/kasir');
    }

    public function edit_keranjang($id)
    {
        $jumlah_jual = $this->input->post('jumlah_jual');
        $data = array(
            'jumlah_jual' => $jumlah_jual
        );
        $this->db->where('id_keranjang', $id);
        $this->db->update('keranjang', $data);
        redirect('admin/kasir');
    }



    public function bayar_pesanan()
    {
        $all_keranjang = $this->Admin_model->getAllKeranjang($this->user['id']);

        $id_keluar = uniqid();
        $id_user = $this->user['id'];
        $total_harga = $this->input->post('total_harga');
        $data = array(
            'id_keluar' => $id_keluar,
            'id_user' => $id_user,
            'waktu_keluar' => date("Y-m-d H:i:s"),
            'total_harga' => $total_harga
        );
        $this->db->insert('penjualan_keluar', $data);

        foreach ($all_keranjang->result_array() as $row) {
            $data = array(
                'id_keluar' => $id_keluar,
                'id_barang' => $row['id_produk'],
                'jumlah_keluar' => $row['jumlah_jual'],
                'subtotal_keluar' => $row['harga_jual'] * $row['jumlah_jual']
            );
            $this->db->insert('detail_keluar', $data);
        }

        $this->Admin_model->resetPesanan($this->user['id']);
        redirect('admin/kasir');
    }

    public function hapusPesanan($id)
    {
        $this->Admin_model->hapusPesanan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kasir');
    }

    public function resetPesanan()
    {
        $this->Admin_model->resetPesanan($this->user['id']);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kasir');
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
