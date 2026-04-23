<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Micro-CMS Ageing Artfully';
        $data['admin_username'] = $this->session->userdata('admin_username');
        
        // Memuat layout dan konten
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }
}