<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model');
    }

    public function index()
    {
        // Setup SEO Meta - Dibuat lebih umum karena mencakup multi-hari
        $data['title'] = 'Event Schedule | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'View the full event schedule, plenary sessions, and breakout workshops for the Ageing Artfully Conference 2026.';
        
        // Get Data (Sudah terurut berdasarkan tanggal dan waktu di model)
        $data['schedules'] = $this->Schedule_model->get_all();

        // Render Views
        $this->load->view('public/layout/header', $data);
        $this->load->view('public/schedules', $data);
        $this->load->view('public/layout/footer');
    }
}