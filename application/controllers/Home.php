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
}
