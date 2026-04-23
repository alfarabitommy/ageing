<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Schedule_model'); // Load model dari Fase 3
    }

    public function index()
    {
        // Setup SEO Meta
        $data['title'] = 'Event Schedule | Ageing Artfully Conference 2026';
        $data['meta_desc'] = 'View the full event schedule for the Ageing Artfully Conference on Wednesday, 22 July 2026 at NAFA Campus 1.';
        
        // Get Data
        $data['schedules'] = $this->Schedule_model->get_all();

        // Render Views
        $this->load->view('public/layout/header', $data);
        $this->load->view('public/schedules', $data);
        $this->load->view('public/layout/footer');
    }
}